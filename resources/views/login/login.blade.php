<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/Admin/dist/assets/media/logos/favicon.ico" />
    <title>POS Wijaya Autoparts</title>
    <link rel="stylesheet" href="/Login/style.css">
</head>

<body>

    <div class="center">
        <div class="gambar"><img src="/Login/IMG_CROP_20210501_13472663-removebg-preview.png"></div>
        <form method="POST" action="{{ route('postlogin') }}">
            @csrf
            <div class="txt_field">
                <input type="text" id="email" name="email" class="@error('email') is-invalid @enderror"
                    autofocus required>
                <span></span>
                <label>Email</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password" required>
                <span></span>
                <label>Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
    @include('sweetalert::alert')
</body>

</html>
