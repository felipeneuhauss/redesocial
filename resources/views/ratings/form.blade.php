@extends('layouts.layout')
@section('content')
 <!-- Page Title
        ============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark" style="height:127px ; background: url('/images/site/supplier.jpg'); padding: 35px 0px;" data-stellar-background-ratio="0.3">

    <div class="container clearfix">
        <h1>Avaliação empresarial</h1>
        <span>{{$supplier->fantasy_name}}</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Avaliação</li>
        </ol>
    </div>

</section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h4>Você está avaliando:</h4>
                    <p>Avalie uma empresa que você conhece e ajude outras pessoas a realizarem o sonho de uma festa perfeita.</p>
                </div>
                <div class="col-md-2">
                     <img src="<?php echo $supplier->brand_image != "" ?
                            '/uploads/brands/'.$supplier->brand_image : 'http://placehold.it/100x100';?>" alt="..." class="">
                </div>
                <div class="col-md-8">
                    <h3>{{$supplier->fantasy_name}}</h3>
                    <?php echo generate_stars(5, $supplier->grade, $supplier->rating_quantity) . '<br />'; ?>
                    <i class="icon-map-marker" style="color:#EAAF22;"></i> {{$supplier->city}}, {{$supplier->state}}
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    @include('layouts.messages', array('errors' => $errors,
                              'messages' => Session::get('messages')))
                    {!! Form::open(array('id'=>'rating-form', 'class' => 'rating-form', 'url'=>'/ratings/form','method'=>'POST', 'files'=>true)) !!}
                        <div class="form-group">
                             {!! Form::label('grade', 'Dê sua nota geral') !!}
                             <?php echo generate_rating_stars('grade', 5, true, $vo->grade); ?>
                        </div>
                        <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('title', 'Dê um título a sua avaliação') !!}
                             </div>
                             {!! Form::text('title', $vo->title, ['placeholder' => 'Título da avaliação', 'class'=>'form-control required']); !!}
                        </div>
                        <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('description', 'Descreva sua avaliação') !!}
                             </div>
                             {!! Form::textarea('description', $vo->description, ['placeholder' => 'Descreva como a empresa prestou o serviço. Diga porque você gostou ou não do serviço. Use até 150 caracteres.', 'class'=>'form-control required', 'length' => '150', 'rows' => 4 ]); !!}
                             <span></span>
                        </div>
                        <hr />
                         <div class="form-group">
                           <div class="label-container">
                           {!! Form::label('category_id', 'Categoria do serviço') !!}
                           </div>
                          {!! Form::select('category_id', $categories, $vo->category_id, ['placeholder' => 'Selecione...', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                            <div class="label-container">
                           {!! Form::label('sub_category_id', 'Subcategoria do serviço') !!}
                           </div>
                            {!! Form::select('sub_category_id', $subCategories, $vo->sub_category_id, ['placeholder' => 'Selecione...', 'class'=>'form-control']); !!}
                          </div>
                        <hr />
                        <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('you_were', 'Você foi') !!}
                             </div>
                             {!! Form::radio('you_were', 'contratante', $vo->you_were == 'contratante' ? true : false); !!} Contratante
                             {!! Form::radio('you_were', 'convidado', $vo->you_were == 'convidado' ? true : false); !!} Convidado
                             <span></span>
                         </div>
                        <hr />
                        <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('happened_at', 'O evento aconteceu quando?') !!}
                             </div>
                             {!! Form::text('happened_at', $vo->happened_at, ['class'=>'form-control datepicker']); !!}
                        </div>
                        <hr />
                        <div class="form-group">
                            <div class="col-md-6">
                                 {!! Form::label('service_quality_grade', 'Qualidade do serviço') !!}
                                 <?php echo generate_rating_stars('service_quality_grade', 5, false, $vo->service_quality_grade); ?>
                            </div>
                            <div class="col-md-6">
                                 {!! Form::label('cost_benefit_grade', 'Custo benefício') !!}
                                 <?php echo generate_rating_stars('cost_benefit_grade', 5, false, $vo->cost_benefit_grade); ?>
                             </div>
                             <div class="col-md-6">
                                 {!! Form::label('contract_compliance_grade', 'Cumprimento do contrato') !!}
                                 <?php echo generate_rating_stars('contract_compliance_grade', 5, false, $vo->contract_compliance_grade); ?>
                             </div>
                             <div class="col-md-6">
                                 {!! Form::label('treatment_grade', 'Atendimento') !!}
                                 <?php echo generate_rating_stars('treatment_grade', 5, false, $vo->treatment_grade); ?>
                             </div>
                        </div>
                         <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('tips', 'Dê uma dica para ajudar outras pessoas a usarem o melhor dessa empresa') !!}
                             </div>
                             {!! Form::textarea('tips', $vo->tips, ['placeholder' => '', 'class'=>'form-control', 'length' => '150', 'rows' => 4 ]); !!}
                             <span></span>
                        </div>
                        <div class="form-group">
                           <div class="label-container">
                           {!! Form::label('indicate', 'Você indicaria essa empresa?') !!}
                           </div>
                          {!! Form::select('indicate', [1 => 'Sim', 0 => 'Não'] , $vo->indicate, ['placeholder' => 'Selecione...', 'class'=>'form-control']); !!}
                        </div>
                        <div class="form-group">
                           <div class="label-container">
                           {!! Form::label('return_contact', 'A empresa '.  $supplier->fantasy_name . ' poderá entrar em contato com você?') !!}
                           </div>
                          {!! Form::select('return_contact', [1 => 'Sim', 0 => 'Não'] , $vo->return_contact, ['placeholder' => 'Selecione...', 'class'=>'form-control']); !!}<br />
                          E-mail para contato: {{Auth::user()->email}}

                        </div>
                        <hr />
                         <div class="form-group">
                             <div class="label-container">
                             {!! Form::label('phone', 'Telefone para contato?') !!}
                             </div>
                             {!! Form::text('phone', $vo->phone, ['class'=>'form-control phone']); !!}
                        </div>
                        <hr />
                         <div class="checkbox">
                              <label>
                                <input type="checkbox" name="term_read" value="1" class="required">
                                Certifico que essa avaliação é minha opinião sincera e baseada em minha própria experiência com essa empresa e que não possuo nenhuma relação pessoal ou comercial com esta, não tendo recebido incentivo ou pagamento algum do fornecedor para escrevê-la. Compreendo que o Up Evento possui tolerância zero em relação a avaliações falsas. Queremos ter certeza de que todos os colaboradores não sejam afiliados ao estabelecimento a ser avaliado. Ao marcar esta caixa de seleção, você está garantindo que não é funcionário do estabelecimento e que não possui parentesco com nenhum funcionário da empresa, não tendo, portanto, um relacionamento pessoal ou comercial com os proprietários/gerentes deste estabelecimento que possa influenciar sua avaliação. Além de ser uma violação de nossos termos de serviço e uma prática antiética, avaliações fraudulentas também podem resultar em penalidades civis e criminais.
                              </label>
                        </div>
                        <hr />
                        <div class="row">
                            {!! Form::hidden('id', $vo->id) !!}
                            {!! Form::hidden('supplier_id', $supplier->id) !!}
                            <button type="submit" class="btn btn-primary col-md-12">
                                Enviar minha avaliação
                            </button>
                        </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget clearfix">
                            <h4>Regras para que sua avaliaçãos seja publicada</h4>
                            <hr />
                            <h4>O que fazer?</h4>
                            <div id="post-list-footer">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img src="#" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">NYC Restaurant Week</a></h4>
                                            <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>17th Dec 2015</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Kids Food Fest</a></h4>
                                            <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>8th June 2015</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img src="http://placehold.it/100x100" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Taste of the Old World</a></h4>
                                            <p class="nobottommargin">Lorem ipsum dolor sit amet consectetur adipis...</p>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>22nd Sept 2015</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->
<script type="text/javascript">
$(document).ready(function(){
     $('#rating-form').validate();
     maxLengthTextAreaControl('#description, #tips');
     getOptionsViaAjax('#category_id' , '#sub_category_id' , '/categories/export-pairs/category_id/');
 });
</script>
@stop
