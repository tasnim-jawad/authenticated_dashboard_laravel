
@extends('backend.master')
@section('main_content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add User Account</h3></div>
                        <div class="card-body">

                            <form method="POST" action="{{Route('users.addUser')}}">
                                @csrf

                                <!-- Name -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="name@example.com"  required/>
                                    <label for="name">Email address</label>
                                </div>
                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" required/>
                                    <label for="email">Email address</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="password" type="password" name="password" placeholder="Create a password"  required/>
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="password_confirmation" type="password"  name="password_confirmation" placeholder="Confirm password" required/>
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Creat Account</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
