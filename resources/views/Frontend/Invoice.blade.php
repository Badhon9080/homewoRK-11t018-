<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice</title>
    <style>
         body
         {font-family: Arial, Helvetica, sans-serif;

         }
    </style>
</head>
<body>
       <center>
            <table style="text-align:center;">
                <tr>
                    <td>
                       <h2>{{ env(APP_NAME) }}</h2>
                    </td>
                 </tr>
                 <tr>
                    <td>
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, dolor saepe at rerum provident ea.
                    </td>
                 </tr>
                 <tr>
                    <td style="padding:15px 0;"></td>
               </tr>
                 <tr style="text-align:left;">
                    <td><strong>Invoice No:{{ $order->transaction_id }}</strong>
                    </td>
                 </tr>
                 <tr style="text-align:left;">
                    <td><strong>Customer Name:{{ $order->name }}</strong>
                    </td>
                 </tr>
                 <tr style="text-align:left;">
                    <td><strong>Customer Phone:{{ $order->phone }}</strong>
                    </td>
                 </tr>
                 <tr>
                    <td style="padding:15px 0;"></td>
               </tr>
            </table>


               {{ $order }}

            <table style="width:100%;border:1px solid #999;max-width:800px" cellspacing="0" cellpadding="0"><tr>
                    <th style="border-bottom:1px solid #999; padding:15px 0;">#</th>
                    <th style="border-bottom:1px solid #999; padding:15px 0; ">product</th>
                    <th style="border-bottom:1px solid #999; padding:15px 0; ">qty</th>
                    <th style="border-bottom:1px solid #999; padding:15px 0; ">price</th>
                </tr>
                @php
                    $total=0;
                @endphp
                @foreach ($order->orderItems as $key=>$item)
                <tr style="text-align:center;">
                    <td style="border-bottom:1px solid #999; padding:15px 0;">{{ ++$key }}</td>
                    <td style="border-bottom:1px solid #999; padding:15px 0;">{{ $item->product->title }}</td>
                    <td style="border-bottom:1px solid #999; padding:15px 0;">{{ $item->qty }}</td>
                    <td style="border-bottom:1px solid #999; padding:15px 0;">{{ $item->amount }}TK</td>
                </tr>
                @php
                    $total+=$item->amount;
                @endphp
                @endforeach
                <tfoot>
                <tr>
                    <td></td>
                    <td colspan="2"><h5>Total Price</h5></td>
                    <td style="text-align:center;">{{ $total }}</td>
                </tr>
            </tfoot>
            </table>






       </center>
</body>
</html>
