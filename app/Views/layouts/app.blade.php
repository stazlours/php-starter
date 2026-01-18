<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Starter' }}</title>
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/assets/app.css">
</head>

<body class="bg-gray-200 text-gray-900">
  
  <main>
    @yield('content')
  </main>

  <script src="/assets/gsap.js" defer></script>
  <script src="/assets/app.js" defer></script>
</body>

</html>
