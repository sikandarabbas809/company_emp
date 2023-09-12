<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate('10');
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

        $logoPath = $request->file('logo')->store('public/company-logo');
        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = basename($logoPath);
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index')->with(['success'=>'Company created successfully']);
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
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            Storage::delete('public/company-logo/' . $company->logo);
            $logoPath = $request->file('logo')->store('public/company-logo');
        }

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $logoPath ? basename($logoPath) : $company->logo,
        ]);

        return redirect()->route('companies.index')->with(['success' => 'Company updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        if ($company->logo) {
            Storage::delete('public/company-logo/' . $company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')->with(['success' => 'Company deleted successfully.']);

    }
}
