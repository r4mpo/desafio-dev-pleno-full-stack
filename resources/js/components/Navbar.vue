<template>
    <nav class="navbar">
        <div class="logo"><router-link to="/">DeMaria</router-link></div>
        <div class="menu">
                <router-link title="Perfil" to="/perfil"><i class="bi bi-person-circle"></i></router-link>
            <a href="#" @click="logOut()" title="Sair">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
    data() {
        return {

        }
    },
    mounted() {
        this.removeElementosObsoletos();
    },
    methods: {
        logOut() {
            sessionStorage.removeItem('token');
            this.$router.push('/login');
        },
        removeElementosObsoletos() {
            document.getElementById('bootstrap-css').remove();
        }
    }
}
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
    color: white;
    margin-bottom: 5%;
}

.navbar .logo {
    font-size: 20px;
    font-weight: bold;
}

.navbar .menu {
    display: flex;
    gap: 15px;
}

.navbar .menu a {
    color: white;
    text-decoration: none;
    font-size: 22px;
}

.navbar .menu a:hover {
    opacity: 0.7;
}
.logo a {
    text-decoration: none !important;
    color: white !important;
}
</style>