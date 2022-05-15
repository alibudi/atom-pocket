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
					<form class="form-horizontal" method="POST" action="{{ route('dompet.store') }}" >
						@csrf
						<div class="row">
                            <div class="col-md-6">
                                <label for="">Nama</label>
                                <div class="form-group">
							<input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama">
						</div>
                        <label for="">Referensi</label>
                        <div class="form-group">
							<input type="text" name="referensi" class="form-control" id="inputName" placeholder="Referensi">
						</div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Deskripsi</label>
                                <div class="form-group">
                                    <textarea class="form-control" cols="30" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                    <label for="publish_at">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select>
                        @error('publish_at')
                        <div class="invalid-feedback">
                            {{ $message }}    
                        </div>
                        @enderror
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