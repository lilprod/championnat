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
                    <li class="breadcrumb-item">Liste</li>
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
                <h5> Liste des accréditations </h5>
            </div>
            <div class="card-body">
                <!--<div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="#" class="btn btn-success btn-sm mb-3 btn-round"> <i class="fa fa-plus"></i>
                            Ajouter Personnel
                        </a>
                    </div>
                </div>-->
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nom du média</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Date</th>
                                <th>Journée</th>
                                <th>Ville</th>
                                <th>Stade</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscriptions as $inscription)
                            <tr>
                                <td>{{ $inscription->nom_media }}</td>
                                <td>{{ $inscription->media->email }}</td>
                                <td>{{ $inscription->media->phone_number }}</td>
                                <td>{{ \Carbon\Carbon::parse($inscription->evenement->date_match)->format('d/m/Y') }}</td>
                                <td>{{ $inscription->evenement->journee->code}}</td>
                                <td>{{ $inscription->evenement->stade->ville->title }}</td>
                                <td>{{ $inscription->evenement->stade->title }}</td>
                                
                                <td>
                                    @if($inscription->type_accreditation_id == 1 )
                                    <a href="{{ route('admin.accreditations.edit', $inscription->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                    @else
                                    <a href="{{ route('admin.inter_accreditation_edit', $inscription->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                    @endif
                                    <button class="btn btn-danger btn-sm" data-ts-toggle="modal" onclick="deleteData({{ $inscription->id}})" data-ts-target="#confirm" data-original-title="Supprimer">Supprimer</button>
                                </td>
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

@push('inscription')
<script>
    
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("admin.accreditations.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
@endpush