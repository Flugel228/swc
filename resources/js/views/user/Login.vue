<script setup lang="ts">
import LoginForm from "../../components/forms/login-form.vue";</script>

<template>
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Войти в аккаунт</h4>
        </div>
    </div>
    <div class="row">
        <login-form/>
    </div>
    <div class="row">
        <div class="col-12">
            <router-link :to="{name: 'register'}" class="left">Нет аккаунта? Зарегистрироваться</router-link>
        </div>
    </div>
</template>

<style scoped>

</style>
