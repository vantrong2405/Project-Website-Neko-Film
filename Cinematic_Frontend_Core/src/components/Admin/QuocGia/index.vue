<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header" style="background-color: rgb(171, 130, 107); color: white;">
                    <h3 class="text-light fw-bold text-start mb-0">
                        Thêm Quốc Gia
                    </h3>
                </div>
                <div class="card-body">
                    <label class="text-secondary">Tên Quốc Gia</label>
                    <input v-model="create_quoc_gia.name" type="text" placeholder="Nhập Vào Tên Quốc Gia"
                        class="form-control">
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="createQuocGia()" class="btn btn-primary">
                        Thêm Mới Quốc Gia
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header" style="background-color: rgb(171, 130, 107); color: white;">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="align-middle text-secondary">
                                <h3 class="text-start mb-0">
                                    <div class="">
                                        <b class="text-start text-light">
                                            Quản Lý Đạo Diễn
                                        </b>

                                    </div>
                                </h3>
                            </div> <button type="button text-end" data-bs-toggle="modal" data-bs-target="#addModal"
                                class="btn btn-outline-light">Thêm Đạo Diễn</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: rgb(171, 130, 107); color: white;">
                                    STT
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: rgb(171, 130, 107); color: white;">
                                    Tên Quốc Gia
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: rgb(171, 130, 107); color: white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_quoc_gia">
                                <tr>
                                    <td class="text-center align-middle text-nowrap">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        {{ v.name }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" v-on:click="update_quoc_gia = v" data-bs-target="#capnhat"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                        <i data-bs-toggle="modal" v-on:click="delete_quoc_gia = v" data-bs-target="#Xoa"
                                            class="fa-2x text-danger fa-solid fa-trash"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="capnhat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-secondary">
                            <h1 class="modal-title fs-5 text-secondary " id="exampleModalLabel">Sửa Quốc Gia</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="text-secondary">Tên Quốc Gia</label>
                            <input v-model="update_quoc_gia.name" type="text" placeholder="Nhập Vào Tên Quốc Gia Cần Sửa"
                                class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" v-on:click="updatedQuocGia()" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Xoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-secondary">
                            <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Xóa Quốc Gia Này</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="alert alert-danger" role="alert">
                                Bạn Có Chắc Muốn Xóa <b>{{ delete_quoc_gia.name }}</b> Này
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button v-on:click="deleteQuocGia()" type="button" class="btn btn-danger">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import MasterRocker from "../../../layout/wrapper/MasterRocker.vue";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });


export default {
    data() {
        return {
            list_quoc_gia: [],
            create_quoc_gia: {},
            delete_quoc_gia: {},
            update_quoc_gia: {},
        }
    },
    mounted() {
        this.loadDataQuocGia();
    },
    methods: {
        createQuocGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/country/create', this.create_quoc_gia)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataQuocGia();
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        loadDataQuocGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/country/get-data')
                .then((res) => {
                    this.list_quoc_gia = res.data.data;
                });
        },

        deleteQuocGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/country/delete', this.delete_quoc_gia)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataQuocGia();
                        MasterRocker.methods.hideModal('Xoa');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        updatedQuocGia() {
            axios
                .post('http://127.0.0.1:8000/api/admin/country/update', this.update_quoc_gia)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataQuocGia();
                        MasterRocker.methods.hideModal('capnhat');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },



    },

}
</script>
<style></style> 