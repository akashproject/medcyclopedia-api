<body style="width: 80%;margin: auto;font-family: sans-serif;color: #282828;"><div style="width: 100%;padding: 10px;box-shadow: 0 0 8px 0 rgb(0 0 0 / 14%);">
    <div style="width: 100%;padding-bottom: 20px;border-bottom: 1px solid #ccc;">
        <img src="http://bikriworld.com/assets/images/logo.png" style="width: 20%;">
    </div>
    <h3> Dear Seller, </h3><h3>
    <p style="margin: 0;"> Woohoo! We Love you already. Thank you for choosing to BikriWorld for your devices. </p>
    <p style="margin: 20px 0;"> We created a Service Number: {{$service_no}} for you, and the ability to track your Devices Status. </p>
    <table style="border: 2px solid;margin: 30px 0;">
        <thead>
            <tr style="background: #00986b;color: #fff;">
                <th colspan="2" style="padding: 10px 20px;"> Product Details </th>
            </tr>
        </thead>
        <tbody style="">
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Model Name </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$device_name}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Model Configuration </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$variation_type}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Additional Accessories </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;">
                    @foreach ($accessories as $accessory)
                        <span >{{ $accessory['name'] }},</span >
                    @endforeach	 
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Model Age </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$age}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Model Condition </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$condition}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Model Faults </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;">
                    @foreach ($questions as $question)
                        <span >{{ $question }}, <br></span >
                    @endforeach	 
                </td>
            </tr>
        </tbody>
    </table> 
    <table style="border: 2px solid;margin: 30px 0;">
        <thead>
            <tr style="background: #00986b;color: #fff;">
                <th colspan="2" style="padding: 10px 20px;"> Order Details </th>
            </tr>
        </thead>
        <tbody style="">
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Service No </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$service_no}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Payment Date </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$pickup_schedule}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Pickup address </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$pickup_address}},{{$pickup_city}},{{$pickup_state}}- {{$pincode}}  </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Payment Mode </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> {{$payment_mode}} </td>
            </tr>
            <tr>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Amount </td>
                <td style="padding: 10px 20px 10px;font-size: 20px;"> Rs. {{$amount}}/- </td>
            </tr>
        </tbody>
    </table>
    <p>        
        If you have queries, suggestions or just a good discussions. Drop me a message at the support@BikriWorld.in . We hope to see you again!
    </p>
    <p> 
        Team BikriWorld!
    </p>

</h3></div></body>