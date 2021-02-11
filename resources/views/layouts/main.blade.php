<!DOCTYPE html>
<html lang="en">
<head>
   @yield('meta')
    <title>@yield('title')</title>
   @yield('head')

    <style>
        .loader-ajax {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{asset('/images/new_logo.png')}}) 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }
    </style>
</head>

<body class="@yield('theme')">

<!--Main Navigation-->
<header>

    @yield('header')
    <!--/.Navbar-->

    <!-- Sidebar navigation -->
   @yield('sidebar')
    <!--/. Sidebar navigation -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main>
    <div class="loader-ajax"></div>
    @yield('content')

    @yield('search')

    @yield('show')

    @yield('create')

    @yield('image')

    @yield('edit')

    @yield('delete')
</main>
<!--Main layout-->

<!--Footer-->
@yield('footer')
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
@yield('script')
<script>
    $(window).on('load', function(){
        $(".loader-ajax").fadeOut("slow");
    });
</script>

</body>

</html>
