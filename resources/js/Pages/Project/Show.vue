<template>
    <Layout>
        <main>
            <div>Visão geral:</div>
            <div class="row align-items-center">
                <div class="col-auto">                    
                    <h1>{{ project.name }}</h1>
                </div>
                <div class="col">
                    <Link :href="route('project.edit', { id: project.id })" class="btn btn-primary btn-sm">
                        Editar projeto
                    </Link>
                </div>
            </div>
            <div class="bg-white p-4 rounded">
                <div class="row">
                    <div class="col">
                        <div class="small bold mb-1">Início do Projeto</div>
                        <div>{{ project.start_date_br }}</div>
                    </div>
                    <div class="col">
                        <div class="small bold mb-1">Finalizar em</div>
                        <div>{{ project.end_date_br }}</div>
                    </div>
                    <div class="col">
                        <div class="small bold mb-1">Estado</div>
                        <div>
                            {{ project.state }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="small bold mb-1">Progresso Atual</div>
                        <div>
                            <Progress :total="project.tasks_all" :partial="project.tasks_finished"/>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="row align-items-center mb-4">
                    <div class="col-auto">                    
                        <h3>Tarefas</h3>
                    </div>
                    <div class="col">
                        <Link :href="route('task.new',{ id_project: project.id })" class="btn btn-primary btn-sm">Criar tarefa</Link>
                    </div>
                </div>

                <div class="row bg-white rounded mb-2 p-2 align-items-top" v-for="task in tasks.data" :key="task.id">
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" :checked="task.is_finished" @click.prevent="checkUpdate( task )">
                        </div>
                    </div>
                    <div class="col">
                        {{ task.name }}
                    </div>
                    <div class="col-auto">
                        <Link :href="route('task.edit',{ id_project: project.id, id: task.id  })" class="btn btn-primary btn-sm">Editar tarefa</Link>
                    </div>
                </div>
                <div>
                    <Pagination :data="tasks"/>
                </div>
            </section>
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
        Layout, Link, Progress, Pagination
    },
    props:{
        project: Object,
        tasks: Object,
    },
    methods:{
        checkUpdate( task ){
            task.is_finished = !task.is_finished
            this.$inertia.put( route( 'task.update', {id: task.id} ) , task)
        }
    }
}
</script>