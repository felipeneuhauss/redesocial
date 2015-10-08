@extends('layouts.layout')
@section('content')
<div class="container">
    <h3>Meus fornecedores</h3>
    <hr />
  <?php
  if (old('nome')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> O Fornecedor {{old('name')}} foi adicionado.
       </div>
    <?php endif ?>
    <div class="row">
      <div class="col-lg-9">
         <a href="/suppliers/form" class="btn btn-info right">Novo fornecedor</a>
      </div>
      <div class="col-lg-3">
        <div class="input-group">
         <form action="/suppliers/?page=<?php echo $data->currentPage(); ?>" method="get" class="form-inline">
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
        <?php foreach ($data as $vo): ?> <tr>
        <td><?= $vo->id ?></td>
        <td><?= $vo->cnpj ?></td>
        <td><?= $vo->fantasy_name ?></td>
        <td><?= $vo->social_name ?></td>
        <td><a href="/suppliers/remove/<?= $vo->id; ?>">
              <span class="icon-trash delete"></span>
        </a></td>
        <td><a href="/suppliers/form/<?= $vo->id; ?>">
          <span class="icon-edit"></span>
        </a></td>
        </tr>
        <?php endforeach ?>
    </table>
    <div class="row center">
        {!! $data->render() !!}
    </div>
</div>
@stop
