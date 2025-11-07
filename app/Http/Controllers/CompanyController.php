<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
      public function index()
    {
    
        $companies=Company::included()->filter()->sort()->getOrPaginate();
    

        return response()->json($companies);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
{
    
    $validated = $request->validate([

         'id',
        'legal_representative_name'=>'required|max:50',
        'legal_representative_lastname'=> 'required|max:50',
        'nit'=> 'required|unique:companies|max:55',
        'person_type'=>'required|max:50',
        'legal_name_company'=>'required|max:50',
        'legal_representative_email',
        'user_id' =>'required|exists:user,id',


    ]);
    
    $company = Company::create($validated); 


    return response()->json($company, 201);
}

    
    public function show(string $id) 
{
    
    $comapany = Company::findOrFail($id); 

    // Opcional: Cargar relaciones específicas aquí
    

    return response()->json($comapany);
}
    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        
        $validated = $request->validate([
         'id', 
        'legal_representative_name'=> 'sometimes|max:50',
        'legal_representative_lastname'=> 'sometimes|max:50',
        'nit' => 'sometimes|unique:companies,nit,' . '|max:15',
        'person_type'=> 'sometimes|max:50',
        'legal_name_company'=> 'sometimes|max:50',
        'legal_representative_email'=> 'sometimes|max:50',
      
        ]);

         $company->update($request->all());

        return $company;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
         $company->delete();
        return $company;
    }
}
