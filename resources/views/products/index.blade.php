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
    <?php foreach ($data as $p): ?> <tr>
    <td><?= $p->nome ?></td>
    <td><?= $p->description ?></td>
    <td><a href="/products/detail/<?= $p->id; ?>">
          <span class="glyphicon glyphicon-search"></span>
        </a>
    </td>
    <td><a href="/products/remove/<?= $p->id; ?>">
              <span class="glyphicon glyphicon-trash"></span>
            </a></td>
    <td><a href="/products/form/<?= $p->id; ?>">
              <span class="glyphicon glyphicon-edit"></span>
            </a></td>
    </tr>
    <?php endforeach ?>
</table>
@stop
