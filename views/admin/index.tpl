<?php display('header/header') ?>
<body>    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">后台管理</div>
        </div>
            <!-- <nav class="navbar navbar-default">
              <div class="container">
                ...
              </div>
            </nav> -->

        <div class="panel-body">
            <div class="row">
                <?php display('admin/left') ?>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="text-center">
                        <div class="jumbotron">
                            <h1 class="">欢迎管理员: <?php echo $_SESSION['username'];?></h1>
                            <a href="index.php?ctl=login&act=logout" class="btn btn-error btn-lg">退出</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
