@extends('layouts.admin')

@section('title', 'Admin Deleted Types')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                all types that have been deleted
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
                    @foreach ($types as $type )
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a href="{{ route('admin.types.deleted.restore', $type) }}">
                                <button class="btn btn-sm btn-primary">
                                    View
                                </button>
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.types.deleted.restore', $type) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-sm btn-warning" type="submit">
                                    Restore
                                </button>
                            </form>


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $type->id }}">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete type</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you really sure you want to delete "<strong>{{ $type->name }}</strong>" type?<br>
                                            This action is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form class="d-inline-block" action="{{ route('admin.types.deleted.destroy', $type) }}" method="POST">
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
