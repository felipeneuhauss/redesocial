@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Novo evento</h1>
        <span></span>
    </div>
</section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
            {!! Form::open(array('id'=>'event-form', 'url'=>'/events/form','method'=>'POST', 'files'=>true)) !!}
            <div id="rootwizard">
                <ul>
                    <li><a href="#tab1" data-toggle="tab"><span class="label">1º</span> Passo</a></li>
                    <li><a href="#tab2" data-toggle="tab"><span class="label">2º</span> Passo</a></li>
                </ul>
                <hr />
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                      <div class="row">
                          @include('layouts.messages', array('errors' => $errors,
                          'messages' => Session::get('messages')))
                          <div class="col-md-6">
                              <div class="form-group">
                                  {!! Form::label('name', 'Nome do evento') !!}
                                  {!! Form::text('name', $vo->name, ['placeholder' => 'Nome do evento', 'class'=>'form-control required']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('init_at', 'Data de início') !!}
                                  {!! Form::text('init_at', $vo->init_at, ['placeholder' => 'Data de início', 'class'=>'form-control required datepicker']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('end_at', 'Data fim') !!}
                                  {!! Form::text('end_at', $vo->end_at, ['placeholder' => 'Data fim', 'class'=>'form-control required datepicker']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('init_hour', 'Hora de início') !!}
                                  {!! Form::text('init_hour', $vo->init_hour, ['placeholder' => 'Hora de início', 'class'=>'form-control required hour']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('end_hour', 'Hora de termino') !!}
                                  {!! Form::text('end_hour', $vo->end_hour, ['placeholder' => 'Hora de termino', 'class'=>'form-control required hour']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('password', 'Senha para o evento restrito') !!}
                                  {!! Form::text('password', $vo->password, ['placeholder' => 'Senha para o evento restrito', 'class'=>'form-control required']); !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('max_attendees', 'Número máximo de participantes') !!}
                                  {!! Form::text('max_attendees', $vo->max_attendees, ['placeholder' => 'Número máximo de participantes', 'class'=>'form-control required number digits']); !!}
                              </div>
                              <div class="form-group">
                                {!! Form::label('quantity_person_waiting', 'Número máx. de pessoas na fila de espera') !!}
                                {!! Form::text('quantity_person_waiting', $vo->quantity_person_waiting, ['placeholder' => 'Número máx. de pessoas na fila de espera', 'class'=>'form-control required number digits']); !!}
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  {!! Form::label('description', 'Descrição da empresa') !!}
                                  {!! Form::textarea('description', $vo->description, ['placeholder' => 'Descrição', 'class'=>'form-control required']); !!}
                              </div>
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
                                 {!!  Form::checkbox('term_read', '1', $vo->term_read, ['class' => 'required']); !!} Aceito os termos de uso da UP Evento para cadastro de evento
                                  </label>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="col-md-6">
                            <div class="form-group">
                             {!! Form::label('image', 'Imagem do evento') !!}
                             {!! Form::file('image'); !!}
                            </div>
                            <div class="form-group">
                             {!! Form::label('link', 'Link personalizado') !!}
                             @if (!$vo->id)
                                http://www.upevento.com.br/events/
                                {!! Form::text('link', $vo->link, ['placeholder' => 'Link', 'class'=>'form-control required']); !!}
                             @else
                                http://www.upevento.com.br/<strong>{{$vo->link}}</strong>
                             @endif
                            </div>
                            <div class="form-group">
                              {!! Form::label('phone', 'Telefone para contato') !!}
                              {!! Form::text('phone', $vo->phone, ['placeholder' => 'Telefone para contato', 'class'=>'form-control required phone']); !!}
                            </div>
                            <div class="form-group">
                             {!! Form::label('email', 'E-mail para contato') !!}
                             {!! Form::text('email', $vo->email, ['placeholder' => 'E-mail', 'class'=>'form-control email required']); !!}
                            </div>
                            <div class="form-group">
                             {!! Form::label('site', 'Site oficial do evento') !!}
                             {!! Form::text('site', $vo->site, ['placeholder' => 'Site oficial', 'class'=>'form-control']); !!}
                            </div>
                            <div class="form-group">
                             {!! Form::label('facebook', 'Facebook') !!}
                             {!! Form::text('facebook', $vo->facebook, ['placeholder' => 'Facebook', 'class'=>'form-control']); !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             {!! Form::label('search', 'Incluir fornecedores') !!}
                             {!! Form::text('search', null , ['placeholder' => 'Pesquisar fornecedores', 'class'=>'form-control', 'autocomplete' => 'off']) !!}
                            </div>
                            <hr />
                            <div id="suppliers-selected" class="widget clearfix">
                            @if (count($suppliers))
                                @foreach ($suppliers as $supplier)
                                    {!! Form::hidden('suppliers[]', $supplier->id) !!}
                                    <div class="spost clearfix">
                                        <div class="entry-image">
                                            <a href="#" class="nobg">
                                            <img src="{{ $supplier->brand_image != "" ? '/uploads/brands/'.$supplier->brand_image :
                                                'http://placehold.it/100x100' }}" alt="..." width="100px" >
                                            </a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="/suppliers/detail/{{$supplier->id}}">{{$supplier->fantasy_name}}</a></h4>
                                                <p class="nobottommargin">
                                                     <small>
                                                        <?php echo $supplier->categories(true); ?>
                                                     </small>
                                                     <br />
                                                     <?php echo str_limit($supplier->description,100); ?>
                                                     <br />
                                                    <?php echo generate_stars(5, $supplier->grade, $supplier->rating_quantity); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                    </div>
                     <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::hidden('id', $vo->id) !!}
                                <a href="/events"
                                            class="btn btn-primary btn-info confirm" >Voltar para a lista</a>
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
            {!! Form::close() !!}
        </div>
    </div>
</section>
<link rel="stylesheet" href="/js/plugins/wizard/custom.css" type="text/css" />
<script src="/js/plugins/wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/js/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
//wizard with options and events
$("#event-form").validate({
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
            return $("#event-form").valid() ? true : false;
        }
  });
});

