@extends('layout.master')

@section('content')
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
                                <select class="form-control basic" id="form-product-select" name="form-product-select"
                                    onchange="setImage()">
                                    <option selected="selected">Pilih Produk</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="form-qty">Qty</label>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-minus-5"
                                            onclick="addQty(5, 'min')">-5</button>
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-minus-1"
                                            onclick="addQty(1, 'min')">-1</button>
                                    </div>
                                    <div class="col-md-4">
                                        <input id="form-qty" class="form-control" type="number" value="1"
                                            min="1" name="form-qty">
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-plus-1"
                                            onclick="addQty(1, 'plus')">+1</button>
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-plus-5"
                                            onclick="addQty(5, 'plus')">+5</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <button type="button" class="btn btn-primary mt-3 mb-2" id="add-product">Tambah</button>
                                <button type="button" class="btn btn-primary mt-3 mb-2" id="btn-submit">Bayar</button>
                                <button type="button" id="btn-cetak" class="btn btn-primary mt-3 mb-2" data-toggle="modal" data-target=".bd-example-modal-xl">Cetak Nota</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 my-4 text-right">
                                <h5 class="fs-1 ml-5" id="form-nota">Nota: Uxx898Ukljfflll </h5>
                            </div>
                            <div class="col-lg-12 col-sm-12 my-4 nota text-center">
                                <h1 class="ml-5"><span class="text-danger" id="form-price-total">Rp 180.000</span> </h1>
                            </div>
                            <div class="col-lg-12 col-sm-12 my-4 nota text-center">
                                <img src="" alt="" id="form-image" width="100" height="100">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped mb-4" id="table-product">
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
                                                <td colspan="6" class="text-center">Data Kosong</td>
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
    <div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal-transaction" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Pilih Salah Satu Nota</h5>
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
                    <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4" id="table-transaction">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nota</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                    {{-- <button type="button" class="btn btn-primary" id="btn-submit">Save</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let csrf = document.querySelector('meta[name="csrf-token"]').content
        let urlPath = '/transaksi'
        let notaID = generateID(10)

        function makeTableTransaction(data) {
            console.log(data);
            let heading =
                `<thead><tr><th>No</th><th>Nama</th><th>Nota</th><th>Tanggal</th><th>Total</th><th class="no-content">Actions</th></tr></thead>`
            let item = ''
            let index = 0
            if (data.length > 0) {
                data.forEach(element => {
                    let total = 0
                    for (let index = 0; index < element['transaction_detail'].length; index++) {
                        total += element['transaction_detail'][index]['qty'] * element['transaction_detail'][index]['product']['price']
                    }
                    item += `<tr>
                            <td>${index+1}</td>
                            <td>User</td>
                            <td>${element['nota']}</td>
                            <td>${element['created_at']}</td>
                            <td>${formatRupiah(total.toString(), 'Rp. ')}</td>
                            <td>
                            <a href='/api/transaksi/generate-pdf?type=nota&id=${element["id"]}' target="_blank"><i class="far fa-file"></i></a>
                            </td>
                        </tr>`
                    index += 1
                })
            } else {
                item += `<tr><td colspan="6" class="text-center">Data Kosong</td></tr>`
            }

            let body = `<tbody>${item}</tbody>`
            console.log(body)
            $("#table-transaction").empty()
            $("#table-transaction").append(heading, body)
            // document.getElementById('form-price-total').innerText = formatRupiah(total.toString(), 'Rp. ')
        }

        function makeTableProduct(data) {
            let heading =
                `<thead><tr><th>No</th><th>Nama</th><th>Qty</th><th>Harga</th><th>Jumlah</th><th class="no-content">Actions</th></tr></thead>`
            let item = ''
            let index = 0
            let total = 0
            if (data.length > 0) {
                data.forEach(element => {
                    item += `<tr>
                            <td>${index+1}</td>
                            <td>${element['name']}/${element['unit']}</td>
                            <td>${element['qty']}</td>
                            <td>${formatRupiah(element['price'].toString(), 'Rp. ')}</td>
                            <td>${formatRupiah((element['price']*element['qty']).toString(), 'Rp. ')}</td>
                            <td>
                                <i class="ml-3 far fa-trash-alt" onclick="removeItem('${element['id']}')"></i>
                            </td>
                        </tr>`
                    total += (element['price'] * element['qty'])
                    index += 1
                })
            } else {
                item += `<tr><td colspan="6" class="text-center">Data Kosong</td></tr>`
            }

            let body = `<tbody>${item}</tbody>`
            $("#table-product").empty()
            $("#table-product").append(heading, body)
            document.getElementById('form-price-total').innerText = formatRupiah(total.toString(), 'Rp. ')
        }

        function setImage() {
            let element = document.getElementById('form-product-select')
            let productSplit = element.value.split('-').splice(4, element.value.length - 1).join('-')
            console.log(productSplit);
            document.getElementById('form-image').setAttribute('src', `public/upload/product/${productSplit}`)
        }

        function getProduct(page = 1) {
            let http = new XMLHttpRequest()
            let url = `api/product`
            let params = `page=1&search=&show=100&order_by=id&order_type=asc`
            http.open('GET', `${url}?${params}`, true)

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            http.setRequestHeader('X-CSRF-TOKEN', csrf)

            http.onreadystatechange = function() { //Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    let data = JSON.parse(http.responseText).data.data
                    if (data != null) {
                        for (var i = 0; i <= data.length; i++) {
                            var opt = document.createElement('option');
                            opt.value =
                                `${data[i]['id']}-${data[i]['price']}-${data[i]['name']}-${data[i]['unit']['name']}-${data[i]['image']}`
                            opt.innerHTML =
                                `${data[i]['name']}/${data[i]['unit']['name']} - ${formatRupiah(data[i]['price'].toString(), 'Rp. ')}`;
                            document.getElementById('form-product-select').appendChild(opt);
                        }
                    }
                }
            }
            http.send()
        }

        function addQty(number, type) {
            let qty = document.getElementById('form-qty')
            if (type == 'min') {
                if (qty.value >= number && qty.value >= 2) {
                    let count = (parseInt(qty.value) - parseInt(number))
                    qty.value = (count < 1) ? 1 : count
                } else {
                    qty.value = 1
                }
            } else {
                qty.value = (parseInt(qty.value) + parseInt(number))
            }
        }

        function setItem() {
            let currentStorage = JSON.parse(window.localStorage.getItem('products'))
            document.getElementById('form-price-total').innerText = 'Rp. 0'
            document.getElementById('form-nota').innerText = `Nota: ${notaID}`
            if (currentStorage != null) {
                makeTableProduct(currentStorage)
            }
        }

        function addItem() {
            let currentStorage = JSON.parse(window.localStorage.getItem('products'))
            let productSplit = document.getElementById('form-product-select').value.split('-')
            let product = {
                'id': productSplit[0],
                'name': productSplit[2],
                'price': productSplit[1],
                'unit': productSplit[3],
                'qty': document.getElementById('form-qty').value
            }
            if (currentStorage == null) {
                window.localStorage.setItem('products', JSON.stringify([product]))
                makeTableProduct([product])
            } else {
                if (currentStorage.length > 0) {
                    for (let index = 0; index < currentStorage.length; index++) {
                        if (currentStorage[index]['id'] == productSplit[0]) {
                            currentStorage[index] = product
                            break
                        } else if (currentStorage.length == (index + 1)) {
                            currentStorage.push({
                                'id': productSplit[0],
                                'name': productSplit[2],
                                'price': productSplit[1],
                                'unit': productSplit[3],
                                'qty': document.getElementById('form-qty').value
                            })
                        }
                    }
                } else {
                    currentStorage.push({
                        'id': productSplit[0],
                        'name': productSplit[2],
                        'price': productSplit[1],
                        'unit': productSplit[3],
                        'qty': document.getElementById('form-qty').value
                    })
                }

                window.localStorage.setItem('products', JSON.stringify(currentStorage))
                makeTableProduct(currentStorage)
            }
        }

        function removeItem(id) {
            console.log('clicked');
            let currentStorage = JSON.parse(window.localStorage.getItem('products'))
            for (let index = 0; index < currentStorage.length; index++) {
                if (currentStorage[index]['id'] == id) {
                    currentStorage.splice(index, 1);
                    break
                }
            }
            window.localStorage.setItem('products', JSON.stringify(currentStorage))
            makeTableProduct(currentStorage)
        }

        function get(page = 1) {
            let http = new XMLHttpRequest()
            let url = `api${urlPath}`
            let params = `page=1&search=&show=100&order_by=id&order_type=asc`
            http.open('GET', `${url}?${params}`, true)

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            http.setRequestHeader('X-CSRF-TOKEN', csrf)

            http.onreadystatechange = function() { //Call a function when the state changes.
                if (http.readyState == 4 && http.status == 200) {
                    let data = JSON.parse(http.responseText).data.data
                    makeTableTransaction(data)
                }
            }
            http.send()
        }

        function store() {
            const formData = new FormData()
            let url = `api${urlPath}`;
            formData.append('nota', notaID)
            formData.append('products', window.localStorage.getItem('products'))

            fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.localStorage.removeItem('products');
                    makeTableProduct([])
                    // get()
                    // $('#modal-product').modal('toggle');
                })
                .catch(error => {
                    console.error(error)
                })
        }

        getProduct()
        get()
        setItem()

        document.getElementById("add-product").addEventListener("click", function() {
            addItem()
        })

        document.getElementById("btn-cetak").addEventListener("click", function() {
            get()
        })

        // document.getElementById("form-product-select").addEventListener("change", function() {
        //     let productSplit = this.value.split('-').splice(4, this.value.length-1).join('-')
        //     console.log(productSplit);
        //     document.getElementById('form-image').setAttribute('src', `public/upload/product/${productSplit}`)
        // })

        document.getElementById("btn-submit").addEventListener("click", function() {
            store()
        })

        // document.getElementById('input-show').addEventListener('change', function() {
        //     get()
        // })

        // document.getElementById('input-search').addEventListener('input', function() {
        //     get()
        // })
    </script>
@endsection
