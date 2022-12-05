@include('layout') <br>

@if (session('success'))
<div class="container">
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
</div>
@endif

<table id="cart" class="table table-striped table-hover">
    <thead>
        <tr>
            <th style="width:20%">order_id</th>
            <th style="width:30%">order_items</th>
            <th style="width:20%">status</th>
            <th style="width:25%">Subtotal</th>
            <th style="width:10%">payment_status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->order_number}}</td>

            @php 
            $items = \App\Models\OrderItem::where('order_id', $order->id)->get();
            $pname2 = [];
            
            foreach($items as $item){
                $item_id = $item->product_id; 
                $product_name = \App\Models\Product::find($item_id);
                $pname2[] = $product_name->name;

            }
            
            $pname = implode(',', $pname2);
            @endphp

            <td>{{$pname}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->payment_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>