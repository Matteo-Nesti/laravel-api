@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-3">
            @if ($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt=" {{ $project->title }} " class="img-fluid">
            @endif
        </div>
        <div class="col">
            <h1 class="text-center">{{ $project->title }}</h1>
            <p>{{ $project->content }}</p>
            <p>{{ $project->slug }}</p>
        </div>
    </div>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
