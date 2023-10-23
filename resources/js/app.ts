import './bootstrap';
import {createApp} from "vue";
import App from "@/App.vue"
import router from "@/router";

// import the package
import VueAwesomePaginate from "vue-awesome-paginate";

// import the necessary css file
import "vue-awesome-paginate/dist/style.css";

const app = createApp(App);

app.use(router);
app.use(VueAwesomePaginate);

app.mount("#app")
