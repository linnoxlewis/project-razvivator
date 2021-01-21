<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>concept - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ URL::asset('vendor/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/admin/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/admin/plugins/icomoon/style.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/admin/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ URL::asset('vendor/admin/css/concept.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/admin/css/custom.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
</head>
<body>

<!-- Page Container -->
<div class="page-container">
    <!-- Page Sidebar -->
    <div class="page-sidebar">
        <div class="profile-menu">
            <a href="app-profile.html">
                <img src="{{ URL::asset('vendor/admin/images/avatars/avatar1.png')}}"  alt="">
            </a>
        </div>
        <div class="page-sidebar-inner">
            <div class="page-sidebar-menu">
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Dashboard"><i class="fas fa-rocket"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="News"><i class="fas fa-globe-africa"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Inbox"><i class="fas fa-inbox"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Chat"><i class="far fa-comments"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="settings-menu-btn">
            <a href="#" class="settings-menu-link"><i class="fas fa-wrench"></i></a>
        </div>
    </div><!-- /Page Sidebar -->
    <div class="settings-sidebar">
        <div class="settings-sidebar-content">
            <div class="settings-sidebar-header">
                <span>Settings</span>
                <a href="javascript: void(0);" class="settings-menu-close"><i class="icon-close"></i></a>
            </div>
            <div class="right-sidebar-settings">
                <span class="settings-title">General Settings</span>
                <ul class="sidebar-setting-list list-unstyled">
                    <li>
                        <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                    </li>
                    <li>
                        <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                    </li>
                    <li>
                        <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                    </li>
                    <li>
                        <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                    </li>
                </ul>
                <span class="settings-title">Account Settings</span>
                <ul class="sidebar-setting-list list-unstyled">
                    <li>
                        <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                    </li>
                    <li>
                        <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                    </li>
                    <li>
                        <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="settings-overlay"></div>
    <!-- Page Content -->
    <div class="page-content">
        <div class="secondary-sidebar">
            <div class="secondary-sidebar-bar">
                <a href="#" class="logo-box">concept</a>
            </div>
            <div class="secondary-sidebar-menu">
                <ul class="accordion-menu">
                    <li>
                        <a href="/admin/course">
                            <i class="menu-icon icon-show_chart"></i><span>Курсы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/scope">
                            <i class="menu-icon icon-show_chart"></i><span>Сферы развития</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/character">
                            <i class="menu-icon icon-show_chart"></i><span>Персонажи</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/task">
                            <i class="menu-icon icon-show_chart"></i><span>Задачи</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users">
                            <i class="menu-icon icon-show_chart"></i><span>Пользователи</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon icon-star"></i><span>Pages</span><i class="accordion-icon fas fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="help-center.html">Help Center</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                        </ul>
                    </li>
                    <li class="menu-divider"></li>
                    <li>
                        <a href="/admin/params">
                            <i class="menu-icon icon-help_outline"></i><span>Параметры системы</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon icon-help_outline"></i><span>Documentation</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon icon-public"></i><span>Changelog</span><span class="badge badge-danger">1.0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Header -->
        <div class="page-header">
            <div class="search-form">
                <form action="#" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                    </div>
                </form>
            </div>
            <nav class="navbar navbar-default navbar-expand-md">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <div class="logo-sm">
                            <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
                            <a class="logo-box" href="index.html"><span>concept</span></a>
                        </div>
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <i class="fas fa-angle-down"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a></li>
                            <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>
                            <li><a href="javascript:void(0)" id="search-button"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-md-block"><a href="/admin/logout" >Выйти</a></li>
                        <li class="nav-item d-md-block"><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="fas fa-envelope"></i></a></li>
                        <li class="dropdown nav-item d-md-block">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-lg dropdown-content">
                                <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fas fa-angle-right"></i></a></li>
                                <li class="slimscroll dropdown-notifications">
                                    <ul class="list-unstyled dropdown-oc">
                                        <li>
                                            <a href="#"><span class="notification-badge bg-info"><i class="fas fa-at"></i></span>
                                                <span class="notification-info">
                                                                <span class="notification-info"><b>John Doe</b> mentioned you in a post "Update v1.5"</span>
                                                                <small class="notification-date">06:07</small>
                                                            </span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="notification-badge bg-danger"><i class="fas fa-bolt"></i></span>
                                                <span class="notification-info">
                                                                <span class="notification-info">4 new special offers from the apps you follow!</span>
                                                                <small class="notification-date">Yesterday</small>
                                                            </span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="notification-badge bg-success"><i class="fas fa-bullhorn"></i></span>
                                                <span class="notification-info">
                                                                <span class="notification-info">There is a meeting with <b>Ethan</b> in 15 minutes!</span>
                                                                <small class="notification-date">Yesterday</small>
                                                            </span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item d-md-block">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/avatars/avatar1.png" alt="" class="rounded-circle"></a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Calendar</a></li>
                                <li><a href="#"><span class="badge float-right badge-info">64</span>Messages</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Account Settings</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.container-fluid -->
            </nav>
        </div><!-- /Page Header -->
        <!-- Page Inner -->
        <div class="page-inner no-page-title">
            <div id="main-wrapper">
                @yield('content')
            <div class="page-footer">
                <p>2019 &copy; stacks</p>
            </div>
        </div><!-- /Page Inner -->
        <div class="page-right-sidebar" id="main-right-sidebar">
            <div class="page-right-sidebar-inner">
                <div class="right-sidebar-top">
                    <span class="chat-header">Chat</span>
                    <a href="javascript:void(0)" class="right-sidebar-toggle right-sidebar-close" data-sidebar-id="main-right-sidebar"><i class="icon-close"></i></a>
                </div>
                <div class="right-sidebar-content">
                    <!-- Tab panes -->
                    <div class="chat-list">
                        <span class="chat-title">Recent</span>
                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread" data-sidebar-id="chat-right-sidebar">
                            <div class="user-avatar">
                                <img src="../../assets/images/avatars/avatar1.png" alt="">
                            </div>
                            <div class="chat-info">
                                <span class="chat-author">David</span>
                                <span class="chat-text">Hello there!</span>
                                <span class="chat-time">16:20</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread active-user" data-sidebar-id="chat-right-sidebar">
                            <div class="user-avatar">
                                <img src="../../assets/images/avatars/avatar2.png" alt="">
                            </div>
                            <div class="chat-info">
                                <span class="chat-author">Bob</span>
                                <span class="chat-text">Hello there!</span>
                                <span class="chat-time">11:34</span>
                            </div>
                        </a>
                    </div>
                    <div class="chat-list">
                        <span class="chat-title">Older</span>
                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item" data-sidebar-id="chat-right-sidebar">
                            <div class="user-avatar">
                                <img src="../../assets/images/avatars/avatar3.png" alt="">
                            </div>
                            <div class="chat-info">
                                <span class="chat-author">Tom</span>
                                <span class="chat-text">Hello there!</span>
                                <span class="chat-time">2d</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                            <div class="user-avatar">
                                <img src="../../assets/images/avatars/avatar4.png" alt="">
                            </div>
                            <div class="chat-info">
                                <span class="chat-author">Anna</span>
                                <span class="chat-text">Hello there!</span>
                                <span class="chat-time">4d</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                            <div class="user-avatar">
                                <img src="../../assets/images/avatars/avatar5.png" alt="">
                            </div>
                            <div class="chat-info">
                                <span class="chat-author">Noah</span>
                                <span class="chat-text">Hello there!</span>
                                <span class="chat-time">&nbsp;</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="load-more-messages"  data-toggle="tooltip" data-placement="bottom" title="Load More">&bull;&bull;&bull;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-right-sidebar" id="chat-right-sidebar">
            <div class="page-right-sidebar-inner">
                <div class="right-sidebar-top">
                    <div class="chat-top-info">
                        <span class="chat-name">Noah</span>
                        <span class="chat-state">2h ago</span>
                    </div>
                    <a href="javascript:void(0)" class="right-sidebar-toggle chat-sidebar-close float-right" data-sidebar-id="chat-right-sidebar"><i class="icon-keyboard_arrow_right"></i></a>
                </div>
                <div class="right-sidebar-content">
                    <div class="right-sidebar-chat slimscroll">
                        <div class="chat-bubbles">
                            <div class="chat-start-date">02/06/2017 5:58PM</div>
                            <div class="chat-bubble them">
                                <div class="chat-bubble-img-container">
                                    <img src="../../assets/images/avatars/avatar1.png" alt="">
                                </div>
                                <div class="chat-bubble-text-container">
                                    <span class="chat-bubble-text">Hello</span>
                                </div>
                            </div>
                            <div class="chat-bubble me">
                                <div class="chat-bubble-text-container">
                                    <span class="chat-bubble-text">Hello!</span>
                                </div>
                            </div>
                            <div class="chat-start-date">03/06/2017 4:22AM</div>
                            <div class="chat-bubble me">
                                <div class="chat-bubble-text-container">
                                    <span class="chat-bubble-text">lorem</span>
                                </div>
                            </div>
                            <div class="chat-bubble them">
                                <div class="chat-bubble-img-container">
                                    <img src="../../assets/images/avatars/avatar1.png" alt="">
                                </div>
                                <div class="chat-bubble-text-container">
                                    <span class="chat-bubble-text">ipsum dolor sit amet</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-write">
                        <form class="form-horizontal" action="javascript:void(0);">
                            <input type="text" class="form-control" placeholder="Say something">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{URL::asset('vendor/admin/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/plugins/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/js/concept.min.js')}}"></script>
<script src="{{URL::asset('vendor/admin/js/pages/dashboard.js')}}"></script>


</div>
</body>
<style type="text/css">


    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</html>
