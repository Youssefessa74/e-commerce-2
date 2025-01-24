@extends('admin.layout.master')
@section('title')
Sub Category Edit
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Sub Category</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.sub-category.update',$sub_category->id) }}" method="POST" >
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $sub_category->name }}" name="name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control"  value="{{ $sub_category->meta_title }}" name="meta_title">
                    </div>
                    @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description"  id="">{{ $sub_category->meta_description }}</textarea>
                    </div>
                    @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords"  value="{{ $sub_category->meta_keywords }}">
                    </div>
                    @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $item)
                            <option @selected($sub_category->category_id == $item->id) value="{{$item->id }}">{{$item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option @selected($sub_category->status == 1) value="1">Active</option>
                            <option @selected($sub_category->status == 0) value="0">In Active</option>
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
