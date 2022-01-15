<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('invoices.index');
    }


    
    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addIndex()
    {
        return view('invoices.add');
    }

}
