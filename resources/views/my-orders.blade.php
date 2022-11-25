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
            {{-- @dd($order);
            <td>{{$order->order_number}}</td>

            @php 
            $items = \App\Models\OrderItem::where('order_id', $order->id)->get();
            @endphp

            @foreach($items as $item)
                <td>{{$item}}</td>
            @endforeach --}}
            
            <td>{{$order->item_count}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->grand_total}}</td>
            <td>{{$order->payment_status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>