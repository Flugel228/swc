<script setup lang="ts">
import RegisterForm from "../../components/forms/register-form.vue";</script>

<template>
    <div class="row">
        <div class="col-12 ">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Зарегистрироваться</h4>
            </div>
        </div>
        <div class="row">
        <register-form/>
        </div>
        <div class="row">
            <div class="col-12">
                <router-link :to="{name: 'login'}" class="left">Есть аккаунт? Войти</router-link>
            </div>
        </div>
        </div>
    </div>
</template>

<style scoped>

</style>
