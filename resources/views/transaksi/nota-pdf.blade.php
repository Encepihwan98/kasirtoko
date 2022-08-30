<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h3>Nama User</h3>
                    <pre>
{{-- Street 15
123456 City
United Kingdom --}}
<br /><br />
Date: {{$data['created_at']}}
Identifier: #{{$data['nota']}}
Status: Paid
</pre>


                </td>
                <td align="center">
                    <img src="/path/to/logo.png" alt="Logo" width="64" class="logo" />
                </td>
                <td align="right" style="width: 40%;">

                    <h3>CompanyName</h3>
                    <pre>
                    https://company.com

                    Street 26
                    123456 City
                    United Kingdom
                </pre>
                </td>
            </tr>

        </table>
    </div>


    <br />

    <div class="invoice">
        <h3>Nota #{{$data['nota']}}</h3>
        <table width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Quantity</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($data['transaction_detail'] as $detail)
                    <tr>
                        <td>{{$detail['product']['name']}}/{{$detail['product']['unit']['name']}}</td>
                        <td align="center">{{$detail['qty']}}</td>
                        <td align="center">Rp. {{number_format($detail['product']['price'],2,',','.')}}</td>
                        <td align="center">Rp. {{number_format($detail['product']['price'] * $detail['qty'],2,',','.')}}</td>
                    </tr>
                    @php
                        $total += $detail['product']['price'] * $detail['qty'];
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="left">Total</td>
                    <td align="center" class="gray">Rp. {{number_format($total,2,',','.')}}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="information" style="position: absolute; bottom: 0;">
        <table width="100%">
            <tr>
                <td align="left" style="width: 50%;">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                <td align="right" style="width: 50%;">
                    Company Slogan
                </td>
            </tr>

        </table>
    </div>
</body>

</html>
