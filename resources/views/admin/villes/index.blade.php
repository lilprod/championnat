@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Villes</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Villes</a></li>
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
                <h5> Liste des villes </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.villes.create') }}" class="btn btn-primary btn-sm mb-3 btn-round" data-toggle="" data-target=""> <i class="fa fa-plus"></i>
                            Ajouter Ville</a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Villes</th>
                                <th style="width: 10%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($villes as $ville)
                            <tr>
                                <td>{{ $ville->title }}</td>
                                <td>
                                    <a href="{{ route('admin.villes.edit', $ville->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirm" onclick="deleteData({{ $ville->id}})" data-original-title="Supprimer">Supprimer</button>
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

@push('ville')
<script>
    function deleteData(id)
     {
         var id = id;
         var url = '{{ route("admin.villes.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush