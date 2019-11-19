<!--App.vue khai báo router-view - thứ sẽ render view theo url của component-->
<!--Created by phuclv - 12/11/2019-->
<template>
    <div class="main">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="https://www.ominext.com/"><img src="https://www.ominext.com/themes/omiintro/assets/image/logo.svg" title="Trang chủ Ominext"></a>
                    <!-- <ul>
                        <li><router-link to="/"><i class='fas fa-home' style="font-size:20px; margin:auto; width:15%;"></i><a href="#home">Trang chủ</a></router-link></li>
                        <li><router-link to="/lists"><i class='fas fa-user' style="font-size:20px; margin:auto; width:15%;"></i><a href="#student_manager">Quản lý học sinh</a></router-link></li>
                        <li><i class="fas fa-book" style="font-size:20px; margin:auto; width:15%;"></i><a href="#subject">Quản lý môn học</a></li>
                        <li><i class="fas fa-newspaper" style="font-size:20px; margin:auto; width:15%;"></i><a href="#news">Tin tức</a></li>
                        <li><i class="fas fa-cogs" style="font-size:20px; margin:auto; width:15%;"></i><a href="#setting">Cài đặt</a></li>
                    </ul> -->
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><router-link to="/"><a href="#home"></a>Trang chủ</router-link></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><router-link to="/lists"><a href="#student">Học sinh</a></router-link></li>
                                <li><a href="#">Lớp học</a></li>
                                <li><a href="#">Bộ môn</a></li>
                                <li><a href="#">Giáo viên</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Hệ thống</a></li>
                        <li><a href="#">Tùy chọn</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" action="/action_page.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default btn-search">Tìm kiếm</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Đăng ký</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <transition name="fade">
            <router-view></router-view>
        </transition>  
    </div>
</template>
<style lang="scss" scoped>
    .main {
        padding: 10px;
    }
    img {
        width: auto;
        height: 100%;
    }
    .glyphicon-user:before {
        padding-right: 8px;
        content: "\e008";
    }
    .glyphicon-log-in:before {
        content: "\e161";
        padding-right: 8px;
    }
    .btn-search {
        background-color: #4CAF50;
        color: #fff;
        border: none;
    }
    .btn-search:hover {
        background-color: lightgreen;
    }
</style>

<script>
    export default{
        
    }
</script>