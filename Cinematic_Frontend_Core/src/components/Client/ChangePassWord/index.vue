<template>
   <div class="page-content" style="margin-bottom: 40%;">
      <div class="container">
         <div class="main-body">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-header bg-dark">
                        <h3 class="text-light">Đổi Mật Khẩu</h3>
                     </div>
                     <div class="card-body">
                        <div class="row mb-1 py-2 d-flex align-items-center">
                           <div class="col-sm-3">
                              <h6 class="mb-0 text-end fs-5">Mật khẩu cũ :</h6>
                           </div>
                           <div class="col-sm-9 text-secondary"><input type="password" class="form-control"
                                 placeholder="Nhập mật khẩu cũ" v-model="changePW.old_pass"></div>
                        </div>
                        <div class="row mb-1 py-2 d-flex align-items-center">
                           <div class="col-sm-3">
                              <h6 class="mb-0 text-end fs-5">Mật khẩu mới :</h6>
                           </div>
                           <div class="col-sm-9 text-secondary"><input type="text" class="form-control"
                                 placeholder="Nhập mật khẩu mới" v-model="changePW.new_pass"></div>
                        </div>
                        <div class="row mb-1 py-2 d-flex align-items-center">
                           <div class="col-sm-3">
                              <h6 class="mb-0 text-end fs-5">Nhập lại mật khẩu mới :</h6>
                           </div>
                           <div class="col-sm-9 text-secondary"><input type="text" class="form-control"
                                 placeholder="Nhập lại mật khẩu mới" v-model="changePW.new_pass_retype"></div>
                        </div>
                        <div class="row mb-1 py-2 d-flex align-items-center">
                           <div class="col-sm-12 text-secondary text-end">
                              <div class="btn btn-danger" v-on:click="ChangPassWord()">Đổi mật khẩu</div>
                           </div>
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
import { nextTick } from 'vue';
const toaster = createToaster({ position: "top-right" });
export default {
   data() {
      return {
         changePW: {},
      }
   },
   mounted() {
      this.beforeRouteUpdate();
   }
   ,
   methods: {
      ChangPassWord() {
         console.log(this.changePW);
         axios
            .post('http://127.0.0.1:8000/api/admin/client/change-pass-user', this.changePW, {
               headers: {
                  Authorization: 'Bearer ' + localStorage.getItem("tokenClient")
               }
            })
            .then((res) => {
               if (res.data.status === true) {
                  toaster.success('Thông báo<br>' + res.data.message);
                  this.changePW = {};
               } else {
                  toaster.error('Thông báo<br>' + res.data.message);
               }
            })
      },
      beforeRouteUpdate(to, from, next) {
         window.scrollTo(0, 0);
      },
   }
}
</script>
<style></style>