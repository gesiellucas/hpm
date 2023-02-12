<script>

export default {
    data() {
        return {
            items: [],
            server: 'http://localhost:8000/',
            searchresult: ''
        }
    },
    methods: {
        async getPatients(name = null){
            if(name) {
                return await axios.get(`${this.server}users?name=${name}`).then( res => {
                    console.log(res)
                    if(res.data) {
                        this.items = res.data
                    }
                })
            } else {
                return await axios.get(`${this.server}users`).then( res => {
                    if(res.data) {
                        this.items = res.data
                    }
                })
            }

        }
    },
    mounted(){
        this.getPatients()
    }
}

</script>

<template>
    <section class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h1>Pesquisar paciente</h1>
                        <a href="/cadastro" class="btn btn-success">
                            Adicionar paciente
                        </a>
                    </div>
                </div>
                <input class="form-control form-control-lg" type="text" placeholder="Digite o nome do paciente..." aria-label=".form-control-lg example" :model="searchresult" @input="event => this.getPatients(event.target.value)"/>
            </div>
            <p>{{ searchresult }}</p>
        </div>

        <section class="results row container justify-content-center p-4">
            <div class="card unique-card m-1" v-for="(item, index) in this.items">
                <div class="card-body">
                    <h4>{{ item.fullname }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <img src="https://cdn.pixabay.com/photo/2014/06/03/19/38/board-361516__340.jpg" alt="test" width="200"  height="160">
                        </div>
                        <div class="col-12">
                            <p>Nome da Mae: {{ item.mothername }}</p>
                            <p>Idade: 5 anos</p>
                            <p>{{ item.birthday }}</p>
                            <p>CPF: {{ item.cpf }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>CNS: {{ item.cns }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p>{{ item.street + ' - '+ item.number }}</p>
                            <p>{{ item.city + '/'+ item.state }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-around">
                            <a :href="'/editar/'+item.id" class="btn btn-sm btn-danger">EDITAR</a>
                            <a :href="'/delete/'+item.id" class="btn btn-sm btn-danger">APAGAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
</template>
<style scoped>
.unique-card {
    width: 250px;
}
</style>
