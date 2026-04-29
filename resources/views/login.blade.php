<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>

    <div class="login-card">
        <div class="login-left">
            <h1>Welcome Back!</h1>
            <p>Manage your dashboard, users, and reports with a single login.</p>
        </div>

        <div class="login-right">
            <h2>Admin Login</h2>
            <form method="POST" action="/check">
                @csrf
                <div class="form-floating">
                    <input type="email" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
                    <label for="email">Email Address</label>
                    @error('email')
                    <div class="text-danger" style="font-size:0.85rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="text-danger" style="font-size:0.85rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <a href="{{ route('register') }}" class="login-btn">Register</a>
                    </div>
                    <a href="" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="login-btn mb-3">Login</button>
            </form>
        </div>
    </div>
</body>

</html>