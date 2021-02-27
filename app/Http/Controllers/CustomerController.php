<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
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
        $data = Customers::get();
        return view('customers')->with('data',$data);
    }

    public function view($id)
    {
        $data = Customers::where('id',$id)->first();
        return view('customers.view')->with('data',$data);
    }


}
