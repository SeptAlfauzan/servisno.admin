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

					</div>
				</div>
				<div class="card-body">
					@if (Session::has('sukses'))
					<div class="alert alert-primary">
						{{ Session('sukses') }}
					</div>
					@endif
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Nama</th>
									<th>Alamat</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($partners as $row)
								<tr>
									<td>{{ $row->id }}</td>
									<td>{{ $row->username }}</td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->address }}</td>
								</tr>
								@empty
								<tr>Data Masih Kosong</tr>
								@endforelse

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection