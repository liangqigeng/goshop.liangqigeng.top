<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>商城管理</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/')?>lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/')?>stylesheets/theme.css">
    <link rel="stylesheet" href="<?php echo base_url('static/admin/')?>lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url('static/admin/')?>lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!-->
  <body class="">
  <!--<![endif]-->

    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li>
                        <a href="#" role="button">
                            <i class="icon-user"></i> <?php echo $admin_name?>
                        </a>
                    </li>
                    <li><a href="<?php echo site_url('admin/login/logout');?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
                </ul>
                <a class="brand" href="<?php echo base_url('admin/shop/index');?>"><span class="first">商城管理</span></a>
        </div>
    </div>

    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>首页</a>
        <ul id="dashboard-menu" class="nav nav-list collapse">
            <li><a href="<?php echo site_url('admin/shop/index');?>">首页</a></li>
        </ul>
        <a href="#dashboard-menu1" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>商品分类管理</a>
        <ul id="dashboard-menu1" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/shop/cat_goods_list');?>">商品分类管理</a></li>
        </ul>
        <a href="#dashboard-menu2" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>商品管理</a>
        <ul id="dashboard-menu2" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/shop/goods_list');?>">商品管理</a></li>
        </ul>
        <a href="#dashboard-menu3" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>管理员管理</a>
        <ul id="dashboard-menu3" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/admin/admin_list');?>">管理员管理</a></li>
        </ul>
        <a href="#dashboard-menu4" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>广告管理</a>
        <ul id="dashboard-menu4" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/banner/index');?>">广告管理</a></li>
        </ul>
        <a href="#dashboard-menu5" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>购物车管理</a>
        <ul id="dashboard-menu5" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/cart/cart_list');?>">购物车管理</a></li>
        </ul>
        <a href="#dashboard-menu6" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>评论管理</a>
        <ul id="dashboard-menu6" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/comment/comment_list');?>">评论管理</a></li>
        </ul>
        <a href="#dashboard-menu7" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>配置管理</a>
        <ul id="dashboard-menu7" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/shop/config_edit');?>">配置管理</a></li>
        </ul>
        <a href="#dashboard-menu8" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>收藏管理</a>
        <ul id="dashboard-menu8" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/likes/likes_list');?>">收藏管理</a></li>
        </ul>
        <a href="#dashboard-menu9" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>友情链接管理</a>
        <ul id="dashboard-menu9" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/link/link_list');?>">友情链接管理</a></li>
        </ul>
        <a href="#dashboard-menu10" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>单页管理</a>
        <ul id="dashboard-menu10" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/page/page_list');?>">单页管理</a></li>
        </ul>
        <a href="#dashboard-menu11" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>标签管理</a>
        <ul id="dashboard-menu11" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/tag/tag_list');?>">标签管理</a></li>
        </ul>
        <a href="#dashboard-menu12" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>用户管理</a>
        <ul id="dashboard-menu12" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/user/user_list');?>">用户管理</a></li>
        </ul>
        <a href="#dashboard-menu13" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>导航管理</a>
        <ul id="dashboard-menu13" class="nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/nav/nav_list');?>">导航管理</a></li>
        </ul>
    </div>

