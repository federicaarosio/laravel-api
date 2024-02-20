@extends('admin.socials.layouts.create-or-edit')

@section('page-title', 'Edit a social')

@section('form-action')
    {{ route('admin.socials.update', $social) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection