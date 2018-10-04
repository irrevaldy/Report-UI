<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wirecard</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/index.ico">
    <!--
     <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.png"> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('assets/login/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/login/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/login/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/login/AdminLTE.min.css') }}">

    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/login/owl.carousel.2/assets/owl.carousel.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/login/jquery-notify/ui.notify.css') }}" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .login-page, .register-page {
    background-color: #f7f7f7;

      background-image: url(css/cream-dust.png);
      /* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
    }

      .login-box-body,
      .register-box-body {
        background-color: rgba(255, 255, 255, 0);
        border-radius: 5px;
      }

      .login-logo, .register-logo {
        height: 50px;
        margin-bottom: 0;
      }

      .pass input {

        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
      }

      .pass input:focus {
        margin-top: 30px;

        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
      }

      .pass-push {
        margin-top: 30px;
      }

      .login-page,
      .register-page {
        /*background-color: #F7F7F7;*/
        background-color: #666666;
      }

      .login-box-msg, .register-box-msg {
        margin-top: 10px;
        color: white;
      }

      #owl-demo img {
        margin: auto;
        width: 200px;
      }

      .owl-carousel .owl-wrapper-outer {
        height: 70px;
      }

      h1 {
            font: normal 20px Helvetica, Arial, sans-serif;
            letter-spacing: -0.05em;
            line-height: 20px;
            margin: 10px 0 30px;
      }

      div.hr {
        height: 1px;
        margin-bottom: 30px;

        background: -moz-linear-gradient(left, rgba(102,102,102,0) 0%, rgba(107,107,107,0) 1%, rgba(204,204,204,1) 20%, rgba(204,204,204,1) 79%, rgba(206,206,206,1) 80%, rgba(255,255,255,0) 100%);
        background: -webkit-linear-gradient(left, rgba(102,102,102,0) 0%,rgba(107,107,107,0) 1%,rgba(204,204,204,1) 20%,rgba(204,204,204,1) 79%,rgba(206,206,206,1) 80%,rgba(255,255,255,0) 100%);
        background: linear-gradient(to right, rgba(102,102,102,0) 0%,rgba(107,107,107,0) 1%,rgba(204,204,204,1) 20%,rgba(204,204,204,1) 79%,rgba(206,206,206,1) 80%,rgba(255,255,255,0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00666666', endColorstr='#00ffffff',GradientType=1 );
      }

      div.hr2 {
        margin-bottom: 10px;
      }

      .btn.btn-flat {
        background: transparent;
        color: #aaa;
        border: 1px solid #aaa;

        -webkit-transition: all 0.2s ease;
        -moz-transition: all 0.2s ease;
        -ms-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
      }

      .btn.btn-flat:hover {
        color: #ccc;
        border: 1px solid #ccc;
        background: #666;

        -webkit-transition: all 0.2s ease;
        -moz-transition: all 0.2s ease;
        -ms-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
      }

      .login-box-footer {
        font: normal Helvetica, Arial, sans-serif;
      }

      #owl-demo img {
    margin: auto;
    width: 340px;
}

      .login-box-footer {
          color: white;
      }

      .lb_label {
        color: white !important;
      }

    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <!-- <a href="../../index2.html"><b>Log</b>In</a> -->

        <section id="slider-1" class="slider-1">
          <div class="col-sm-12">
            <div id="owl-demo" class="owl-carousel owl-theme">
              <div> <img src="{{ asset('assets/login/image/logo-white.png') }}" class="img-responsive"> </div>
              <div> <img src="{{ asset('assets/login/image/logo-white.png') }}" class="img-responsive"> </div>
              <!-- <div> <img src="image/bank mandiri.png" class="img-responsive"> </div>
              <div> <img src="image/bni.png" class="img-responsive"> </div>
              <div> <img src="image/bri-logo.png" class="img-responsive"> </div> -->
            </div>
          </div>
        </section>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <!-- <img src="css/idm2.png" class="img-responsive"> -->
        <h1 class="login-box-msg"><b>Log In</b> Form</h1>
        <div class="hr"></div>
        <form id="form" autocomplete="off">
          <input type='hidden' name='tok' value='{{ csrf_token() }}'/>
          <div class="form-group has-feedback">
            <input type="text" class="form-control label_better" id="username" data-new-placeholder="Username" placeholder="Username" required="required">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback pass" id="password-box">
            <input type="password" class="form-control label_better" id="password-inp" data-new-placeholder="Password" placeholder="Password" onChange="check()"  required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-4 col-xs-offset-8">
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="display: none;" id="submitLogin">Sign In</button>
              <button type="button" class="btn btn-primary btn-block btn-flat" onClick="$('#submitLogin').click()" id="buttonLogin"><i class="fa fa-spinner fa-pulse" id="spinner" style="display: none;"></i> Log In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
      <div class="hr hr2"></div>

      <div class="login-box-footer text-center">
        <strong>Copyright &copy; 2018 Wirecard | PT Prima Vista Solusi.</strong><br> All rights reserved.
        <br>Version 2.0.0 - October 2018
      </div>
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/login/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('assets/login/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- label-bettter -->
    <script src="{{ asset('assets/login/label_better/jquery.label_better.js') }}"></script>

    <script>
    $(document).ready( function() {
      $(".label_better").label_better({
        easing: "bounce"
      });
    });
    </script>

    <script type="text/javascript">
      function check(){
        var pass = document.getElementById('password-inp');
        if(pass.value != "") {
          $("#password-box").addClass("pass-push");

        } else {
          $("#password-box").removeClass("pass-push");

        }
      }

    </script>

    <!-- Include js plugin -->
    <script src="{{ asset('assets/login/owl.carousel.2/owl.carousel.js') }}"></script>

    <script type="text/javascript">

    $(document).ready(function() {

      $("#owl-demo").owlCarousel({

          /*loop: true,
          items: 1,
          startPosition: 1,
          autoplay: true,
          autoplayTimeout: 3000*/

          items: 1,
          startPosition: 1,
          touchDrag  : false,
          mouseDrag  : false


          //animateOut: 'fadeOut',
          //animateIn: 'fadeIn'


          // "singleItem:true" is a shortcut for:
          // items : 1,
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false

      });

    });


    </script>

    <script src="{{ asset('assets/login/jQueryUI/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/login/jquery-notify/src/jquery.notify.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

      function create( template, vars, opts ){
        return $container.notify("create", template, vars, opts);
      }

      $(function(){
        // initialize widget on a container, passing in all the defaults.
        // the defaults will apply to any notification created within this
        // container, but can be overwritten on notification-by-notification
        // basis.
        $container = $("#container").notify();

        buttonLogin.disabled = false;

        $(window).keydown(function(event){
          if(event.keyCode == 13) {
            //event.preventDefault();
            /*return false;*/
            //procLogin();
          }
        });

      });

      $("#form").submit(function(e){
        e.preventDefault();

        //alert('test');
        $('#spinner').css('display', '');
        $('#buttonLogin').prop('disabled', true);
        create("default", { title:'', text:'<i class="fa fa-cog fa-spin" style="font-size: 16px;"></i> Please Wait ...'},{ expires:4000 });

        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            data: {
                    user : $('#username').val(),
                    pass : $('#password-inp').val()
                    //_token : "{{ csrf_token() }}"
                    //_token : $('input[name="tok"]').val()
                  },
            url: "/login_proc",
            cache: false,
            success: function(msg){

              //var data = JSON.parse(msg);
              var data = msg;
              console.log(msg);

              if(data.success == false) {

                $('#spinner').css('display', 'none');
                create("default", { title:'<span style="color: #FF6D6D;"><i class="fa fa-times" style="font-size: 16px;"></i> Login Failed</span>', text: data.message },{ expires:4000 });
                $('#buttonLogin').prop('disabled', false);

              } else if(data.success == 'csrf_expired') {

                // nanti dibuat, push ke controller lalu di arrahkan se akan2 sesssion timeout

                $('#spinner').css('display', 'none');
                create("default", { title:'<span style="color: #FF6D6D;"><i class="fa fa-times" style="font-size: 16px;"></i> Login Failed</span>', text: data.message },{ expires:4000 });
                $('#buttonLogin').prop('disabled', false);

              } else if (data.success == true) {

                create("default", { title:'<span style="color: #00DD76;"><i class="fa fa-check"></i> Login Success</span>', text: data.message, icon:'alert.png' });

                var delay = 2000;

                // setTimeout(function(){ window.location = '/dashbank_copy' }, delay);

                if (data.data.flag_old_password == "1") {

                  setTimeout(function(){ window.location = '/change_password'  }, delay);

                } else {

                  if( data.data.name == 'adly' || data.data.name == 'Pak Boss Gea' )
                  {
                    setTimeout(function(){ window.location = '/monitoring'  }, delay);
                  }
                  else if( data.data.name == 'fadhli')
                  {
                    setTimeout(function(){ window.location = '/dashmerchant'  }, delay);
                  }
                  else if( data.data.name == 'Provider One' )
                  {
                    setTimeout(function(){ window.location = '/dashprovider'  }, delay);
                  }
                  else if( data.data.name == 'valdy' || data.data.name == 'Merchant One' || data.data.name == 'Branch One' || data.data.name == 'Acquirer One' || data.data.name == 'Corporate One' || data.data.name == 'Store One')
                  {
                    setTimeout(function(){ window.location = '/dashmerchant'  }, delay);
                  }
                  else
                  {
                    setTimeout(function(){ window.location = '/index'  }, delay);
                  }

                }

              }

            }
          });

      });

      //setTimeout(function(){ window.location = '/re-token';  }, '7000');

    </script>

  </body>

  <div id="container" style="display:none">

    <div id="default">
      <h1>#{title}</h1>
      <p>#{text}</p>
    </div>

    <div id="sticky">
      <a class="ui-notify-close ui-notify-cross" href="#">x</a>
      <h1>#{title}</h1>
      <p>#{text}</p>
    </div>

    <div id="themeroller" class="ui-state-error" style="padding:10px; -moz-box-shadow:0 0 6px #980000; -webkit-box-shadow:0 0 6px #980000; box-shadow:0 0 6px #980000;">
      <a class="ui-notify-close" href="#"><span class="ui-icon ui-icon-close" style="float:right"></span></a>
      <span style="float:left; margin:0 5px 0 0;" class="ui-icon ui-icon-alert"></span>
      <h1>#{title}</h1>
      <p>#{text}</p>
      <p style="text-align:center"><a class="ui-notify-close" href="#">Close Me</a></p>
    </div>

    <div id="withIcon">
      <a class="ui-notify-close ui-notify-cross" href="#">x</a>
      <div style="float:left;margin:0 10px 0 0"><img src="#{icon}" alt="warning" /></div>
      <h1>#{title}</h1>
      <p>#{text}</p>
    </div>

    <div id="buttons">
      <h1>#{title}</h1>
      <p>#{text}</p>
      <p style="margin-top:10px;text-align:center">
        <input type="button" class="confirm" value="Close Dialog" />
      </p>
    </div>
  </div>
</html>
