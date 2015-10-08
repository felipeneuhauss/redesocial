@extends('layouts.layout')

@section('content')
<div class="container">
   <h1>Novo aeroporto</h1>
   @include('layouts.messages', array('errors' => $errors))
   <form action="/airports/form/{{$vo->id}}" method="post" class="form-validate">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
     <div class="form-group">
       <label>Valor</label>
       <input name="value" class="form-control required" min="3" max="5" value="{{$vo->value}}"/>
     </div>
     <div class="form-group">
        <label>Nome</label>
        <input name="name" class="form-control required" value="{{$vo->name}}"/>
      </div>
        <input type="hidden" name="id" value="{{$vo->id}}" />
        <button type="submit"
        class="btn btn-primary btn-success">Submit</button>
   </form>
</div>
@stop
