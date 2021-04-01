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
    <div class="col-lg-8 offset-lg-2">

        @include('inc.messages')
        
        <div class="card">
            <div class="card-header">
                <h5>Editer une demande d'accréditation </h5>
            </div>

            <form method="POST" action="{{ route('media.accreditations.update', $accreditation->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="row">

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