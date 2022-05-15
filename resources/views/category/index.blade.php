@extends('template.master')
@section('title', 'Kategori')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Data kategori</h2>
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
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"> <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">  <i class="fas fa-plus"> Buat Baru</i> </a></h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    
                </div>
                <div class="card-body">
                   <div class="table-responsive">
										<table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NAMA</th>
									<th>DESKRIPSI</th>
									<th>STATUS</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                              @foreach ($category as $item)
                                    <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->status_category }}</td>
                                    <td class="text-center">
                                        @if ($item->status_category == 'Aktif')
                            <a class="btn btn-danger btn-xs" id="change_color" href="{{ route('category.status', $item->status_ID) }}">
                                <i class="fa fa-times"></i> Tidak Aktif
                            </a>
                            @else
                            <a class="btn btn-success btn-xs" id="change_color" href="{{ route('category.status', $item->status_ID) }}">
                                <i class="fa fa-check"></i> Aktif
                            </a>
                            @endif
                             <a class="btn btn-primary btn-xs" href="{{ route('category.edit',$item->category_id) }}"><i class="fas fa-pen"></i></a>
                             <a class="btn btn-primary btn-xs" href="{{ route('category.show',$item->status_ID) }}"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                               
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
@endsection