<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
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
        $data = Products::get();
        return view('products')->with('data',$data);
    }

    public function create()
    {
        return view('products.create');
    }

    public function view($id)
    {
        $data = Products::where('id',$id)->first();
        return view('products.view')->with('data',$data);
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Name is required.',
            'price.required' => 'Price is required.',
            'name.unique' => 'Name is already taken.',
            'price.numeric' => 'Price must be valid.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $products = new Products;
        $products->name = $request->name;
        $products->price =$request->price;
        $products->save();

        if ($products->save()) {
            Session::flash('message', 'Successfully Added Product');
            Session::flash('alert-class', 'alert-success');
            return Redirect()->route('products');
        } else {
            Session::flash('message', 'Error Adding Product');
            Session::flash('alert-class', 'alert-danger');
            return Redirect()->route('products');
        } 
    }

    public function update($id)
    {
        $data = Products::where('id', $id)->first();
        return view('products.update')->with('data', $data);
    }
    public function updateStore(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric'
        ];
        $messages = [
            'name.required' => 'Name is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be valid.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $products = Products::find($id);
        $products->name = $request->name;
        $products->price =$request->price;
        $products->save();

        if ($products->save()) {
            Session::flash('message', 'Successfully Updated Product');
            Session::flash('alert-class', 'alert-success');
            return Redirect()->route('products');
        } else {
            Session::flash('message', 'Error Updating Product');
            Session::flash('alert-class', 'alert-danger');
            return Redirect()->route('products');
        } 
    }
    public function delete($id)
    {
        $item = Products::destroy($id);
        if ($item) {
            Session::flash('message', 'Successfully Deleted Item');
            Session::flash('alert-class', 'alert-success');
            return Redirect()->route('products');
        } else {
            Session::flash('message', 'Error Deleting Item');
            Session::flash('alert-class', 'alert-danger');
            return Redirect()->route('products');
        }
    }

}
