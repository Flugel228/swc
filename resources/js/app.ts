import './bootstrap';
import {createApp} from "vue";
import Register from "./views/user/Register.vue"

const app = createApp({})
app.component('Register', Register)

app.mount("#app")
