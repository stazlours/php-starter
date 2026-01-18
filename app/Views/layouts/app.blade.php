<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Starter' }}</title>
    <link rel="stylesheet" href="/assets/app.css">
</head>
<body class="bg-gray-200 text-gray-900">

<header>
    <h1 class="text-3xl font-bold text-indigo-600 p-6">PHP Starter</h1>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
