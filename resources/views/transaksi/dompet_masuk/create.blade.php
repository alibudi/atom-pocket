@extends('template.master')
@section('title', 'Create Dompet')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Create Dompet</h2>
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
					<form class="form-horizontal" method="POST" action="{{ route('dompet_masuk.store') }}" >
						@csrf
						<div class="row">
                        <div class="col-3">
                        <div class="form-group">

                            <label for="kode">Kode : </label>
                            <input type="text" name="kode" value="{{ App\Helper\helper::kode_in() }}" class="form-control @error('kode') is-invalid @enderror">
                            @error('kode')
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i> {{ $message }}
                                </div>
                            @enderror

                        </div>
                        </div>

                        <div class="col-3">

                        <div class="form-group">
                            <label for="tanggal">Tanggal :</label>
                            <input type="text" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" readonly>
                        </div>

                        </div>

                        <div class="col-3">

                            <div class="form-group">
                            <label for="category">Kategori :</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->category_id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-3">

                            <div class="form-group">
                            <label for="dompet">Dompet : <sup style="color: red;">*</sup> </label>
                                <select name="dompet_id" class="form-control">
                                    @foreach ($dompet as $items)
                                        <option value="{{ $items->dompet_id }}">{{ $items->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nilai">Nilai : <sup style="color: red;">*</sup> </label>
                                <input type="text" name="nilai" class="form-control @error('nilai') is-invalid @enderror" placeholder="0">
                                @error('nilai')
                                    <div class="alert alert-danger message">
                                        <i class="fa fa-warning"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi </label>
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
						<div class="form-group mb-0 mt-3 justify-content-end">
							<div>
								<button type="submit" class="btn btn-primary">Save</button>
								{{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<!-- row -->

@endsection