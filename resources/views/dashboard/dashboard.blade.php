@extends('layout.master')

@section('content')

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
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
                    <span class="w-numeric-title">Omset Hari Ini</span>
                    <span class="w-value"> Rp. <span id="omset"></span> </span>
                    <!-- <span class="w-numeric-title">Total Orders</span> -->
                </div>
            </div>
            <!-- <div class="w-chart">
                <digv id="total-orders"></digv>
            </div> -->
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12 layout-spacing">
    <div class="widget-two">
        <div class="widget-content">
            <div class="w-numeric-value">
                <div class="w-content">
                    <span class="w-numeric-title">Omset Bulan Ini</span>
                    <span class="w-value">Rp. <span id="omsetMonth"></span> </span>
                </div>
                <div class="w-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-12 layout-spacing">
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
                    <span class="w-numeric-title">Omset Tahun Ini</span>
                    <span class="w-value"> Rp. <span id="omsetYear"></span> </span>
                   
                </div>
            </div>
            
        </div>
    </div>
</div> -->

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget-two">
        <div class="widget-content">
            <div id="">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script>
    let csrf = document.querySelector('meta[name="csrf-token"]').content
    let urlPath = '/monthly-sales'
    let urlApi = '/omset-period'

    function makeDashboard(data) {
        console.log(data);
        let omset = document.getElementById("omset");
        let omsetMonth = document.getElementById("omsetMonth");
        let omsetYear = document.getElementById("omsetYear");
        omset.innerHTML = data.omsetDay;
        omsetMonth.innerHTML = data.omset;
        omsetYear.innerHTML = data.omsetYear;
    }

    function makeChart(data) {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: '',
                    data: data.omset,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
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

    }

    function getOmsetPeriod(page = 1) {
        let jttp = new XMLHttpRequest()
        let urlAp = `api${urlApi}`
        jttp.open('GET', `${urlAp}`, true)

        //Send the proper header information along withf the request
        jttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        jttp.setRequestHeader('X-CSRF-TOKEN', csrf)
        // alert("hai");
        jttp.onreadystatechange = function() { //Call a function when the state changes.
            // alert(http.responseText);
            if (jttp.readyState == 4 && jttp.status == 200) {
                // alert(http.responseText);
                makeChart(JSON.parse(jttp.responseText))
                // let data = JSON.parse(http.responseText)
                // alert(data);
                // makePagination(JSON.parse(http.responseText), 'category')
            }
        }
        jttp.send()

    }

    getOmsetPeriod()
    get()
</script>
@endsection