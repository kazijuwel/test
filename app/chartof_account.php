<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\coa_type;

class chartof_account extends Model
{
    // public function childName(){
    // 	return $this->belogsto(chartof_accounts::class,'parent_id');
    // }
    public function Voucheritems(){
        return $this->hasMany(vouchar_item::class,'chartof_account_id');
    }
    public function VoucheritemsCount(){
        return $this->Voucheritems()->count();

    }

    public function balancesheetReport($report,$start,$end)
    {

    return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->where('account_type','assets')->get();
    }
    public function balancesheetReportequity($report,$start,$end)
    {

    return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->where('account_type','equity')->get();
    }

    public function trialbalanceReport($report,$start,$end)
    {
    return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->where('account_type','equity')->get();
    }
    public function transectionBalance($report,$start,$end){
        return $this->where('report_type',$report)->whereDate('created_at',[$start,$end])->get();
    }
    // public function accountName()
    // {
    //     return $this->belogsTo(coa_type::class,'coa_type_id');
    // }
    public function CoaTypeName()
    {
        return $this->belongsTo(coa_type::class, 'coa_type_id');
    }

    public function allAssets()
    {
        return $this->where('account_type','assets')->get();
    }
    public function assetsBalance($id){
        $assets=$this->where('id',$id)->first();
        $totalBalance=0;
        $totalBalance+=$totalBalance+$assets->starting_balance;
        $totalBalance+= $assets->Voucheritems->sum('debit')+ $assets->Voucheritems->sum('credit');
        return $totalBalance;
    }
    public function assetsStatus($id){
        $assets=$this->where('id',$id)->first();
        $totalDebit= $assets->Voucheritems->sum('debit');
        $totalCredit= $assets->Voucheritems->sum('credit');
        if($totalDebit == $totalCredit)
        {
            return "Balanced";
        }else{
            return "UnBalanced";
        }
    }
    public function allLiabilities()
    {
        return $this->where('account_type','liabilites')->get();
    }
    public function LiabilitiesBalance($id){
        $assets=$this->where('id',$id)->first();
        $totalBalance=0;
        $totalBalance+=$totalBalance+$assets->starting_balance;
        $totalBalance+= $assets->Voucheritems->sum('debit')+ $assets->Voucheritems->sum('credit');
        return $totalBalance;
    }
    public function LiabilitiesStatus($id){
        $assets=$this->where('id',$id)->first();
        $totalDebit= $assets->Voucheritems->sum('debit');
        $totalCredit= $assets->Voucheritems->sum('credit');
        if($totalDebit == $totalCredit)
        {
            return "Balanced";
        }else{
            return "UnBalanced";
        }
    }

    public function allExpense()
    {
        return $this->where('account_type','expense')->get();
    }
    public function ExpenseBalance($id){
        $assets=$this->where('id',$id)->first();
        $totalBalance=0;
        $totalBalance+=$totalBalance+$assets->starting_balance;
        $totalBalance+= $assets->Voucheritems->sum('debit')+ $assets->Voucheritems->sum('credit');
        return $totalBalance;
    }
    public function ExpenseStatus($id){
        $assets=$this->where('id',$id)->first();
        $totalDebit= $assets->Voucheritems->sum('debit');
        $totalCredit= $assets->Voucheritems->sum('credit');
        if($totalDebit == $totalCredit)
        {
            return "Balanced";
        }else{
            return "UnBalanced";
        }
    }
    public function allIncome()
    {
        return $this->where('account_type','income')->get();
    }
    public function IncomeBalance($id){
        $assets=$this->where('id',$id)->first();
        $totalBalance=0;
        $totalBalance+=$totalBalance+$assets->starting_balance;
        $totalBalance+= $assets->Voucheritems->sum('debit')+ $assets->Voucheritems->sum('credit');
        return $totalBalance;
    }
    public function incomeStatus($id){
        $assets=$this->where('id',$id)->first();
        $totalDebit= $assets->Voucheritems->sum('debit');
        $totalCredit= $assets->Voucheritems->sum('credit');
        if($totalDebit == $totalCredit)
        {
            return "Balanced";
        }else{
            return "UnBalanced";
        }
    }
    public function allequity()
    {
        return $this->where('account_type','equity')->get();
    }
    public function equityBalance($id){
        $assets=$this->where('id',$id)->first();
        $totalBalance=0;
        $totalBalance+=$totalBalance+$assets->starting_balance;
        $totalBalance+= $assets->Voucheritems->sum('debit')+ $assets->Voucheritems->sum('credit');
        return $totalBalance;
    }
    public function equityStatus($id){
        $assets=$this->where('id',$id)->first();
        $totalDebit= $assets->Voucheritems->sum('debit');
        $totalCredit= $assets->Voucheritems->sum('credit');
        if($totalDebit == $totalCredit)
        {
            return "Balanced";
        }else{
            return "UnBalanced";
        }
    }
}
