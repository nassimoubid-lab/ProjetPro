<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin — La Table d'Or</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --cream: #F5EFE0;
            --cream-dark: #EDE3CC;
            --brown: #7A5C3A;
            --brown-dark: #4A3420;
            --gold: #C9A84C;
            --text: #2E1F0F;
            --text-muted: #7A6248;
            --danger: #C0392B;
            --danger-light: #FADBD8;
        }

        body {
            background: var(--cream);
            font-family: 'Jost', sans-serif;
            font-weight: 300;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── GAUCHE ── */
        .left {
            background: var(--brown-dark);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .left-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 300;
            color: var(--cream);
            letter-spacing: 0.05em;
        }

        .left-logo span {
            display: block;
            font-size: 10px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            font-family: 'Jost', sans-serif;
            margin-bottom: 6px;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-tag {
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .left-tag::before {
            content: '';
            display: block;
            width: 24px;
            height: 1px;
            background: var(--gold);
        }

        .left-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 300;
            color: var(--cream);
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .left-title em {
            font-style: italic;
            color: rgba(245,239,224,0.6);
        }

        .left-desc {
            font-size: 13px;
            color: rgba(245,239,224,0.45);
            line-height: 1.8;
            max-width: 300px;
        }

        .left-bg-text {
            position: absolute;
            bottom: -20px;
            right: -20px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 160px;
            font-weight: 300;
            color: rgba(255,255,255,0.03);
            line-height: 1;
            pointer-events: none;
            user-select: none;
        }

        .left-footer {
            font-size: 12px;
            color: rgba(245,239,224,0.25);
        }

        /* ── DROITE ── */
        .right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }

        .login-box {
            width: 100%;
            max-width: 360px;
        }

        .login-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            font-weight: 300;
            color: var(--brown-dark);
            margin-bottom: 8px;
        }

        .login-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 40px;
        }

        /* ERREUR */
        .error-msg {
            background: var(--danger-light);
            color: var(--danger);
            border-left: 3px solid var(--danger);
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 24px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--cream-dark);
            background: var(--cream);
            font-family: 'Jost', sans-serif;
            font-size: 14px;
            font-weight: 300;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: var(--brown);
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: var(--brown-dark);
            color: var(--cream);
            border: none;
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 8px;
        }

        .submit-btn:hover { background: var(--gold); color: var(--brown-dark); }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .back-link:hover { color: var(--brown); }
    </style>
</head>
<body>

<!-- GAUCHE -->
<div class="left">
    <div class="left-logo">
        <span>Administration</span>
        La Table d'Or
    </div>

    <div class="left-content">
        <p class="left-tag">Espace privé</p>
        <h1 class="left-title">Gestion<br>des <em>réservations</em></h1>
        <p class="left-desc">
            Accédez à votre tableau de bord pour consulter, gérer et exporter les réservations de votre restaurant.
        </p>
    </div>

    <div class="left-bg-text">Admin</div>

    <p class="left-footer">© {{ date('Y') }} La Table d'Or</p>
</div>

<!-- DROITE -->
<div class="right">
    <div class="login-box">

        <h2 class="login-title">Connexion</h2>
        <p class="login-subtitle">Entrez votre mot de passe pour accéder au dashboard.</p>

        @if($errors->any())
            <div class="error-msg">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" autofocus>
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>

        <a href="/" class="back-link">← Retour au site</a>

    </div>
</div>

</body>
</html>