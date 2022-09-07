<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCompany;

class ProductsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ProductCompany = ProductCompany::all();

        return view('companies.addnew',[
             'company_id'=>$id
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ProductCompany = new ProductCompany;
        $ProductCompany->company_id = $request->input('company_id');
        $ProductCompany->products = $request->input('products');
        $ProductCompany->prod_desc = $request->input('prod_desc');
        $ProductCompany->save();

        return redirect()->route('companies.index')
            ->with('success','A new product has been added successfully.');
    }
}
