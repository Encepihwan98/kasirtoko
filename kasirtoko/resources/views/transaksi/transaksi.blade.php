@extends('layout.master')

@section('content')
<link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<style>
    .nota-item-text {
        font-size: 0.8em;
    }
</style>

<div id="view-nota" class="text-center" style="background-color: grey; margin: auto; width: 350px; display: none">
    <div id="nota-content">
        <img src="{{ asset('assets/img/header.png') }}" width="300" alt="" srcset="">
        <div id="nota-print-header" style="background-color: white; margin: auto; padding: 5px; width: 300px">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{ asset('assets/img/logo-toko.png') }}" width="250" alt="" srcset="" id="images">
                </div>
                <div class="col-12 text-left">
                    <br>
                    <p style="color: black; font-weight: bold; font-family: arial;" id="nota-date">
                        Date: tanggal
                    </p>
                    <p style="color: black; font-weight: bold; font-family: arial;" id="nota-id">
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
                                    <p class="nota-item-text" width="150">Nama</p>
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
        <div id="nota-print-footer" style="background-color: white; margin: auto; margin-top: -10px; width: 300px; align-item: center; padding: 5px">
            <div class="row">
                <div class="col-6 mt-4 text-left">
                    <h6 style="color: black; font-weight: bold; font-family: arial;">Total :</h6>
                </div>
                <div class="col-6 mt-4 text-right" id="nota-print-price-total">
                    <p style="color: black; font-weight: bold; font-family: arial;">Rp. 10000000</p>
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
    <div class="widget-content widget-content-area">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div id="tableStriped" class="col-lg-12 col-12 p-3">
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
                                <tbody id="table-product">
                                    <tr id="product-1">
                                        <td id="num-1">1</td>
                                        <td id="select-form-1">
                                            <select class="form-control my-select" id="form-product-select-1" name="form-product-select[]" onchange="setUnitProduct(this, '1')">
                                                <option selected="selected" disabled="disabled">Pilih Produk</option>
                                            </select>
                                            <br>
                                            <select class="form-control my-select" id="form-unit-select-1" name="form-unit-select[]" onchange="updateTable('1')">
                                                <option selected="selected" disabled="disabled">Pilih Satuan</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="form-qty-1" class="form-control" style="width: 80px" type="number" value="1" min="1" name="form-qty[]" oninput="updateTable('1')">
                                        </td>
                                        <td>
                                            <p id="price-1">Rp. 0</p>
                                        </td>
                                        <td>
                                            <p id="total-1">Rp. 0</p>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" id="remove-item-1" onclick="removeInput('1')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <h2>Total : </h2>
                                        </td>
                                        <td colspan="4" class="text-center">
                                            <h4 id="price-total">Rp. 0</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <button type="button" class="btn btn-success" onclick="createColumn()">Tambah</button> &nbsp;
                                            <button type="button" class="btn btn-primary" onclick="preparePayment()">Bayar</button> &nbsp;
                                            <button type="button" class="btn btn-secondary" onclick="print()">Print</button> &nbsp;
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-xl">Lihat Nota</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal-transaction" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Pilih Salah Satu Nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="col-12 col-lg-12">
                    <h5 class="col-lg-2 col-2">Filter tanggal: </h5>
                    <input id="rangeCalendarFlatpickr" class="col-lg-3 col-4 form-control flatpickr flatpickr-input active ml-3 mb-4" type="text" placeholder="Select Date.." readonly="readonly" onchange="get('1', this)">   
                </div>
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
                <!-- <button type="button" class="btn btn-primary" id="btn-print">Cetak Nota</button> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

