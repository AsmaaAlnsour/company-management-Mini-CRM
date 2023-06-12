<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = str_replace('public/', '', $logoPath);
        }

        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = str_replace('public/', '', $logoPath);
        }

        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }


}
