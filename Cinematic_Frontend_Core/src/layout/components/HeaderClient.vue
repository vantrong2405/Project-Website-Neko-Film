<template>
    <!-- Header Section Start -->
    <div class="header-section section" style="background-color:#010408f1; height: 70px; z-index: 11111111111;">
        <!-- Header Bottom Start -->
        <div class="header-bottom header-bottom-one header-sticky">
            <div class="container">
                <div class="row menu-center align-items-center justify-content-between">

                    <div class="col mb-15">
                        <!-- Logo Start -->
                        <router-link to="/">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="../../assets/assets_client/images/logo.png"
                                        style="width: 180px; transform: translateY(-5px);" alt="Jadusona">
                                </a>
                            </div><!-- Logo End -->
                        </router-link>
                    </div>

                    <div class="col order-2 order-lg-3" style="transform: translateY(-10px);">
                        <!-- Header Advance Search Start -->
                        <div class="header-shop-links d-flex align-items-center">

                            <router-link to="/search">
                                <button class="search-toggle btn align-middle"><i class="fa-solid fa-magnifying-glass ms-1">
                                    </i>
                                    <b>Tìm Kiếm</b></button>
                            </router-link>
                            <router-link to="/client/auth" v-if="isLogin === false || checkLogin() == true">
                                <button class="btn btn-danger ms-2 me-2" @:click="viewAuth()"><b>Đăng Nhập</b></button>
                            </router-link>


                            <div class="dropdown border-0" v-if="isLogin === true || checkLogin() == false">
                                <button class="btn border-0 dropdown-toggle text-light fs-4  d-flex align-items-center down"
                                    style="outline: none;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="https://cdn.alongwalk.info/info/wp-content/uploads/2022/11/16190620/image-99-hinh-avatar-cute-ngau-ca-tinh-de-thuong-nhat-cho-nam-nu-178699bcb1cf6d58f3f17d3a1ee26472.jpg"
                                        alt="" width="35" class="rounded-circle">
                                    <span class=" ms-2 fs-6 text-capitalize down"><b>{{ username_client }}</b></span>
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><router-link :to="`/profile`"><a class="dropdown-item text-capitalize" href="">Thông
                                                tin cá nhân</a></router-link></li>
                                    <li><router-link :to="`/change-password`"><a class="dropdown-item text-capitalize"
                                                href="/change-password">Đổi mật khẩu</a></router-link></li>

                                    <li> <router-link to="/">
                                            <a class="dropdown-item text-capitalize" href="#" v-on:click="logOut()">Đăng
                                                xuất</a>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>


                        </div><!-- Header Advance Search End -->
                    </div>

                    <div class="col order-3 order-lg-2" style="transform: translateY(-10px);">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="active">
                                        <router-link to="/">
                                            <div href="">HOME</div>
                                        </router-link>
                                    </li>
                                    <li><a href="">THỂ LOẠI</a>
                                        <ul class="sub-menu" style="width: 800px;">
                                            <div class="row d-flex" style="">
                                                <template v-for="(v, k) in list">
                                                    <div class="col-4" style="justify-content: start;">
                                                        <router-link :to="`/movie/${v.id}`">
                                                            <li><a href="" class="text-nowrap" style="width: 100%">{{ v.name }}</a> </li>
                                                        </router-link>
                                                    </div>
                                                </template>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <router-link to="/yeu-thich">
                                            <div href="">YÊU THÍCH</div>
                                        </router-link>
                                    </li>

                                    <li><a href="">CONTACT</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobile-menu order-12 d-block d-lg-none col"></div>

                </div>
            </div>
        </div><!-- Header BOttom End -->
    </div><!-- Header Section End -->
</template>
<script>
import axios from 'axios'
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            isLogin: true,
            getToken: localStorage.getItem("tokenClient"),
            username_client: localStorage.getItem("username_client"),
            id_user: localStorage.getItem("id_user_client"),
            list: [],
            slug: "",
        }
    },
    async mounted() {
        await this.checkLogin();
        await this.getTypes();
    },
    methods: {
        async checkLogin() {
            console.log(this.getToken);
            if (this.getToken != null) {
                this.isLogin = true;
                return true;
            } else {
                this.isLogin = false;
                return false;
            }
        },
        async getTypes() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/get-data')
                .then((res) => {
                    this.list = res.data.data;

                })
                .catch((res) => {

                });
        },
        async logOut() {
            localStorage.removeItem("tokenClient");
          
                // this.checkLogin();
                // location.href("/");
                location.reload();

        },
    }
}
</script>
<style></style>