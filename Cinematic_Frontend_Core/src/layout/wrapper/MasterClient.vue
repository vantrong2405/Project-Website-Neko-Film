<template>
    <Preloader></Preloader>
    <div class="main-wrapper">
        <HeaderClient></HeaderClient>
        <div class="container" style="margin-top: 90px;">
            <router-view></router-view>
        </div>
        <FooterClient></FooterClient>
    </div>
</template>
<script>
import Preloader from '../components/Preloader.vue';
import HeaderClient from '../components/HeaderClient.vue';
import FooterClient from '../components/FooterClient.vue';
import "../../assets/assets_client/js/vendor/modernizr-3.7.1.min.js";
import "../../assets/assets_client/js/vendor/jquery-3.4.1.min.js";
import "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"
import "https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"
import "../../assets/assets_client/js/bootstrap.min.js";

export default {
    name: 'app',
    components: {
        HeaderClient, FooterClient,
    },
}
</script>
<style>
@import url("https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css");
@import "../../assets/assets_client/css/bootstrap.min.css";
@import "../../assets/assets_client/css/icon-font.min.css";
@import "../../assets/assets_client/css/plugins.css";
@import "../../assets/assets_client/css/helper.css";
@import "../../assets/assets_client/css/style.css";
@import "../../assets/assets_client/css/swiper_homepage.css";
</style>