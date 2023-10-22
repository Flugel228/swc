<script setup lang="ts">
import Input from "../../components/fields/input.vue";
import Modal from "../../components/modals/popup.vue"
import {computed, reactive, ref} from "vue";
import {UserData} from "../../types/components/forms/login-form";
import {helpers, maxLength, minLength, required} from "@vuelidate/validators";
import {date, letters, login} from "../../validation";
import useVuelidate from "@vuelidate/core";
import UserService from "../../app/services/UserService";
import useModal from "../../composables/modal";
import {RegisterFunctionResponse} from "../../types/app/services/user-service";

// initialize modal composables elements
const { isTheInfoModalVisible, showModalInfo, closeModalInfo } = useModal();

// button element
const btn = ref<HTMLButtonElement | null>();

// variable containing the message that will be used on the modal page
const responseMessage = ref<string>('');

// declare state
const state = reactive<UserData>({
    login: '',
    password: ''
});

// declare rules
const rules = computed(() => ({
    login: {
        required: helpers.withMessage('Это поле обязательно для заполнения', required),
        minLength: helpers.withMessage('Минимально допустимая длина 3 символа', minLength(3)),
        maxLength: helpers.withMessage('Максимально допустимая длина 20 символов', maxLength(20)),
        login: helpers.withMessage('Это поле должно содержать только: латинские символы, цифры, и знаки "-" и "_"', login)
    },
    password: {
        required: helpers.withMessage('Это поле обязательно для заполнения', required),
        minLength: helpers.withMessage('Минимально допустимая длина 8 символов', minLength(8)),
        maxLength: helpers.withMessage('Максимально допустимая длина 50 символов', maxLength(50))
    }
}));

const v$ = useVuelidate<UserData>(rules, state);

// initialize UserService class
const service = new UserService();

// form submit function
const submitForm = async () => {
    // disable button
    btn.value.disabled = true;

    // submit request on the server
    const res: RegisterFunctionResponse | void = await service.login<typeof v$>(v$, state, showModalInfo);

    // button activation
    btn.value.disabled = false;

    if (res) {
        // setting message
        responseMessage.value = res.message;
    }
}
</script>

<template>
    <modal
        v-if="isTheInfoModalVisible"
        title="Ответ"
        @closeModal="closeModalInfo('')"
    >{{responseMessage  }}</modal>
    <form>
        <div class="input-group mb-3">
            <Input
                :errors="v$.login.$errors"
                label="Логин"
                name="login"
                placeholder="Введите логин"
                width="100%"
                v-model:value="v$.login.$model"
            />
        </div>
        <div class="input-group mb-3">
            <Input
                :errors="v$.password.$errors"
                label="Пароль"
                name="login"
                placeholder="Введите пароль"
                width="100%"
                v-model:value="v$.password.$model"
            />
        </div>
        <div class="row ">
            <div class="col-6">
                <button
                    ref="btn"
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="submitForm"
                >Зарегестрироваться
                </button>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
