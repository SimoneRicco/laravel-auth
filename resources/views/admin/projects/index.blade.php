@extends('admin.layouts.base')

@section('contents')

    <h1>Project</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project as $prj)
                <tr>
                    <th scope="row">{{ $prj->id }}</th>
                    <td>{{ $prj->title }}</td>
                    <td>{{ $prj->url_image }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $prj->id]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $prj->id]) }}">Edit</a>
                        <form
                            action="{{ route('admin.projects.destroy', ['project' => $prj->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $project->links() }}

@endsection