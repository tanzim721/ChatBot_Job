<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap"
      rel="stylesheet" />

    <title>@yield('title', 'Jobbar')</title>

    <style>
      * {
        font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont,
          'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans',
          'Helvetica Neue', sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-900">
    <!-- Hero Section -->


    @yield('content')

    <!-- Footer -->
    @include('frontend.layouts.footer')
    <!-- /Footer -->

  </body>
</html>
