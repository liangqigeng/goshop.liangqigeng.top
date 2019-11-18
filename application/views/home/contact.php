
        <!--==========Banner area==========-->
        <section class="banner_area">
            <div class="banner_tittle">
                <h3>联系</h3>
            </div>
            <div class="banner_page_ling">
                <a href="<?php echo site_url('home/home/index')?>">首页</a>
                <i class="lnr lnr-chevron-right"></i>
                <a href="<?php echo site_url('home/home/contact')?>">联系</a>
            </div>
        </section>
        <!--==========End Slider area==========-->
        
         
        <!--========== Get Touch Area ==========-->
        <section class="row m0 get_touch_area">
            <div class="container">

                     <div class="row get_touch">
                            <?php foreach($banner2 as $v) {?>
                             <div class="col-sm-4 p0 get_touch_inner">
                        <div class="media item">
                            <div class="media-left item_left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo base_url('upload/');?><?php echo $v['banner_path'];?>" alt="">
                                </a>
                            </div>
                            <div class="media-body item_right">
                                <a href="#"><?php echo $v['banner_title'];?></a>
                                <a href="#"><?php echo $v['banner_url'];?></a>
                            </div>
                        </div>
                    </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--========== End Get Touch Area ==========--> 

    </body>
</html>

