<script setup lang="ts">
import {IProps} from "../../types/components/content/show-event";
import EventService from "../../app/services/EventService";

const props = defineProps<IProps>();

const eventService = new EventService();

const addParticipant = async (id: number): Promise<void> => {
    await eventService.addParticipant(id);
    await props.fetchEvents();

}

const deleteParticipant = async (id: number): Promise<void> => {
    await eventService.deleteParticipant(id);
    await props.fetchEvents();
}
</script>

<template>
    <h2>{{ event.title }}</h2>
    <p>{{ event.text }}</p>
    <p>{{ event.created_at }}</p>
    <h2>Участники</h2>
    <p
        v-for="(participant, id) in event.participants"
        :key="id"
    >{{ participant.first_name }} {{ participant.last_name }}</p>
    <template v-if="isParticipatingInTheEvent">
        <button
            class="btn btn-danger"
            @click.prevent="deleteParticipant(event.id)"
        >Отменить участие</button>
    </template>
    <template v-else>
        <button
            class="btn btn-primary"
            @click.prevent="addParticipant(event.id)"
        >Принять участие</button>
    </template>
</template>

<style scoped>

</style>
