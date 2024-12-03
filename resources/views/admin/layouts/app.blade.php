<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>
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

        .chat_box {
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

        #fontSizeInput::placeholder {
            color: white;
            opacity: 1;
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

        .remove-btn {
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
        let selectedValue = null;

        $(document).ready(function() {
            $('#assetTypeDropdown').change(function() {
               selectedValue = $(this).val();
                $('#inputSection, #uploadMainAssetSection, #submitButton').hide();
                if (selectedValue === '1') {
                    $('#inputSection').fadeIn();
                    // $('#inputSection').show();
                } else if (selectedValue === '2') {
                    $('#inputSection').show();
                } else if (selectedValue == '3') {
                    $('#inputSection').fadeIn();
                    // $('#inputSection').show();
                } else if (selectedValue == '4') {
                    $('#inputSection').fadeIn();
                }else{
                    $('#inputSection').fadeIn();
                }
                $('#selectedTemplate').show();
                $('#selectedTemplate').text(`You have selected the template`);

                // $('#selectedTemplate').text("You have selected a template");
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

        // handle file selection
        const assetTypeDropdown = document.getElementById('assetTypeDropdown');
        const mainAssetErrorMSG = document.querySelector("#main-asset-error");

        assetTypeDropdown.addEventListener('change', () => {
            selectedValue = parseInt(assetTypeDropdown.value);
            mainAssetErrorMSG.classList.remove("d-none");
            mainAssetErrorMSG.style.color = "green";

            if(selectedValue == 1){
                mainAssetErrorMSG.innerText = "Please select 2 Images*";
            }else if(selectedValue == 2){
                mainAssetErrorMSG.innerText = "Please select 3 Images*";
            }else if(selectedValue == 3){
                mainAssetErrorMSG.innerText = "Please select 1 Video*";
            }else if(selectedValue == 4){
                mainAssetErrorMSG.innerText = "Please select 1 Video & 6 Images*";
            }else if(selectedValue == 5){
                mainAssetErrorMSG.innerText = "Please select 1 Video & 6 Images*";
            }else if(selectedValue == 6){
                mainAssetErrorMSG.innerText = "Please select 3 Images*";
            }else if(selectedValue == 7){
                mainAssetErrorMSG.innerText = "Please select 10 Images*";
            }else if(selectedValue == 8){
                mainAssetErrorMSG.innerText = "Please select 1 Images*";
            }else if(selectedValue == 9){
                mainAssetErrorMSG.innerText = "Please select 3 Images*";
            }else if(selectedValue == 10){
                mainAssetErrorMSG.innerText = "Please select 2 Images*";
            }else if(selectedValue == 11){
                mainAssetErrorMSG.innerText = "Please select 13 Images*";
            }else if(selectedValue == 12){
                mainAssetErrorMSG.innerText = "Please select 5 Images*";
            }else if(selectedValue == 13){
                mainAssetErrorMSG.innerText = "Please select 6 Images*";
            }else{
                mainAssetErrorMSG.innerText = "";
            }
        });


        // update the file list selection based on the selected value
        fileInput.addEventListener('click', () => {
            if (selectedValue == 1 || selectedValue == 2 || selectedValue == 6 || selectedValue == 7 || selectedValue == 8 || selectedValue == 9 || selectedValue == 10 ||selectedValue == 11 ||selectedValue == 12 ||selectedValue == 13) {
                fileInput.setAttribute('accept', 'image/jpeg, image/png, image/gif');
            }else if(selectedValue == 4 || selectedValue == 5) {
                fileInput.setAttribute('accept', 'image/jpeg, image/png, image/gif, video/mp4, video/mkv, video/webm');
            }else if (selectedValue == 3) {
                fileInput.setAttribute('accept', 'video/mp4, video/mkv, video/webm');
            }
        });    //new

        fileInput.addEventListener('change', () => {
            const selectedFiles = Array.from(fileInput.files);

            const images = selectedFiles.filter(file => file.type.startsWith("image/"));
            const videos = selectedFiles.filter(file => file.type.startsWith("video/"));

            console.log("Images: ", images)
            console.log("Videos: ", videos)

            //Setected Asset Validation
            let imageCount = 0;
            let videoCount = 0;

            selectedFiles.forEach(file => {
                if (file.type.startsWith("image/")) {
                    imageCount++;
                } else if (file.type.startsWith("video/")) {
                    videoCount++;
                }
            });

            if(selectedValue == 1){
                if (imageCount === 2) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 2){
                if (imageCount === 3) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 3){
                if (videoCount === 1) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 4){
                if (videoCount === 1 && imageCount === 6) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 5){
                if (videoCount === 1 && imageCount === 6) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 6){
                if (imageCount === 3) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 7){
                if (imageCount === 10) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 8){
                if (imageCount === 1) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 9){
                if (imageCount === 3) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 10){
                if (imageCount === 2) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 11){
                if (imageCount === 13) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 12){
                if (imageCount === 5) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }else if(selectedValue == 13){
                if (imageCount === 6) {
                    mainAssetErrorMSG.style.color = "green";
                } else {
                    mainAssetErrorMSG.style.color = "red";
                }
            }



            if (selectedFiles.length > 0) {
            const firstImage = selectedFiles[0];

            if (firstImage.type.startsWith('image/')) {
                const reader = new FileReader();
                const imagePreview = document.getElementById('ImagePreview');

                reader.onload = function (e) {
                    console.log('Image loaded:', e.target.result);
                    imagePreview.style.backgroundImage = `url(${e.target.result})`;
                };

                reader.readAsDataURL(firstImage);
            } else {
                console.log('The selected file is not an image');
            }
            }


            if(selectedFiles.length > 0) {
                fileList.classList.remove('d-none');
                inputTextSection.classList.remove('d-none');
            }else {
                fileList.classList.add('d-none');
            }

            fileList.classList.remove('d-none');
            inputTextSection.classList.remove('d-none');
            fileList.innerHTML = '';

            selectedFiles.forEach((file, index) => {
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

        let btnValue;

        //Choose CTA Button
        function chooseCTAButton(btn) {
            document.getElementById("inputCTAContainer").classList.remove("d-none");

            if(selectedValue == 1 || selectedValue == 2) {
                document.getElementById("ImagePreview").classList.remove("d-none")
            }else{
                document.getElementById("videoSelected").classList.remove("d-none")
            }

            if(selectedValue != 5){
                document.getElementById("colorCodeContainer").classList.remove("d-none");
            }
            document.getElementById("userInputCTA").innerText = btn
            document.getElementById("campaignNameShow").innerText = document.getElementById("inputText").value
            btnValue = btn;
            document.getElementById("userInputCTA2").innerText = btn
            document.getElementById("interLandingURL").classList.remove("d-none");
            console.log(btnValue);

        }

        //Sumbit Landing URL
        document.getElementById("inputLandingURLSubmit").addEventListener("click", function() {
            //const landingURL = document.getElementById("inputLandingURL").value;
            //document.getElementById("userLandingURL").innerText = "Check your URL: " + landingURL
            document.getElementById("userLandingURLContainer").classList.remove("d-none");
            document.getElementById("interTrackingURL").classList.remove("d-none");
        })

        //Sumbit Tracking URL
        document.getElementById("inputTrackingURLSubmit").addEventListener("click", function() {
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

        //Change Campaign Name's Color
        document.getElementById("colorCodeSubmit").addEventListener("click", function() {
            let colorCode = document.getElementById("inputColorCode").value
            console.log(colorCode)
            document.getElementById("campaignNameShow").classList.add(`text-[${colorCode}]`);
        })

        const fontSizeInput = document.getElementById('fontSizeInput');

        fontSizeInput.addEventListener('input', () => {
        const fontSizeValue = fontSizeInput.value;
            if (fontSizeValue) {
                document.getElementById("campaignNameShow").style.fontSize = `${fontSizeValue}px`;
            }
        });


        const pickr = Pickr.create({
        el: '#color-picker',
        theme: 'nano',
        default: '#ff0000',

        appClass: 'custom-class',
        useAsButton: true,


        swatches: [
        'rgba(0, 0, 0, 1)',
        'rgba(255, 255, 255, 1)',
        'rgba(244, 67, 54, 1)',
        'rgba(233, 30, 99, 0.95)',
        'rgba(156, 39, 176, 0.9)',
        'rgba(103, 58, 183, 0.85)',
        'rgba(63, 81, 181, 0.8)',
        'rgba(33, 150, 243, 0.75)',
        'rgba(3, 169, 244, 0.7)',
        'rgba(0, 188, 212, 0.7)',
        'rgba(0, 150, 136, 0.75)',
        'rgba(76, 175, 80, 0.8)',
        'rgba(139, 195, 74, 0.85)',
        'rgba(205, 220, 57, 0.9)',
        ],

        components: {
        preview: true,
        opacity: true,
        hue: true,

            interaction: {
                input: true,
            },
        },
        });

        // Handle color selection
        pickr.on('change', (color) => {
            const rgbaColor = color.toHEXA().toString(); // Get the color in HEXA format
            //console.log('Selected color:', rgbaColor);
            const element = document.getElementById("campaignNameShow");
            element.style.color = rgbaColor;
        });


        //Drag and Drop
        const makeDraggable = (element, container) => {
        let offsetX = 0;
        let offsetY = 0;
        let isDragging = false;

        element.addEventListener('mousedown', (event) => {
            isDragging = true;
            offsetX = event.clientX - element.getBoundingClientRect().left;
            offsetY = event.clientY - element.getBoundingClientRect().top;
            document.body.style.userSelect = 'none'; // Disable text selection during drag
        });

        document.addEventListener('mousemove', (event) => {
        if (isDragging) {
        const containerRect = container.getBoundingClientRect();

        let newLeft = event.clientX - offsetX;
        let newTop = event.clientY - offsetY;

        newLeft = Math.max(containerRect.left, Math.min(newLeft, containerRect.right - element.offsetWidth));
        newTop = Math.max(containerRect.top, Math.min(newTop, containerRect.bottom - element.offsetHeight));

        element.style.left = `${newLeft - containerRect.left}px`;
        element.style.top = `${newTop - containerRect.top}px`;
        element.style.position = 'absolute';
        element.style.zIndex = '1000';
        }
        });

        document.addEventListener('mouseup', () => {
        isDragging = false;
         document.body.style.userSelect = '';
        });
    };

    const imagePreview = document.getElementById('ImagePreview');
    const campaignNameShow = document.getElementById('campaignNameShow');
    const userInputCTA2 = document.getElementById('userInputCTA2');

    makeDraggable(campaignNameShow, imagePreview);
    makeDraggable(userInputCTA2, imagePreview);

    //End Drag and Drop
    </script>
    @livewireScripts
</body>

</html>
