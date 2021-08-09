<template>
    <Layout>
        <main>
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1>Novo projeto</h1>
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
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Criar projeto</button>
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
        errors: Object,
    },
    data: () => ({
        form: {
            name: null,
            start_date: null,
            end_date: null,
        }
    }),
    methods:{
        handleForm(){
            this.$inertia.post( route('project.store') , this.form)
        }
    }
}
</script>

<style scoped>

</style>