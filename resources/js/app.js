import Vue from 'vue';
import App from './components/App.vue';
import router from './router'; // Importa o arquivo de rotas

new Vue({
    router, // Adiciona o Vue Router à instância do Vue
    render: h => h(App),
}).$mount('#app');
