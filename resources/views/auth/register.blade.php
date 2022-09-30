@extends('auth.master')

@section('content')

<section class="sing-in-area">
    <div class="container pt-1 d-block justify-content-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <div class="mt-5 mb-4">
                        <span style="color: #27ae60;">Register</span>
                    </div>
                    <h2 class="text-white">Create An Account!</h2>
                    <p>with your social network</p>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label text-success">Name</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control text-success" style="font-size: 13px;" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan Nama">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label text-success">E-Mail Address</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control text-success" style="font-size: 13px;" name="email" value="{{ old('email') }}" required placeholder="Masukkan E-Mail">

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
                                    <input id="password" type="password" class="form-control text-success" style="font-size: 13px;" name="password" required placeholder="Masukkan E-Mail">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-3 control-label text-success">Confirm Password</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control text-success" style="font-size: 13px;" name="password_confirmation" required placeholder="Masukkan E-Mail">
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"></label>
                                <input id="role" type="hidden" type="text" class="form-control" name="role" required  value="customer">

                                <div class="col-md-6">
                                    
                                        {{-- <select name="role">
                                            <option value="1">User</option>
                                            <option value="2">Seller</option>
                                            <option value="3">Driver</option>
                                        </select> --}}
                                    

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pt-4">
                                <div>
                                    <button type="submit" class="btn btn-success" style="font-size: 16px;">
                                        Register
                                    </button>
                                </div>
                            </div>
                            <small>
                                <span class="text-light fw-light">Sudah Punya Akun?</span> <a class="text-light fw-bold" href="/login">Login</a>
                            </small>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
