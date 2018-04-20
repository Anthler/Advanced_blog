<!DOCTYPE html>
<html lang="en">

  <head>

   @include('user.partials.head')

  </head>

  <body>

    <!-- Navigation -->
    @include('user/partials/nav')

    <!-- Page Header -->
   
       

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('user/partials/footer')

  </body>

</html>
