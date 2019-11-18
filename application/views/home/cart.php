
        <!--==========Main Menu Area==========-->
        
        <!--==========Banner area==========-->
        <section class="banner_area">
            <div class="banner_tittle">
                <h3><?php echo $title;?></h3>
            </div>
            <div class="banner_page_ling">
                <a href="<?php echo site_url('home/home/index')?>">首页</a>
                <i class="lnr lnr-chevron-right"></i>
                <a href="<?php echo site_url('home/home/cart')?>">购物车</a>
            </div>
        </section>
        <!--==========End Slider area==========-->
        
        <!--==========Shopping cart area==========-->
        <section class="shopping_cart_area">
            <div class="container">
                <div class="shopping_cart_inner">
                    <div class="table-responsive"> 
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th>缩图</th> 
                                    <th>产品</th> 
                                    <th>款式</th>
                                    <th>价钱</th>
                                    <th></th> 
                                </tr> 
                            </thead> 
                            <tbody>
                            <?php foreach($product as $v) {?>
                                <tr> 
                                    <td><img src="<?php echo base_url('upload/')?><?php echo $v['goo_img'];?>" alt="" style="height: 100px"></td>
                                    <td><?php echo $v['goo_name'];?></td>
                                    <td><?php echo $v['goo_style'];?></td>
                                    <td><?php echo $v['goo_price'];?></td>
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td> 
                                </tr>
                                <?php }?>
                            </tbody> 
                        </table> 
                    </div>
                </div>
                <div class="total_price_area">
                    <h3><span>小计</span></h3>
                    <a class="cart_btn" href="#">更新购物车</a>
                    <a class="cart_btn" href="#">结账</a>
                </div>
            </div>
        </section>
        <!--==========End Shopping cart area==========-->

    </body>
</html>

