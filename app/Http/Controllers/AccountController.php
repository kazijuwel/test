<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Seller;
use App\User;
use Carbon\Carbon;;
use App\expense;
use App\Product;
use App\CoaType;
use Auth;
use App\Voucher;
use App\VoucherItem;
use App\ChartofAccount;
use App\Services\ReportServices;
use App\Models\Customer;
use App\BobStore;
use App\Inventory;

class AccountController extends Controller
{
    protected $rs;
    public function __construct(ReportServices $rs){
        $this->rs=$rs;
        $this->middleware('onlyview');
    }

    public function salesinvoice(Request $request)
    {

        $date = $request->date;
        $sort_search = null;

        $orders = Order::orderBy('id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(15);
        return view('backend.account.salesInvoice', compact('orders', 'sort_search', 'date'));
    }
    public function salesorders(Request $request)
    {

        $date = $request->date;
        $sort_search = null;

        $orders = Order::orderBy('id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        // $orders = $orders->has('hasnotdelivery')->paginate(15);
        $orders = $orders->paginate(15);
        return view('backend.account.salesOrders', compact('orders', 'sort_search', 'date'));
    }
    public function salesreturn(Request $request)
    {
        $date = $request->date;
        $sort_search = null;

        $orders = Order::orderBy('id', 'desc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders= $orders->whereHas('refund_request',function($q){
            $q->select('order_id');
        })->paginate(15);

        return view('backend.account.salesReturn', compact('orders', 'sort_search', 'date'));
    }
    public function salesdelivery(Request $request)
    {

            $date = $request->date;
            $sort_search = null;

            $orders = Order::orderBy('id', 'desc');

            if ($request->has('search')){
                $sort_search = $request->search;
                $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
            }
            if ($date != null) {
                $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }
            // $orders = $orders->paginate(15);
            $orders= $orders->has('hasConfirmed')->paginate(15);
            // return $orders;
            return view('backend.account.salesDelivery', compact('orders', 'sort_search', 'date'));
    }
    public function salesreport(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $orders = Order::orderBy('id', 'desc')->where("payment_status","paid");
        $orderDetails=OrderDetail::where('delivery_status','delivered')->where("payment_status","paid");

        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        if ($date != null) {
            $orderDetails = $orderDetails->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(15);
        $OrderItemsf=$orderDetails->get();

        return view('backend.account.salesReport',compact('orders', 'sort_search', 'date','OrderItemsf'));
    }

    public function balancesheet(ReportServices $rs,Request $request)
    {
        $seller_id=$request->seller_id;
        $report=$rs;
        $expenses=expense::get();
        $todayExpense=expense::whereDate('created_at',Carbon::today()->toDateString())->get();
        // $today=Carbon::today()->toDateString();
        // dd($today);

        $grandAmount=OrderDetail::where("delivery_status","delivered")->where("payment_status","paid")->get();
        $todayAmount=OrderDetail::where("delivery_status","delivered")->where("payment_status","paid")->whereDate('created_at',Carbon::today()->toDateString())->get();
        $sellerSelects=Seller::get();
        if($seller_id){
            $sellers=Seller::where('id',$seller_id)->get();
        }else{
        $sellers=Seller::get();
        }

        return view('backend.account.balanceSheet',compact('grandAmount','sellers','sellerSelects','todayAmount','expenses','todayExpense','report'));
    }
    public function adminselectNewRole(Request $request)
    {
     $users = User::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('phone', 'like', '%'.$request->q.'%')
        // ->orWhere('name', 'like', '%'.$request->q.'%')
        ->orWhere('email', 'like', '%' . $request->q . '%')
        ->select(['name'])->take(30)->get();
    if ($users->count()) {
        if ($request->ajax()) {
            // return Response()->json(['items'=>$users]);
            return $users;
        }
    } else {
        if ($request->ajax()) {
            return $users;
        }
    }
    }
    public function sellerProductView($id){
        $saleproduct=OrderDetail::where('seller_id',$id)->where('delivery_status','delivered')->where("payment_status","paid")->paginate(15);
        return view('backend.account.sellerproduct',compact('saleproduct'));
    }
    public function salesreportorderitemwise(Request $request){
        $date = $request->date;
        $orderDetails=OrderDetail::where('delivery_status','delivered')->where("payment_status","paid");

        if ($date != null) {
            $orderDetails = $orderDetails->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $OrderItemsf=$orderDetails->paginate(15);

        return view('backend.account.salesReportorderitemwise',compact('date','OrderItemsf'));
    }
    public function balanceinvoice(Request $request){
        $date = $request->date;
        $orderDetails=OrderDetail::where('delivery_status','delivered')->where("payment_status","paid");

        if ($date != null) {
            $orderDetails = $orderDetails->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $OrderItemsf=$orderDetails->paginate(15);

        return view('backend.account.balanceinvoice',compact('date','OrderItemsf'));
    }
    public function directOrderChage(Request $request)
    {
        $orders=Order::get();
        $orderId=$request->Orderid;
        if($orderId != null)
        {
            $orderItem=order::where('code',$orderId)->first();
        }
        else{
            $orderItem=Null;
        }

        return view('backend.account.orderChage',compact('orders','orderItem'));
    }
    public function ordereditpurchaseanddelivery($id){
        $order=OrderDetail::where('id',$id)->first();
        return view('backend.account.ordereditpurchaseanddelivery',compact('order'));
    }
    public function ordereditpurchaseanddeliverysave(Request $request,$id)
    {
         $order=OrderDetail::where('id',$id)->first();
         $order->purchase_price=$request->purchase_price;
         $order->shipping_cost=$request->shipping_cost;
         $order->save();
         flash(translate('Order Updated Successfuly'))->success();
        return back();
    }
public function exportCsv(Request $request)
{
   $fileName = 'tasks.csv';
   $tasks = Product::get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 'name','model','added_by');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['id']  = $task->id;
                $row['name']    = $task->name;
                if($task->model=Null){
                    $task->model==Null;
                }else{
                    $row['model']    = " ";
                }

                $row['added_by']    = $task->added_by;
                // $row['Start Date']  = $task->start_at;
                // $row['Due Date']  = $task->end_at;

                fputcsv($file, array($row['id'],$row['name'],$row['model'],$row['added_by']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function Journal_entries(Order $order){

    $journals = $this->rs->allJournals()->paginate(15);

       return view('backend.account.Journal_entries',['journals'=>$journals]);


    }
    public function journialDetails($slug){
        $order = Order::findOrFail($slug);
        return view('backend.account.journalDetails', compact('order'));
    }
    public function account_head(){
        $CoaTypes=CoaType::get();
        return view('backend.account.account_head',compact('CoaTypes'));
    }
    public function voucher_entries(){
        return view('backend.account.voucher_entries');
    }
    public function create_CoaType(Request $request)
    {

        // $request->validate([
        //     'Destination' => 'required',
        // ]);
        $coa= new CoaType;
        $coa->type_name=$request->type_name;
        $coa->Destination=$request->Destination;
        $coa->addedby_id=Auth::id();
        $coa->save();
        return 1;



   }
   public function loadcoadataajax(Request $request){
    $coa_type=CoaType::find($request->value);
    return $coa_type;
   }
   public function chatof_Accounts_modify(CoaType $coatype){
       return view('backend.account.chatof_Accounts_modify',compact('coatype'));
   }
   public function profitandloss_newgroup(CoaType $coatype){

       return view('backend.account.profitandloss_newgroup',compact('coatype'));
   }
   public function storeprofitandlossgroup(Request $request){

       if($request->parent_id == "subgroup"){
            $aType=CoaType::where('id',$request->subgroupcategory)->first();
            $coa= new CoaType;
            $coa->name=$request->name;
            $coa->parent_id=$aType->id;
            $coa->report_type=$request->report_type;
            $coa->account_type=$aType->account_type;
            $coa->addedby_id=Auth::id();
            $coa->save();
       }else{
       $coa= new CoaType;
       $coa->name=$request->name;
       $coa->parent_id=null;
       $coa->report_type=$request->report_type;
       $coa->account_type=$request->parent_id;
       $coa->addedby_id=Auth::id();
       $coa->save();
       }
       flash(translate('Profit and Loss Created Succussfuly'))->success();
    //    return redirect()->route('chatof_Accounts_modify');
    return back();
   }
   public function balancesheet_newgroup(CoaType $coatype){

    return view('backend.account.balancesheet_newgroup',compact('coatype'));
   }
   public function storebalancesheetgroup(Request $request){

    if($request->category == "subgroup")
    {

        $aType=CoaType::where('id',$request->subgroupcategory)->first();
        $coa= new CoaType;
        $coa->name=$request->name;
        $coa->report_type=$request->report_type;
        $coa->parent_id=$aType->id;
        $coa->account_type=$aType->account_type;
        $coa->addedby_id=Auth::id();
        $coa->save();

    }else{
        $coa= new CoaType;
        $coa->name=$request->name;
        $coa->report_type=$request->report_type;
        $coa->parent_id=null;
        $coa->account_type=$request->category;
        $coa->addedby_id=Auth::id();
        $coa->save();
    }
    flash(translate('Balance Sheet Created Succussfuly'))->success();
    // return redirect()->route('chatof_Accounts_modify');
    return back();
   }
   public function profitandlossnewaccount(CoaType $coatype){

       return view('backend.account.profitandlossnewaccount',compact('coatype'));
   }
   public function storeprofitandlossaccount(Request $request){

    $ac_type=CoaType::where('id',$request->account_type)->first();
    // $cType= new CoaType;
    // $cType->name=$request->name;
    // $cType->report_type=$request->report_type;
    // $cType->parent_id=$request->account_type;
    // $cType->account_type=$ac_type->account_type;
    // $cType->addedby_id=Auth::id();
    // $cType->save();

    $coa=new ChartofAccount;
    $coa->name=$request->name;
    $coa->code=$request->code;
    $coa->report_type   =$request->report_type;
    $coa->account_type  =$ac_type->account_type;
    $coa->starting_balance=0;
    $coa->balance_type   =null;
    $coa->coa_type_id    =$request->account_type;
    //$coa->coa_type_id    =$cType->id;
    $coa->addedby_id     =Auth::id();
    $coa->save();
    flash(translate('Profit and Account Created Succussfuly'))->success();
    return back();

   }
   public function balancesheetnewaccount(CoaType  $coaType)
   {
       return view('backend.account.balancesheetnewaccount',compact('coaType'));
   }
   public function storebalancesheetnewaccount(Request $request){
    $ac_type=CoaType::where('id',$request->account_type)->first();
    // if($ac_type->parent_id !== null){
    //     $CoaType=$ac_type->parent_id;
    // }
    // else{
    //     $CoaType=$request->account_type;
    // }

   // dd($ac_type->parent_id);
    $coa=new ChartofAccount;
    $coa->name=$request->name;
    $coa->code=$request->code;
    $coa->report_type   =$request->report_type;
    $coa->account_type  =$ac_type->account_type;
    $coa->starting_balance=$request->starting_balance;
    $coa->balance_type   =$request->balance_type;
    $coa->coa_type_id    =$request->account_type;
    $coa->addedby_id     =Auth::id();
    $coa->save();
    flash(translate('Profit and Account Created Succussfuly'))->success();
    return back();
   }
   public function voucher_entries_modify(){
    $coa_all=ChartofAccount::get();
    return view('backend.account.voucher_entries_modify',compact('coa_all'));
   }
   public function storevoucherentries(Request $request)
   {
       //dd($request->all());
       $voucher=new Voucher;
       $voucher->date=$request->date;
       $voucher->name=$request->narration;
       $voucher->addedby_id=Auth::id();
       $voucher->save();

    $chart_id = $request->chart_id;
    $debit = $request->debit;
    $credit = $request->credit;
    $debitBalace=0;
    $creditBalace=0;
       for ($i=0; $i < count($chart_id); $i++) {
           $debitBalace+= $debit[$i];
           $creditBalace+= $credit[$i];
         $voucher_item=new VoucherItem;
         $voucher_item->chartof_account_id = $chart_id[$i];
         $voucher_item->debit = $debit[$i];
         $voucher_item->credit = $credit[$i];
         $voucher_item->voucher_id=$voucher->id;
         $voucher_item->addedby_id=Auth::id();
        $voucher_item->save();
       }
       $voucharupdate=Voucher::find($voucher->id);
       $voucharupdate->total_debit=$debitBalace;
       $voucharupdate->total_credit=$creditBalace;
       $voucharupdate->save();

       flash(translate('Voucher Created Succussfuly'))->success();
       return back();
   }
   public function Summary_accounts(CoaType  $coaType){
      return view('backend.account.Summary_accounts',compact('coaType'));
    }
    public function accounts_Report(){
        return view('backend.account.accounts_Reports');
    }
    public function profitandlossreport(){
        return view('backend.account.profitandlossreport');
    }
    public function createnewprofitandlossreport(Request $request){
        $reportType = $request->report_type;
        $start = $request->start ?: date('Y-m-d');
        $end = $request->end ?: date('Y-m-d');
        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';
        if($reportType == 'balance_sheet')
        {
            return back();
        }
        elseif($reportType == 'profit_loss')
        {
            $coaIncomes = CoaType::where('report_type', $reportType)->where('parent_id', null)->where('account_type', 'income')->get();
            $coaExpenses = CoaType::where('report_type', $reportType)->where('parent_id', null)->where('account_type', 'expense')->get();
            return view('backend.account.shownewprofitandlossreport',compact('coaIncomes','coaExpenses','start','end'));

        }
        else
        {
            return back();
        }

        // $start=$request->fromDate;
        // $end=$request->toDate;


        // $reportType="profit_loss";
        // $incomeChartofAccounts =ChartofAccount::where('report_type',$reportType)->whereBetween('created_at',[$start,$end])->where('account_type','income')->get();
        // $expenseChartofAccounts =ChartofAccount::where('report_type',$reportType)->whereBetween('created_at',[$start,$end])->where('account_type','expense')->get();
        // return view('backend.account.shownewprofitandlossreport',compact('incomeChartofAccounts','start','end','expenseChartofAccounts'));
    }
    public function balancesheetReport(){
        return view('backend.account.showbalancesheetreport');
    }
    public function createnewbalancesheetreport(Request $request)
    {

    $reportType = $request->report_type;

    $start = $request->start ?: date('Y-m-d');
    $end = $request->end ?: date('Y-m-d');

        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';
    if($reportType == 'balance_sheet')
    {
        $coaAssets = CoaType::where('report_type', $reportType)->where('parent_id', null)->where('account_type', 'assets')->get();
        $coaLiabilities = CoaType::where('report_type', $reportType)->where('parent_id', null)->where('account_type', 'liabilities')->get();
        return view('backend.account.balancesheetreports',compact('coaAssets','coaLiabilities','start','end'));
    }
    elseif($reportType == 'profit_loss')
    {

    }
    else
    {
        return back();
    }

        // dd($coaType);
        // $reportType="balance_sheet";
        // // $start=$request->start . ' 00:00:00';
        // // $end=$request->end . ' 23:59:59';
        // $balancesheetassets= $coaType->balancesheetReport($reportType, $start, $end);
        // $balancesheetequity= $coaType->balancesheetReportequity($reportType, $start, $end);

        // // dd($balancesheetassets);
        // // dd($balancesheetequity);

        // return view('backend.account.balancesheetreports',compact('balancesheetassets','balancesheetequity','start','end'));
    }
    public function trial_balance_report()
    {
        return view('backend.account.trial_balance_report');

    }
    public function general_ledger_summery(){
        return view('backend.account.general_ledger_summery');
    }
    public function general_ledger_transection(){
        return view('backend.account.general_ledger_transection');
    }
    public function creategenerelledgertransactionreport(Request $request)
    {
        $reportType = $request->reportType;
        $start = $request->start ?: date('Y-m-d');
        $end = $request->end ?: date('Y-m-d');
        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';

        if($reportType == 'ledger_transection')
        {

            $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id')->count();

            if($ids >0)
            {
                $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id');
                $chartofAssetAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','assets')->get();
                $chartofExpenseAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','expense')->get();
                $chartofIncomeAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','income')->get();
                $chartofLiabilitiesAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','liabilities')->get();

                return view('backend.account.creategenarelledgertransectionreport',compact('chartofAssetAccounts','chartofExpenseAccounts','chartofIncomeAccounts','chartofLiabilitiesAccounts','start','end'));
            }else{
                $ids=VoucherItem::groupBy('chartof_account_id')->pluck('chartof_account_id');
                $chartofAssetAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','assets')->get();
                $chartofExpenseAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','expense')->get();
                $chartofIncomeAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','income')->get();
                $chartofLiabilitiesAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','liabilities')->get();

                return view('backend.account.creategenarelledgertransectionreportopening',compact('chartofAssetAccounts','chartofExpenseAccounts','chartofIncomeAccounts','chartofLiabilitiesAccounts','start','end'));
            }


        }
        elseif($reportType == 'trial_balance')
        {
            // $coaIncomes = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'income')->get();
            // $coaExpenses = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'expense')->get();
            // $coaAssets = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'assets')->get();
            // $coaLiabilities = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'liabilities')->get();
            // return view('backend.account.createtrialbalancereport',compact('coaAssets','coaLiabilities','coaIncomes','coaExpenses','start','end'));

        }
        else
        {
            return back();
        }

        // $reportType="balance_sheet";
        // $start=$request->start;
        // $end=$request->end;
        // $transectionBalance= $vouchar_item->transectionBalance($reportType, $start, $end);
        // return view('backend.account.creategenarelledgertransectionreport',compact('transectionBalance','start','end'));
    }
    public function createtrialbalancereport(CoaType $CoaType,Request $request)
    {
        $reportType = $request->report_type;
        $start = $request->start ?: date('Y-m-d');
        $end = $request->end ?: date('Y-m-d');
        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';

        if($reportType == 'balance_sheet')
        {
            return back();
        }
        elseif($reportType == 'trial_balance')
        {
            $coaIncomes = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'income')->get();
            $coaExpenses = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'expense')->get();
            $coaAssets = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'assets')->get();
            $coaLiabilities = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'liabilities')->get();
            return view('backend.account.createtrialbalancereport',compact('coaAssets','coaLiabilities','coaIncomes','coaExpenses','start','end'));

        }
        else
        {
            return back();
        }

        // $start=$request->start;
        // $end=$request->end;
        // $trialProfit= $CoaType->trialProfit('profit_loss', $start, $end);
        // $trialBalanceSheets= $CoaType->trialBalance('balance_sheet', $start, $end);
        // return view('backend.account.createtrialbalancereport',compact('trialProfit','trialBalanceSheets','start','end'));
    }
    public function createGeneralLedgerSummery(CoaType $CoaType,Request $request)
    {
        $reportType = $request->report_type;
        $start = $request->start ?: date('Y-m-d');
        $end = $request->end ?: date('Y-m-d');
        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';

        if($reportType == 'balance_sheet')
        {
            return back();
        }
        elseif($reportType == 'general_ledger_summery')
        {
            $coaIncomes = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'income')->get();
            $coaExpenses = CoaType::where('report_type', 'profit_loss')->where('parent_id', null)->where('account_type', 'expense')->get();
            $coaAssets = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'assets')->get();
            $coaLiabilities = CoaType::where('report_type', 'balance_sheet')->where('parent_id', null)->where('account_type', 'liabilities')->get();
            return view('backend.account.createGeneralLedgerSummery',compact('coaAssets','coaLiabilities','coaIncomes','coaExpenses','start','end'));

        }
        else
        {
            return back();
        }

        // $start=$request->start;
        // $end=$request->end;
        // $profitandloss = $CoaType->balanceProfitAndLoss('profit_loss', $start, $end);
        // $balanceSheets = $CoaType->balanceforBalanceSheet('balance_sheet', $start, $end);
        // return view('backend.account.createGeneralLedgerSummery',compact('profitandloss','balanceSheets','start','end'));
    }
    public function allvoucherlist(Request $request){
    //    ?type=search&q=product
        $q ='';

        $vouchars=Voucher::orderby('id','desc')->paginate(15);
        if($request->ajax()){
            $q = $request->q;
            $vouchars=Voucher::orderby('id','desc')->paginate(15);
            return view('backend.account.voucherlist',compact('vouchars','q'))->render();
        }
        return view('backend.account.allvoucherlist',compact('vouchars','q'));
    }
    public function allvoucherSearch(Request $request)
    {
        $q = $request->q;
        $vouchars= Voucher::where('name',"like","%".$q."%")->orWhereDate('created_at',$q)->orderby('id','desc')->paginate(15);
        return view('backend.account.voucherlist',compact('vouchars','q'))->render();
    }
    public function vourcherview($id){
        $voucher=Voucher::where('id',$id)->first();
        return view('backend.account.voucherviews',compact('voucher'));
    }
    public function vourcheredit($id){
        $coa_all=ChartofAccount::get();
        $voucher=Voucher::where('id',$id)->first();
        return view('backend.account.voucheredit',compact('voucher','coa_all'));

    }
    public function updatevoucherentries(Request $request)
    {
        $id=$request->oldvoucherID;
        $voucher=Voucher::where('id',$id)->delete();
        $voucheritems=VoucherItem::where('voucher_id',$id)->delete();


        $voucher=new Voucher;
        $voucher->date=$request->date;
        $voucher->name=$request->narration;
        $voucher->addedby_id=Auth::id();
        $voucher->save();

     $chart_id = $request->chart_id;
     $debit = $request->debit;
     $credit = $request->credit;
     $debitBalace=0;
     $creditBalace=0;
        for ($i=0; $i < count($chart_id); $i++) {
            $debitBalace+= $debit[$i];
            $creditBalace+= $credit[$i];
          $voucher_item=new VoucherItem;
          $voucher_item->chartof_account_id = $chart_id[$i];
          $voucher_item->debit = $debit[$i];
          $voucher_item->credit = $credit[$i];
          $voucher_item->voucher_id=$voucher->id;
          $voucher_item->addedby_id=Auth::id();
         $voucher_item->save();
        }
        $voucharupdate=Voucher::find($voucher->id);
        $voucharupdate->total_debit=$debitBalace;
        $voucharupdate->total_credit=$creditBalace;
        $voucharupdate->save();

        flash(translate('Voucher Updated Succussfuly'))->success();
        return redirect()->route('allvoucherlist');

    }
    public function voucherentriesdelete($id){
        $type=Voucher::where('id',$id)->first();
        $typeName=$type->create_type;
        $orderId=$type->order_id;
        Order::where('id',$orderId)
            ->update([
                $typeName => Null
                ]);

        $voucher=Voucher::where('id',$id)->delete();
        $voucheritems=VoucherItem::where('voucher_id',$id)->delete();
        flash(translate('Voucher Deleted Succussfuly'))->success();
        return redirect()->route('allvoucherlist');
    }
    public function profitGroupEdit($id)
    {
        $coa_types =CoaType::find($id);
        return view('backend.account.profitGroupEdit',compact('coa_types'));
    }
    public function profitAccountview($id,CoaType $coaType)
    {
        $co_Accounts=ChartofAccount::where('id',$id)->first();
        return view('backend.account.profitAccountview',compact('co_Accounts','coaType'));
    }
    public function updateprofitandlossgroup(Request $request){
        $aType=CoaType::where('id',$request->subgroupcategory)->first();
        if($request->parent_id == "subgroup")
        {
            $coa= CoaType::find($request->coatype_id);
            $coa->name=$request->name;
            $coa->report_type=$request->report_type;
            $coa->parent_id=$aType->id;
            $coa->account_type=$aType->account_type;
            $coa->addedby_id=Auth::id();
            $coa->save();
            $chartOfAccount=ChartofAccount::where('coa_type_id',$request->coatype_id)->update(array('account_type' => $aType->account_type));

        }else{
            $coa=CoaType::find($request->coatype_id);
            $coa->name=$request->name;
            $coa->report_type=$request->report_type;
            $coa->parent_id=null;
            $coa->account_type=$request->parent_id;
            $coa->addedby_id=Auth::id();
            $coa->save();
            $chartOfAccount=ChartofAccount::where('coa_type_id',$request->coatype_id)->update(array('account_type' => $request->parent_id));
        }

        flash(translate('profit and Loss Updated  Succussfuly'))->success();
        return redirect()->route('chatof_Accounts_modify');

    //     $coaId=$request->coatype_id;
    //     $coa=CoaType::find($coaId);
    //     $coa->name=$request->name;
    //     $coa->parent_id=null;
    //     $coa->report_type=$request->report_type;
    //     $coa->account_type=$request->parent_id;
    //     $coa->editedby_id=Auth::id();
    //     $coa->save();

    //    $childAccount= CoaType::where('parent_id',$coaId)->update(array('account_type' => $request->parent_id));

    //    $chartOfAccount=ChartofAccount::where('coa_type_id',$coaId)->update(array('account_type' => $request->parent_id));

        flash(translate('Profit and Loss Group Updated Succussfuly'))->success();
        return back();
    }
    public function deleteprofitandlossgroup($id)
    {
        $co_Accounts=ChartofAccount::where('coa_type_id',$id)->get();
        foreach($co_Accounts as $co_item){

            foreach($co_item->Voucheritems as $vItem){
                Voucher::where('id',$vItem->voucher_id)->delete();
                VoucherItem::where('voucher_id',$vItem->voucher_id)->delete();

            }

        }
        ChartofAccount::where('coa_type_id',$id)->delete();
        CoaType::where('id',$id)->delete();
        flash(translate('Profit and Loss Group Deleted Succussfuly'))->success();
        return back();

    }
    public function profitChildGroupDelete($id){
        $co_Accounts=ChartofAccount::where('id',$id)->get();
        foreach($co_Accounts as $co_item){

            foreach($co_item->Voucheritems as $vItem){
                Voucher::where('id',$vItem->voucher_id)->delete();
                VoucherItem::where('voucher_id',$vItem->voucher_id)->delete();

            }

        }
        ChartofAccount::where('id',$id)->delete();
        flash(translate('Profit and Loss Account Deleted Succussfuly'))->success();
        return redirect()->route('managechartofaccouts');

    }
    public function profitChildGroupEdit($id,CoaType $coaType){

        $co_Accounts=ChartofAccount::where('id',$id)->first();
        return view('backend.account.profitChildGroupEdit',compact('co_Accounts','coaType'));

       }
       public function balancesheetaccountedit($id,CoaType $coaType){
        $co_Accounts=ChartofAccount::where('id',$id)->first();
        return view('backend.account.balancesheetAccount',compact('co_Accounts','coaType'));
       }
    public function updatebalancesheetAccount(Request $request){
    $aType=CoaType::where('id',$request->subgroupcategory)->first();
    if($request->category == "subgroup")
    {
            $coa= CoaType::find($request->coaId);
            $coa->name=$request->name;
            $coa->report_type=$request->report_type;
            $coa->parent_id=$aType->id;
            $coa->account_type=$aType->account_type;
            $coa->addedby_id=Auth::id();
            $coa->save();
            $chartOfAccount=ChartofAccount::where('coa_type_id',$request->coaId)->update(array('account_type' => $aType->account_type));

        }else{
            $coa=CoaType::find($request->coaId);
            $coa->name=$request->name;
            $coa->report_type=$request->report_type;
            $coa->parent_id=null;
            $coa->account_type=$request->category;
            $coa->addedby_id=Auth::id();
            $coa->save();
            $chartOfAccount=ChartofAccount::where('coa_type_id',$request->coaId)->update(array('account_type' => $request->category));
        }

        flash(translate('Balance Sheet Created Succussfuly'))->success();
        return redirect()->route('managechartofaccouts');


       }
       public function UpdatechildBalanceSheetAccount($id,CoaType $coaType){
           $chartOfid=ChartofAccount::find($id);
           return view('backend.account.UpdatechildBalanceSheetAccount',compact('chartOfid','coaType'));
       }
       public function mainBalanceSheetGroupEdit($id,CoaType $coatype )
       {
         $bAccouts=CoaType::where('id',$id)->first();
        return view('backend.account.mainBalanceSheetGroupEdit',compact('bAccouts','coatype'));
       }
   public function updategroupbalancesheetgroup(Request $request){
    $aType=CoaType::where('id',$request->parent_id)->first();
    $coa=CoaType::find($request->coaId);
    $coa->name=$request->name;
    $coa->report_type=$request->report_type;
    $coa->parent_id=$request->parent_id;
    $coa->account_type=$aType->account_type;
    $coa->editedby_id=Auth::id();
    flash(translate('BalanceSheet group Updated Succussfuly'))->success();
    return redirect()->route('chatof_Accounts_modify');

   }
   public function deletebalanceSheetMainGroup($id){
    $coa=ChartofAccount::where('id',$id)->get();
    foreach($coa as $co_item){
        foreach($co_item->Voucheritems as $vItem){
            Voucher::where('id',$vItem->voucher_id)->delete();
            VoucherItem::where('voucher_id',$vItem->voucher_id)->delete();

        }

    }
    ChartofAccount::where('coa_type_id',$id)->delete();
    CoaType::where('id',$id)->delete();
    flash(translate('Group Deleted Succussfuly'))->success();
    return back();

   }
//    public function viewbalancesheet()
   public function updatebalancesheetaccounts(Request $request){
    $ac_type=CoaType::where('id',$request->account_type)->first();
    $coa=ChartofAccount::find($request->chartofId);
    $coa->name=$request->name;
    $coa->code=$request->code;
    $coa->report_type   =$request->report_type;
    $coa->account_type  =$ac_type->account_type;
    $coa->starting_balance=$request->starting_balance;
    $coa->balance_type   =$request->balance_type;
    $coa->coa_type_id    =$request->account_type;
    $coa->editedby_id    =Auth::id();
    $coa->save();
    flash(translate('BalanceSheet Account Updated Successfuly'))->success();
    return redirect()->route('managechartofaccouts');
   }
   public function deleteBalaceSheetAccounts($id){
    $chartof_id=ChartofAccount::where('id',$id)->first();
    foreach($chartof_id->Voucheritems as $vItem){
        Voucher::where('id',$vItem->voucher_id)->delete();
        VoucherItem::where('voucher_id',$vItem->voucher_id)->delete();
    }
    ChartofAccount::where('id',$id)->delete();
    flash(translate('BalanceSheet Account Deleted Succussfuly'))->success();
    return back();

   }
   public function subgroupBalaceSheetEdit($id)
   {
       $co_type=CoaType::where('id',$id)->first();
       return view('backend.account.subgroupBalaceSheetEdit',compact('co_type'));
   }

