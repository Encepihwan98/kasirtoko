@extends('layout.master')

@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="row">
            <div class="col-lg-8">
                <h3>Tabel Produk</h3>
            </div>
            <!-- <div class="col-lg-4">
                        <button class="btn btn-primary mb-2">Tambah</button>
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
                <div class="mx-2 my-2 col-md-2 col-lg-2 col-md-2 col-2 col-sm-2">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target=".bd-example-modal-xl">Tambah</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-product" class="table table-bordered table-striped mb-4" style="width:100%">
                </table>
                <div id="pagination-product" class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal-product" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Extra Large</h5>
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
                        <form id="form-product">
                            <div class="form-group row mb-4">
                                <label for="name" class="col-2 col-sm-3 col-form-label">Nama
                                    Barang</label>
                                <div class="col-10 col-sm-9">
                                    <input type="hidden" id="form-id" name="id">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="kategori" class="col-2 col-sm-3 col-form-label">Kategori</label>
                                <div class="col-10 col-sm-9">
                                    <select class="form-control" name="category_id" id="form-category">
                                        <option value="">Pilih Kategori</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card component-card_1" id="price-with-unit">
                                <div class="card-body text-right">
                                    <h5 class="card-title text-left">Custom Satuan Produk</h5>
                                    <div class="form-group row mb-4">
                                        <label for="harga" class="col-2 col-sm-3 col-form-label text-left">Harga</label>
                                        <div class="col-10 col-sm-9 row" id="input-price">
                                            <div class="col-5 col-sm-5">
                                                <input type="text" class="form-control" name="price[]" id="harga-1"
                                                    placeholder="">
                                            </div>
                                            <div class="col-4 col-sm-4">
                                                <select class="form-control" name="unit_id[]" id="form-unit-1" onchange="setUnitName(1)">
                                                    <option value="">Pilih Satuan</option>
                                                </select>
                                                <input type="hidden" name="unit_name[]" id="form-unit-name-1">
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger" id="btn-remove-product-1" onclick="removeInput(1)"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mr-3" id="btn-add-product">Tambah Satuan & Harga</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="reset" class="btn btn-secondary"> -->
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary" id="btn-submit">Save</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('js')
    <script>
        let csrf = document.querySelector('meta[name="csrf-token"]').content
        let urlPath = '/product'
        let unitDataUniversal = {}
        let categoryDataUniversal = {}
        let priceFormTotal = 1

        function setUnitName(id) {
            let selectedOption = document.getElementById(`form-unit-${id}`).options.selectedIndex
            console.log(document.getElementById(`form-unit-${id}`).options.selectedIndex);
            document.getElementById(`form-unit-name-${id}`).value = document.getElementById(`form-unit-${id}`).options[selectedOption].text
        }

        function removeElement(id) {
            console.log(id);
            var elem = document.getElementById(id);
            return elem.parentNode.removeChild(elem);
        }

        function removeInput(id) {
            let iPrice = document.getElementsByName("price[]")
            if (iPrice.length > 0) {
                let newSplice = Array.prototype.slice.call(iPrice)
                for (let index = 0; index < iPrice.length; index++) {
                    const idSplit = iPrice[index].id.split('-')
                    if(id == idSplit[1]) {
                        console.log('Found');
                        removeElement(`form-unit-${id}`)
                        removeElement(`form-unit-name-${id}`)
                        removeElement(`harga-${id}`)
                        removeElement(`btn-remove-product-${id}`)
                        break
                    }
                }
            }
        }

        function addInput(customVal = null) {
            priceFormTotal+=1
            let otherOpt = ''
            for (var i = 0; i <= unitDataUniversal.data.length; i++) {
                console.log(unitDataUniversal.data[i]);
                if(unitDataUniversal.data[i]) {
                    otherOpt += `<option value="${unitDataUniversal.data[i]['id']}">${unitDataUniversal.data[i]['name']}</option>`
                }
            }
            if(customVal == null) {
                let newInput = `<div class="col-5 col-sm-5">
                                <input type="text" class="form-control" name="price[]" id="harga-${priceFormTotal}"
                                    placeholder="">
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-control" name="unit_id[]" id="form-unit-${priceFormTotal}" onchange="setUnitName(${priceFormTotal})">
                                    <option value="">Pilih Satuan</option>
                                    ${otherOpt}
                                </select>
                                <input type="hidden" name="unit_name[]" id="form-unit-name-${priceFormTotal}">
                            </div>
                            <button type="button" class="btn btn-sm btn-danger" id="btn-remove-product-${priceFormTotal}" onclick="removeInput(${priceFormTotal})"><i class="far fa-trash-alt"></i></button>`
                $("#input-price").append(newInput)
            } else {
                $("#input-price").empty()
                let newInput = ''
                let index = 1
                customVal.forEach(e => {
                    newInput += `<div class="col-5 col-sm-5">
                                <input type="text" class="form-control" name="price[]" value="${e['price']}" id="harga-${index}"
                                    placeholder="">
                            </div>
                            <div class="col-4 col-sm-4">
                                <select class="form-control" name="unit_id[]" id="form-unit-${index}" value="${e['unit_id']}"  onchange="setUnitName(${index})">
                                    <option value="">Pilih Satuan</option>
                                    <option value="${e['unit_id']}" selected disabled>${e['unit_name']}</option>
                                    ${otherOpt}
                                </select>
                                <input type="hidden" name="unit_name[]" id="form-unit-name-${index}" value="${e['unit_name']}" >
                            </div>
                            <button type="button" class="btn btn-sm btn-danger" id="btn-remove-product-${index}" onclick="removeInput(${index})"><i class="far fa-trash-alt"></i></button>`
                    index += 1
                })
                $("#input-price").append(newInput)
            }
        }

        function makeTable(data) {
            let heading =
                `<thead><tr><th>No</th><th>Nama Barang</th><th>Satuan dan Harga</th><th>Kategori</th><th class="no-content">Actions</th></tr></thead>`
            let item = ''
            let index = 0
            data.data.data.forEach(element => {
                let product_price = ''
                let satuan = JSON.parse(element['price'])
                if(satuan != null && satuan.length > 0) {
                    satuan.forEach(e => {
                        product_price += `${element['name']}/${e['unit_name']}: ${formatRupiah(e['price'].toString(), 'Rp. ')}<br>`
                    })
                }
                console.log(JSON.parse(element['price']));

                item += `<tr>
                            <td>${data.data.from + index}</td>
                            <td>${element['name']}</td>
                            <td>${product_price}</td>
                            <td>${element['category']['name']}</td>
                            <td>
                                <i class="far fa-edit" onclick="show('${element['id']}')"></i>
                                <i class="ml-3 far fa-trash-alt" onclick="destroy('${element['id']}')"></i>
                            </td>
                        </tr>`
                index += 1
            })
            let body = `<tbody>${item}</tbody>`
            $("#table-product").empty()
            $("#table-product").append(heading, body)
        }

        function changeImage(input) {
            var reader;

            console.log(input);

            if (input.files && input.files[0]) {
                reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function getForm() {
            let http = new XMLHttpRequest()
            let url1 = `api/satuan-produk`
            let url2 = `api/kategori`
            let params = `page=1&search=&show=100&order_by=id&order_type=asc`
            http.open('GET', `${url1}?${params}`, true)

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            http.setRequestHeader('X-CSRF-TOKEN', csrf)

            http.onreadystatechange = function() { //Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    let unitData = JSON.parse(http.responseText).data
                    unitDataUniversal = unitData
                    $("#form-unit-1").empty();
                    let defOpt = document.createElement('option');
                    defOpt.innerHTML = "Pilih Satuan";
                    document.getElementById('form-unit-1').appendChild(defOpt);
                    for (var i = 0; i <= unitData.data.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = unitData.data[i].id;
                        opt.innerHTML = unitData.data[i].name;
                        document.getElementById('form-unit-1').appendChild(opt);
                    }
                }
            }
            http.send()

            let newhttp = new XMLHttpRequest()
            newhttp.open('GET', `${url2}?${params}`, true)

            //Send the properly header information along with the request
            newhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            newhttp.setRequestHeader('X-CSRF-TOKEN', csrf)

            newhttp.onreadystatechange = function() { //Call a function when the state changes.
                if (newhttp.readyState == 4 && newhttp.status == 200) {
                    let unitDataNew = JSON.parse(newhttp.responseText).data
                    categoryDataUniversal = unitDataNew
                    $("#form-category").empty();
                    let defOpt = document.createElement('option');
                    defOpt.innerHTML = "Pilih Kategori";
                    document.getElementById('form-category').appendChild(defOpt);
                    for (var i = 0; i <= unitDataNew.data.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = unitDataNew.data[i].id;
                        opt.innerHTML = unitDataNew.data[i].name;
                        document.getElementById('form-category').appendChild(opt);
                    }
                }
            }
            newhttp.send()
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
                    makePagination(JSON.parse(http.responseText), 'product')
                }
            }
            http.send()
            document.getElementById('btn-submit').innerText = 'Save'
            getForm()
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
                    $('#modal-product').modal('toggle');
                    let data = JSON.parse(http.responseText).data
                    let priceData = JSON.parse(data.price)
                    setFormData('form-product', data)
                    addInput(priceData)
                    document.getElementById('btn-submit').innerText = 'Update'
                }
            }
            http.send()
        }

        function store() {
            const formData = setAsFormData('form-product')
            console.log(formData);
            let id = document.getElementById('form-id').value
            let url = (document.getElementById('btn-submit').innerText == 'Update') ? `api${urlPath}/${id}?_method=PUT` :
                `api${urlPath}`
            let method = (document.getElementById('btn-submit').innerText == 'Update') ? 'PUT' : 'POST'
            fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    get()
                    $('#modal-product').modal('toggle');
                })
                .catch(error => {
                    console.error(error)
                })
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

        // document.getElementById("image").addEventListener("change", function() {
        //     changeImage(this);
        // });


        document.getElementById("btn-add-product").addEventListener("click", function() {
            addInput()
        })

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
