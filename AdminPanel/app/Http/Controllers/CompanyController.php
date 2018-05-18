<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Company;
class CompanyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:user');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(2);

        if(count($companies) > 0){
            return view('company.show',['companies'=>$companies]);
        }
        return redirect()->route('company.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'string|required|max:255',
            'email' => 'required|email|max:255|unique:companies',
            'cmmi' => 'required|integer',
            'branches' => 'required|array',
            'branches.*' => 'required|string',
            'address' => 'string|max:255',
            'website' => 'string|max:255',
            'type' => 'string',
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->cmmi = $request->cmmi;
        $company->branches = $request->branches;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->type = $request->type;
        
        if($request->license)
            $company->license = true;
        else
            $company->license = false;


        if ($request->file('logo')) {

            Storage::putFile('public/logos', $request->file('logo'));

            $request->file('logo')->store('public/logos');

            $file_name = $request->file('logo')->hashName();

            $company->logo = $file_name;
        }

        $company->save();
        return redirect()->route('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
            return view('company.edit',['company'=>$company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name' => 'string|required|max:255',
            'email' => 'required|email|max:255',
            'cmmi' => 'required|integer',
            'branches' => 'required|array',
            'branches.*' => 'required|string',
            'address' => 'string|max:255',
            'website' => 'string|max:255',
            'type' => 'string',
        ]);
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->cmmi = $request->input('cmmi');
        $company->branches = $request->input('branches');
        $company->address = $request->input('address');
        $company->website = $request->input('website');
        $company->type = $request->input('type');
        
        if($request->input('license'))
            $company->license = true;
        else
            $company->license = false;

        if($company->logo && $request->file('logo')){

            unlink(storage_path('app/public/logos/'.$company->logo));

            Storage::putFile('public/logos', $request->file('logo'));

            $request->file('logo')->store('public/logos');

            $file_name = $request->file('logo')->hashName();

            $company->logo = $file_name;
        }

        $company->save();
        return redirect()->route('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companyInfo = Company::find($id);

        $logo = $companyInfo->logo;
        if($logo){
            unlink(storage_path('app/public/logos/'.$logo));
        }

        $companyInfo->delete();

        return redirect()->route('companies');
    }
}
