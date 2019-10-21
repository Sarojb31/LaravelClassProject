<!DOCTYPE html>
<html lang="en">
@include('FrontEnd._partials.head')

<body>
  <!-- Header Navigation-->
<!-- Header Navigation-->
@include('FrontEnd._partials.navbar')

<!-- Body Section -->

@yield('content')


<!-- footer starts here-->
@include('FrontEnd._partials.footer')
  <!-- footer end -->

  <!-- Script HERE -->
  @include('FrontEnd._partials.script')
      <!-- Script Ends HERE -->

</body>
</html>