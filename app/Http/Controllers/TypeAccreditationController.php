<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\TypeAccreditation;

class TypeAccreditationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeAccreditation::all(); //Get all types

        return view('admin.typeaccreditations.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeaccreditations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $type = new TypeAccreditation(); 

        $type->title = $request->input('title');
        $type->description = $request->input('description');

        $type->save();

        return redirect()->route('admin.typeaccreditations.index')
            ->with('success',
             'Type Accrédition ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = TypeAccredition::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypeAccredition::findOrFail($id);

        return view('admin.typeaccreditations.edit', compact('type'));
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
        $type = TypeAccreditation::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:120',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $type->title = $request->input('title');
        $type->description = $request->input('description');

        $type->save();

        return redirect()->route('admin.typeaccreditations.index')
            ->with('success',
             'Type Accredition édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = TypeAccreditation::findOrFail($id);

        $type->delete();

        return redirect()->route('admin.typeaccreditations.index')
            ->with('success',
             'Type Accredition supprimé avec succès.');
    }
}
