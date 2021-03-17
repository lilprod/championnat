@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Permissions</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Permissions</a></li>
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
                <h5> Liste des Permissions </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <!--<button class="btn btn-success btn-sm mb-3 btn-round" data-bs-toggle="modal" data-bs-target="#modal-report"><i class="feather icon-plus"></i> Ajouter Permission</button>-->
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-success btn-sm mb-3 btn-round" data-toggle="" data-target=""> <i class="fa fa-plus"></i>
                            Ajouter Permission</a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Permissions</th>
                                <th style="width: 10%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData({{ $permission->id}})" data-target="#confirm" data-original-title="Supprimer">Supprimer</button>
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

<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Nouvelle</span> 
                    <span class="fw-light">
                        permission
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small"> Formulaire d'une nouvelle permission</p>
                    {{ Form::open(array('url' => 'permissions')) }}
                        <div class="row">

                            

                            <div class="col-sm-12">
                                  <div class="form-group">
                                    {{ Form::label('name', 'Nom de la permission') }}
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div><br>
                                    @if(!$roles->isEmpty())
                                        <h6>Assigner un rôle à la permission</h6>

                                        @foreach ($roles as $role) 
                                            {{ Form::checkbox('roles[]',  $role->id ) }}
                                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                        @endforeach
                                    @endif
                            </div>

                        </div>
                    
                </div>

                <div class="modal-footer no-bd">
                    <!--<button type="button" id="addRowButton" class="btn btn-primary">Ajouter</button>-->
                    {{ Form::submit('Ajouter', array('class' => 'btn btn-primary')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection

@push('permission')
<script>
function deleteData(id)
     {
         var id = id;
         var url = '{{ route("admin.permissions.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endpush