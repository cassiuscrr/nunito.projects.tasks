<template>
    <Layout>
        <main>
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1>Editar projeto</h1>
                </div>
            </div>
            <section>
                <form @submit.prevent="handleForm">
                    <div class="row my-3">
                        <div class="col-6">
                            <label for="input_name" class="form-label">Nome do projeto*</label>
                            <input type="text" class="form-control" id="input_name" v-model="form.name">
                        </div>
                        <div class="col-6">
                            <div class="alert alert-danger" role="alert" v-if="errors.name">
                            Nome é obrigatório e requer sua atenção
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
                    <div class="row my-4">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary me-4">Salvar projeto</button>
                            <a href="" @click.prevent="back">Cancelar</a>
                        </div>

                        <div class="col-3 text-end">
                            <a href="" class="btn btn-danger mb-4" @click.prevent="buttomDelete">Apagar projeto</a>
                            <div v-if="bottom.delete">
                                <a href="" @click.prevent="destroy" class="btn btn-danger me-4" >Confirmar</a>
                                <a href="" @click="buttomDelete">Cancelar</a>
                            </div>
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
            id:null,
            name: null,
            start_date: null,
            end_date: null,
        },
        bottom:{
            delete: false,
        }
    }),
    created: function(){
        this.form.id = this.project.id
        this.form.name = this.project.name
        this.form.start_date = this.project.start_date
        this.form.end_date = this.project.end_date
    },
    methods:{
        handleForm(){
            this.$inertia.put( route( 'project.update', {id: this.form.id} ) , this.form)
        },
        buttomDelete(){
            this.bottom.delete = !this.bottom.delete
        },
        back(){
            this.$inertia.get( route( 'project.show', {id: this.form.id} ))
        },
        destroy(){
            this.$inertia.delete( route( 'project.delete', {id: this.form.id} ))
        },
    }
}
</script>

<style scoped>
a:not(.btn){
    color: var(--color-default);
}
</style>