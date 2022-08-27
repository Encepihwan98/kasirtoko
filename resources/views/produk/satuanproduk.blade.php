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
                <div class="mx-2 my-2 col-md-3 col-lg-3 col-sm-3">
                    <select class="selectpicker" id="input-show">
                        <option value="">Tampilkan</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 my-2 col-sm-6 filtered-list-search ">
                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                        <div class="w-100">
                            <input type="text" class="w-100 form-control product-search br-30" id="input-search"
                                placeholder="Search Attendees...">
                            <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg></button>
                        </div>
                    </form>
                </div>
                <div class="mx-2 my-2 col-md-2 col-lg-2 col-sm-2">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target=".bd-example-modal-xl">Tambah</button>
                </div>
            </div>
            <table id="table-unit" class="table table-bordered table-striped mb-4" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Satuan</th>
                        <th class="no-content">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $unit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$unit->name}}</td>
                        <td>
                            <i class="far fa-edit"></i><span class="icon-name"> </span>
                            <i class="ml-3 far fa-trash-alt"></i><span class="icon-name"> </span>
                        </td>
                    </tr>
                    @endforeach
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
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Satuan Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <form id="form-unit">
                                <div class="form-group row mb-4">
                                    <label for="name"
                                        class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-xl-10 col-lg-9 col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" id="btn-submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let csrf = document.querySelector('meta[name="csrf-token"]').content
        let urlPath = '/satuan-produk'

        function getFormData(elementID) {
            var params = [];
            var form = document.getElementById(elementID)
            for ( var i = 0; i < form.elements.length; i++ ) {
            var e = form.elements[i];
            params.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value));
            }
            var allParams = params.join("&");
            return allParams;
        }

        function filter() {
            let search =
        }

        function get() {
            let http = new XMLHttpRequest();
            let url = urlPath;
            let params = getFormData('form-unit');
            http.open('GET', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.setRequestHeader('X-CSRF-TOKEN', csrf);

            http.onreadystatechange = function() { //Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    alert(http.responseText);
                    console.log(http.responseText);
                }
            }
            http.send(params);
        }

        function store() {
            let http = new XMLHttpRequest();
            let url = urlPath;
            console.log(getFormData('form-unit'));
            let params = getFormData('form-unit');
            http.open('POST', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.setRequestHeader('X-CSRF-TOKEN', csrf);

            http.onreadystatechange = function() { //Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    alert(http.responseText);
                    console.log(http.responseText);
                }
            }
            http.send(params);
        }

        document.getElementById("btn-submit").addEventListener("click", function() {
            store();
        });
    </script>
@endsection
