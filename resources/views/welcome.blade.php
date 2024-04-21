@include('auth.login')
{{--
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="sjepLNAjmpXvnGpuWuEmkeHUlrMJulkcovNF8sPX">

        <title>STR CONSUMER FOOD PRODUCT LTD</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css"> -->

        <link rel="stylesheet" href="https://pos.iammonirul.xyz/css/vendor.css">

        <!-- Styles -->
        <style>
            body {
                min-height: 100vh;
                background-color: #243949;
                color: #fff;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.12'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
            .navbar-default {
                background-color: transparent;
                border: none;
            }
            .navbar-static-top {
                margin-bottom: 19px;
            }
            .navbar-default .navbar-nav>li>a {
                color: #fff;
                font-weight: 600;
                font-size: 15px
            }
            .navbar-default .navbar-nav>li>a:hover{
                color: #ccc;
            }
            .navbar-default .navbar-brand {
                color: #ccc;
            }
        </style>
    </head>

    <body>
        <!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">STR CONSUMER FOOD PRODUCT LTD</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
                                      </ul>
      <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ route('custom.auth.user') }}">User</a></li>
                                    <li><a href="{{ route('custom.auth.admin') }}">Admin</a></li>
                                    <li><a href="{{ route('custom.auth.depo') }}">Depo</a></li>
                                    <li><a href="{{ route('custom.auth.stockiest') }}">Stockiest</a></li>
                                          </ul>
    </div><!-- nav-collapse -->
  </div>
</nav>        <div class="container">
            <div class="content">
                    <style type="text/css">
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 10%;
            }
        .title {
                font-size: 84px;
            }
        .tagline {
                font-size:25px;
                font-weight: 300;
                text-align: center;
            }

        @media  only screen and (max-width: 600px) {
            .title{
                font-size: 38px;
            }
            .tagline {
                font-size:18px;
            }
        }
    </style>
    <div class="title flex-center" style="font-weight: 600 !important; margin-top:150px;">
        Point Of Sale
    </div>
    <p class="tagline">
        POS
    </p>
            </div>
        </div>
        <script type="text/javascript">
    base_path = "https://pos.iammonirul.xyz";
    //used for push notification
    APP = {};
    APP.PUSHER_APP_KEY = '';
    APP.PUSHER_APP_CLUSTER = '';
    APP.INVOICE_SCHEME_SEPARATOR = '-';
    //variable from app service provider
    APP.PUSHER_ENABLED = '';
            APP.USER_ID = '';
    </script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?v=$asset_v"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?v=$asset_v"></script>
<![endif]-->
<script src="https://pos.iammonirul.xyz/js/vendor.js?v=48"></script>

    <script src="https://pos.iammonirul.xyz/js/lang/en.js?v=48"></script>

<script>
    Dropzone.autoDiscover = false;
    moment.tz.setDefault('');
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

                    $.fn.dataTable.ext.errMode = 'throw';
            });

    var financial_year = {
        start: moment(''),
        end: moment(''),
    }

    var datepicker_date_format = "mm/dd/yyyy";
    var moment_date_format = "MM/DD/YYYY";
    var moment_time_format = "HH:mm";

    var app_locale = "en";

    var non_utf8_languages = [
                "ar",
                "hi",
                "ps",
            ];

    var __default_datatable_page_entries = "25";

    var __new_notification_count_interval = "60000";
</script>

    <script src="https://pos.iammonirul.xyz/js/lang/en.js?v=48"></script>

<script src="https://pos.iammonirul.xyz/js/functions.js?v=48"></script>
<script src="https://pos.iammonirul.xyz/js/common.js?v=48"></script>
<script src="https://pos.iammonirul.xyz/js/app.js?v=48"></script>
<script src="https://pos.iammonirul.xyz/js/help-tour.js?v=48"></script>
<script src="https://pos.iammonirul.xyz/js/documents_and_note.js?v=48"></script>

<!-- TODO -->



<script type="text/javascript">
    $(document).ready( function(){
        var locale = "en";
        var isRTL =  false;
        $('#calendar').fullCalendar('option', {
            locale: locale,
            isRTL: isRTL
        });
    });
</script>
    <!-- Scripts -->
    <script src="https://pos.iammonirul.xyz/js/login.js?v=48"></script>
        </body>
</html>  --}}
