@extends('layouts.master')

@section('title','Edit User')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('admin/update-user/'.$user_info->id) }}">  
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user_info->name }}" class="form-control">
                    </div> 
                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="Email" name="email" value="{{ $user_info->email }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Role</label>
                        <select name='role' class="form-control">
                            <option value="0" {{ $user_info->role_as == '0'? 'selected':'' }}>User</option>
                            <option value="1" {{ $user_info->role_as == '1'? 'selected':'' }}>Admin</option>
                            <option value="2" {{ $user_info->role_as == '2'? 'selected':'' }}>Blogger</option>
                        </select>
                    </div> 
                    <div class="col-md-12">
                        <input type="submit" value="submit" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection()