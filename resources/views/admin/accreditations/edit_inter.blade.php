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
                    <li class="breadcrumb-item">Edition</li>
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
                <h5>Editer une demande d'accréditation internationale</h5>
            </div>

            <form method="POST" action="{{ route('admin.international_accreditation_update', $accreditation->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Nom" id="name" value="{{$accreditation->agent->name}}" required autofocus>
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prénom(s) <span class="text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control" placeholder=" Prénom(s)" value="{{$accreditation->agent->firstname}}" required>
                        
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_date">Date de naissance <span class="text-danger">*</span></label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{$accreditation->agent->birth_date}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genre <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" {{  $accreditation->agent->gender == "M" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Mr</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" {{  $accreditation->agent->gender == "F" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Mme</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nationalité <span class="text-danger">*</span></label>
                                <input type="text" name="nationality" class="form-control" placeholder="Nationalité" value="{{$accreditation->agent->nationality}}" required>
                                
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
                                <input type="text" name="address" class="form-control" placeholder="Adresse" value="{{$accreditation->agent->address}}" required>
                            </div>
                            
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fonction <span class="text-danger">*</span></label>
                                <input type="text" name="profession" class="form-control" placeholder="Fonction" value="{{$accreditation->agent->profession}}" required>
                             
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro du Passeport <span class="text-danger">*</span></label>
                                <input type="text" name="num_passport" class="form-control" placeholder="Numéro du Passeport" value="{{$accreditation->agent->num_passport}}" required>
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
                                <select name="ville_id" id="ville" class="form-control" required>
                                    @foreach ($villes as $ville)
                                        <option value="{{$ville->id}}" {{ ($accreditation->ville_id == $ville->id) ? 'selected' : '' }}>{{$ville->title}}</option>	
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stade <span class="text-danger">*</span></label>
                                <select name="stade_id" id="stade" class="form-control" required>
                                    @foreach ($stades as $stade)
                                        <option value="{{$stade->id}}" {{ ($accreditation->stade_id == $stade->id) ? 'selected' : '' }}>{{$stade->title}}</option>	
                                    @endforeach	
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Editer Accréditation</button>
            </div>

        </form>
    
    </div>
</div>
</div>
<!-- [ Main Content ] end -->

@endsection

@push('edit_accreditation')
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

         $('#nom_media').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    });
</script>
@endpush