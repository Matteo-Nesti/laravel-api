@extends('layouts.app')

@section('title', 'MyProjects')
@section('cdns')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    <h1 class="text-center">Projects</h1>
    <hr>

    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3"> <i class="fa-solid fa-plus"></i> Add New
        Project </a>

    <table class="table table-dark table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project-Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Type</th>
                <th scope="col">Technology</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @forelse ($projects as $project)
            <tbody>
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->created_at }}</td>
                    @if ($project->type)
                        <td>{{ $project->type->label }}</td>
                    @else
                        <td>-</td>
                    @endif

                    <td>
                        @forelse ($project->technologies as $technology)
                            {{ $technology->technology }} ,
                        @empty
                            -
                        @endforelse
                    </td>


                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-1">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

            @empty

                <div>
                    <p>don't find anything</p>
                </div>
        @endforelse

    </table>
    <a href="{{ route('admin.home') }}" class="btn btn-secondary">Back</a>

@endsection

@section('script')
    @vite('resources/js/delete-confirm.js')
@endsection
