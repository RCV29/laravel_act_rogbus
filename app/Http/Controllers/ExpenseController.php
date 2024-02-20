<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        $expenses = Expense::all();
        return response()->json(['expenses' => $expenses]);
    }

    public function store(Request $request){
        return Expense::create($request->all());
    }

    public function update(Request $request, $id){
        $expense = Expense::find($id);
        $expense -> update($request->all());
        return response()->json(['expense'=> $expense]);
    }

    public function destroy($id){
        $expense = Expense::find($id);
        $expense->delete();
        return response()->json(['message' => "successfully deleted the data"]);
    }
}
