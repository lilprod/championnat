<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Journee;

class JourneeController extends Controller
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
        $journees = Journee::all(); //Get all journees

        return view('admin.journees.index')->with('journees', $journees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.journees.create');
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
            'code' => 'required|max:120',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $journee = new Journee(); 

        $journee->title = $request->input('title');
        $journee->code = $request->input('code');
        $journee->description = $request->input('description');

        $journee->save();

        return redirect()->route('admin.journees.index')
            ->with('success', 'Journée ajoutée avec succès.');
    }

    public function changeUserStatus(Request $request)
    {
        $journee = Journee::findOrFail($request->journee_id);

        $journee->status = $request->status;

        $journee->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $journee = Journee::findOrFail($id); 

        return view('admin.journees.show', compact('journee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journee = Journee::findOrFail($id);

        return view('admin.journees.edit', compact('journee'));
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
        $journee = Journee::findOrFail($id); 

        $this->validate($request, [
            'title' => 'required|max:120',
            'code' => 'required|max:120',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $journee->title = $request->input('title');
        $journee->code = $request->input('code');
        $journee->description = $request->input('description');

        $journee->save();

        return redirect()->route('admin.journees.index')
            ->with('success', 'Journée ajoutée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journee = Journee::findOrFail($id); 

        $journee->delete();

        return redirect()->route('admin.journees.index')
            ->with('success',
             'Journée supprimé avec succès.');
    }
}
