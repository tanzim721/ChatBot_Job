@extends('admin.layouts.app')

@section('title', 'Posts')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bans') }}
            </h2>
            <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Create Post</a>
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">
                        <h2>{{ $post->title }}</h2>
                        <p>By {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->body }}</p>
                        <a href="{{ route('admin.post.show', $post) }}" class="btn btn-info">Read More</a>
                    </div>
                </div>
            @endforeach
        </x-slot>


    </x-app-layout>

@endsection
