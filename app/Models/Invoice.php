<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;
    public function customer()
    {
        /** Each Invoice belongs to a Customer  */
        return $this->belongsTo(Customer::class);
    }
}
