<template>
    <div class="header-wrapper">
        <TopRocker></TopRocker>
        <MenuRocker></MenuRocker>
    </div>
    <div class="page-wrapper">
        <div class="page-content">
            <router-view></router-view>
        </div>
    </div>

    <div class="overlay toggle-icon"></div>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <FooterRocker></FooterRocker>
</template>
<script>
import checkLoginAdmin from '../../router/checkLoginAdmin';
import MenuRocker from '../components/MenuRocker.vue';
import TopRocker from '../components/TopRocker.vue';
import '../../assets/assets_rocker/js/bootstrap.bundle.min.js';
import '../../assets/assets_rocker/js/jquery.min.js';
import '../../assets/assets_rocker/plugins/simplebar/js/simplebar.min.js';
import '../../assets/assets_rocker/plugins/metismenu/js/metisMenu.min.js';
import '../../assets/assets_rocker/plugins/perfect-scrollbar/js/perfect-scrollbar.js';
import '../../assets/assets_rocker/js/index.js';
import '../../assets/assets_rocker/js/app.js';
export default {
    name: 'app',
    components: {
        MenuRocker,
        TopRocker
    }, mounted() {
        checkLoginAdmin();
    },
    methods: {
        hideModal(id) {
            $('#' + id).removeClass('show');
            $('.modal-backdrop.show').remove();
            $('body').removeClass('modal-open');
            $('body').css('overflow', '');
        },
    }
}
</script>
<style>
@import '../../assets/assets_rocker/plugins/simplebar/css/simplebar.css';
@import '../../assets/assets_rocker/plugins/perfect-scrollbar/css/perfect-scrollbar.css';
@import '../../assets/assets_rocker/css/bootstrap.min.css';
@import '../../assets/assets_rocker/css/bootstrap-extended.css';
@import '../../assets/assets_rocker/css/app.css';
@import '../../assets/assets_rocker/css/icons.css';
@import '../../assets/assets_rocker/css/dark-theme.css';
@import '../../assets/assets_rocker/css/semi-dark.css';
@import '../../assets/assets_rocker/css/header-colors.css';
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");
</style>