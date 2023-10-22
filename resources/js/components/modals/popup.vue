<script setup lang="ts">
import {library} from "@fortawesome/fontawesome-svg-core";
import {faXmark} from "@fortawesome/free-solid-svg-icons";

import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {IEmit, IProps} from "../../types/components/modals/popup";
import {ref} from "vue";

library.add(faXmark)

const popupWrapper = ref<HTMLDivElement>()

const props = withDefaults(defineProps<IProps>(), {
    title: '',
    leftBtnTitle: ''
})


const emit = defineEmits<IEmit>()

const closeModal = () => {
    emit('closeModal')
}

const successModal = () => {
    emit('successModal')
}

document.addEventListener('click', (event) => {
    event.target === popupWrapper.value ? closeModal() : null
})
</script>
<template>
    <div class="popup-wrapper" ref="popupWrapper">
        <div class="v-popup">
            <div class="v-popup__header">
                <span>{{ title }}</span>
                <font-awesome-icon
                    class="cursor-pointer"
                    :icon="['fas', 'xmark']"
                    @click="closeModal"
                />
            </div>
            <div class="v-popup__content">
                <slot></slot>
            </div>
            <div class="v-popup__footer">
                <button
                    v-if="leftBtnTitle"
                    class="btn btn-success"
                    @click="successModal"
                >{{ leftBtnTitle }}</button>
                <button
                    class="btn btn-danger"
                    @click="closeModal"
                >Закрыть
                </button>
            </div>
        </div>
    </div>
</template>
<style>

.popup-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 0;
    left: 0;
    top: -50%;
    bottom: 0;
    z-index: 9999;
    background: rgba(104, 102, 102, 0.7);
}

.v-popup {
    padding: 16px;
    position: fixed;
    width: 400px;
    background: #fff;
    box-shadow: 0 0 17px 0 #000;
    color: #000;
    z-index: 111;
}

.v-popup .v-popup__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
}

.v-popup .v-popup__header .cursor-pointer:hover {
    cursor: pointer;
}

.v-popup.v-popup__content {
    display: flex;
    justify-content: center;
    align-items: center;
}

.v-popup.v-popup__footer {
    display: flex;
    justify-content: end;
    align-items: center;
}
</style>
