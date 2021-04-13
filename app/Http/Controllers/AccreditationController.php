<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TypeMedia;
use App\Models\Ville;
use App\Models\Stade;
use App\Models\Evenement;
use App\Models\Media;
use App\Models\Accreditation;
use App\Models\TypeAccreditation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUserMail;
use App\Mail\SendAdminMail;


class AccreditationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'media', 'isAdmin']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        //Accreditations en attente
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Accreditations valides

        $date = Carbon::now()->toDateString();

        $accreditations = Accreditation::where('user_id', auth()->user()->id)
                                        ->where('date_match', '>', $date)
                                        ->get();

        return view('accreditations.index', compact('accreditations'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        //Accreditations archivés

        $date = Carbon::now()->toDateString();

        $accreditations = Accreditation::where('user_id', auth()->user()->id)
                                        ->where('date_match', '<', $date)
                                        ->get();

        return view('accreditations.archived', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();

        $stades = Stade::all();

        return view('accreditations.create', compact('villes', 'stades'));
    }


    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'required|max:120',
            'ville_id' => 'required',
            'stade_id' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'nationality' => 'required',
            'profession' => 'required',
            'num_passport' => 'required',
            'profile_picture' => 'required',
            'num_passport' => 'required',
            'passport_image' => 'required',
            'press_card_image' => 'required',
            //'cni_image' => 'required',
        ]);

        $check_place = 0;

        if ($request->hasfile('profile_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/media/international/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        if ($request->hasfile('passport_image')) {
            // Get filename with the extension
            $fileNameWithExt1 = $request->file('passport_image')->getClientOriginalName();

            // Get just filename
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);

            // Get just ext
            $extension1 = $request->file('passport_image')->getClientOriginalExtension();

            // Filename to store
            $passportNameToStore = $filename1.'_'.time().'.'.$extension1;

            // Upload Image
            $path = $request->file('passport_image')->storeAs('public/media/international/passport_images', $passportNameToStore);
        } else {
            $passportNameToStore = 'passport.jpg';
        }

        if ($request->hasfile('press_card_image')) {
            // Get filename with the extension
            $fileNameWithExt2 = $request->file('press_card_image')->getClientOriginalName();

            // Get just filename
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);

            // Get just ext
            $extension2 = $request->file('press_card_image')->getClientOriginalExtension();

            // Filename to store
            $pressCardNameToStore = $filename2.'_'.time().'.'.$extension2;

            // Upload Image
            $path = $request->file('press_card_image')->storeAs('public/media/international/press_card_images', $pressCardNameToStore);
        } else {
            $pressCardNameToStore = 'presscard.jpg';
        }

        if($request->input('stade_id') != ' '){

            $event = Evenement::where('stade_id', $request->input('stade_id'))
                                ->first();

            if($event != null){

                $check_place = $event->left_place;

                if($check_place > 0){

                    $media = Media::where('user_id', auth()->user()->id)->first();

                    $exist = Accreditation::where('media_id', $media->id)
                                            ->where('evenement_id', $event->id)
                                            ->where('type_accreditation_id', $request->input('type_accreditation_id'))
                                            ->first();
                    
                    if($exist != null){
                        return back()->with('error', 'Vous avez déja fait la demande d\'accréditation pour ce match!');
                    }

                    $accreditation = new Accreditation(); 

                    $accreditation->media_id = $media->id;

                    $accreditation->type_accreditation_id = $request->input('type_accreditation_id');

                    $accreditation->type_media_id = $media->type_media_id;

                    $accreditation->user_id = auth()->user()->id;

                    $accreditation->nom_media = $media->nom_media;

                    $accreditation->slug = $media->slug;

                    $accreditation->ville_id = $request->input('ville_id');

                    $accreditation->stade_id = $request->input('stade_id');

                    $accreditation->journee_id = $event->journee_id;

                    $accreditation->evenement_id = $event->id;

                    $accreditation->date_match = $event->date_match;

                    $accreditation->save();

                    $event_final = Evenement::where('stade_id', $request->input('stade_id'))->first();

                    $event_final->left_place = $event_final->left_place - 1 ;

                    $mediaFinal = Media::where('user_id', auth()->user()->id)->first();

                    $mediaFinal->name = $request->input('name');
                    $mediaFinal->firstname = $request->input('firstname');
                    $mediaFinal->gender = $request->input('gender');
                    $mediaFinal->address = $request->input('address');
                    $mediaFinal->birth_date = $request->input('birth_date');
                    $mediaFinal->nationality = $request->input('nationality');
                    $mediaFinal->profession = $request->input('profession');
                    $mediaFinal->num_passport = $request->input('num_passport');

                    if ($request->hasfile('passport_image')) {
                        $mediaFinal->passport_image = $passportNameToStore;
                    }

                    if ($request->hasfile('profile_picture')) {
                        $mediaFinal->profile_picture = $fileNameToStore;
                    }

                    if ($request->hasfile('press_card_image')) {
                        $mediaFinal->press_card_image = $pressCardNameToStore;
                    }
        
                    $mediaFinal->save();
                    $event_final->save();

                    Mail::to($media->email)->send(new SendUserMail($accreditation->ville->title, $accreditation->stade->title, $accreditation->journee->title, $accreditation->evenement->date_match, $accreditation->evenement->title));

                    Mail::to('ftf.accreditation@gmail.com')->send(new SendAdminMail($media->type->title, $media->nom_media, $media->phone_number, $media->email, $accreditation->ville->title, $accreditation->stade->title, $accreditation->journee->title, Carbon::parse($accreditation->evenement->date_match)->format('d/m/Y'), $accreditation->evenement->title, $accreditation->evenement->left_place, $accreditation->evenement->quota));

                    //Redirect to the accredition view and display message
                    return redirect()->route('media.accreditations.index')
                    ->with('success', 'Accredition enregistrée avec succès.');

                }else{

                    return back()->with('error', 'Le stade choisi est déjà plein! Veuillez choisir un autre svp.');
                }

            }else{
                return back()->with('error', 'Il y a pas de match prévu pour ce stade!Veuillez choisir un autre svp');
            }
        }

        

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
            'ville_id' => 'required',
            'stade_id' => 'required',
        ]);

        $check_place = 0;

        if($request->input('stade_id') != ' '){

            $event = Evenement::where('stade_id', $request->input('stade_id'))
                                ->first();

            if($event != null){

                $check_place = $event->left_place;

                if($check_place > 0){

                    $media = Media::where('user_id', auth()->user()->id)->first();

                    $exist = Accreditation::where('media_id', $media->id)
                                            ->where('evenement_id', $event->id)
                                            ->where('type_accreditation_id', $request->input('type_accreditation_id'))
                                            ->first();
                    
                    if($exist != null){
                        return back()->with('error', 'Vous avez déja fait la demande d\' accréditation pour ce match!');
                    }
                    
                    $accreditation = new Accreditation(); 

                    $accreditation->media_id = $media->id;

                    $accreditation->type_accreditation_id = $request->input('type_accreditation_id');

                    $accreditation->user_id = auth()->user()->id;

                    $accreditation->nom_media = $media->nom_media;

                    $accreditation->slug = $media->slug;

                    $accreditation->ville_id = $request->input('ville_id');

                    $accreditation->stade_id = $request->input('stade_id');

                    $accreditation->journee_id = $event->journee_id;

                    $accreditation->evenement_id = $event->id;

                    $accreditation->date_match = $event->date_match;

                    $accreditation->save();

                    $event_final = Evenement::where('stade_id', $request->input('stade_id'))->first();

                    $event_final->left_place = $event_final->left_place - 1 ;

                    $event_final->save();

                    Mail::to($media->email)->send(new SendUserMail($accreditation->ville->title, $accreditation->stade->title, $accreditation->journee->title, $accreditation->evenement->date_match, $accreditation->evenement->title));

                    Mail::to('ftf.accreditation@gmail.com')->send(new SendAdminMail($media->type->title, $media->nom_media, $media->phone_number, $media->email, $accreditation->ville->title, $accreditation->stade->title, $accreditation->journee->title, Carbon::parse($accreditation->evenement->date_match)->format('d/m/Y'), $accreditation->evenement->title, $accreditation->evenement->left_place, $accreditation->evenement->quota));

                    //Redirect to the accredition view and display message
                    return redirect()->route('media.accreditations.index')
                    ->with('success', 'Accredition enregistrée avec succès.');

                }else{

                    return back()->with('error', 'Le stade choisi est déjà plein! Veuillez choisir un autre svp.');
                }

            }else{
                return back()->with('error', 'Il y a pas de match prévu pour ce stade!Veuillez choisir un autre svp');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villes = Ville::all();

        $stades = Stade::all();

        $accreditation = Accreditation::findOrFail($id);

        return view('accreditations.show', compact('villes', 'stades', 'accreditation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $villes = Ville::all();

        $stades = Stade::all();

        $accreditation = Accreditation::findOrFail($id);

        return view('accreditations.edit', compact('villes', 'stades', 'accreditation'));
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
        $accreditation = Accreditation::findOrFail($id);

        return redirect()->route('media.accreditation_pending')
        ->with('success',
         'Accredition éditée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accreditation = Accreditation::findOrFail($id);

        $accreditation->delete();

        return redirect()->route('media.accreditations.index')
            ->with('success',
             'Accredition supprimée avec succès.');
    }
}
