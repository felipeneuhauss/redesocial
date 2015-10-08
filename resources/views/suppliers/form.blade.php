@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <h3>Cadastro de fornecedor</h3>
        {!! Form::open(array('id'=>'supplier-form', 'url'=>'/suppliers/form','method'=>'POST', 'files'=>true)) !!}
        <div id="rootwizard">
        	<ul>
        	  	<li><a href="#tab1" data-toggle="tab"><span class="label">1º</span> Passo</a></li>
        		<li><a href="#tab2" data-toggle="tab"><span class="label">2º</span> Passo</a></li>
        	</ul>
        	<hr />
        	<div class="tab-content">
        	    <div class="tab-pane" id="tab1">
        	      <div class="row">

                      @include('layouts.messages', array('errors' => $errors))
                      <div class="col-md-6">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <div class="form-group">
                              {!! Form::label('fantasy_name', 'Nome fantasia') !!}
                              {!! Form::text('fantasy_name', $vo->fantasy_name, ['placeholder' => 'Nome fantasia', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('social_name', 'Razão social') !!}
                              {!! Form::text('social_name', $vo->social_name, ['placeholder' => 'Nome fantasia', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('cnpj', 'CNPJ') !!}
                              {!! Form::text('cnpj', $vo->cnpj, ['placeholder' => 'Número do CNPJ', 'class'=>'form-control required cnpj']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('email', 'E-mail da empresa') !!}
                              {!! Form::text('email', $vo->email, ['placeholder' => 'E-mail da empresa', 'class'=>'form-control required email']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('representative_name', 'Representante legal') !!}
                              {!! Form::text('representative_name', $vo->representative_name, ['placeholder' => 'Nome do representante', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('representative_cpf', 'CPF Representante legal') !!}
                              {!! Form::text('representative_cpf', $vo->representative_cpf, ['placeholder' => 'CPF do representante', 'class'=>'form-control required cpf']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('representative_phone', 'Telefone do representante legal') !!}
                              {!! Form::text('representative_phone', $vo->representative_phone, ['placeholder' => 'Telefone do representante', 'class'=>'form-control required phone']); !!}
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group foreign">
                              {!! Form::label('country', 'País') !!}
                              {!! Form::select('country', $countries, $vo->country, ['placeholder' => 'Selecione...', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('zip_code', 'CEP') !!}
                              {!! Form::text('zip_code', $vo->zip_code, ['placeholder' => 'CEP', 'class'=>'form-control required cep zip_code']); !!}
                          </div>
                          <div class="form-group">
                             {!! Form::label('state', 'Estado') !!}
                             {!! Form::text('state', $vo->state, ['placeholder' => 'Estado', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                             {!! Form::label('city', 'Cidade') !!}
                             {!! Form::text('city', $vo->city, ['placeholder' => 'Cidade', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                             {!! Form::label('district', 'Bairro') !!}
                             {!! Form::text('district', $vo->district, ['placeholder' => 'Bairro', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                             {!! Form::label('address', 'Endereço') !!}
                             {!! Form::text('address', $vo->address, ['placeholder' => 'Endereço', 'class'=>'form-control required']); !!}
                          </div>

                          <div class="form-group">
                             {!! Form::label('number', 'Número') !!}
                             {!! Form::text('number', $vo->number, ['placeholder' => 'Número', 'class'=>'form-control required']); !!}
                          </div>
                          <div class="form-group">
                             {!! Form::label('complement', 'Complemento') !!}
                             {!! Form::text('complement', $vo->complement, ['placeholder' => 'Complemento', 'class'=>'form-control']); !!}
                          </div>

                      </div>
                      <div class="col-md-12">
                          <div class="checkbox">
                              <label>
                             {!!  Form::checkbox('term_read', '1', $vo->term_read); !!} Aceito os termos de uso da UP Evento
                              </label>
                          </div>
                      </div>
                  	</div>
        	    </div>
        	    <div class="tab-pane" id="tab2">
        	        <div class="col-md-6">
                        <div class="form-group">
                         {!! Form::label('brand_image', 'Marca da empresa') !!}
                         {!! Form::file('brand_image'); !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('link', 'Link personalizado') !!}
                         http://www.upevento.com.br/{!! Form::text('link', $vo->link, ['placeholder' => 'Link', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('phone_one', 'Telefone principal') !!}
                          {!! Form::text('phone_one', $vo->phone_one, ['placeholder' => 'Telefone principal', 'class'=>'form-control required phone']); !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('phone_two', 'Telefone secundário') !!}
                          {!! Form::text('phone_two', $vo->phone_two, ['placeholder' => 'Telefone secundário', 'class'=>'form-control phone']); !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('site', 'Site da empresa') !!}
                         {!! Form::text('link', $vo->site, ['placeholder' => 'Site', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('facebook', 'Facebook') !!}
                         {!! Form::text('facebook', $vo->facebook, ['placeholder' => 'Facebook', 'class'=>'form-control']); !!}
                        </div>
                    </div>
        	        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('preview', 'Pré-visualização da marca da empresa') !!}<br />
                            <img src="<?php echo $vo->brand_image != "" ?
                            '/uploads/brands/'.$vo->brand_image : 'http://placehold.it/100x100';?>" alt="..." class="img-thumbnail">
                        </div>
                        <div class="form-group">
                         {!! Form::label('instagram', 'Instagram') !!}
                         {!! Form::text('instagram', $vo->instagram, ['placeholder' => 'Instagram', 'class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('twitter', 'Twitter') !!}
                         {!! Form::text('twitter', $vo->twitter, ['placeholder' => 'twitter', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('youtube', 'Youtube') !!}
                         {!! Form::text('youtube', $vo->youtube, ['placeholder' => 'Youtube', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('linkedin', 'Linkedin') !!}
                         {!! Form::text('linkedin', $vo->linkedin, ['placeholder' => 'Linkedin', 'class'=>'form-control']); !!}
                        </div>
        	        </div>
        	        <div class="col-md-12">
        	            <div class="form-group">
                         {!! Form::label('galleries[]', 'Imagens da empresa') !!}
                         {!! Form::file('galleries[]', ['placeholder' => 'Galleria',
                         'class'=>'', 'multiple' => 'multiple', 'accept' => 'png|jpe?g' ]) !!}
                        </div>
        	            <div class="form-group">
        	                <?php
        	                 foreach($vo->galleries as $gallery) { ?>
                                <div class="col-md-2">
                                    <img src="<?php echo $gallery->name != "" ?
                                        '/uploads/galleries/'.md5($vo->id).'/'.$gallery->name : 'http://placehold.it/50x50';?>" alt="..." class="img-thumbnail">
                                </div>
        	                <?php } ?>
                        </div>
                    </div>
        	        <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::hidden('id', $vo->id) !!}
                            <button type="submit" class="btn btn-primary">
                                Concluir
                            </button>
                        </div>
                    </div>
        	    </div>
        		<ul class="pager wizard">
        			<li class="previous first" style="display:none;"><a href="#" class="btn">Voltar</a></li>
        			<li class="previous"><a href="#" class="btn btn">Voltar</a></li>
        			<li class="next last" style="display:none;"><a href="#" class="btn">Próximo</a></li>
        		  	<li class="next"><a href="#" class="btn">Próximo</a></li>
        		</ul>
        	</div>
        </div>
        {!! Form::close() !!}
    </div>

</div>
<link rel="stylesheet" href="/js/plugins/wizard/custom.css" type="text/css" />
<script src="/js/plugins/wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
//wizard with options and events
$("#supplier-form").validate({
    messages: {
        email:{
            required: 'Campo obrigatório.',
            remote: 'O e-mail informado já está sendo usado no sistema. <br />Por favor, informe outro e-mail.',
            email:'Informe um e-mail válido.'
        }
    }
});

$(document).ready(function() {
    $('#rootwizard').bootstrapWizard({
        tabClass: 'nav nav-pills',
        onNext: function(tab, navigation, index) {
            return $("#supplier-form").valid() ? true : false;
        }
  });
});

</script>
@endsection
