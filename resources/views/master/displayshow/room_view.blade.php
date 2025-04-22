<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ __("lang.token") }}</title>
        <!-- Latest compiled and minified CSS -->
        <link
            href="{{ asset('admin') }}/assets/css/style.bundle.css"
            rel="stylesheet"
            type="text/css"
        />
        <link
            rel="shortcut icon"
            href="{{ asset('image/logo/' . $generalSetting->fab_logo) }}"
        />
        @vite(['resources/css/app.css'])
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            #image-content {
                width: 100%;
                height: 100vh;
                background-repeat: no-repeat !important;
                background-size: cover !important;
                background-position: center;
                position: relative;
            }

            .token-div {
                position: absolute;
                top: 0%;
                right: 5%;
                color: white;
                background-color: rgb(38, 38, 126);
                height: 470px;
                width: 400px;
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
                padding: 40px;
                color: #ececec;
                display: block;
            }

            .token_text {
                font-size: 60px;
            }

            .token_no {
                font-size: 100px;
                text-align: center;
                border-bottom: 10px solid rgb(149, 147, 147);
            }

            .token_name {
                font-size: 40px;
                text-align: center;
            }

            .footer-div {
                position: absolute;
                bottom: 0%;
                left: 0%;
                color: white;
                height: 130px;
                width: 100%;
                color: #ececec;
                display: flex;
            }

            .doctor_name {
                width: 55%;
                font-size: 25px;
                background-color: rgb(38, 38, 126);
                border-top-right-radius: 50px;
            }

            .doctor_name p {
                margin: 5px;
                text-align: center;
            }

            .hospital_details {
                width: 45%;
                background: transparent;
                padding-left: 30px;
                padding-top: 10px;
                border-bottom: 15px solid rgb(38, 38, 126);
            }

            .hospital_details p {
                font-size: 30px;
                color: rgb(38, 38, 126);
                font-weight: 700;
                text-align: center;
            }
        </style>
    </head>

    <body>
        @php $image = $lasttoken ? asset('image/profile/' .
        $lasttoken->doctor->image) : asset('image/logo/' .
        $generalSetting->mane_logo); @endphp
        <div id="image-content" style="background: url({{ $image }});">
            <div class="token-div">
                <p class="token_text">{{ __("lang.token_no") }}:</p>
                <p class="token_no" >
                    {{ __("lang.room_no") }}:
                    <span id="tokenNumber">
                    {{ $lasttoken->token_number ?? '---' }}

                    </span>
                </p>
                <p class="token_name" >
                    {{ __("lang.room_no") }}:
                    <span id="tokenName">
                        {{ $lasttoken->room->name ?? '---' }}
                    </span>
                </p>
            </div>
            <div class="footer-div">
                <div class="doctor_name">
                    <p>{{ $lasttoken->doctor->name ?? '---' }}</p>
                    <p>{{ $lasttoken->department->name ?? '---' }}</p>
                </div>
                <div class="hospital_details">
                    <p>
                        <img
                            alt="Logo"
                            width="45%"
                            src="{{ asset('image/logo/' . $generalSetting->mane_logo) }}"
                        />
                    </p>
                </div>
            </div>
        </div>
        @vite('resources/js/app.js')
        <script defer>
            const currentToken = @json($lasttoken);
            function speak(roomNumber, tokenNumber) {
                const text = `Token Number ${tokenNumber} Please proceed to Room Number ${roomNumber}`;
                const speech = new SpeechSynthesisUtterance();
                speech.lang = 'en-US'
                speech.text = text
                speech.volume = 1
                speech.rate = 0.7
                speech.pitch = 1
                window.speechSynthesis.speak(speech);
            }

            const handlePermissions = async () => {
                let permissions = {
                    video: true,
                    audio: true
                };
                try {
                    await navigator.mediaDevices.getUserMedia(permissions);
                } catch (err) {
                    console.error(err.message);
                    permissions = {
                        video: false,
                        audio: false
                    };
                }
                if (!permissions.video) console.error("Failed to get video permissions.");
                if (!permissions.audio) console.error("Failed to get audio permissions.");
            };
            handlePermissions()
            const tokenNumberEl = document.getElementById('tokenNumber')
            const tokenNameEl = document.getElementById('tokenName')
            const audio = new Audio("{{ asset('notification-autdio.mp3') }}")
            window.addEventListener('load', () => {
                window.Echo.channel('doctorTokenCall').listen('DoctorRoomDisplayEvent', (data) => {
                    const { doctorTokenCall } = data
                    if(doctorTokenCall.room_id === currentToken.room_id){
                        tokenNumberEl.innerText = data.doctorTokenCall.token_number
                        tokenNameEl.innerText = doctorTokenCall.room.name
                        audio.play()
                        setTimeout(() => {
                            speak(doctorTokenCall.room.name, doctorTokenCall.token_number)
                            setTimeout(()=> {
                                speak(doctorTokenCall.room.name, doctorTokenCall.token_number)
                            }, 2000)
                        }, 1000);
                    }
                })
            })
        </script>
    </body>
</html>
