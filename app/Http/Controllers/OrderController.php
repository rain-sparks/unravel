<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
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
        $data = Orders::with(['customers','products'])->get();
        return view('orders')->with('data',$data);
    }

    public function view($id)
    {
        $data = Orders::where('id',$id)->first();
        return view('orders.view')->with('data',$data);
    }


}
