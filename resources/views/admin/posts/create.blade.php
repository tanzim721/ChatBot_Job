@extends('admin.layouts.app')

@section('title', 'Posts')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bans') }}
            </h2>

        </x-slot>


    </x-app-layout>

@endsection
