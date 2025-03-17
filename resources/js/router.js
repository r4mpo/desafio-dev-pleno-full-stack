import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from './axios';
window.axios = axios;

Vue.use(VueRouter);

// Importar os componentes que serão usados nas rotas
import Login from './templates/Login.vue';

const routes = [
    { path: '/', component: Login },
];

const router = new VueRouter({
    mode: 'history', // Permite URLs amigáveis sem "#"
    routes
});

export default router;
