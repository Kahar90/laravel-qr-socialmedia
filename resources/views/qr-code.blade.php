<html>

<head>

    <title>QR Code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body>
    <script type="text/javascript" src="{{asset('instascan.min.js')}}"></script>
    <div class="h-screen w-screen">
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-3xl">
                    </h1>
                    <h1 class="text-5xl font-bold mt-10 mb-2">Nabil Alkahar</h1>
                    <h1 class="text-3xl mb-2">A20EC0281</h1>
                    <p class="font-bold">Data from login</p>
                    <p> {{$user->name}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>User ID: {{$user->id}}</p>

                    <div id="qrcode" class="mt-10 ml-14"></div>

                    <h3 class="text-3xl font-bold mt-10 mb-2">Use this QR Code for login</h3>
                    <script type="text/javascript" src="{{asset('qrcode.min.js')}}"></script>
                    <script type="text/javascript">
                        new QRCode(document.getElementById("qrcode"), {
                            text: "{{$user->password}}",
                            width: 256,
                            height: 256,
                            colorDark: "#161314",
                            colorLight: "#ffff",
                            correctLevel: QRCode.CorrectLevel.H

                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</body>

</html>