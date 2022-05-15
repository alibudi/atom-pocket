@extends('template.master')
@section('title', 'Dompet Keluar')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Selamat Data di Atom Pocket</h2>
        </div>
    </div>
     <div class="center-content">
        <div>
             @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                <span class="alert-inner--text"><strong>Success!</strong> {{ session('success') }}!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
            @if(session('errors'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
               @foreach ($errors->all() as $error)
                  <span class="alert-inner--text"><strong>Error!</strong> {{ $error }}!</span>
                 @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
        </div>
    </div>
</div>
<!-- /breadcrumb -->
    
@endsection