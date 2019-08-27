@foreach($products as $p)
<tr>
    <td>{{$p->code}}</td>
    <td>{{$p->name}}</td>
    <td>{{$cat = App\Category::where('id', $p->categories_id)->first()->name}}</td>
    <td>Rp {{number_format($p->price)}}</td>
    <td>
        <a id="editProduct" data-id="{{$p->id}}" href="#" class="btn btn-icon edit btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit">
            <i class="far fa-edit"></i>
        </a>
        <button onclick="document.getElementById('destroyForm{{$p->id}}').submit()" id="deleteProduct" data-id="{{$p->id}}" class="btn btn-icon delete btn-sm btn-danger">
            <i class="far fa-trash-alt"></i>
        </button>
        <form id="destroyForm{{$p->id}}" style="display: none;" action="{{route('product.destroy', ['id'=> $p->id])}}" method="POST">
            @method('DELETE')
            @csrf
        </form>

    </td>
</tr>
@endforeach