@extends('admin.layout.auth')

@section('meta')
    @include('layouts.meta')
@endsection

@section('title')
    LOGIN : PRACTICAL TEST
@endsection

@section('head')
    @include('layouts.head')
@endsection

@section('theme')
    @include('layouts.theme')
@endsection

@section('header')
    @include('layouts.header')
@endsection

<div class="sidenav-bg mask-strong"></div>

@section('content')
        <!--Section: -->
    <section id="contactforms">
        <!--Description-->
        <p class="description"></p>
        <!--Section: Live preview-->
        <section>
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-12 col-lg-6 col-xl-5 mx-auto">
                    <section class="form-gradient">
                        <div class="card ">
                            <!--Header-->
                            <div class="header pt-3 bg-gray">
                                {{--<div class="row d-flex justify-content-center">--}}
                                    {{--<h3 class="white-text mb-3 pt-3 font-weight-light">LOGIN</h3>--}}
                                {{--</div>--}}
                                <div class="row mt-2 mb-3 d-flex justify-content-center">
                                    <img style="height: 90px;" src="{{asset('images/icons/logo.png')}}" class="">
                                </div>
                            </div>
                            <!--Header-->
                            <div class="card-body mx-4 mt-4">
                                <!--Body-->
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                                    {{ csrf_field() }}
                                    <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>
                                            <label for="email" >Email</label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" autocomplete="off" autofocus>
                                            <label for="password">Password</label>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox7">
                                        <label for="checkbox7" class="form-check-label gray-text font-weight-normal">
                                            Remember Me
                                        </label>
                                    </div>
                                        <div class="md-form">
                                            <div class="row d-flex mb-4">
                                                <!--Grid column-->
                                                <div class="col-md-1 col-md-12 d-flex  ml-auto">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-grey btn-rounded z-depth-1a">LOGIN</button>
                                                    </div>
                                                    <div class="text-center" style="margin-top: 20px; margin-left: 20px">
                                                        <a class="gray-text font-weight-normal" href="{{ url('/admin/password/reset') }}">
                                                            Forgot Your Password?
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Grid column-->
                                            </div>


                                        </div>

                                </form>


                                <!--Grid row-->

                                <!--Grid row-->
                            </div>

                        </div>

                    </section>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>

    </section>
    <!--/Section: -->

@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    @include('layouts.script')
@endsection


