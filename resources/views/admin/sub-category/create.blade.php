@extends('admin.layout.master')
@section('title')
Sub Category Create
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Sub Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.sub-category.store') }}" method="POST" >
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
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $item)
                            <option value="{{$item->id }}">{{$item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
