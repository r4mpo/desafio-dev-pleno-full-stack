<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <img src="../../../public/images/DeMaria_sem_sombra.png" width="100" height="100" alt="Logo empresa DeMaria">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" :class="{ active: isLoginActive }" @click.prevent="showLogin">
                                    Entrar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" :class="{ active: !isLoginActive }" @click.prevent="showRegister">
                                    Cadastrar-se
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Login Form -->
                                <form v-if="isLoginActive" @submit.prevent="submitLogin">
                                    <div class="form-group" :class="{ 'is-invalid': !validEmail }">
                                        <input type="email" v-model="login.email" @blur="validateEmail" class="form-control" placeholder="E-mail">
                                        <small v-if="!validEmail" class="text-danger">E-mail inválido</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" v-model="login.password" class="form-control" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn btn-login" value="Entrar" :disabled="!isLoginValid">
                                    </div>
                                </form>

                                <!-- Register Form -->
                                <form v-if="!isLoginActive" @submit.prevent="submitRegister">
                                    <div class="form-group" :class="{ 'is-invalid': !validName }">
                                        <input type="text" v-model="register.name" @blur="validateName" class="form-control" placeholder="Nome">
                                        <small v-if="!validName" class="text-danger">Nome deve ter pelo menos 3 caracteres</small>
                                    </div>
                                    <div class="form-group" :class="{ 'is-invalid': !validEmail }">
                                        <input type="email" v-model="register.email" @blur="validateEmail" class="form-control" placeholder="E-mail">
                                        <small v-if="!validEmail" class="text-danger">E-mail inválido</small>
                                    </div>
                                    <div class="form-group" :class="{ 'is-invalid': !validPassword }">
                                        <input type="password" v-model="register.password" @blur="validatePassword" class="form-control" placeholder="Senha">
                                        <small v-if="!validPassword" class="text-danger">Senha deve ter pelo menos 6 caracteres</small>
                                    </div>
                                    <div class="form-group" :class="{ 'is-invalid': !validConfirmPassword }">
                                        <input type="password" v-model="register.confirmPassword" @blur="validateConfirmPassword" class="form-control" placeholder="Confirmar senha">
                                        <small v-if="!validConfirmPassword" class="text-danger">As senhas não coincidem</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn btn-register" value="Cadastrar" :disabled="!isRegisterValid">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            isLoginActive: true,
            login: { email: '', password: '' },
            register: { name: '', email: '', password: '', confirmPassword: '' },
            validEmail: true,
            validName: true,
            validPassword: true,
            validConfirmPassword: true
        };
    },
    computed: {
        isLoginValid() {
            return this.login.email !== '' && this.login.password !== '';
        },
        isRegisterValid() {
            return this.validName && this.validEmail && this.validPassword && this.validConfirmPassword;
        }
    },
    methods: {
        showLogin() {
            this.isLoginActive = true;
        },
        showRegister() {
            this.isLoginActive = false;
        },
        validateEmail() {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            this.validEmail = regex.test(this.register.email || this.login.email);
        },
        validateName() {
            this.validName = this.register.name.length >= 3;
        },
        validatePassword() {
            this.validPassword = this.register.password.length >= 6;
        },
        validateConfirmPassword() {
            this.validConfirmPassword = this.register.password === this.register.confirmPassword;
        },
        submitLogin() {
            alert('Login enviado!');
        },
        submitRegister() {
            alert('Cadastro enviado!');
        }
    }
};
</script>

<style>
.is-invalid input {
    border-color: red !important;
}
.is-invalid small {
    display: block;
}

body {
    padding-top: 90px;
}

.panel-login {
    border-color: #ccc;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
}

.panel-login>.panel-heading {
    color: #00415d;
    background-color: #fff;
    border-color: #fff;
    text-align: center;
}

.panel-login>.panel-heading a {
    text-decoration: none;
    color: #666;
    font-weight: bold;
    font-size: 15px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}

.panel-login>.panel-heading a.active {
    color: #029f5b;
    font-size: 18px;
}

.panel-login>.panel-heading hr {
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
    background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
    background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
}

.panel-login input[type="text"],
.panel-login input[type="email"],
.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}

.panel-login input:hover,
.panel-login input:focus {
    outline: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}

.btn-login {
    background-color: #59B2E0;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #59B2E6;
}

.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #53A3CD;
    border-color: #53A3CD;
}

.forgot-password {
    text-decoration: underline;
    color: #888;
}

.forgot-password:hover,
.forgot-password:focus {
    text-decoration: underline;
    color: #666;
}

.btn-register {
    background-color: #1CB94E;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}

.btn-register:hover,
.btn-register:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}
</style>