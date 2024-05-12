<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Branch;
use App\Models\User;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function getEntityCounts()
    {
        $data = [
            'clients_count' => Client::count(),
            'branches_count' => Branch::count(),
            'users_count' => User::count(),
            'invoices_count' => Invoice::count(),
        ];
        $clients = Client::latest()->paginate(5);

        // Assuming you want to return these counts to a view
        return view('dashboard', compact('data', 'clients'));
    }



}
