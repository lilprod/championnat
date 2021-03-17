@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Personnels médicaux</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Personnels médicaux</a></li>
                    <li class="breadcrumb-item">Ajout</li>
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
                <h5>Nouveau Personnel Médical </h5>
            </div>

            <form method="POST" action="{{ route('admin.staffs.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                   <div class="row form-row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Spécialité <span class="text-danger">*</span></label>
                            <select name="speciality_id" id="speciality_id" class="form-control" required>
                                @foreach ($specialities as $speciality)
                                    <option value="{{$speciality->id}}">{{$speciality->title}}</option>	
                                @endforeach
                            </select>
                        </div>
                     </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Nom" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Prénom(s) <span class="text-danger">*</span></label>
                            <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder=" Prénom(s)" value="{{ old('firstname') }}" required autocomplete="firstname">
                            
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date">Date de naissance <span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required autocomplete="birth_date">

                            @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Civilité <span class="text-danger">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" checked>
                                <label class="form-check-label" for="inlineRadio1">Mr</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
                                <label class="form-check-label" for="inlineRadio2">Mme</label>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Adresse <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Adresse" value="{{ old('address') }}" required autocomplete="address">
                            
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Ville <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Ville" value="{{ old('city') }}" required autocomplete="city">

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                      </div>

                      <div class="col-md-4">
                        <div class="form-goup">
                            <label>Code postal <span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Code postal" value="{{ old('postal_code') }}" required autocomplete="postal_code">

                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Adresse email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Téléphone <span class="text-danger">*</span></label>
                            <input id="output" type="hidden" name="phone_number" value=""/>
                            <input type="tel" id="phone" name="" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                     </div>


                      <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="registered_with_council" class="form-check-input input-primary" id="registered_with_council" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0"> Inscrit au Conseil de l'Ordreation sur la détention de données.  
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <input type="checkbox" name="qualified_by_council" class="form-check-input input-primary" id="qualified_by_council" onclick="$(this).attr('value', this.checked ? 1 : 0)" value="0"> Qualifié par le Conseil de l'Ordre  
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Joindre vos documents <br>
                            <input type="file" name="documents[]" id="documents" class="form-control" multiple>
                        </div>
                     </div>

                   </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Ajouter Personnel</button>
                </div>

            </form>

         </div>
     </div>
</div>
 <!-- [ Main Content ] end -->

@endsection