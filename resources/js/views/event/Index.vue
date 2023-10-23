<script setup lang="ts">
import EventTable from "../../components/content/event-table.vue";
import {Event, Participant} from "../../types/app/services/event-service"
import {onBeforeUnmount, onMounted} from "vue";
import ShowEvent from "../../components/content/show-event.vue";
import useFetchEvents from "../../composables/fetchEvents";
import useUsersFunctions from "../../composables/usersFucntions";

// fetch events
const {events, meta, page, currentEvent, isParticipatingInTheEvent, fetchEvents} = useFetchEvents();

// logout function
const {user,logout, fetchUser} = useUsersFunctions();

let interval;

onMounted(async () => {
    await fetchUser();
    await fetchEvents();
    interval = setInterval(fetchEvents, 30000);
});

onBeforeUnmount(() => {
   clearInterval(interval)
});

// METHODS



// watch the event
const clickOnEventHandler = (event: Event) => {
    isParticipatingInTheEvent.value = false;
    currentEvent.value = event
    currentEvent.value.participants.forEach((participant: Participant) => {
        if (user.value.id === participant.id) {
            isParticipatingInTheEvent.value = true;
        }
    })
}

// change current page
const changePage = async (newPage: number): Promise<void> => {
    page.value = newPage
    await fetchEvents();
}
</script>

<template>
    <div
        v-if="user"
        class="row"
    >
        <div class="col-4">
            <h1>{{ user.first_name}} {{ user.last_name}}</h1>
        </div>
        <div class="col-2">
            <button
                class="btn btn-secondary mt-2"
                @click="logout"
            >Выйти</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6"
             v-if="events"
        >
            <EventTable
                :rows="events"
                :click-on-event="clickOnEventHandler"/>
        </div>
        <div class="col-6">
            <show-event
                :user="user"
                v-if="currentEvent"
                :event="currentEvent"
                :fetch-events="fetchEvents"
                :is-participating-in-the-event="isParticipatingInTheEvent"
            />
        </div>
    </div>
    <div class="row"
         v-if="meta"
    >
        <vue-awesome-paginate
            :total-items="meta.total"
            :items-per-page="10"
            :max-pages-shown="5"
            v-model="meta.current_page"
            :on-click="changePage"
            :hide-prev-next-when-ends="true"
        />
    </div>
</template>

<style>
.pagination-container {
    display: flex;
    column-gap: 10px;
}
.paginate-buttons {
    height: 40px;
    width: 40px;
    border-radius: 20px;
    cursor: pointer;
    background-color: rgb(242, 242, 242);
    border: 1px solid rgb(217, 217, 217);
    color: black;
}
.paginate-buttons:hover {
    background-color: #d8d8d8;
}
.active-page {
    background-color: #3498db;
    border: 1px solid #3498db;
    color: white;
}
.active-page:hover {
    background-color: #2988c8;
}
</style>