   public function managechartofaccouts(){

    $bsCoaTypes = CoaType::where('parent_id', null)->where('report_type', 'balance_sheet')->get();

    $plCoaTypes = CoaType::where('parent_id', null)->where('report_type', 'profit_loss')->get();


       return view('backend.account.managechartofaccouts',compact('bsCoaTypes', 'plCoaTypes'));
   }
   public function viewbalancesheet($id,CoaType $coaType){
    $co_Accounts=ChartofAccount::where('id',$id)->first();
    return view('backend.account.balancesheetAccountview',compact('co_Accounts','coaType'));
}
   public function VoucherItems(Request $request){
        $reportType = $request->report_type;
        $sheetName=$request->sheetname;
        $start = $request->start ?: date('Y-m-d');
        $end = $request->end ?: date('Y-m-d');
        $start=$start . ' 00:00:00';
        $end=$end . ' 23:59:59';
        $id=$request->id;
        $balanceType =$request->balanceType;
       if($sheetName=='balance_sheet'){
        $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->orderBy('id','desc')->get();
        return view('backend.account.voucheritemshowbalancehsheet',compact('VoucherItems','balanceType','start','end'));
       }
       if($sheetName=='profit_loss'){
        $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->orderBy('id','desc')->get();
        return view('backend.account.voucheritemshowbalancehsheet',compact('VoucherItems','balanceType','start','end'));
       }
       if($sheetName=='trial_balance'){
        $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->orderBy('id','desc')->get();
        return view('backend.account.voucheritemshowbalancehsheet',compact('VoucherItems','balanceType','start','end'));
       }
       if($sheetName=='ledger_trans'){
        $voucher=Voucher::where('id',$id)->first();
        return view('backend.account.voucherviews',compact('voucher'));
       }
       if($sheetName == 'ledger_summery')
       {
        // if( $balanceType =="debit"){
            $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->get();
            return view('backend.account.voucheritemshow',compact('VoucherItems','balanceType'));

        //    }elseif( $balanceType =="credit"){
        //     $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->get();
        //     return view('backend.account.voucheritemshow',compact('VoucherItems','balanceType'));

        //    }
        //    else{
        //     $VoucherItems =VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$id)->get();
        //     return view('backend.account.voucheritemshow',compact('VoucherItems','balanceType'));

        //    }
       }


   }
   //website Entry----

public function order_purchase_added($id){
    $order=Order::where('id',$id)->first();
    $order->purchase_add=1;
    $order->save();

       $voucher=new Voucher;
       $voucher->date= date('Y-m-d');
       $voucher->name= "bob".$order->id;
       $voucher->create_type= "purchase_add";
       $voucher->order_id=$order->id;
       $voucher->addedby_id=Auth::id();
       $voucher->type="supplier";
       $voucher->save();
       $debitBalace=0;
       $creditBalace=0;
       $purchaseAccount=ChartofAccount::where('name','Local Purchase')->first();
       $AccPayable_id=ChartofAccount::where('name','Accounts Payable / Supplier')->first();
       if($purchaseAccount && $AccPayable_id){

        foreach($order->orderDetails as $item){
            $creditBalace+= $item->purchase_price;
            $debitBalace+= $item->purchase_price;


            $voucher_item=new VoucherItem;
            $voucher_item->chartof_account_id = $purchaseAccount->id;
            $voucher_item->debit = $item->purchase_price;
            $voucher_item->credit = 0;
            $voucher_item->voucher_id=$voucher->id;
            $voucher_item->seller_id=$item->seller_id;
            $voucher_item->type="supplier";
            $voucher_item->order_id=$order->id;
            $voucher_item->orderitem_id=$item->id;
            $voucher_item->save();

            $voucher_item=new VoucherItem;
            $voucher_item->chartof_account_id =$AccPayable_id->id;
            $voucher_item->debit =0;
            $voucher_item->credit = $item->purchase_price;
            $voucher_item->voucher_id=$voucher->id;
            $voucher_item->seller_id=$item->seller_id;
            $voucher_item->type="supplier";
            $voucher_item->order_id=$order->id;
            $voucher_item->orderitem_id=$item->id;
            $voucher_item->save();

            //create Inventory


            $inv = Inventory::where('order_item_id', $item->id)->where('purchase_entry', false)->first();
            if($inv)
            {
                $inv->purchase_quentity=$item->quantity;
                $inv->purchase_vouchar_id=$voucher->id;
                $inv->purchase_entry=true;
                $inv->stock_quentity = $inv->purchase_quentity - $inv->sale_quentity;
                $inv->save();
            }
            else
            {
                $inv =new Inventory;
                $inv->seller_id=$item->seller_id;
                $inv->order_id=$order->id;
                $inv->order_item_id=$item->id;
                $inv->product_id=$item->product_id;
                $inv->purchase_quentity=$item->quantity;
                $inv->purchase_vouchar_id=$voucher->id;
                $inv->stock_quentity = $inv->purchase_quentity - $inv->sale_quentity;
                $inv->purchase_entry=true;
                $inv->addedby_id=Auth::id();
                $inv->save();
            }



        }
        $voucharupdate=Voucher::find($voucher->id);
        $voucharupdate->total_debit=$debitBalace;
        $voucharupdate->total_credit=$creditBalace;
        $voucharupdate->save();


       flash(translate('Voucher Purchase Created Succussfuly'))->success();
       return back();

       }
       else{
        flash(translate('Account Not Found!Some Thing want worng'))->success();
        return back();
       }

}
public function order_purchase_Paid($id){

    $order=Order::where('id',$id)->first();
    $order->purchase_paid=1;
    $order->save();

       $voucher=new Voucher;
       $voucher->date= date('Y-m-d');
       $voucher->name= "bob".$order->id;
       $voucher->create_type= "purchase_paid";
       $voucher->addedby_id=Auth::id();
       $voucher->order_id=$order->id;
       $voucher->type="supplier";
       $voucher->save();
       $debitBalace=0;
       $creditBalace=0;
       $cash=ChartofAccount::where('name','Checking Account Cash')->first();
       $AccPayable=ChartofAccount::where('name','Accounts Payable / Supplier')->first();
       if($cash && $AccPayable){

        foreach($order->orderDetails as $item){
            $creditBalace+= $item->purchase_price;
            $debitBalace+= $item->purchase_price;


            $voucher_item=new VoucherItem;
            $voucher_item->chartof_account_id = $AccPayable->id;
            $voucher_item->debit = $item->purchase_price;
            $voucher_item->credit = 0;
            $voucher_item->voucher_id=$voucher->id;
            $voucher_item->seller_id=$item->seller_id;
            $voucher_item->type="supplier";
            $voucher_item->order_id=$order->id;
            $voucher_item->orderitem_id=$item->id;
            $voucher_item->save();

            $voucher_item=new VoucherItem;
            $voucher_item->chartof_account_id =$cash->id;
            $voucher_item->debit =0;
            $voucher_item->credit = $item->purchase_price;
            $voucher_item->voucher_id=$voucher->id;
            $voucher_item->seller_id=$item->seller_id;
            $voucher_item->type="supplier";
            $voucher_item->order_id=$order->id;
            $voucher_item->orderitem_id=$item->id;
            $voucher_item->save();

        }
        $voucharupdate=Voucher::find($voucher->id);
        $voucharupdate->total_debit=$debitBalace;
        $voucharupdate->total_credit=$creditBalace;
        $voucharupdate->save();

       }
       else{
        flash(translate('Account Not Found!Something went Wrong.'))->success();
        return back();
       }


       flash(translate('Purchase Paid Voucher Created Successfuly'))->success();
       return back();

}
public function refreshpurchase($id){

    // $product->purchase_price * $cartItem['quantity'];
        $order=Order::where('id',$id)->first();
         foreach($order->orderDetails as $item){

            $purchasePrice=$item->product->purchase_price * $item->quantity;
            $item->purchase_price=$purchasePrice;
            $item->save();
          }



    // $vouchers=Voucher::where('order_id',$id)->whereIn('create_type',['purchase_add','purchase_paid'])->get();
    // foreach($vouchers as $v)
    // {

    //     $v->voucherItems()->delete();
    //     $v->delete();
    // }
    // $order=Order::where('id',$id)->first();
    // $voucher=new Voucher;
    // $voucher->date= date('Y-m-d');
    // $voucher->name= "bob".$order->id;
    // $voucher->create_type= "purchase_add";
    // $voucher->order_id=$order->id;
    // $voucher->addedby_id=Auth::id();
    // $voucher->type="supplier";
    // $voucher->save();
    // $debitBalace=0;
    // $creditBalace=0;
    // $purchaseAccount=ChartofAccount::where('name','Local Purchase')->first();
    // $AccPayable_id=ChartofAccount::where('name','Accounts Payable / Supplier')->first();
    // if($purchaseAccount && $AccPayable_id){

    //  foreach($order->orderDetails as $item){
    //      if($item->product){
    //         $purchasePrice=$item->product->purchase_price * $item->quantity;
    //       }else{
    //         $purchasePrice=$item->purchase_price;
    //       }
    //      $creditBalace+= $purchasePrice;
    //      $debitBalace+= $purchasePrice;


    //      $voucher_item=new VoucherItem;
    //      $voucher_item->chartof_account_id = $purchaseAccount->id;
    //      $voucher_item->debit = $purchasePrice;
    //      $voucher_item->credit = 0;
    //      $voucher_item->voucher_id=$voucher->id;
    //      $voucher_item->seller_id=$item->seller_id;
    //      $voucher_item->type="supplier";
    //      $voucher_item->order_id=$order->id;
    //      $voucher_item->orderitem_id=$item->id;
    //      $voucher_item->save();

    //      $voucher_item=new VoucherItem;
    //      $voucher_item->chartof_account_id =$AccPayable_id->id;
    //      $voucher_item->debit =0;
    //      $voucher_item->credit = $purchasePrice;
    //      $voucher_item->voucher_id=$voucher->id;
    //      $voucher_item->seller_id=$item->seller_id;
    //      $voucher_item->type="supplier";
    //      $voucher_item->order_id=$order->id;
    //      $voucher_item->orderitem_id=$item->id;
    //      $voucher_item->save();

    //  }
    //  $inv = Inventory::where('order_id', $id)->first();
    //  if($inv)
    //  {
    //      $inv->purchase_vouchar_id=$voucher->id;
    //      $inv->save();
    //  }

    //  $voucharupdate=Voucher::find($voucher->id);
    //  $voucharupdate->total_debit=$debitBalace;
    //  $voucharupdate->total_credit=$creditBalace;
    //  $voucharupdate->save();
    // }

    //  $voucher=new Voucher;
    //  $voucher->date= date('Y-m-d');
    //  $voucher->name= "bob".$order->id;
    //  $voucher->create_type= "purchase_paid";
    //  $voucher->addedby_id=Auth::id();
    //  $voucher->order_id=$order->id;
    //  $voucher->type="supplier";
    //  $voucher->save();
    //  $debitBalace=0;
    //  $creditBalace=0;
    //  $cash=ChartofAccount::where('name','Checking Account Cash')->first();
    //  $AccPayable=ChartofAccount::where('name','Accounts Payable / Supplier')->first();
    //  if($cash && $AccPayable){

    //   foreach($order->orderDetails as $item){
    //     if($item->product){
    //         $purchasePrice=$item->product->purchase_price * $item->quantity;
    //       }else{
    //         $purchasePrice=$item->purchase_price;
    //       }


    //       $creditBalace+=  $purchasePrice;
    //       $debitBalace+=   $purchasePrice;


    //       $voucher_item=new VoucherItem;
    //       $voucher_item->chartof_account_id = $AccPayable->id;
    //       $voucher_item->debit =  $purchasePrice;
    //       $voucher_item->credit = 0;
    //       $voucher_item->voucher_id=$voucher->id;
    //       $voucher_item->seller_id=$item->seller_id;
    //       $voucher_item->type="supplier";
    //       $voucher_item->order_id=$order->id;
    //       $voucher_item->orderitem_id=$item->id;
    //       $voucher_item->save();

    //       $voucher_item=new VoucherItem;
    //       $voucher_item->chartof_account_id =$cash->id;
    //       $voucher_item->debit =0;
    //       $voucher_item->credit =  $purchasePrice;
    //       $voucher_item->voucher_id=$voucher->id;
    //       $voucher_item->seller_id=$item->seller_id;
    //       $voucher_item->type="supplier";
    //       $voucher_item->order_id=$order->id;
    //       $voucher_item->orderitem_id=$item->id;
    //       $voucher_item->save();

    //   }
    //   $voucharupdate=Voucher::find($voucher->id);
    //   $voucharupdate->total_debit=$debitBalace;
    //   $voucharupdate->total_credit=$creditBalace;
    //   $voucharupdate->save();
    // }
    flash(translate('Refresh Successfuly'))->success();
    return back();

}
public function order_sales_paid($id){
    $order=Order::where('id',$id)->first();
    $order->sales_paid=1;
    $order->save();

   $voucher=new Voucher;
   $voucher->date= date('Y-m-d');
   $voucher->name= "bob".$order->id;
   $voucher->addedby_id=Auth::id();
   $voucher->order_id=$order->id;
   $voucher->create_type= "sales_paid";
   $voucher->type="customer";
   $voucher->save();
   $debitBalace=0;
   $creditBalace=0;
   $cash=ChartofAccount::where('name','Checking Account Cash')->first();
   $accRec=ChartofAccount::where('name','Accounts Receivables / Customer')->first();
    if($cash && $accRec){

        foreach($order->orderDetails as $item){
            $creditBalace+= $item->price + $item->delivry_methods_charge;
            $debitBalace+= $item->price +$item->delivry_methods_charge;
            //sales
         $voucher_item=new VoucherItem;
         $voucher_item->chartof_account_id = $cash->id;
         $voucher_item->debit = $item->price + $item->delivry_methods_charge;
         $voucher_item->credit = 0;
         $voucher_item->voucher_id=$voucher->id;
         $voucher_item->user_id=$order->user_id;
         $voucher_item->type="customer";
         $voucher_item->order_id=$order->id;
         $voucher_item->orderitem_id=$item->id;
         $voucher_item->save();
            //Receivable
         $voucher_item=new VoucherItem;
         $voucher_item->chartof_account_id =$accRec->id;
         $voucher_item->debit = 0;
         $voucher_item->credit = $item->price + $item->delivry_methods_charge;
         $voucher_item->voucher_id=$voucher->id;
         $voucher_item->user_id=$order->user_id;
         $voucher_item->type="customer";
         $voucher_item->order_id=$order->id;
         $voucher_item->orderitem_id=$item->id;
         $voucher_item->save();

        }
        $voucharupdate=Voucher::find($voucher->id);
        $voucharupdate->total_debit=$debitBalace;
        $voucharupdate->total_credit=$creditBalace;
        $voucharupdate->save();
        flash(translate('Sales Paid Created Successfuly'))->success();
        return back();
    }
    else{
        flash(translate('Account Not Found!Something Went Wrong'))->success();
        return back();

    }

}

public function order_sales_added($id){
    $order=Order::where('id',$id)->first();
    $order->sales_add=1;
    $order->save();

   $voucher=new Voucher;
   $voucher->date= date('Y-m-d');
   $voucher->name= "bob".$order->id;
   $voucher->create_type= "sales_add";
   $voucher->order_id=$order->id;
   $voucher->addedby_id=Auth::id();
   $voucher->type="customer";
   $voucher->save();
   $debitBalace=0;
   $creditBalace=0;

   $sales=ChartofAccount::where('name','Sales')->first();
   $accRec=ChartofAccount::where('name','Accounts Receivables / Customer')->first();

   if($sales &&  $accRec){
    foreach($order->orderDetails as $item){
        $creditBalace+= $item->price + $item->delivry_methods_charge;
        $debitBalace+= $item->price + $item->delivry_methods_charge;
        //sales
     $voucher_item=new VoucherItem;
     $voucher_item->chartof_account_id =$accRec->id;
     $voucher_item->debit = $item->price +$item->delivry_methods_charge;
     $voucher_item->credit = 0;
     $voucher_item->voucher_id=$voucher->id;
     $voucher_item->user_id=$order->user_id;
     $voucher_item->type="customer";
     $voucher_item->order_id=$order->id;
     $voucher_item->orderitem_id=$item->id;
     $voucher_item->save();
        //Receivable
     $voucher_item=new VoucherItem;
     $voucher_item->chartof_account_id = $sales->id;
     $voucher_item->debit = 0;
     $voucher_item->credit = $item->price + $item->delivry_methods_charge;
     $voucher_item->voucher_id=$voucher->id;
     $voucher_item->user_id=$order->user_id;
     $voucher_item->order_id=$order->id;
     $voucher_item->type="customer";
     $voucher_item->orderitem_id=$item->id;
     $voucher_item->save();
    //Inventory sales

    $inv = Inventory::where('order_item_id', $item->id)->where('sales_entry', false)->first();
            if($inv)
            {
                $inv->sale_quentity=$item->quantity;
                $inv->sale_voucher_id=$voucher->id;
                $inv->customer_id=$order->user_id;
                $inv->stock_quentity = $inv->purchase_quentity - $inv->sale_quentity;
                $inv->sales_entry=true;
                $inv->save();
            }
            else
            {
                $inv =new Inventory;
                $inv->seller_id=$item->seller_id;
                $inv->order_id=$order->id;
                $inv->order_item_id=$item->id;
                $inv->product_id=$item->product_id;
                $inv->sale_quentity=$item->quantity;
                $inv->sale_voucher_id=$voucher->id;
                $inv->customer_id=$order->user_id;
                $inv->stock_quentity = $inv->purchase_quentity - $inv->sale_quentity;
                $inv->sales_entry=true;
                $inv->addedby_id=Auth::id();
                $inv->save();
            }



     }

    $voucharupdate=Voucher::find($voucher->id);
    $voucharupdate->total_debit=$debitBalace;
    $voucharupdate->total_credit=$creditBalace;
    $voucharupdate->save();

    flash(translate('Sales Add voucher Created Succussfuly'))->success();
    return back();

   }
   else{
    flash(translate('Account Not Found!Something Went Wrong'))->success();
    return back();

   }


}


