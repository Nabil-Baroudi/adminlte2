{{--  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='{{ asset('lib/sweetalert2/sweetalert2.css') }}' rel="stylesheet" debug="true" />
    <script src="https: //unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <title>{{ env('APP_NAME') }}</title>
</head>

<script>
    function showHide() {
        var peopleCount = document.getElementById("alone");
        var fieldset = document.getElementById("fieldset");
        fieldset.style.display = peopleCount.value == "1" ? "block" : "none";
        if (peopleCount.value == "1") {
            fieldset.disabled = false;
        }
    }
</script>


<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    input.invalid {
        background-color: #ffdddd;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<body onload="showHide()">
    @include('sweetalert::alert')
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="{{ asset('lib/sweet-alert/js/sweetalert.js') }}" type="text/javascript" debug="true"></script>
    <script>
        function ShowSuccessAlert(message, options) {
            options = jQuery.extend({
                timer: 3000,
                position: 'center',
                showConfirmButton: false,
                showCloseButton: false,
                toast: true,
                icon: 'success'
            }, options);
            Swal.fire({
                toast: options.toast,
                title: "Success",
                icon: options.icon,
                showCloseButton: options.showCloseButton,
                showConfirmButton: options.showConfirmButton,
                timer: options.timer,
                position: options.position,
            });
        }

        function ShowInfoAlert(message, options) {
            options = options || {
                timer: false,
                position: 'center',
                showConfirmButton: false,
                showCloseButton: false,
            };
            Swal.fire({
                toast: options.toast,
                title: message || "Loading",
                icon: 'info',
                showCloseButton: options.showCloseButton,
                showConfirmButton: options.showConfirmButton,
                timer: false,
                position: 'center',
            });
        }

        function ShowWarningAlert(message, options) {
            options = jQuery.extend({
                timer: 3000,
                position: 'center',
                showConfirmButton: false,
                showCloseButton: false,
                toast: true,
                icon: 'warning'
            }, options);
            Swal.fire({
                toast: options.toast,
                title: message || "Warning",
                icon: options.icon,
                showCloseButton: options.showCloseButton,
                showConfirmButton: options.showConfirmButton,
                timer: options.timer,
                position: options.position,
            });
        }

        function ShowErrorAlert(message, options) {
            options = options || {
                timer: 3000,
                position: 'center',
                showCloseButton: false,
                showConfirmButton: false,
            };
            Swal.fire({
                toast: options.toast,
                title: message || "UnExpected Error",
                icon: 'error',
                showCloseButton: false,
                showConfirmButton: false,
                timer: 5000,
                position: 'center',
            });
        }
    </script>
    @stack('scripts')
</body>

</html>  --}}
