@extends('layouts.admin')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                These are all the technologies you have, {{ Auth::user()->name }}
            </h1>

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology )
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->name }}</td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology) }}">
                                <button class="btn btn-sm btn-primary">
                                    View
                                </button>
                            </a>
                            <a href="{{ route('admin.technologies.edit', $technology) }}">
                                <button class="btn btn-sm btn-success">
                                    Edit
                                </button>
                            </a>


                                <!-- Button trigger modal -->
                                <button technology="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $technology->id }}">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $technology->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete technology</h1>
                                        <button technology="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you really sure you want to delete "<strong>{{ $technology->name }}</strong>" technology?<br>
                                            After deleting, you'll find it in the "Deleted technologies" menu where you can restore it.
                                        </div>
                                        <div class="modal-footer">
                                        <button technology="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
            
                                            <button class="btn btn-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection