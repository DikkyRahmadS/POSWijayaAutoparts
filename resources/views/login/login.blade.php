<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Wijaya Autoparts</title>
    <link rel="stylesheet" href="/Login/styleLogin.css">
    <script src="/Login/scriptLogin.js" defer></script>
</head>

<body>
    <div class="container">
        <header>
            <img src="/Login/img/IMG_CROP_20210501_13472663-removebg-preview.png" alt="">
        </header>
        <h4>Input PIN</h4>
        <form action="{{ route('postmasuk') }}" method="POST">
            @csrf
            <div class="input-field">
                <input type="password" name="box1">
                <input type="password" name="box2" disabled>
                <input type="password" name="box3" disabled>
                <input type="password" name="box4" disabled>
                <input type="password" name="box5" disabled>
                <input type="password" name="box6" disabled>
            </div>
            <button>Login</button>
        </form>
    </div>
</body>

</html>
