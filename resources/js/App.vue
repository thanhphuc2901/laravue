<!--App.vue khai báo router-view - thứ sẽ render view theo url của component-->
<!--Created by phuclv - 12/11/2019-->
<template>
    <div class="container">
        <div>
            <a href="https://www.ominext.com/" title="Trang chủ"><div class="logo"></div></a>
            <div class="nav-left w3-animate-left">
                <ul>
                    <li class="active"><router-link to="/"><i class='fas fa-home' style="font-size:20px; margin:auto; width:18%;"></i><a href="#home">Trang chủ</a></router-link></li>
                    <li><router-link to="/lists"><i class='fas fa-user' style="font-size:20px; margin:auto; width:18%;"></i><a href="#student_manager">Quản lý học sinh</a></router-link></li>
                    <li><i class="fas fa-book" style="font-size:20px; margin:auto; width:18%;"></i><a href="#subject">Quản lý môn học</a></li>
                    <li><i class="fas fa-newspaper" style="font-size:20px; margin:auto; width:18%;"></i><a href="#news">Tin tức</a></li>
                    <li><i class="fas fa-cogs" style="font-size:20px; margin:auto; width:18%;"></i><a href="#setting">Cài đặt</a></li>
                </ul>
            </div>
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
    .header {
        display: inline;
    }
    .header h2 {
        float: left;
        margin: 8px 0 0 0;
    }
    h2 {
        margin-top: 10px;
    }
    .student-dashboard {
        margin: 8px;
    }
    h2 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
    }
    .logo {
        width: 100%;
        height: 29.8vh;
        background-image: url('/images/2.png');
        background-size: 960px;
        cursor: pointer;
        animation: fadein 3s;
        -webkit-animation: fadein 3s;
    }
    @-webkit-keyframes fadein { /* Safari and Chrome */
        from {
            opacity:0;
        }
        to {
            opacity:1;
        }
    }
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 15%;
        background-color: #5DADE2;
        position: fixed;
        height: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
        animation-duration: 3s;
        animation-name: slidein;
    }
    .nav-left {
        width: 15%;
        height: 100%;
    }
    li {
        border-bottom: 1px solid white;
        display: flex;
        color: #fff;
    }
    li:last-child {
        border-bottom: none;
    }
    li a {
        width: 100%;
        text-decoration: none;
        color: #fff;
        padding: 8px 0px;
    }
    li.active {
        background-color: #4CAF50;
        color: white;
    }
    li:hover:not(.active) {
        background-color: #7DCEA0;
        color: white;
    }
    .container {
        width: auto;
        margin-left: 15%;
        padding: 1px 16px;
        height: 100vh;
        animation: fadein 4s;
        -webkit-animation: fadein 4s;
    }
    .btn {
        width: 40px;
        height: 40px;
        background-repeat: no-repeat;
        margin: 5px 0px 5px 3px;
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -o-transform: scale(1);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
    .btn:hover {
        -webkit-transform: scale(1.15);
        -moz-transform: scale(1.15);
        -o-transform: scale(1.15);
    }
    .btn-container {
        text-align: right;
    }
</style>

<script>
    export default{
    }
</script>