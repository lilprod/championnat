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
    <div class="col-lg-8 offset-lg-2">

        @include('inc.messages')
        
        <div class="card">
            <div class="card-header">
                <h5>Editer Stade </h5>
            </div>

            <form method="POST" action="{{ route('admin.stades.update', $stade->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">

                    <div class="row form-row">

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Ville <span class="text-danger">*</span></label>
                                <select name="ville_id" id="ville_id" class="form-control mb-30" required>
                                    @foreach ($villes as $ville)
                                        <option value="{{$ville->id}}" {{ ($stade->ville_id === $ville->id) ? 'selected' : '' }}>{{$ville->title}}</option>	
                                    @endforeach	
                                </select>
                            </div>
                         </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Nom du stade </label>
                                <input class="form-control" type="text" name="title" value="{{$stade->title}}">
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description">{{$stade->description}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Editer stade</button>
                </div>
            </form>
    
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection