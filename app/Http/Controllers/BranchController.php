<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{


    function __construct()
    {
        $this->middleware(['permission:branch-list|branch-create|branch-edit|branch-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:branch-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:branch-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:branch-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->paginate(5);
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'town' => 'required',
            'branch_name' => 'required|unique:branches,branch_name',
        ]);

        Branch::create($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'تم إنشاء منطقه بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        request()->validate([
            'town' => 'required',
            // 'branch_name' => 'required',
        ]);

        $branch->update($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success', 'تم الحذف بنجاح');
    }



}
