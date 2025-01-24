@extends('admin.layout.master')
@section('title')
Admin List
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admins</h1>
            </div>
            <div class="card-body">

                 <a  style="margin: 25px"  class="btn btn-inverse-primary"
                    href="{{ route('admin.admin-list.create') }}">Create</a>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
