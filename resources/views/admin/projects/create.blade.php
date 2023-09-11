@extends('layouts.app')

@section('title', 'NewProject')

@section('content')
    {{-- form --}}
    @include('includes.projects.form')
@endsection

@section('script')
    @vite('resources/js/thumb-preview.js')
    @vite('resources/js/slug-live.js')
@endsection
