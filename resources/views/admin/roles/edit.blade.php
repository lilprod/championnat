@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Rôles</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Rôles</a></li>
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
    <div class="col-lg-4 col-lg-offset-4">

        @include('inc.messages')

        <div class="card">
            <div class="card-header">
                <h5>Editer Rôle </h5>
            </div>

            {{ Form::model($role, array('route' => array('admin.roles.update', $role->id), 'method' => 'PUT')) }}
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('name', 'Nom du Rôle') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assigner un/des Permission(s)</b></h5>

                @foreach ($permissions as $permission)
                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions , ['class' => 'form-check-input input-primary']) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br><br>
                @endforeach
            </div>

            <div class="card-footer">
				{{ Form::submit('Editer Rôle', array('class' => 'btn btn-primary btn-block')) }}
			</div>
		    {{ Form::close() }}
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection