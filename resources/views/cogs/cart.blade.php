<thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>DESCRIPTION</th>
        <th>Qty</th>
        <th>Unit</th>
        <th>Price List(Unit)</th>
        <th>Price List(total)</th>
        <th>Disc - Price List(%)</th>
        <th>Gross-Up - Price List(%)</th>
        <th>Capital Price per Unit</th>
        <th>Capital Total Price</th>
        <th>Disc - Selling(%)</th>
        <th>Gross-Up - Selling(%)</th>
        <th>Selling Price per Unit</th>
        <th>Selling Total Price</th>
    </tr>
</thead>
<tbody class="dataTable">
    @foreach($product_carts as $items)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ $items->name }}</td>
        <td><a data-id="{{$items->id}}" class="qty" href="#">{{$items->qty}}</a></td>
        <td>
            @if(empty($items->satuan))
            <a data-id="{{$items->id}}" class="satuan" href="#">Edit</a>
            @endif
            <a data-id="{{$items->id}}" class="satuan" href="#">{{$items->satuan }}</a>
        </td>
        <td>{{number_format($items->price_list_satuan)}}</td>
        <td>{{number_format($items->price_list_total)}}</td>
        <td><a data-id="{{$items->id}}" class="discount_pl" href="#">{{$items->discount_pl}}%</a></td>
        <td><a data-id="{{$items->id}}" class="grossup_pl" href="#">{{$items->grossup_pl}}%</a></td>
        <td>{{number_format($items->harga_satuan_modal)}}</td>
        <td>{{number_format($items->harga_total_modal)}}</td>
        <td><a data-id="{{$items->id}}" class="discount_jual" href="#">{{$items->discount_jual}}%</a></td>
        <td><a data-id="{{$items->id}}" class="grossup_jual" href="#">{{$items->grossup_jual}}%</a></td>
        <td>{{number_format($items->harga_satuan_jual)}}</td>
        <td>{{number_format($items->harga_total_jual)}}</td>
    </tr>
    @endforeach
</tbody>
<script>
    $('.discount_pl').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/cogs/edit/" + id, function(data) {
            $('#productDetailForm').trigger("reset");
            $('#code').val(data.code);
            $('#qty').val(data.qty);
            $('#unit').val(data.satuan);
            $('.product').val(data.product_id);
            $('#pl_disc').val(data.discount_pl);
            $('#pl_gross').val(data.grossup_pl);
            $('#jual_disc').val(data.discount_jual);
            $('#jual_gross').val(data.grossup_jual);;
            $('#qty').prop('readonly', true);
            $('#unit').prop('readonly', true);
            $('#pl_gross').prop('readonly', true);
            $('#jual_gross').prop('readonly', true);
            $('#jual_disc').prop('readonly', true);
            $('#pl_disc').removeAttr('readonly');
            $('#saveProductDetail').html("Update Product");
            $('#addProjectDetailLabel').html("Update Discount Price List");
            $('#ProjectDetailModal').modal('show');
        });
    });
    $('.grossup_pl').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/cogs/edit/" + id, function(data) {
            $('#productDetailForm').trigger("reset");
            $('#code').val(data.code);
            $('#qty').val(data.qty);
            $('#unit').val(data.satuan);
            $('.product').val(data.product_id);
            $('#pl_disc').val(data.discount_pl);
            $('#pl_gross').val(data.grossup_pl);
            $('#jual_disc').val(data.discount_jual);
            $('#jual_gross').val(data.grossup_jual);
            $('#unit').prop('readonly', true);
            $('#qty').prop('readonly', true);
            $('#pl_disc').prop('readonly', true);
            $('#jual_gross').prop('readonly', true);
            $('#jual_disc').prop('readonly', true);
            $('#pl_gross').removeAttr('readonly');
            $('#saveProductDetail').html("Update Product");
            $('#addProjectDetailLabel').html("Update Gross Up Price List");
            $('#ProjectDetailModal').modal('show');
        });
    });
    $('.discount_jual').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/cogs/edit/" + id, function(data) {
            $('#productDetailForm').trigger("reset");
            $('#code').val(data.code);

            $('#qty').val(data.qty);
            $('#unit').val(data.satuan);
            $('.product').val(data.product_id);
            $('#pl_disc').val(data.discount_pl);
            $('#pl_gross').val(data.grossup_pl);
            $('#jual_disc').val(data.discount_jual);
            $('#jual_gross').val(data.grossup_jual);
            $('#unit').prop('readonly', true);
            $('#qty').prop('readonly', true);
            $('#pl_disc').prop('readonly', true);
            $('#pl_gross').prop('readonly', true);
            $('#jual_gross').prop('readonly', true);
            $('#jual_disc').removeAttr('readonly');
            $('#saveProductDetail').html("Update Product");
            $('#addProjectDetailLabel').html("Update Discount Jual");
            $('#ProjectDetailModal').modal('show');
        });
    });
    $('.grossup_jual').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/cogs/edit/" + id, function(data) {
            $('#productDetailForm').trigger("reset");
            $('#code').val(data.code);
            $('#qty').val(data.qty);
            $('#unit').val(data.satuan);
            $('.product').val(data.product_id);
            $('#pl_disc').val(data.discount_pl);
            $('#pl_gross').val(data.grossup_pl);
            $('#jual_disc').val(data.discount_jual);
            $('#jual_gross').val(data.grossup_jual);
            $('#qty').prop('readonly', true);
            $('#unit').prop('readonly', true);
            $('#pl_disc').prop('readonly', true);
            $('#pl_gross').prop('readonly', true);
            $('#jual_disc').prop('readonly', true);
            $('#jual_gross').removeAttr('readonly');
            $('#saveProductDetail').html("Update Product");
            $('#addProjectDetailLabel').html("Update Gross Up Jual");
            $('#ProjectDetailModal').modal('show');
        });
    });
</script>