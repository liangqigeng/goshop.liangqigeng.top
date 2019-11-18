<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" href="<?php echo base_url('static/home/');?>img/favicon.png" type="image/x-icon" />

        <title><?php  echo $title;?></title>


        <!-- Linearicons -->
        <link href="<?php echo base_url('static/home/');?>vendors/Linearicons/style.css" rel="stylesheet">
        <!-- fontawesome -->
        <link href="<?php echo base_url('static/home/');?>vendors/fontawesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('static/home/');?>css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Select -->
        <link href="<?php echo base_url('static/home/');?>vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <!-- Camera Slider -->
        <link href="<?php echo base_url('static/home/');?>vendors/camera-slider/css/camera.css" rel="stylesheet">
        <!-- Animate css -->
        <link href="<?php echo base_url('static/home/');?>vendors/animate-css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url('static/home/');?>vendors/animate-css/magic.min.css" rel="stylesheet">

        <link href="<?php echo base_url('static/home/');?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('static/home/');?>css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <![endif]-->
        <style>
            .search{
                width: 100px;
                height: 30px;
            }
        </style>
    </head>
    <body>




       <!--==========First Header==========-->
        <div class="first_header">
            <div class="container custome_container">
                <div class="live_chat_area pull-left">
                    <a href="#"><i class="lnr lnr-bubble"></i>联系我们</a>
                    <a href="#"><i class="lnr lnr-envelope"></i><?php echo $phone['con_title'];?>: <?php echo $phone['con_value'];?></a>
                </div>
                <div class="language_area pull-right">
                    <select class="selectpicker">
                        <option>中文</option>
                        <option>Engish</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="logo_area">
            <div class="container custome_container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="website_logo">
                            <a href="<?php echo site_url('home/home/index');?>"><img src="<?php echo base_url('upload/');?><?php echo $logo['con_value'];?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="find_item_inner">
                            <input type="text" placeholder="在这里搜索">
                            <select class="search">
                                <?php foreach($cat as $v) {?>
                                <option value="<?php echo $v['cat_id'];?>"><?php echo $v['cat_name'];?></option>
                                <?php }?>
                            </select>
                            <a class="find_button" href="#">查找物品</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="cart_area">
                            <div class="wishlist">
                                <i class="lnr lnr-heart"></i>
                                <h5>心愿单</h5>
                            </div>
                            <div class="cart">
                                <i class="lnr lnr-cart"></i>
                                <h5>购物车</h5>
                                <span>7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==========First Header==========-->
        <!--==========Main Menu Area==========-->
        <header class="main_menu_area">
            <nav class="navbar navbar-default">
                <div class="container custome_container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">切换导航</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php foreach($nav as $v) {?>
                                <li><a href="<?php echo site_url('home/home/'.$v['nav_url']);?>"><?php echo $v['nav_name'];?></a></li>
                            <?php }?>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><i class="lnr lnr-user"></i>我的账号</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>