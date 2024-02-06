<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-0">
                <div class="card-header" style="background-color: #AB826B; color:white;">
                    <h3 class="text-start text-secondary mb-0">
                            <b style="color:white">Thêm Diễn Viên </b>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-secondary">Tên Diễn Viên</label>
                            <input type="text" placeholder="Nhập Vào Tên Diễn Viên" class="form-control"
                                v-model="create_dien_vien.name">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="text-secondary">Hình Ảnh</label>
                            <input @change="handleFileUploaded('image')" type="file" ref="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" v-on:click="createActor()">
                        Thêm Mới
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-start" style="background-color: #AB826B; color:white;">
                    <h3 class="text-light fw-bold text-start mb-0">Danh Sách Diễn Viên </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-white">
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
                                    Tên Diễn Viên
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Phim Đã Đóng
                                </th>
                                <th class="text-center align-middle text-nowrap"
                                    style="background-color: #AB826B; color:white;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_dien_vien">
                                <tr>
                                    <td class="text-center align-middle text-nowrap">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        <img v-bind:src="v.url" alt="" width="100" height="100">
                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        <b>
                                            {{ v.name }}
                                        </b>
                                    </td>
                                    <td class="text-center align-middle ">
                                        <b>
                                            {{ v.list_phim }}
                                        </b>
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" data-bs-target="#SuaPhim"
                                            class=" me-2 fs-4 text-light fa-solid fa-pen-to-square btn btn-primary"
                                            v-on:click="Object.assign(update_dien_vien, v)"></i>
                                        <i data-bs-toggle="modal" data-bs-target="#XoaPhim"
                                            class="fs-4 text-light fa-solid fa-trash btn btn-danger"
                                            v-on:click="Object.assign(delete_dien_vien, v)"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="SuaPhim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog bg-white">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Thêm Ngôn Ngữ
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="text-secondary">Tên Diễn Viên</label>
                            <input type="text" placeholder="Nhập Vào Tên Diễn Viên" class="form-control"
                                v-model="update_dien_vien.name">
                            <label class="text-secondary">Hình Ảnh</label>
                            <input @change="handleFileUploaded('image_u')" ref="image_u" type="file" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" v-on:click="updateActor()">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="XoaPhim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog bg-white">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Xóa diễn viên
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center text-secondary">
                            <div class="alert alert-danger" role="alert">
                                Bạn Có Chắc Muốn Xóa <b>{{ delete_dien_vien.actor_name }}</b> Này Chứ
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteActor()">Xóa</button>
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
            list_dien_vien: [],
            create_dien_vien: {},
            delete_dien_vien: {},
            update_dien_vien: {
            },
        }
    },
    mounted() {
        this.loadDataActor();
    },
    methods: {
        loadDataActor() {
            axios
                .post('http://127.0.0.1:8000/api/admin/actor/get-data')
                .then((res) => {
                    this.list_dien_vien = res.data.data;
                    this.list_dien_vien.forEach((actor) => {
                        if (actor.url) {
                            actor.url = actor.url.replace("http://127.0.0.1:8000", "");
                        }
                    })
                    console.log("data khi sửa");
                    console.log(res.data.data);
                });
        },

        async createActor() {
            if (this.create_dien_vien.file) {
                await this.upFile(this.create_dien_vien, this.create_dien_vien.name);
                axios
                    .post('http://127.0.0.1:8000/api/admin/actor/create', this.create_dien_vien)
                    .then((res) => {
                        if (res.data.status === true) {
                            toaster.success('Thông báo<br>' + res.data.message);
                            this.loadDataActor();
                        } else {
                            toaster.error('Thông báo<br>' + res.data.message);
                        }
                    });
            } else toaster.error('Thông báo<br>' + 'File chưa được nhập');

        },


        deleteActor() {
            axios
                .post('http://127.0.0.1:8000/api/admin/actor/delete', this.delete_dien_vien)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataActor();
                        MasterRocker.methods.hideModal('XoaPhim')
                    }
                    else {
                        toaster.error('Thông báo<br>' + res.data.message);
                    }
                });
        },

        async updateActor() {
            await axios
                .post('http://127.0.0.1:8000/api/admin/actor/update', this.update_dien_vien)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.loadDataActor();
                        MasterRocker.methods.hideModal('SuaPhim');
                    } else {
                        toaster.error('Thông báo<br>' + res.data.message);
                    }
                });
            if (this.update_dien_vien.file) await this.upFile(this.update_dien_vien, this.update_dien_vien.name)
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
            if (type === 'image') this.create_dien_vien.file = this.$refs.image.files[0];
            else this.update_dien_vien.file = this.$refs.image_u.files[0];
        },
    },
}
</script>
<style></style>