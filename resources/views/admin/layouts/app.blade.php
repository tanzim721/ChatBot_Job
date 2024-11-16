<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
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

        .scroll-container {
            min-height: 100vh;
            overflow: scroll;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
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

        .chat_box{
            color: #fff;
            padding: 10px 15px;
        }
        .gradient_bg {
            background: rgb(11, 34, 64);
            background: radial-gradient(circle, rgba(11, 34, 64, 1) 0%, rgba(9, 14, 22, 1) 65%);
        }

        .gradient_border {
            position: relative;
            padding: 10px 45px;
            background: white;
            border-radius: 25px;
            z-index: 1;
        }

        .gradient_border::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 25px;
            padding: 2px;
            background: linear-gradient(45deg, #0d2c56, #4b525c, #0d2c56, #4b525c);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            z-index: -1;
        }

        .upload-box input[type="file"] {
            outline: none;
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

        .remove-btn{
            color: red;
            margin-left: 10px;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
</head>

<body>

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".d-flex").style.opacity = "1";
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#assetTypeDropdown').change(function() {
                var selectedValue = $(this).val();
                $('#inputSection, #uploadMainAssetSection, #submitButton').hide();
                if (selectedValue === 'Video') {
                    $('#inputSection').fadeIn();
                    // $('#inputSection').show();
                } else if (selectedValue === 'Image') {
                    $('#inputSection').show();
                } else if (selectedValue == 'Scratch') {
                    $('#inputSection').fadeIn();
                    // $('#inputSection').show();
                } else if (selectedValue == 'Carousel') {
                    $('#inputSection').fadeIn();
                    // $('#inputSection').show();
                }
                $('#selectedTemplate').show();
                $('#selectedTemplate').text("You have selected the " + selectedValue + " template");
            })
            $('#image').change(function() {
                var imageValue = $(this).val();
                $('#contentSection').hide();
                if (imageValue) {
                    $('#contentSection').fadeIn();
                }
                $('#contentText').show();
                $('#contentText').text("You have selected an image");
            });
            $('#video').change(function() {
                if ($(this).val()) {
                    $('#contentSection').fadeIn();
                }
                $('#contentText').show();
                $('#contentText').text("You have selected video");
            });
        });


        // My Vanila JS

        const fileInput = document.getElementById('image');
        const fileList = document.getElementById('file-list');
        const inputTextSection = document.getElementById('inputTextSection');
        const scrollContainer = document.getElementById('scroll-container');

        // update the file list display
        fileInput.addEventListener('change', () => {
            if(fileInput.files.length !== 0) {
                fileList.classList.remove('d-none');
                inputTextSection.classList.remove('d-none');
            }else {
                fileList.classList.add('d-none');
            }

            fileList.innerHTML = '';
            Array.from(fileInput.files).forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.textContent = file.name;

                const removeButton = document.createElement('button');
                removeButton.className = 'remove-btn';
                removeButton.textContent = 'x';
                removeButton.addEventListener('click', () => {
                    removeFile(index);
                });

                fileItem.appendChild(removeButton);
                fileList.appendChild(fileItem);
            });
        });

        // remove a file from the list
        function removeFile(index) {
            const fileArray = Array.from(fileInput.files);
            fileArray.splice(index, 1);

            const dataTransfer = new DataTransfer();
            fileArray.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;

            fileInput.dispatchEvent(new Event('change'));
        }

        //textInputNo
        document.getElementById("textInputNo").addEventListener("click", function() {
           document.getElementById("CTAButtonContainer").classList.remove("d-none");
        })

        //textInputYes
        document.getElementById("textInputYes").addEventListener("click", function() {
            document.getElementById("inputTextContainer").classList.remove("d-none");
        })

        //Input Text Submit
        document.getElementById("inputTextSubmit").addEventListener("click", function() {
            const inputText = document.getElementById("inputText").value
            document.getElementById("inputTextContainer2").classList.remove("d-none");
            document.getElementById("userInputText").innerText = "Your entered: " + inputText
            document.getElementById("CTAButtonContainer").classList.remove("d-none");
        })

        //Choose CTA Button
        function chooseCTAButton(btn) {
            document.getElementById("inputCTAContainer").classList.remove("d-none");
            document.getElementById("userInputCTA").innerText = btn
            document.getElementById("interLandingURL").classList.remove("d-none");
        }

        //Sumbit Landing URL
        document.getElementById("inputLandingURLSubmit").addEventListener("click", function() {
            //const landingURL = document.getElementById("inputLandingURL").value;
            //document.getElementById("userLandingURL").innerText = "Check your URL: " + landingURL
            document.getElementById("userLandingURLContainer").classList.remove("d-none");
            document.getElementById("interTrackingURL").classList.remove("d-none");
        })

        //Submit Trackig URL
        document.getElementById("inputTrackingURLSubmit").addEventListener("click", function() {
            //const landingURL = document.getElementById("inputTrackingURL").value;
            //document.getElementById("userTrackingURL").innerText = "Check your URL: " + landingURL
            document.getElementById("userTrackingURLContainer").classList.remove("d-none");
            document.getElementById("interCreativeNameContainer").classList.remove("d-none");
        })

        //Submit Creative Name
        document.getElementById("inputCreativeNameSubmit").addEventListener("click", function() {
            const creativeName = document.getElementById("inputCreativeName").value;
            document.getElementById("userCreativeName").innerText = "Creative Name is: " + creativeName
            document.getElementById("userCreativeNameContainer").classList.remove("d-none");
            document.getElementById("generateCreativeContainer").classList.remove("d-none");
        })

    </script>

    @livewireScripts
</body>

</html>
