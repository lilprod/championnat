@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Evènements</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Evènements</a></li>
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
                <h5> Liste des évènements </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.evenements.create') }}" class="btn btn-success btn-sm mb-3 btn-round"> <i class="fa fa-plus"></i>
                            Ajouter Evènement
                        </a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Date</th>
                                <th>Rencontre</th>
                                <th>Ville</th>
                                <th>Stade</th>
                                <th>Quota</th>
                                <th>Place(s) restante(s)</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evenements as $key=>$evenement)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($evenement->date_match)->format('d/m/Y') }}</td>
                                <td>{{ $evenement->title }}</td>
                                <td>{{ $evenement->stade->ville->title }}</td>
                                <td>{{ $evenement->stade->title }}</td>
                                <td>{{ $evenement->quota }}</td>
                                <td>{{ $evenement->left_place }}</td>
                                <td>
                                    <a href="{{ route('admin.evenements.edit', $evenement->id) }}" class="btn btn-info btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData({{ $evenement->id}})" data-target="#confirm" data-original-title="Supprimer">Supprimer</button>
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

@push('evenement')
<script>
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("admin.evenements.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
@endpush