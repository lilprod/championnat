@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Types Média</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Types Média</a></li>
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
                <h5> Liste des types Média </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.typemedias.create') }}" class="btn btn-success btn-sm mb-3 btn-round" data-toggle="" data-target=""> <i class="fa fa-plus"></i>
                            Ajouter Type Média</a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Types Média</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($types as $key=> $type)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$type->title}}</td>
                                <td>
                                    <a href="{{ route('admin.typemedias.edit', $type->id) }}" class="btn btn-info btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData({{ $type->id}})" data-target="#confirm" data-original-title="Supprimer">Supprimer</button>
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


<div id="confirm" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-body text-center">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <img src="{{asset('/assets/assets/img/sent.png')}}" alt="" width="50" height="46">
                    <p>Voulez-vous supprimer ce type média?</p>
                    
                </div>
                <div class="m-b-20 text-center"> 
                    <a href="#" class="btn btn-white" data-dismiss="modal">Fermer</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('type')
<script>
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("admin.typemedias.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush