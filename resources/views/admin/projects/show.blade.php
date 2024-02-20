@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                {{ $project -> title}}
            </h1>

            <img src="{{ $project -> cover_image }}" alt="project image">

            <div>
                <strong>a project by: </strong>{{ $project -> author }}
            </div>
            <div>
                <strong>creation date: </strong>{{ $project -> creation_date  }}
            </div>

            <div>
                <p>
                    <strong>description: </strong>{{ $project->description }}
                </p>
                <p>
                    <strong>Type: </strong>{{ $project-> type -> name}}
                </p>
                <p>
                    <strong>Technologies: </strong>
                    <ul>
                        @forelse ($project->technologies as $technology)
                            <li class="me-3">
                                    {{ $technology->name }}
                            </li>
        
                        @empty
                            This project has no technologies yet...
                        @endforelse
                    </ul>
                </p>

                <p>
                    <strong>
                        Socials:
                    </strong>
                    <ul>
                        @forelse ($project->socials as $social)
                            <li class="me-3">
                                {{ $social->name }}
                            </li>
                        @empty
                            There are no socials here, yet.
                        @endforelse
                    </ul>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
