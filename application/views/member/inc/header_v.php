<!DOCTYPE html>
<html>
<head>
    <title> hComp </title>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  bootstarp , jQuery library include  -->

    <!-- bootstrap start!   -->
    <link rel="stylesheet" href="/hComp/include/bootstrap/css/bootstrap.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  jQuery start!  -->
    <scirpt src="/hComp/include/jQuery/jquery-3.1.1.min.js"></scirpt>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/hComp/include/bootstrap/js/bootstrap.min.js"></script>

    <style>
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400);
        @font-face{
            font-family:'NanumBarunGothic';
            src:url("../fonts/NanumBarunGothic.eot");
            src:local("☺"),url("../fonts/NanumBarunGothic.woff") format("woff");
        }
        a:hover { text-decoration: none;}
        body {font-family: "NanumBarunGothic",  sans-serif; padding-top: 90px; }
        .container-fluid { padding: 0;}

        /* nav bar customize */
        .navbar{ background-color: #fff; border: none; padding-bottom: 10px;  font-family: 'Source Sans Pro', sans-serif;
            font-weight: 300; font-size: 18px; height: 90px; text-transform: capitalize; border-bottom: 1px solid #AAAAAA}

        .navbar-toggle {position: relative; margin-top: 40px;top: 2px;}
        .navbar-nav { padding-right: 10px; margin-top: 20px; background-color: #fff}
        .navbar-nav li { margin:0 20px; }
        .navbar-brand { padding-left: 20px;}
        .navbar-collapse { padding-top: 10px; background-color: #fff}
        .navbar-default .navbar-nav>li>a:hover { color: #FF8000}
        .navbar-default .navbar-nav>li.active>a,
        .navbar-default .navbar-nav>li.active>a:hover,
        .navbar-default .navbar-nav>li.active>a:focus
        { color: #FF8000; background-color: #fff}

        .control { position: inherit; top: 50%; z-index: 5; display: inline-block; right: 50%;}

        .mg_top{ margin-top: 60px; }
    </style>

</head>
<body>
<div class="text-right">
    <a href="/hComp/member/logout"> 로그아웃 </a>
    <span class="glyphicon glyphicon-off"></span>
</div>
<div class="container-fluid">
    <!-- nav bar 부분 -->
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar-scroll">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/hComp/main/home"><img src="/hComp/img/hComp_logo1.png" alt="9PixelStudio"> </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/hComp/main/home" >home </a></li>
                        <li><a href="#">about </a></li>
                        <li><a href="/hComp/board">board </a></li>
                        <li><a href="#">contact </a></li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <!-- // nav bar 부분 끝 -->
    </div>