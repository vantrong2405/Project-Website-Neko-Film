<template>
    <div class="product-section section mt-5 mb-1"
        style="background-color: #06080f ; border-radius: 10px; padding-top: 30px;">
        <div class="container">
            <div class="main-wrapper mt-5">
                <div class="container mt-5 ">
                    <div class="row row-30 mbn-40">
                        <div class="col-xl-9 col-lg-8 col-12 mb-40">
                            <div class="row row-20">

                                <div class="col-lg-6 col-12 mb-40">

                                    <div class="pro-large-img mb-10 ">
                                        <a href="assets/images/product/product-zoom-1.jpg">
                                            <img v-bind:src="detail.url" alt="" style="height: 575px; object-fit: cover;" />
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 mb-40">
                                    <div class="single-product-content">

                                        <div class="head">
                                            <div class="head-left">

                                                <h1 class="title namephim">{{ detail.original_name }}</h1>
                                                <h4 class="title namephim">{{ detail.vietnamese_name }}</h4>

                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description">
                                            <P>{{ detail.description }}</P>
                                        </div>
                                        <span class="availability"><i class="fa-brands fa-2xl fa-imdb"></i>
                                            <span><b>8.2</b></span></span>

                                        <div class="actions">
                                            <button class="box me-2" data-tooltip="Wishlist"><i
                                                    class="ti-heart"></i></button>
                                            <button v-on:click="viewMovie()"><i class="fa-solid fa-play"
                                                    style="color: #ff3c2e;"></i><span> XEM
                                                    PHIM</span></button>
                                        </div>
                                        <div class="episode actions">
                                            <template v-for="(v, k) in episodes">
                                                <router-link :to="`/detail/${id_movies}/${v.id}`">
                                                    <button class="ms-2"><b>{{ v.num_eps }}</b></button>
                                                </router-link>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-50">
                                <!-- Nav tabs -->
                                <div class="col-12">
                                    <ul class="pro-info-tab-list section nav">
                                        <li><a class="active" href="#more-info" data-toggle="tab">More info</a></li>
                                        <li><a href="#data-sheet" data-toggle="tab">DIỄN VIÊN</a></li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content col-12 mb-5">
                                    <div class="pro-info-tab tab-pane active" id="more-info">
                                        <p class="mb-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row my-2">
                                                    <div class="col-1 ">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Lịch chiếu: {{ detail.date }}
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-11">
                                                        Trạng thái: Phim đang chiếu/Cập Nhật Tập 12 VietSub

                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Thể loại: {{ detail.types }} <br>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Đạo diễn: {{ detail.author_name }} <br>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Quốc Gia : {{ detail.country_name }}<br>
                                                    </div>
                                                </div>



                                                <div class="col-10">

                                                </div>

                                            </div>

                                            <div class="col-6">
                                                <div class="row my-2">
                                                    <div class="col-1 ">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Thời lượng: 12/24
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-11">
                                                        Chất lượng: HD
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Rating: PG-13 - Teens 13 tuổi trở lên
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Ngôn ngữ: {{ detail.language_name }}
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Studio: OLM, TOHO animation STUDIO
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <div class="col-1">
                                                        <i class="fa-regular fa-sm fa-circle-dot"
                                                            style="color: #2afe43;"></i>
                                                    </div>
                                                    <div class="col-10">
                                                        Số người theo dõi: 4,591
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="pro-info-tab tab-pane" id="data-sheet">
                                        <div class="row">
                                            <template v-for="(value, key) in info_actor">
                                                <div class="col-2 mb-1">
                                                    <img class="mb-5"
                                                        style="height: 100px; width: 100px; object-fit: cover; border-radius: 100px;"
                                                        src="https://image.tienphong.vn/600x315/Uploaded/2023/lce-ljvqj/2023_12_04/kim-yoo-jung28-9453.jpg"
                                                        alt="">
                                                    <h4 class="text-center text-light text-nowrap"><b>{{ value.role }}</b></h4>
                                                    <h6 class="text-center text-light text-nowrap">{{ value.actor }}</h6>
                                                </div>
                                            </template>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-12 mb-40 text-light">
                            <div style="background-color: rgba(153, 137, 137, 0.38); height: 440px;">
                                <div class="tab-content myaccount-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="">
                                            <div class="welcome">
                                                <p class="text-center"
                                                    style="text-transform: uppercase; font-size: 15px; font-weight: bold;">
                                                    PHIM MỚI CẬP NHẬT</p>
                                            </div>
                                            <div class="row mt-2 mb-3">
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
                                        <hr>
                                    </div><!-- Single Tab Content End --><!-- Single Tab Content Start -->
                                </div>
                            </div>
                            <div class="sidebar mt-5">
                                <hr>
                                <div class="card-body">
                                    <div class="title d-flex justify-content-between"><a href=""
                                            style="font-weight:bold;text-transform:uppercase;">PHIM HOT TRONG TUẦN NÀY</a>
                                    </div>
                                    <div class="process my-2"></div>
                                    <ul class="MovieList">
                                        <template v-for="(v, k) in list_hot_movies">
                                            <router-link :to="`/detail/${v.id}`">
                                                <li class="mb-2">
                                                    <div rel="bookmark" class="d-flex" style="width:100%;">
                                                        <div class="Image me-3">
                                                            <figure class="Objf TpMvPlay AAIco-play_arrow"><img width="55"
                                                                    height="85" :src="v.url"
                                                                    class="attachment-img-mov-sm size-img-mov-sm wp-post-image"
                                                                    alt="Jujutsu Kaisen 2nd Season - Jujutsu Kaisen SS2, Chú Thuật Hồi Chiến Mùa 2, Sorcery Fight, JJK 2">
                                                            </figure>
                                                        </div>
                                                        <div class="body"><span style="font-weight:bold;">{{ v.original_name
                                                        }}</span>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <span class="Vote AAIco-star me-2"><i
                                                                        class="fa-solid fa-star" style="color:#B5E745;"></i>
                                                                    9.5 </span><span class="Time AAIco-access_time me-2"><i
                                                                        class="fa-solid fa-clock"></i> 23/23 </span><span
                                                                    class="Date AAIco-date_range me-2"><i
                                                                        class="fa-regular fa-calendar"></i> 2023 </span>
                                                            </div>
                                                            <div class="view-screen"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </router-link>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>






                    </div>

                </div>
            </div>
        </div><!-- Page Section End -->



    </div>
