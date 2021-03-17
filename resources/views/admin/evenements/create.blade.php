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
                <h5>Nouvel Evènement </h5>
            </div>

            <form method="POST" action="{{ route('admin.evenements.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                   <div class="row form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Journée <span class="text-danger">*</span></label>
                            <select name="journee_id" id="journee_id" class="form-control mb-30" required>
                                @foreach ($journees as $journee)
                                    <option value="{{$journee->id}}">{{$journee->title}}</option>	
                                @endforeach	
                            </select>
                        </div>
                     </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Date de la rencontre <span class="text-danger">*</span></label>
                            <input type="date" name="date_match" class="form-control mb-30" required>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Libellé <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Libellé de rencontre" value="{{ old('title') }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>   
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Stade de la rencontre<span class="text-danger">*</span></label>
                            <select name="stade_id" id="stade_id" class="form-control mb-30" required>
                                @foreach ($stades as $stade)
                                    <option value="{{$stade->id}}">{{$stade->title}}</option>	
                                @endforeach	
                            </select>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de place <span class="text-danger">*</span></label>
                            <input type="number" name="quota" class="form-control @error('quota') is-invalid @enderror" placeholder="Nombre de place(s)" value="{{ old('title') }}" required>
                        </div>

                        @error('quota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                      </div>

                      <div class=" col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Ajouter Evènement</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection
