@extends('admin.socials.layouts.create-or-edit')

@section('page-title', 'Create a new social')

@section('form-action')
    {{ route('admin.socials.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection