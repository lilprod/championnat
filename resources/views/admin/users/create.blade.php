@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Utilisateurs</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Utilisateurs</a></li>
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
    <div class="col-sm-12">
        @include('inc.messages')
        <div class="card">
            <div class="card-header">
                <h5>Nouvel utilisateur </h5>
            </div>

            {{ Form::open(array('url' => 'super/users', 'enctype' => 'multipart/form-data')) }}
            <div class="card-body">
                
				<div class="row">

				<div class="col-md-6 pr-0">
					<div class="form-group">
                        <label for="name">Nom<span class="text-danger">*</span></label>
                        {{ Form::text('name', '', array('class' => 'form-control form-control-uppercase', 'id' => 'name')) }}
                      </div>
                  </div>

                  <div class="col-md-6 pr-0">
                      <div class="form-group">
                        {{ Form::label('firstname', 'Prénom(s)') }}
                        {{ Form::text('firstname', '', array('class' => 'form-control form-control-capitalize', 'id' => 'firstname')) }}
                      </div>
                  </div>

                  <div class="col-md-6 pr-0">
                      <div class="form-group">
                            <label for="email">Adresse e-mail<span class="text-danger">*</span></label>
                            {{ Form::email('email', '', array('class' => 'form-control')) }}
                      </div>
                  </div>


                  <div class="col-md-6 pr-0">
                    <label>Téléphone <span class="text-danger">*</span></label>
                    <input id="output" type="hidden" name="phone_number" value=""/>
                    <input type="tel" id="phone" name="" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="col-md-6 pr-0">
                      <div class="form-group">
                            <label for="password">Mot de passe<span class="text-danger">*</span></label>
                            {{ Form::password('password', array('class' => 'form-control')) }}
                      </div>
                  </div>

                  <div class="col-md-6 pr-0">
                      <div class="form-group">
                            <label for="password_confirmation">Confirmation de mot de passe<span class="text-danger">*</span></label>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="col-sm-6 pr-0">
                      <div class="form-group">
                        {{ Form::label('address', 'Adresse') }}
                        {{ Form::text('address', '' , array('class' => 'form-control', 'id' => 'address')) }}
                      </div>
                    </div>

                  
					<div class="col-md-6 pr-0">
                      <div class="form-group">
                          {{ Form::label('profile_picture', 'Photo de profil') }}
                          {{ Form::file('profile_picture', array('class' => 'form-control')) }}
                      </div>
                  </div>
                    

					<div class="col-sm-12">
	                  	<h5><b>Assigner rôle</b><span class="text-danger">*</span></h5>
	                    <div class='form-group'>
	                        @foreach ($roles as $role)
	                            {{ Form::checkbox('roles[]',  $role->id ,  false, ['class' => 'form-check-input input-primary']) }}
	                            {{ Form::label($role->name, ucfirst($role->name)) }}
	                        @endforeach
	                    </div>
					</div>

				</div>
			</div>

			<div class="card-footer">
				{{ Form::submit('Ajouter utilisateur', array('class' => 'btn btn-primary btn-block')) }}
			</div>
		    {{ Form::close() }}
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection