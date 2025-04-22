<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('lang.token') }}</title>
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('image/logo/' . $generalSetting->fab_logo) }}" />
    @vite(['resources/css/app.css'])

</head>

<body>
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-4 text-center border-3 border-white bg-dark text-white">{{ __('lang.counter_number') }}</th>
                            <th class="col-md-7 text-center border-3 border-white bg-dark text-white ">{{ __('lang.token_number') }}</th>
                        </tr>
                    </thead>
                    <tbody id="table_body">
                        @foreach ($counterTokens as $token)
                            <tr>
                                <td class=" text-center border-3 border-white bg-info text-black" style="font-size: 50px">
                                    <h1 ><b>{{ $token->counter->name }}</b></h3>
                                </td>
                                <td class=" text-center border-3 border-white bg-primary text-black" style="font-size: 50px" >
                                    <h1><b>{{ $token->token_number }}</b></h3>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cloudinary-marketing-res.cloudinary.com/images/w_1000,c_scale/v1679921049/Image_URL_header/Image_URL_header-png?_i=AA"
                                class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item active">
                            <img src="https://cloudinary-marketing-res.cloudinary.com/images/w_1000,c_scale/v1679921049/Image_URL_header/Image_URL_header-png?_i=AA"
                                class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item active">
                            <img src="https://cloudinary-marketing-res.cloudinary.com/images/w_1000,c_scale/v1679921049/Image_URL_header/Image_URL_header-png?_i=AA"
                                class="d-block w-100" alt="...">

                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    @vite('resources/js/app.js')
    <script defer>
        const currentToken = @json($counterTokens);
        const tokenMap = {};

        currentToken.forEach(token => {
            tokenMap[token.counter.name] = token;
        });

        function speak(tokenNumber, counterNumber) {
            const text = `Token Number ${tokenNumber} Please proceed to Counter Number ${counterNumber}`;
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
        const audio = new Audio("{{ asset('notification-autdio.mp3') }}")

        window.addEventListener('load', () => {
            window.Echo.channel('counterTokenCall').listen('CounterTokenEvent', ({
                counter
            }) => {
                const token = tokenMap[counter.counter.name];
                if (token) {
                    $('#table_body').prepend(`<tr>
                <td class=" text-center border-3 border-white bg-info text-black" style="font-size: 50px">
                    <h3>${token.counter.name}</h3>
                </td>
                <td class=" text-center border-3 border-white bg-primary text-black" style="font-size: 50px">
                    <h3><b>${counter.token_number}</b></h3>
                </td>
            </tr>`);
                    setTimeout(() => {
                        speak(counter.token_number, token.counter.name);
                        setTimeout(() => {
                            speak(counter.token_number, token.counter.name);
                        }, 3000);
                    }, 2000);
                }
            });
        });
    </script>
</body>

</html>
