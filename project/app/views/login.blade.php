<!DOCTYPE html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>MTK-FARM Login</title>
  <meta name="keywords" content="" />
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href="{{URL::to('assets/theme/http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="{{URL::to('assets/theme/assets/skin/default_skin/css/theme.css')}}">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="{{URL::to('assets/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{URL::to('favicon.ico')}}">


  <style type="text/css">
  label.error{
    margin-top:10px; 
    color:#C10D0D;
  }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content">

        <div class="admin-form theme-info" id="login1">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 text-right va-b pr5">
         

            </div>

          </div>

          <div class="panel panel-info mt10 br-n">

          
            <!-- end .form-header section -->

            <form method="post" action="{{URL::to('login')}}">
             <!-- if there are login errors, show them here -->

              <div class="panel-body bg-light p30">
                <div class="row">
                  <div class="col-sm-12 pr30">
                    @if($errors->has()) 
                    <p class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                    </p>
                    @endif


                       
                  
                    @if ($alert = Session::get('success'))
                        <div class="alert alert-danger">
                            {{ $alert }}
                        </div>
                    @endif

                    <div class="section">
                      <label for="email" class="field-label text-muted fs18 mb10">Email</label>
                      <label for="email" class="field prepend-icon">
                        <input type="email" name="email" value="{{Input::old('email')}}" id="email" autofocus class="gui-input" data-msg-required="Enter your email" placeholder="Enter your email">
                        <label for="email" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" data-msg-required="Enter password" placeholder="Enter password">
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                <button type="submit" name="" class="button btn-primary mr10 pull-right">Sign In</button>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="{{URL::to('assets/theme/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
  <script src="{{URL::to('assets/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>
  <!-- validate -->
  <script type="text/javascript" src="{{URL::to('assets/script/jquery.validate.min.js')}}"></script>

  <!-- Theme Javascript -->
  <script src="{{URL::to('assets/theme/assets/js/utility/utility.js')}}"></script>
  <script src="{{URL::to('assets/theme/assets/js/demo/demo.js')}}"></script>
  <script src="{{URL::to('assets/theme/assets/js/main.js')}}"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";


    //fide form and validate
    $('form:not(".novalidate")').each(function () {
        $(this).validate();
    });

     // fide input and set attr required
    $('input').each(function(){
      $(this).attr("required","required");
    });

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
