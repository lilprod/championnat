@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Détail d'une actualité</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Espace média</a></li>
                    <li class="breadcrumb-item">Détails d'une actualité</li>
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

        <div class="row">
            <div class="col-12">
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm mb-3 btn-round"> <i class="fa fa-arrow-left"></i>
                    Retour</a>
            </div>
        </div>
 
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <img class="img-fluid card-img-top" src="{{url('/storage/cover_images/'.$post->cover_image ) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{$post->getLink()}}">{{$post->title}}</a></h5>
                            <p class="card-text">{!!$post->body !!}</p>
                        </div>

                        
                  </div>
                </div>
            </div>

            
                   
    </div>
    <!-- subscribe end -->
</div>
<!-- [ Main Content ] end -->

@endsection
