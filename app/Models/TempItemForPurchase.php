<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TempItemForPurchase extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class)->withoutGlobalScopes();
    }
}
