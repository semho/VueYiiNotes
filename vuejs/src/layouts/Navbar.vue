<template>
    <div class="navbar">
        Приветствую {{user.username}}
        <a href="" @click="logout">Выйти</a>
    </div>
</template>

<script>
import authService from '@/services/auth.service';

    export default {
        // eslint-disable-next-line vue/multi-word-component-names
        name: "Navbar",
        props: {
            user: Object
        },
        methods: {
            logout(){
                authService.logout();
            }
        }
    }
   
</script>

<style lang="scss" scoped>
    .navbar {
        height: 50px;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        line-height: 50px;
        background-color: #1f5d6b;
        color: #fff;
        padding: 0 15px;
        text-align: right;
        transition: font-weight 0.3s;
    }

    a {
        color: #fff;
    }

</style>