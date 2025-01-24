@extends('admin.layout.master')
@section('title')
Admin List Edit
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Admin</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.admin-list.update',$admin->id) }}" method="POST" >
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $admin->name }}" name="name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="{{ $admin->email }}" name="email">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" class="form-control" value="{{ $admin->password }}" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">password confirmation</label>
                        <input type="password" class="form-control" value="{{ $admin->password }}" name="password_confirmation">
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" id="">
                            <option @selected($admin->role == 'admin') value="admin">admin</option>
                            <option @selected($admin->role == 'user') value="user">user</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
