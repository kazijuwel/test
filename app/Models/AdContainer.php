<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\AdItem;
use Carbon\Carbon;

class AdContainer extends Model
{
    public function addeduser()
    {

        return $this->belongsTo(User::class,'addedby_id');
    }
    public function editeduser()
    {

        return $this->belongsTo(User::class,'editedby_id');
    }
    public function adItems()
    {
        return $this->hasMany(AdItem::class,'container_id');
    }
    public function topadsitems()
    {
        $currentTime = Carbon::now();
        return $this->adItems()->where('started_at', '<' ,$currentTime)->where('ended_at', '>' ,$currentTime)->where('active',1)->orderBy('view_count','asc')->get();
    }
    public function after_category()
    {
        $currentTime = Carbon::now();
        return $this->adItems()->where('started_at', '<' ,$currentTime)->where('ended_at', '>' ,$currentTime)->where('active',1)->orderBy('view_count','asc')->get();
    }
    public function bobAdItems()
    {

      $currentTime = Carbon::now();
       return $this->adItems()->where('started_at', '<' ,$currentTime)->where('ended_at', '>' ,$currentTime)->where('active',1)->orderBy('view_count','asc')->get();
    }
}
