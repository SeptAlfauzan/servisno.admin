@extends('layouts.default')
@section('content')
    
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Mitra/Partner</div>
						<a href="{{ route('partner.index') }}" class="btn btn-warning btn-sm ml-auto">back</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{ route('partner.update', $partner->id)}}">
					@method('PATCH')
                    @csrf
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $partner->nama }}">
						@error('nama')
							<div class="text-danger"> {{ $message }} </div>
						@enderror
					</div>
					<div class="form-group">
                            <label for="email" class="">email address</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $partner->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" rows="5" cols="40" class="form-control tinymce-editor" placeholder="">{{ $partner->ket }}</textarea>
                    </div> 	
					<button type="submit" class="btn btn-primary mb-2">Update</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
