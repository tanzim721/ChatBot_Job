@extends('admin.layouts.app')

@section('title', 'Creative list')

@section('content')

    <x-app-layout>
        <div class="dashboard">
            <div class="nav flex justify-between items-center text-white px-4 py-2 rounded-tl-xl rounded-tr-xl">
                <p class="font-semibold hidden md:block" style="margin:0 auto;">Create creative with AI</p>
            </div>
            <div class="dashboard_main contain">
                <h1 class="text-white text-2xl font-semibold mt-14">Creative List</h1>
                <table class="text-white mt-3 w-full text-xs">
                    <thead>
                        <tr class="h-auto md:h-12 row-wrapper py-2 md:py-0">
                            <th class="basis-1/12 md:basis-2/12">#</th>
                            <th class="basis-4/12 md:basis-3/12">Creative Name</th>
                            <th class="basis-2/12 hidden md:block">Template</th>
                            {{-- <th class="basis-3/12 md:basis-2/12 ">Status</th> --}}
                            <th class="basis-3/12 md:basis-4/12 pl-5 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($creatives as $item)
                            <tr class="h-auto md:h-12 row-wrapper mt-3 py-2 md:py-0">
                                <td class="basis-1/12 md:basis-2/12">{{ $loop->iteration }}</td>
                                <td class="basis-4/12 md:basis-3/12 text-uppercase">{{ $item->creative_name }}</td>
                                <td class="basis-2/12 hidden md:block">{{ $item->template }}</td>
                                {{-- <td class="basis-3/12 md:basis-2/12">Active</td> --}}
                                <td class="basis-4/12 flex flex-col md:flex-row gap-2 text-sm">
                                    <button class="bg-black h-8 flex justify-center items-center py-2 px-5 rounded-2xl">
                                        <a href="">
                                            View
                                        </a>
                                    </button>
                                    {{-- <button class="bg-indigo-500 h-8 flex justify-center items-center py-2 px-5 rounded-2xl">Tag</button> --}}
                                    <button class="bg-blue-500 h-8 flex justify-center items-center py-2 px-5 rounded-2xl">Edit</button>
                                    <button class="bg-red-500 h-8 flex justify-center items-center py-2 px-5 rounded-2xl">
                                        <a href="{{ route('admin.creative.delete', $item->id) }}">Delete</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>
@endsection