 public function accountDetailsview($id)
 {
     $coa = ChartOfAccount::find($id);
     $v_items=VoucherItem::where('chartof_account_id',$id)->paginate(500);

     return view('backend.account.accountDetailsview',compact('v_items','coa'));
 }
 public function ledger_searching()
 {
     $chartofAccounts=ChartofAccount::orderby('name','asc')->get();
     return view('backend.account.ledger_searching',compact('chartofAccounts'));
 }
 public function createledger(Request $request,VoucherItem $account)
 {
    $start = $request->start ?: date('Y-m-d');
    $end = $request->end ?: date('Y-m-d');
    $start=$start . ' 00:00:00';
    $end=$end . ' 23:59:59';
    if($request->chart_account==null)
    {
        $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id');
        $chartofAssetAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','assets')->get();
        $chartofExpenseAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','expense')->get();
        $chartofIncomeAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','income')->get();
        $chartofLiabilitiesAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','liabilities')->get();
        return view('backend.account.creategenarelledgertransectionreport',compact('chartofAssetAccounts','chartofExpenseAccounts','chartofIncomeAccounts','chartofLiabilitiesAccounts','start','end'));

    }
    else{
        $chartofAccount=ChartofAccount::where('id',$request->chart_account)->first();
        $chartofAccountName=$chartofAccount->name;
        $chartofAccountId=$chartofAccount->id;


        $chartofAccounts=VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$request->chart_account)->get();

        // $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id');
        // $chartofAccounts=ChartofAccount::where('id',$request->chart_account)->first();
        return view('backend.account.createledger',compact('chartofAccountName','chartofAccounts','start','end','chartofAccountId','account'));


    }

