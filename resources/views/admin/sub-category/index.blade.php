@extends('admin.layout.master')
@section('title')
Sub Category
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Sub Categories</h1>
            </div>
            <div class="card-body">

                 <a  style="margin: 25px"  class="btn btn-inverse-primary"
                    href="{{ route('admin.sub-category.create') }}">Create</a>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush