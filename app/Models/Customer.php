<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    
    use HasFactory;

    public function invoices()
    {
        /** Each Customer has many invoices  */
        return $this->hasMany(Invoice::class);
    }
}
