 <!--==========Main Menu Area==========-->
        <!--==========Slider Area==========-->
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
 <link rel="stylesheet" href="<?php echo base_url('static/home/css/css.css');?>">
        <section class="main_slider_area row m0">
            <div class="camera_wrap main_slider_inner">
        <?php foreach($banner as $v) {?>
        <div data-thumb="<?php echo base_url('upload/');?><?php echo $v['banner_path'];?>" data-src="<?php echo base_url('upload/');?><?php echo $v['banner_path'];?>">
                    <div class="container custome_container">
                        <div class="slider_text_main">
                            <div class="slider_text">
                                <h2 class="fadeInUp animated"><?php echo $v['banner_title'];?></h2>
                                <h3 class="fadeInUp animated"><?php echo $v['banner_url'];?><span><s>180.99</s></span></h3>
                                <a class="slider_btn fadeInLeft animated" href="#"><i class="lnr lnr-cart"></i> 添加购物车</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }?>
            </div>
        </section>
        <!--==========End Slider area==========-->
        
        <!--==========Add area==========-->
        <section class="add_space">
            <div class="container custome_container">
                <img src="<?php echo base_url('static/home/');?>img/add_image/home_add_1.jpg" alt="">
            </div>
        </section>
        <!--==========End Add area==========-->
        
        <!--==========Product categories view==========-->
        <section class="product_categori_list">
            <div class="container custome_container">
                <div class="men_clothing">
                    <div class="men_clothing_heading">
                        <a class="men_cl" href="#"><i class="lnr lnr-user "></i>衣服</a>
                        <nav>
                            <ul class="nav nav-tabs" role="tablist">
                            <?php foreach ($cat as $v) {?>
                                <li role="presentation" ><a href="#down" aria-controls="down" role="tab" data-toggle="tab"><?php echo $v['cat_name'];?></a></li>
                            <?php }?>
                            </ul>
                        </nav>
                        <a class="all_categories" href="#">所有类别 <i class="lnr lnr-arrow-right"></i></a>
                    </div>
                    <div class="men_clothing_body row">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="down">

                            <?php foreach ($product1 as $v) {?>
                               <div class="col-md-3 col-sm-6">
                                   <div class="men_clithing_item">
                                       <img src="<?php echo base_url('upload/');?><?php echo $v['goo_img'];?>" alt="">
                                       <div class="men_clithing_item_text">
                                           <h4><?php echo $v['goo_style'];?> <i class="lnr lnr-heart"></i></h4>
                                           <h5><?php echo $v['goo_name'];?></h5>
                                           <h6> <?php echo $v['goo_price'];?></h6>
                                           <a class="add_to_cart" href="#"><i class="lnr lnr-cart"></i> 添加购物车</a>
                                       </div>
                                   </div>
                               </div>
                               <?php }?>

                               </div>

                            </div>
                        </div>
                         <div class="black2 page"><?php echo $show;?></div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========End Product categories view==========-->
        

        
        <!--==========Home Feature area==========-->
        <section class="home_product_feature">
            <div class="container custome_container">
                <div class="home_feature_inner row m0">
                <?php foreach($page as $v) {?>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="home_feature_inner_content">
                                <img src="<?php echo base_url('static/home/');?>img/icon/home-feature-icon-1.png" alt="">
                                <h4><?php echo $v['page_name'];?></h4>
                                <p><?php echo $v['page_name'];?> </p>
                            </div>
                        </div>
                    </div>
            <?php }?>

                </div>
            </div>
        </section>
        <!--==========End Home Feature area==========-->
        

    </body>
</html>

