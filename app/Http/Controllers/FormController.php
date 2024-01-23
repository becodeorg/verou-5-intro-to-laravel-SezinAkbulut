<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other form fields
        ]);

        // Process form data
        return redirect()->route('form.show', ['id' => $request->name])->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // You might want to retrieve and display specific data based on $id
        return view('form');
    }

  /*  public function submit(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other form fields
        ]);

        // Process form data

        return redirect('/form')->with('success', 'Form submitted successfully!');
    }
*/
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // You might want to retrieve data based on $id and pre-fill the form
        return view('edit_form');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other form fields
        ]);

        // Process form data and update the resource based on $id

        return redirect()->route('form.show', ['id' => $id])
            ->with('success', 'Form updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // Delete the resource based on $id

        return redirect('/')->with('success', 'Form deleted successfully!');
    }
}
