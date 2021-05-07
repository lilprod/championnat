@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Accréditations</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Accréditations</a></li>
                    <li class="breadcrumb-item">Détails d'une accréditation</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- subscribe start -->
    <div class="col-sm-12">
        @include('inc.messages')
        <div class="card">
            <div class="card-header">
                <h5> Détails</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            
                            <div class="col-12">
                                <h6><i class="feather icon-home"></i> Emis par :</h6>
                            </div>

                            <div class="w-100">

                                <div class="row mb-2">
                                    <div class="col-4 f-w-500"><h6>Type Média:</h6></div>
                                    <div class="col-8">{{$accreditation->type->title}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-4 f-w-500"><h6>Nom du média:</h6></div>
                                    <div class="col-8">{{$accreditation->media->nom_media}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-4 f-w-500"><h6>Email du média:</h6></div>
                                    <div class="col-8">{{$accreditation->media->email}}</div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-4 f-w-500"><h6>Téléphone du média:</h6></div>
                                    <div class="col-8">{{$accreditation->media->phone_number}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6>Type d'accréditation:</h6>
                            <p class="mb-1">{{$accreditation->type->title}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Ville:</h6>
                            <p class="mb-1">{{$accreditation->ville->title}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Stade :</h6>
                            <p class="mb-1">{{$accreditation->stade->title}}</p>
                        </div>
                 
                        <div class="mt-4">
                            <h6>Date du match :</h6>
                            <p class="mb-1"> {{\Carbon\Carbon::parse($accreditation->date_match)->format('d/m/Y')}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Date de soumission :</h6>
                            <p class="mb-1"> {{$accreditation->created_at->format('d/m/Y')}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Statut :</h6>
                            @if($accreditation->status)
                                <h5><span class="badge bg-success">Valide</span></h5>
                            @else
                                <h5><span class="badge bg-warning">Archivé</span></h5>
                            @endif
                        </div>
                        
                        @if($accreditation->type_accreditation_id == 2)
                        <div class="row">
                            <div class="col-12">
                                <h6><i class="feather icon-user"></i> Agent de presse :</h6>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Nom et Prénomm(s) :</div>
                                    <div class="col-8">{{$accreditation->agent->name}} {{$accreditation->agent->firstname}}</div>
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Genre :</div>
                                        @if($accreditation->agent->gender == 'M')
                                            <div class="col-8">
                                                Masculin
                                            </div>
                                        @else
                                            <div class="col-8">
                                                Féminin
                                            </div>
                                        @endif
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Nationalité :</div>
                                    <div class="col-8">{{$accreditation->agent->nationality}}</div>
                                </div>
                            </div>


                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Profession :</div>
                                    <div class="col-8">{{$accreditation->agent->profession}}</div>
                                </div>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Numéro de Passeport :</div>
                                    <div class="col-8">{{$accreditation->agent->num_passport}}</div>
                                </div>
                            </div>
                
                        </div>
                        @endif
                        
                        {{-- <div class="col-lg-12">
                            <div class="mt-4">
                                <h6>Commentaire:</h6>
                                <p>{!! \Illuminate\Support\Str::limit($accreditation->description) !!}</p>
                                    <!--<div class="w-100">
                                        <div class="row mb-2">
                                            <div class="col-4 f-w-500">Material</div>
                                            <div class="col-8">PU</div>
                                        </div>
                                    </div>
                                    <h6><a href="#!">Manufacturing, Packaging and Import Info</a></h6>-->
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-12">
                                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm mb-3 btn-round"> <i class="fa fa-arrow-left"></i>
                                    Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe end -->
</div>
<!-- [ Main Content ] end -->

@endsection
