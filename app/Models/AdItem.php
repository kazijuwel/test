<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\AdContainer;

class AdItem extends Model
{
    public function addeduser()
    {

        return $this->belongsTo(User::class,'addedby_id');
    }
    public function editeduser()
    {

        return $this->belongsTo(User::class,'editedby_id');
    }
    public function addcontainer()
    {

        return $this->belongsTo(AdContainer::class,'container_id');
    }
}
