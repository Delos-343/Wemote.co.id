<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Use the correct model name

class EmployeeController extends Controller // Use the correct class name
{

    public function index(){
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productID' => 'required',
            'owner' => 'required',
            'location' => 'required',
            'description' => 'required',
            'productImage' => 'required',
        ], [
            'productName.required' => 'productName can\'t be empty!',
            'productID.required' => 'productID can\'t be empty!',
            'owner.required' => 'owner can\'t be empty!',
            'location.required' => 'location can\'t be empty!',
            'description.required' => 'Description can\'t be empty!',
            'productImage.required' => 'productImage can\'t be empty!',
        ]);

        Employee::create([
            'productName' => $request->productName, 
            'productID' => $request->productID,
            'owner' => $request->owner,
            'location' => $request->location,
            'description' => $request->description,
            'productImage' => $request->productImage,
        ]);

        return redirect('/show')->with('success', 'Successfully added!');
    }

    public function show(){
        $employees = Employee::all(); 
        return view('show', ['employees' => $employees]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/show')->with('success', 'Employee deleted successfully');
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('/edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required',
            'productID' => 'required',
            'owner' => 'required',
            'location' => 'required',
            'description' => 'required',
            'productImage' => 'required',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'productName' => $request->input('productName'),
            'productID' => $request->input('productID'),
            'owner' => $request->input('owner'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'productImage' => $request->input('productImage')
        ]);

        return redirect('/show')->with('success', 'Employee updated successfully');
    }
}
