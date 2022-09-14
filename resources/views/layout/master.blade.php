<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kasir Toko</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
    <link href="{{ asset('assets/css/elements/search.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layout.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('layout.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    @yield('content')
                </div>

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank"
                            href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script> -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/font-icons/feather/feather.min.js') }}"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <!-- <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script> -->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <!-- <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script> -->
    <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
    <!-- <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script> -->
    <!-- <script src="{{ asset('assets/js/elements/custom-search.js') }}"></script> -->

    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>

    <script>
        function isNumeric(str) {
            if (typeof str != "string") return false // we only process strings!
            return !isNaN(str) &&
                // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
                !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
        }

        function makePagination(data, type) {
            let fixData = data.data
            let page = `<div class="dt--pages-count  mb-sm-0 mb-3">
                            <div class="dataTables_info" id="alter_pagination_info" role="status" aria-live="polite">
                                Tampilkan ${fixData.current_page} dari ${fixData.last_page} halaman</div>
                        </div>`
            let show = isNumeric(document.getElementById("input-show").value) ? document.getElementById("input-show")
                .value : 10
            let item = ''
            if (fixData.total > 0) {
                if (fixData.current_page == 1) {
                    item += `<li class="paginate_button page-item previous disabled" id="alter_pagination_previous">
                                <a href="#" aria-controls="alter_pagination" data-dt-idx="1" tabindex="0"
                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></a>
                            </li>`
                } else {
                    item += `<li class="paginate_button page-item previous" id="alter_pagination_previous">
                                <a href="#" onclick="get(${(fixData.current_page-1)})" aria-controls="alter_pagination" data-dt-idx="1" tabindex="0"
                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></a>
                            </li>`
                }
                let count = 0
                for (let i = fixData.current_page; i <= fixData.last_page; i++) {
                    count++

                    if (fixData.current_page == i) {
                        item += `<li class="paginate_button page-item active"><a href="#"
                                    aria-controls="alter_pagination" data-dt-idx="2" tabindex="0"
                                    class="page-link">${i}</a></li>`
                    } else {
                        item += `<li class="paginate_button page-item"><a href="#"
                                    aria-controls="alter_pagination" data-dt-idx="2" tabindex="0"
                                    class="page-link" onclick="get(${i})">${i}</a></li>`
                    }

                    if (count == 10) break
                }
                if (fixData.current_page != fixData.last_page) {
                    item += `<li class="paginate_button page-item next" id="alter_pagination_next"><a href="#" onclick="get(${(fixData.current_page+1)})"
                                                    aria-controls="alter_pagination" data-dt-idx="5" tabindex="0"
                                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12">
                                                        </line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg></a></li>`
                } else {
                    item += `<li class="paginate_button page-item next disabled" id="alter_pagination_next"><a href="#"
                                                    aria-controls="alter_pagination" data-dt-idx="5" tabindex="0"
                                                    class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12">
                                                        </line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg></a></li>`
                }
            }

            let pagination = `<div class="dt--pagination">
                                    <div class="dataTables_paginate paging_full_numbers" id="alter_pagination_paginate">
                                        <ul class="pagination">
                                            ${item}
                                        </ul>
                                    </div>
                                </div>`

            $(`#pagination-${type}`).empty()
            $(`#pagination-${type}`).append(page, pagination)
        }

        function getFormData(elementID) {
            let params = []
            let form = document.getElementById(elementID)
            for (let i = 0; i < form.elements.length; i++) {
                let e = form.elements[i]
                params.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value))
            }
            let allParams = params.join("&")
            return allParams
        }

        function setAsFormData(elementID) {
            let form = document.getElementById(elementID)
            const formData = new FormData()
            for (let i = 0; i < form.elements.length; i++) {
                formData.append(form.elements[i].name, form.elements[i].value)
            }
            return formData
        }

        function setFormData(elementID, data) {
            let form = document.getElementById(elementID)
            for (let i = 0; i < form.elements.length; i++) {
                let e = form.elements[i]
                if (e.name != 'image') {
                    e.value = data[e.name];

                }
            }
        }

        function filter(page = 1) {
            let search = document.getElementById("input-search").value
            let show = document.getElementById("input-show").value
            let order_by = "id"
            let order_type = "asc"

            return `page=${page}&search=${search}&show=${isNumeric(show) ? show : 10}&order_by=${order_by}&order_type=${order_type}`
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? `${prefix}` + rupiah : '');
        }

        function generateID(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() *
        charactersLength));
        }
        return result;
        }
    </script>

    @yield('js')

</body>

</html>
