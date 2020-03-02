@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
							<thead>
								<tr>
									<th>id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Roles</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
										<td>
											<a href="{{ route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-warning float-left">Edit</button></a>
											<form method="POST" action="{{ route('admin.users.destroy', $user)}}" class="float-left">
												@method('DELETE')
												@csrf
												<button type="submit" class="btn btn-danger">Delete</button>
											</form>
										</td>
								</tr>
								@endforeach
							</tbody>
						</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
