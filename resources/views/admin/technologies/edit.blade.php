@extends('admin.technologies.layouts.create-or-edit')

@section('page-title', 'Edit a technology')

@section('form-action')
    {{ route('admin.technologies.update', $technology) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection