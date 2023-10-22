import CoreService from "./CoreService";
import UserServiceContract from "../contracts/services/UserServiceContract";
import axios from "axios";
import {RegisterFunctionResponse, RegisterReponse} from "../../types/app/services/user-service";
import {UserData} from "../../types/components/forms/register-form";

class UserService extends CoreService implements UserServiceContract {
    public async login(): Promise<void> {
    }

    public async register<
        T extends object
    >(v$: T, state: UserData, openModalFunction: () => void): Promise<RegisterFunctionResponse | void>
    {
        const isFormCorrect = await v$.value.$validate();

        if (isFormCorrect) {
            try {
                const res = await axios.post<RegisterReponse, axios.AxiosResponse<RegisterReponse>, UserData>('/api/users/register', state)
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
                    return;
                }
            }
        }
    }


}

export default UserService;
