<header class="navbar">
        <div class="container-fluid expanded-panel">
            <div class="row">
                <div id="logo" class="col-xs-12 col-sm-2">
                    <a href="<?= site_url() ?>">Sikabu v2</a>
                </div>
                <div id="top-panel" class="col-xs-12 col-sm-10">
                    <div class="row">
                        <div class="col-xs-8 col-sm-4">
                            <div id="search">
                                <input type="text" placeholder="search" />
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-8 top-panel-right">
                            <!-- <a href="index_v1.html" class="style1"></a> -->
                            <ul class="nav navbar-nav pull-right panel-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                        <div class="avatar">
                                            <img src="<?= base_url() ?>/assets/img/avatar.jpg" class="img-circle" alt="avatar" />
                                        </div>
                                        <i class="fa fa-angle-down pull-right"></i>
                                        <div class="user-mini pull-right">
                                            <span class="welcome">Welcome,</span>
                                            <span>Lukman Hakim</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="ajax/page_messages.html" class="ajax-link">
                                                <i class="fa fa-envelope"></i>
                                                <span>Messages</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="ajax/gallery_simple.html" class="ajax-link">
                                                <i class="fa fa-picture-o"></i>
                                                <span>Albums</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="ajax/calendar.html" class="ajax-link">
                                                <i class="fa fa-tasks"></i>
                                                <span>Tasks</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-cog"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power-off"></i>
                                                <span>Logout</span>
                                            </a>
                                            <form id="logout-form" action="<?= site_url('logout') ?>" method="POST" class="d-none">
                                                <?= csrf_field() ?>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>