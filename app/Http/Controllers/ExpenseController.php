<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expends_category;
use Auth;
use App\expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminexpensetype()
    {
        $expends_types=expends_category::get();
       return view('backend.expense.expensetype',compact('expends_types'));
       //dd("hello");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addexpensetype(Request $request)
    {
        $expense= new expends_category;
        $expense->name=$request->name;
        $expense->added_by=Auth::id();
        $expense->save();
        flash(translate('Expends created successfully'))->success();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function expenseEdit($id)
    {
        $expensName=expends_category::find($id);
        return view('backend.expense.editexpense',compact('expensName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateexpensetype(Request $request, $id)
    {
        $expense= expends_category::find($id);
        $expense->name=$request->name;
        $expense->editedby_id=Auth::id();
        $expense->save();
        flash(translate('Expends Updated successfully'))->success();
        return redirect()->route('admin.expensetype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function expenseStatement(Request $request)
    {
        $date = $request->date;
        $expenseCategory = $request->expenseCategory;

        $exp = expense::orderBy('id','desc');

        if ($date!= null && $expenseCategory == null){
            $exp->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }
        if($date == null && $expenseCategory != null)
        {
            $exp->where('expense_id',$expenseCategory);
        }
        if($date != null && $expenseCategory != null)
        {
            $exp->where('expense_id',$expenseCategory)->whereDate('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        //
        $expensives=expends_category::get();
        $expensesf=$exp->paginate(15);

        return view('backend.expense.expensestatement',compact('expensives','expensesf','date'));
    }
    public function addexpense(Request $request)
    {
        $expense=new expense;
        $expense->expense_id=$request->ex_category_id;
        $expense->description=$request->description;
        $expense->amount=$request->amount;
        $expense->addedby_id=Auth::id();
        $expense->save();
        flash(translate('Expends Added successfully'))->success();
        return back();
    }
}
