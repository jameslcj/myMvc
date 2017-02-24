<?php display('header/header') ?>
<body>    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">后台登录</div>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php display('admin/left') ?>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <form role="form" class="form-horizontal" action="index.php?ctl=data&act=<?php echo ! isset($data['id']) ? 'add' : 'save'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label class="col-md-2 control-label">标题</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="<?php echo isset($data['title']) ? $data['title'] : '';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">描述</label>
                            <div class="col-md-10">
                                <input type="desc" class="form-control" name="desc" value="<?php echo isset($data['desc']) ? $data['desc'] : '';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">图片</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" class="form-control" name="image" value="<?php echo isset($data['image']) ? $data['image'] : '';?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-1">
                                <button class="btn btn-primary"><?php echo ! isset($data['id']) ? '添加' : '保存'; ?></button>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</body>
</html>