    // if($reportType == 'ledger_transection')
    // {

    //     $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id')->count();

    //     if($ids >0)
    //     {
            // $ids=VoucherItem::whereBetween('created_at',[$start,$end])->groupBy('chartof_account_id')->pluck('chartof_account_id');
            // $chartofAssetAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','assets')->get();
            // $chartofExpenseAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','expense')->get();
            // $chartofIncomeAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','income')->get();
            // $chartofLiabilitiesAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','liabilities')->get();

            // return view('backend.account.creategenarelledgertransectionreport',compact('chartofAssetAccounts','chartofExpenseAccounts','chartofIncomeAccounts','chartofLiabilitiesAccounts','start','end'));
    //     }else{
    //         $ids=VoucherItem::groupBy('chartof_account_id')->pluck('chartof_account_id');
    //         $chartofAssetAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','assets')->get();
    //         $chartofExpenseAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','expense')->get();
    //         $chartofIncomeAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','income')->get();
    //         $chartofLiabilitiesAccounts=ChartofAccount::whereIn('id',$ids)->where('account_type','liabilities')->get();

    //         return view('backend.account.creategenarelledgertransectionreportopening',compact('chartofAssetAccounts','chartofExpenseAccounts','chartofIncomeAccounts','chartofLiabilitiesAccounts','start','end'));
    //     }


 }
 public function inventory(Request $request){
     $Vouchers=Voucher::groupBy('order_id')->get();
     return view('backend.account.inventory',compact('Vouchers'));

 }
 public function inventory_view($id){

    $orderid=Order::where('id',$id)->first();

    $purchaseAccount=ChartofAccount::where('name','Local Purchase')->first();
    $purchaseId=$purchaseAccount->id;
    $sales=ChartofAccount::where('name','Sales')->first();
    $salesId=$sales->id;
    $AccPayable_id=ChartofAccount::where('name','Accounts Payable / Supplier')->first();
    $accRec=ChartofAccount::where('name','Accounts Receivables / Customer')->first();
    $Accpay=$AccPayable_id->id;
    $Accrec=$accRec->id;
    $cash=ChartofAccount::where('name','Checking Account Cash')->first();
    $cashId=$cash->id;
    $Vouchers=Voucher::where('order_id',$id)->get();
    return view('backend.account.inventory_veiws',compact('Vouchers','purchaseId','orderid','salesId','Accrec','Accpay','cashId'));
 }


 //belaobela Inventory
 public function belaobelajournal(){
     $chatofAccounts=ChartofAccount::orderBy('name','asc')->get();
     return view('backend.account.bobjournalsearch',compact('chatofAccounts'));
 }
 public function searchjournalentry(Request $request){
    $users=User::get();
    $accountType = $request->accounttype;
    $start = $request->start ?: date('Y-m-d');
    $end = $request->end ?: date('Y-m-d');
    $start=$start . ' 00:00:00';
    $end=$end . ' 23:59:59';
    $customers=Customer::get();
    $sellers=Seller::get();
    if($accountType == "allaccount")
    {

    }else{
         $chartaccountId=ChartofAccount::where('name',$accountType)->first();
        // $voucharItems=VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$chartaccountId->id)->get();
        // if($request->orderid != Null)
        // {
        //     $orderids=Voucher::where('name',$request->orderid)->pluck('id');

        //     $voucharItems=VoucherItem::whereIn('voucher_id', $orderids)->whereBetween('created_at',[$start,$end])->where('chartof_account_id',$chartaccountId->id)->get();
        // }
        // if($request->usertype != Null)
        // {

        //     // $voucharItems=VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$chartaccountId->id)->where('user_id',$request->usertype)->get();
        //     $voucharItems=VoucherItem::whereBetween('created_at',[$start,$end])->where(function($query)use($chartaccountId,$request){
        //         return $query
        //        ->where('chartof_account_id',$chartaccountId->id)
        //        ->where('user_id',$request->usertype);
        //        })->get();
        // }


        // $chartaccountId=ChartofAccount::where('name',$accountType)->first();
        // $vitemsids=VoucherItem::where('chartof_account_id',$chartaccountId->id)
        // ->whereBetween('created_at',[$start,$end])
        // ->select("*")
        // ->selectRaw("SUM(debit) as total_debits")
        // ->selectRaw("SUM(credit) as total_credits")
        // ->groupBy('voucher_id')
        // ->pluck('voucher_id');
        // $vouchers=Voucher::whereIn('id',$vitemsids);

        // dd($vouchers);




        $voucharItems=VoucherItem::whereBetween('created_at',[$start,$end])->where('chartof_account_id',$chartaccountId->id)->orderby('id','desc')
        ->select("*")
        ->selectRaw("SUM(debit) as total_debit")
        ->selectRaw("SUM(credit) as total_credit")
        ->groupBy('voucher_id');

        if($request->orderid != Null)
        {
            $orderids=Voucher::where('name',$request->orderid)->pluck('id');
            $voucharItems=$voucharItems->whereIn('voucher_id', $orderids);
        }
        if($request->usertype != Null)
        {

            $voucharItems=$voucharItems->where('user_id',$request->usertype);
            // $voucharItems=VoucherItem::whereBetween('created_at',[$start,$end])->where(function($query)use($chartaccountId,$request){
            //     return $query
            //    ->where('chartof_account_id',$chartaccountId->id)
            //    ->where('user_id',$request->usertype);
            //    })->get();
        }

        $voucharItems = $voucharItems->get();
        return view('backend.account.bobjournalsearchingresult',compact('voucharItems','users','start','end','accountType','chartaccountId'));
    }
 }

 public function addtopurchasepaidview($id)
 {
    $coa_all=ChartofAccount::get();
     return view('backend.account.menualjaounalentries',compact('coa_all'));
 }
 public function belaobelajournalentryedit($id){
    $coa_all=ChartofAccount::get();
    $voucher=Voucher::where('id',$id)->first();
    return view('backend.account.belaobelajournalentryedit',compact('voucher','coa_all'));
}
public function updatebelaobelaentries(){
    $id=$request->oldvoucherID;
    $voucher=Voucher::where('id',$id)->delete();
    $voucheritems=VoucherItem::where('voucher_id',$id)->delete();


    $voucher=new Voucher;
    $voucher->date=$request->date;
    $voucher->name=$request->narration;
    $voucher->addedby_id=Auth::id();
    $voucher->save();

 $chart_id = $request->chart_id;
 $debit = $request->debit;
 $credit = $request->credit;
 $debitBalace=0;
 $creditBalace=0;
    for ($i=0; $i < count($chart_id); $i++) {
        $debitBalace+= $debit[$i];
        $creditBalace+= $credit[$i];
      $voucher_item=new VoucherItem;
      $voucher_item->chartof_account_id = $chart_id[$i];
      $voucher_item->debit = $debit[$i];
      $voucher_item->credit = $credit[$i];
      $voucher_item->voucher_id=$voucher->id;
      $voucher_item->addedby_id=Auth::id();
     $voucher_item->save();
    }
    $voucharupdate=Voucher::find($voucher->id);
    $voucharupdate->total_debit=$debitBalace;
    $voucharupdate->total_credit=$creditBalace;
    $voucharupdate->save();

    flash(translate('Voucher Updated Succussfuly'))->success();
    return redirect()->route('allvoucherlist');
}
public function sellervoucherlist($id,$account_type,$start,$end){
    $user=User::where('id',$id)->first();
    $userName=$user->name;
    $voucherItems = VoucherItem::where('seller_id',$id)->where('chartof_account_id',$account_type)->orderBy('id','desc')->paginate(50);
    return view('backend.account.sellervoucherlist',compact('voucherItems','start','end','userName'));
}
public function uservoucherlist($id,$account_type,$start,$end){
    $user=User::where('id',$id)->first();
    $userName=$user->name;
    $voucherItems = VoucherItem::where('user_id',$id)->where('chartof_account_id',$account_type)->paginate(50);
    return view('backend.account.uservoucherlist',compact('voucherItems','userName','start','end'));
}

public function updateProfitandLossAccount(Request $request)
{
    $ac_type=CoaType::where('id',$request->account_type)->first();
    $coa=ChartofAccount::find($request->chartofId);
    $coa->name=$request->name;
    $coa->code=$request->code;
    $coa->report_type   =$request->report_type;
    $coa->account_type  =$ac_type->account_type;
    // $coa->starting_balance=$request->starting_balance;
    $coa->balance_type   =$request->balance_type;
    $coa->coa_type_id    =$request->account_type;
    $coa->editedby_id    =Auth::id();
    $coa->save();
    flash(translate('Profit and Loss Account Updated Successfuly'))->success();
    return redirect()->route('managechartofaccouts');
}

}
