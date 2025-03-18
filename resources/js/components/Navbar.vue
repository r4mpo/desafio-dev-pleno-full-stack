<template>
    <!--  -->
</template>

<script>
export default {
    name: 'Navbar',
    data() {
        return {

        }
    },
    methods: {
        logOut() {
            sessionStorage.removeItem('token');
            this.$router.push('/login');
        }
    }
}
</script>