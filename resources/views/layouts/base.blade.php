<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/gritter/css/jquery.gritter.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('assets/lib/chart-master/Chart.js')}}"></script>
</head>

<body>
    <section id="container">
        @include('layouts.header')
        @include('layouts.sidebar')
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
            <!-- /wrapper -->
        </section>


    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    @include('layouts.script')
</body>
<x-modal id="vertically-centered" title="Vertically centered" :centered="true">
    <x-slot name="body">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </x-slot>
</x-modal>

</html>