import router from "../router";
import {ref} from "vue";
import {MeResult} from "../types/app/services/user-service";
import UserService from "../app/services/UserService";

export default () => {
    //services
    const userService = new UserService();

    // model of user
    const user = ref<MeResult>()

    // fetch user
    const fetchUser = async (): Promise<void> => {
        user.value = await userService.me()
    }

    // logout
    const logout = () => {
        localStorage.removeItem('access_token');
        router.push({name: 'login'})
    }

    return {
        user,
        logout,
        fetchUser
    }
}
