<nav class="navbar navbar-default" style="margin : 0 !important; ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" style="height: 25px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/about') }}">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<li><a href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge">{{ Cart::count() }}</span></a></li>
      @if (Auth::check())
        <li><a>{{ Auth::user()->nama }}</a></li>
        <li><a href="{{ url('/logout') }}">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
      @else
        <li><a href="{{ url('/signup') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{ url('/signin') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
      </ul>
  </div>
</nav>