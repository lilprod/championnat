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
                    <li class="breadcrumb-item">Liste par stade</li>
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
                <h5> Liste des accréditations par stade</h5>
            </div>
            <div class="card-body">

                <div class="row">

                    <h5 class="text-center">Filtre</h5><hr>
                    <form method="POST" action="{{ route('post_inscription_stade') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="stade_id" class="col-md-2 col-form-label text-md-left">Stade<span class="text-danger">*</span></label>

                            <div class="col-md-4">
                                <select name="stade_id" id="stade_id" class="form-control mb-30" required>
                                    <option value = "">--Sectionner un stade--</option>
                                    @foreach ($stades as $stade)
                                        <option value="{{$stade->id}}">{{$stade->title}}</option>	
                                    @endforeach	
                                </select>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-info">Filtrer</button>
                                <!--<button type="button" name="filter" id="filter" class="btn btn-info">Filtrer</button>-->
                                <!--<button type="button" name="refresh" id="refresh" class="btn btn-warning">Actualiser</button>-->
                            </div>
                        </div>
                    </form>
                    
                </div>

                <div class="dt-responsive table-responsive">
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nom du média</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Date</th>
                                <th>Journée</th>
                                <th>Ville</th>
                                <th>Stade</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                            @foreach ($inscriptions as $inscription)
                            <tr>
                                <td>{{ $inscription->nom_media }}</td>
                                <td>{{ $inscription->media->email }}</td>
                                <td>{{ $inscription->media->phone_number }}</td>
                                <td>{{ \Carbon\Carbon::parse($inscription->evenement->date_match)->format('d/m/Y') }}</td>
                                <td>{{ $inscription->evenement->journee->code}}</td>
                                <td>{{ $inscription->evenement->stade->ville->title }}</td>
                                <td>{{ $inscription->evenement->stade->title }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                            

            </div>

        </div>
    </div>
    <!-- subscribe end -->
</div>
<!-- [ Main Content ] end -->
    
@endsection

@push('inscription_stade')

<script>

var _token = $('input[name="_token"]').val();

fetch_data();

function fetch_data(query = '')
{
    $.ajax({
        url:"{{ route('search_inscription_stade') }}",
        method:"POST",
        data:{ query:query, _token:_token},
        dataType:"json",
        success:function(data)
        {
            console.log(data)
            $('tbody').html(data.table_data);
            //$('#total_records').text(data.total_data);
            //$('#total_record').text(data.total_data);
            //$('#total_amount').text(data.total_amount);
            //$('#collector_name').text(data.collector_name);
        }
    })
}


$('#filter').click(function(){
    var  query = $('#stade_id').val();
    console.log(query);
    if(query != '')
    {
        fetch_data(query);
    }
    else
    {
        alert('Le nom du stade est obligatoires!');
    }
});

/*$('#refresh').click(function(){
    $('#from_date').val('');
    $('#to_date').val('');
    $('#collector').val('');
    $('#collector_id').val('');
    fetch_data();
});*/
</script>



@endpush