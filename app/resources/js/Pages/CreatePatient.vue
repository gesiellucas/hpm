<script>
export default {
    data() {
        return {
            zipcode: '',
            viaCepBase: 'https://viacep.com.br/ws/',
            address: {
                street:'',
                neighborhood:'',
                city:'',
                state:''
            }
        }
    },
    methods: {
        async handleViaCep(value){
            if(value.length > 7){
                const viacep = `${this.viaCepBase}${value}/json/`
                return await axios.request({
                    url: viacep,
                    method: 'get',
                    headers: {},
                    withCredentials: false
                })
                .then(res => {
                    this.address.street = res.data.logradouro
                    this.address.neighborhood = res.data.bairro
                    this.address.city = res.data.localidade
                    this.address.state = res.data.uf
                    console.log(res)
                })
            }
        }
    }
}
</script>
<template>
    <div class="card p-3 m-4 w-75 mx-auto">
        <div class="card-body">
            <h2 class="display-6"> Cadastro de Pacientes</h2>
            <form action="#" method="post">
                <section id="patient">
                    <p class="py-2"><b>Dados pessoais</b></p>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Nome Completo"
                                    required>
                                <label for="fullname">Nome Completo:</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="mothername" class="form-control" placeholder="Nome da mãe"
                                    required>
                                <label for="mothername">Nome da mãe:</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Data de nascimento:</label>
                        <input type="date" name="birthday" class="form-control" required>
                    </div>

                    <div class="row my-4">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="cpf" id="birthday" class="form-control"
                                    placeholder="xxx.xxx.xxx-xx" required>
                                <label for="birthday">CPF:</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="cns" class="form-control" placeholder="xxxxxxxxx" required>
                                <label for="birthday">CNS:</label>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="address-patient" class="row">
                    <p class="py-2"><b>Endereço</b></p>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="zipcode" :model="zipcode" id="zipcode" class="form-control"
                                placeholder="xxxxx-xxx" required @input="event => this.handleViaCep(event.target.value)">
                            <label for="zipcode">CEP:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="street" :value="address.street" id="street" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="street">Logradouro:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="number" id="number" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="number">Número:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="complement" id="numero" class="form-control"
                                placeholder="xxxxx-xxx" required>
                            <label for="numero">Complemento:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="neighborhood" :value="address.neighborhood" id="neighborhood" class="form-control"
                                placeholder="xxxxx-xxx" required>
                            <label for="neighborhood">Bairro:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="city" :value="address.city" id="city" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="city">Cidade:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="state" :value="address.state" id="state" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="state">Estado:</label>
                        </div>
                    </div>
                </section>
            </form>
        </div>

        <div class="card-footer d-flex justify-content-end align-item-center">
            <a href="/pesquisa" class="btn-outline-primary btn mx-3">
                Voltar
            </a>

            <button class="btn-primary btn">
                Finalizar cadastro
            </button>
        </div>

    </div>
</template>
