@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Entre em contato</h1>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Contato</li>
        </ol>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">

            <div class="section content-wrap notopmargin nobottommargin bgcolor-grey-light">

                <div class="container clearfix">

                    <!-- Postcontent
                    ============================================= -->
                    <div class="postcontent nobottommargin">

                        <h3>Fale conosco</h3>

                        <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                        {!! Form::open(array('id'=>'template-contactform', 'class' => 'nobottommargin', 'url'=>'/send-contact-mail', 'method'=>'POST', 'files'=>true)) !!}
                        {{--<form class="nobottommargin" id="template-contactform" name="template-contactform" action="/contact" method="post">--}}

                            <div class="form-process"></div>

                            <div class="col_one_third">
                                {!! Form::label('name', 'Nome') !!}
                                {!! Form::text('name', old('name'), ['placeholder' => 'Nome', 'class'=>'form-control required']); !!}
                            </div>

                            <div class="col_one_third">
                                {!! Form::label('email', 'E-mail') !!}
                                {!! Form::text('email', old('email'), ['placeholder' => 'E-mail', 'class'=>'form-control email required']); !!}
                            </div>

                            <div class="col_one_third col_last">
                                {!! Form::label('phone', 'Telefone') !!}
                                {!! Form::text('phone', old('phone'), ['placeholder' => 'Telefone', 'class'=>'form-control phone']); !!}
                            </div>

                            <div class="clear"></div>

                            <div class="col_two_third">
                                {!! Form::label('subject', 'Assunto') !!}
                                {!! Form::text('subject', old('subject'), ['placeholder' => 'Assunto', 'class'=>'form-control required']); !!}
                            </div>

                            <div class="col_one_third col_last">
                               {!! Form::label('supplier_id', 'Serviço') !!}
                               {!! Form::select('service', array('Dúvidas e Sugestões' => 'Dúvidas e Sugestões',
                               'Denúncia' => 'Denúncia', 'Problemas Técnicos' => 'Problemas Técnicos'),
                               old('service'), ['placeholder' => 'Selecione...', 'class'=>'form-control required']); !!}
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                {!! Form::label('message', 'Mensagem') !!}
                                {!! Form::textarea('message', old('message'), ['placeholder' => 'Mensagem', 'class'=>'form-control required']); !!}
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <button class="btn button nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar mensagem</button>
                            </div>

                        </form>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col_last nobottommargin">

                        <address>
                            <strong>Endereço:</strong><br>
                            QE 24 - Bloco A - Loja 11 - Comércio local<br>
                            Guará II - Brasília-DF, CEP 71060-610<br>
                        </address>
                        <strong>Telefone:</strong> (61) 3226-0214<br>
                        <strong>Email:</strong> contato@upevento.com.br

                        <div class="widget noborder notoppadding">
                        	<a href="#" class="social-icon si-light si-small si-facebook">
                            	<i class="icon-facebook"></i>
                                <i class="icon-facebook"></i></a>
                            <a href="#" class="social-icon si-light si-small si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon si-light si-small si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i></a>
                            <a href="#" class="social-icon si-light si-small si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i></a>
                            <a href="#" class="social-icon si-light si-small si-email3">
                                <i class="icon-email3"></i>
                                <i class="icon-email3"></i></a>
                        </div>

                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->
 <script type="text/javascript">

        jQuery(document).ready(function(){
            jQuery("#template-contactform").validate({
                submitHandler: function(form) {
                    jQuery('.form-process').fadeIn();
                    jQuery(form).ajaxSubmit({
                        target: '#contact-form-result',
                        success: function() {
                            jQuery('.form-process').fadeOut();
                            jQuery('#template-contactform').find('.sm-form-control').val('');
                            jQuery('#contact-form-result').attr('data-notify-msg', jQuery('#contact-form-result').html()).html('');
                            IGNITE.widget.notifications(jQuery('#contact-form-result'));
                        }
                    });
                }
            });
        });

</script>

@stop
