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
        $companies = Company::all();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
