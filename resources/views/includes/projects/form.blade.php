@if ($project->exists)
    {{-- edit form --}}
    <form class="mt-3 row" method="POST" enctype="multipart/form-data"
        action="{{ route('admin.projects.update', $project) }}">
        @method('PUT')
    @else
        {{-- create form --}}
        <form class="mt-3 row" method="POST" enctype="multipart/form-data" action="{{ route('admin.projects.store') }}">
@endif

@csrf

<div class="mb-3 col-6">
    <label for="title" class="form-label">Edit Title</label>
    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
        aria-describedby="emailHelp" name="title" value="{{ old('title', $project->title) }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3 col-6">
    <label for="slug" class="form-label">Slug Title</label>
    <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug"
        value="{{ old('slug', $project->slug) }}" disabled>
</div>

{{-- select type --}}
<div class="mb-3 col-5">
    <label for="type" class="form-label">Type</label>
    <select class="form-select" name="type_id" id="type">
        <option selected>Any</option>
        @foreach ($types as $type)
            <option @if (old('type_id', $project->type_id) == $type->id) selected @endif value="{{ $type->id }}">
                {{ $type->label }}
            </option>
        @endforeach
    </select>
</div>
{{-- img prev --}}

<div class="mb-3 col-5">
    <label for="thumb-field" class="form-label">Thumb</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="thumb-field"
        aria-describedby="emailHelp" name="image" value="{{ old('image', $project->image) }}">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-2">
    <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://www.comune.foggia.it/wp-content/uploads/2021/03/placeholder.png' }}"
        class="img-fluid" alt="Preview" id="thumb-preview">
</div>

{{-- technology checkbox --}}
<div class="col-10 mb-3">
    @foreach ($technologies as $technology)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}"
                value="{{ $technology->id }}" name="technologies[]" @if (in_array($technology->id, old('technologis', $project_technology_ids ?? []))) checked @endif>
            <label class="form-check-label" for="technology">{{ $technology->technology }}</label>
        </div>
    @endforeach
</div>

{{-- descrizione --}}
<div class="mb-3 col-12">
    <label for="" class="form-label">Description</label>
    <textarea class="form-control @error('content') is-invalid @enderror" rows="6"aria-label="With textarea"
        name="content">{{ old('content', $project->content) }}</textarea>
    @error('content')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-3 ">
    <button class="btn btn-success">
        Salva
    </button>
</div>
</form>
