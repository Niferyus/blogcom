<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Giriş</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
    @if(session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    <div class="container">
        <h1>Admin Giriş</h1>
        <form name="loginform" id="loginform" action="{{ route('admin-login') }}" method="POST">
            @csrf
            <label for="email">Mailiniz</label>
            <input type="text" name="email" id="email" maxlength="50" minlength="2" required>
            
            <label for="password">Şifreniz</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Giriş Yap</button>
        </form>
    </div>
</body>
</html>
