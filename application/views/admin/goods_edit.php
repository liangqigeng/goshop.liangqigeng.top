<style>
    #upload{
        opacity:0;
    }
   #img{
        display:block;
        border:1px solid #999;
        height:200px;
        width:200px;
        text-align:center;
        margin-top:-32px;
    }
</style>
<div class="content">
        <div class="header">
            <h1 class="page-title">添加商品</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="<?php echo base_url('admin/shop/index')?>">Home</a> <span class="divider">/</span></li>
            <li class="active">添加商品</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/shop/cat_goods_list');?>'"><i class="icon-list"></i> 商品列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form method="post" action="" enctype="multipart/form-data">
            <div>
            <input type="hidden" name="goo_id" value="<?php echo $goods['goo_id'];?>">
            <label>商品名称</label>
            <input type="text" value="<?php echo $goods['goo_name'];?>" class="input-xxlarge" name="goo_name">
            <label>信息</label>
            <input type="text" value="<?php echo $goods['goo_info'];?>" class="input-xxlarge" name="goo_info">
            <label>尺寸</label>
            <input type="text" value="<?php echo $goods['goo_size'];?>" class="input-xxlarge" name="goo_size">
             <label>样式</label>
            <input type="text" value="<?php echo $goods['goo_style'];?>" class="input-xxlarge" name="goo_style">
            <label>材质</label>
            <input type="text" value="<?php echo $goods['goo_material'];?>" class="input-xxlarge" name="goo_material">
            <label>价格</label>
            <input type="text" value="<?php echo $goods['goo_price'];?>" class="input-xxlarge" name="goo_price">
            <label>图片</label>
            <input type="file" value="<?php echo $goods['goo_img'];?>" class="input-xxlarge" name="goo_img" id="upload">
             <label for="upload" style="margin-bottom:0;">
                            <?php if(!empty($goods['goo_img'])) {?>
                                <img src="<?php echo base_url('upload/');?><?php echo $goods['goo_img'];?>" alt="" id="img">
                            <?php } else {?>
                                <img src="<?php echo base_url('static/admin/')?>images/upload.png" alt="" id="img">
                           <?php }?>
                          </label>
            <label>添加时间</label>
            <input type="text" value="<?php echo $goods['goo_addtime'];?>" class="input-xxlarge" name="goo_addtime">
            <label>排序</label>
            <input type="text" value="<?php echo $goods['goo_ord'];?>" class="input-xxlarge" name="goo_ord">
            <label>是否上架</label>
            <input type="text" value="<?php echo $goods['is_show'];?>" class="input-xxlarge" name="is_show">
            <label>所属</label>
            <input type="text" value="<?php echo $goods['cat_id'];?>" class="input-xxlarge" name="cat_id">
            </div>
            <input class="btn btn-primary" type="submit" value="提交" />
        </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="<?php echo base_url('static/admin/')?>lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script>
    //做图片上传预览
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
</script>
  </body>
</html>