</template>
<script>
import axios from 'axios'
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "bottom-right" });
export default {
    data() {
        return {
            movies: [],
            types: [],
            id_types: '',
            country: [],
            actor: [],
            detail: {},
            episodes: [],
            id_movies: this.$route.params.id,
            id_ep: '',
            list_sort_movies: [],
            list_hot_movies: [],
            actor: [],
            role: [],
            info_actor: [],
        }
    },
    async mounted() {
        window.scrollTo(0, 0);
        this.getDetail();
        this.getEpisodes();
        await this.getMovie();
        await this.sortMovie();
        await this.hotMovies();
    },
    watch: {
        '$route.params.id'(newId, oldId) {
            window.scrollTo(0, 0);
            this.getDetail();
            this.getEpisodes();
        },
    },
    methods: {
        getDetail() {
            const id = this.$route.params.id;
            const payload = {
                'id_movie': id
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/movie/get-detail', payload)
                .then((res) => {
                    this.detail = res.data.data[0];
                    console.log("day la chi tiet :");
                    console.log(this.detail);
                    console.log("nef ban hien");
                    this.actor = this.detail.actors.split(",")
                    this.role = this.detail.roles.split(",")

                    for (let i = 0; i < this.actor.length; i++) {
                        var Object_actor = {
                            actor: this.actor[i],
                            role: this.role[i]
                        };

                        this.info_actor.push(Object_actor);
                    }

                    console.log(this.info_actor);
                })
                .catch((res) => {

                });
        },
        getEpisodes() {
            const id = this.$route.params.id;
            const payload = {
                id_movie: id
            }
            console.log(payload);
            axios
                .post('http://127.0.0.1:8000/api/admin/episode/get-data', payload)
                .then((res) => {
                    this.episodes = res.data.data;
                    this.id_ep = this.episodes[0].id;
                    // console.log(this.episodes);
                })
                .catch((res) => {

                });
        },
        viewMovie() {
            console.log();
            if (this.episodes.length === 0) {
                toaster.error('Thông báo<br> Phim này chưa có tập nào mới !');
            } else {
                this.$router.push(`/detail/${this.id_movies}/${this.id_ep}`);
            }
        }, async getMovie() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/movie/get-data')
                .then((res) => {
                    this.movies = res.data.data;
                    this.list_sort_movies = [...this.movies];
                    this.list_hot_movies = [...this.movies];
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
            // console.log("nef");
            // console.log(this.list_sort_movies);
            return this.list_sort_movies.splice(11, this.list_sort_movies.length - 11)
        },
        async hotMovies() {
            return this.list_hot_movies.splice(5, this.list_hot_movies.length - 5)
        }
    }

}
</script>
<style></style>