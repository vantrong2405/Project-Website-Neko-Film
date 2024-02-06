<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-header" style="background-color: #AB826B; color:white;">
                    <h3 class="text-light text-start fw-bold mb-0">Thêm Mới Thể Loại</h3>
                </div>
                <div class="card-body">
                    <label class="form-label text-dark">Tên Thể Loại</label>
                    <input type="text" class="form-control" placeholder="Nhập tên thể loại" v-model="create_type.name">
                    <label class="form-label text-dark mt-3">Mô Tả</label>
                    <input type="text" class="form-control" placeholder="Nhập slug thể loại"
                        v-model="create_type.description">
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" @:click="createType()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-header" style="background-color: #AB826B; color:white;">
                    <h3 class="text-light text-start fw-bold mb-0">Danh Sách Thể Loại</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    #
                                </th>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    Tên Thể Loại
                                </th>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    Mô Tả
                                </th>
                                <th class="text-center align-middle" style="background-color: #AB826B; color:white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(v, k) in list_type">
                                <th class="text-center align-middle">
                                    {{ k + 1 }}
                                </th>
                                <td class="align-middle text-nowrap">
                                    {{ v.name }}
                                </td>
                                <td class="align-middle">
                                    {{ v.description }}
                                </td>
                                <td class="text-center align-middle">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i data-bs-toggle="modal" v-on:click="Object.assign(update_type, v)"
                                            data-bs-target="#capNhatModal"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                        <i data-bs-toggle="modal" v-on:click="Object.assign(delete_type, v)"
                                            data-bs-target="#xoaModal" class="fa-2x text-danger fa-solid fa-trash"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Cập Nhật Thể Loại
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label text-dark">Tên Thể Loại </label>
                                            <input type="text" class="form-control" v-model="update_type.name">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label text-dark mt-3">Mô Tả</label>
                                            <input type="text" class="form-control" v-model="update_type.description">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="updateType()" type="button" class="btn btn-primary">Cập
                                        Nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Xóa Danh Mục</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="text-dark">
                                                    <p>Bạn có muốn xóa thể loại <b>{{ delete_type.name }}</b> này không?
                                                    </p>
                                                    <p>
                                                        <b>Lưu ý:</b> Điều này không thể hoàn tác!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" v-on:click="deleteType()">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
            list_type: [],
            create_type: {},
            delete_type: {},
            update_type: {
            },
        }
    },
    mounted() {
        this.loadDataType();
    },
    methods: {
        loadDataType() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/get-data')
                .then((res) => {
                    this.list_type = res.data.data;
                });
        },

        createType() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/create', this.create_type)
                .then((res) => {
                    if (res.data.status === true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.create_type = {};
                        this.loadDataType();
                    } else {
                        toaster.error('Thông báo<br>' + res.data.message);
                    }
                });
        },

        deleteType() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/delete', this.delete_type)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        this.loadDataType();
                        MasterRocker.methods.hideModal('xoaModal')
                    }
                    else {
                        toaster.error('ERROR<br>' + res.data.message);
                    }
                });
        },

        updateType() {
            axios
                .post('http://127.0.0.1:8000/api/admin/type/update', this.update_type)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataType();
                        MasterRocker.methods.hideModal('capNhatModal')
                    } else {
                        toaster.error('Thông báo<br>' + res.data.message);
                    }
                });
        },

    },
}
</script>
<style></style>