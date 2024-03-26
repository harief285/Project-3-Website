<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Admin Facial Check</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="antialiased">
        <section class="bg-light py-3 py-md-5">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                        <a href="#!">
                            <img src="{{URL::asset('/img/bsb-logo.svg')}}" alt="BootstrapBrain Logo" width="175" height="57">
                        </a>
                        </div>
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Login untuk memeriksa wajah kamu</h2>
                        
                        <form action="#!">
                        <div class="row gy-2 overflow-hidden">
                            <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                <label for="email" class="form-label">Email</label>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                <label for="password" class="form-label">Password</label>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="d-flex gap-2 justify-content-between">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                <label class="form-check-label text-secondary" for="rememberMe">
                                    Tetap login masuk
                                </label>
                                </div>
                                <a href="#!" class="link-primary text-decoration-none">Lupa Password?</a>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="d-grid my-3">
                                <button class="btn btn-primary btn-lg" type="submit">Log in</button>
                            </div>
                            </div>
                            <div class="col-12">
                            <p class="m-0 text-secondary text-center">Tidak punya akun? <a href="#!" class="link-primary text-decoration-none">Daftar</a></p>
                            </div>
                        </div>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>
