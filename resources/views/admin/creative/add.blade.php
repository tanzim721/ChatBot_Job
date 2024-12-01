@extends('admin.layouts.app')

@section('title', 'Creative')

@section('content')
<x-app-layout>
    <div class="dashboard">
        <div class="header bg-[#2D3A43]">Create creative with AI</div>
        <div class="dashboard_main contain">
            <form action="{{ route('admin.creative.store') }}" method="POST" enctype="multipart/form-data" id="creativeForm">
                @csrf
                <div class="scroll gradient_bg scroll-container pb-56">
                    <div class="d-flex align-items-center" style="opacity: 0; transition: opacity 1.5s ease-in-out;">
                        <div>
                            <p class="gradient_border bg-transparent chat_box" style="animation: fadeIn 1.5s ease-in-out forwards;">Hello,
                                Welcome to AI<br>
                            </p>
                            <div class="gradient_border bg-transparent chat_box mt-2">
                                <p class="py-2" style="color: white">Want to create a new creative or use an existing template?</p>
                                <div class="dropdown mb-2 text-black w-56">

                                    <select id="assetTypeDropdown" name="creative_type_id" class="bg-transparent text-white" style="border-radius: 5px; width: 100%;">
                                        <option class="text-black" value="">Select Asset Type</option>
                                        {{-- <option class="text-black" value="expemdable video">Expendable Video</option>
                                        <option class="text-black" value="video canvas">Video Canvas</option>
                                        <option class="text-black" value="scratch">Scratch</option>
                                        <option class="text-black" value="carousel">Carousel</option> --}}
                                        @foreach ($creative_types as $creative_type)
                                            <option class="text-black" value="{{ $creative_type->id }}" {{ old('asset_type') == $creative_type->name ? 'selected' : '' }}>{{ $creative_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="{{ $creative_type->name }}" id="assetType">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-right justify-content-end mt-2">
                        <div>
                            <p class="gradient_border bg-transparent chat_box animate__animated animate__fadeInRight" id="selectedTemplate" style="display: none;"></p>
                        </div>
                    </div>
                    <div class="upload-section gradident_border bg-transparent text-white mt-2" id="inputSection" style="display: none;">
                        <div class="upload-box gradident_border bg-transparent text-white">
                            <label for="main-asset">
                                <div class="input-box animate__animated animate__fadeInLeft" style="animation-delay: 0.1s;">
                                    <p class="" style="color: white" id="uploadMainAsset"></p>
                                    <input type="file" id="image" class="rounded-3xl px-4 bg-[#0C2C57] border-blue-500 mt-2 py-1" multiple name="image[]">

                                    <p class="text-sm pl-6 d-none" id="main-asset-error"></p>

                                    <div class="file-list gradient_border bg-transparent mt-2 d-none animate__animated animate__fadeIn"  id="file-list"></div>
                                </div>
                            </label>
                            <div id="main-asset-preview"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-right justify-content-end">
                        <div>
                            <p class="bg-transparent gradient_border chat_box animate__animated animate__fadeInRight" style="animation-delay: 0.2s; display: none;" id="contentText"></p>
                        </div>
                    </div>


                    <!-- Do you want to input text -->
                    <div class="d-flex align-items-center text-right justify-content-start animate__animated animate__fadeInLeft d-none" style="animation-delay: 0.2s;" id="inputTextSection">
                        <div class="mt-2 bg-transparent gradient_border chat_box">
                            <p class="">Do you want to input text?</p>
                            <div class="flex gap-2 mt-2">
                                <button type="button" class="border px-3 py-1 rounded-md hover:bg-blue-500" id="textInputYes">Yes</button>
                                <button type="button" class="border px-3 py-1 rounded-md hover:bg-blue-500" id="textInputNo">No</button>
                            </div>
                        </div>
                    </div>

                    <!-- Inter Your Text -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="inputTextContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">Write your text below:</p>
                            <div>
                                <input class="border-2 border-blue-700 rounded-lg px-2 py-1 mt-2 bg-blue-200 text-black" type="text" id="inputText" name="content" placeholder="Enter text here"/>
                                <button type="button" class="border px-2 py-1 rounded-md hover:bg-blue-500 mt-2" id="inputTextSubmit">&#8594;</button>
                            </div>
                        </div>
                    </div>

                    <!-- User's Input Text Container -->
                    <div class="d-flex align-items-center text-right justify-content-end d-none" id="inputTextContainer2">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInRight" >
                            <p>Your input has been received.</p>
                            <p id="userInputText"></p>
                        </div>
                    </div>

                    <!-- Choose CTA Button Container -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="CTAButtonContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">Select CTA Button:</p>
                            <div class="flex gap-2">

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('BUY NOW')">BUY NOW</button>

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('CLICK')">CLICK</button>

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('PLAY')">PLAY</button>

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('WATCH')">WATCH</button>

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('VIEW')">VIEW</button>

                                <button type="button" name="cta_name" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150" onclick="chooseCTAButton('WIN')">WIN</button>
                            </div>
                        </div>
                    </div>

                    <!-- User's CTA Button Showing Container -->
                    <div class="d-flex align-items-center text-right justify-content-end d-none" id="inputCTAContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInRight" >
                               <div class="d-none flex flex-col items-start" id="videoSelected">
                                    <p>The button you chose is:</p>
                                    <button type="button" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2  bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150"  id="userInputCTA"></button>
                               </div>

                               <div id="ImagePreview" class="flex justify-center items-end pb-4 d-none" style="min-width: 300px; height: 250px; background-size: cover; background-repeat: no-repeat; background-position: center; border: 1px solid #ccc; border-radius: 7px; position: relative;">
                                      <div class="flex flex-col items-center">
                                            <p class="text-lg font-bold" id="campaignNameShow"  draggable="true"></p>
                                            <button type="button" class="rounded-md px-4 border-[#3276ceb2] py-1 mt-2 bg-blue-500 text-sm hover:scale-105 transition ease-in-out duration-150"  id="userInputCTA2"  draggable="true"></button>
                                      </div>

                               </div>
                               <div class="flex flex-col items-start mt-2 d-none" id="colorCodeContainer">
                                    <p class="d-none">Change Campaign Name's Color:</p>
                                    <div class="flex gap-2">
                                        <div id="color-picker" class="bg-blue-500 px-4 py-1 gradient_border text-sm">Change Color</div>
                                        <input type="number" class="bg-blue-500 w-[158px] rounded-2xl pl-4 py-1 gradient_border text-sm text-white inline-block" id="fontSizeInput" placeholder="Change Font Size" min="12"/>
                                        <button type="button" class="d-none border px-2 py-1 rounded-md hover:bg-blue-500 mt-2" id="colorCodeSubmit">&#8594;</button>
                                    </div>
                               </div>
                        </div>
                    </div>



                    <!-- Inter Landing URL -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="interLandingURL">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">Input Landing URL:</p>
                            <div>
                                <input class="border-2 border-blue-700 rounded-lg px-2 py-1 mt-2 bg-blue-200 text-black" type="url" id="inputLandingURL" name="landing_url" placeholder="Enter URL here"/>
                                <button type="button" class="border px-2 py-1 mt-2 rounded-md hover:bg-blue-500" id="inputLandingURLSubmit">&#8594;</button>
                            </div>
                        </div>
                    </div>

                    <!-- User's Input Landing URL Container -->
                    <div class="d-flex align-items-center text-right justify-content-end d-none" id="userLandingURLContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInRight" >
                            <p>Your Landing URL has been received.</p>
                            <!-- <p id="userLandingURL"></p> -->
                        </div>
                    </div>

                    <!-- Inter Tracking URL -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="interTrackingURL">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">Input Tracking URL:</p>
                            <div>
                                <input class="border-2 border-blue-700 rounded-lg px-2 py-1 mt-2 bg-blue-200 text-black" type="url" id="inputTrackingURL" name="tracking_url" placeholder="Enter URL here"/>
                                <button type="button" class="border px-2 py-1 mt-2 rounded-md hover:bg-blue-500" id="inputTrackingURLSubmit">&#8594;</button>
                            </div>
                        </div>
                    </div>

                    <!-- User's Input Landing URL Container -->
                    <div class="d-flex align-items-center text-right justify-content-end d-none" id="userTrackingURLContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInRight" >
                            <p>Your Tracking URL has been received.</p>
                            <!-- <p id="userTrackingURL"></p> -->
                        </div>
                    </div>

                    <!-- Inter Creative Name -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="interCreativeNameContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">Give Creative Name:</p>
                            <div>
                                <input class="border-2 border-blue-700 rounded-lg px-2 py-1 mt-2 bg-blue-200 text-black" type="text" id="inputCreativeName" name="creative_name" placeholder="Enter name here"/>
                                <button type="button" class="border px-2 py-1 mt-2 rounded-md hover:bg-blue-500" id="inputCreativeNameSubmit">&#8594;</button>
                            </div>
                        </div>
                    </div>

                    <!-- User's Input Creative Name Container -->
                    <div class="d-flex align-items-center text-right justify-content-end d-none" id="userCreativeNameContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInRight" >
                            <p id="userCreativeName"></p>
                        </div>
                    </div>

                    <!-- Generate Creative -->
                    <div class="d-flex align-items-center text-right justify-content-start d-none" id="generateCreativeContainer">
                        <div class="mt-2 bg-transparent gradient_border chat_box flex flex-col items-start animate__animated animate__fadeInLeft" >
                            <p class="">You are ready to go, Generate your Creative.</p>
                            <div>
                                <button type="submit" class="border px-3 py-1 mt-2 rounded-md bg-blue-500 hover:scale-105 transition ease-in-out duration-150" >Generate Creative</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-right justify-content-end py-3 pe-2">
                    <div>
                        <button class="btn btn-success" id="submitButton" type="submit" style="display:none;">
                            Generate Creative
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</x-app-layout>

@endsection
