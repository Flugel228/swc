import {StandardResponse} from "../../index";

// register
export type RegisterResponse = StandardResponse<RegisterResult>

type RegisterResult = {
    token: {
        exception: null
        headers: object
        original: {
            'access_token': string
            'token_type': string
            'expires_in': number
        }
    }
    message: string
}

export type RegisterFunctionResponse = {
    message: string
    status: number
}

// login
export type LoginResponse = StandardResponse<LoginResult>

type LoginResult = {
    token: {
        exception: null
        headers: object
        original: {
            'access_token': string
            'token_type': string
            'expires_in': number
        }
    }
    message: string
}

export type LoginFunctionResponse = {
    message: string
    status: number
}

// me

export type MeResponse = StandardResponse<MeResult>

export type MeResult = {
    "id": number,
    "login": string,
    "first_name": string,
    "last_name": string,
    "registration_date": Date,
    "birthdate": null | Date,
    "created_at": Date,
    "updated_at": Date
}

export type MeFunctionResponse = MeResult
