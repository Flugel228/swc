import {StandardResponse} from "../../index";

// register
export type RegisterResponse = StandardResponse<RegisterResult>

type RegisterResult = {
    message: string
}

export type RegisterFunctionResponse = {
    message: string
    status: number
}

// login
export type LoginResponse = StandardResponse<LoginResponse>

type LoginResult = {
    message: string
}

export type LoginFunctionResponse = {
    message: string
    status: number
}
