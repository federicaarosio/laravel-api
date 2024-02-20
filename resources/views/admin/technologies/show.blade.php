@extends('layouts.admin')

@section('title', 'Admin technology Show')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                {{ $technology -> name}}
            </h1>
    
            <div>
                <p>
                    This a description of the "{{ $technology->name }}" technology.
                </p>
                <p>
                    This is a list of the projects using this technology:
                    <ul>
                        @forelse ($technology->projects as $project)
                        <li>
                            {{ $project-> title }}
                        </li>
                        @empty
                            This technology has no projects listed yet.
                        @endforelse

                    </ul>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
