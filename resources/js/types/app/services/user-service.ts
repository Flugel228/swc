import {StandardResponse} from "../../index";

export type RegisterReponse = StandardResponse<RegisterResult>

type RegisterResult = {
    'message': string
}

export type RegisterFunctionResponse = {
    message: string
    status: number
}
