<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyCRUDController extends Controller
{
    public function index()
    {
 
        $company = Company::all();
        return response()->json([
            'company'=>$company,
            'message'=>'All contacts successfully displayed',
            'code'=>200
        ]);
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

    public function EditCompany($id)
    {
        $company = Company::find($id);
        return response()->json([
            $company
        ]);
    }

    public function updateCompany(Request $request, $id)
    {
            $company = Company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->save();
            return response()->json([
                'message'=>'Contact updated successfully',
                'code'=>200
            ]);
    }

  
    public function delete_company($id)
    {
        $company = Company::find($id);
        if($company){
            $company->delete();
            return response()->json([
                'message' => 'Contact has been deleted',
                'code'=>200
            ]);
        }else{
            return response()->json([
                'message' => "Contact with id: $id does not exist",
                'code'=>200
            ]);
        }
    }

    public function ViewCompany($id){
        $company = Company::find($id);
        return response()->json([
            $company->productcompany,
            'company_id'=> $company->productcompany[0]->company_id,
            'message' => "ok",
            'code'=>200
        ]);
    }
}
