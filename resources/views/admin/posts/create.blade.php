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
                    <li class="breadcrumb-item">Ajout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">

    <div class="col-sm-12">
        @include('inc.messages')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                       <!-- <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualités actives</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Actualités en attente</a>
                            </li>
                        </ul>-->
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{route('posts.create')}}"><i class="fas fa-plus mr-1"></i> Ajouter actualité</a>
                    </div>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" autocomplete="off" id="store_offer" action="{{ route('posts.store') }}">
                {{csrf_field()}}

                <div class="card-body">
                <!-- Add Blog -->
            

                    <div class="row form-row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Titre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="slug" id="slug">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categorie</label>
                                <select class="form-control select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Extrait</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>

                        <!--<div class="col-md-6">
                            <div class="form-group">
                                <label>Video URL</label>
                                <input type="text" class="form-control" name="video_url">
                            </div>
                        </div>-->

                    </div>

                <!-- /Basic Information -->
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Texte de l'actualité <span class="text-danger">*</span></label>
                            <textarea id="classic-editor" class="form-control service-desc" rows="6" name="body"></textarea>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <span><i class="fa fa-upload"></i> Charger une Image de couverture</span>
                            <input type="file" class="form-control" name="cover_image">
                            <small class="form-text text-muted">JPG ou PNG autorisé. Taille maximale de 2 Mo</small>
                        </div>
                    </div>
                </div>

            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_active" value="1" checked>
                                <label class="form-check-label" for="blog_active">
                                Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0">
                                <label class="form-check-label" for="blog_inactive">
                                Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                    </div>
                </div>
            <!-- /Add Blog -->
           

            <div class="card-footer">
                <div class="submit-section">
                    <button class="btn btn-primary btn-lg" type="submit" name="form_submit">Enregister</button>
                </div>
            </div>

        </form>
        </div>
    </div>

</div>
<!-- [ Main Content ] end -->

@endsection

@push('scripts')
<script>
  $('#title').change(function(e) {
    $.get('{{ route('post.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endpush