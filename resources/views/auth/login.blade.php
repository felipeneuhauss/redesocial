@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Login</h1>
        <span></span>
    </div>
</section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap bgcolor-grey-light">
            <div class="container clearfix">
                @include('layouts.messages', array('errors' => $errors,
                                      'messages' => Session::get('messages')))
                <div class="login-panel">

                    <form class="form-horizontal form-validate" role="form" method="POST" action="/auth/login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Login / Seu e-mail cadastrado</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control required email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control required" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lembrar-me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-warning">Entrar</button>

                                <a class="btn btn-link" href="/password/email">Esqueceu sua senha?</a> |
                                <a class="btn btn-link" href="/auth/register">Não tenho cadastro ainda</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
//wizard with options and events


</script>
@endsection


