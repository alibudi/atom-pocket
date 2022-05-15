@extends('template.master')
@section('title', 'Dompet')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Data Dompet</h2>
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
                        <h4 class="card-title mg-b-0"> <a href="{{ route('dompet.create') }}" class="btn btn-primary btn-sm">  <i class="fas fa-plus"> Buat Baru</i> </a></h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NAMA</th>
                                   	<th>REFERENSI</th>
									<th>DESKRIPSI</th>
									<th>STATUS</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                              @foreach ($dompet as $item)
                                    <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->referensi }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->status_dompet }}</td>
                                    <td class="text-center">
                                        @if ($item->status_dompet == 'Aktif')
                            <a class="dropdown-item" id="change_color" href="{{ route('dompet.status', $item->status_ID) }}">
                                <i class="fa fa-times"></i> Tidak Aktif
                            </a>
                            @else
                            <a class="dropdown-item" id="change_color" href="{{ route('dompet.status', $item->status_ID) }}">
                                <i class="fa fa-check"></i> Aktif
                            </a>
                            @endif
                                    <form action="{{ route('dompet.destroy',$item->ID) }}" method="POST">
                                        <a class="btn btn-primary btn-xs" href="{{ route('dompet.edit',$item->ID) }}"><i class="fas fa-pen"></i></a> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                    </form>
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