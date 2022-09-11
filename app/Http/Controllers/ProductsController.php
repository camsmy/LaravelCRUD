<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCompany;

class ProductsController extends Controller
{
    
    public function NewProduct($id)
    {
        $ProductCompany = ProductCompany::all();

        // return view('companies.addnew',[
        //      'company_id'=>$id
        //  ]);
        return response()->json([
            'company_id'=>$id,
            'message'=>'Product company get is okay',
            'code'=>200
        ]);
    }

 
    public function store(Request $request)
    {
        $ProductCompany = new ProductCompany;
        $ProductCompany->company_id = $request->input('company_id');
        $ProductCompany->products = $request->input('products');
        $ProductCompany->prod_desc = $request->input('prod_desc');
        $ProductCompany->save();

        return response()->json([
            'message'=>'New company created successfully',
            'code'=>200
        ]);
    }
}
