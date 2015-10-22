@extends('layouts.layout')

@section('content')
<div class="content">
   <h1>Detalhe aeroporto</h1>
   @include('layouts.messages', array('errors' => $errors))
   <form action="/airports/form/{{$vo->id}}" method="post" class="form-validate">
     <div class="form-group">
       <label><strong>Valor</strong></label>
       <p>
       {{$vo->value}}
       </p>
     </div>
     <div class="form-group">
        <label><strong>Nome</strong></label>
        <p>
            {{$vo->name}}
        </p>
      </div>
      <a class="btn-default btn" href="/airports">Voltar</a>
   </form>
</div>
@stop
