<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendActivationMail;

use Illuminate\Http\Request;

class MediaController extends Controller
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
        //Get all medias and pass it to the view
        //$medias = Media::all();

        $users = [];
        $users = User::select('id')
                        ->where('is_activated', 1)
                        ->where('role_id', 2)
                        ->get();

        $medias = Media::whereIn('user_id', $users)
                        ->get();

        return view('admin.medias.index')->with('medias', $medias);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        //Get all medias and pass it to the view
        $users = [];
        $users = User::select('id')
                        ->where('is_activated', 0)
                        ->where('role_id', 2)
                        ->get();

        $medias = Media::whereIn('user_id', $users)
                        ->get();

        return view('admin.medias.pending')->with('medias', $medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a user with a given id and delete
        $media = Media::findOrFail($id);
        $user = User::findOrFail($media->user_id);
        if ($user->profile_picture != 'avatar.jpg') {
            Storage::delete('public/profile_images/'.$user->profile_picture);
        }
        /*if ($media->profile_picture != 'avatar.jpg') {
            Storage::delete('public/profile_images/'.$media->profile_picture);
        }*/
        $user->delete();
        $media->delete();

        return redirect()->route('admin.medias.index')
            ->with('success','Média supprimé avec succès.');
    }
}
