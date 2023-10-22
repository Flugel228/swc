import CoreServiceContract from "./CoreServiceContract";
import {UserData} from "../../../types/components/forms/register-form";
import {RegisterFunctionResponse} from "../../../types/app/services/user-service";

export default interface UserServiceContract extends CoreServiceContract{
    // function that submit request to register on the server
    register<
        T extends object
        >(v$: T, state: UserData, openModalFunction: () => void): Promise<RegisterFunctionResponse | void>
    login(): Promise<void>
}
