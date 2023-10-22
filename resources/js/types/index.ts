export type StandardResponse<R> = {
    error: null | {
        message: string
    }
    result: null | R
}
