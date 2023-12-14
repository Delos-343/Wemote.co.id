<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Use the correct model name

class EmployeeController extends Controller // Use the correct class name
{
    public function imageToBase64($imagePath)
    {
        try {
            $imageData = file_get_contents($imagePath);
            if ($imageData === false) {
                throw new \Exception("Failed to read the image file.");
            }
            
            $base64Encoded = base64_encode($imageData);
            return $base64Encoded;
        } catch (\Exception $e) {
            return null;
        }
    }

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
            'productImage' => 'required|url'
        ], [
            'productName.required' => 'productName can\'t be empty!',
            'productID.required' => 'productID can\'t be empty!',
            'owner.required' => 'owner can\'t be empty!',
            'location.required' => 'location can\'t be empty!',
            'description.required' => 'Description can\'t be empty!',
            'productImage.required' => 'Image can\'t be empty!'
        ]);

        $imageBase64 = $this->imageToBase64($request->productImage);

        if (!$imageBase64) {
            return redirect('/')->with('error', 'Failed to process the image.');
        }

        Employee::create([
            'productName' => $request->productName, 
            'productID' => $request->productID,
            'owner' => $request->owner,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imageBase64,
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
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'productName' => $request->input('productName'),
            'productID' => $request->input('productID'),
            'owner' => $request->input('owner'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect('/show')->with('success', 'Employee updated successfully');
    }
}
