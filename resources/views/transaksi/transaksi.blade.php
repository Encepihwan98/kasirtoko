@extends('layout.master')

@section('content')
<style>
    
</style>
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="row">
        <div class="col-lg-8">
            <h3>Transaksi</h3>
        </div>
    </div>
    <div class="widget-content widget-content-area br-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <form action="" class="my-4">
                        <div class="form-group mb-2">
                            <label for="inputAddress">Pilih Produk</label>
                            <select class="form-control  basic">
                                <option selected="selected">orange</option>
                                <option>white</option>
                                <option>purple</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputAddress">Qty</label>
                            <input id="demo3_21" type="text" value="" name="demo3_21">
                        </div>
                        <div class="form-group mb-2">
                            <button class="btn btn-primary mt-3 mb-2">tambah</button> <button class="btn btn-primary mt-3 mb-2">Bayar</button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 my-4 text-end">
                            <h5 class="fs-1 ml-5">Nota: Uxx898Ukljlll </h5>
                        </div>
                        <div class="col-lg-12 col-sm-12 my-4 nota">
                            <h1 class="ml-5"><span class="text-danger">Rp  180.000</span>  </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">

                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Roko Djarum</td>
                                            <td>2 Bungkus</td>
                                            <td>18.000</td>
                                            <td>36.000</td>
                                            <td class=" text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Roko Djarum</td>
                                            <td>2 Bungkus</td>
                                            <td>18.000</td>
                                            <td>36.000</td>
                                            <td class=" text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Roko Djarum</td>
                                            <td>2 Bungkus</td>
                                            <td>18.000</td>
                                            <td>36.000</td>
                                            <td class=" text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Roko Djarum</td>
                                            <td>2 Bungkus</td>
                                            <td>18.000</td>
                                            <td>36.000</td>
                                            <td class=" text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection