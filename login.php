<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            position: relative;
            margin: 0;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://cdna.artstation.com/p/assets/images/images/071/087/584/original/fatih-emir-bg-design.gif?1704403912') no-repeat center center fixed;
            background-size: cover;
            overflow: auto;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            background-size: inherit;
            background-position: inherit;
            filter: blur(8px);
            z-index: -1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
            position: relative;
            z-index: 1;
            margin: 20px;
            min-height: 500px;
            flex-wrap: wrap;
        }

        .login-image {
            padding: 25%;
            align-items: center;
            justify-content: center;
            flex: 1 1 50%;
            min-height: 200px;
            border-radius: 50%;
            overflow: hidden;
            background: url('https://64.media.tumblr.com/96ec6b2c635d1ac0ef03e7c589779855/bcb26f1fed013fd5-84/s540x810/47ef2532d3568cae892397df1cbb772f5f66ce85.gif') no-repeat center center;
            background-size: cover;
            margin: 50px auto;
        }


        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .login-form {
            flex: 1 1 50%;
            padding: 80px 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
            font-weight: 700;
            margin-bottom: 30px;
            color: #222;
        }

        .form-control {
            border: none;
            border-bottom: 1.5px solid #ddd;
            border-radius: 0;
            padding-left: 2.5rem;
            font-size: 1rem;
            color: #444;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: none;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-icon {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon i {
            position: absolute;
            left: 10px;
            color: #888;
            pointer-events: none;
        }

        .input-icon input {
            padding-left: 30px;
            height: 35px;
        }

        .form-control {
            padding-left: 3rem;
            height: 2.5rem;
            font-size: 1rem;
        }


        .form-check-label {
            user-select: none;
            color: #555;
            font-size: 0.9rem;
        }

        .btn-login {
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 0;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .btn-login:hover {
            background-color: #1d4ed8;
        }

        .create-account {
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .create-account a {
            text-decoration: underline;
            color: #2563eb;
            font-weight: 600;
        }

        .social-login {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.9rem;
            color: #666;
            user-select: none;
        }

        .social-login>span {
            white-space: nowrap;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons button {
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .social-icons button.facebook {
            background-color: #1877f2;
        }

        .social-icons button.facebook:hover {
            background-color: #165ec9;
        }

        .social-icons button.twitter {
            background-color: #1da1f2;
        }

        .social-icons button.twitter:hover {
            background-color: #198ddb;
        }

        .social-icons button.google {
            background-color: #db4437;
        }

        .social-icons button.google:hover {
            background-color: #c33c2e;
        }


        @media (max-width: 576px) {
            .login-container {
                flex-direction: column;
                margin: 20px auto;
                min-height: unset;
            }

            .login-image {
                width: 100%;
                height: 180px;
                border-radius: 15px 15px 0 0;
            }

            .login-form {
                padding: 20px;
            }

            .login-form h2 {
                font-size: 1.3rem;
                text-align: center;
            }

            .form-control {
                font-size: 0.9rem;
            }

            .btn-login {
                font-size: 0.9rem;
                padding: 10px;
            }

            .social-login {
                flex-direction: column;
                align-items: center;
            }

            .social-icons {
                justify-content: center;
            }
        }
        html, body {
    height: auto;
    min-height: 100vh;
}

    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Log In</h2>
            <form action="check_login.php" method="post" novalidate>
                <div class="input-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Your Name" required />
                </div>

                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" />
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn-login">Log in</button>
            </form>
            <div class="create-account">
                <a href="#">Create an account</a>
            </div>
            <div class="social-login">
                <span>Or login with</span>
                <div class="social-icons">
                    <button class="facebook" aria-label="Login with Facebook"><i class="bi bi-facebook"></i></button>
                    <button class="twitter" aria-label="Login with Twitter"><i class="bi bi-twitter"></i></button>
                    <button class="google" aria-label="Login with Google"><i class="bi bi-google"></i></button>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>