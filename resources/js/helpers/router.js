import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from './axios';
window.axios = axios;

Vue.use(VueRouter);

// Importar os componentes que serão usados nas rotas
import Home from './../templates/Home.vue';
import Login from './../templates/Login.vue';

const routes = [
    { path: '/login', component: Login },
    { 
        path: '/', 
        component: Home, 
        meta: { requiresAuth: true } // Adiciona um meta dado para proteger a rota
    }
];

const router = new VueRouter({
    mode: 'history', // Permite URLs amigáveis sem "#"
    routes
});

// Middleware de proteção de rotas
router.beforeEach((to, from, next) => {
    const estaLogado = !!sessionStorage.getItem('token'); // Verifica se há token armazenado

    if (to.meta.requiresAuth && !estaLogado) {
        next('/login'); // Redireciona para login se não estiver autenticado
    } else {
        next(); // Prossegue para a rota
    }
});

export default router;