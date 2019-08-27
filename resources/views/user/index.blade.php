@extends('layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Employees</h1>
        <!-- <div class="section-header-button">
            <button id="createEmloyee" class="btn btn-primary">Add New</button>
        </div> -->
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Items</h4>
                        <div class="card-header-action">
                            <button id="createEmployee" class="btn btn-danger"><i class="fas fa-plus"></i> Add New Account</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table id="itemList" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    @foreach($emp as $p)
                                    <tr>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{ucfirst($p->role->nama_role)}}</td>
                                        <td>
                                            <a id="editEmployee" data-id="{{$p->id}}" href="#" class="btn btn-icon edit btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button onclick="document.getElementById('destroyForm{{$p->id}}').submit();" id="deleteEmployee" data-id="{{$p->id}}" class="btn btn-icon delete btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <form id="destroyForm{{$p->id}}" style="display: none;" action="{{route('user.destroy', ['id'=> $p->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal  -->
<div class="modal fade" id="tambahEmployeeModalLong" tabindex="-1" role="dialog" aria-labelledby="tambahEmployeeModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahEmployeeModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addEmployeeForm" action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="section-title">Employee Name</div>
                        <input required id="name" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="section-title">Mib Email</div>
                        <input required id="email" type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="section-title">Categories</div>
                        <select name="role" class="form-control select2">
                            @foreach($role as $r)
                            <option value="{{$r->id}}">{{ucfirst($r->nama_role)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>First Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input id="password" required type="text" name="password" class="form-control pwstrength" data-indicator="pwindicator">
                        </div>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveButton" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script.js')
<script src="{{asset('stisla\assets\js\page\forms-advanced-forms.js')}}"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load() {
            $.ajax({
                url: "",
                success: function(response) {
                    $('#dataTable').html(response);
                }
            });
        }


        $('#itemList').DataTable();
        // add modal
        $('#createEmployee').click(function(e) {
            $('#saveButton').html("Create Employee");
            $('#addEmployeeForm').trigger("reset");
            $('#tambahEmployeeModalLongTitle').html("Add Employee");
            $('#tambahEmployeeModalLong').modal('show');
        });


        // edit
        $('.edit').click(function(e) {
            e.preventDefault();
            // alert('ini button edit');
            var id = $(this).data('id');
            // console.log(id);
            $.get("/user/" + id + "/edit", function(data) {
                // console.log(data);
                $('#saveButton').html("Update Employee");
                $('#tambahEmployeeModalLongTitle').html("Edit Employee");
                $('#addEmployeeForm').trigger("reset");
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#id').val(data.id);
                // $('#EmployeeCode').val(data.code);
                $('#tambahEmployeeModalLong').modal('show');
            });
        });
        // // delete
        // $('.delete').click(function(e) {
        //     e.preventDefault();
        //     // console.log(1);
        //     var id = $(this).data('id');
        //     // console.log(id);
        //     var c = confirm("Are you sure want to delete?");
        //     if (c) {
        //         $.ajax({
        //             type: "DELETE",
        //             data: {
        //                 "id": id,
        //                 "_token": ""
        //             },
        //             url: "",
        //             success: function(data) {
        //                 if (data.status == "sukses") {
        //                     alert("data berhasil dihapus");
        //                     load();
        //                 } else {
        //                     alert("data gagal dihapus");
        //                 }
        //             }
        //         });

        //     } else {
        //         alert("tidak jadi");
        //     }
        // });

        // save or updata
        // $('#addEmployeeForm').submit(function(e) {
        //     e.preventDefault();
        //     var request = new FormData(this);
        //     console.log(request);
        //     $.ajax({
        //         url: "",
        //         method: "POST",
        //         data: request,
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             if (data.status == "sukses") {
        //                 $('.close').click();
        //                 alert('transaksi e');
        //                 load();
        //             } else {
        //                 alert('data gagal masuk');
        //             }
        //             load();
        //         }
        //     });
        // });


    });
</script>
@endsection