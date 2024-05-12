<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'branch_id',
        'invoice_amount',
        'invoice_number',
        'discount'
    ];




    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function getClientPhoneNumber()
    {
        return $this->client->phone_number ?? null;
    }


    public function getClientFullName()
    {
        return $this->client
            ? $this->client->f_name . ' ' . $this->client->m_name . ' ' . $this->client->l_name . '  ' : null;
    }

    public function getBranchInfoAttribute()
    {
        return $this->branch->town . ' - ' . $this->branch->branch_name;
    }


    public function getClientCashBack()
    {
        return $this->client->cash_back ?? null;
    }





}
