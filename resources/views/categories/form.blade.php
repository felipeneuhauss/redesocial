@extends('layouts.layout')

@section('content')
<section id="page-title" class="page-title-parallax page-title-dark" style="background-color: #555555; height:127px; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Nova categoria</h1>
        <span>As categorias ajudam os usuários nas pesquisas de produtos e serviços</span>
    </div>
</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap bgcolor-grey-light">
        <div class="container clearfix">
            @include('layouts.messages', array('errors' => $errors,
                                  'messages' => Session::get('messages')))
           <?php if (old('name')): ?>
              <div class="alert alert-success">
                  <strong>Sucesso!</strong> A categoria {{old('name')}} foi adicionado.
              </div>
           <?php endif ?>
           {!! Form::open(array('id'=>'category-form', 'class' => 'form-validate', 'url'=>'/categories/form','method'=>'POST', 'files'=>true)) !!}
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
                {!! Form::label('category_id', 'Categoria pai') !!}
                {!! Form::select('category_id', $categories, $vo->category_id, ['placeholder' => 'Selecione...', 'class'=>'form-control']); !!}
              </div>
             <div class="form-group">
                 {!! Form::label('name', 'Nome') !!}
                 {!! Form::text('name', $vo->name, ['placeholder' => 'Nome', 'class'=>'form-control required']); !!}
              </div>
             <div class="form-group">
               {!! Form::label('image', 'Imagem para representar a categoria') !!}
                {!! Form::file('image'); !!}
             </div>
             <div class="form-group">
                     {!! Form::label('preview', 'Pré-visualização da imagem da categoria') !!}<br />
                     <img src="<?php echo $vo->image != "" ?
                     '/uploads/categories/'.$vo->image : 'http://placehold.it/100x100';?>" alt="..." class="img-thumbnail">
                 </div>
            <input type="hidden" name="id" value="{{$vo->id}}" />
            <a href="/categories"
                    class="btn btn-primary btn-info confirm" >Voltar para a lista</a>
                <button type="submit"
                class="btn btn-primary btn-success">Salvar</button>
           {!! Form::close() !!}
           </div>
    </div>
</section>
@stop
