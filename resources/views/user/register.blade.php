<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="col-md-10 mx-auto col-lg-7">
            <form class="p-4 p-md-5 border bg-light" method="POST" action="{{ route('register') }}">
                @csrf
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
                    <p class="mb-4">Create an account</p>
                </header>
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
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
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Sign Up</button>
                </div>
                <div class="mb-3">
                    <p>Already have an account?
                        <a href="{{ route('login') }}"> Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>