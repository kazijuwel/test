<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    public function categoryName()
    {
        return $this->belongsTo(expends_category::class,'expense_id');
    }
    public function addedby()
    {
        return $this->belongsTo(User::class,'addedby_id');
    }
    public function editorBy()
    {
        return $this->belongsTo(User::class,'editedby_id');
    }
}
