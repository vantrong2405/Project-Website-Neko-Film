<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background-color: #AB826B; color:white;">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-start">
                                <div class="">
                                    <b class="text-start text-light">
                                        Quản Lý Ngôn Ngữ
                                    </b>
                                </div>
                            </h3><button type="button text-end" data-bs-toggle="modal" data-bs-target="#addngonNgu"
                                class="btn btn-outline-light">Thêm Mới Ngôn Ngữ</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: white;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    STT
                                </th>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    Ngôn Ngữ
                                </th>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_ngon_ngu">
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ v.name }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" v-on:click="update_ngon_ngu = v"
                                            data-bs-target="#SuaTacGia"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                        <i data-bs-toggle="modal" v-on:click="delete_ngon_ngu = v"
                                            data-bs-target="#XoaTacGia" class="fa-2x text-danger fa-solid fa-trash"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                        <div class="modal fade" id="XoaTacGia" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Xóa Ngôn Ngữ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">Bạn có Muốn Xóa
                                                {{ delete_ngon_ngu.ten_ngon_ngu }} Này Không!!!!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="deleteNgonNgu()" type="button"
                                            class="btn btn-warning">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="SuaTacGia" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Cập Nhật Ngôn Ngữ
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Tên Ngôn Ngữ</label>
                                        <input v-model="update_ngon_ngu.name" class="form-control" type="text"
                                            placeholder="Nhập Vào Ngôn Ngữ">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="updatedNgonNgu()" type="button" class="btn btn-primary">Chấp
                                            Nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="addngonNgu" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Thêm Ngôn Ngữ
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Tên Ngôn Ngữ</label>
                                        <input v-model="create_ngon_ngu.name" class="form-control" type="text"
                                            placeholder="Nhập Vào Ngôn Ngữ">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="createNgonNgu()" type="button" class="btn btn-primary">Thêm
                                            Mới</button>
                                    </div>
                                </div>
                                <!-- m,m -->
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";
import MasterRocker from "../../../layout/wrapper/MasterRocker.vue";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_ngon_ngu: [],
            create_ngon_ngu: {},
            delete_ngon_ngu: {},
            update_ngon_ngu: {},
        }
    },
    mounted() {
        this.loadDataNgonNgu();
    },
    methods: {
        createNgonNgu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/language/create', this.create_ngon_ngu)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        MasterRocker.methods.hideModal('addngonNgu');
                        this.loadDataNgonNgu();
                    }
                    else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        loadDataNgonNgu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/language/get-data')
                .then((res) => {
                    this.list_ngon_ngu = res.data.data;
                });
        },

        deleteNgonNgu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/language/delete', this.delete_ngon_ngu)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        MasterRocker.methods.hideModal('XoaTacGia');
                        this.loadDataNgonNgu();
                    }
                    else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        updatedNgonNgu() {
            axios
                .post('http://127.0.0.1:8000/api/admin/language/update', this.update_ngon_ngu)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        MasterRocker.methods.hideModal('SuaTacGia');
                        this.loadDataNgonNgu();
                    }
                    else toaster.error('ERROR<br>' + res.data.message);
                });
        },



    },
}
</script>
<style></style>