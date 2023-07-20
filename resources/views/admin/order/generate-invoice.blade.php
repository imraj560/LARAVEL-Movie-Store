<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Order Id: {{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Raju's Store</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $order->id }}</span> <br>
                    <span>Date: {{ $order->created_at }}</span> <br>
                    <span>Zip code : {{ $order->pincode }}</span> <br>
                    <span>Address: {{ $order->address }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id }}</td>

                <td>Full Name:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Email Id:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $order->created_at }}</td>

                <td>Phone:</td>
                <td>{{ $order->phone }}</td>
            </tr>
           
        </tbody>
    </table>

   
    <table class="table table-bordered table-striped">
        <thead>
            <th>Item Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
          

        </thead>

        <tbody>
            @php
                $totalprice = 0;
            @endphp
           @foreach ($order->orderItems as $orderItem)
            <tr>
                <td width="10%">{{ $orderItem->id }}</td>
                <td width="10%">{{ $orderItem->movie->name }}</td>

                <td width="10%">

                    @if($orderItem->movie->image)

                    <img src="{{ $orderItem->movie->image }}" style="width: 50px; height: 50px" alt="">

                    @else
                    <img src="" style="width: 50px; height: 50px" alt="">
                    @endif

                   

                </td>

                <td width="10%">{{ $orderItem->price }}</td>



            </tr>

            @php
                $totalprice += $orderItem->price;
            @endphp






           @endforeach

           <tr>
            <td colspan="3">Total Price</td>
            <td>{{ $totalprice }}</td>
           </tr>


        </tbody>
    </table>

</div>

  

    <br>
    <p class="text-center">
        Thank your for shopping with Raju's Store
    </p>

</body>
</html>
