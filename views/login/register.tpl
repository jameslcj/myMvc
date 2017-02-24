<?php display('header/header') ?>
<body>    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">后台登录</div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" class="form-horizontal" action="index.php?ctl=login&act=registerUser" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">用户名</label>
                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">密码</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-1">
                                <button class="btn btn-primary">注册</button>
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</body>
</html>
