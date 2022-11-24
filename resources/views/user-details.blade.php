@include('product-layout')

<div class="container">
    <div class="jumbotron">
        <h4>Name: </h4>    <p>{{Auth::user()->name;}}</p>
        <h4>Email: </h4>   <p>{{Auth::user()->email;}}</p>
        <h4>Address: </h4> <p>{{Auth::user()->address;}}</p>
        <h4>Phone: </h4>   <p>{{Auth::user()->phone;}}</p>
    </div>
</div>