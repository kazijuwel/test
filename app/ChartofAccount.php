<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\coa_type;

class ChartofAccount extends Model
{
    public function balance()
    {
        if(($this->account_type == 'assets') or ($this->account_type == 'expense'))
        {
            $balance = 0;
            $balance = $this->starting_balance;
            $balance = $balance + $this->Voucheritems()->sum('debit');
            $balance = $balance - $this->Voucheritems()->sum('credit');

            return $balance;
        }
        else
        {
            $balance = 0;
            $balance = $this->starting_balance;
            $balance = $balance + $this->Voucheritems()->sum('credit');
            $balance = $balance - $this->Voucheritems()->sum('debit');

            return $balance;
        }
    }









    // public function childName(){
    // 	return $this->belogsto(chartof_accounts::class,'parent_id');
    // }
    public function Voucheritems(){
        return $this->hasMany(VoucherItem::class,'chartof_account_id');
    }

    public function journalBalance($start, $end,$balanceType){
        $balanceTypeSum = $this->Voucheritems()->whereBetween('created_at',[$start,$end])->where('chartof_account_id', $this->id)->sum($balanceType);
        $alternetType = $balanceType == 'debit' ? 'credit' : 'debit';
        $alternetTypeSum = $this->Voucheritems()->whereBetween('created_at',[$start,$end])->where('chartof_account_id', $this->id)->sum($alternetType);
        return abs($balanceTypeSum - $alternetTypeSum);

    }
    public function journalOpeningBalance($start, $end)
    {
        return 0;

    }
    public function journalTotalBalance($start,$end,$balanceType)
    {
        $balanceTypeSum = $this->Voucheritems()->whereBetween('created_at',[$start,$end])->where('chartof_account_id', $this->id)->sum($balanceType);
        return $balanceTypeSum;

    }
    public function journalBalanceWithType($start,$end,$balanceType){
        $balanceTypeSum = $this->Voucheritems()->whereBetween('created_at',[$start,$end])->where('chartof_account_id', $this->id)->sum($balanceType);
        $alternetType = $balanceType == 'debit' ? 'credit' : 'debit';
        $alternetTypeSum = $this->Voucheritems()->whereBetween('created_at',[$start,$end])->where('chartof_account_id', $this->id)->sum($alternetType);
        $finalBalancew=$balanceTypeSum - $alternetTypeSum;
        if($balanceType == "debit"){
            return $finalBalancew."dr";
        }
        else{
            return $finalBalancew."cr";
        }
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
        return $this->belongsTo(CoaType::class, 'coa_type_id');
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
        return  " ";
        // $assets=$this->where('id',$id)->first();
        // $totalDebit= $assets->Voucheritems->sum('debit');
        // $totalCredit= $assets->Voucheritems->sum('credit');
        // return  $totalDebit - $totalCredit;
        // // if($totalDebit == $totalCredit)
        // {
        //     return "Balanced";
        // }else{
        //     return "UnBalanced";
        // }
    }
    public function allLiabilities()
    {
        return $this->where('account_type','liabilities')->get();
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
    public function openingBalance($id,$date=Null,$balanceType){
        if($date==Null)
        {
            $date=date('Y-m-d');
        }

       $value1= $this->Voucheritems()->whereDate('created_at','<',$date)->sum($balanceType);
       $alternetType = $balanceType == 'debit' ? 'credit' : 'debit';
       $valu2= $this->Voucheritems()->whereDate('created_at','<',$date)->sum($alternetType);
       return $value1-$valu2;
    }

}
