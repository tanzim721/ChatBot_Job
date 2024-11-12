@extends('admin.layouts.app')

@section('title', 'Creative')

@section('content')
    <x-app-layout>
        <div class="wrapper">
            <div class="main">
                <div class="header bg-[#2D3A43]">Create creative with AI</div>
                <form action="" method="POST" enctype="multipart/form-data" id="creativeForm">
                    @csrf
                    <div class="scroll gradient_bg scroll-container">
                        <div class="d-flex align-items-center" style="opacity: 0; transition: opacity 1.5s ease-in-out;">
                            <div>
                                <p class="msg" style="animation: fadeIn 1.5s ease-in-out forwards;">Hello, Welcome to
                                    AI<br></p>
                                <p style="color: white">Want to create a new creative or use an existing template?</p>
                                <div class="dropdown mb-2 float-start">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        Select an Existing Template
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" id="expemdableVideo">Expemdable Video</a></li>
                                        <li><a class="dropdown-item" href="#" id="videoCanvas">Video Canvas</a></li>
                                        <li><a class="dropdown-item" href="#" id="scratch">Scratch</a></li>
                                        <li><a class="dropdown-item" href="#" id="carousel">Carousel</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-primary mx-2" id="createCreative" style="animation: fadeIn 1.5s ease-in-out forwards;" disabled>Create New Creative</button>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-right justify-content-end">
                            <div>
                                <p class="msg" id="selectCreateCreative" style="animation: fadeIn 1.5s ease-in-out forwards; display: none;">
                                    You have selected the <span id="selectedTemplate"></span> template.
                                </p>
                            </div>
                        </div>
                        <div class="upload-section d-none flex" id="uploadMainAssetSection">
                            <div
                                class="animate__animated animate__fadeInLeft upload-box bg-transparent gradient_border text-white">
                                <label for="image">
                                    <div class="input-box">
                                        <p class="d-none" id="uploadImage"></p>
                                        <input type="file" id="image"
                                            class="rounded-3xl px-4 bg-[#0C2C57] border-blue-500 mt-2 py-1" multiple
                                            name="images[]">
                                    </div>
                                </label>
                                <div id="main-asset-preview"></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-right justify-content-end">
                            <div>
                                <p class="animate__animated animate__fadeInRight msg d-none bg-transparent gradient_border text-white mt-3"
                                    id="selectMainAsset"></p>
                            </div>
                        </div>

                        <!-- Video Input Section (Initially Hidden) -->
                        <div id="videoSection" style="display: none;">
                            <label for="video">Video:</label>
                            <input type="file" id="video" name="video">
                            <br>
                        </div>

                        <!-- Content Input Section (Initially Hidden) -->
                        <div id="contentSection" style="display: none;">
                            <label for="content">Content:</label>
                            <textarea id="content" name="content"></textarea>
                            <br>
                        </div>
                        <div class="d-flex align-items-center text-right justify-content-end">
                            <div>
                                <p class="animate__animated animate__fadeInRight msg d-none bg-transparent gradient_border text-white mt-3"
                                    id="selectMainAsset"></p>
                            </div>
                        </div>
                        <div class="upload-section d-none flex" id="uploadLogoAssetSection">
                            <div
                                class="animate__animated animate__fadeInLeft upload-box bg-transparent gradient_border text-white">
                                <label for="logo-asset">
                                    <div class="input-box">
                                        <p class="d-none" id="uploadLogoAsset"></p>
                                        <input type="file" id="logo-asset"
                                            class="rounded-3xl px-4 bg-[#0C2C57] border-blue-500 mt-2 py-1" multiple
                                            name="logo_asset">
                                    </div>
                                </label>
                                <div id="logo-asset-preview"></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-right justify-content-end">
                            <div>
                                <p class="animate__animated animate__fadeInRight msg d-none bg-transparent gradient_border text-white mt-3"
                                    id="selectLogoAsset"></p>
                            </div>
                        </div>
                    </div>
                    <div class="gradient_bg d-flex align-items-center text-right justify-content-end py-3 pe-2">
                        <div>
                            <button class="btn btn-success d-none" id="submitButton" type="submit">
                                Generate Creative
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>


@endsection
