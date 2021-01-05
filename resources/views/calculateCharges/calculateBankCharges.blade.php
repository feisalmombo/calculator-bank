<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>MarketPlace | Calculate Bank Charges</title>

      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('temp/images/favicon.png')}}">
      <!-- Favicon icon -->

      <!-- Web Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
       <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
       <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

       {{--  <link href="//fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
       <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">  --}}
       <!-- //web fonts -->
      <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('temp/assets/css/style-starter.css') }}">
  <style>
    html {
    margin: 40px auto;
    }
    .btn-search {
        background: #C64343;
        border-radius: 0;
        color: #fff;
        border-width: 1px;
        border: #C64343;
        border-color: #C64343;
        }
	.btn-search:link, .btn-search:visited {
	  color: #C64343;
	}
	.btn-search:active, .btn-search:hover {
	  background: #C64343;
	  color: #C64343;
    }

    .panel {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    }
  </style>
  </head>
  <body>
<div class="w3l-bootstrap-header fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light p-2">
    <div class="container">
    <a class="navbar-brand" href="{{url('/')}}"><strong style="color:#2B3483">MarketPlace</strong><strong style="color:#E58225">.</strong></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="form-inline">
          <a href="#" class="help mr-4">Our Process</a>
        </div>

        <div class="form-inline">
          <a href="#" class="about mr-4">Loan Products</a>
        </div>

        <div class="form-inline">
        <a href="#" class="faq mr-4">FAQs</a>
        </div>

        <div class="form-inline">
          <a href="{{ route('login') }}" class="btn btn-warning sign" style="border-radius: 90px;"><strong style="color:white;">Sign in</strong></a>
        </div>

      </div>
    </div>
  </nav>
</div>
<br>
<br>

@include('msgs.success')

<br>
<br>
 {{-- @if(session()->has('message')) --}}
 @if(Session::has('sort_data'))
 @foreach(Session::get('sort_data') as $key=>$calculatedata)
