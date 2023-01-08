import { createRouter, createWebHistory } from "vue-router";

import DashboardView from "@/views/DashboardView.vue";
import UsersView from "@/views/UsersView.vue";
import RegisterView from "@/views/RegisterView.vue";
import LoginView from "@/views/LoginView.vue";
import WrapperView from "@/views/WrapperView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/register",
            name: "register",
            component: RegisterView,
        },

        {
            path: "/login",
            name: "login",
            component: LoginView,
        },

        {
            path: "/",
            name: "wrapper",
            component: WrapperView,
            children: [
                {
                    path: "/",
                    name: "dashboard",
                    component: DashboardView,
                },

                {
                    path: "/users",
                    name: "users",
                    component: UsersView,
                },
            ],
        },

        // {
        //     path: "/users",
        //     name: "users",
        //     // route level code-splitting
        //     // this generates a separate chunk (About.[hash].js) for this route
        //     // which is lazy-loaded when the route is visited.
        //     component: () => import("../views/AboutView.vue"),
        // },
    ],
});

export default router;
