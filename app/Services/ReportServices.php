<?php

namespace App\Services;
use App\Models\Order;
use App\expense;
class ReportServices
{
    protected $order;
    public function __construct(Order $order){
        $this->order=$order;
    }

    public function allJournals(){

    //    dd(1);
        $orders=Order::all();
        $orders = Order::orderBy('code', 'desc');
        $orders = $orders->has('hasdelivery');
   
        return $journals = $orders;

        }
    public function totalExpense($day=0,$month=null,$year=null){
        return (int) expense::sum('amount');
    }
    public function totalSales($day=null,$month=null,$year=null){
        return $this->order->totalSales();
    }

    public function totalPurchases($day=null,$month=null,$year=null){
        return $this->order->totalPurchases();
    }

    
    public function currentBalance(){
      return $this->order->balancedDebits() - ($this->order->balancedCredits()+$this->totalExpense());
    }

    public function totalProfit($day=null,$month=null,$year=null){
       // dd($this->order->totalDebitAmount(),$this->order->totalCreditAmount(),$this->totalExpense());
        return $this->order->totalDebitAmount() - ($this->order->totalCreditAmount()+$this->totalExpense());
    }

    public function payables(){

    }
    public function receivables(){

    }

}