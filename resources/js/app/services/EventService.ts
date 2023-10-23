import CoreService from "./CoreService";
import EventServiceContract from "../contracts/services/EventServiceContract";
import axios from "axios";
import {IndexFunctionResponse, IndexResponse} from "../../types/app/services/event-service";
import api from "../../axios/api";

class EventService extends CoreService implements EventServiceContract {
    public async index(page: number = 1): Promise<IndexFunctionResponse | null> {
        try {
            const res = await axios.get<IndexResponse, axios.AxiosResponse<IndexResponse>>(`/api/events?page=${page}`);
            return res.data.result;
        } catch (e) {
            if (axios.isAxiosError(e)) {
                console.log(e.response?.data.error.message, "error");
                return null;
            } else if (e instanceof Error) {
                console.log(e.message, "err");
                return null;
            }
        }
    }

    public async addParticipant(id: number): Promise<void> {
        try {
            const res = await api.post<IndexResponse, axios.AxiosResponse<IndexResponse>>(`/api/events/${id}/participants`);
        } catch (e) {
            if (axios.isAxiosError(e)) {
                console.log(e.response?.data.error.message, "error");
            } else if (e instanceof Error) {
                console.log(e.message, "err");
            }
        }
        return
    }

    public async deleteParticipant(id: number): Promise<void> {
        try {
            const res = await api.post<IndexResponse, axios.AxiosResponse<IndexResponse>>(`/api/events/${id}/participants/delete`);
        } catch (e) {
            if (axios.isAxiosError(e)) {
                console.log(e.response?.data.error.message, "error");
            } else if (e instanceof Error) {
                console.log(e.message, "err");
            }
        }
    }

}

export default EventService
