<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class vouchar_item extends Model
{
    public function hasVoucher(){
        return $this->belogsTo(vouchar::class);
    }
    public function transectionBalance($report,$start,$end){
        // $time= now()->parse($this->created_at)format("H:i:s");
        // $created= \Carbon\Carbon::parse($this->created_at)->format('Y-m-d');
        // return $created;
        // $date = new DateTime($start);
        // return $start =  $start." ".$time;
        
        if($start>$end){
            return $this->whereBetween('created_at',[$start,$end])->get();
        }
        elseif($start==$end){
            
            return $this->whereDate('created_at',$start)->get();
        }else{
            return $this->whereBetween('created_at',[$start,$end])->get();
        }


        
       // return $this->where('created_at', '>=',$start)->where('created_at','=<',$end)->get();
        
    }
}
