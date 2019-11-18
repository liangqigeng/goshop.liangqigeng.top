<div class="content">
        <div class="header">
            <h1 class="tag-title">编辑标签</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/tag/tag_list');?>">Home</a> <span class="divider">/</span></li>
            <li class="active">编辑标签</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/tag/tag_list');?>'"><i class="icon-list"></i>标签列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form method="post" action="">
            <div>
            <input type="hidden" name="tag_id" value="<?php echo $tag['tag_id'];?>">
            <label>标签名称</label>
            <input type="text" value="<?php echo $tag['tag_name'];?>" class="input-xxlarge" name="tag_name">
            <label>商品ID</label>
            <input type="text" value="<?php echo $tag['goo_id'];?>" class="input-xxlarge" name="goo_id">
             <label>添加时间</label>
            <input type="date" value="<?php echo date('Y-m-d',$tag['tag_addtime']);?>" class="input-xxlarge" name="tag_addtime">
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
  </body>
</html>

