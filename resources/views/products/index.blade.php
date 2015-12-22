@extends('layouts.layout')
@section('content')
<div class="container">
    <h3>Meus produtos</h3>
    <hr />
  <?php
  if (old('description')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> O produto {{old('description')}} foi adicionado.
       </div>
    <?php endif ?>
    <div class="row">
      <div class="col-lg-9">
         <a href="/products/form" class="btn btn-info right">Novo produto</a>
      </div>
      <div class="col-lg-3">
        <div>
         <form action="/products/?page=<?php echo $data->currentPage(); ?>" method="get" class="form-inline">
              <input type="text" class="form-control" name="search" id="table-search"
               placeholder="Pesquisar..." value="<?php echo $search;?>">
                <button class="btn btn-default" type="submit">Pesquisar</button>
          </form>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <hr />
    <table class="table table-striped
                  table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Imagem</th>
                      <th>Fornecedor</th>
                      <th>Descrição</th>
                      <th>Categoria</th>
                      <th>Sub categoria</th>
                      <th>Remover</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                <tbody>
        @foreach ($data as $vo)
         @if (Auth::user()->id == $vo->user_id && !$vo->deleted_at)
                <tr>
                <td>
                 <img src="<?php echo count($vo->galleries) ?
                                                     '/uploads/products/'.md5($vo->id).'/'.$vo->galleries[0]->name : 'http://placehold.it/50x50';?>" alt="..." class="img-thumbnail" style="width:50px;">
                </td>
                <td>{{ $vo->supplier->fantasy_name}}</td>
                <td>{{ str_limit($vo->description,100) }}</td>
                <td>{{ $vo->category ? $vo->category->name : '-'}}</td>
                <td>{{ $vo->subCategory ? $vo->subCategory->name : '-'}}</td>
                <td><a href="/products/remove/{{$vo->id}}">
                      <span class="icon-trash delete"></span>
                </a></td>
                <td><a href="/products/form/{{$vo->id}}">
                  <span class="icon-edit"></span>
                </a></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <div class="row center">
        {!! $data->render() !!}
    </div>
</div>
@stop
