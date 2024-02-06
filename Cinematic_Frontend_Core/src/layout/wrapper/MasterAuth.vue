<template>
  <div class="body1">
      <router-view></router-view>
  </div>
</template>
<script>
import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
 
   
}
</script>
<style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap");
@import "../../assets/assets_auth/styles/Login.css";
</style>