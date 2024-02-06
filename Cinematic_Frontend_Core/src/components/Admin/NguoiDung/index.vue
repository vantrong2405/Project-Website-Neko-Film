<template>
    <div class="row mt-4">

        <div class="card mt-3">
            <div class="card-body">
                <div class="card">
                    <h3 class="card-header fw-bold text-start" style="background-color: #AB826B; color:white;">Quản Lý Người
                        Dùng</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center align-middle text-nowrap"
                                            style="background-color: #AB826B; color:white;">STT</th>
                                        <th class="text-center align-middle text-nowrap"
                                            style="background-color: #AB826B; color:white;">Tên Khách</th>
                                        <th class="text-center align-middle text-nowrap"
                                            style="background-color: #AB826B; color:white;">Email</th>
                                        <th class="text-center align-middle text-nowrap"
                                            style="background-color: #AB826B; color:white;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(v, k) in list_khach_hang">
                                        <tr>
                                            <td class="text-center align-middle text-nowrap">{{ k + 1 }}</td>
                                            <td class="text-center align-middle text-nowrap">{{ v.name }}</td>
                                            <td class="text-center align-middle text-nowrap">{{ v.email }}</td>
                                            <td class="text-center text-nowrap align-middle">
                                                <i data-bs-toggle="modal" data-bs-target="#xoaKhachHang"
                                                    class="fa-2x text-danger fa-solid fa-trash" style="cursor: pointer;"
                                                    v-on:click="Object.assign(delete_khach_hang, v)"></i>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                            <div class="modal fade" id="xoaKhachHang" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">
                                                <p>Xóa Khách
                                                    Hàng</p>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-secondary">
                                            <div class="alert alert-danger" role="alert">
                                                Bạn Có Muốn Xóa <b> {{ delete_khach_hang.name }} </b> Này
                                                Không!!!
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-danger"
                                                v-on:click="deleteClient();">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>
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
            list_khach_hang: [],
            create_khach_hang: {},
            delete_khach_hang: {},
            update_khach_hang: {},
        }
    },
    mounted() {
        this.loadDataClient();
    },
    methods: {
        loadDataClient() {
            axios
                .post('http://127.0.0.1:8000/api/admin/client/get-data')
                .then((res) => {
                    this.list_khach_hang = res.data.data;
                });
        },

        deleteClient() {
            axios
                .post('http://127.0.0.1:8000/api/admin/client/delete', this.delete_khach_hang)
                .then((res) => {
                    if (res.data.status == true) {
                        toaster.success('SUCCESS<br>' + res.data.message);
                        this.loadDataClient();
                        MasterRocker.methods.hideModal('xoaKhachHang');
                    }
                    else {
                        toaster.error('ERROR<br>' + res.data.message);
                    }
                });
        },
    },
}
</script>
<style></style>