@extends('layouts.layout')

@section('content')
<div class="content">
   <h1>Novo produto</h1>
   @include('layouts.messages', array('errors' => $errors))
   <form action="/products/form/{{$vo->id}}" method="post" class="form-validate">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
     <div class="form-group">
       <label>Descricao</label>
       <input name="description" class="form-control required" value="{{$vo->description}}"/>
     </div>
        <input type="hidden" name="id" value="{{$vo->id}}" />
        <button type="submit"
        class="btn btn-primary btn-block">Submit</button>
   </form>
</div>
@stop
