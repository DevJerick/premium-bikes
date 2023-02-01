<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
  
    public function index()
    {
        $loans = Loans::all();
        return view('loans.index', compact('loans'));
    }


    public function create()
    {
        return view('loans.create');
    }

 
    public function store(Request $request)
    {
         $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'drivers_license' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($drivers_license = $request->file( key: 'drivers_license')){
            $destinationPath = 'img/';
            $LicenseImage = date('YmdHis').".".$drivers_license->getClientOriginalExtension();
            $drivers_license->move($destinationPath, $LicenseImage);
            $input['drivers_license'] = "$LicenseImage";
        }

        Loans::create($input);
        return redirect()->route( route: 'loans.index')->with('success', 'Loan created successfully');
    }

  
    public function show(Loans $loans)
    {
        //
    }

  
    public function edit(Loans $loan)
    {
        return view('loans.edit', compact('loan'));
    }

 
    public function update(Request $request, Loans $loans)
    {
        //
    }


    public function destroy(Loans $loans)
    {
        //
    }
}