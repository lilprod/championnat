@extends('admin.layouts.app')

@section('content')
 <!-- [ breadcrumb ] start -->
 <div class="page-header">
    <div class="page-block">
       <div class="row align-items-center">
          <div class="col-md-12">
             <div class="page-header-title">
                <h5 class="m-b-10">{{ __('Dashboard') }}</h5>
             </div>
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item">{{ __('Dashboard') }}</li>
             </ul>
          </div>
       </div>
    </div>
 </div>
 <!-- [ breadcrumb ] end -->

 <!-- [ Main Content ] start -->
 <div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header">
             <h5>{{ __('Dashboard') }}</h5>
          </div>
          <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
          </div>
       </div>
    </div>
    <!-- [ sample-page ] end -->
 </div>
 <!-- [ Main Content ] end -->
@endsection


