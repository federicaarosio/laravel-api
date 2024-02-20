@extends('admin.technologies.layouts.create-or-edit')

@section('page-title', 'Create a new technology')

@section('form-action')
    {{ route('admin.technologies.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection