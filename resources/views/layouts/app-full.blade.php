<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => $title])

<body>
  <x-front.navbar />
  <div class="">
    @yield('content')
  </div>
  </div>
</body>

</html>