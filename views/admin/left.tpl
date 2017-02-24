<div class="col-lg-2 col-md-2 col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php if(getGP('ctl') == 'index' && getGP('act') == 'index') echo 'active';?>">
            <a href="index.php" class="btn  text-center">首页</a>
        </li>
        <li class="<?php if(getGP('ctl') == 'data' && getGP('act') == 'index') echo 'active';?>">
            <a href="index.php?ctl=data&act=index" class="btn  text-center">信息展示</a>
        </li>
        <li class="<?php if(getGP('ctl') == 'data' && getGP('act') == 'add') echo 'active';?>">
            <a href="index.php?ctl=data&act=add" class="btn  text-center">信息添加</a>
        </li>
    </ul>
</div>
