<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container" style="max-width: 400px;">
    <h2 class="mb-4">Connexion Administrateur</h2>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-3">
            <label>Mot de passe :</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
</div>

</body>
</html>
