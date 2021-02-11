<!DOCTYPE html>
<html lang="en">
<head>

    <title>Practical Test</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="#" class="navbar-brand">Car Dealer Website</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <li><a href="#">Cars</a></li>
        </div>

    </div>
</section>

<section>
    <div class="container">
        <div class="text-center">
            <h1>Car Listing</h1>

        </div>
    </div>
</section>

<section class="section-background">
    <div class="container">

        <div class="row">

            <div class="col-lg-9 col-xs-12">
                <div class="row">

                    @php
                        $specifications = DB::table('specification')
            ->join('terminologies', 'terminologies.id', '=', 'specification.terminology_id')
            ->select('specification.*',
                'terminologies.name as terminologies_name')
            ->get();
                    @endphp

                    @foreach($specifications as $specification)


                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <div class="courses-thumb courses-thumb-secondary">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="{{asset('images/car/'.$specification->photo.'')}}" class="img-responsive" alt="">
                                    </div>
                                </div>

                                <div class="courses-detail">
                                    <h3><a href="#">{{$specification->car_name}}</a></h3>

                                    <p class="lead"><small>{{$specification->price}}</small></p>

                                    <p>Model: {{$specification->model}} / Color: {{$specification->color}} &nbsp;&nbsp;/&nbsp;&nbsp; Milage: {{$specification->milage}} /&nbsp;Used vehicle</p>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SCRIPTS -->
<script src="{{asset('website/js/jquery.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/js/smoothscroll.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>

</body>
</html>
