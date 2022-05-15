@extends('template.master')
@section('title', 'Tambah Kategori')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Tambah Kategori</h2>
            {{-- <p class="mg-b-0">Sales monitoring dashboard template.</p> --}}
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
					<form class="form-horizontal" method="POST" action="{{ route('laporan.store') }}" >
						@csrf
						   <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="date" name="tgl_awal" value="{{ old('tgl_awal') }}" class="form-control datepicker @error('tgl_awal') is-invalid @enderror">
                        </div>
                        @error('tgl_awal')
                            <div class="alert alert-danger message">
                                <i class="fa fa-warning"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="date" name="tgl_akhir" value="{{ old('tgl_akhir') }}" class="form-control datepicker @error('tgl_akhir') is-invalid @enderror">
                        </div>
                        @error('tgl_akhir')
                            <div class="alert alert-danger message">
                                <i class="fa fa-warning"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="control-group">
                        <label for="status">Status</label><br/>
                        <label class="control control--checkbox">Tampilkan Uang Masuk
                            <input type="checkbox" value="Masuk" name="status[]" checked="checked"/>
                            <div class="control__indicator"></div>
                        </label>
                        <label class="control control--checkbox">Tampilkan Uang Keluar
                            <input type="checkbox" value="Keluar" name="status[]" checked="checked"/>
                            <div class="control__indicator"></div>
                        </label>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="category">Kategori :</label>
                        <select name="category_id" class="form-control">
                            <option value="all">Semua</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->category_id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="dompet">Dompet :</label>
                        <select name="dompet_id" class="form-control">
                            <option value="all">Semua</option>
                            @foreach ($dompet as $items)
                                <option value="{{ $items->dompet_id }}">{{ $items->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <input type="submit" class="btn btn-primary btn-md" name="click" value="Buat Laporan">
            <input type="submit" class="btn btn-primary btn-md" name="click" value="Buat Ke Excel">
					</form>
				</div>
			</div>
		</div>

	</div>
	<!-- row -->

@endsection