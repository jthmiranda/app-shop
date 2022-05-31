@extends('layouts.app')

@section('body-class', 'signup-page')
@section('content')
    <div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="header header-primary text-center">
                                <h4>Registro</h4>
                            </div>
                            <p class="text-divider">Completa tus datos</p>
                            <div class="content">

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
                                    <input id="name" placeholder="First Name..." type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>

                                    <input id="email" placeholder="Correo electronico" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                                    <input id="password" placeholder="Contraseña" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                                    <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar registro</button>
                            </div>
                            {{--                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                {{ __('Forgot Your Password?') }}--}}
                            {{--                            </a>--}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
@endsection
