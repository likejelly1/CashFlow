@foreach($product_carts as $res)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{ $res->product->name }}</td>
    <td>{{ $res->qty }}</td>
    <td><a href="#">null</a></td>
    <td>{{ $res->product->price }}</td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
    <td><a href="#">null</a></td>
</tr>
@endforeach