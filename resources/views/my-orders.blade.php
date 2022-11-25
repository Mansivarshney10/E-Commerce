@include('layout') <br>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:30%">order_id</th>
            <th style="width:20%">order_items</th>
            <th style="width:20%">status</th>
            <th style="width:25%">Subtotal</th>
            <th style="width:10%">payment_status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            {{-- @dd($order); --}}
            <td>{{$order->order_number}}</td>

            @php 
            $items = \App\Models\OrderItem::where('order_id', $order->id)->get();
            // $product_name = [];
            $pname2 = [];
            // dd($items);
            
            foreach($items as $item){
                $item_id = $item->product_id; 
                $product_name = \App\Models\Product::find($item_id);
                $pname2[] = $product_name->name;

            }
            // dd($product_name);
            $pname = implode(',', $pname2);
            @endphp

            <td>{{$pname}}</td>
            <td>{{$order->item_count}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->payment_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>