@extends('admin.layout.master')
@section('title')
Category Create
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST" >
                    @csrf


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Descriptiom</label>
                        <textarea class="form-control" name="meta_description" id=""></textarea>
                    </div>
                    @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>
                    @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
