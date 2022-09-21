<template>
    <div class="form-wrapper">
    <h3>Регистрация</h3>
    <form @submit.prevent="register" action="">
        <div v-if="errors" class="errors">
            <p v-for="(error, field) in errors" :key="field">
                {{error[0]}}
            </p>
        </div>
        <input type="text" v-model="form.username" placeholder="Введите Ваше Имя"><br>
        <input type="password" v-model="form.password" placeholder="Введите пароль"><br>
        <input type="password" v-model="form.password_repeat" placeholder="Повторите пароль"><br>
        <button>Зарегистрироваться</button>
        <router-link to="/login" class="link">Войти</router-link>
    </form>
</div>
</template>

<script>
    export default {
        name: "RegistrationView",
        data() {
            return {
                form: {
                    username: '',
                    password: '',
                    password_repeat: '',
                }, 
                errors: null
            }
        },
        methods: {
            register() {
                console.log(this.form);
            }
        }
    }
</script>

<style scoped></style>