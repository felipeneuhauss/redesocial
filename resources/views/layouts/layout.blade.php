<html>
<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/product">Listagem</a></li>
        <li><a href="{{action('ProductController@form')}}">Novo</a></li>
      </ul>
    <div class="content">
        @yield('content')
    </div>
  </div>
</body>
</html>