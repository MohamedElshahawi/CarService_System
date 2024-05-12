<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class WebsiteController extends Controller
{


    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle the search form submission
            $phone = preg_replace('/[^0-9]/', '', $request->phone_number);

            $processedPhone = '+966 ' . substr($phone, 1, 2) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4);

            $client = Client::where('phone_number', $processedPhone)->first();

            if ($client) {
                return view('welcome', ['cash_back' => $client->cash_back]);
            } else {
                return redirect()->route('home')->with('error', 'رقم العميل غير متاح،    .');
            }
        } else {
            // Render the home page view
            return view('welcome');
        }
    }











}
