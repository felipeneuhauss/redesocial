@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Novo produto ou serviço</h1>
        <span></span>
    </div>
</section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
        {!! Form::open(array('id'=>'product-form', 'url'=>'/products/form','method'=>'POST', 'files'=>true)) !!}
              @include('layouts.messages', array('errors' => $errors,
              'messages' => Session::get('messages')))
              <div class="col-md-6">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    {!! Form::label('supplier_id', 'Selecione a empresa que oferece o produto ou serviço') !!}
                    {!! Form::select('supplier_id', $suppliers, $vo->supplier_id, ['placeholder' => 'Selecione...', 'class'=>'form-control required']); !!}
                  </div>
                  <div class="form-group">
                      {!! Form::label('categories', 'Selecione as categorias do seu produto ou serviço') !!}
                      <table class="table table-bordered">
                        <tbody>
                            @foreach($categories as $categoryGroup)
                              <tr>
                                @foreach($categoryGroup as $categoryId => $categoryName)
                                  <td>{!! Form::checkbox('categories[]', $categoryId, $vo->categories->contains($categoryId)) !!} {{$categoryName}}</td>
                                @endforeach
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div class="form-group">
                      {!! Form::label('description', 'Descrição do produto ou serviço') !!}
                      {!! Form::textarea('description', $vo->description, ['placeholder' => 'Descrição', 'class'=>'form-control required']); !!}
                  </div>
                    <div class="col-md-12">
                        <div class="form-group">
                         {!! Form::label('galleries[]', 'Imagens do produto ou serviço') !!}
                         {!! Form::file('galleries[]', ['placeholder' => 'Galleria',
                         'class'=>'', 'multiple' => 'multiple', 'accept' => 'png|jpe?g']) !!}
                        </div>
                        <div class="form-group">
                            <?php
                             foreach($vo->galleries as $gallery) { ?>
                            <div class="col-md-2">
                                <img src="<?php echo $gallery->name != "" ?
                                    '/uploads/products/'.md5($vo->id).'/'.$gallery->name : 'http://placehold.it/50x50';?>" alt="..." class="img-thumbnail">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
              </div>
            <hr />
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::hidden('id', $vo->id) !!}
                    <a href="/products"
                                class="btn btn-primary btn-info confirm" >Voltar para a lista</a>
                    <button type="submit" class="btn btn-primary">
                        Concluir
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>

</section>
<script type="text/javascript">
//wizard with options and events
$("#product-form").validate();

</script>
@endsection
