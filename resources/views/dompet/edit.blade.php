@extends('template.master')
@section('title', 'Create Dompet')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Update Dompet</h2>
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
					<form class="form-horizontal" method="POST" action="{{ route('dompet.update',$edit_dompet->dompet_id) }}" >
						@csrf
                        @method('PUT')
					 <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                            <label for="nama">Nama <sup style="color: red;">*</sup> </label>
                            <input type="text" name="nama" value="{{ $edit_dompet->nama }}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="alert -alert-danger message">
                                    <i class="fa fa-warning"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="referensi">Referensi</label>
                            <input type="text" name="referensi" value="{{ $edit_dompet->referensi }}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $edit_dompet->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger message">
                                    <i class="fa fa-warning"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-4 form-group">
                            <label for="status">Status</label>
                            <select name="status_dompet" class="form-control">
                                <option value="Aktif" {{ $edit_dompet->status_dompet == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $edit_dompet->status_dompet == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
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