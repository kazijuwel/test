<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vouchar_item;
class vouchar extends Model
{
    public function voucherItems(){
        return $this->hasMany(vouchar_item::class);
    }

}
