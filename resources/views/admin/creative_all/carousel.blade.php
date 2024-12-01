@extends('admin.layouts.app')

@section('title', 'Carousel')

@section('content')

<x-app-layout>
    <div class="gradient_bg">
        <div class="">
            @php
                $images = json_decode($creative->image, true);
                $countImages = count($images);
            @endphp
            <div class="header bg-[#2D3A43]">Create creative with AI</div>
            <div class="container p-4 rounded ">
                <div class="text-center mb-5">
                    <h2 class="text-3xl font-bold text-white">Generated Ads</h2>
                </div>
                <div class="mt-4 flex justify-content-center flex-column items-center">
                    <div class="carousel1 w-80">
                        <div class="carousel1-content p-5">
                            @foreach ($images as $image)
                            <div class="carousel1-item">
                                <img src="{{ asset('uploads/' . $image) }}" alt="Creative Image"
                                style="height: 300px; width: 300px; padding: 10px">
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


@endSection
