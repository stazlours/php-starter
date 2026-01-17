<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Starter' }}</title>
</head>
<body>

<header>
    <h1>PHP Starter</h1>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
