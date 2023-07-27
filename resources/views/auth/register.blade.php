<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;
            height: 100vh;
            font-family: sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden
        }

        @media screen and (max-width: 600px; ) {
            body {
                background-size: cover;
                : fixed
            }
        }

        #particles-js {
            height: 100%
        }

        .registerBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            min-height: 200px;
            background: #000000;
            border-radius: 10px;
            padding: 40px;
            box-sizing: border-box
        }

        .user {
            margin: 0 auto;
            display: block;
            margin-bottom: 20px
        }

        h3 {
            margin: 0;
            padding: 0 0 20px;
            color: #59238F;
            text-align: center
        }

        .registerBox input {
            width: 100%;
            margin-bottom: 20px
        }

        .registerBox input[type="text"],
        .registerBox input[type="password"] {
            border: none;
            border-bottom: 2px solid #262626;
            outline: none;
            height: 30px;
            color: #fff;
            background: transparent;
            font-size: 16px;
            padding-left: 20px;
            box-sizing: border-box
        }

        .registerBox input[type="text"]:hover,
        .registerBox input[type="password"]:hover {
            color: #42F3FA;
            border: 1px solid #42F3FA;
            box-shadow: 0 0 5px rgba(0, 255, 0, .3), 0 0 10px rgba(0, 255, 0, .2), 0 0 15px rgba(0, 255, 0, .1), 0 2px 0 black
        }

        .registerBox input[type="text"]:focus,
        .registerBox input[type="password"]:focus {
            border-bottom: 2px solid #42F3FA
        }

        .inputBox {
            position: relative
        }

        .inputBox span {
            position: absolute;
            top: 10px;
            color: #262626
        }

        .registerBox button[type="submit"] {
            border: none;
            outline: none;
            height: 30px;
            font-size: 13px;
            background: #59238F;
            color: #fff;
            border-radius: 20px;
            cursor: pointer
        }

        .registerBox a {
            color: #262626;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: block
        }

        a:hover {
            color: #00ffff
        }

        p {
            color: #0000ff
        }
    </style>

</head>

<body>

    <div class="registerBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Daftar Akun</h3>
        <form class="login100-form validate-form" action="{{ route('register-post') }}" method="post">
            @csrf
            <div class="inputBox">
                <div class="wrap-input100 validate-input" data-validate="Masukkan Nama dengan Benar!">
                    <input class="input100" id="username" type="text" name="username" placeholder="Username"
                        value="{{ old('username') }}" required>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    @if ($errors->has('username'))
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukkan Password dengan Benar!">
                    <input class="input100" id="password" type="password" name="password" placeholder="Password"
                        required>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukkan Password dengan Benar!">
                    <input class="input100" type="password" name="password_confirmation"
                        placeholder="Masukkan Ulang Password Anda" required>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @if ($errors->has('password_confirmation'))
                        <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukkan Nomor HP dengan Benar!">
                    <input class="input100" id="phone" type="text" name="phone" placeholder="No Hp"
                        value="{{ old('phone') }}">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    @if ($errors->has('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukkan Alamat Dengan Benar!">
                    <input class="input100 form-control" id="addres" type="text" name="addres"
                        placeholder="Alamat" value="{{ old('addres') }}" required></input>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    @if ($errors->has('addres'))
                        <p class="text-danger">{{ $errors->first('addres') }}</p>
                    @endif
                </div>
            </div>

            <div class="container-login100-form-btn mt-3">
                <button class="btn form-control login100-form-btn" type="submit">Daftar</button>
            </div>
        </form>
        <div class="text-center mt-2">
            Sudah Punya Akun?
            <a href="{{ route('login') }}" class="txt1">Masuk Disini</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
</html>
