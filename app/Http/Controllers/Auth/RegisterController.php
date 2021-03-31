<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeMedia;
use App\Models\Ville;
use App\Models\Stade;
use App\Models\Inscription;
use App\Models\Evenement;
use App\Models\Media;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getStades(Request $request)
    {
        $stades = Stade::where('ville_id', $request->id)
                            ->get();
        return response()->json($stades);
    }

    public function showRegistrationForm()
    {
        $villes = Ville::all();

        $stades = Stade::all();

        $types = TypeMedia::all();

        return view('auth.register', compact('villes', 'stades', 'types'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'nom_media' => 'required|max:120',
            'email' => 'required|email',
            'phone_number' => 'required',
            'type_media_id' => 'required',
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
                    
                    $inscrit = new Inscription();

                    $inscrit->nom_media = $request->input('nom_media');

                    $inscrit->email = $request->input('email');

                    $inscrit->phone_number = $request->input('phone_number');

                    $inscrit->type_media_id = $request->input('type_media_id');

                    $inscrit->ville_id = $request->input('ville_id');

                    $inscrit->stade_id = $request->input('stade_id');

                    $inscrit->journee_id = $event->journee_id;

                    $inscrit->evenement_id = $event->id;

                    $inscrit->save();

                    $event_final = Evenement::where('stade_id', $request->input('stade_id'))->first();

                    $event_final->left_place = $event_final->left_place - 1 ;

                    $event_final->save();
                    
                    //Redirect to the inscription view and display message
                    return redirect()->route('inscription')
                    ->with('success', 'Votre inscription a été bien enregistrée!');

                }else{

                    return back()->with('error', 'Le stade choisi est déjà plein! Veuillez choisir un autre svp.');
                }

            }else{
                return back()->with('error', 'Il y a pas de match prévu pour ce stade!Veuillez choisir un autre svp');
            }
        }
         
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom_media' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255', 'unique:users'],
            'type_media_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $fileNameToStore = 'avatar.jpg';

        $user = User::create([
            'name' => $data['nom_media'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $user->assignRole('Media');

        $media = new Media();

        $media->name = $data['nom_media'];
        $media->email = $data['email'];
        $media->phone_number = $data['phone_number'];
        $media->type_media_id = $data['type_media_id'];
        $media->user_id = $user->id;

        $media->save();

        return $user;
    }
}
