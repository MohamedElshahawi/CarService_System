<!DOCTYPE html>
<html lang="en" dir="rtl">
    @include("website.main")
    <body id="page-top">
        <!-- Navbar -->
        @include("website.navbar")


        <!-- Header -->
        @include("website.header")


        <!-- Content -->
        @yield('content')





        <!-- Footer -->
        @include('website.footer')
        
        <!-- Script -->
        @include('website.script')


    </body>
</html>
