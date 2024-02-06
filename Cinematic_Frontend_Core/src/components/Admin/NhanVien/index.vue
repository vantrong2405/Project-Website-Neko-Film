<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <h4 class="text-secondary">
                                    Thêm Mới Nhân Viên
                                </h4>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <label class="text-secondary">Tên Nhân Viên</label>
                            <input v-model="create_nhan_vien.name" class="form-control" type="text"
                                placeholder="Nhập Vào Tên Nhân Viên">
                            <label class="text-secondary">Email</label>
                            <input v-model="create_nhan_vien.email" class="form-control" type="mail"
                                placeholder="Nhập Email">
                            <label class="text-secondary">Mật Khẩu</label>
                            <input v-model="create_nhan_vien.password" class="form-control" type="password"
                                placeholder="Nhập Vào Mật Khẩu">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" v-on:click="createNhanVien()" class="btn btn-primary">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: rgb(171, 130, 107); color: white;">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-start">
                                <div class="">
                                    <b class="text-start text-light">
                                        Quản Lý Nhân Viên
                                    </b>

                                </div>
                            </h3><button type="button text-end" v-on:click="" data-bs-toggle="modal"
                                data-bs-target="#addModal" class="btn btn-outline-light">Thêm Mới Nhân Viên</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-white">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center align-middle" style="background-color: rgb(171, 130, 107); color: white;">
                                    STT
                                </th>
                                <th class="text-center align-middle" style="background-color: rgb(171, 130, 107); color: white;">
                                    Tên Nhân Viên
                                </th>
                                <th class="text-center align-middle" style="background-color: rgb(171, 130, 107); color: white;">
                                    Email
                                </th>
                                <th class="text-center align-middle" style="background-color: rgb(171, 130, 107); color: white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_nhan_vien">
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ v.name }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ v.email }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" v-on:click="update_nhan_vien = v"
                                            data-bs-target="#SuaNhanVien"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                        <i data-bs-toggle="modal" v-on:click="delete_nhan_vien = v"
                                            data-bs-target="#XoaNhanVien" class="fa-2x text-danger fa-solid fa-trash"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                        <div class="modal fade" id="SuaNhanVien" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Cập Nhật Nhân
                                            Viên</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="text-secondary">Tên Nhân Viên</label>
                                        <input v-model="update_nhan_vien.name" class="form-control" type="text"
                                            placeholder="Nhập Vào Tên Nhân Viên">
                                        <label class="text-secondary">Email</label>
                                        <input v-model="update_nhan_vien.email" class="form-control" type="mail"
                                            placeholder="Nhập Email">
                                        <label class="text-secondary">Mật Khẩu</label>
                                        <input v-model="update_nhan_vien.password" class="form-control" type="password"
                                            placeholder="Nhập Vào Mật Khẩu">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="updatedNhanVien()" type="button" class="btn btn-primary">Cập
                                            Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="XoaNhanVien" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Xóa Nhân Viên
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">Bạn có muốn xóa
                                                <b>
                                                    {{ delete_nhan_vien.name }}
                                                </b>
                                                Này Không!!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="deleteNhanVien()" type="button"
                                            class="btn btn-danger">Xóa</button>
                                    </div>
                                </div>
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
            list_nhan_vien: [],
            delete_nhan_vien: {},
            create_nhan_vien: {},
            update_nhan_vien: {},
        }
    },
    mounted() {
        this.loadDataNhanVien();
    },
    methods: {
        createNhanVien() {
            axios
                .post('http://127.0.0.1:8000/api/admin/employee/create', this.create_nhan_vien)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataNhanVien();
                        MasterRocker.methods.hideModal('addModal');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        loadDataNhanVien() {
            axios
                .post('http://127.0.0.1:8000/api/admin/employee/get-data')
                .then((res) => {
                    this.list_nhan_vien = res.data.data;
                });
        },

        deleteNhanVien() {
            axios
                .post('http://127.0.0.1:8000/api/admin/employee/delete', this.delete_nhan_vien)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataNhanVien();
                        MasterRocker.methods.hideModal('XoaNhanVien');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        updatedNhanVien() {
            axios
                .post('http://127.0.0.1:8000/api/admin/employee/update', this.update_nhan_vien)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataNhanVien();
                        MasterRocker.methods.hideModal('SuaNhanVien');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },



    },
}
</script>
<style></style>