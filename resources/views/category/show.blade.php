@extends('template.master')
@section('title', 'Detail Kategori')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Detail Kategori</h2>
        </div>
    </div>
</div>
<!-- /breadcrumb -->

<!-- row -->
	<div class="row row-sm">
		<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
			<div class="card  box-shadow-0">
				<div class="card-header">
				</div>
				<div class="card-body pt-0">
				 <h5>Nama</h5>
        <p>{{ $show_category->nama }}</p>
        <br/>

        <h5>Deskripsi</h5>
        <p>{{ $show_category->deskripsi }}</p>
        <br/>

        <h5>Status kategori</h5>
        <p>{{ $show_category->status_category }}</p>
				</div>
			</div>
		</div>

	</div>
	<!-- row -->

@endsection