<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background-color: rgb(171, 130, 107); color: white;">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="align-middle text-secondary">
                                <h3 class="text-start">
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
                <div class="card-body" style="background-color: white;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    STT
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Ảnh Đại Diện
                                </th>
                             
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Tên Đạo Diễn
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Phim Đã Làm
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_tac_gia">
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        <img v-bind:src="v.url" alt="" width="100" height="100">
                                    </td>
                                    <td class=" align-middle">
                                        {{ v.name }}
                                    </td>
                                    <td class=" align-middle">
                                        {{ v.movies }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" data-bs-target="#SuaTacGia"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"
                                            v-on:click="Object.assign(update_tac_gia, v)"></i>
                                        <i data-bs-toggle="modal" data-bs-target="#XoaTacGia"
                                            class="fa-2x text-danger fa-solid fa-trash"
                                            v-on:click="Object.assign(delete_tac_gia, v); console.log(delete_tac_gia)"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                        <div class="modal fade" id="XoaTacGia" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Xóa Đạo Diễn</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                            <div class="text-white">Bạn Có Muốn Xóa Đạo Diễn
                                                <b class="text-capitalize"> {{ delete_tac_gia.name }} </b>
                                                Này Không!!!!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-danger"
                                            v-on:click="deleteAuthor()">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Thêm Đạo Diễn
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Tên Đạo Diễn</label>
                                        <input class="form-control" type="text" placeholder="Nhập Vào Tên Đạo Diễn"
                                            v-model="create_tac_gia.name">
                                        <label>Ảnh Đạo Diễn</label>
                                        <input @change="handleFileUploaded('image')" class="form-control" ref="image"
                                            type="file">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" v-on:click="createAuthor()">Thêm
                                            mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="SuaTacGia" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog bg-white">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Cập Nhật Đạo Diễn
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Tên Đạo Diễn</label>
                                        <input class="form-control" type="text" placeholder="Nhập Vào Tên Đạo Diễn"
                                            v-model="update_tac_gia.name">
                                        <label>Hình Ảnh</label>
                                        <input @change="handleFileUploaded('image_update')" class="form-control" type="file"
                                            ref="image_u" placeholder="Nhập Vào Ảnh Đạo Diễn">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                            v-on:click="updateAuthor()">Cập nhật</button>
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
            list_tac_gia: [],
            create_tac_gia: {},
            delete_tac_gia: {},
            update_tac_gia: {},
        }
    },
    mounted() {
        this.loadDataAuthor();
    },
    methods: {
        loadDataAuthor() {
            axios
                .post('http://127.0.0.1:8000/api/admin/author/get-data')
                .then((res) => {
                    this.list_tac_gia = res.data.data;
                    this.list_tac_gia.forEach((actor) => {
                        if (actor.url) {
                            actor.url = actor.url.replace("http://127.0.0.1:8000", "");
                        }
                    })
                });
        },

        async createAuthor() {
            if (this.create_tac_gia.file) {
                await this.upFile(this.create_tac_gia, this.create_tac_gia.name);
                console.log(1);
                axios
                    .post('http://127.0.0.1:8000/api/admin/author/create', this.create_tac_gia)
                    .then((res) => {
                        if (res.data.status == true) {
                            toaster.success('SUCCESS<br>' + res.data.message);
                            this.loadDataAuthor();
                            MasterRocker.methods.hideModal('addModal');
                        } else toaster.error('ERROR<br>' + res.data.message);
                    });
            } else toaster.error('ERROR<br>' + 'File chưa được nhập');
        },

        deleteAuthor() {
            axios
                .post('http://127.0.0.1:8000/api/admin/author/delete', this.delete_tac_gia)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataAuthor();
                        MasterRocker.methods.hideModal('XoaTacGia');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
        },

        async updateAuthor() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/author/update', this.update_tac_gia)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataAuthor();
                        MasterRocker.methods.hideModal('SuaTacGia');
                    } else toaster.error('ERROR<br>' + res.data.message);
                });
            if (this.update_tac_gia.file) await this.upFile(this.create_tac_gia, this.create_tac_gia.name);
        },

        async upFile(value, name) {
            var formData = new FormData();
            formData.append("name", name);
            formData.append("file", value.file);
            await axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/admin/up-file",
                data: formData,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }).then((res) => {
                if (res.data.status) value.filename = res.data.filename;
                else toaster.error('ERROR<br>' + res.data.message);
            });
        },

        handleFileUploaded(type) {
            if (type === 'image') this.create_tac_gia.file = this.$refs.image.files[0];
            else this.update_tac_gia.file = this.$refs.image.files[0];
        },
    },
}
</script>
<style></style>