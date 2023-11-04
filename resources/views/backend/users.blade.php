@extends('backend.master')
@section('main_content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-sm btn-info" href="{{Route('users.addUserForm')}}"><i class="fas fa-user me-1"></i>Add user</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>srl#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>srl#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            // dd($users);
                            $i = 1;
                        @endphp
                        @if (count($users) >0)
                            @foreach ($users as $single_user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ucwords($single_user->name) }}</td>
                                <td>{{$single_user->email}}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{Route('user.editUser' ,$single_user->id)}}"><i class="fas fa-edit me-1"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{Route('user.deleteUser' , $single_user->id)}}"><i class="fas fa-trash me-1"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

