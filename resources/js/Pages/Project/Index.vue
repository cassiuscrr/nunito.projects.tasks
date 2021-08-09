<template>
    <Layout>
        <main>
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1>Projetos</h1>
                </div>
                <div class="col">
                    <Link :href="route('project.new')" class="btn btn-primary btn-sm">Criar um novo projeto</Link>
                </div>
            </div>
            <section class="table-responsive" v-if="projects.data.length > 0">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th nowrap scope="col">ID</th>
                            <th nowrap scope="col">Nome</th>
                            <th nowrap scope="col">Início</th>
                            <th nowrap scope="col">Previsão Finalizar</th>
                            <th nowrap scope="col">Progresso</th>
                            <th nowrap scope="col">Estado</th>
                            <th nowrap scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="p in projects.data" :key="p.id">
                            <td nowrap scope="row">{{p.id}}</td>
                            <td nowrap>
                                <Link :href="route('project.show', { id: p.id })">{{p.name}}</Link>
                            </td>
                            <td nowrap>{{ p.start_date_br }}</td>
                            <td nowrap>{{ p.end_date_br }}</td>
                            <td nowrap>
                                <Progress :total="p.tasks_all" :partial="p.tasks_finished" />
                            </td>
                            <td nowrap>{{ p.state }}</td>
                            <td nowrap>
                                <Link :href="route('project.show', { id: p.id })" class="btn btn-primary">Abrir projeto</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>                
            </section>
            <div>
                <Pagination :data="projects"/>
            </div>
        </main>
    </Layout>
</template>

<script>
import Layout from '../../Layout'
import Pagination from '../../Shared/Pagination'
import Progress from '../../Shared/Progress'
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components:{
        Layout, Link, Pagination, Progress
    },
    props:{
        projects: Object,
    }
}
</script>

<style scoped>
section{
    background: white;
    border-radius: 6px;
}
td, th{
    padding:20px 1.5rem;
    vertical-align:middle;
}
a:not(.btn){
    color:var(--bs-secundary);
}
</style>