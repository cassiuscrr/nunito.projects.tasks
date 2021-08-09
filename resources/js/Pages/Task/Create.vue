<template>
    <Layout>
        <main>
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1>Nova tarefa</h1>
                    <div class="small">Vinculada à {{ project.name }}</div> 
                </div>
            </div>
            <section>

                <form @submit.prevent="handleForm">
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="input_name" class="form-label">Tarefa*</label>
                            <input type="text" class="form-control" id="input_name" v-model="form.name">
                        </div>
                        <div class="col-6">
                            <div class="alert alert-danger" role="alert" v-if="errors.name">
                               Tarefa é obrigatório e requer sua atenção
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="input_start_date" class="form-label">Data de inicio*</label>
                            <input type="date" class="form-control" id="input_start_date" v-model="form.start_date">
                        </div>
                        <div class="col-6">
                            <div class="alert alert-danger" role="alert" v-if="errors.start_date">
                            Data é obrigatório e requer sua atenção
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-6">
                            <label for="input_end_date" class="form-label">Previsão de termíno*</label>
                            <input type="date" class="form-control" id="input_end_date"  v-model="form.end_date" :min="form.start_date">
                        </div>
                        <div class="col-6">
                            <div class="alert alert-danger" role="alert" v-if="errors.end_date">
                            Data é obrigatório e requer sua atenção
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" :checked="form.is_finished" v-model="form.is_finished" id="input_is_finished">
                            <label class="form-check-label" for="input_is_finished">
                                Marcar como finalizado.
                            </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="alert alert-danger" role="alert" v-if="errors.is_finished">
                            {{ errors.is_finished }}
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Criar tarefa</button>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </Layout>
</template>

<script>
import Layout from '../../Layout'
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components:{
        Layout, Link
    },
    props:{
        project: Object,
        errors: Object,
    },
    data: () => ({
        form: {
            project_id: null,
            name: null,
            start_date: null,
            end_date: null,
            is_finished: false,
        } 
    }),
    created: function(){
        this.form.project_id = this.project.id
    },
    methods:{
        handleForm(){
            this.$inertia.post('/task', this.form)
        }
    }
}
</script>

<style scoped>

</style>