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
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>标题</th>
                            <th>描述</th>
                            <th>图片</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($data as $key => $val)
                                {
                                    $image = getImagePath($val['image']);
                                    $time = date('Y-d-m H:i:s', $val['add_time']);
                                    echo "<tr>
                                        <th>{$val['id']}</th>
                                        <th>{$val['title']}</th>
                                        <th>{$val['desc']}</th>
                                        <th><image width=50 height=50 src='{$image}'></image></th>
                                        <th>{$time}</th>
                                        <th><a href='index.php?ctl=data&act=editData&id=", $val['id'], "' class='text-primary'>编辑</a>|<a onclick='return confirm(\"确定删除吗?\")' href='index.php?ctl=data&act=delData&id=", $val['id'] , "' class='text-primary'>删除</a></th>
                                    </tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
