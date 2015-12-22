@extends('layouts.layout')
@section('content')
<div class="container">
    <h3>Listagem de aeroportos</h3>
    <hr />
  <?php
  if (old('nome')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> O aeroporto {{old('name')}} foi adicionado.
       </div>
    <?php endif ?>
    <div class="row">
      <div class="col-lg-9">
         <a href="/airports/form" class="btn btn-info right">Novo aeroporto</a>
      </div>
      <div class="col-lg-3">
        <div>
         <form action="/airports/?page=<?php echo $data->currentPage(); ?>" method="get" class="form-inline">
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
        <?php foreach ($data as $vo): ?> <tr>
        <td><?= $vo->id ?></td>
        <td><?= $vo->sigla ?></td>
        <td><?= $vo->name ?></td>
        <td><a href="/airports/detail/<?= $vo->id; ?>">
              <span class="icon-search"></span>
            </a>
        </td>
        <td><a href="/airports/remove/<?= $vo->id; ?>">
                  <span class="icon-trash delete"></span>
                </a></td>
        <td><a href="/airports/form/<?= $vo->id; ?>">
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
