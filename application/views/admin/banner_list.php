
    <div class="content">
        <div class="header">
            <h1 class="page-title">广告列表</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('admin/shop/index');?>">Home</a> <span class="divider">/</span></li>
            <li class="active">广告列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/banner/banner_add');?>'"><i class="icon-plus"></i>添加广告</button>
  <div class="btn-group">
  </div>
</div>
<div id="show"></div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>图片</th>
          <th>标题</th>
          <th>链接地址</th>
          <th>添加时间</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($banner as $v) {?>
        <tr>
          <td><?php echo $a++;?></td>
          <td>
              <img src="<?php echo base_url('upload').'/'.$v['banner_path'];?>" alt="" style="height: 50px"/>
          </td>
          <td><?php echo $v['banner_title'];?></td>
          <td><?php echo $v['banner_url'];?></td>
          <td><?php echo date('Y-m-d',$v['banner_addtime']);?></td>
          <td>
              <a href="<?php echo site_url('admin/banner/banner_edit/'.$v['banner_id']);?>"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal" class="delete" ddd="<?php echo $v['banner_id'];?>"><i class="icon-remove"></i></a>
          </td>
        </tr>
      <?php }?>
      </tbody>
    </table>
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
        <button class="btn"  aria-hidden="true" data-dismiss="modal" id="cancel">Cancel</button>
        <button class="btn btn-danger" id="del" data_id="">Delete</button>
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
    


    <script src="<?php echo base_url('static/admin')?>/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
        //删除功能
        $('.delete').click(function () {
            var id = $(this).attr('ddd');
            $('#del').attr('data_id',id);
        });
        $('#del').click(function () {
            var id = $(this).attr('data_id');
            $.ajax({
                type : 'get',
                url : "<?php echo site_url('admin/banner/banner_del');?>",
                data : "id="+id,
                dataType : 'text',
                success : function (z) {
                    console.log(z);
                    if(z==1) {
                        $('#cancel').click();
                        $('#show').html('删除成功');
                        function aa() {
                            location.reload();
                        }
                        setTimeout(aa,2000);
                    }
                }
            })
        })
    </script>
    
  </body>
</html>


