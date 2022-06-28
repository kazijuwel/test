<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    public function addedBy()
    {
        return $this->belongsTo(User::class,'addedBy_id');
    }
}
