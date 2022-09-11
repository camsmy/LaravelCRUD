<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $data['companies'] = Company::orderBy('id','desc')->paginate(5);
        // return view('companies.index', $data);
        $company = Company::all();
        return response()->json([
            'company'=>$company,
            'message'=>'All contacts successfully displayed',
            'code'=>200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('companies.create');
    }

    public function AddCompany(Request $request){
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return response()->json([
            'message'=>'New company created successfully',
            'code'=>200
        ]);
    }

    /**
     * Display the specified resource.
     *

     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.show')->with('company',$company);
        // return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            ]);
            $company = Company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->save();
            return redirect()->route('companies.index')
            ->with('success','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')
        ->with('success','Company has been deleted successfully');
    }
}
