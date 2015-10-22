@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 35px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Recuperar senha</h1>
        <span>Informe seu email para que possamos te mandar as orientações para você recuperar sua senha</span>
    </div>
</section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
            @include('layouts.messages', array('errors' => $errors,'messages' => Session::get('messages')))
            <div class="login-panel">

                <form class="form-horizontal form-validate" role="form" method="POST" action="/password/email">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Endereço de E-mail</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control required email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Receber link para atualizar a senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
