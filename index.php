
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Checkout Example</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Accept Money from AirtelTigo And MTN" />
    <!-- //Meta tag Keywords -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //google fonts -->

    <!-- custom Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <!-- daterange css-->
    <link rel="stylesheet" type="text/css" href="css/lightpick.css">
    <!-- //daterange css-->

    <script>
        function myFunction() {
          var x = document.getElementById("dontRefresh");
              n = document.getElementById('network').options;
              o = document.getElementById('network').selectedIndex;
          if (n[o].text === "MTN") {
            alert("Please click OK and \n 1. Dial *170# \n 2. Select option 6) Wallet \n 3. Select 3) My Approvals \n  4. Enter Mobile Money PIN \n  5. Select the transaction from the list \n  6. Confirm the transaction");
             x.innerHTML = "Please Dont Refresh This Page <br /> 1. Dial *170# <br /> 2. Select option 6) Wallet <br /> 3. Select 3) My Approvals <br />  4. Enter Mobile Money PIN <br />  5. Select the transaction from the list <br />  6. Confirm the transaction";
         }
          else if (n[o].text === "AirtelTigo") {
            alert("We are waiting for you \n Please click OK and wait for Authorization and Enter Pin to confirm payment");
            x.innerHTML = "Please Dont Refresh This Page <br /> Please click OK and wait for Authorization and Enter Pin to confirm payment";
          }
          else {
            alert("transaction failed");
          }
        }
        </script>


</head>

<body>
    <!-- form section start -->
    <section class="w3l-travel-form">
        <!-- /form -->
        <div class="travel-form-grid">
            <div class="wrapper">
                <div class="logo">
                    
                    <a class="brand-logo" href="index.html"> Checkout Example <span>(MTN & AirtelTigo)</span></a>
                    <div class="card">
                        <div class="card-body">
                        <div id="dontRefresh" center=""></div>
                        </div>
                    </div>
                    
                </div>
                <div class="travel-block-grid">
                    <div class="travel-left-img align-end">
                        <img src="images/travel.png" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
                        <div class="booking-form-content">
                            <form action="mprocess.php" class="book-depature-6 signin-form" method="POST" enctype="multipart/form-data">
                                <h2>Operator Type</h2>
                                <div class="input-grids mt-3">
                                    <div class="hny-frm_grid">
                                        <select name="operator" id="network" required="">
                                            <option>MTN</option>
                                            <option>AirtelTigo</option>
                                        </select>
                                    </div>
                                </div>

                                <h2>Amount</h2>
                                <div class="input-grids">
                                    <div class="hny-frm_grid">
                                        <input class="name" name="amount" type="number" placeholder=""
                                            required="">
                                    </div>
                                </div>

                                <h2>Momo Number</h2>
                                <div class="input-grids">
                                    <div class="hny-frm_grid">
                                        <input class="name"name="user_number" id="user_number" type="number" placeholder=""
                                            required="">
                                    </div>
                                </div>

                                <h2>.</h2>
                                <input type="hidden"  name="orderId" id="orderId" value="<?php echo rand(); ?>" required="">
                                <input type="submit"  onclick="myFunction()" id="submit" value="Submit Payment" class="btn btn-style mt-3"></input>
                               <!-- <p class="already">Already have an account? <a href="#signin">Signin</a></p> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper">
                <p class="copy-footer-29">Software Engineering project work | Powered by Mazzuma API</p>
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->

    <!-- all js -->
    <script src="js/moment.min.js"></script>
    <script src="js/lightpick.js"></script>
</body>
</html>