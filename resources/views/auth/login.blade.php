@extends('auth.master')

@section('content')

<section class="sing-in-area">
    <div class="container pt-5 d-block justify-content-center">
        <div class="contact-warp-form">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <div class="mt-5 mb-4">
                            <span style="color: #27ae60;">Login</span>
                        </div>
                        <h2 class="text-white">Login An Account!</h2>
                        <p>with your social network</p>
                        
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-3 control-label text-success">E-Mail</label>

                                    <div class="col-md-8">
                                        {{-- <input id="email" type="text" class="form-control" name="text" value="{{ old('email') }}" required autofocus placeholder="Username"> --}}
                                        <input id="email" type="email" class="form-control text-success" style="font-size: 13px;" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan E-Mail">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-3 control-label text-success">Password</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control text-success" style="font-size: 13px;" name="password" required placeholder="Masukkan Password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="form-group pt-2">
                                    <div class="text-start" style="margin-left: 48px;">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-success" style="font-size: 16px;">
                                            <a href="{{route('home')}}"></a>Login
                                        </button>

                                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a> --}}
                                    </div>
                                    
                                </div>
                                <small>
                                    <span class="text-light fw-light">Belum Punya Akun?</span> <a class="text-light fw-bold" href="/register">Register</a>
                                </small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
