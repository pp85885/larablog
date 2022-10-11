@extends('layouts.master')

@section('title','Users | Dashborad')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4"> 
        <div class="card-header">
            <h4>Manage Users</h4>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table id="myTable" class="table table-bordered table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($user_list as $item)
                        
                    <tr>
                        <td>{{ $count ++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                           
                            @if ($item->role_as == '1')
                                {{ 'Admin' }}

                            @elseif ($item->role_as == '2')
                                {{ 'Blogger' }}
                            
                            @else
                                {{ 'user' }}
                            @endif                       

                            
                        </td>
                        <td>
                            <a href="{{ url('admin/edit-user/'.$item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection()