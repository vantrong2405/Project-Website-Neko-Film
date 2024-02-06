<template>
	<body class="bg-login">
		<div class="wrapper">
			<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
				<div class="container-fluid">
					<RouterView></RouterView>
				</div>
			</div>
		</div>
	</body>
</template>
<script>
import checkLoginAdmin from '../../router/checkLoginAdmin';
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
	},

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