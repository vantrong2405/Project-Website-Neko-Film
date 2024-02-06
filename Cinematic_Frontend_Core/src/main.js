import {
    createApp
} from 'vue'
import axios from 'axios'
import App from './App.vue'
import router from './router'
import Default from './Layout/Wrapper/MasterRocker.vue'
import Blank from './Layout/Wrapper/MasterNewRocker.vue'
import Client from './layout/wrapper/MasterClient.vue'
import Auth from './Layout/Wrapper/MasterAuth.vue'

import Toaster from "@meforma/vue-toaster";
const app = createApp(App)

app.use(router, axios, Toaster)
app.component("default-layout", Default);
app.component("client-layout", Client);
app.component("new-layout", Blank);
app.component("auth-layout", Auth);
app.mount("#app")