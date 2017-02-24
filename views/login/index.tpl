<?php display('header/header') ?>
<body>    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">后台登录</div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="form-horizontal" action="index.php?ctl=login&act=login" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">用户名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">密码</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="autoLogin" value="1">自动登录
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-1">
                                <button class="btn btn-primary">登录</button>
                            </div>
                            <div class="col-md-1">
                                <a href="?ctl=login&act=register" class="btn btn-info">注册</a>
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</body>
</html>
