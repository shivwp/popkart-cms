@extends('layouts.vertical-menu.master2')
@section('css')
<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
<style type="text/css">
    .page{
        background-color: rgb(53, 162, 255) !important;
    }
</style>
@endsection
@section('content')
        <!-- BACKGROUND-IMAGE -->
        <div class="login-img">

            <!-- GLOABAL LOADER -->
           
            <!-- /GLOABAL LOADER -->

            <!-- PAGE -->
            <div class="page">
                <div class="">
                    <!-- CONTAINER OPEN -->
                    <div class="col col-login mx-auto">
                        <div class="text-center">
                            <img style="max-width: 100%"  src="{{ asset('assets/images/popkart.png') }}" alt="logo">
                        </div>
                    </div>
                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <div class="card-header d-flex justify-content-center h3">{{ __('Register User') }}</div>
                     
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!-- END PAGE -->

        </div>
        <!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('js')
@endsection
