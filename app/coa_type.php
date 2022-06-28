<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\chartof_account;
use App\vouchar_item;

class coa_type extends Model
{
    public function  allBalancesheetGroup(){
        return $this->where('report_type','balance_sheet')->where('status',1)->get();
    }
    public function allprofitandlossgroup(){
        return $this->where('report_type','profit_loss')->where('parent_id',null)->get();
    }
    public function allprofitandlossgroups(){
        return $this->where('report_type','profit_loss')->get();
    }
    public function allprofitandloss(){
        return $this->where('report_type','profit_loss')->get();
    }
    public function childAccount(){
    	return $this->hasMany(chartof_account::class,'coa_type_id');
    }
    public function  parentBalancesheetGroup(){
        return $this->where('report_type','balance_sheet')->where('parent_id',null)->get();
    }
    public function  parentBalancesheetGroups(){
        return $this->where('report_type','balance_sheet')->get();
    }
    public function childBalance(){
    	return $this->hasMany(chartof_account::class,'coa_type_id');
    }
    public function balanceProfitAndLoss($r,$start,$end){

        return $this->where('report_type',$r)->whereBetween('created_at',[$start,$end])->get();

    }
    public function balanceforBalanceSheet($r,$start,$end)
    {
        return $this->where('report_type',$r)->whereBetween('created_at',[$start,$end])->get();
    }
    public function trialProfit($r,$start,$end)
    {
        return $this->where('report_type',$r)->whereBetween('created_at',[$start,$end])->get();
    }
    public function trialBalance($r,$start,$end)
    {
        return $this->where('report_type',$r)->whereBetween('created_at',[$start,$end])->get();
    }




    public function profitIncomeBalance(){
        $incomes=$this->where('account_type','income')->get();
        $totalincome=0;
        foreach($incomes as $income){

            foreach($income->childAccount as $is){
                $totalincome += $is->Voucheritems->sum('debit')+$is->Voucheritems->sum('credit');
            }
        }
        return $totalincome;
    }
    public function profitExpenseBalance(){
        $incomes=$this->where('account_type','expense')->get();
        $totalincome=0;
        foreach($incomes as $income){

            foreach($income->childAccount as $is){
                $totalincome += $is->Voucheritems->sum('debit')+$is->Voucheritems->sum('credit');
            }

        }
        return $totalincome;
    }
    public function subGroupAccount($id)
    {
        return $this->where('parent_id',$id)->get();
    }
    public function subGroupBalanceAccount($id)
    {
        return $this->where('parent_id',$id)->get();
    }
}
