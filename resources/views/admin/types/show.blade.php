@extends('layouts.admin')

@section('title', 'Admin Type Show')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                {{ $type -> name}}
            </h1>
    
            <div>
                <p>
                    This a description of the "{{ $type->name }}" type.
                </p>
                <p>
                    This is a list of the projects categorized in this type:
                    <ul>
                        @forelse ($type->projects as $project)
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
