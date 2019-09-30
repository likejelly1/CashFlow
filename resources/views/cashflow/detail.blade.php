
<div class="row">
    @foreach($outflow as $of)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h4> Rp {{number_format($of->cost)}}</h4>
                <div class="card-header-action">

                    <form action="{{route('cashflow.destroyOut', $of->id)}}" method="post">
                        <button class="btn btn-primary" style="pointer-events: none;">{{Carbon\Carbon::parse($of->execution_date)->format('M-Y-d')}}</button>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-icon delete btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>