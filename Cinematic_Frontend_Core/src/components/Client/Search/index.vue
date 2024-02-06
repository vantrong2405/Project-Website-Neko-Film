<template>
    <div class="product-section section mt-5 mb-1"
        style="background-color: #06080f ; border-radius: 10px; padding-top: 30px;">
        <div class="container mb-4" style="background-color: #06080f">
            <div class="row">
                <div class="col-7">
                    <div class="input-group mb-4">
                        <input style="border: 30%;" type="text" class="form-control" placeholder="Nhập tên phim cần tìm"
                            aria-label="Username" aria-describedby="basic-addon1" v-model="text_search" v-on:input="search()">
                    </div>
                </div>
                <div class="col-5">
                    <button style="width: 100%; background-color: #ff708a;" class="search-toggle btnsearch btn align-end" v-on:click="search()"><i
                            class="fa-solid fa-magnifying-glass ms-1" ></i><b>Tìm Kiếm</b></button>
                </div>
            </div>
            <div class="row mbn-40">
                <template v-for="(v, k) in movies">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-40">
                        <router-link :to="`/detail/${v.id}`">
                            <div class="">
                                <div class="product-item">
                                    <div class="product-inner">
                                        <div class="image"><img style="width:270px;height:320px;" :src="v.url" alt="">
                                            <div class="image-overlay">
                                                <div class="action-buttons"></div>
                                            </div>
                                        </div>
                                        <div class="content" style="height:180px;">
                                            <div class="content-inner d-flex flex-column w-100">
                                                <h4
                                                    class="title text-center align-items-center d-flex flex-column text-center justify-content-center">
                                                    <div href="single-product.html" style="transform:translateY(-10px);"
                                                        class="text-center m-auto hidden-one-text">{{ v.original_name }} </div>
                                                </h4>
                                                <div class="ratting ms-1 fs-6 text-center" style="transform:translateY(-15px);"><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star-half-o text-danger"></i><i
                                                        class="fa fa-star-o text-danger"></i></div>
                                                <h5 class="size mt-3">Quốc Gia: {{ v.country_name }} </h5>
                                                <h5 class="color"> Thể loại: <b class="ms-1"> {{ v.list_type }}</b></h5>
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
import axios from 'axios'
export default {
    data() {
        return {
            originalMovies: [],
            movies: [],
            text_search: '',
        }
    },
    mounted() {
        this.beforeRouteUpdate();
        this.getMovie();
    },
    methods: {
        async getMovie() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/movie/get-data')
                .then((res) => {
                    this.originalMovies = res.data.data;
                    this.movies = [...this.originalMovies];
                });
        },
        search() {
            const filteredMovies = this.originalMovies.filter((v) => {
                return v.original_name.toLowerCase().includes(this.text_search.toLowerCase());
            });
            console.log(filteredMovies);
            this.movies = filteredMovies;
        },
        beforeRouteUpdate(to, from, next) {
         window.scrollTo(0, 0);
      },
        watch: {
            text_search: function (newValue, oldValue) {
                // Gọi hàm search khi text_search thay đổi
                this.search();
            }
        },
    }
}
</script>
<style></style>