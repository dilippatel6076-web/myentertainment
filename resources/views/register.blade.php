<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 900px;
        }

        .card {
            display: flex;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            background: #fff;
        }

        /* LEFT */
        .left {
            width: 40%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left h2 {
            font-size: 30px;
        }

        .left p {
            opacity: 0.8;
        }

        /* RIGHT */
        .right {
            width: 60%;
            padding: 40px;
        }

        .right h2 {
            margin-bottom: 20px;
        }

        /* INPUT */
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
        }

        .input-group label {
            position: absolute;
            top: 12px;
            left: 12px;
            color: #aaa;
            transition: 0.3s;
            pointer-events: none;
            background: white;
            padding: 0 5px;
        }

        .input-group input:focus+label,
        .input-group input:valid+label {
            top: -8px;
            font-size: 12px;
            color: #667eea;
        }

        /* BUTTON */
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            background: #667eea;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #5a67d8;
            transform: scale(1.02);
        }

        /* LINK */
        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }

        @media(max-width:768px) {
            .card {
                flex-direction: column;
            }

            .left,
            .right {
                width: 100%;
            }
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="card">

            <!-- LEFT SIDE -->
            <div class="left">
                <h2>Welcome 👋</h2>
                <p>Create your account and start managing your dashboard easily.</p>
            </div>

            <!-- RIGHT SIDE -->
            <div class="right">
                <h2>Create Account</h2>

                <form action="/register" method="POST">
                    @csrf

                    <div class="input-group">
                        <input type="text" name="name" required>
                        <label>Full Name</label>
                    </div>
                    @error('name')
                    <div style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror

                    <div class="input-group">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    @error('email')
                    <div style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror

                    <div class="input-group">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    @error('password')
                    <div style="color:red; font-size:12px;">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <input type="password" name="password_confirmation" required>
                        <label>Confirm Password</label>
                    </div>

                    <button type="submit" class="btn">Create Account</button>

                    <p class="login-link">
                        Already have an account?
                        <a href="/login">Login</a>
                    </p>
                </form>

            </div>

        </div>
    </div>

</body>

</html>