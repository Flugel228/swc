import CoreServiceContract from "./CoreServiceContract";
import {IndexFunctionResponse, IndexResponse} from "../../../types/app/services/event-service";

export default interface EventServiceContract extends CoreServiceContract {
    index(page: number = 1): Promise<IndexFunctionResponse | null>
    addParticipant(id: number): Promise<void>
    deleteParticipant(id: number): Promise<void>
}
