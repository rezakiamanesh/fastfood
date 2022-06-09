<div>
    <div class="table-responsive checkout-content default">
        <table class="table">
            <tbody>
            @foreach($basket as $id => $item)
                @if(is_array($item))
                    <tr class="checkout-item">
                        <td>
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                        </td>
                        <td>
                            <h3 class="checkout-title">
                                {{ $item['name'] }}
                            </h3>
                        </td>
                        <td>{{ $item['quantity'] }} عدد</td>
                        <td>
                            {{ number_format($item['price']) }}
                        </td>
                        <td class="text-center">
                            <button type="button" class="dk-btn-basket dk-btn-danger"
                                    wire:click="removeCart('{{$id}}')">x
                            </button>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
