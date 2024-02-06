<template>
  <div class="container1" id="container1">
    <div class="form-container1 sign-up">
      <form>
        <img src="../../../assets/assets_auth/images/2.png" alt="" style="width: 60%;" />
        <h1 class="text-auth"><b>Tạo Tài Khoản</b></h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <input v-model="create_user.name" type="text" placeholder="Họ Và Tên" />
        <input v-model="create_user.email" type="email" placeholder="Email" />
        <input v-model="create_user.password" type="password" placeholder="Mật Khẩu"/>
        <div class="btn btn-danger text-nowrap" style="width: 60%; font-size: 12px;
    padding: 13px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;" @:click="register()">Đăng Ký</div>
      </form>
    </div>
    <!-- s -->
    <div class="form-container1 sign-in">
      <form>
        <img src="../../../assets/assets_auth/images/2.png" alt="" style="width: 60%;  margin-top: 0px;" />
        <h1 class="text-auth"><b>Đăng Nhập</b></h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <input v-model="login_user.email" type="email" placeholder="Email" />
        <input v-model="login_user.password" type="password" placeholder="Mật Khẩu" />
        <a href="#">Quên Mật Khẩu?</a>
        <div class="btn btn-danger text-nowrap" style="width: 60%; font-size: 12px;
    padding: 13px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;" @:click="login()">Đăng nhập</div>
      </form>
    </div>
    <div class=" toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1 class="text-white">Chào Mừng Trở Lại!</h1>
          <p>
            Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của
            trang web
          </p>
          <button class="" id="login" style="  background-color: #ca4153;
            color: #fff;">Đăng Nhập</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1 class="text-white">Xin Chào !</h1>
          <p>
            Đăng ký với thông tin cá nhân của bạn để sử dụng tất cả các tính
            năng của trang web
          </p>
          <button class="" id="register" style="  background-color: #ca4153;
            color: #fff;">Đăng Ký</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
  mounted() {
    const container = document.getElementById('container1');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');
    console.log(container);
    registerBtn.addEventListener('click', () => {
      container.classList.add("active");
    });
    loginBtn.addEventListener('click', () => {
      container.classList.remove("active");
    });
    this.checkLogin();
  },

  data() {
    return {
      create_user: {},
      login_user: {},
    }
  },
  methods: {
    register() {
      axios
        .post('http://127.0.0.1:8000/api/admin/client/create', this.create_user)
        .then((res) => {
          if (res.data.status === true) {
            toaster.success('Thông báo<br>' + res.data.message);
            this.create_user = {};
          } else {
            toaster.error('Thông báo<br>' + res.data.message);
          }
        });
    },
    login() {
      axios
        .post('http://127.0.0.1:8000/api/admin/client/login', this.login_user)
        .then((res) => {
          if (res.data.status === true) {
            toaster.success('Thông báo<br>' + res.data.message);
            var x = res.data.token.split("|");
            localStorage.setItem("tokenClient", x[1]);
            console.log(localStorage.getItem("tokenClient"));
            this.checkLogin();
          } else {
            toaster.error('Thông báo<br>' + res.data.message);
          }
        });
    },

    checkLogin() {
      axios
        .post('http://127.0.0.1:8000/api/admin/client/check-token', {}, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("tokenClient")
          }
        })
        .then((res) => {
          if (res.data.status === true) {
            localStorage.setItem('id_user_client', res.data.user.id);
            localStorage.setItem('username_client', res.data.user.name);
            this.$router.push('/');
          } else {
          }
        });
    },

    checkEmail() {
      const validator = require('validator');
      function validateInput(email, password, name) {
        const isValidEmail = validator.isEmail(email);
        const isValidPassword = validator.isStrongPassword(password, { minLength: 8, minLowercase: 1, minUppercase: 1, minNumbers: 1 });
        const isValidName = validator.isAlpha(name.replace(/\s/g, '')) && validator.isLength(name, { min: 2, max: 30 });
        return {
          isValidEmail,
          isValidPassword,
          isValidName,
        };
      }
    }
  },
}
</script>
<style></style>