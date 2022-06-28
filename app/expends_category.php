<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expends_category extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class,'added_by');
    }
    public function editedby()
    {
        return $this->belongsTo(User::class,'editedby_id');
    }
}
