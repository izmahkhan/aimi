<?phpif ((!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])) && $_REQUEST['page'] != 'login.htm') {    redirectTo('apanel/login.htm');    exit;}if ($_REQUEST['page'] != 'login.htm') {    ?>    <header class="main-header">        <a href="<?= $apath; ?>" class="logo">            <span class="logo-mini"><b>AP</b></span>            <span class="logo-lg"><b>Admin</b>Panel</span>        </a>        <nav class="navbar navbar-static-top" role="navigation">            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">                <span class="sr-only">Toggle navigation</span>            </a>            <div class="navbar-custom-menu">                <ul class="nav navbar-nav">                    <li class="dropdown user user-menu">                        <a href="javascript:void(0);">                            <i class="fa fa-user"></i> <span class="hidden-xs"> Admin</span>                        </a>                    </li>                    <li class="dropdown user user-menu">                        <a href="<?= $path; ?>" target="_blank" class="dropdown-toggle">                            <i class="fa fa-arrow-right"></i> <span class="hidden-xs"> Visit Website</span>                        </a>                    </li>                    <li class="dropdown user user-menu">                        <a href="<?= $apath; ?>logout.htm" class="dropdown-toggle">                            <i class="fa fa-sign-out"></i> <span class="hidden-xs"> Sign Out</span>                        </a>                    </li>                </ul>            </div>        </nav>    </header>    <?php } ?>