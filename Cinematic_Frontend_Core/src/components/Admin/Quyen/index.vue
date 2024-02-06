<template>
    <div class="modal fade" id="Xoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">

                        Bạn Có Muốn Xóa <!-- {{ delete_quyen.ten_quyen }} --> Này Không!!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="capnhat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="text-secondary">Tên Quyền</label>
                    <input class="form-control" type="text" placeholder="Nhập Vào Tên Quyền" name="" id="">
                    <label class="text-secondary">Mô Tả Quyền</label>
                    <textarea class="form-control" placeholder="Nhập Vào Mô Tả Quyền" type="text" cols="30"
                        rows="7"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ThemMoi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">Thêm Mới Quyền</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="text-secondary">Tên Quyền</label>
                    <input class="form-control" type="text" placeholder="Nhập Vào Tên Quyền" name="" id="">
                    <label class="text-secondary">Mô Tả Quyền</label>
                    <textarea class="form-control" placeholder="Nhập Vào Mô Tả Quyền" type="text" cols="30"
                        rows="7"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="align-middle mt-2 ">
                                <h4 class="text-secondary">
                                    Danh Sách Quyền
                                </h4>
                            </div> <button type="button text-end" data-bs-toggle="modal" data-bs-target="#ThemMoi"
                                class="btn btn-outline-primary">Thêm mới
                                quyền</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th class="text-center align-middle text-nowrap">
                                    STT
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Tên Quyền
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Mô Tả
                                </th>
                                <th class="text-center align-middle text-nowrap">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_quyen">
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ k + 1 }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ v.ten_quyen }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ v.mo_ta }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <i data-bs-toggle="modal" data-bs-target="#capnhat"
                                            class=" me-2 fa-2x text-info fa-solid fa-pen-to-square"></i>
                                        <i data-bs-toggle="modal" data-bs-target="#Xoa"
                                            class="fa-2x text-danger fa-solid fa-trash"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">
                        Thêm Mới
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-secondary">
                    Phân Quyền
                </div>
                <div class="card-body">
                    <div class="row">
                        <template v-for="(v, k ) in list_chuc_nang">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label text-secondary">
                                        {{ v.ten_chuc_nang }}
                                    </label>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary" style="width: 95%">Cập Nhập Phân
                            Quyền</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            list_quyen: [
                {
                    'ten_quyen': 'Admin',
                    'mo_ta': 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt, deleniti, necessitatibusacere vitae cum soluta et dolorum aliquid tempore, mollitia modi consequuntur repellatnesciunt officiis voluptates autem? Repellat, aliquam ipsum.',
                }
            ],
            create_quyen: {},
            delete_quyen: {},
            update_quyen: {},
            list_chuc_nang: [
                {
                    'ten_chuc_nang': 'dọn rác',
                },
                {
                    'ten_chuc_nang': 'hứt cốt',
                },
                {
                    'ten_chuc_nang': 'quét nhà',
                },
                {
                    'ten_chuc_nang': 'lau nhà',
                },
                {
                    'ten_chuc_nang': 'quản lí rạp phim',
                },
            ]

        }
    },
    mounted() {

    },
    methods: {

    },
}
</script>
<style></style>