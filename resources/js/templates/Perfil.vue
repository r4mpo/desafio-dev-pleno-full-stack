<template>
    <div>
        <Navbar></Navbar>
        <div class="form-container">
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input v-model="cep" type="text" id="cep" class="form-control" placeholder="Digite o CEP"
                        @blur="consultarCep" />
                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input v-model="logradouro" type="text" id="logradouro" class="form-control"
                        placeholder="Logradouro" :disabled="!cepValido" />
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input v-model="bairro" type="text" id="bairro" class="form-control" placeholder="Bairro"
                        :disabled="!cepValido" />
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input v-model="cidade" type="text" id="cidade" class="form-control" placeholder="Cidade"
                        :disabled="!cepValido" />
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input v-model="estado" type="text" id="estado" class="form-control" placeholder="Estado"
                        :disabled="!cepValido" />
                </div>
                <button type="submit" class="btn btn-primary" :disabled="!cepValido">Salvar</button>
            </form>
        </div>
    </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';

export default {
    name: 'Perfil',
    data() {
        return {
            cep: '',
            logradouro: '',
            bairro: '',
            cidade: '',
            estado: '',
            cepValido: false
        };
    },
    components: {
        Navbar,
    },
    methods: {
        async consultarCep() {
            if (this.cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${this.cep}/json/`);
                    const data = await response.json();
                    if (!data.erro) {
                        this.logradouro = data.logradouro;
                        this.bairro = data.bairro;
                        this.cidade = data.localidade;
                        this.estado = data.uf;
                        this.cepValido = true; // Habilita os campos quando o CEP for válido
                    } else {
                        this.exibirMensagem('Ops!', 'CEP não encontrado', 'error');
                        this.cepValido = false;
                    }
                } catch (error) {
                    this.exibirMensagem('Ops!', 'Erro ao consultar CEP', 'error');
                    this.cepValido = false;
                }
            } else {
                this.cepValido = false; // Desabilita os campos se o CEP não for válido
            }
        },
        submitForm() {
            // Lógica de envio de formulário
            console.log('Formulário enviado');
        },
        exibirMensagem(titulo, texto, icone) {
            Swal.fire({ title: titulo, text: texto, icon: icone });
        },
    }
};
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,
.container-fluid,
.navbar {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

.form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

input.form-control:focus {
    border-color: #007bff;
}

button.btn {
    font-size: 1rem;
    padding: 10px 20px;
    width: 100%;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button.btn:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .form-container {
        padding: 15px;
    }

    button.btn {
        font-size: 0.9rem;
        padding: 8px 16px;
    }
}
</style>