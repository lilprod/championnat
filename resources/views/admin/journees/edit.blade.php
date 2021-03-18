@extends('admin.layouts.app')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Services</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Services</a></li>
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
                <h5>Editer Journée </h5>
            </div>

            <form method="POST" action="{{ route('admin.journees.update', $journee->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">

                    <div class="row form-row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Libelle Journée </label>
                                <input class="form-control" type="text" name="title" value="{{$journee->title}}">
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Code Journée</label>
                                <input class="form-control" type="text" name="code" value="{{$journee->code}}">
                            </div>
                        </div>
                    
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description">{{$journee->description}}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="journee_active" value="1" {{  $journee->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="journee_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="journee_inactive" value="0" {{  $journee->status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="journee_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Editer Journée</button>
                </div>
            </form>
    
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection