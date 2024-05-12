<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{




    function __construct()
    {
        $this->middleware(['permission:client-list|client-create|client-edit|client-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:client-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:client-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:client-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = Client::latest()->paginate(5);
        // return view('clients.index',compact('data'));

        $search = $request->input('search');

        // Fetch clients with simple search and pagination
        $data = Client::where(function ($query) use ($search) {
            if ($search) {
                $query->where('f_name', 'LIKE', "%{$search}%")
                    ->orWhere('m_name', 'LIKE', "%{$search}%")
                    ->orWhere('l_name', 'LIKE', "%{$search}%")
                    ->orWhere('phone_number', 'LIKE', "%{$search}%");
            }
        })->paginate(5);

        // Append search query to pagination links
        if ($search) {
            $data->appends(['search' => $search]);
        }

        return view('clients.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'm_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'unique:clients'],
            // 'cash_back' => ['required', 'numeric', 'default:0'],
        ]);


    // Preprocess phone number
    $phoneNumber = $request->input('phone_number');

    // Check if the number starts with '0'
    if (substr($phoneNumber, 0, 1) == '0') {
        // Remove leading '0' and add '+966'
        $phoneNumber = '+966 ' . substr($phoneNumber, 1, 2) . ' ' . substr($phoneNumber, 3, 3) . ' ' . substr($phoneNumber, 6, 4);
    } else {
        // Add '+966' to the beginning
        $phoneNumber = '+966 ' . substr($phoneNumber, 0, 2) . ' ' . substr($phoneNumber, 2, 3) . ' ' . substr($phoneNumber, 5, 4);
    }
        // Update the request with the processed phone number
        $request->merge(['phone_number' => $phoneNumber]);


        Client::create($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'تم إنشاء عميل بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client->load('invoices');

        return view('clients.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        request()->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'm_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable'],
            'cash_back' => 'required',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')
            ->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
        ->with('success', 'تم الحذف بنجاح');
    }
}
