<aside class="main-sidebar">
    <section class="sidebar" style="height: auto; overflow: hidden; width: auto;">
        <ul class="sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler hidden-phone"></div>
            </li>
            <li class="sidebar-search-wrapper">&nbsp;</li>
            <li class="header">General</li>
            <li class="start <?php
                                if ($_REQUEST['page'] == 'index.htm' || empty($_REQUEST['page'])) {
                                    echo 'active';
                                }
                                ?>">
                <a href="<?= $apath; ?>index.htm">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Home
                    </span>
                    <span class="selected"></span>
                </a>
            </li>

            <li <?= ($_REQUEST['page'] == 'pages.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>pages.htm">
                    <i class="fa  fa-file-text"></i>
                    <span class="title">
                        Manage Pages
                    </span>
                </a>
            </li>
            <li class="treeview <?= ($_REQUEST['page'] == 'merit_lists.htm' || $_REQUEST['page'] == 'list_merit_bds.htm') ? 'active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-image"></i>
                    <span class="title">Manage Merit List</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li <?= ($_REQUEST['type'] == 'mbbs') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>merit_lists.htm?type=mbbs"> <i class="fa fa-list"></i> MBBS</a></li>
                    <li <?= ($_REQUEST['type'] == 'bds') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>merit_lists.htm?type=bds"> <i class="fa fa-list"></i> BDS</a></li>
                </ul>
            </li>
            <li class="treeview <?= ($_REQUEST['page'] == 'list_waiting_mbbs.htm' || $_REQUEST['page'] == 'list_waiting_bds.htm') ? 'active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-image"></i>
                    <span class="title">Manage Waiting List</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li <?= ($_REQUEST['page'] == 'list_waiting_mbbs.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>list_waiting_mbbs.htm"> <i class="fa fa-list"></i> MBBS</a></li>
                    <li <?= ($_REQUEST['page'] == 'list_waiting_bds.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>list_waiting_bds.htm"> <i class="fa fa-list"></i> BDS</a></li>
                </ul>
            </li>
            <li <?= ($_REQUEST['page'] == 'slider.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>slider.htm">
                    <i class="fa  fa-th-list"></i>
                    <span class="title">
                        Manage Slider
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_courses.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_courses.htm">
                    <i class="fa  fa-book"></i>
                    <span class="title">
                        Manage Quick Links
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_testimonials.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_testimonials.htm">
                    <i class="fa  fa-thumb-tack"></i>
                    <span class="title">
                        Manage Testimonials
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_team.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_team.htm">
                    <i class="fa  fa-users"></i>
                    <span class="title">
                        Manage Team
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_partners.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_partners.htm">
                    <i class="fa  fa-certificate"></i>
                    <span class="title">
                        Manage Partners
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_events.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_events.htm">
                    <i class="fa  fa-bell"></i>
                    <span class="title">
                        Manage Events
                    </span>
                </a>
            </li>
            <li class="treeview <?= ($_REQUEST['page'] == 'gallery1.htm' || $_REQUEST['page'] == 'gallery2.htm') ? 'active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-image"></i>
                    <span class="title">Manage Gallery</span>
                    <span class="pull-right-container">
                    </span>

                </a>
                <ul class="treeview-menu">
                    <li <?= ($_REQUEST['page'] == 'gallery1.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>gallery1.htm"> <i class="fa fa-list"></i> ACLS</a></li>
                    <li <?= ($_REQUEST['page'] == 'gallery2.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>gallery2.htm"> <i class="fa fa-list"></i> Community List</a></li>
                </ul>
            </li>
            <li class="header">News</li>
            <li <?= ($_REQUEST['page'] == 'list_news.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_news.htm">
                    <i class="fa  fa-newspaper-o"></i>
                    <span class="title">
                        Manage News
                    </span>
                </a>
            </li>
            <li <?= ($_REQUEST['page'] == 'list_categories.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>list_categories.htm">
                    <i class="fa  fa-th-list"></i>
                    <span class="title">
                        Manage Categories
                    </span>
                </a>
            </li>

            <li class="header">Others</li>
            <li <?= ($_REQUEST['page'] == 'text_home_secs.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>text_home_secs.htm">
                    <i class="fa  fa-th-list"></i>
                    <span class="title">
                        Manage Home Sections
                    </span>
                </a>
            </li>

            <li <?= ($_REQUEST['page'] == 'text_banners.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>text_banners.htm">
                    <i class="fa  fa-th-list"></i>
                    <span class="title">
                        Manage Banners
                    </span>
                </a>
            </li>

            <li class="header">Settings</li>
            <li class="treeview <?= ($_REQUEST['page'] == 'site_og.htm' || $_REQUEST['page'] == 'site_settings.htm' || $_REQUEST['page'] == 'site_social.htm' || $_REQUEST['page'] == 'site_contact.htm' || $_REQUEST['page'] == 'site_meta.htm' || $_REQUEST['page'] == '.htm') ? 'active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Site Settings</span>
                    <span class="pull-right-container">
                    </span>

                </a>
                <ul class="treeview-menu">
                    <li <?= ($_REQUEST['page'] == 'site_settings.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>site_settings.htm"> <i class="fa fa-list"></i> General</a></li>
                    <li <?= ($_REQUEST['page'] == 'site_social.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>site_social.htm"> <i class="fa fa-list"></i> Social Links</a></li>
                    <li <?= ($_REQUEST['page'] == 'site_contact.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>site_contact.htm"> <i class="fa fa-list"></i> Contact Info</a></li>
                    <li <?= ($_REQUEST['page'] == 'site_meta.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>site_meta.htm"> <i class="fa fa-list"></i> Meta Info</a></li>
                    <!--<li <?= ($_REQUEST['page'] == 'site_og.htm') ? 'class="active"' : ''; ?>><a href="<?= $apath; ?>site_og.htm"> <i class="fa fa-list"></i> Og Tags</a></li>-->
                </ul>
            </li>
            <li <?= ($_REQUEST['page'] == 'change_password.htm') ? 'class="active"' : ''; ?>>
                <a href="<?= $apath; ?>change_password.htm">
                    <i class="fa  fa-lock"></i>
                    <span class="title">Change Password</span>
                </a>
            </li>
        </ul>
    </section>
</aside>