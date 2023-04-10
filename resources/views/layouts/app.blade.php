<!DOCTYPE html>
<html lang="en">
@include('includes.head', ['title' => $title])

<body>
  <x-front.navbar />
  <div class="container">
    <div class="sm:flex block sm:static relative">
      <div
        class="w-[155px] bg-white border-r border-slate-200 shrink-0 sm:relative absolute pt-7 bottom-0 top-0 sm:left-0 left-[-100%]">
        <x-front.sidebar />
      </div>
      <div class="w-full grow">
        <!--Page Contents Goes Here  -->
        <div>
          @yield('before-content')
        </div>
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
  @include('includes.footer')
  @yield('script')
</body>

</html>