@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Cadastre-se</h1>
        <span></span>
    </div>
</section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
            @include('layouts.messages', array('errors' => $errors))
            <form id="register-form" role="form" method="POST" action="/auth/register">
                <div class="col-md-6">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control required" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control required email"
                            name="email" value="{{ old('email') }}"
                            {{--remote="<?php echo url().'/auth/check-authenticity-email/';?>" --}} />
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control required" name="password" id="password">
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmar senha') !!}
                            <input type="password" class="form-control required equalTo"
                            equalTo="#password" name="password_confirmation" >
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Sexo') !!}
                            {!! Form::select('gender', $genders, old('gender'), ['placeholder' => 'Selecione...', 'class'=>'form-control required']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('birthday', 'Data de nascimento') !!}
                            {!! Form::text('birthday', old('birthday') , ['placeholder' => 'Data de nascimento', 'class'=>'form-control required datepicker']); !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Telefone') !!}
                            {!! Form::text('phone', old('phone'), ['placeholder' => 'Número de telefone', 'class'=>'form-control required phone']); !!}
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group foreign">
                        {!! Form::label('country', 'País') !!}
                        {!! Form::select('country', $countries, old('country'), ['placeholder' => 'Selecione...', 'class'=>'form-control required']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('zip_code', 'CEP') !!}
                        {!! Form::text('zip_code', old('zip_code'), ['placeholder' => 'CEP', 'class'=>'form-control required cep zip_code']); !!}
                    </div>
                    <div class="form-group">
                       {!! Form::label('state', 'Estado') !!}
                       {!! Form::text('state', old('state'), ['placeholder' => 'Estado', 'class'=>'form-control required']); !!}
                    </div>
                    <div class="form-group">
                       {!! Form::label('city', 'Cidade') !!}
                       {!! Form::text('city', old('city'), ['placeholder' => 'Cidade', 'class'=>'form-control required']); !!}
                    </div>
                    <div class="form-group">
                       {!! Form::label('district', 'Bairro') !!}
                       {!! Form::text('district', old('district'), ['placeholder' => 'Bairro', 'class'=>'form-control required']); !!}
                    </div>
                    <div class="form-group">
                       {!! Form::label('address', 'Endereço') !!}
                       {!! Form::text('address', old('address'), ['placeholder' => 'Endereço', 'class'=>'form-control required']); !!}
                    </div>

                    <div class="form-group">
                       {!! Form::label('number', 'Número') !!}
                       {!! Form::text('number', old('number'), ['placeholder' => 'Número', 'class'=>'form-control required']); !!}
                    </div>
                    <div class="form-group">
                       {!! Form::label('complement', 'Complemento') !!}
                       {!! Form::text('complement', old('complement'), ['placeholder' => 'Complemento', 'class'=>'form-control']); !!}
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="term_read" value="1" class="required"> Aceito os termos de uso da UP Evento
                        </label>
                    </div>
                    <div class="checkbox">
                          <label>
                            <input type="checkbox" name="newsletter" value="1"> Quero receber e-mails de informações e ofertas
                          </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Cadastrar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
$("#register-form").validate({
    messages: {
        email:{
            required: 'Campo obrigatório.',
            remote: 'O e-mail informado já está sendo usado no sistema. <br />Por favor, informe outro e-mail.',
            email:'Informe um e-mail válido.'
        }
    }
});

</script>
@endsection
