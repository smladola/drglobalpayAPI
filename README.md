# DR Global Payment API
Below is the simple API form sample.

## Transaction API

Please follow the above two step for the integrate payment API in your website.

### Step - 1 Create index.php file
in the first step we need to create index.php file for a simple form.

```html
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

    <title>DR GLOBAL</title>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body style="background-color: #fff;">
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <img src="https://drglobalpay.com/theme/assets/images/logo.png" class="img-fluid" alt="" width="450px">
                </div>
            </div>        
        </div>

        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <?php
                            if(isset($_SESSION['status']) && !empty($_SESSION['status']) && $_SESSION['status'] == 'success') {
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Your transaction was approved.
                            </div>
                        <?php
                            unset($_SESSION["status"]);
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['status']) && !empty($_SESSION['status']) && $_SESSION['status'] == 'fail') {
                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Your transaction was declined.
                            </div>
                        <?php
                            unset($_SESSION["status"]);
                            }
                        ?>
                    </div>
                    <br />
                    <div class="col-md-12">    
                        <h4 class="text-center">Payment Form</h4>
                    </div>
                </div>
                <form class="form-horizontal" method="POST" action="submit.php">
                <div class="row py-4">    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 ">
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="col-md-12 col-form-label">First Name</label>
                                            <div class="col-md-12">
                                                <input id="first_name" type="text" class="form-control" name="first_name" value="" placeholder="First Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class="col-md-12 col-form-label">Last Name</label>
                                            <div class="col-md-12">
                                                <input id="last_name" type="text" class="form-control" name="last_name" value=""placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="col-md-12 col-form-label">Address</label>
                                            <div class="col-md-12">
                                                <input id="address" type="text" class="form-control" name="address" value=""placeholder="Address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="col-md-12 col-form-label">Country</label>
                                            <div class="col-md-12">
                                                <input id="country" type="text" class="form-control" name="country" value=""placeholder="Ex:US" required>
                                                <code>Valid only 2 letter country code (Ex:US)</code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" class="col-md-12 col-form-label">State</label>
                                            <div class="col-md-12">
                                                <input id="state" type="text" class="form-control" name="state" value=""placeholder="State" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city" class="col-md-12 col-form-label">City</label>
                                            <div class="col-md-12">
                                                <input id="city" type="text" class="form-control" name="city" value=""placeholder="City" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-md-12 col-form-label">Email</label>
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control" name="email" value=""placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="col-md-12 col-form-label">Phone No.</label>
                                            <div class="col-md-12">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value=""placeholder="Phone No." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone_number" class="col-md-12 col-form-label">Zipcode</label>
                                            <div class="col-md-12">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value=""placeholder="Zipcode" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="amount" class="col-md-12 col-form-label">Amount</label>
                                            <div class="col-md-12">
                                                <input id="amount" type="text" class="form-control" name="amount" value=""placeholder="Amount" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="currency" class="col-md-12 col-form-label">Currency</label>
                                            <div class="col-md-12">
                                                <select name="currency" id="currency" class="form-control" required>
                                                    <option value="USD">USD</option>
                                                    <option value="GBP">GBP</option>
                                                </select>
                                                <code>Valid 3 letter currency code (Ex:USD)</code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="card_number" class="col-md-12 col-form-label">Card No.</label>
                                            <div class="col-md-12">
                                                <input id="card_number" type="text" class="form-control" name="card_number" value=""placeholder="Card No." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expiry_month" class="col-md-12 col-form-label">Exp. Month</label>
                                            <div class="col-md-12">
                                                <select name="expiry_month" id="expiry_month" class="form-control" required>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expiry_year" class="col-md-12 col-form-label">Exp. Year</label>
                                            <div class="col-md-12">
                                                <select name="expiry_year" id="expiry_year" class="form-control" required>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cvv" class="col-md-12 col-form-label">CVV</label>
                                            <div class="col-md-12">
                                                <input id="cvv" type="text" class="form-control" name="cvv" value=""placeholder="CVV" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <button type="submit" class="btn btn-success" id="submitForm" style="color: #fff; font-weight: bold; background-color: #3D93FA; border-color: #3D93FA;">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="js/app.js"></script>
</body>
</html>
```


### Step - 2 Create submit.php file
```php 
<?php
session_start();

$url = "https://drglobalpay.com/api/test-transaction";
$key = "63D5Rid5s205xblO6Q7R0driMXhur9KdrHzEQWk3X4H2ztTrNZMHRbJEljNhtSMMaB";

$data = [
    'api_key' => $key,
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'address' => 'Address',
    'customer_order_id' => time(),
    'country' => 'US',
    'state' => 'NY', 
    'city' => 'New York',
    'zip' => '38564',
    'ip_address' => '127.0.0.1',
    'email' => 'your@gmail.com',
    'phone_number' => '+101234567890',
    'amount' => '10.00',
    'currency' => 'USD',
    'card_number' => '4242424242424242',
    'expiry_month' => '02',
    'expiry_year' => '2022',
    'cvv' => '123',
    'response_url' => 'http://localhost:8003redirect.php',
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER,[
    'Content-Type: application/json'
]);
$response = curl_exec($curl);
curl_close($curl);

$responseData = json_decode($response);

print_r($responseData);exit();

if($responseData->status == '3d_redirect') {
    header("Location: ".$responseData->redirect_3ds_url);
} elseif ($responseData->success) {
    $_SESSION["status"] = 'success';
    header("Location: index.php");
} else {
    $_SESSION["status"] = 'fail';
    header("Location: index.php");
}
```