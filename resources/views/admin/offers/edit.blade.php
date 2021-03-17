@extends('admin.layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Offres</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Offres</a></li>
                    <li class="breadcrumb-item">Edition</li>
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
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Offres actives</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Offres en attente</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.offers.create')}}"><i class="fas fa-plus mr-1"></i> Ajouter Offre</a>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.offers.update', $offer->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">
                <!-- Add Blog -->
            

                    <div class="row form-row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" id="title" value="{{$offer->title}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="slug" id="slug" value="{{$offer->slug}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ ($offer->category_id === $category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Extract</label>
                                <input type="text" class="form-control" name="description" value="{{$offer->description}}">
                            </div>
                        </div>
       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Réference </label>
                                <input class="form-control" type="text" name="reference" id="reference" value="{{$offer->reference}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Region <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="region" id="region" value="{{$offer->region}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Structure</label>
                                <select class="form-control select" name="structure_id">
                                    @foreach($structures as $structure)
                                        <option value="{{$structure->id}}" {{ ($offer->structure_id === $structure->id) ? 'selected' : '' }}>{{$structure->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service</label>
                                <select class="form-control select" name="service_id">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}" {{ ($offer->service_id === $service->id) ? 'selected' : '' }}>{{$service->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Du</label>
                                <input type="date" class="form-control" name="start_date" value="{{$offer->start_date}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Au</label>
                                <input type="date" class="form-control" name="end_date" value="{{$offer->end_date}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rémunération jour </label>
                                <input class="form-control" type="number" name="day_pay" id="day_pay" value="{{$offer->day_pay}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Astreinte </label>
                                <input class="form-control" type="number" name="penalty" id="penalty" value="{{$offer->penalty}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rémunération Garde 24 heures </label>
                                <input class="form-control" type="number" name="hour_guard" id="hour_guard" value="{{$offer->hour_guard}}">
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
                            <label>Corps de l'offre <span class="text-danger">*</span></label>
                            <textarea id="classic-editor" class="form-control service-desc" rows="6" name="body">{{$offer->body}}</textarea>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <span><i class="fa fa-upload"></i> Charger une Image de couverture</span>
                            <input type="file" class="form-control" name="cover_image">
                            <small class="form-text text-muted">Allowed JPG or PNG. Max size of 2MB</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Conseil de l'ordre requis</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="registered_with_council" id="council_active" value="1" {{  $offer->registered_with_council == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="council_active">
                                Oui
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="registered_with_council" id="council_inactive" value="0" {{  $offer->registered_with_council == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="council_inactive">
                                Non
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Pris en charge Logement, Repas & Déplacements</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accom_meal_travel" id="accom_active" value="1" {{  $offer->accom_meal_travel == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="council_active">
                                Oui
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="accom_meal_travel" id="accom_inactive" value="0" {{  $offer->accom_meal_travel == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="council_inactive">
                                Non
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_active" value="1" {{  $offer->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="blog_active">
                                Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0" {{  $offer->status == 0 ? 'checked' : '' }}>
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
            </div>

            <div class="card-footer">
                <div class="submit-section">
                    <button class="btn btn-primary btn-lg" type="submit" name="form_submit">Modifier</button>
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
    $.get('{{ route('offre.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endpush