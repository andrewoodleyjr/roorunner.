<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/"><img src="/img/layout/logo.png" alt="RooRunner"></a>
            <div class="nav-collapse collapse">
                <?php if(isset($menu)){ ?>
                <ul   class="nav pull-right ">
                    <?php echo $menu; ?>
                </ul>
                <?php } else { ?>
                <ul  class="nav pull-right">
                    <li ><a href="/main/Register/">Not registered yet? Click here.</a></li>
                </ul>
                <?php } ?>
            </div><!--/.nav-collapse-->
        </div><!-- /.container -->
    </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->