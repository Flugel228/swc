import './bootstrap';
import {createApp} from "vue";
import Register from "./views/user/Register.vue";
import Login from "./views/user/Login.vue";

const app = createApp({});

app.component('Register', Register);
app.component('Login', Login)

app.mount("#app")
