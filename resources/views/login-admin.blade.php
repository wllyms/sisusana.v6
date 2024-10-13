@extends('layout.main-login')
@section('title', 'Beranda | SISUSANA')
@section('namepage', 'SISUSANA - aplikaSI SUrvey kepuaSAN pAsien')
@section('content')

    <div class="page-inner">
        <div class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image" style="background-image: url('../assets/img/login-banner.jpeg');height: 300px;">
            </div>
            <!-- Background image -->
            <div class="card mx-6 mx-md- shadow-5-strong bg-body-tertiary"
                style="margin-top: -120px;backdrop-filter: blur(30px);">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4">
                            <h2 class="fw-bold mb-5">SISUSANA LOGIN</h2>
                            @if (session('Gagal'))
                                <p class="text-danger">{{ session('Gagal') }}</p>
                            @endif
                            <form action="{{ route('login.submit') }}" method="POST">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ old('username') }}"
                                            name="username" id="username" placeholder="Username" required />
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" required />
                                        <span class="input-group-text">
                                            <i class="icon-eye" id="togglePassword" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-block mb-4">
                                    <span>
                                        <i class="icon-login btn-md"></i>
                                    </span>
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section: Design Block -->

    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the icon
            this.classList.toggle('icon-eye-off');
        });
    </script>
@endsection
