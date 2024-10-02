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
                            <form action="" method="">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                        <input type="password" class="form-control" name="username" id="username"
                                            placeholder="Username" />
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <div class="input-group p-0">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password"" />
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type=" submit" data-mdb-button-init data-mdb-ripple-init
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
@endsection
