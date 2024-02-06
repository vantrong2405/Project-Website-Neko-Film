<template>
  <div class="container2" id="container1">

    <!-- s -->
    <div class="form-container1 sign-in2">
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
        <input v-model="login_user.password" type="password" placeholder="Mật Khẩu" v-on:keyup.enter="login()" />
        <a href="#">Quên Mật Khẩu?</a>
        <div class="btn btn-danger text-nowrap" style="width: 100%; font-size: 12px;
     padding: 13px 45px;
     border: 1px solid transparent;
     border-radius: 8px;
     font-weight: 600;
     letter-spacing: 0.5px;
     text-transform: uppercase;
     margin-top: 10px;
     cursor: pointer;" @:click="login()">Đăng nhập Nhân Viên</div>
      </form>
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



    // this.checkEmail();
    this.checkLogin();

  },

  data() {
    return {
      login_user: {},
    }
  },
  methods: {

    login() {
      axios
        .post('http://127.0.0.1:8000/api/admin/employee/login', this.login_user)
        .then((res) => {
          if (res.data.status === true) {
            toaster.success('Thông báo<br>' + res.data.message);
            var x = res.data.token.split("|");
            localStorage.setItem("tokenAdmin", x[1]);

            console.log(localStorage.getItem("tokenAdmin"));
            this.checkLogin();
          } else {
            toaster.error('Thông báo<br>' + res.data.message);
          }
        });
    },

    checkLogin() {
      axios
        .post('http://127.0.0.1:8000/api/admin/employee/check-token', {}, {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("tokenAdmin") //the token is a variable which holds the token
          }
        })
        .then((res) => {
          if (res.data.status === true) {
            localStorage.setItem("username", res.data.name)
            console.log(localStorage.getItem("username"));
            console.log(res.data.email);
            this.$router.push('/admin/movie');
          } else {
            // console.log(res.data.err);
            // console.log(res);
            // console.log("tokencuaban : " + localStorage.getItem("token"));
          }
        });

    },

    checkEmail() {
      const validator = require('validator');

      // Validation Function
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

      // Example Usage
      const email = "example@email.com";
      const password = "Password123";
      const name = "John Doe";

      const validationResults = validateInput(email, password, name);

      if (validationResults.isValidEmail) {
        console.log("Email is valid");
      } else {
        console.log("Invalid email");
      }

      if (validationResults.isValidPassword) {
        console.log("Password is valid");
      } else {
        console.log("Invalid password");
      }

      if (validationResults.isValidName) {
        console.log("Name is valid");
      } else {
        console.log("Invalid name");
      }
    }
  },
}
</script>
<style></style>