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
    <div class="col-lg-4 col-lg-offset-4">

        @include('inc.messages')

        <div class="card">
            <div class="card-header">
                <h5>Nouvelle Permission </h5>
            </div>

            {{ Form::open(array('url' => 'admin/permissions')) }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group">
                            {{ Form::label('name', 'Nom de la permission') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div><br>
                            @if(!$roles->isEmpty())
                                <h6>Assigner un Rôle à la permission</h6>

                                @foreach ($roles as $role) 
                                    {{ Form::checkbox('roles[]',  $role->id ,  false, ['class' => 'form-check-input input-primary'] ) }}
                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>

            <div class="card-footer">
				{{ Form::submit('Ajouter Permission', array('class' => 'btn btn-primary btn-block')) }}
			</div>
		    {{ Form::close() }}
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection