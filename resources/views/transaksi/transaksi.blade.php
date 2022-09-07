@extends('layout.master')

@section('content')
    <style>
        .nota-item-text {
            font-size: 0.8em;
        }
    </style>

    <div id="view-nota" class="text-center" style="background-color: grey; margin: auto; width: 330px; display: none">
        <div id="nota-content">
            <img src="{{ asset('assets/img/header.png') }}" width="300" alt="" srcset="">
            <div id="nota-print-header" style="background-color: white; margin: auto; padding: 5px; width: 300px">
                <div class="row">
                    <div class="col-6 text-left">
                        <img src="{{ asset('assets/img/toko tidar.jpg') }}" width="150" alt="" srcset="">
                    </div>
                    <div class="col-6 text-right">
                        <p class="nota-item-text" id="nota-print-date">
                            Date: tanggal
                        </p>
                    </div>
                    <div class="col-12 text-left">
                        <br>
                        <p class="nota-item-text" id="nota-print-id">
                            Nota: #nomor
                        </p>
                    </div>
                </div>
                <hr style="border:1px dashed #d9e7e8!important; ">
            </div>
            <div id="nota-print-body" style="background-color: white; margin: auto; width: 300px; padding: 5px">
                <div class="row">
                    <div class="col-12">
                        <table width="100%" class="mb-3" id="nota-print-table">
                            <thead>
                                <tr>
                                    <th align="left">Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">
                                        <p class="nota-item-text">Nama</p>
                                    </td>
                                    <td>
                                        <p class="nota-item-text">Nama</p>
                                    </td>
                                    <td>
                                        <p class="nota-item-text">Nama</p>
                                    </td>
                                    <td>
                                        <p class="nota-item-text">Nama</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="border:1px dashed #d9e7e8!important; ">
            </div>
            {{-- <img src="{{ asset('assets/img/divider.png') }}" width="300" style="margin-top: -10px" alt=""
                srcset=""> --}}
            <div id="nota-print-footer"
                style="background-color: white; margin: auto; margin-top: -10px; width: 300px; align-item: center; padding: 5px">
                <div class="row">
                    <div class="col-6 mt-4 text-left">
                        <h6>Total :</h6>
                    </div>
                    <div class="col-6 mt-4 text-right" id="nota-print-price-total">
                        <p>Rp. 10000000</p>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/img/footer.png') }}" width="300" alt="" srcset="">
        </div>
    </div>
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
                                <label for="form-product-select">Pilih Produk</label>
                                <select class="form-control basic" id="form-product-select" name="form-product-select"
                                    onchange="setUnitProduct(this)">
                                    <option selected="selected">Pilih Produk</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="form-unit-select">Pilih Satuan</label>
                                <select class="form-control basic" id="form-unit-select" name="form-unit-select">
                                    <option selected="selected">Pilih Satuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="form-qty">Qty</label>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-4 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-minus-5"
                                            onclick="addQty(5, 'min')">-5</button>
                                        <button type="button" class="btn btn-sm btn-primary mb-2" id="btn-minus-1"
                                            onclick="addQty(1, 'min')">-1</button>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <input id="form-qty" class="form-control" type="number" value="1"
                                            min="1" name="form-qty">
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-4 text-center">
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
                                <button type="button" id="btn-cetak" class="btn btn-primary mt-3 mb-2"
                                    data-toggle="modal" data-target=".bd-example-modal-xl">Cetak Nota</button>
                                <a href="#" id="btn-view" class="btn btn-primary mt-3 mb-2">Lihat
                                    Nota</a>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 my-4 text-right">
                                <h5 class="fs-1 ml-5" id="form-nota">Nota: Uxx898Ukljfflll </h5>
                            </div>
                            <div class="col-lg-12 col-sm-12 my-4 nota text-center">
                                <h1 class="ml-5"><span class="text-danger" id="form-price-total">Rp 180.000</span>
                                </h1>
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
    <div class="modal fade" tabindex="-1" id="modal-nota" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Cetak Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="container">
                        <div id="view-nota" class="text-center"
                            style="background-color: grey; margin: auto;  width: 330px">

                            <img src="{{ asset('assets/img/header.png') }}" width="300" alt=""
                                srcset="">
                            <div id="nota-header"
                                style="background-color: white; margin: auto; padding: 5px; width: 300px">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <img src="{{ asset('assets/img/toko tidar.jpg') }}" width="150" alt="" srcset="">
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="nota-item-text" id="nota-date">
                                            Date: tanggal
                                        </p>
                                    </div>
                                    <div class="col-12 text-left">
                                        <p class="nota-item-text" id="nota-id">
                                            Nota: #nomor
                                        </p>
                                    </div>
                                </div>
                                <hr style="border:1px dashed #d9e7e8!important; ">
                            </div>
                            <div id="nota-body" style="background-color: white; margin: auto; width: 300px; padding: 5px">
                                <div class="row">
                                    <div class="col-12">
                                        <table width="100%" class="mb-3" id="nota-table">
                                            <thead>
                                                <tr>
                                                    <th align="left">Nama</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td align="left">
                                                        <p class="nota-item-text">Nama</p>
                                                    </td>
                                                    <td>
                                                        <p class="nota-item-text">Nama</p>
                                                    </td>
                                                    <td>
                                                        <p class="nota-item-text">Nama</p>
                                                    </td>
                                                    <td>
                                                        <p class="nota-item-text">Nama</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/img/divider.png') }}" width="300" style="margin-top: -10px"
                                alt="" srcset="">
                            <div id="nota-footer"
                                style="background-color: white; margin: auto; margin-top: -10px; width: 300px; align-item: center; padding: 5px">
                                <div class="row">
                                    <div class="col-6 mt-4 text-left">
                                        <h6>Total :</h6>
                                    </div>
                                    <div class="col-6 mt-4 text-right" id="nota-price-total">
                                        <p>Rp. 10000000</p>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/img/footer.png') }}" width="300" alt=""
                                srcset="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                    <button type="button" class="btn btn-primary" id="btn-print" onclick="generatePDF()">Cetak
                        Nota</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal-transaction" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Pilih Salah Satu Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
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
                    {{-- <button type="button" class="btn btn-primary" id="btn-print">Cetak Nota</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let csrf = document.querySelector('meta[name="csrf-token"]').content
        let urlPath = '/transaksi'
        let notaID = generateID(10)

        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById('nota-content');
            let opt = {
                margin: 1,
                filename: 'myfile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'px',
                    format: [310.0, element.offsetHeight+100],
                    orientation: 'portrait'
                }
            };
            // Choose the element and save the PDF for our user.
            html2pdf().set(opt).from(element).save();
            document.getElementById('view-nota').style.display = 'none'
        }

        function makeTableNota(data) {
            let today = new Date().toLocaleString().replace(",","").replace(/:.. /," ").replace("AM", "").replace("PM", "")
            let heading =
                `<thead><tr><th>Nama</th><th>Jumlah</th><th>Harga</th><th>Total</th></tr></thead>`
            let item = ''
            let index = 0
            let total = 0
            if (data.length > 0) {
                data.forEach(element => {
                    item += `<tr>
                            <td>${element['name']}/${element['unit']}</td>
                            <td>${element['qty']}</td>
                            <td>${formatRupiah(element['price'], 'Rp. ')}</td>
                            <td>${formatRupiah((parseInt(element['price'])*parseInt(element['qty'])).toString(), 'Rp. ')}</td>
                        </tr>`
                    total += (element['price'] * element['qty'])
                    index += 1
                })
            } else {
                item += `<tr><td colspan="4" class="text-center">Data Kosong</td></tr>`
            }

            let body = `<tbody>${item}</tbody>`
            console.log(body)
            $("#nota-table").empty()
            $("#nota-table").append(heading, body)
            $("#nota-price-total").empty()
            $("#nota-price-total").append(`<p>${formatRupiah(total.toString(), 'Rp. ')}</p>`)
            $("#nota-id").empty()
            $("#nota-id").append(`Nota: #${notaID}`)
            $("#nota-date").empty()
            $("#nota-date").append(`${today}`)
            $("#nota-print-table").empty()
            $("#nota-print-table").append(heading, body)
            $("#nota-print-price-total").empty()
            $("#nota-print-price-total").append(`<p>${formatRupiah(total.toString(), 'Rp. ')}</p>`)
            $("#nota-print-id").empty()
            $("#nota-print-id").append(`Nota: #${notaID}`)
            $("#nota-print-date").empty()
            $("#nota-print-date").append(`${today}`)
        }

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
                        total += element['transaction_detail'][index]['qty'] * element['transaction_detail'][index][
                            'product'
                        ]['price']
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
                        $("#form-product-select").empty();
                        let defOpt = document.createElement('option');
                        defOpt.innerHTML = "Pilih Produk";
                        document.getElementById('form-product-select').appendChild(defOpt);
                        for (var i = 0; i <= data.length; i++) {
                            var opt = document.createElement('option');
                            opt.value =
                                `${data[i]['id']}-${data[i]['name']}-${data[i]['price']}`
                            opt.innerHTML =
                                `${data[i]['name']}`;
                            document.getElementById('form-product-select').appendChild(opt);
                        }
                    }
                }
            }
            http.send()
        }

        function setUnitProduct(data) {
            let unitData = data.value.split('-')
            if (unitData != null) {
                let priceData = JSON.parse(unitData[unitData.length - 1])
                $("#form-unit-select").empty();
                let defOpt = document.createElement('option');
                defOpt.innerHTML = "Pilih Satuan";
                document.getElementById('form-unit-select').appendChild(defOpt);
                console.log(priceData);
                for (var i = 0; i <= priceData.length; i++) {
                    var opt = document.createElement('option');
                    opt.value =
                        `${priceData[i]['unit_id']}-${priceData[i]['unit_name']}-${priceData[i]['price']}`
                    opt.innerHTML =
                        `${formatRupiah(priceData[i]['price'].toString(), 'Rp. ')}/${priceData[i]['unit_name']}`;
                    document.getElementById('form-unit-select').appendChild(opt);
                }
            }
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
                makeTableNota(currentStorage)
            }
        }

        function addItem() {
            if (document.getElementById('form-product-select').value == "Pilih Produk") {
                alert('Pilih produk terlebih dahulu !')
            } else {
                if (document.getElementById('form-unit-select').value == "Pilih Satuan") {
                    alert('Pilih satuan terlebih dahulu !')
                } else {
                    let currentStorage = JSON.parse(window.localStorage.getItem('products'))
                    let productSplit = document.getElementById('form-product-select').value.split('-')
                    let unitSplit = document.getElementById('form-unit-select').value.split('-')
                    let product = {
                        'id': productSplit[0],
                        'name': productSplit[1],
                        'price': unitSplit[2],
                        'unit': unitSplit[1],
                        'qty': document.getElementById('form-qty').value
                    }
                    if (currentStorage == null) {
                        window.localStorage.setItem('products', JSON.stringify([product]))
                        makeTableProduct([product])
                        makeTableNota([product])
                    } else {
                        if (currentStorage.length > 0) {
                            for (let index = 0; index < currentStorage.length; index++) {
                                if (currentStorage[index]['id'] == productSplit[0] && currentStorage[index]['unit'] == unitSplit[1]) {
                                    currentStorage[index] = product
                                    break
                                } else if (currentStorage.length == (index + 1)) {
                                    currentStorage.push(product)
                                }
                            }
                        } else {
                            currentStorage.push(product)
                        }

                        window.localStorage.setItem('products', JSON.stringify(currentStorage))
                        makeTableProduct(currentStorage)
                        makeTableNota(currentStorage)
                    }
                }
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
            makeTableNota(currentStorage)
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
                    makeTableNota([])
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

        document.getElementById("btn-submit").addEventListener("click", function() {
            store()
        })

        document.getElementById("btn-view").addEventListener("click", function() {
            $('#modal-nota').modal('toggle');
            document.getElementById('view-nota').style.display='inline'
        })


        // document.getElementById('input-show').addEventListener('change', function() {
        //     get()
        // })

        // document.getElementById('input-search').addEventListener('input', function() {
        //     get()
        // })
    </script>
@endsection
