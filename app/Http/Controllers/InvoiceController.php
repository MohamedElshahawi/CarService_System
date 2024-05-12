<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DiscountService;
use App\Models\Invoice;
use App\Models\Branch;
use App\Models\Client;
// use Illuminate\Support\ServiceProvider;

class InvoiceController extends Controller
{

    protected $discountService;

    function __construct(DiscountService $discountService)
    {
        $this->middleware(['permission:invoice-list|invoice-create|invoice-edit|invoice-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:invoice-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:invoice-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:invoice-delete'], ['only' => ['destroy']]);
        $this->discountService = $discountService;

    }







    public function getClientByPhone($phone)
    {
        // Remove any non-numeric characters from the phone number
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Add '+966' to the beginning
        $processedPhone = '+966 ' . substr($phone, 1, 2) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4);

        $client = Client::where('phone_number', $processedPhone)->first();

        if ($client) {
            return response()->json($client);
        } else {
            return response()->json(null, 404);
        }
    }





    public function index(Request $request)
    {
        // $data = Invoice::latest()->paginate(5);
        // return view('invoices.index',compact('data'));
        $search = $request->input('search');

        // Query to search for invoices based on the provided search term
        $query = Invoice::query();
        if (!empty($search)) {
            $query->where('invoice_amount', 'like', '%' . $search . '%')
                  ->orWhere('invoice_number', 'like', '%' . $search . '%');
        }

        // Retrieve paginated results
        $data = $query->latest()->paginate(5);

        return view('invoices.index', compact('data'));
    }

    public function create()
    {
        $branches = Branch::get()->all();

        return view('invoices.create' , compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,DiscountService $discountService)
    {
        // dd($request->all());

        request()->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'branch_id' => ['required', 'exists:branches,id'],
            'invoice_number' => ['required', 'string', 'size:5'],
            'invoice_amount' => ['required', 'numeric', 'min:0']

        ]);



        // Retrieve the client and invoice amount from the request
        $client = Client::find($request->input('client_id'));
        $invoiceAmount = $request->input('invoice_amount');

        // Use the DiscountService to calculate discount and apply cash back logic
        $result = $discountService->applyDiscountAndCashBack($client, $invoiceAmount);

        // Create the invoice with the final invoice amount
        Invoice::create([
            'client_id' => $request->input('client_id'),
            'branch_id' => $request->input('branch_id'),
            'invoice_number' => $request->input('invoice_number'),
            'invoice_amount' => $result['finalInvoiceAmount'], // Use the adjusted invoice amount
            'discount' => $result['discount'],
        ]);

        // Redirect with success message
        return redirect()->route('invoices.index')
            ->with('success', 'تم إنشاء فاتورة بنجاح');






    }


    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));

    }


    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }




    public function update(Request $request,   Invoice $invoice)
    {
        request()->validate([
            'invoice_number' => ['required'],
            'invoice_amount' => ['required'],
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'تم التعديل بنجاح');
    }




    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
        ->with('success', 'تم الحذف بنجاح');
    }



}
