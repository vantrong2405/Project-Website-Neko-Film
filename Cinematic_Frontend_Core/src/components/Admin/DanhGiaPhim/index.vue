<template>
    <div class="row mt-4">
        <div class="card mt-3">
            <h2 class="text-start">
                <div class="mt-3">
                    <b class="text-start text-secondary">
                        Quản Lý Đánh Giá
                    </b>
                </div>
            </h2>
            <div class="card-body bg-white">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                </div>
                <div class="col-lg-12 md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center align-middle text-nowrap">
                                        STT
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Đánh Giá
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Phim
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Người Dùng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(v, k) in list_danh_gia">
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ k + 1 }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ v.danh_gia }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <img v-bind:src="v.anh_phim" style="width: 150px;">
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ v.nguoi_dung }}
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
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
            list_danh_gia: [
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Võ Quốc Triệu",
                },
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Đoàn Võ Văn Trọng",
                },
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Minh Tuấn",
                },
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Khánh Trần",
                },
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Quang Huy",
                },
                {
                    "danh_gia": "phim này rất hay rất ổn nên trải nghiệm...",
                    "anh_phim": "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/02/27/b1-xem-phim-ha-canh-noi-anh-tap-xem-ha-canh-noi-anh-thuyet-minh-vietsub.jpg",
                    "nguoi_dung": "Dz",
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