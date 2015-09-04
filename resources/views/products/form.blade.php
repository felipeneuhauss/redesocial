@extends('layouts.layout')

@section('content')
<div class="content">
   <h1>Novo produto</h1>
   <form action="/product/form/{{$product->id}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
     <div class="form-group">
       <label>Nome</label>
       <input name="nome" class="form-control" value="{{$product->nome}}"/>
     </div>
     <div class="form-group">
       <label>Descricao</label>
       <input name="descricao" class="form-control" value="{{$product->descricao}}"/>
     </div>
     <div class="form-group">
       <label>Valor</label>
       <input name="valor" class="form-control" value="{{$product->valor}}"/>
     </div>
     <div class="form-group">
       <label>Quantidade</label>
       <input type="number" name="quantidade" class="form-control" value="{{$product->quantidade}}" />
   </div>
        <input type="hidden" name="id" value="{{$product->id}}" />
        <button type="submit"
        class="btn btn-primary btn-block">Submit</button>
   </form>
</div>
@stop
