@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Stades</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Stades</a></li>
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
    <div class="col-lg-8 offset-lg-2">

        @include('inc.messages')
        
        <div class="card">
            <div class="card-header">
                <h5>Nouveau Stade </h5>
            </div>

            <form method="POST" action="{{ route('admin.stades.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ville <span class="text-danger">*</span></label>
                                <select name="ville_id" id="ville_id" class="form-control mb-30" required>
                                    @foreach ($villes as $ville)
                                        <option value="{{$ville->id}}">{{$ville->title}}</option>	
                                    @endforeach	
                                </select>
                            </div>
                         </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nom du stade</label>
                                <input type="text" class="form-control" name="title">
                            </div>
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
                    <button type="submit" class="btn btn-primary btn-block">Ajouter Stade</button>
                </div>
            </form>
        
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection