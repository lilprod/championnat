@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Actualités</h5>
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
        @include('inc.messages')
    </div>

    @foreach ($posts as $post)
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3">
                <img class="img-fluid card-img-top" src="{{url('/storage/cover_images/'.$post->cover_image ) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body, 100, '...') !!}</p>
                   <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                </div>

                <div class="card-footer">
                    <div class="row pt-3">
                        <div class="col"><a href="{{ URL::to('posts/'.$post->id.'/edit') }}" class="text-success"><i class="far fa-edit"></i> Editer</a></div>
                                                                                    
                        <div class="col text-right"><a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#exampleModalLive" onclick="postData({{$post->id}})"><i class="far fa-trash-alt"></i> Supprimer</a></div>
                    </div>
                </div>
                
            </div>
        </div>
    @endforeach
    
</div>

<div class="modal fade" id="exampleModalLive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="InactiveForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p id="acc_msg">Etes-vous sûre de vouloir supprimer ce post?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Non, Fermer</a>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Supprimer</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('post')
<script>
	function postData(id)
     {
         var id = id;
         var url = '{{ route("posts.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#InactiveForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#InactiveForm").submit();
     }
</script>
@endpush