// fetchEvents.ts
import {ref} from 'vue';
import EventService from "../app/services/EventService";
import {Event, IndexFunctionResponse, Meta} from "../types/app/services/event-service";

export default () => {
    const events = ref<Event[]>([]);
    const meta = ref<Meta>();
    const page = ref<number>(1);
    const service = new EventService();
    const currentEvent = ref<Event | null>();
    const isParticipatingInTheEvent = ref<boolean>(false);



    const fetchEvents = async (): Promise<void> => {
        const response: IndexFunctionResponse | null = await service.index(page.value);
        events.value = [];
        response.data.forEach((event: Event) => events.value.push(event));
        meta.value = response.meta;
        currentEvent.value = events.value.find((event: Event) => event.id === currentEvent.value.id)
        isParticipatingInTheEvent.value = !isParticipatingInTheEvent.value;
    };

    return {
        events,
        meta,
        page,
        currentEvent,
        isParticipatingInTheEvent,
        fetchEvents
    };
}