<script>
    let csrf = document.querySelector('meta[name="csrf-token"]').content
    let urlPath = '/transaksi'
    let notaID = generateID(6)
    let itemLen = 1
    let bodyMessage = ''
    let productMaster = []

    var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
        mode: "range"
    });

    // let progress = document.querySelector('#progress');
    // let dialog = document.querySelector('#dialog');
    // let message = document.querySelector('#message');
    // let printButton = document.querySelector('#print');
    let printCharacteristic;
    let index = 0;
    let data;
    // progress.hidden = true;

    let image = document.querySelector('#images');
    // Use the canvas to get image data
    let canvas = document.createElement('canvas');
    // Canvas dimensions need to be a multiple of 40 for this printer
    canvas.width = 400;
    canvas.height = 240;
    let context = canvas.getContext("2d");
    context.drawImage(image, 0, 0, canvas.width, canvas.height);
    let imageData = context.getImageData(0, 0, canvas.width, canvas.height).data;

    function preparePayment() {
        if (confirm('Cetak struk?')) {
            setTextBody(JSON.parse(window.localStorage.getItem('current_products')))
            printNow()
            store()
        } else {
            store()
        }
    }

    function reOrder() {
        let iProduct = document.getElementsByName("form-product-select[]")
        if (iProduct.length > 0) {
            for (let index = 0; index < iProduct.length; index++) {
                const idSplit = iProduct[index].id.split('-')
                document.getElementById(`num-${idSplit[idSplit.length-1]}`).innerHTML = index+1
            }
        }
    }

    function removeElement(id) {
        var elem = document.getElementById(id);
        return elem.parentNode.removeChild(elem);
    }

    function removeInput(id) {
        let iProduct = document.getElementsByName("form-product-select[]")
        if (iProduct.length > 1) {
            let newSplice = Array.prototype.slice.call(iProduct)
            for (let index = 0; index < iProduct.length; index++) {
                const idSplit = iProduct[index].id.split('-')
                if(id == idSplit[idSplit.length-1]) {
                    removeElement(`product-${id}`)

                    let currentStorage = JSON.parse(window.localStorage.getItem('current_products'))
                    for (let index = 0; index < currentStorage.length; index++) {
                        if (currentStorage[index]['table_id'] == id) {
                            currentStorage.splice(index, 1);
                            break
                        }
                    }
                    window.localStorage.setItem('current_products',JSON.stringify(currentStorage)) 
                    break
                }
            }
        } else {
            alert('transaksi minimal 1 barang!')
        }
        reOrder()
        updateTotal()
    }

    function updateTotal() {
        let price = 0
        let iProduct = document.getElementsByName("form-product-select[]")
        if (iProduct.length > 0) {
            for (let index = 0; index < iProduct.length; index++) {
                console.log(price);
                const idSplit = iProduct[index].id.split('-')
                let priceProduct = document.getElementById(`form-unit-select-${idSplit[idSplit.length-1]}`).value.split("-")
                let qty = parseInt(document.getElementById(`form-qty-${idSplit[idSplit.length-1]}`).value)
                console.log(priceProduct[priceProduct.length-1]);
                console.log(qty);

                price += parseInt(priceProduct[priceProduct.length-1]) * qty
            }
        }
        document.getElementById(`price-total`).innerHTML = formatRupiah(price.toString(), 'Rp. ')
    }

    function updateTable(id) {
        let products = document.getElementById(`form-product-select-${id}`).value.split("-")
        let error = false
        if(products == null && products.length == 0) {
            alert('Tolong pilih produk terlebih dahulu')
        } else {
            // init localstorage
            let currentStorage = JSON.parse(window.localStorage.getItem('current_products'))
            let lastStorage = JSON.parse(window.localStorage.getItem('last_products'))

            if (currentStorage == null) {
                // init data
                let units = document.getElementById(`form-unit-select-${id}`).value.split("-")
                let qtyData = document.getElementById(`form-qty-${id}`).value
                let priceDefault = (typeof products[products.length-1] === 'string' || products[products.length-1] instanceof String) ? 0 : parseInt(JSON.parse(products[products.length-1])[0]['price'])
                let price = (units != null && units.length > 0) ? parseInt(units[units.length-1]) : priceDefault
                let qty = qtyData != null ? parseInt(qtyData) : 1

                // set localstorage
                let product = {
                    'nota': notaID,
                    'table_id': id,
                    'id': products[0],
                    'name': products[1],
                    'price': price,
                    'unit': units[1],
                    'qty': qty
                }

                window.localStorage.setItem('current_products', JSON.stringify([product])) 
                window.localStorage.setItem('last_products', JSON.stringify([product])) 

                document.getElementById(`price-${id}`).innerHTML = formatRupiah(price.toString(), 'Rp. ')
                document.getElementById(`total-${id}`).innerHTML = formatRupiah((price*qty).toString(), 'Rp. ')
                updateTotal()
            } else {
                // init data
                let units = document.getElementById(`form-unit-select-${id}`).value.split("-")
                let qtyData = document.getElementById(`form-qty-${id}`).value
                let priceDefault = (typeof products[products.length-1] === 'string' || products[products.length-1] instanceof String) ? 0 : parseInt(JSON.parse(products[products.length-1])[0]['price'])
                let price = (units != null && units.length > 0) ? parseInt(units[units.length-1]) : priceDefault
                let qty = qtyData != null ? parseInt(qtyData) : 1

                // set localstorage
                let product = {
                    'nota': notaID,
                    'table_id': id,
                    'id': products[0],
                    'name': products[1],
                    'price': price,
                    'unit': units[1],
                    'qty': qty
                }

                if (currentStorage.length > 0) {
                    for (let index = 0; index < currentStorage.length; index++) {
                        if(id != currentStorage[index]['table_id'] && currentStorage[index]['id'] == products[0] && currentStorage[index]['unit'] == units[1]) {
                            alert('Barang dengan unit yang sama sudah dimasukan sebelumnya, silahkan ubah barang/unit!')
                            error = true
                        }else if (currentStorage[index]['id'] == products[0] && currentStorage[index]['unit'] == units[1]) {
                            currentStorage[index] = product
                            break
                        } else if (currentStorage.length == (index + 1)) {
                            currentStorage.push(product)
                        }
                    }
                } else {
                    currentStorage.push(product)
                }
                window.localStorage.setItem('current_products', JSON.stringify(currentStorage))
                if(!error) {
                    document.getElementById(`price-${id}`).innerHTML = formatRupiah(price.toString(), 'Rp. ')
                    document.getElementById(`total-${id}`).innerHTML = formatRupiah((price*qty).toString(), 'Rp. ')
                    updateTotal()
                } else {
                    loadData()
                }
            }
        }
    }

    function selectRefresh() {
        $('.my-select').select2({
            closeOnSelect: true
        });
    }

    function loadData() {
        let element = $('#table-product')
        let optionProduct = ``
        let newElement = ''
        if(productMaster != null) {
            productMaster.forEach((v) => {
                optionProduct += `<option value='${v['id']}-${v['name']}-${v['price']}'>${v['name']}</option>`
            })
        }
        let total = 0
        let currentStorage = JSON.parse(window.localStorage.getItem('current_products'))
        if(currentStorage != null) {
            for (let index = 0; index < currentStorage.length; index++) {
                let priceTotal = parseInt(currentStorage[index]['price']) * parseInt(currentStorage[index]['qty'])
                itemLen = parseInt(currentStorage[index]['table_id'])
                total += priceTotal
                newElement += `<tr id="product-${currentStorage[index]['table_id']}">
                                <td id="num-${currentStorage[index]['table_id']}">${index+1}</td>
                                <td id="select-form-${currentStorage[index]['table_id']}">
                                    <select class="form-control my-select" id="form-product-select-${currentStorage[index]['table_id']}" onchange="setUnitProduct(this, ${currentStorage[index]['table_id']})" name="form-product-select[]">
                                        <option selected="selected" value="${currentStorage[index]['id']}-${currentStorage[index]['name']}" disabled="disabled">${currentStorage[index]['name']}</option>
                                        ${optionProduct}
                                    </select>
                                    <br>
                                    <select class="form-control my-select" id="form-unit-select-${currentStorage[index]['table_id']}" onchange="updateTable('${currentStorage[index]['table_id']}')" name="form-unit-select[]">
                                        <option selected="selected" value="${currentStorage[index]['id']}-${currentStorage[index]['unit']}-${currentStorage[index]['price']}" disabled="disabled">${currentStorage[index]['unit']}</option>
                                    </select>
                                </td>
                                <td>
                                    <input id="form-qty-${currentStorage[index]['table_id']}" class="form-control" style="width: 80px" type="number" min="1" name="form-qty[]" value="${currentStorage[index]['qty']}" oninput="updateTable('${currentStorage[index]['table_id']}')">
                                </td>
                                <td>
                                    <p id="price-${currentStorage[index]['table_id']}">${formatRupiah(currentStorage[index]['price'].toString(), 'Rp. ' )}</p>
                                </td>
                                <td>
                                    <p id="total-${currentStorage[index]['table_id']}">${formatRupiah(priceTotal.toString(), 'Rp. ' )}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" id="remove-item-${currentStorage[index]['table_id']}" onclick="removeInput('${currentStorage[index]['table_id']}')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>`
            }
            element.empty()
            element.append(newElement)
            document.getElementById("price-total").innerHTML = formatRupiah(total.toString(), 'Rp. ' )
        } else {
            itemLen = 0
            element.empty()
            createColumn()
            updateTotal()
        }
        selectRefresh()
    }

    function createColumn(data = null) {
        let element = $('#table-product')
        itemLen+=1
        let nextItem = itemLen
        let optionProduct = ``
        let newElement = ''
        if(productMaster != null) {
            productMaster.forEach((v) => {
                optionProduct += `<option value='${v['id']}-${v['name']}-${v['price']}'>${v['name']}</option>`
            })
        }

        newElement = `<tr id="product-${nextItem}">
                            <td id="num-${nextItem}">${document.getElementsByName("form-product-select[]").length+1}</td>
                            <td id="select-form-${nextItem}">
                                <select class="form-control my-select" id="form-product-select-${nextItem}" onchange="setUnitProduct(this, ${nextItem})" name="form-product-select[]">
                                    <option selected="selected" disabled="disabled">Pilih Produk</option>
                                    ${optionProduct}
                                </select>
                                <br>
                                <select class="form-control my-select" id="form-unit-select-${nextItem}" onchange="updateTable('${nextItem}')" name="form-unit-select[]">
                                    <option selected="selected" disabled="disabled">Pilih Satuan</option>
                                </select>
                            </td>
                            <td>
                                <input id="form-qty-${nextItem}" class="form-control" style="width: 80px" type="number" value="1" min="1" name="form-qty[]" oninput="updateTable('${nextItem}')">
                            </td>
                            <td>
                                <p id="price-${nextItem}">Rp. 0</p>
                            </td>
                            <td>
                                <p id="total-${nextItem}">Rp. 0</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" id="remove-item-${nextItem}" onclick="removeInput('${nextItem}')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>`
        element.append(newElement)
        selectRefresh()
    }

    function getDarkPixel(x, y) {
        // Return the pixels that will be printed black
        let red = imageData[((canvas.width * y) + x) * 4];
        let green = imageData[((canvas.width * y) + x) * 4 + 1];
        let blue = imageData[((canvas.width * y) + x) * 4 + 2];
        return (red + green + blue) > 0 ? 1 : 0;
    }

    function getImagePrintData() {
        if (imageData == null) {
            console.log('No image to print!');
            return new Uint8Array([]);
        }
        // Each 8 pixels in a row is represented by a byte
        let printData = new Uint8Array(canvas.width / 8 * canvas.height + 8);
        let offset = 0;
        // Set the header bytes for printing the image
        printData[0] = 29;  // Print raster bitmap
        printData[1] = 118; // Print raster bitmap
        printData[2] = 48; // Print raster bitmap
        printData[3] = 0;  // Normal 203.2 DPI
        printData[4] = canvas.width / 8; // Number of horizontal data bits (LSB)
        printData[5] = 0; // Number of horizontal data bits (MSB)
        printData[6] = canvas.height % 256; // Number of vertical data bits (LSB)
        printData[7] = canvas.height / 256;  // Number of vertical data bits (MSB)
        offset = 7;
        // Loop through image rows in bytes
        for (let i = 0; i < canvas.height; ++i) {
            for (let k = 0; k < canvas.width / 8; ++k) {
                let k8 = k * 8;
                //  Pixel to bit position mapping
                printData[++offset] = getDarkPixel(k8 + 0, i) * 128 + getDarkPixel(k8 + 1, i) * 64 +
                            getDarkPixel(k8 + 2, i) * 32 + getDarkPixel(k8 + 3, i) * 16 +
                            getDarkPixel(k8 + 4, i) * 8 + getDarkPixel(k8 + 5, i) * 4 +
                            getDarkPixel(k8 + 6, i) * 2 + getDarkPixel(k8 + 7, i);
            }
        }
        return printData;
    }

    function handleError(error) {
        console.log(error);
        // progress.hidden = true;
        printCharacteristic = null;
        // dialog.open();
    }

    function sendNextImageDataBatch(resolve, reject) {
        // Can only write 512 bytes at a time to the characteristic
        // Need to send the image data in 512 byte batches
        if (index + 512 < data.length) {
            printCharacteristic.writeValue(data.slice(index, index + 512)).then(() => {
                    index += 512;
                    sendNextImageDataBatch(resolve, reject);
                })
                .catch(error => reject(error));
        } else {
            // Send the last bytes
            if (index < data.length) {
                printCharacteristic.writeValue(data.slice(index, data.length)).then(() => {
                        resolve();
                    })
                    .catch(error => reject(error));
            } else {
                resolve();
            }
        }
    }

    function sendImageData() {
        index = 0;
        data = getImagePrintData();
        return new Promise(function(resolve, reject) {
            sendNextImageDataBatch(resolve, reject);
        });
    }

    function setTextBody(data) {
        let today = new Date();
        today = `${("0" + today.getDate()).slice(-2)}/${("0" + (today.getMonth()+1)).slice(-2)}/${today.getFullYear()} ${("0" + today.getHours()).slice(-2)}:${("0" + today.getMinutes()).slice(-2)}`

        let printData = []
        let itemTotal = 0
        let total = 0
        let productLen = 13
        let unitLen = 4
        let qtyLen = 4
        let priceLen = 9
        let totalLen = 20
        let totalAllText = ''
        bodyMessage = ''
        // let products = JSON.parse(data)
        console.log(data);
        
        data.forEach((v) => {
            let produkSplit = v['name'].split('')
            let unitSplit = v['unit'].split('')
            let qtySplit = v['qty'].toString().split('')
            
            let price = parseInt(v['price']) * parseInt(v['qty'])
            itemTotal+=1
            total += price

            // QTY
            let qtyText = ''
            for (let index = 0; index < qtyLen; index++) {
                if(qtySplit.length > index) {
                    qtyText += qtySplit[index]
                } else {
                    qtyText += ' '
                }
            }

            // UNIT
            let unitText = ''
            for (let index = 0; index < unitLen; index++) {
                if(unitSplit.length > index) {
                    unitText += unitSplit[index]
                } else {
                    unitText += ' '
                }
            }
            
            
            // PRICE
            let priceIndex = 0
            let totalText = ''
            let priceLength = (price.toString().length <= 6) ? price.toString().length : price.toString().length+1
            for (let index = 0; index < (priceLen-(priceLength)); index++) {
                totalText += ' '
            }
            totalText += formatRupiah(price.toString(), ' ')

            // PRODUCT
            if(v['name'].length >= productLen) {
                let productName = produkSplit.slice(0,productLen-1).join('')
                productName+= ` `
                printData.push(`${productName}${qtyText}${unitText}${totalText}`)
            } else {
                let productName = ''
                for (let index = 0; index < productLen; index++) {
                    if(produkSplit.length > index) {
                        productName += produkSplit[index]
                    } else {
                        productName += ' '
                    }
                }
                printData.push(`${productName}${qtyText}${unitText}${totalText}`)
            }
        })

        let totalIndex = 0
        let totalTxtLen = (total.toString().length <= 6) ? total.toString().length : total.toString().length+1
        for (let index = 0; index < (priceLen-totalTxtLen); index++) {
            totalAllText += ' '
        }
        totalAllText += formatRupiah(total.toString(), 'Rp. ')
        
        let format1 = `

TGL: ${today}    #${data[0]['nota']}
--------------------------------`
printData.forEach((v) => {
    format1 += `\n${v}`
})
format1 += `
--------------------------------
${itemTotal} Item  Total  :  ${totalAllText}

   Terimakasih Sudah Berbelanja 


`
console.log(format1);
        let format2 = `


Tanggal : 20-04-2020 16:00:00
Nota : #930123120492
--------------------------------
Nama                     Total
IND Kari/Dus
1 x 2400000             24000000
IND Soto/Pack           
10 x 2400000            24000000
IND Goreng/Renceng        
10 x 2400000            24000000
IND Kocok BDG/Pcs       
100 x 2400000           24000000
--------------------------------
Item : 6
Total            RP. 111.200.000

   Terimakasih Sudah Berbelanja 

`
        bodyMessage = format1
    }

    function sendTextData() {
        // console.log(data);
        
        // Get the bytes for the text
        let encoder = new TextEncoder("utf-8");
        
        // Add line feed + carriage return chars to text
        let text = encoder.encode(bodyMessage + '\u000A\u000D');
        return printCharacteristic.writeValue(text).then(() => {
            console.log('Write done.');
        });
    }

    function sendPrinterData() {
        // Print an image followed by the text
        sendImageData()
            .then(sendTextData)
            .then(() => {
                // progress.hidden = true;
            })
            .catch(handleError);
    }

    function printNow() {
        // pro?gress.hidden = false;
        if (printCharacteristic == null) {
            navigator.bluetooth.requestDevice({
                    filters: [{
                        services: ['000018f0-0000-1000-8000-00805f9b34fb']
                    }]
                })
                .then(device => {
                    console.log('> Found ' + device.name);
                    console.log('Connecting to GATT Server...');
                    return device.gatt.connect();
                })
                .then(server => server.getPrimaryService("000018f0-0000-1000-8000-00805f9b34fb"))
                .then(service => service.getCharacteristic("00002af1-0000-1000-8000-00805f9b34fb"))
                .then(characteristic => {
                    // Cache the characteristic
                    printCharacteristic = characteristic;
                    sendPrinterData();
                })
                .catch(handleError);
        } else {
            sendPrinterData();
        }
    }

    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById('nota-content');
        let opt = {
            margin: 1,
            // filename: 'myfile.',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'px',
                format: [300.0, element.offsetHeight + 100],
                orientation: 'portrait'
            }
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).output('img').save();
        // printNow()
        // $('#modal-nota').modal('toggle');
        document.getElementById('view-nota').style.display = 'none'
    }

    function print(data = null) {
        let printData = (data != null) ? data : JSON.parse(window.localStorage.getItem('last_products'))
        setTextBody(printData)
        printNow()
    }

    function makeTableTransaction(data) {
        console.log(data);
        let heading =
            `<thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nota</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th class="no-content">Actions</th>
                </tr>
            </thead>`
        let item = ''
        let index = 0
        if (data.length > 0) {
            data.forEach(element => {
                let total = 0
                let products = JSON.parse(element['products'])
                for (let index = 0; index < products.length; index++) {
                    total += products[index]['qty'] *
                        products[index]['price']
                }
                item += `<tr>
                <td>${index+1}</td>
                <td>User</td>
                <td>${element['nota']}</td>
                <td>${element['created_at']}</td>
                <td>${formatRupiah(total.toString(), 'Rp. ')}</td>
                <td>
                    <button type="button" onclick='print(${element['products']})'><i class="far fa-file"></i></button>
                </td>
                </tr>`
                index += 1
            })
        } else {
            item += `<tr>
                    <td colspan="6" class="text-center">Data Kosong</td>
                </tr>`
        }

        let body = `<tbody>${item}</tbody>`
        console.log(body)
        $("#table-transaction").empty()
        $("#table-transaction").append(heading, body)
        // document.getElementById('form-price-total').innerText = formatRupiah(total.toString(), 'Rp. ')
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
                productMaster = data
                if (data != null) {
                    $("#form-product-select-1").empty();
                    let defOpt = document.createElement('option');
                    defOpt.innerHTML = "Pilih Produk";
                    defOpt.disabled = true
                    defOpt.selected = true
                    document.getElementById('form-product-select-1').appendChild(defOpt);
                    for (var i = 0; i <= data.length; i++) {
                        if (data[i] != null) {
                            var opt = document.createElement('option');
                            opt.value = `${data[i]['id']}-${data[i]['name']}-${data[i]['price']}`
                            opt.innerHTML = `${data[i]['name']}`;
                            document.getElementById('form-product-select-1').appendChild(opt);
                        }
                    }
                    loadData()
                }
            }
        }
        http.send()
    }

    function setUnitProduct(data, index) {
        let unitData = data.value.split('-') 
        if (unitData != null) {
            let priceData = JSON.parse(unitData[unitData.length - 1]) 
            $(`#form-unit-select-${index}`).empty();
            let defOpt = document.createElement('option');
            defOpt.innerHTML = "Pilih Satuan";
            defOpt.disabled = true
            defOpt.selected = true
            document.getElementById(`form-unit-select-${index}`).appendChild(defOpt);
            console.log(priceData);
            for (var i = 0; i <= priceData.length; i++) {
                if (priceData[i] != null) {
                    var opt = document.createElement('option');
                    opt.value = `${priceData[i]['unit_id']}-${priceData[i]['unit_name']}-${priceData[i]['price']}`
                    opt.innerHTML = `${formatRupiah(priceData[i]['price'].toString(), 'Rp. ' )}/${priceData[i]['unit_name']}`;
                    document.getElementById(`form-unit-select-${index}`).appendChild(opt);
                }
            }
        }
    }

    function get(page = 1, date = null) {
        console.log(date);
        let dateQuery = ''
        if(date != null) {
            let splitDate = date.value.split(" ")
            if(splitDate.length == 3) {
                dateQuery = `&from=${splitDate[0]}&to=${splitDate[splitDate.length-1]}`
            } else {
                let currentDate = new Date()
                dateQuery = `&from=${splitDate[0]}&to=${currentDate.getFullYear()}-${("0" + (currentDate.getMonth()+1)).slice(-2)}-${("0" + (currentDate.getDate()+1)).slice(-2)}`
            }
            
        }
        let http = new XMLHttpRequest() 
        let url = `api${urlPath}`
        let params = `page=1&search=&show=10&order_by=id&order_type=desc${dateQuery}`
        http.open('GET', `${url}?${params}`,
            true) //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        http.setRequestHeader('X-CSRF-TOKEN', csrf) 
        http.onreadystatechange = function() { //Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                let data = JSON.parse(http.responseText).data.data 
                makeTableTransaction(data)
            }
        }
        http.send()
    }

    function store() {
        const formData = new FormData() 
        let url = `api${urlPath}`;
        formData.append('nota', JSON.parse(window.localStorage.getItem('last_products'))[0]['nota']) 
        formData.append('products', window.localStorage.getItem('current_products')) 
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            window.localStorage.setItem('last_products', window.localStorage.getItem('current_products'))
            window.localStorage.removeItem('current_products');
            loadData()
        })
        .catch(error => {
            console.error(error)
        })
    }

    getProduct()
    get()
    selectRefresh()
</script>
@endsection