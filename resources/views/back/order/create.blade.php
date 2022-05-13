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
						<div class="card-title">Status Order</div>
						<a href="{{ route('order.index') }}" class="btn btn-warning btn-sm ml-auto">back</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{ route('order.store')}}">
					@csrf
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
						@error('nama')
							<div class="text-danger"> {{ $message }} </div>
						@enderror
					</div>
					
					
					<button type="submit" class="btn btn-primary mb-2">Upload</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
