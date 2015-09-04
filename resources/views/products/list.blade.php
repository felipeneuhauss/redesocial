@extends('layouts.layout')
@section('content')

<h1>Listagem de produtos</h1>
  <?php if (old('nome')): ?>
       <div class="alert alert-success">
           <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
       </div>
    <?php endif ?>
<table class="table table-striped
              table-bordered table-hover">
    <?php foreach ($produtos as $p): ?> <tr>
    <td><?= $p->nome ?></td>
    <td><?= $p->valor ?></td>
    <td><?= $p->descricao ?></td>
    <td><?= $p->quantidade ?></td>
    <td><a href="/product/detail/<?= $p->id; ?>">
          <span class="glyphicon glyphicon-search"></span>
        </a></td>
    <td><a href="/product/remove/<?= $p->id; ?>">
              <span class="glyphicon glyphicon-trash"></span>
            </a></td>
    <td><a href="/product/form/<?= $p->id; ?>">
              <span class="glyphicon glyphicon-edit"></span>
            </a></td>
    </tr>
    <?php endforeach ?>
</table>
@stop
