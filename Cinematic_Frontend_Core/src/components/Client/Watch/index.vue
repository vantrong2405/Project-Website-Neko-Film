<template>
    <div class="product-section section mt-5 " style="background-color: #06080f ; border-radius: 10px; padding: 20px">
        <div class="row">
            <div class="col-md-8" style="height: 435px; padding-right: 5px !important;">
                <div class="video" style=" height: 100%;">
                    <Artplayer :key="componentKey" @get-instance="getInstance" :option="option" :style="style" />
                </div>
                <div class="mt-3 text-center">
                    <a href="" class="btn btn-danger ">
                        <i class="fa-solid fa-forward-step me-1"></i> Tập tiếp</a>
                    <a href="" class="btn btn-danger ms-1"><i class="fa-solid fa-clock-rotate-left"></i> Lịch sử xem</a>
                </div>
                <div class="episodes mt-2">
                    <div class="title">
                        <i class="fa-solid fa-bars fs-5" style="color:white"></i><span class="ms-2 fs-6"
                            style="color:white">Số tập</span>
                    </div>
                    <div class="items-episodes mt-2">
                        <div class="row">
                            <div class="col">
                                <template v-for="(v, k) in episodes">
                                    <router-link :to="`/detail/${id_movies}/${v.id}`">
                                        <div class=" btn btn-secondary me-2 mt-2" style="font-weight: bold;"
                                            @click="pickEpisode(v)">{{ v.num_eps }}
                                        </div>
                                    </router-link>

                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 5px">
                <div class="row" style="margin-bottom: 19px;">
                    <div class="col-md-12">
                        <div class="" style="background-color: #282C2E; ">
                            <div class="card-body">
                                <section class="Wdgt">
                                    <div class="Title" style="text-transform: uppercase"><b>Hôm nay xem gì?</b></div>
                                    <div class="process my-2"></div>
                                    <p>Nếu bạn buồn phiền không biết xem gì hôm nay. Hãy để chúng tôi chọn cho bạn</p>
                                    <div v-on:click="randomMovie()" class="btn btn-danger"><i
                                            class="fa-solid fa-caret-right fs-6 align-middle"></i><span
                                            class="align-middle">Xem Ngẫu Nhiên Phim Mới</span></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="" style="background-color: #282C2E; ">
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
    </div>
</template>
<script>
import Artplayer from "../VideoPlayer/index.vue";
import axios from "axios";
export default {
    data() {
        return {
            componentKey: 0,
            option: {
                url: "",
            },
            style: {
                width: "753px",
                height: "435px",

            },
            episodes: [],
            id_movies: this.$route.params.id,
            ep: {},
            movies: [],
            list_sort_movies: [],
            list_hot_movies: [],
        };
    },
    components: {
        Artplayer,
    },
    async mounted() {
        this.getEpisodes();
        this.getVideo()
        await this.getMovie()
        await this.sortMovie();
        await this.hotMovies();
    },
    methods: {
        checkEp() {
            if (this.episodes.length == 0) {
                window.location.href = "/"
            }
        },
        getInstance(art) {
            console.info(art);
        },
        onReady(art) {
            this.play()
        },
        getEpisodes() {
            const id = this.$route.params.id;
            const payload = {
                id_movie: id
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/episode/get-data', payload)
                .then((res) => {
                    this.episodes = res.data.data;
                    this.checkEp()
                    console.log(this.episodes)
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (k, v) {
                        toastr.error(v[0], 'Error');
                    });
                });
        },
        pickEpisode(value) {
            console.log(value)
            this.option.url = value.url_movie
            this.componentKey += 1;
        },
        nextEp() {
            this.componentKey += 1;
            this.option.url = this.ep[0].url_movie
        },
        getVideo() {
            const payload = {
                id_movies: this.$route.params.id,
                id_num: this.$route.params.id_ep
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/episode/get-ep', payload)
                .then((res) => {
                    this.ep = res.data.data;
                    this.option.url = this.ep[0].url_movie;
                    console.log('opp', this.option.url);
                    this.componentKey += 1;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (k, v) {
                        toastr.error(v[0], 'Error');
                    });
                });
        }, async getMovie() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/movie/get-data')
                .then((res) => {
                    this.movies = res.data.data;
                    this.list_hot_movies = res.data.data;
                })
        },
        randomMovie() {
            const random = Math.ceil(Math.random() * this.movies.length)
            this.$router.push(`/detail/${random}`);
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
            return this.list_sort_movies.splice(11, this.list_sort_movies.length - 11)
        },
        async hotMovies() {
            return this.list_hot_movies.splice(5, this.list_hot_movies.length - 5)
        }
    },
};
</script>
<style></style>