@extends('layouts.admin')

@section('title')
    @yield('page-title')
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                @include('partials.errors')
    
                <form action="@yield('form-action')" method="POST">
                    @csrf
                    @yield('form-method')
    
                    <div class="mb-3 input-group">
                        <label for="name" class="input-group-text">Name:</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $social->name) }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="home" class="input-group-text">Home:</label>
                        <input class="form-control" type="text" name="home" id="home" value="{{ old('home', $social->home) }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="logo" class="input-group-text">Logo:</label>
                        <input class="form-control" type="text" name="logo" id="logo" value="{{ old('logo', $social->logo) }}">
                    </div>

    
                   
                    <div class="mb-3 input-group">
                        <button type="submit" class="btn btn-xl btn-primary">
                            @yield('page-title')
                        </button>
                        <button type="reset" class="btn btn-xl btn-warning">
                            Reset all fields
                        </button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
@endsection