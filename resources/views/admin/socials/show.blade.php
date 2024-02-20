@extends('layouts.admin')

@section('title', 'Admin social Show')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                {{ $social -> name }}
            </h1>
    
            <div>
                <p>
                    This a description of the "{{ $social->name }}" social.
                </p>
                <p>
                    <strong>
                        Home:
                    </strong> 
                    {{ $social->home }}
                </p>
                <img src="{{ $social->logo }}" alt="social logo">
                <p>
                    This is a list of the projects including this social:
                    <ul>
                        @forelse ($social->projects as $project)
                        <li>
                            {{ $project-> title }}
                        </li>
                        @empty
                            This social has no projects listed yet.
                        @endforelse

                    </ul>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
