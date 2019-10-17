<!DOCTYPE html>
<html>

<head>
    <title>Laporan COGS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 6pt;
        }

        * {
            box-sizing: border-box;
        }

        #title {
            font-size: 8pt;
            text-align: center;
        }

        #author {
            font-size: 8pt;
            text-align: center;
            padding-top: 80px;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            border: 1px solid black;
            width: 30%;
            height: 150px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 100px) {
            .column {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <!-- <img src="img/mib_logo.png" style="max-width:5%"> -->
    <hr style="height:1px;border:none;color:#333;background-color:#333;">
    <h6 style="text-align:center">LAPORAN COGS</h6>
    <hr style="height:1px;border:none;color:#333;background-color:#333;">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Project Name</th>
                <th>Project ID</th>
                <th>Customer Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->code}}</td>
                <td>{{ $project->customer->institution_name}}</td>
            </tr>

        </tbody>
    </table>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>DESCRIPTION</th>
                <th>TOTAL HARGA MODAL SETELAH PPN</th>
                <th>TOTAL HARGA JUAL SETELAH PPN</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i< count($category); $i++) <tr>
                <td>{{$category[$i]->name}} Total</td>
                <td>Rp {{number_format($total_harga_modal[$i])}}</td>
                <td>Rp {{number_format($total_harga_jual[$i])}}</td>
                </tr>
                @endfor
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead class="thead-light">
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
        <tbody>
            @php $i=1 @endphp
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
    </table>

    <!-- <br><br><br><br><br> -->

    <div class="container">

        <div class="row">
            <div class="column">
                <div id="title">Sales</div>
                <hr style="height:1px; border:none; color:#333; background-color:#333;">
                <div id="author"><u>{{ $user->name }}</u></div>
            </div>
            <div class="column">
                <div id="title">Project Manager</div>
                <hr style="height:1px; border:none; color:#333; background-color:#333;">

                <div id="author">---------</div>
            </div>
            <div class="column">
                <div id="title">Finance Controller</div>
                <hr style="height:1px; border:none; color:#333; background-color:#333;">
                @if($user->role_id == 3)
                <div id="author"><u>{{ $user->name }}</u></div>
                @endif
            </div>
            <div class="column">
                <div id="title">Direktur</div>
                <hr style="height:1px; border:none; color:#333; background-color:#333;">
                <div id="author"><u>heii</u></div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>