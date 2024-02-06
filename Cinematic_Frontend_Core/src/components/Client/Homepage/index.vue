<template>
    <div class="product-section section mt-5 " style="background-color: #06080f ; border-radius: 10px; padding: 30px 10px;">
        <div class="container">
            <div class="row">
                <div class="banner"></div>
            </div>
            <div class="row" style="">
                <div class="banner-section section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-10">
                                <div class="banner banner-1 content-left content-middle" style="position: relative;">
                                    <template v-for="(value, key) in movies_new">
                                        <a href="#" class="image"><img v-bind:src="value.url" alt="Banner Image"></a>
                                    </template>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="myaccountContent">
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content" style="height: 195px;">
                                            <img src="../../../assets/assets_client/images/neko_logo.png"
                                                style="width: 350px; transform: translate(-5px, -10px)" alt="">
                                            <div class="welcome">
                                                <p>Xin chào bạn !
                                                </p>
                                            </div>
                                            <p class="mb-0">
                                                Chào mừng bạn đến với Neko Family Cinematic tự hào là nơi tập trung đa dạng
                                                các bộ phim hấp dẫn, từ những bộ phim bom tấn đình đám đến các tác phẩm nghệ
                                                thuật độc đáo và mới lạ.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-3">
                <div id="carouselExampleInterval1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="4000">
                            <img src="../../../assets/assets_client/images/My Demon/1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-interval="4000">
                            <img src="../../../assets/assets_client/images/My Demon/2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../assets/assets_client/images/My Demon/3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../assets/assets_client/images/My Demon/4.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row mt-2 p-3">
                <swiper-container class="mySwiper" watch-slides-progress="true" slides-per-view="5" space-between="5"
                    style="z-index: 0">
                    <template v-for="(v, k) in movies">
                        <swiper-slide class="me-3" style="z-index: -1">
                            <router-link :to="`/detail/${v.id}`">
                                <div class="product-item">
                                    <div class="product-inner" style="padding-bottom: 0 !important;">
                                        <div class="image">
                                            <img style="width: 200px; height: 250px ; object-fit: cover !important;"
                                                v-bind:src="v.url" alt="">
                                            <div class="image-overlay">
                                                <div class="action-buttons">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="icon-playvideo">
                                        <i class="fa-regular fa-circle-play fa-3x"></i>
                                    </div>
                                </div>
                            </router-link>
                        </swiper-slide>
                    </template>
                </swiper-container>
            </div>
            <div class="row p-3">
                <div class="col-8">
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data- interval="4000">
                                <img src="../../../assets/assets_client/images/My Demon/1.png" class="d-block w-100"
                                    style="height: 478px;" alt="...">
                            </div>
                            <div class="carousel-item" data-interval="4000">
                                <img src="../../../assets/assets_client/images/My Demon/2.png" class="d-block w-100"
                                    style="height: 478px;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../../../assets/assets_client/images/My Demon/3.png" class="d-block w-100"
                                    style="height: 478px;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../../../assets/assets_client/images/My Demon/4.png" class="d-block w-100"
                                    style="height: 478px;" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div
                        style="background-color: rgba(153, 137, 137, 0.379); height:478px; border: 1px solid #eee; overflow-y: hidden;">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content1">
                                    <img src="../../../assets/assets_client/images/neko_logo.png"
                                        style="width: 300px; transform: translate(-5px, -10px)" alt="">
                                    <div class="welcome">
                                        <p class="text-center"
                                            style="text-transform: uppercase; font-size: 15px; font-weight: bold;">Phim Mới
                                            Cập Nhật</p>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-12">
                                            <div class="process"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="mt-1">
                                                <template v-for="(v, k) in list_sort_movies">
                                                    <div class="row">

                                                        <router-link :to="`/detail/${v.id}`">
                                                            <div class="col-md-12 hover-title-film py-1">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <span
                                                                            class="hidden-one-text title-film text-capitalize "
                                                                            style="font-size: 12px; color:#D992A0">
                                                                            <span class="position-relative">
                                                                                {{
                                                                                    v.original_name
                                                                                }}
                                                                                <span v-if="k === 0" class="start-100
                                                                                translate-middle badge rounded-pill
                                                                                bg-danger" style="margin-left: 12px;">
                                                                                    New

                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-md-3 text-end "
                                                                        style="font-size: 12px; font-style: italic; color:rgb(159, 138, 138)">
                                                                        Full</div>
                                                                </div>
                                                            </div>

                                                        </router-link>
                                                    </div>
                                                </template>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Moisturizing Oil</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Pending</td>
                                                    <td>$45</td>
                                                    <td><a href="cart.html" class="btn btn-dark btn-round">View</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Katopeno Altuni</td>
                                                    <td>July 22, 2018</td>
                                                    <td>Approved</td>
                                                    <td>$100</td>
                                                    <td><a href="cart.html" class="btn btn-dark btn-round">View</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Murikhete Paris</td>
                                                    <td>June 12, 2017</td>
                                                    <td>On Hold</td>
                                                    <td>$99</td>
                                                    <td><a href="cart.html" class="btn btn-dark btn-round">View</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>

                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                    <th>Expire</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Moisturizing Oil</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Yes</td>
                                                    <td><a href="#" class="btn btn-dark btn-round">Download File</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Katopeno Altuni</td>
                                                    <td>Sep 12, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="#" class="btn btn-dark btn-round">Download File</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>

                                    <p class="saved-message">You Can't Saved Your Pawidth:300px;transform:translate(-5px,
                                        -10px);yment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                            San Francisco, CA 94103</p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>

                                    <a href="#" class="btn btn-dark btn-round d-inline-block"><i class="fa fa-edit"></i>Edit
                                        Address</a>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" placeholder="First Name" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="last-name" placeholder="Last Name" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="display-name" placeholder="Display Name" type="text">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Email Address" type="email">
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <h4>Password change</h4>
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" placeholder="Current Password" type="password">
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="New Password" type="password">
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password">
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-dark btn-round btn-lg">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="section-title text-center col mb-30 text-light mt-25">
                    <h1 class="text-light">Phim Được Ưa Thích Nhất</h1>
                    <p>Phim Hot Mùa Đông Năm 2023</p>
                </div>
            </div>

            <div class="row mbn-40">
                <template v-for="(v, k) in movies">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">
                        <router-link :to="`/detail/${v.id}`">
                            <div class="">
                                <div class="product-item">
                                    <div class="product-inner">
                                        <div class="image">
                                            <img style="height: 386px;" v-bind:src="v.url" alt="">
                                            <div class="image-overlay">
                                                <div class="action-buttons">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content" style="height: 180px">
                                            <div class="content-inner d-flex flex-column w-100">
                                                <h4
                                                    class="title text-center align-items-center d-flex flex-column text-center justify-content-center">
                                                    <div href="single-product.html" style="transform: translateY(-10px);"
                                                        class="text-center m-auto hidden-one-text text-capitalize">{{
                                                            v.original_name }}
                                                    </div>
                                                </h4>
                                                <div class="ratting ms-1 fs-6 text-center mt-2 "
                                                    style="transform: translateY(-15px);">
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star-o text-danger"></i>
                                                </div>
                                                <h5 class="size mt-3">Quốc Gia: {{ v.country_name }}
                                                </h5>
                                                <h5 class="color">
                                                    Thể loại: <b class="ms-1"> {{ v.list_type }}</b>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </template>


            </div>

        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            movies: [],
            list_sort_movies: [],
            movies_new: [],
            id_user: "",
        }
    },
    async mounted() {

        await this.getIdUser();
        await this.getMovie();
        await this.sortMovie();
        $('.carousel').carousel()
    },
    methods: {
        async getMovie() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/movie/get-data')
                .then((res) => {
                    this.movies = res.data.data;
                    this.list_sort_movies = [...this.movies];
                })
        },
        async sortMovie() {
            for (var i = 0; i < this.list_sort_movies.length; i++) {
                for (var j = i + 1; j < this.list_sort_movies.length; j++) {
                    if (this.list_sort_movies[i].id < this.list_sort_movies[j].id) {
                        var temp = this.list_sort_movies[i];
                        this.list_sort_movies[i] = this.list_sort_movies[j];
                        this.list_sort_movies[j] = temp;
                    }
                }
            }
            console.log(this.list_sort_movies);
            this.movies_new[0] = this.list_sort_movies[0];
            console.log(this.movies_new);
            return this.list_sort_movies.splice(11, this.list_sort_movies.length - 11)// xoas taij vi tri thu 11 , xoa max phan tu
        },
        async getIdUser() {
            this.id_user = localStorage.getItem("id_user");
            console.log("local id cua ban : " + this.id_user);
        }
    }
}
</script>
<style></style>