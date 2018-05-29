@extends('admin.app.index')
@section('title','Users')

@section('content')

<div class="content-box">
    <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i>Add New User</a>
    <h5 class="element-header">Users</h5>
	<div class="element-wrapper">
	    <div class="element-box">
	        <div class="table-responsive">
	            <table id="table_users" width="100%" class="table">
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Location</th>
	                        <th>Phone</th>
	                        <th>Role</th>
	                        <th>Active</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody></tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>

@endsection