@extends('layout.master')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="row">
        <div class="col-lg-8">
            <h3>Tabel Satuan Produk</h3>
        </div>
        <!-- <div class="col-lg-4">
                                <buttton class="btn btn-primary mb-2">Tambah</buttton>
                            </div> -->
    </div>
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-sm-3 ml-2 my-2 col-3 col-md-3">
                <div class="form-group">
                    <select class="selectpicker form-control" id="input-show">
                        <option>Filter</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-md-6 my-2 col-sm-6 filtered-list-search ">
                <form class="form-inline my-2 my-lg-0 justify-content-center">
                    <div class="w-100">
                        <input type="text" class="w-100 form-control product-search br-30" id="input-search" placeholder="Search Attendees...">
                        <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg></button>
                    </div>
                </form>
            </div>
            <div class="mx-2 my-2 col-md-2 col-lg-2 col-md-2 col-2 col-sm-2">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-xl">Tambah</button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="table-unit" class="table table-bordered table-striped mb-4" style="width:100%">
            </table>
            <div id="pagination-unit" class="dt--bottom-section d-sm-flex justify-content-sm-between text-center"></div>
        </div>

    </div>
    <div class="modal fade bd-example-modal-xl" id="modal-unit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                        <form id="form-unit">
                            <div class="form-group row mb-4">
                                <input type="hidden" id="form-id" name="id">
                                <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Satuan</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" id="btn-submit">Save</button>
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

    function makeTable(data) {
        let heading = `<thead><tr><th>No</th><th>Satuan</th><th class="no-content">Actions</th></tr></thead>`
        let item = ''
        let index = 0
        data.data.data.forEach(element => {
            item += `<tr>
                            <td>${data.data.from + index}</td>
                            <td>${element['name']}</td>
                            <td>
                                <i class="far fa-edit" onclick="show('${element['id']}')"></i>
                                <i class="ml-3 far fa-trash-alt" onclick="destroy('${element['id']}')"></i>
                            </td>
                        </tr>`
            index += 1
        })
        let body = `<tbody>${item}</tbody>`
        $("#table-unit").empty()
        $("#table-unit").append(heading, body)
    }

    function get(page = 1) {
        let http = new XMLHttpRequest()
        let url = `api${urlPath}`
        let params = filter(page)
        http.open('GET', `${url}?${params}`, true)

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        http.setRequestHeader('X-CSRF-TOKEN', csrf)

        http.onreadystatechange = function() { //Call a function when the state changes.
            if (http.readyState == 4 && http.status == 200) {
                // alert(http.responseText);
                makeTable(JSON.parse(http.responseText))
                makePagination(JSON.parse(http.responseText))
            }
        }

        http.send()
        document.getElementById('btn-submit').innerText = 'Save'
    }

    function show(id) {
        let http = new XMLHttpRequest()
        let url = `api${urlPath}`
        http.open('GET', `${url}/${id}`, true)

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        http.setRequestHeader('X-CSRF-TOKEN', csrf)

        http.onreadystatechange = function() { //Call a function when the state changes.
            if (http.readyState == 4 && http.status == 200) {
                $('#modal-unit').modal('toggle');
                setFormData('form-unit', JSON.parse(http.responseText).data)
                document.getElementById('btn-submit').innerText = 'Update'
            }
        }

                function get(page = 1) {
                    let http = new XMLHttpRequest()
                    let url = `api${urlPath}`
                    let params = filter(page)
                    http.open('GET', `${url}?${params}`, true)

                    //Send the proper header information along with the request
                    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                    http.setRequestHeader('X-CSRF-TOKEN', csrf)

                    http.onreadystatechange = function() { //Call a function when the state changes.
                        if (http.readyState == 4 && http.status == 200) {
                            // alert(http.responseText);
                            makeTable(JSON.parse(http.responseText))
                            makePagination(JSON.parse(http.responseText), 'unit')
                        }

                    }
                }
                http.send()
            }

            function store() {
                let http = new XMLHttpRequest()
                let url = `api${urlPath}`
                let params = getFormData('form-unit')
                if (document.getElementById('btn-submit').innerText == 'Update') {
                    console.log('update');
                    let id = document.getElementById('form-id').value
                    http.open('PUT', `${url}/${id}`, true)
                } else {
                    console.log('store');
                    http.open('POST', url, true)
                }

                //Send the proper header information along with the request
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                http.setRequestHeader('X-CSRF-TOKEN', csrf)

                http.onreadystatechange = function() { //Call a function when the state changes.
                    if (http.readyState == 4 && http.status == 200) {
                        get()
                        $('#modal-unit').modal('toggle');
                    }
                }
                http.send(params)
            }

            function destroy(id) {
                if (confirm('apakah anda yakin akan menghapus?')) {
                    let http = new XMLHttpRequest()
                    let url = `api${urlPath}`
                    http.open('DELETE', `${url}/${id}`, true)

                    //Send the proper header information along with the request
                    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                    http.setRequestHeader('X-CSRF-TOKEN', csrf)

                    http.onreadystatechange = function() { //Call a function when the state changes.
                        if (http.readyState == 4 && http.status == 200) {
                            get()
                        }
                    }
                    http.send()
                }

            }

            get()

            document.getElementById("btn-submit").addEventListener("click", function() {
                store()
            })

            document.getElementById('input-show').addEventListener('change', function() {
                get()
            })

            document.getElementById('input-search').addEventListener('input', function() {
                get()
            })
</script>
@endsection