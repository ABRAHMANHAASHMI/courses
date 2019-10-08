@extends('layouts.app')

@section('content')
    <main>
        <section class="login_form">
            <div class="form_context">
                <div class="logo_wrapper">
                    <a class="" href="#"><span>Study</span>Courses</a>
                </div>
                <form method="POST" class="post_area" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email_inp" class="sr-only"></label>
                        <input type="email" class="form-control" id="email_inp" aria-describedby="emailHelp"
                               placeholder="email"  name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="pass" class="sr-only"></label>
                        <input type="password" class="form-control password_input" id="pass" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label class="checkbox_cont">Remember me
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                    <button type="submit" class="btn btn-primary login_btn">
                        Continue
                    </button>

                    <div class="forget_pass text-center">
                        <a href="{{ route('register') }}" class="instead" style="font-size: 100px">sign up instead</a>

                        <a href="{{ url('reset_password') }}" class="sign_up_login">Reset Password</a>
                    </div>

                </form>

            </div>
        </section>
    </main>
@endsection
