@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Espace média</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Actualités</a></li>
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
        <h3><a class="btn btn-primary btn-sm mb-3 btn-round" href="{{URL::previous()}}"><i class="fas fa-long-arrow-alt-left"></i> Retour</a></h3>
    </div>
   
    @foreach ($posts as $post)
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3">
                <img class="img-fluid card-img-top" src="{{url('/storage/cover_images/'.$post->cover_image ) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{$post->getLink()}}">{{$post->title}}</a></h5>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body, 100, '...') !!}</p>
                </div>

                <div class="card-footer">
                    <div class="row pt-3">
                        <!--<div class="col"></div>-->
                        <div class="col text-center"><a href="{{$post->getLink()}}" class="text-success"><i class="far fa-eye"></i> Voir</a></div>
                                                                                    
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>


@endsection
