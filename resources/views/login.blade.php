<html>

<head>
    <title>Login page</title>
    @vite('resources/css/app.css')

</head>

<div>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold mb-5">Login</h1>
                <p class="text-2xl mb-5">Login to access QR code scanner</p>

                <a href="/login/github" class="btn btn-primary">Login with Gthub</a>
                <div class="max-w-md">
                    <video id="preview" class="mt-10"></video>
                    <script type="text/javascript" src="{{asset('instascan.min.js')}}"></script>
                    <script type="text/javascript">
                        let scanner = new Instascan.Scanner({
                            video: document.getElementById('preview')
                        });
                        scanner.addListener('scan', function(content) {
                            window.location.href = "/login/qr-code?content=" + content;
                        });
                        Instascan.Camera.getCameras().then(function(cameras) {
                            if (cameras.length > 0) {
                                scanner.start(cameras[0]);
                            } else {
                                console.error('No cameras found.');
                            }
                        }).catch(function(e) {
                            console.error(e);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

</html>