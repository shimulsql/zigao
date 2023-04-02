<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> {{$title}} </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto+Slab:wght@400;500;800;900&display=swap"
    rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @yield('css')

  <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>

  {{-- Everytime we refresh, The token will be added to the LS  --}}
  <script>
    window.localStorage.setItem('token', "{{$user_token}}")
  </script>
</head>