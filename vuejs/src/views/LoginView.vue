<template>
<div class="form-wrapper">
    <h3>Вход</h3>
    <form @submit.prevent="login" action="">
        <div v-if="errors" class="errors">
            <p v-for="(error, field) in errors" :key="field">
                {{error[0]}}
            </p>
        </div>
        <input type="text" v-model="form.username" placeholder="Введите Ваше Имя"><br>
        <input type="password" v-model="form.password" placeholder="Введите Ваш пароль"><br>
        <button>Войти</button>
        <router-link to="/register" class="link">Зарегистрироваться</router-link>
    </form>
</div>
</template>

<script>
    import authServise from '../services/auth.service.js';
    export default {
        name: "LoginView",
        data() {
            return {
                form: {
                    username: '',
                    password: ''
                }, 
                errors: null
            }
        },
        methods: {
            async login() {
                const {success, errors} = await authServise.login(this.form);  
                if (success) {
                    this.$router.push({name: 'home'});
                } else {
                    this.errors = errors;
                }
            }
        }
    }
</script>

<style scoped></style>