var $input = $('#search');
$input.typeahead({
source: function(query, process) {
      $.get(BASE_URL+ '/suppliers/autocomplete/'+query, function(data){
            data = underscore.filter(data, function(supplier) {
                return selectedSuppliersList.indexOf(supplier.id) < 0;
            });

            return process(data);
      });
    }
});

var selectedSuppliersList = [];
$input.change(function() {
    var current = $input.typeahead("getActive");
    if (current) {
        // Some item from your model is active!
        if (current.name == $input.val()) {
            if (selectedSuppliersList.indexOf(current.id) < 0) {
                $('#suppliers-selected').append(
                "<input type='hidden' name='suppliers[]' value='"+current.id+"' />"+
                "<div class='spost clearfix'>"+
                    "<div class='entry-image'>"+
                        "<a href='#' class='nobg'>"+
                        "<img src='/uploads/brands/"+current.brand_image+"' alt='...' width='100px' >"+
                        "</a>"+
                    "</div>"+
                    "<div class='entry-c'>"+
                        "<div class='entry-title'>"+
                            "<h4><a href=''>"+current.name+"</a> <a href='javascript' class='remove-supplier align-right'>Remover</a></h4>"+
                            "<p class='nobottommargin'>"+
                               "  <br />"+
                                current.description
                                +" <br />"+
                                ""+ generateStars(5, current.grade, current.rating_quantity)+ ""+
                            "</p>"+
                        "</div>"+
                    "</div>"+
                "</div>"
                );
                selectedSuppliersList.push(current.id);
            }
        }
    } else {
        // Nothing is active so it is a new value (or maybe empty value)
    }
});
</script>
@endsection
