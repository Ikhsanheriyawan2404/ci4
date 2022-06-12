<li>
    <a href="<?= site_url() ?>" class="ajax-link">
        <i class="fa fa-dashboard"></i>
        <span class="hidden-xs">Dashboard</span>
    </a>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-desktop"></i>
        <span class="hidden-xs">Laporan</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/ui_grid.html">Generate Report</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-bar-chart-o"></i>
        <span class="hidden-xs">Transaksi</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/charts_xcharts.html">xCharts</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-table"></i>
        <span class="hidden-xs">Penjualan</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/tables_simple.html">Fuel Retail (BBM)</a></li>
        <li><a class="ajax-link" href="ajax/tables_datatables.html">POS Retail</a></li>
        <li><a class="ajax-link" href="ajax/tables_beauty.html">Biaya Pendapatan</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-pencil-square-o"></i>
        <span class="hidden-xs">Penerimaan BBM</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/forms_elements.html">Elements</a></li>
        <li><a class="ajax-link" href="ajax/forms_layouts.html">Layouts</a></li>
        <li><a class="ajax-link" href="ajax/forms_file_uploader.html">File Uploader</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-list"></i>
        <span class="hidden-xs">Kas dan Bank</span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="ajax/page_login.html">Kas Operasional</a></li>
        <li><a class="ajax-link add-full" href="ajax/page_messages.html">Kas Rekening</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-map-marker"></i>
        <span class="hidden-xs">Biaya</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/maps.html">OpenStreetMap</a></li>
        <li><a class="ajax-link" href="ajax/map_fullscreen.html">Fullscreen map</a></li>
        <li><a class="ajax-link" href="ajax/map_leaflet.html">Leaflet</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-picture-o"></i>
        <span class="hidden-xs">Gallery</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/gallery_simple.html">Simple Gallery</a></li>
        <li><a class="ajax-link" href="ajax/gallery_flickr.html">Flickr Gallery</a></li>
    </ul>
</li>
<li>
    <a class="ajax-link" href="ajax/typography.html">
        <i class="fa fa-font"></i>
        <span class="hidden-xs">Pembelian</span>
    </a>
</li>
<li>
    <a class="ajax-link" href="ajax/calendar.html">
        <i class="fa fa-calendar"></i>
        <span class="hidden-xs">Kontak</span>
    </a>
</li>
<li>
    <a class="ajax-link" href="ajax/calendar.html">
        <i class="fa fa-calendar"></i>
        <span class="hidden-xs">Produk</span>
    </a>
</li>
<li>
    <a class="ajax-link" href="ajax/calendar.html">
        <i class="fa fa-calendar"></i>
        <span class="hidden-xs">Konfigurasi</span>
    </a>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-map-marker"></i>
        <span class="hidden-xs">Akun Perkiraan</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="ajax-link" href="ajax/maps.html">Saldo Awal</a></li>
        <li><a class="ajax-link" href="ajax/map_fullscreen.html">Akun Biaya</a></li>
        <li><a class="ajax-link" href="ajax/map_leaflet.html">Daftar Akun</a></li>
    </ul>
</li>
<li class="active-parent active">
    <a class="ajax-link" href="<?= site_url('users') ?>">
        <i class="fa fa-user"></i>
        <span class="hidden-xs">Users</span>
    </a>
</li>
<!-- <li class="dropdown">
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-picture-o"></i>
        <span class="hidden-xs">Multilevel menu</span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="#">First level menu</a></li>
        <li><a href="#">First level menu</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-plus-square"></i>
                <span class="hidden-xs">Second level menu group</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Second level menu</a></li>
                <li><a href="#">Second level menu</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-plus-square"></i>
                        <span class="hidden-xs">Three level menu group</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Three level menu</a></li>
                        <li><a href="#">Three level menu</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-plus-square"></i>
                                <span class="hidden-xs">Four level menu group</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Four level menu</a></li>
                                <li><a href="#">Four level menu</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-plus-square"></i>
                                        <span class="hidden-xs">Five level menu group</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Five level menu</a></li>
                                        <li><a href="#">Five level menu</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-plus-square"></i>
                                                <span class="hidden-xs">Six level menu group</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Six level menu</a></li>
                                                <li><a href="#">Six level menu</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Three level menu</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li> -->