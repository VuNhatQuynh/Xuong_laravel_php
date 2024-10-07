<?php

namespace App\Http\Controllers;

use App\Models\FinancialReport;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
         $totalSales = DB::table('sales')
         ->whereRaw('EXTRACT(MONTH FROM sale_date) = ?', [9])
         ->whereRaw('EXTRACT(YEAR FROM sale_date) = ?', [2024])
         ->sum('total');
        //   $totalSales=$totalSales1*0.1;
        // dd($totalSales);
        $totalExpenses = DB::table('expenses')

            ->whereYear('expense_date', '=',2024)
            ->whereMonth('expense_date','=', 9)
            ->sum('amount');

        
        $taxTotal = DB::table('taxes')
            ->where('tax_name','=', 'VAT')
            ->value('rate');
            // dd($taxTotal);
            // theo công thức tinh tính thuế
            $taxAmount = $totalSales * $taxTotal/100;
            // dd($taxAmount);

        
        $profitBeforeTax = $totalSales - $totalExpenses;
        $profitAfterTax = $profitBeforeTax - $taxAmount;
        // dd($profitBeforeTax);

        $data = FinancialReport::query()->create([
            'month' => '9',
            'year' => '2024',
            'total_sales' => $totalSales,
            'total_expanse' => $totalExpenses,
            'profit_before_tax' => $profitBeforeTax,
            'tax_amount' => $taxAmount,
            'profit_after_tax' => $profitAfterTax,
        
        ]);
        // dd($data);

        return view('financialReport.index',compact('data'));
   
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialReport $financialReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialReport $financialReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialReport $financialReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialReport $financialReport)
    {
        //
    }
}
