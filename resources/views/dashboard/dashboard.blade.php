@extends('layout.master')

@section('content')
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget widget-three">
        <div class="widget-heading">
            <h5 class="">Omset Hari Ini</h5>
        </div>
        <div class="widget-content">

            <div class="order-summary">

                <div class="summary-list">
                    <div class="w-summary-details">

                        <div class="w-summary-info">
                            <h1>Rp. <span id="omset"></span></h1>
                            <!-- <p class="summary-count">$92,600</p> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget-two">
        <div class="widget-content">
            <div class="w-numeric-value">
                <div class="w-content">
                    <span class="w-value">Daily sales</span>
                    <span class="w-numeric-title">Go to columns for details.</span>
                </div>
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
            </div>
            <div class="w-chart">
                <div id="daily-sales"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget-one widget">
        <div class="widget-content">
            <div class="w-numeric-value">
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <div class="w-content">
                    <span class="w-value">3,192</span>
                    <span class="w-numeric-title">Total Orders</span>
                </div>
            </div>
            <div class="w-chart">
                <div id="total-orders"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
        let csrf = document.querySelector('meta[name="csrf-token"]').content
        let urlPath = '/monthly-sales'

        function makeDashboard(data){
            // console.log(data.omset);
            let omset = document.getElementById("omset");
            omset.innerHTML =  data.omset;
        }

        function get(page = 1) {
            let http = new XMLHttpRequest()
            let url = `api${urlPath}`
            http.open('GET', `${url}`, true)

            //Send the proper header information along withf the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            http.setRequestHeader('X-CSRF-TOKEN', csrf)
            // alert("hai");
            http.onreadystatechange = function() { //Call a function when the state changes.
                // alert(http.responseText);
                if (http.readyState == 4 && http.status == 200) {
                    // alert(http.responseText);
                    makeDashboard(JSON.parse(http.responseText))
                    // let data = JSON.parse(http.responseText)
                    // alert(data);
                    // makePagination(JSON.parse(http.responseText), 'category')
                }
            }
            http.send()
            document.getElementById('btn-submit').innerText = 'Save'
        }

        get()

    </script>
@endsection