@extends('layout.master')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="row">
        <div class="col-lg-8">
            <h3>Tabel Satuan Produk</h3>
        </div>
        <!-- <div class="col-lg-4">
            <button class="btn btn-primary mb-2">Tambah</button>
        </div> -->
    </div>
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="mx-2 my-2 col-lg-4">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah</button>
            </div>
        </div>
        <table id="zero-config" class="table dt-table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Satuan</th>
                    <th class="no-content">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pcs</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pack</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bungkus</td>
                    <td> <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pcs</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pack</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bungkus</td>
                    <td> <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pcs</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pack</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bungkus</td>
                    <td> <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pcs</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Pack</td>
                    <td>
                        <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bungkus</td>
                    <td> <i class="far fa-edit"></i><span class="icon-name"> </span>
                        <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                    </td>
                </tr>
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th></th>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Satuan Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form>
                            <div class="form-group row mb-4">
                                <label for="namabarang" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Satuan</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="namabarang" placeholder="">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection