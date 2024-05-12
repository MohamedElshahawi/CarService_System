<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\Client;



class DiscountService
{

    public function applyDiscountAndCashBack(Client $client, $invoiceAmount)
    {
        $discount = 0;
        $finalInvoiceAmount = $invoiceAmount;

        // Count the number of invoices the client has
        $invoicesCount = $client->invoices()->count();

        // For the first invoice, set cash_back equal to the invoice amount
        if ($invoicesCount === 0) {
            $client->update(['cash_back' => $finalInvoiceAmount]);
        }
        // Apply discount for all subsequent visits after the first one
        else {
            $initialDiscount = $finalInvoiceAmount * 0.20; // Calculate 20% discount
            $availableCashBack = $client->cash_back;

            // Adjust the discount to not exceed available cash back
            if ($availableCashBack < $initialDiscount) {
                $discount = $availableCashBack;
            } else {
                $discount = $initialDiscount;
            }

            $finalInvoiceAmount -= $discount; // Apply the discount
            $client->decrement('cash_back', $discount); // Subtract the discount from cash_back
        }

        return [
            'finalInvoiceAmount' => $finalInvoiceAmount,
            'discount' => $discount,
        ];
    }

}
