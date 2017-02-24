<?php display('header/header') ?>
<!-- <meta http-equiv="refresh" content="<?php echo $data['duration']; ?>; url=index.php?<?php echo $data['urlInfo']; ?>"> -->
<body>    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">提示</div>
        </div>
        <div class="panel-body">
            <div class="text-center">
                <div class="jumbotron">
                    <h1 class=""><?php echo $data['tips'];?></h1>
                    <p class="">页面将在 <font color="red" id="duration"><?php echo $data['duration']; ?></font> 秒后跳转</p>
              </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    window.onload = function() {
        var delay = <?php echo $data['duration']; ?> || 0;
        var obj = document.getElementById('duration');
        delay < 1 && goto();
        setInterval(function() {
            console.log(delay)
            --delay < 1 && goto();
            obj.innerHTML = delay;
        }, 1000);
        function goto() {
            window.location.href = "<?php echo isset($data['urlInfo']) ? $data['urlInfo']: $_SERVER['HTTP_REFERER'];?>";
        }
    }
</script>
</html>
