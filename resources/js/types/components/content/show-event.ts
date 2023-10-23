import {Event} from "../../app/services/event-service";
import {MeResult} from "../../app/services/user-service";

export interface IProps {
    event: Event
    user: MeResult
    isParticipatingInTheEvent: boolean
    fetchEvents: () => Promise<void>
}
