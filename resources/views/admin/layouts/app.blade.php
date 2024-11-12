<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'AdPlay Creative')</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        .dashboard {
            width: 100%;
            min-height: 100vh;
            background: rgb(11, 34, 64);
            background: radial-gradient(circle, rgba(11, 34, 64, 1) 0%, rgba(9, 14, 22, 1) 65%);
        }

        .nav {
            width: 100%;
            background: #2D3A43;
            margin: auto;
        }

        .contain {
            max-width: 1200px;
            margin: auto;
        }

        .gradient_border {
            padding: 20px;
            border: 10px solid transparent;
            border-image: linear-gradient(45deg, #ff6b6b, #f7b7a3) 1;
        }

        .row-wrapper {
            display: flex;
            align-items: center;
            padding: 5px 15px;
            border: 2px solid transparent;
            border-image: linear-gradient(45deg, #0d2c56, #4b525c, #0d2c56, #4b525c) 1;
        }

        table th,
        table td {
            text-align: left;
        }

        @media (0px < width < 720px) {
            .contain {
                padding: 0rem 0.5rem;
            }
        }


        ::-webkit-scrollbar {}

        ::-webkit-scrollbar-track {
            background: #eee;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .wrapper {
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .header {
            background-color: #e63946;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .main {
            background-color: #eee;
            width: 100%;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        }

        .scroll {
            overflow-y: auto;
            scroll-behavior: smooth;
            height: 600px;
            padding: 10px;
        }

        .msg {
            width: 100%;
            background-color: #fff;
            font-size: 16px;
            padding: 4px;
            border-radius: 5px;
            font-weight: 500;
            color: #3e3c3c;
            margin-bottom: 10px;
        }


        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .main {
                width: 100%;
                max-width: 100%;
            }

            .scroll {
                max-height: 300px;
            }

            .form-control {
                width: 75%;
            }

            .icon2 {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .form-control {
                width: 70%;
            }

            .icon2 {
                font-size: 18px;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
</head>

<body>

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".d-flex").style.opacity = "1";
        });


        $(document).ready(function() {
            // Show the corresponding input section when asset type is selected
            $('#assetTypeDropdown').change(function() {
                var selectedAsset = $(this).val();

                // Hide all sections first
                $('#imageSection, #videoSection, #contentSection, #ctaSection, #creativeNameSection').hide();

                // Show image input section if 'image' is selected
                if (selectedAsset === 'image') {
                    $('#imageSection').fadeIn();
                }
                // Show video input section if 'video' is selected
                else if (selectedAsset === 'video') {
                    $('#videoSection').fadeIn();
                }
                $('#selectCreateCreative').show();
                $('#selectCreateCreative').text('Select Creative');

            });

            // Show content input when image is selected and image is uploaded
            $('#image').change(function() {
                if ($(this).val()) {
                    $('#selectCreateCreative').fadeIn();
                }
            });

            // Show content input when video is selected and video is uploaded
            $('#video').change(function() {
                if ($(this).val()) {
                    $('#contentSection').fadeIn();
                }
            });

            // Show CTA section when content is filled
            $('#content').on('input', function() {
                if ($(this).val().trim()) {
                    $('#ctaSection').fadeIn();
                }
            });

            // Show Creative Name input when CTA fields are filled
            $('#cta_name, #cta_url').on('input', function() {
                if ($('#cta_name').val().trim() && $('#cta_url').val().trim()) {
                    $('#creativeNameSection').fadeIn();
                }
            });

            // AJAX form submission
            $('#creativeForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '/path/to/your/server/script',  // Replace with the path to your server-side script
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Creative submitted successfully');
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });


    </script>


    @livewireScripts
</body>

</html>


{{-- <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="scroll gradient_bg scroll-container">
        <div class="d-flex align-items-center" style="opacity: 0; transition: opacity 1.5s ease-in-out;">
            <div class="">
                <p class="msg bg-transparent text-white gradient_border px-12"
                    style="animation: fadeIn 1.5s ease-in-out forwards;">Hello, How can I
                    help you <br>
                    <button type="button"
                        class="btn btn-primary btn-sm rounded-3xl mt-1 px-4 bg-[#0C2C57] border-[#3276ceb2]"
                        id="createCreative" style="animation: fadeIn 1.5s ease-in-out forwards;">Create
                        Creative</button>
                </p>
            </div>
        </div>
        <div class="d-flex align-items-center text-right justify-content-end">
            <div>
                <p class="msg d-none animate__animated animate__fadeInRight gradient_border bg-transparent text-white"
                    id="selectCreateCreative"></p>
            </div>
        </div>
        <div class="form-section d-none" id="sizeSection">
            <label for="size"
                class="bg-transparent text-white gradient_border animate__animated animate__fadeInLeft"
                style="animation-delay: 0.1s;">Select Dimension</label>
            <div class="d-flex flex-wrap gap-2">
                <span
                    class="CustomBadge btn btn-primary btn-sm rounded-3xl px-4 bg-[#0C2C57] border-[#3276ceb2] animate__animated animate__fadeInUp"
                    style="animation-delay: 0.1s; cursor: pointer;" data-size="300x250">300x250</span>
                <span
                    class="CustomBadge btn btn-primary btn-sm rounded-3xl px-4 bg-[#0C2C57] border-[#3276ceb2] animate__animated animate__fadeInUp"
                    style="animation-delay: 0.2s; cursor: pointer;" data-size="336x280">336x280</span>
                <span
                    class="CustomBadge btn btn-primary btn-sm rounded-3xl px-4 bg-[#0C2C57] border-[#3276ceb2] animate__animated animate__fadeInUp"
                    style="animation-delay: 0.3s; cursor: pointer;" data-size="728x90">728x90</span>
                <span
                    class="CustomBadge btn btn-primary btn-sm rounded-3xl px-4 bg-[#0C2C57] border-[#3276ceb2] animate__animated animate__fadeInUp"
                    style="animation-delay: 0.4s; cursor: pointer;" data-size="160x600">160x600</span>
                <span
                    class="CustomBadge btn btn-primary btn-sm rounded-3xl px-4 bg-[#0C2C57] border-[#3276ceb2] animate__animated animate__fadeInUp"
                    style="animation-delay: 0.5s; cursor: pointer;" data-size="300x600">300x600</span>
            </div>
            <input type="hidden" name="width" id="width">
            <input type="hidden" name="height" id="height">
        </div>
        <div class="d-flex align-items-center text-right justify-content-end">
            <div>
                <p class="animate__animated animate__fadeInRight msg d-none bg-transparent gradient_border text-white mt-3"
                    id="selectSize"></p>
            </div>
        </div>
        <div class="upload-section d-none flex" id="uploadMainAssetSection">
            <div
                class="animate__animated animate__fadeInLeft upload-box bg-transparent gradient_border text-white">
                <label for="main-asset">
                    <div class="input-box">
                        <p class="d-none" id="uploadMainAsset"></p>
                        <input type="file" id="main-asset"
                            class="rounded-3xl px-4 bg-[#0C2C57] border-blue-500 mt-2 py-1" multiple
                            name="main_asset[]">
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
</form> --}}
