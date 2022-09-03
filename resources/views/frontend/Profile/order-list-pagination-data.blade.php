@foreach ($orders as $order_summaries)

<tr class="order_border">
    <td>#{{$order_summaries->order_number}}</td>
    @if ($order_summaries->created_at->diffForHumans() == '1 week ago')
    <td class="text-center">{{$order_summaries->created_at->format('d/m/Y')}}</td>
    @else
    <td class="text-center">{{$order_summaries->created_at->diffForHumans()}}</td>
    @endif
    <td class="text-center">৳{{$order_summaries->subtotal}}</td>
    @if ($order_summaries->delivery_status == 1)

    <td class="text-center">Pending...</td>
    @elseif ($order_summaries->delivery_status === 2)
    <td class="text-center" On the way</td>
        @else
    <td class="text-center">Deliverd</td>
    @endif
</tr>
@endforeach