<template>
    <div>
        <my-menu></my-menu>
        <div class="nav">
            <left></left>
        </div>
        <div class="content">
            <router-view></router-view>
        </div>
        <div class="clear"></div>
    </div>
</template>

<style>
    .nav{
        float: left;
    }
    .content{
        float: left;
        margin: 100px 0 0 0;
    }
    .clear{
        clear: both;
    }
</style>

<script>
    import myMenu from './components/header.vue'
    import left from './components/OperateComponent.vue'
    export default{
        components: {
            myMenu,
            left,
        }
    }
</script>

