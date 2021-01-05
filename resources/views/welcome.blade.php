
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MarketPlace | Homepage</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('temp/images/favicon.png')}}">
    <!-- Favicon icon -->

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
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
          <a href="{{ route('login') }}" class="btn btn-warning sign" style="border-radius: 90px;"><strong style="color:white;">Login</strong></a>
        </div>

      </div>
    </div>
  </nav>
</div>
<br>
<br>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach ($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
                @endforeach
              </ul>
            </div>
            @endif
            @if (Session::has('msg'))
            <div class="alert alert-danger" role="alert">
              <strong>{{ session('msg') }}</strong>
            </div>
            @endif
            @if (Session::has('msg1'))
            <div class="alert alert-success" role="alert">
              <strong>Success</strong>
              <p>
                {{ session('msg1') }}
              </p>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="w3l-index-block1">
  <div class="content">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5 content-left pt-md-0 pt-5">
          <h1>Free up for your financial desicions</h1>
          <p class="mt-3 mb-md-5 mb-4">MarketPlace is a smarter way to find financial products. Compare loans from multiple providers in one simple search.</p>
          <a class="btn btn-warning" href="{{ url('/calculate/bank/charges') }}" style="color: white;font-family:'Montserrat', sans-serif;">Calculate Now</a>
        </div>

        <div class="col-md-7 content-photo mt-md-0 mt-5">
        <img src="{{asset('temp/assets/images/main.jpg')}}" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>

    </div>
  </div>
</div>

<!-- Choose Product -->
<section class="w3l-index-block2 py-5">
    <div class="container py-md-3">
        {{-- <div class="heading text-center mx-auto">
            <h3 class="head">Activities </h3>
            <p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
              Nulla mollis dapibus nunc, ut rhoncus
              turpis sodales quis. Integer sit amet mattis quam.</p>
        </div> --}}
      <div class="row bottom_grids pt-md-3">
        <div class="col-lg-3 col-md-6 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <img src="{{asset('temp/assets/images/s1.png')}}" alt="" class="img-fluid" />
              <h6 class="my-3" style="color:black;">Choose a product</h6>
              <p class="">Get a decision in minutes with a fast process, low rates, simply by choosing your loan purpose.</p>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
              <img src="{{asset('temp/assets/images/s2.png')}}" alt="" class="img-fluid" />
              <h6 class="my-3" style="color:black;">Compare Products</h6>
              <p class="">Compare competitive loan rates in two minutes loans from over 40 banks in Tanzania.</p>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 mt-5">
          <div class="s-block">
            <a href="#blog-single.html" class="d-block p-lg-4 p-3">
            <img src="{{asset('temp/assets/images/s3.png')}}" alt="" class="img-fluid" />
              <h6 class="my-3" style="color:black;">Make a Request</h6>
              <p class="">Easily apply for your preferred product simply by completing your application online.</p>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5">
            <div class="s-block">
              <a href="#blog-single.html" class="d-block p-lg-4 p-3">
                <img src="{{asset('temp/assets/images/s2.png')}}" alt="" class="img-fluid" />
                <h6 class="my-3" style="color:black;">Track Application</h6>
                <p class="">Conveniently track the status of your application through an personalized attractive dashboard.</p>
              </a>
            </div>
          </div>
      </div>
    </div>
</section>
<!-- Product Loan Type -->

<!-- Get Started -->
<section>
    <div class="container">
        <div class="row">
            <div class="form-group col-lg-12 p-4" style="text-align:center;">
                <div class="get-started">
                    <a href="{{ url('/calculate/bank/charges') }}" class="btn btn-warning" style="border-radius: 100px;"><strong style="color:white;font-family:'Montserrat', sans-serif;">Calculate Now</strong></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get Started -->

<!-- Product Loan Type -->
 <div class="w3l-index-block4">
   <div class="features-bg py-5">
     <div class="container py-md-3">
       <div class="row">
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Personal Loans</h4>
                 <p>Access personal finance solutions to cater to your needs from Unsecured loans, student loans, overdraft facilities and more.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-briefcase" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Business Loans</h4>
                 <p>A listed range of small, medium and large sized business solutions to cover your cash flow and trade requirements.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-home" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Home Loans</h4>
                 <p>A range of home financing options whether you are looking for outright purchase, home improvement or renovations.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-car" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Motor Vehicle</h4>
                 <p>It is a long established fact that a reader will be distracted by the readable content.</p>
               </div>
             </div>
           </a>
         </div>
       </div>
       <div>
       </div>
     </div>
   </div>
 </div>
 <!-- Product Loan Type -->


<!-- About GetPesa -->
<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="row cwp17-two align-items-center">
      <div class="col-md-6 cwp17-text">
        <h3>About MarketPlace</h3>
        <p>Our platform is full automated and we have thousands of curated loan options for your needs. </p>
        {{-- <a href="#signup.html">Learn more &raquo;</a> --}}
      </div>
      <div class="col-md-6" style="float:right;">
      <img src="{{asset('temp/assets/images/mobile-app.png')}}" class="img-fluid" alt="" />
      </div>
    </div>
  </div>
</section>
<!-- About GetPesa -->



<!-- FAQS -->
<div class="w3l-index-block4">
    <div class="features-bg py-5">
      <!-- features15 block -->
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">Frequently Asked Questions </h3>
          <p class="my-3 head"> Find quick answers to different solutions.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="s-block">
                  <h6 class="my-3" style="color: #2B3483">General</h6>
                  <p class=""><a href="" style="color: black">How to make request loan</a></p>
                  {{-- <br>
                  <p class=""><a href="" style="color: black">How to make request loan</a></p> --}}
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="s-block">
                    <h6 class="my-3" style="color: #2B3483">Application</h6>
                    <p class=""><a href="" style="color: black">What are the procedure used to make an application to this platform</a></p>
                    {{-- <br>
                    <p class=""><a href="" style="color: black">What are the procedure used to make an application to this platform</a></p> --}}
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="s-block">
                    <h6 class="my-3" style="color: #2B3483">Track Information</h6>
                    <p class=""><a href="" style="color: black">All information appear in your dashboard</a></p>
                    {{-- <br>
                    <p class=""><a href="" style="color: black">All information appear in your dashboard</a></p> --}}
                </div>
            </div>
        </div>
      </div>


    </div>
</div>
<!-- FAQS -->

<!-- Subscribe -->
@include('partials.subscribe')
<!-- Subscribe -->

      <!-- Footer -->
      <section class="w3l-market-footer">
        <footer class="footer-28">
          <div class="footer-bg-layer">
            <div class="container py-lg-3">
              <div class="row footer-top-28">
                <div class="col-md-6 footer-list-28 mt-5">
                  <h1 class="footer-title-28"><strong style="color: #2B3483;">MarketPlace</strong><strong style="color: #E58225;">.</strong></h1>
                  {{-- <ul>
                    <li>
                      <p><strong>Address</strong> : 1st Floor, House 40 Block 10, Bagamoyo Road, 14107 Dar es Salaam, Tanzania.</p>
                    </li>
                    <li>
                      <p><strong>Phone</strong> : <a href="#">+255753696636</a></p>
                    </li>
                    <li>
                      <p><strong>Email</strong> : <a href="#">marketplace@gmail.com</a></p>
                    </li>
                  </ul> --}}
                  {{-- <div class="main-social-footer-28 mt-3">
                    <ul class="social-icons">
                      <li class="facebook">
                        <a href="#link" title="Facebook">
                          <span class="fa fa-facebook" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="twitter">
                        <a href="#link" title="Twitter">
                          <span class="fa fa-twitter" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="dribbble">
                        <a href="#link" title="Dribbble">
                          <span class="fa fa-dribbble" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="google">
                        <a href="#link" title="Google">
                          <span class="fa fa-google" aria-hidden="true"></span>
                        </a>
                      </li>
                    </ul>
                  </div> --}}
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
                    href="https://getpesa.co.tz/" target="_blank">GetPesa</a></p>
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
    <script src="{{asset('temp/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('temp/assets/js/bootstrap.min.js')}}"></script>


</body>
</html>
