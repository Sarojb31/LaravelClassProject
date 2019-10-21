@extends('FrontEnd.home')

@section('title')

Login
@endsection



@section('content')



<div class="jumbotron text-xs-center"><center>
  <h1 class="display-3">Pustak<span style="color: green"> Sewa</span></h1>
  <p class="lead"><h5>The production and use of paper has a number of adverse effects on the environment which are known collectively as paper pollution. Pulp mills contribute to air, water and land pollution. Discarded paper is a major component of many landfill sites, accounting for about 35 percent by weight of municipal solid waste (before recycling).</h5><br>
  </p>

<hr>
  <h1 class="display-3">Thank You!</h1>
  <p class="lead">Your<strong> purchase </strong>will be delivered in maximum of <strong> 3 days</strong>.</p>
  <hr>
  <p>
    Having trouble? <a href="{{route('contact')}}">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-success btn-sm" href="{{route('shop')}}" role="button">Continue to shop</a>
  </p>
</center>
</div>
</div>
@endsection