@endforeach
<div class="container" style="float:left">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="container">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Total Fees: {{ number_format($calculatedata, 2) }}</h3>
                        </div>
                        {{-- <div class="panel-body">
                            Total fees
                            {{ $calculatedata }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<br>
<br>

<div class="container">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="container">
                <div class="col-xl-12">
                <form role="form"  action="{{ url('/calculate/bank/charges') }}" method="POST">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            <h4>Please Fill the Form</h4>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            <label for="bank">Bank</label>
                            <select class="form-control" name="bank_id" id="bank" required="required">
                                <option value="">-- Select Bank --</option>
                                @foreach($banks as $key => $bank)
                                <option value="{{$key}}"> {{$bank}}</option>
                                @endforeach
                            </select>

                            {{-- @if ($errors->has('bank_id'))
                            <span class="help-block">
                                <strong style="color: #A94442;">{{ $errors->first('bank_id') }}</strong>
                            </span>
                            @endif --}}
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            <label for="accountType">Type of Account</label>
                            <select name="accountType_id" id="accountType" class="form-control" required="required" >
                            </select>

                            {{-- @if ($errors->has('accountType_id'))
                            <span class="help-block">
                                <strong style="color: #A94442;">{{ $errors->first('accountType_id') }}</strong>
                            </span>
                            @endif --}}
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            <label for="currency">Currency</label>
                            <select name="currency" id="currency" class="form-control" required="required" >
                            </select>

                            {{-- @if ($errors->has('currency'))
                            <span class="help-block">
                                <strong style="color: #A94442;">{{ $errors->first('currency') }}</strong>
                            </span>
                            @endif --}}
                        </div>
                    </div>
                    <br>

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            <h2>Transactions</h2>
                            <p><strong style="color: black;">ATM VISA Debit Card</strong></p>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="atmwithkcb">ATM withdrawal from KCB ATMs</label>
                            <input type="text" id='atmwithkcb' name="atmwithkcb" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="atmwithnonkcb">ATM withdrawal from Non-KCB ATMs</label>
                            <input type="text" id='atmwithnonkcb' name="atmwithnonkcb" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="atmwithstmt">ATM mini statements</label>
                            <input type="text" id='atmwithstmt' name="atmwithstmt" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        {{--  <div class="form-group col-md-4">
                            <label for="dailylimit">Daily Limit</label>
                            <input type="text" id='dailylimit' name="dailylimit" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>  --}}
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="minimumwith">Minimum withdrawals</label>
                            <input type="text" id='minimumwith' name="minimumwith" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="atmcardreplace">ATM Card Repalcement</label>
                            <input type="text" id='atmcardreplace' name="atmcardreplace" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="cardrenewal">Card Renewal</label>
                            <input type="text" id='cardrenewal' name="cardrenewal" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        {{--  <div class="form-group col-md-4">
                            <label for="atmcardissuance">ATM Card Issuance</label>
                            <input type="text" id='atmcardissuance' name="atmcardissuance" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>  --}}
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-8">
                            {{-- <h2>Transactions</h2> --}}
                            <p><strong style="color: black;">Standing Order</strong></p>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="withinkcb">within KCB </label>
                            <input type="text" id='withinkcb' name="withinkcb" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="outotherbanks">Outward to other banks</label>
                            <input type="text" id='outotherbanks' name="outotherbanks" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <label for="setupstandingorder">Setup/Amend Standing Order</label>
                            <input type="text" id='setupstandingorder' name="setupstandingorder" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="unpaidpenalty">Unpaid Standing Order (penalty) </label>
                            <input type="text" id='unpaidpenalty' name="unpaidpenalty" required="required" class="form-control" placeholder="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary">Calculate fees</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- @if(Session::has('sort_data'))
@foreach(Session::get('sort_data') as $key=>$calculatedata)
@endforeach
<div class="container" style="float:left">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="container">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Total Fees: {{ number_format($calculatedata, 2) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<br>
<br> --}}


<!-- Footer -->
<section class="w3l-market-footer">
<footer class="footer-28">
    <div class="footer-bg-layer">
    <div class="container py-lg-3">
        <div class="row footer-top-28">
        <div class="col-md-6 footer-list-28 mt-5">
            <h1 class="footer-title-28"><strong style="color: #2B3483;">MarketPlace</strong><strong style="color: #E58225;">.</strong></h1>
        </div>
        <div class="col-md-6">
            <div class="row">
            <div class="col-md-6 footer-list-28 mt-5">
                <h6 class="footer-title-28">Quick Links</h6>
                <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">FAQs</a></li>
                </ul>
            </div>

            <div class="col-md-6 footer-list-28 mt-5">
                <h6 class="footer-title-28">Legal Stuff</h6>
                <ul>
                <li><a href="#">Disclaimer</a></li>
                <li><a href="#">Financing</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>

            </div>
        </div>
        </div>
    </div>


    <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
        <div class="container">
        <p class="copy-footer-28 text-center"> &copy; 2020 MarketPlace<strong style="color: yellow;">.</strong> All Rights Reserved. A Product by <a
            href="https://getpesa.co.tz/" target="_blank">GetPesa </a></p>
        </div>
    </div>
    </div>
</footer>

<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    &#10548;
</button>

<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
    scrollFunction()
    };

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
    } else {
        document.getElementById("movetop").style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    }
</script>
<!-- /move top -->
</section>
<!-- Footer -->

<!-- jQuery, Bootstrap JS -->
{{--  <script src="{{asset('temp/assets/js/jquery-3.3.1.min.js')}}"></script>  --}}
{{--  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  --}}
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="{{asset('temp/assets/js/jquery-3.3.1.min.js')}}"></script>


<script src="{{asset('temp/assets/js/bootstrap.min.js')}}"></script>

<script>
    function FormatCurrency(ctrl) {
             //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
             if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                 return;
             }

             var val = ctrl.value;

             val = val.replace(/,/g, "")
             ctrl.value = "";
             val += '';
             x = val.split('.');
             x1 = x[0];
             x2 = x.length > 1 ? '.' + x[1] : '';

             var rgx = /(\d+)(\d{3})/;

             while (rgx.test(x1)) {
                 x1 = x1.replace(rgx, '$1' + ',' + '$2');
             }

             ctrl.value = x1 + x2;
         }

         function CheckNumeric() {
             return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
         }
</script>

<script type="text/javascript">
    $('#bank').change(function() {
        var bankID = $(this).val();
        // console.log(bankID);
        if (bankID) {
            $.ajax({
                type: "GET",
                url: "/all/account/types/list/?bank_id=" + bankID,
                success: function(res) {
                    if (res) {
                        // console.log(res);
                        $("#accountType").empty();
                        $("#accountType").append('<option>Select Type of Account</option>');
                        $.each(res, function(key, value) {
                            // console.log(value);
                            $("#accountType").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#accountType").empty();
                    }
                }
            });
        } else {
            $("#accountType").empty();
            $("#currency").empty();
        }
    });
    $('#accountType').on('change', function() {
        var accountTypeID = $(this).val();
        // console.log(accountTypeID);
        ;
        if (accountTypeID) {
            $.ajax({
                type: "GET",
                url: "/all/currencies/list/?accountType_id=" + accountTypeID,
                success: function(res) {
                    if (res) {
                        // console.log(res);
                        $("#currency").empty();
                        $("#currency").append('<option>Select Currecy</option>');
                        $.each(res, function(key, value) {
                            $("#currency").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#currency").empty();
                    }
                }
            });
        } else {
            $("#currency").empty();
        }

    });
</script>

</body>
</html>
