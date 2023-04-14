<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>POS Wijaya Autoparts</title>
    <link rel="stylesheet" href="/Login/style.css">
</head>

<body>
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <div class="center">
        <div class="gambar"><img src="/Login/IMG_CROP_20210501_13472663-removebg-preview.png"></div>
        <form method="POST" action="{{ route('postlogin') }}">
            @csrf
            <div class="txt_field">
                <input type="text" id="email" name="email" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>
