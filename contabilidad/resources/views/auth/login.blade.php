@extends('layouts.app')

<style type="text/css">
      .rfc {
            font-family: 'Arial';
            font-size: 2rem;
            border-bottom: 1px solid $text-color;
            border-top: 1px solid $text-color;
            padding: 2rem 0;
            text-transform: uppercase;
            }
        .backgimg {
            background-image: url("{{asset('imgLogin.jpg')}}");
}


</style>

@section('content')
<div class="container" >
    <div id="loginModal" class="row modal show" tabindex="-1" role="dialog" aria-hidden="true" style="top: 5%; box-shadow: box-shadow: 10px 10px 5px green">
        <div class="modal-dialog">
            <div class="panel panel-default modal-content backgimg" style="width: 800px; height: 420px;  margin-left: 50%; margin: -100px 0 0 -100px; margin-top: 10px; box-shadow: 2px 2px 5px 5px gray">

                <div class="panel-body modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <input type="hidden" id="midred" name="midred" value="{{ Session::pull('midred') }}">

                       <div class="item form-group col-md-12" style="text-align: right;">
                           <b>Bienvenido a Contabilidad</b>
                       </div>

                       <div class="col-md-6 col-md-offset-6" style="border: 1px solid; margin-top: 40px; background-color: #f2f2f2">

                        <div class="form-group{{ Session::get('loginrfcerr') ? ' has-error' : '' }}" >
                           <div class="col-md-8 col-md-offset-2 input-group" style="margin-top: 20px">
                                <div class="item input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="login_cta" name="login_cta" type="text" class="rfc form-control" value="{{ old('login_cta') }}" required placeholder="Número de cuenta" title="Número de cuenta" style="height: 30" />
                                </div>

                               @if (Session::has('login_cta'))
                                    <span class="help-block">
                                        <strong>{{ Session::pull('login_cta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ Session::get('loginrfcerr') ? ' has-error' : '' }}" >
                           <div class="col-md-8 col-md-offset-2 input-group">
                                <div class="item input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input id="login_rfc" name="login_rfc" type="text" class="rfc form-control" value="{{ old('login_rfc') }}" required placeholder="RFC" title="RFC" style="height: 30" />
                                </div>

                               @if (Session::has('loginrfcerr'))
                                    <span class="help-block">
                                        <strong>{{ Session::pull('loginrfcerr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-md-offset-2 input-group">

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico" title="Correo electrónico" style="height: 30">
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class=" form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-md-offset-2 input-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña" title="Contraseña" style="height: 30">
                                </div>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-2 col-md-offset-5 input-group">
                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #5c154d; width: 100%; ">
                                    Entrar
                                </button>

                            </div>

                            <div class="col-md-4 col-md-offset-3">
                               <!--  <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 13px; color: black">
                                    Olvidó su contraseña?
                                </a> -->
                            </div>
                        </div>

                       </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="align-content: center;">
         <a href="/" class="site_title"><img src="{{asset('logo_advans.png')}}" alt="Advans" style="display: block; margin-top: 45%; margin-left: auto; margin-right: auto; "><b></b></a>
    </div>
</div>
@endsection