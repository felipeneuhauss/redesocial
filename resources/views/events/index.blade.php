@extends('layouts.layout')
@section('content')
 <section id="page-title" class="page-title-parallax page-title-dark" style="height:127px ; background: #ccc; padding: 40px 0px;" data-stellar-background-ratio="0.3">
    <div class="container clearfix">
        <h1>Minhas empresas</h1>
        {{--<span>{{$vo->fantasy_name}}</span>--}}
    </div>
</section><!-- #page-title end -->
<section class="container">
    <hr />
  <?php
  if (old('fantasy_name')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> O Fornecedor {{old('fantasy_name')}} foi adicionado.
       </div>
    <?php endif ?>
    <div class="row">
      <div class="col-lg-9">
         <a href="/suppliers/form" class="btn btn-info right">Novo fornecedor</a>
         <a href="/products/form" class="btn btn-info right">Novo produto</a>
      </div>
      <div class="col-lg-3">
        <div class="">
         <form action="/suppliers/?page=<?php echo $data->currentPage(); ?>" method="get" class="form-inline">
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
                <th>Dados da empresa</th>
                <th>Produtos</th>
                <th>Remover</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
            @if (count($data))
            <?php foreach ($data as $vo): ?>
             <?php if (Auth::user()->id == $vo->user_id && $vo->deleted_at == "") :?>
                    <tr>
                    <td>
                        <?= $vo->cnpj ?><br />
                        <?= $vo->fantasy_name ?><br />
                        <?= $vo->social_name ?>
                    </td>
                    <td>
                        <table class="table table-striped
                                  table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Imagem</th>
                                  <th>Descrição</th>
                                  <th>Categoria</th>
                                  <th>Sub categoria</th>
                                  <th>Remover</th>
                                  <th>Editar</th>
                                </tr>
                              </thead>
                            <tbody>
                            @if (count($vo->products))
                                @foreach ($vo->products as $product)
                                 @if (Auth::user()->id == $product->user_id && !$product->deleted_at)
                                        <tr>
                                        <td>
                                         <img src="<?php echo count($product->galleries) ?
                                                                             '/uploads/products/'.md5($product->id).'/'.$product->galleries[0]->name : 'http://placehold.it/50x50';?>" alt="..." class="img-thumbnail" style="width:50px;">
                                        </td>
                                        <td>{{ $product->supplier->fantasy_name}}</td>
                                        <td>{{ $product->category ? $product->category->name : '-'}}</td>
                                        <td>{{ $product->subCategory ? $product->subCategory->name : '-'}}</td>
                                        <td><a href="/products/remove/{{$product->id}}">
                                              <span class="icon-trash delete"></span>
                                        </a></td>
                                        <td><a href="/products/form/{{$product->id}}">
                                          <span class="icon-edit"></span>
                                        </a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr><td class="text-center" colspan="6"> Nenhum produto cadastrado para essa empresa</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </td>
                    <td><a href="/suppliers/remove/<?= $vo->id; ?>">
                          <span class="icon-trash delete"></span>
                    </a></td>
                    <td><a href="/suppliers/form/<?= $vo->id; ?>">
                      <span class="icon-edit"></span>
                    </a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach ?>
            @else
                <tr><td class="text-center" colspan="4"> Nenhuma empresa cadastrada. Ainda.</td></tr>
            @endif
        </tbody>
    </table>
    <div class="row center">
        {!! $data->render() !!}
    </div>
</section>
@stop
