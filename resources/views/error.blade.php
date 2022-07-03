<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Page Eror</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/error.css')}}">

</head>

<body>
    <div id="error">

        {{-- <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="assets/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>The page you are looking not found.</p>
                    <a href="{{ url('/') }}" class="btn btn-lg btn-outline-primary mt-3">Back to Home</a>
                </div>
            </div>
        </div> --}}

        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="assets/images/samples/error-403.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">Forbidden</h1>
                    <p class="fs-5 text-gray-600">You are unauthorized to see this page. Call Super Admin Web !</p>
                    <a href="{{ url('/') }}" class="btn btn-lg btn-outline-primary mt-3">Back to Home</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
