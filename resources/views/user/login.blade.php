<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="col-md-10 mx-auto col-lg-7">
            <form class="p-4 p-md-5 border bg-light" method="POST" action="{{ route('login') }}">
                @csrf
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
                    <p class="mb-4">Log into your account create to post</p>
                </header>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">LogIn</button>
                </div>
                <div class="mb-3">
                    <p>Don't have an account?
                        <a href="{{ route('register') }}"> Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>