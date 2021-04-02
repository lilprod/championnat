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
            <div class="card-body">
                <h5 class="mb-3">Demande d'accréditation</h5>
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase active" id="national-tab" data-bs-toggle="tab" href="#national" role="tab" aria-controls="national" aria-selected="true">Accréditation Compétitions Nationales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" id="international-tab" data-bs-toggle="tab" href="#international" role="tab" aria-controls="international" aria-selected="false">Accréditation Compétitions Internationales</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="national" role="tabpanel" aria-labelledby="national-tab">
                        
                        <div class="card">
                            <div class="card-header">
                                <h5>Nouvelle demande d'accréditation </h5>
                            </div>
                            <form method="POST" action="{{ route('media.accreditations.store') }}" enctype="multipart/form-data">
                                @csrf
                
                                <div class="card-body">
                
                                    <div class="row">
                
                                        <input name="type_accreditation_id" type="hidden" value="1">
                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ville de couverture<span class="text-danger">*</span></label>
                                                <select name="ville_id" id="ville" class="form-control" required>
                                                    <option value = "">--Sectionner votre ville--</option>
                                                    @foreach ($villes as $ville)
                                                        <option value="{{$ville->id}}">{{$ville->title}}</option>	
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Stade <span class="text-danger">*</span></label>
                                                <select name="stade_id" id="stade" class="form-control" required>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
                                </div>
                    
                            </form>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="international" role="tabpanel" aria-labelledby="international-tab">
                        
                        <div class="card">

                            <div class="card-header">
                                <h5>Nouvelle demande d'accréditation </h5>
                            </div>

                            <form method="POST" action="{{route('media.international_accreditation_save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                        
                                    <div class="row">

                                        <input name="type_accreditation_id" type="hidden" value="2">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Nom" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
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
                                                <label>Genre <span class="text-danger">*</span></label><br>
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nationalité <span class="text-danger">*</span></label>
                                                <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" placeholder="Nationalité" value="{{ old('nationality') }}" required autocomplete="nationality">
                                                
                                                @error('nationality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                    
                                        <div class="col-md-6">
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


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fonction <span class="text-danger">*</span></label>
                                                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" placeholder="Fonction" value="{{ old('profession') }}" required autocomplete="profession">
                                                
                                                @error('profession')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Numéro du Passeport <span class="text-danger">*</span></label>
                                                <input type="text" name="num_passport" class="form-control @error('num_passport') is-invalid @enderror" placeholder="Numéro du Passeport" value="{{ old('num_passport') }}" required autocomplete="profession">
                                                
                                                @error('num_passport')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>

                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Copie Passeport <span class="text-danger">*</span><br>
                                                <input type="file" name="passport_image" id="passport_image" class="form-control" required>
                                            </div>
                                         </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Copie Carte de Presse<span class="text-danger">*</span> <br>
                                                <input type="file" name="press_card_image" id="press_card_image" class="form-control" required>
                                            </div>
                                         </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Photo de Profil<span class="text-danger">*</span><br>
                                                <input type="file" name="profile_picture" id="profile_picture" class="form-control" required>
                                            </div>
                                         </div>

                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ville de couverture<span class="text-danger">*</span></label>
                                                <select name="ville_id" id="ville_inter" class="form-control" required>
                                                    <option value = "">--Sectionner votre ville--</option>
                                                    @foreach ($villes as $ville)
                                                        <option value="{{$ville->id}}">{{$ville->title}}</option>	
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Stade <span class="text-danger">*</span></label>
                                                <select name="stade_id" id="stade_inter" class="form-control" required>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                    </div> 
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
                                </div>
                    
                            </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
 </div>
 
</div>
<!-- [ Main Content ] end -->
    
@endsection

@push('add_accreditation')
<script type="text/javascript">
    $(document).ready(function() {
    
         $('#ville').on('change', function () {
    
             var ville_id = $(this).val();

             if(ville_id){

                 $.ajax({
                    url: '{!!URL::route('getStades')!!}',
                    type: 'GET',
                    data : { 'id' : ville_id},
                    dataType: 'json',
    
                    success:function(data){
    
                        if(data) {
                            $('#stade').empty();
    
                            $('#stade').focus;
    
                            //$('#stade').append('<option value = "">--Sectionner stade--</option>');
    
                            $.each(data, function(key, value){
                             $('select[name = "stade_id"]').append('<option value= "'+ value.id +'">' + value.title + ' </option>');
                           });
                         }
                        }
                    });

                }else{
                    $('#stade').empty();
                }
                   
         });

        $('#ville_inter').on('change', function () {
    
            var ville_inter_id = $(this).val();

            if(ville_inter_id){

                $.ajax({
                url: '{!!URL::route('getStades')!!}',
                type: 'GET',
                data : { 'id' : ville_inter_id},
                dataType: 'json',

                success:function(data){

                    if(data) {
                        $('#stade_inter').empty();

                        $('#stade_inter').focus;

                        //$('#stade_inter').append('<option value = "">--Sectionner stade--</option>');

                        $.each(data, function(key, value){
                            $('select[name = "stade_id"]').append('<option value= "'+ value.id +'">' + value.title + ' </option>');
                        });
                        }
                    }
                });

            }else{
                $('#stade_inter').empty();
            }
                
        });

         $('#name').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    });
</script>
@endpush