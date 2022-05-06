<?php

namespace App\Http\Controllers;

use App\Models\FormFieldType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormFieldTypeController extends Controller
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
        $types = FormFieldType::allBasic();

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'html_tag_name' => 'required',
            'friendly_name' => 'required'
        ]);

        $type = new FormFieldType();
        $type->fill($request->all());
        $type->slug = Str::slug($request->input('friendly_name'), '-');
        $type->allow_multiple_options = $request->input('allow_multiple_options') ? 1 : 0;
        $type->save();

        return redirect()->route('types.index')
            ->with('success', 'Form field type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormFieldType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(FormFieldType $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormFieldType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(FormFieldType $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormFieldType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormFieldType $type)
    {
        $request->validate([
            'html_tag_name' => 'required',
            'friendly_name' => 'required'
        ]);

        $type->html_tag_name = $request->input('html_tag_name');
        $type->friendly_name = $request->input('friendly_name');
        $type->html_type = $request->input('html_type');
        $type->slug = Str::slug($request->input('friendly_name'), '-');
        $type->allow_multiple_options = $request->input('allow_multiple_options') ? 1 : 0;
        $type->save();

        return redirect()->route('types.index')
            ->with('success', 'Form field type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormFieldType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormFieldType $type)
    {
        $type->delete();

        return redirect()->route('types.index')
            ->with('success', 'Form field type deleted successfully.');
    }
}
