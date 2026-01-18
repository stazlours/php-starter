<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'Starter' }}</title>
  <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/assets/app.css">
</head>

<body class="bg-gray-200 text-gray-900">

  <header class='p-8'>

    <h1 id="title" class="text-3xl font-bold text-indigo-600">STONE Starter</h1>
  </header>
  <main>
    @yield('content')
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      gsap.to("#title", {
        scale: 1.1,
        repeat: -1,
        yoyo: true,
        duration: 0.8
      })
    })
  </script>


  <script src="/assets/gsap.js" defer></script>
  <script src="/assets/app.js" defer></script>
</body>

</html>
