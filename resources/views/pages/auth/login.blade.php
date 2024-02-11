<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; FIC14</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex align-items-stretch flex-wrap">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="m-3 p-4">
                        <img src="{{ asset('img/store.png') }}" alt="logo" width="80"
                            class="shadow-light  mt-2">
                        <h4 class="text-dark font-weight-normal">Selamat Datang <span class="font-weight-bold">Resto
                                Ellyp</span>
                        </h4>
                        <br>
                        <p class="text-muted">Before you get started, you must login or register if you don't already
                            have an account.</p>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" id="email" class="form-control" name="email"
                                tabindex="1" value="{{ old('email') }}" autofocus>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" id="password" type="password" class="form-control" name="password"
                                tabindex="2">
                        </div>

                        <div class="form-group text-right">
                            <button id="login-btn" type="submit" class="btn btn-primary btn-lg btn-icon icon-right"
                                tabindex="4">
                                <span id="login-btn-text">Login</span>
                                <span id="login-btn-loading" class="d-none">
                                    <i class="fas fa-spinner fa-spin"></i> Loading...
                                </span>
                            </button>
                        </div>

                        <div class="mt-5 text-center">
                            Don't have an account? <a href="{{ route('register') }}">Create new one</a>
                        </div>

                        <div class="text-small mt-5 text-center">
                            Copyright &copy; Your Company. Made with 💙 by Stisla
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
                    data-background="{{ asset('img/unsplash/login-bg.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="display-4 font-weight-bold mb-2">Good Morning</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank"
                                href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a
                                class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var loginBtn = document.getElementById('login-btn');
            var loginBtnText = document.getElementById('login-btn-text');
            var loginBtnLoading = document.getElementById('login-btn-loading');

            loginBtn.addEventListener('click', function(event) {
                event.preventDefault();

                loginBtnText.classList.add('d-none');
                loginBtnLoading.classList.remove('d-none');

                login();
            });
        });

        function login() {
            var email = $('#email').val();
            var password = $('#password').val();

            if (email.length == 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Email masih kosong !',
                })
                resetLoginButton();
                return;
            } else if (password.length == 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Password belum diisi !',
                })
                resetLoginButton();
                return;
            } else {
                $.ajax({
                    type: "POST",
                    url: '{{ route('login') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function(response) {
                        window.location.href = '{{ route('dashboard') }}';
                    },
                    error: function(xhr, status, error) {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        })
                        Toast.fire({
                            icon: 'error',
                            title: jsonResponse.message,
                        })
                        resetLoginButton();
                    }
                });
            }

        }

        function resetLoginButton() {
            var loginBtnText = document.getElementById('login-btn-text');
            var loginBtnLoading = document.getElementById('login-btn-loading');

            loginBtnText.classList.remove('d-none');
            loginBtnLoading.classList.add('d-none');
        }
    </script>
</body>

</html>
