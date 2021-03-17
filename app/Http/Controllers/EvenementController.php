<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Journee;
use App\Models\Stade;
use App\Models\Evenement;

class EvenementController extends Controller
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
        $evenements = Evenement::all(); //Get all evenements

        return view('admin.evenements.index')->with('evenements', $evenements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $journees = Journee::all(); //Get all journees

        $stades = Stade::all(); //Get all stades

        return view('admin.evenements.create', compact('journees', 'stades'));
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
            'journee_id' => 'required',
            'stade_id' => 'required',
            'quota' => 'required',
            'title' => 'required',
            'date_match' => 'required',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $evenement = new Evenement();

        $evenement->title = $request->input('title');
        $evenement->journee_id = $request->input('journee_id');
        $evenement->stade_id = $request->input('stade_id');
        $evenement->quota = $request->input('quota');
        $evenement->date_match = $request->input('date_match');
        $evenement->left_place = $request->input('quota');
        $evenement->description = $request->input('description');

        $evenement->save();


        return redirect()->route('admin.evenements.index')
            ->with('success',
             'Evènement ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id); 

        return view('admin.evenements.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id); 

        $journees = Journee::all(); //Get all journees

        $stades = Stade::all(); //Get all stades

        return view('admin.evenements.edit', compact('evenement', 'journees', 'stades'));
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
        $evenement = Evenement::findOrFail($id);
        
        $this->validate($request, [
            'journee_id' => 'required',
            'stade_id' => 'required',
            'quota' => 'required',
            'title' => 'required',
            'date_match' => 'required',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $old_left_place = 0;
        $old_quota = 0;
        $tmp = 0;

        $old_left_place = $evenement->left_place;
        $old_quota = $evenement->quota;

        $evenement->title = $request->input('title');
        $evenement->journee_id = $request->input('journee_id');
        $evenement->stade_id = $request->input('stade_id');
        $evenement->quota = $request->input('quota');
        $evenement->date_match = $request->input('date_match');
        $evenement->left_place = $old_left_place;

        if($old_quota < $request->input('quota')){
            $tmp = $request->input('quota') - $old_quota;
            $evenement->left_place = $old_quota + $tmp;

        }elseif($old_quota > $request->input('quota')){
            $tmp = $request->input('quota') - $old_quota;
            $evenement->left_place = $old_quota - $tmp;
        }else{
            $evenement->quota = $old_quota;
        }
        $evenement->description = $request->input('description');

        $evenement->save();

        return redirect()->route('admin.evenements.index')
            ->with('success',
             'Evènement édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id); 

        $evenement->delete();

        return redirect()->route('admin.evenements.index')
            ->with('success',
             'Evènement supprimé avec succès.');
    }
}
