<template>
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="topbar-logo-header">
                    <div class="">
                        <img src="../../assets/assets_auth/images/2.png" style="width: 180px;" class="logo-icon"
                            alt="logo icon">
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1 text-center">
                    <h2>
                        <p style="font-size: larger; color: burlywood;">
                            <b> TRANG QUẢN LÝ NEKOCINEMATIC</b>
                        </p>
                    </h2>
                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPU1eOuKBgw8RSlGOUw3mViNNlt8nkqe3Z1J0Pe7lJdksyfg0oZabCj_TLfg4xttVkOwo&usqp=CAU"
                            class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0"><b class="text-capitalize">{{ username }}</b></p>
                            <p class="designattion mb-0"></p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-home-circle'></i><span>Dashboard</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-download'></i><span>Downloads</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item" @:click="logOut()" href="javascript:;"><i
                                    class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>
<script>
export default {
    data() {
        return {
            username: localStorage.getItem("username"),
            getToken: localStorage.getItem("tokenAdmin"),
        }
    },
    mounted() {

    },
    methods: {
        logOut() {
            localStorage.removeItem("tokenAdmin");
            this.$router.push('/admin/auth');
        },
        checkLogin() {
            if (this.getToken == null) {
                this.$router.push('/admin/auth');
            }
        },
    }
}
</script>
<style></style>