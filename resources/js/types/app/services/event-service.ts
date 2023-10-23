import {StandardResponse} from "../../index";

export type IndexResponse = StandardResponse<IndexResult>;

//index
type IndexResult = {
    data: Event[]
    meta: Meta
    links: Links
}

export type IndexFunctionResponse = IndexResult

export type Event = {
    id: number
    title: string
    text: string
    created_at: Date
    participants: Participant[]
}

export type Participant = {
    id: number
    first_name: string
    last_name: string
}

export type Meta = {
    total: number,
    per_page: number,
    current_page: number,
    last_page: number,
    from: number,
    to: number
}

export type Links = {
    "first": string
    "last": string
    "prev": string
    "next": string
}


