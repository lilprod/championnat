<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Stade;
use App\Models\Ville;

class StadeController extends Controller
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
        $stades = Stade::all(); //Get all stades

        return view('admin.stades.index')->with('stades', $stades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all(); //Get all villes

        return view('admin.stades.create', compact('villes'));
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

        $stade = new Stade();

        $stade->title = $request->input('title');
        $stade->ville_id = $request->input('ville_id');
        $stade->description = $request->input('description');

        $stade->save();

        return redirect()->route('admin.stades.index')
            ->with('success',
             'Stade ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find a stade with a given id and delete
        $stade = Stade::findOrFail($id);

        return view('admin.stades.show', compact('stade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find a stade with a given id and delete
        $stade = Stade::findOrFail($id);

        $villes = Ville::all(); //Get all villes

        return view('admin.stades.edit', compact('stade', 'villes'));
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
        //Find a stade with a given id and delete
        $stade = Stade::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:120',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $stade->title = $request->input('title');
        $stade->ville_id = $request->input('ville_id');
        $stade->description = $request->input('description');

        $stade->save();

        return redirect()->route('admin.stades.index')
            ->with('success',
             'Stade édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a stade with a given id and delete
        $stade = Stade::findOrFail($id);
        
        $stade->delete();

        return redirect()->route('admin.stades.index')
            ->with('success',
             'Stade supprimé avec succès.');
    }
}
