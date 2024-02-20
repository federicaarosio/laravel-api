@extends('layouts.admin')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                These are all the socials you have, {{ Auth::user()->name }}
            </h1>

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Home</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($socials as $social )
                    <tr>
                        <td>{{ $social->id }}</td>
                        <td>{{ $social->name }}</td>
                        <td>{{ $social->home }}</td>
                        <td>
                            <a href="{{ route('admin.socials.show', $social) }}">
                                <button class="btn btn-sm btn-primary">
                                    View
                                </button>
                            </a>
                            <a href="{{ route('admin.socials.edit', $social) }}">
                                <button class="btn btn-sm btn-success">
                                    Edit
                                </button>
                            </a>


                                <!-- Button trigger modal -->
                                <button social="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $social->id }}">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $social->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete social</h1>
                                        <button social="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you really sure you want to delete "<strong>{{ $social->name }}</strong>" social?<br>
                                            After deleting, you'll find it in the "Deleted socials" menu where you can restore it.
                                        </div>
                                        <div class="modal-footer">
                                        <button social="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form class="d-inline-block" action="{{ route('admin.socials.destroy', $social) }}" method="POST">
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