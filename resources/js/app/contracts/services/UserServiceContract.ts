import CoreServiceContract from "./CoreServiceContract";
import {UserData as RegisterUserData} from "../../../types/components/forms/register-form";
import {UserData as LoginUserData} from "../../../types/components/forms/login-form";
import {LoginFunctionResponse, RegisterFunctionResponse} from "../../../types/app/services/user-service";

export default interface UserServiceContract extends CoreServiceContract{
    // function that submit request to register on the server
    register<
        T extends object
        >(v$: T, state: RegisterUserData, openModalFunction: () => void): Promise<RegisterFunctionResponse | void>

    // function that submit request to log in on the server
    login<
        T extends object
    >(v$: T, state: LoginUserData, openModalFunction: () => void): Promise<LoginFunctionResponse | void>
}
