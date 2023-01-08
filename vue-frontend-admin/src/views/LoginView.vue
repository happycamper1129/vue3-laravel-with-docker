<template>

    <body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form @submit.prevent="submit">
            <img class="mb-4" src="/public/favicon.ico" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input v-model="form.email" type="email" class="form-control" placeholder="Email Address">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input v-model="form.password" type="password" class="form-control" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input v-model="form.rememberMe" type="checkbox"
                           value="remember-me"> Remember me
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
    </main>
    </body>

</template>

<script lang="ts">
import {reactive} from 'vue';
import axios from 'axios';
import {useRouter} from 'vue-router';

export default {
    name: "LoginView",
    setup(){
        const form = reactive({
            email: '',
            password: '',
            rememberMe: '',
        });
        const router = useRouter();

        const submit = async () => {
            console.log(form);
            const {data} = await axios.post('login', form, {
                withCredentials: true
            });
            console.log(data);
            await router.push('/');
        }

        return {
            form,
            submit
        }
    }
}
</script>

<style scoped>
html,
body {
    height: 100%;
}

body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
}

.form-signin {
    max-width: 330px;
    padding: 15px;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
</style>
