<script setup lang="ts">
import {IProps} from "../../types/components/content/table";

const props = defineProps<IProps>();


</script>

<template>
    <table class="table">
        <thead>
        <tr>
            <th class="col-1">ID</th>
            <th class="col-10">Название</th>
            <th class="col-2"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
            <td >{{ row.id }}</td>
            <td>{{ row.title }}</td>
            <td
                class="text-blue cursor-pointer"
                @click="clickOnEvent(row)"
            >Посмотреть</td>
        </tr>
        </tbody>
    </table>
</template>

<style scoped>
.cursor-pointer:hover {
    cursor: pointer;
}
</style>
