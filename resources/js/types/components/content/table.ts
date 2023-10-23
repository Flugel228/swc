import {Event} from "../../app/services/event-service"

// declare props interface
export interface IProps {
    rows: Event[]
    clickOnEvent: (event: Event) => void
}
