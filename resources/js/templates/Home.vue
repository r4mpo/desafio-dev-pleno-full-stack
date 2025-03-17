<template>
    <div class="container-fluid mt-4">
        <button class="btn btn-primary mb-4 btn-lg" @click="adicionarRegistro">Adicionar Novo</button>
        
        <div class="table-responsive">
            <table id="tabela" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Título</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in dados" :key="item.id">
                        <td class="text-center">{{ item.id }}</td>
                        <td class="text-center">
                            <span :class="{ 'text-success': item.status, 'text-danger': !item.status }">
                                {{ item.status ? 'Finalizada' : 'Pendente' }}
                            </span>
                        </td>
                        <td>{{ item.titulo }}</td>
                        <td class="text-center">
                            <button title="Editar tarefa" class="btn btn-warning btn-lg mr-2" @click="editarRegistro(item)"><i class="bi bi-pencil-square"></i></button>
                            <button title="Excluir tarefa" class="btn btn-danger btn-lg mr-2" @click="excluirRegistro(item.id)"><i class="bi bi-trash3"></i></button>
                            <button title="Atualizar status" class="btn btn-info btn-lg" @click="alterarStatus(item)"><i class="bi bi-arrow-clockwise"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import 'datatables.net-bs4';
import 'datatables.net-responsive-bs4';
import { getDados } from '../helpers/axios';

export default {
    name: "Home",
    data() {
        return {
            dados: [],
            tabela: null
        };
    },
    async mounted() {
        await this.recuperarRegistros();
    },
    methods: {
        async recuperarRegistros() {
            try {
                const resposta = await getDados('tarefas');
                this.dados = resposta.resposta;

                this.$nextTick(() => {
                    if (this.tabela) {
                        this.tabela.destroy();
                    }
                    this.tabela = $('#tabela').DataTable({
                        language: {
                            "lengthMenu": "Mostrar _MENU_ registros por página",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "Página _PAGE_ de _PAGES_",
                            "infoEmpty": "Nenhum dado disponível",
                            "infoFiltered": "(filtrado de _MAX_ registros totais)",
                            "search": "Pesquisar:",
                            "paginate": {
                                "first": "Primeiro",
                                "last": "Último",
                                "next": "Próximo",
                                "previous": "Anterior"
                            }
                        },
                        dom: "<'row'<'col-md-6'f>>t<'row'<'col-md-12 text-right'p>>"
                    });
                });
            } catch (erro) {
                this.exibirMensagem('Ops!', 'Nenhuma tarefa foi encontrada, tente novamente!', 'error');
            }
        },
        adicionarRegistro() {
            this.exibirMensagem('Info', 'Adicionar novo registro em breve!', 'info');
        },
        editarRegistro(item) {
            this.exibirMensagem('Editar', `Editando: ${item.titulo}`, 'info');
        },
        async excluirRegistro(id) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                this.dados = this.dados.filter(item => item.id !== id);
                this.atualizarTabela();
                this.exibirMensagem('Sucesso', 'Registro excluído com sucesso!', 'success');
            }
        },
        alterarStatus(item) {
            item.status = !item.status;
            this.atualizarTabela();
        },
        atualizarTabela() {
            this.$nextTick(() => {
                if (this.tabela) {
                    this.tabela.destroy();
                }
                this.tabela = $('#tabela').DataTable({
                    language: {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Nenhum registro encontrado",
                        "info": "Página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum dado disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros totais)",
                        "search": "Pesquisar:",
                        "paginate": {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        }
                    },
                    dom: "<'row'<'col-md-6'f>>t<'row'<'col-md-12 text-right'p>>"
                });
            });
        },
        exibirMensagem(titulo, texto, icone) {
            Swal.fire({ title: titulo, text: texto, icon: icone });
        }
    }
};
</script>

<style>
.container-fluid {
    max-width: 95%;
}

.table {
    font-size: 1.2rem;
    width: 100%;
}

.table th,
.table td {
    padding: 20px;
    text-align: center;
}

.btn {
    font-size: 1rem;
    padding: 12px 20px;
}

.btn-lg {
    font-size: 1.2rem;
    padding: 15px 25px;
}

@media (max-width: 768px) {
    .btn {
        font-size: 1rem;
        padding: 10px 15px;
    }

    .table th,
    .table td {
        padding: 10px;
    }
}
</style>
