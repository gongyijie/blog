<template>
    <div>
        <el-row>
            <el-col :span="12">
                <el-menu
                        default-active="1"
                        class="el-menu-vertical-demo"
                        @open="handleOpen"
                        @close="handleClose"
                        background-color="#545c64"
                        text-color="#fff"
                        active-text-color="#ffd04b">
                    <el-menu-item index="1">
                        <i class="el-icon-search"></i>
                        <span slot="title">
                            <router-link to="/">查询歌曲</router-link>
                        </span>
                    </el-menu-item>
                    <el-menu-item index="2">
                        <i class="el-icon-edit"></i>
                        <span slot="title">
                            <router-link to="/change">修改歌曲</router-link>
                        </span>
                    </el-menu-item>
                    <el-menu-item index="3">
                        <i class="el-icon-delete"></i>
                        <span slot="title">
                            <router-link to="/delete">删除歌曲</router-link>
                        </span>
                    </el-menu-item>
                    <div class="bottom"></div>
                </el-menu>
            </el-col>
        </el-row>
    </div>
</template>

<style>
    body{
        margin:0;
    }
    .el-row{
        width: 300px;
    }
    .bottom{
        width: 149px;
        height: 1000px;
        background-color: #545c64;
    }
    a{
        color: #fff;
    }
    a:link{
        text-decoration: none;
        color: #fff;
    }
    a:visited {
        text-decoration: none;
        color: #fff;
    }
    a:hover {
        text-decoration: none;
        color: rgb(255, 208, 75);
    }
    a:active {
        text-decoration: none;
        color: #fff;
    }
</style>

<script>
    export default {
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>