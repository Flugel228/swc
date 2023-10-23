import CoreService from "./CoreService";
import UserServiceContract from "../contracts/services/UserServiceContract";
import axios from "axios";
import {
    LoginFunctionResponse,
    LoginResponse, MeFunctionResponse, MeResponse,
    RegisterFunctionResponse,
    RegisterResponse
} from "../../types/app/services/user-service";
import {UserData as RegisterUserData} from "../../types/components/forms/register-form";
import {UserData as LoginUserData} from "../../types/components/forms/login-form";
import api from "../../axios/api";

class UserService extends CoreService implements UserServiceContract {

    public async register<
        T extends object
    >(v$: T, state: RegisterUserData, openModalFunction: () => void): Promise<RegisterFunctionResponse | null>
    {
        const isFormCorrect = await v$.value.$validate();

        if (isFormCorrect) {
            try {
                const res = await axios.post<RegisterResponse, axios.AxiosResponse<RegisterResponse>, RegisterUserData>('/api/users/register', state)
                console.log(res);
                localStorage.setItem('access_token', res.data.result.token.original.access_token);
                openModalFunction();
                return {
                    message: res.data.result.message,
                    status: res.status
                };
            } catch (e) {
                if (axios.isAxiosError(e)) {
                    console.log(e.response?.data.error.message, "error");
                    openModalFunction()
                    return {
                        message: e.response?.data.error.message,
                        status: e.response?.status
                    };
                } else if (e instanceof Error) {
                    console.log(e.message, "err");
                    return null;
                }
            }
        }
    }

    public async login<
        T extends object
    >(v$: T, state: LoginUserData, openModalFunction: () => void): Promise<LoginFunctionResponse | null>
    {
        const isFormCorrect = await v$.value.$validate();

        if (isFormCorrect) {
            try {
                const res = await axios.post<LoginResponse, axios.AxiosResponse<LoginResponse>, LoginUserData>('/api/users/login', state)
                localStorage.setItem('access_token', res.data.result.token.original.access_token);
                openModalFunction();
                return {
                    message: res.data.result.message,
                    status: res.status
                };
            } catch (e) {
                if (axios.isAxiosError(e)) {
                    console.log(e.response?.data.error.message, "error");
                    openModalFunction()
                    return {
                        message: e.response?.data.error.message,
                        status: e.response?.status
                    };
                } else if (e instanceof Error) {
                    console.log(e.message, "err");
                    return null;
                }
            }
        }
    }

    public async me(): Promise<MeFunctionResponse | null> {
        try {
            const res = await api.post<
                MeResponse,
                axios.AxiosResponse<MeResponse>
            >('/api/users/me');
            return res.data.result;
        } catch (e) {
            if (axios.isAxiosError(e)) {
                console.log(e.response?.data.error.message, "error");
            } else if (e instanceof Error) {
                console.log(e.message, "err");
                return null;
            }
        }
    }


}

export default UserService;
