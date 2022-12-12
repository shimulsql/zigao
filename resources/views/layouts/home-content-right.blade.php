<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => $title])

<body class="@stack('body-class')">
  <x-front.navbar />
  <div class="container">
    <div class="sm:flex block sm:static relative">
      <div class="w-full grow">
        <!--Page Contents Goes Here  -->

        <div class="md:flex">
          <div class="md:w-9/12 w-full pr-6">
            <!-- main contents start -->
            @yield('content')
            <!-- main contents end -->
          </div>
          <!-- right sidebar start -->
          <div class="md:w-3/12 w-full py-8">
            @yield('right-widgets')
          </div>
          <!-- right sidebar end -->
        </div>

        <!--Page Contents End Here  -->

      </div>
    </div>
  </div>
  @yield('css')
  @yield('js')
</body>

</html>