<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-checkbox.css') }}" rel="stylesheet">

    <title>Login</title>
</head>
<body>
<div class="page">
    <div class="loginContainer">
        <div class="loginContainerHeader">
            <div class="logoContainer">
                <img src="https://aigles-scrl.com/ext/logo.gif" alt="logo">
            </div>
            <p>Connexion</p>
        </div>
        <div class="loginContainerBody">
            <form method="post" action="{{route('login')}}" class="loginForm">
                @csrf
                <input class="emailInput" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Adresse email" value="{{ old('email') }}" required autocomplete="email">
                <input class="passwordInput"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                <div>
                    <label class="label_checkbox login_label_remember">
                        <input type="checkbox" class="login_checkbox"><p class="label_checkbox_p">
                            Se souvenir de moi ?
                        </p>
                        <span class="checkmark"></span>
                    </label>
                </div>

                <button type="submit">Connexion</button>
            </form>
        </div>
        <div class="loginContainerFooter">
            <a href="#">Mot de passe oublié ?</a>
        </div>

    </div>

</div>
</body>
</html>
