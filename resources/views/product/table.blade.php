@foreach($products as $p)
<tr>
    <td>{{$p->code}}</td>
    <td>{{$p->name}}</td>
    <td>{{$cat = App\Category::where('id', $p->categories_id)->first()->name}}</td>
    <td>IDR {{number_format($p->price)}}</td>
    <td>
        <a id="editProduct" data-id="{{$p->id}}" href="#" class="btn btn-icon edit btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit">
            <i class="far fa-edit"></i>
        </a>
        <a id="deleteProduct" data-id="{{$p->id}}" href="#" class="btn btn-icon delete btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
            <i class="far fa-trash-alt"></i>
        </a>
    </td>
</tr>
@endforeach