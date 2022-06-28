<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ChartofAccount;
use App\VoucharItem;

class CoaType extends Model
{

    public function childCoaTypes()
    {
        return $this->where('report_type', $this->report_type)->where('parent_id',$this->id)->get();
    }
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
    	return $this->hasMany(ChartofAccount::class,'coa_type_id');
    }
    public function  parentBalancesheetGroup(){
        return $this->where('report_type','balance_sheet')->where('parent_id',null)->get();
    }
    public function  parentBalancesheetGroups(){
        return $this->where('report_type','balance_sheet')->get();
    }
    public function childBalance(){
    	return $this->hasMany(ChartofAccount::class,'coa_type_id');
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
    public function childSubcategorybalanceSheet()
    {
        return $this->where('report_type','balance_sheet')->where('parent_id',$this->id)->get();
    }





    //balance sheet report start
    public function balancesheetReport($report,$start,$end)
    {

        return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->where('account_type','assets')->get();
    }
    //balance sheet report end

    public function balancesheetReportequity($report,$start,$end)
    {

    return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->where('account_type','equity')->get();
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
    public function totalChildDebitamount($id){
        $incomes=$this->where('parent_id','$id')->get();
        $totalDebitIncome=0;
        foreach($incomes as $income){

            foreach($income->childAccount as $is){
                $totalDebitIncome += $is->Voucheritems->sum('debit');
            }

        }
        return $totalDebitIncome;
    }
    public function totalChildCreditAmount($id){
        $incomes=$this->where('parent_id','$id')->get();
        $totalCredit=0;
        foreach($incomes as $income){

            foreach($income->childAccount as $is){
                $totalCredit += $is->Voucheritems->sum('credit');
            }

        }
        return $totalCredit;
    }


}
