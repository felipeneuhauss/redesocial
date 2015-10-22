 @if (count($errors) > 0)
 <div class="alert alert-danger">
   <ul class="list-unstyled">
     @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
     @endforeach
</ul> </div>
@endif
@if (isset($messages) && count($messages) > 0)
 <div class="alert alert-success">
   <ul class="list-unstyled">
     @foreach ($messages as $message)
       <li>{{ $message }}</li>
     @endforeach
</ul> </div>
@endif