<template>
    <Layout>
        <main>
            <h1>Resumo dos projetos</h1>

            <section>
                <Link v-for="p in projects.data" :key="p.id" :href="route('project.show', { id: p.id })" class="dashboard-box row">
                    <div class="col-12 bold">{{p.name}}</div>
                    <div class="col-12">
                        <span class="badge bg-primary me-2">Inicio em {{ p.start_date_br }}</span>
                        <span class="badge bg-success me-2">Previsão de termino em {{ p.end_date_br }}</span>
                        <span class="badge bg-danger me-2" v-if="p.diff > 0">Atrasado à {{  (p.diff == 1) ? `${p.diff} dia` : `${p.diff} dias` }}</span>
                    </div>
                </Link>
            </section>
        </main>
    </Layout>
</template>

<script>
import Layout from '../Layout'
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components:{
        Layout, Link
    },
    props:{
        projects: Object,
    }
}
</script>

<style scoped>
a{
    display: block;
    margin:1rem 0px;
    background: white;
    padding: 1.5rem;
    border:1px solid white;
    border-radius: 6px;
    text-decoration: none;
    color: initial;
}
a:hover{
    border:1px solid var(--gray-900);
}
.bold{
    font-weight:600;
}
</style>