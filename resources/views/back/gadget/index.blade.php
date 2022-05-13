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
						<div class="card-title">Jenis Gadget</div>
						<a href="{{ route('gadget.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah</a>
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
								<th>Nama</th>
								<th>Keterangan</th>
                    
                                <th>action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($gadgets as $row)
							<tr>
								<td>{{ $row->id }}</td>
								<td>{{ $row->nama}}</td>
                                <td>{{ $row->ket }}</td>
							
                                <td><a href="{{ route('gadget.edit', $row->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
											<form action="{{ route('gadget.destroy', $row->id) }}" method="POST" class="d-inline">
											@csrf
											@method('delete')
											<button class="btn btn-danger">
                                                Delete
											</button>
											</form>
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
