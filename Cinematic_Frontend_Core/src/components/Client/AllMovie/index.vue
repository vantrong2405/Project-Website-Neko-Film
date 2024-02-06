<template>
    <div class="product-section section mt-5 mb-1"
        style="background-color: #06080f ; border-radius: 10px; padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h4 class=" text-light"><b>Thể Loại:</b></h4>
                    <div class="product-short ">
                        <select class="nice-select ">
                            <template v-for="(v, k) in types">
                                <option>
                                    <p>{{ v.name }}</p>
                                </option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="col-3 ">
                    <h4 class=" text-light"><b>Quốc Gia:</b></h4>
                    <div class="product-short ">
                        <select class="nice-select">
                            <template v-for="(v, k) in country">
                                <option>
                                    <p>{{ v.name }}</p>
                                </option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="col-3 ">
                    <h4 class=" text-light"><b>Diễn Viên:</b></h4>
                    <div class="product-short ">
                        <select class="nice-select">
                            <template v-for="(v, k) in actor">
                                <option value=""> {{ v.name }}</option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="col-2 ">
                    <h4></h4>
                    <button style="width: 150px; background-color: #ff708a;"
                        class="search-toggle mt-4 btnsearch btn align-end"><i
                            class="fa-solid fa-magnifying-glass ms-1"></i><b>Tìm Kiếm</b></button>

                </div>

                <div class="row mbn-40">
                    <template v-for="(v, k) in movies">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">
                            <div class="">
                                <div class="product-item">
                                    <div class="product-inner">
                                        <div class="image"><img src="http://127.0.0.1:8000/images/adds.jpg" alt=""
                                                style="width: 270px; height: 320px;">
                                            <div class="image-overlay">
                                                <div class="action-buttons"></div>
                                            </div>
                                        </div>
                                        <div class="content" style="height: 180px;">
                                            <div class="content-inner d-flex flex-column w-100">
                                                <h4
                                                    class="title text-center align-items-center d-flex flex-column text-center justify-content-center">
                                                    <div href="single-product.html" class="text-center m-auto"
                                                        style="transform: translateY(-10px);">{{ v.original_name }}</div>
                                                </h4>
                                                <div class="ratting ms-1 fs-6 text-center mt-2"
                                                    style="transform:translateY(-15px);"><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star text-danger"></i><i
                                                        class="fa fa-star-o text-danger"></i></div>
                                                <h5 class="size mt-3">Quốc Gia: {{ v.country_name }}</h5>
                                                <h5 class="color"> Thể loại: <b class="ms-1">{{ v.list_type }}</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            movies: [],
            types: [],
            id_types: '',
            country: [],
            actor: [],
        }
    },
    mounted() {
        this.getIDtype()
        this.getTypes()
        this.getCountry()
        this.getActor()
    },
    methods: {
        getIDtype() {
            const id_type = this.$route.params.id;
            const payload = {
                id_type: id_type
            }
            axios
                .post('http://127.0.0.1:8000/api/admin/type/get-type', payload)
                .then((res) => {
                    this.movies = res.data.data;
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function (k, v) {
                        toastr.error(v[0], 'Error');
                    });
                });
        },
        getTypes() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/get-data')
                .then((res) => {
                    this.types = res.data.data;
                    console.log(this.types)
                })
                .catch((res) => {

                });
        },
        getCountry() {
            axios
                .post('http://127.0.0.1:8000/api/admin/country/get-data')
                .then((res) => {
                    this.country = res.data.data;
                    console.log(this.country)
                })
                .catch((res) => {

                });
        },
        getActor() {
            axios
                .post('http://127.0.0.1:8000/api/admin/actor/get-data')
                .then((res) => {
                    this.actor = res.data;
                    console.log(this.actor)
                })
                .catch((res) => {

                });
        },

    }
}
</script>
<style></style>