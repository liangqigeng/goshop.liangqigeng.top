 <link rel="stylesheet" href="<?php echo base_url('static/home/css/css.css');?>">
 <style>
     .page ul{
        position: relative;
        left:50%;
            float: left;
     }
     .page li{
         position: relative;
         right:50%;
         float: left;
     }
 </style>
        <!--==========Banner area==========-->
        <section class="banner_area">
            <div class="banner_tittle">
                <h3><?php echo $title;?></h3>
            </div>
            <div class="banner_page_ling">
                <a href="<?php echo site_url('home/home/index');?>">首页</a>
                <i class="lnr lnr-chevron-right"></i>
                <a href="<?php echo site_url('home/home/shop_brand');?>"><?php echo $title;?></a>
            </div>
        </section>
        <!--==========End Slider area==========-->
        
        <!--==========男装 area==========-->
        <section class="men_clothing_area">
            <div class="container custome_container">
                <div class="row">
                   <div class="col-md-3">
                        <div class="product_sidebar_widget_inner">
                            <div class="s_widget s_widget_categories">
                               <div class="s_widget_tittle">
                                   <h4>所有类别</h4>
                               </div>
                                <ul>
                                    <?php foreach($cat as $v){?>
                                    <li><a href="#"><i class="lnr lnr-user"></i><?php echo $v['cat_name'];?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="s_widget s_widget_price_range">
                               <div class="s_widget_tittle">
                                   <h4>价格范围</h4>
                               </div>
                                <div class="range_slider">
                                    <div id="slider-range"></div>
                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </div>
                            </div>
                            <div class="s_widget s_widget_add">
                               <img src="<?php echo base_url('static/home/');?>img/add_image/sidebar_add.jpg" alt="">
                            </div>
                            <div class="s_widget s_widget_t_product">
                               <div class="s_widget_tittle">
                                   <h4>热销产品</h4>
                               </div>
                               <div class="t_product_inner">
                               <?php foreach ($product as $v) {?>
                                   <div class="item_t_product">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="<?php echo base_url('upload/');?><?php echo $v['goo_img'];?>" alt="" style="height:100px">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="#"><h4><?php echo $v['goo_name'];?></h4></a>
                                                <h5><?php echo $v['goo_price'];?></h5>
                                            </div>
                                        </div>
                                   </div>
                            <?php }?>
                        </div>


                    </div>
                </div>
            </div>
             <div class="col-md-9">
                      <div class="microsoft_brand_area">
                          <?php echo $page['page_content'];?>
                      </div>
             </div>
               <div class="men_clothing_product_inner row">
               <?php foreach ($product as $v){?>
                            <div class="col-md-4 col-xs-6">
                                <div class="men_clothing_product_item">
                                    <a class="men_item_image" href="">
                                        <img src="<?php echo base_url('upload/');?><?php echo $v['goo_img'];?>" alt="">
                                    </a>
                                    <div class="men_item_content">
                                        <a href=""><?php echo $v['goo_name'];?></h3></a>
                                        <h4><?php echo $v['goo_price'];?></h4>
                                        <div class="favourite_icon">
                                           <a class="active" href="#"><i class="lnr lnr-cart"></i></a>
                                           <a href=""><i class="lnr lnr-heart"></i></a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>

               </div>
               <div class="black2 page"><?php echo $show;?></div>

        </section>
        <!--==========End 男装 area==========-->

    </body>
</html>

