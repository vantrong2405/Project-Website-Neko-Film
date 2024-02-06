<template>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-4 md-6">
                        <label class="text-nowrap">
                            <h4 class="text-secondary">
                                Thêm Mới Chức Năng
                            </h4>
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <label class="text-secondary">Tên Chức Năng</label>
                    <input type="text" placeholder="Ghi Tên Chức Năng Vào Đây" class="form-control">
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">
                        Thêm Mới
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th class="text-center align-middle">
                            STT
                        </th>
                        <th class="text-center align-middle">
                            Tên Chức Năng
                        </th>
                        <th class="text-center align-middle">
                            Thông Tin Chức Năng
                        </th>
                        <th class="text-center align-middle">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="(v, k) in list_chuc_nang">
                        <tr>
                            <td class="text-center align-middle">
                                {{ k + 1 }}
                            </td>
                            <td class="text-center align-middle">
                                {{ v.ten_chuc_nang }}
                            </td>
                            <td class="text-center align-middle">
                                <i data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="fa-solid fa-circle-info fa-2x text-info"></i>
                            </td>
                            <td class="text-center text-nowrap align-middle">
                                <i data-bs-toggle="modal" data-bs-target="#SuaThongTin"
                                    class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                <i data-bs-toggle="modal" data-bs-target="#XoaThongTin"
                                    class="fa-2x text-danger fa-solid fa-trash"></i>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <h4 class="text-secondary">
                                    Thông Tin Chức Năng
                                </h4>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ ten_chuc_nang }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="SuaThongTin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background-color: white;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <h4 class="text-secondary">
                                    Thông Tin Chức Năng
                                </h4>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ ten_chuc_nang }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="XoaThongTin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background-color: white">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <h4 class="text-secondary">
                                    Xóa Chức Năng
                                </h4>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                <div class="text-white">Bạn Có Muốn Xóa <!-- {{ delete_chuc_nang.ten_chuc_nang }} --> Này
                                    Không!!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_chuc_nang: [
                {
                    'ten_chuc_nang': '',
                }
            ],
            delete_chuc_nang: {},
            update_chuc_nang: {},
            create_chuc_nang: {},
        }
    },
    mounted() {

    },
    methods: {

    }
}
</script>
<style></style>