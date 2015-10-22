@extends('layouts.layout')
@section('content')
<?php //dump($data);exit; ?>
<div class="container">
    <h3>Listagem das categorias</h3>
    <hr />
  <?php
  if (old('name')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> A categoria {{old('name')}} foi adicionado.
       </div>
    <?php endif ?>
    <div class="row">
      <div class="col-lg-9">
         <a href="/categories/form" class="btn btn-info right">Nova categoria</a>
      </div>
      <div class="col-lg-3">
        <div class="input-group">
         <form action="/categories/?page=<?php echo $data->currentPage(); ?>" method="get" class="form-inline">
              <input type="text" class="form-control" name="search" id="table-search"
               placeholder="Pesquisar..." value="<?php echo $search;?>">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Pesquisar</button>
              </span>
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
                        <th>Nome</th>
                        <th>Remover</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                  <tbody>
                <?php foreach ($data as $vo): ?> <tr>
                    <td class="center">
                    <img src="<?php echo $vo->image != "" ?
                                 '/uploads/categories/'.$vo->image : 'http://placehold.it/50x50';?>" alt="..." height="50px" class="img-thumbnail" style="height: 50px;">
                    </td>
                    <td><?= $vo->name ?></td>
                    <td><a href="/categories/remove/<?= $vo->id; ?>">
                              <span class="icon-trash delete"></span>
                            </a></td>
                    <td><a href="/categories/form/<?= $vo->id; ?>">
                              <span class="icon-edit"></span>
                            </a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
    </table>
    <div class="row center">
        {!! $data->render() !!}
    </div>
</div>
@stop
