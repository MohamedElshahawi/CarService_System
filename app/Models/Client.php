<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'm_name',
        'l_name',
        'phone_number',
        'cash_back',
    ];


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function getNumberOfInvoicesAttribute()
    {
        return $this->invoices->count();
    }



}
