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
						<div class="card-title">USER</div>
					</div>
				</div>
				<div class="card-body">
					@if (Session::has('sukses'))
					<div class="alert alert-primary">
						{{ Session('sukses') }}
					</div>
					@endif
					<div class="table-responsive">
						<table class="table  table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Email</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($penggunas as $row)
								<tr>
									<td>{{ $row->id }}</td>
									<td>{{ $row->email }}</td>
									<td>
										@if($row->verified)
										Akun Terverifikasi
										@else
										<form action="{{ route('pengguna.update',[ $row->username, $row->email, $row->verificationCode]) }}" method="POST" class="d-inline">
											@csrf
											@method('POST')
											<input hidden name="email" value="{{ $row->email }}">
											<input hidden name="verificationCode" value="{{ $row->verificationCode }}">
											<button class="btn btn-warning">
												Verifikasi sekarang
											</button>
										</form>
										@endif
										{{$row->verified}}
									</td>
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