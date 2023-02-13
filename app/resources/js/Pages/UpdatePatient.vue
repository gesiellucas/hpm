<script>
import { usePage } from '@inertiajs/vue3'

export default {
    props: ['datapatient'],
    data() {
        return {
            zipcode: '',
            viaCepBase: 'https://viacep.com.br/ws/',
            address: {
                street: '',
                neighborhood: '',
                city: '',
                state: '',
                zipcode: '',
                number: '',
                complement: ''
            },
            patient: {
                fullname: '',
                mothername: '',
                birthday: '',
                cpf: '',
                cns: '',
                picprofile: ''
            }
        }
    },
    methods: {
        async handleViaCep(value) {
            if (value.length > 7) {
                const viacep = `${this.viaCepBase}${value}/json/`
                return await axios.request({
                    url: viacep,
                    method: 'get',
                    withCredentials: false
                })
                .then(res => {
                    if (res.data.erro) return false

                    this.address.street = res.data.logradouro
                    this.address.neighborhood = res.data.bairro
                    this.address.city = res.data.localidade
                    this.address.state = res.data.uf
                    this.address.zipcode = value
                })
            }
        },
        async updatePatient(){
            let data =  new FormData()
            let config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            data.append('picprofile', this.patient.picprofile)
            data.append('fullname', this.patient.fullname)
            data.append('mothername', this.patient.mothername)
            data.append('birthday', this.patient.birthday),
            data.append('cpf', this.patient.cpf)
            data.append('cns', this.patient.cns)
            data.append('street', this.address.street)
            data.append('number', this.address.number)
            data.append('complement', this.address.complement)
            data.append('neighborhood', this.address.neighborhood)
            data.append('city', this.address.city)
            data.append('state', this.address.state)
            data.append('zipcode', this.address.zipcode)

            return await axios.post('/update-patient', data, config)
            .then(res => {
                console.log(res)
                if(res.status == 200){
                    window.location = '/pesquisa'
                }
            })
            .catch(err => console.log(err))
        }
    },
    computed: {
        respatient(){
            return this.datapatient
        }
    }
}
</script>
<template>
    <div class="card p-3 m-4 w-75 mx-auto">
        <div class="card-body">
            <h2 class="display-6"> Editar paciente</h2>
            <form action="#" method="post">
                <input type="hidden" :value="respatient.id" name="patient_id">
                <section id="patient">
                    <p class="py-2"><b>Dados pessoais</b></p>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Nome Completo"
                                    required :value="respatient.fullname">
                                <label for="fullname">Nome Completo:</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="mothername" class="form-control" placeholder="Nome da mãe"
                                    required :value="respatient.mothername">
                                <label for="mothername">Nome da mãe:</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Data de nascimento:</label>
                        <input type="date" name="birthday" :value="respatient.birthday" class="form-control" required>
                    </div>

                    <div class="row my-4">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="cpf" id="birthday" :value="respatient.cpf" class="form-control"
                                    placeholder="xxx.xxx.xxx-xx" required>
                                <label for="birthday">CPF:</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="cns" :value="respatient.cns" class="form-control" placeholder="xxxxxxxxx" required>
                                <label for="birthday">CNS:</label>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="media">
                    <p class="py-2"><b>Foto do Paciente</b></p>
                    <div class="mb-3">
                        <label for="picprofile" class="form-label">Insira uma imagem do paciente</label>
                        <input class="form-control" type="file" :value="respatient.picprofile" id="picprofile" name="picprofile"
                            @change="event => this.patient.picprofile = event.target.files[0]">
                    </div>
                </section>

                <section id="address-patient" class="row">
                    <p class="py-2"><b>Endereço</b></p>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="zipcode" id="zipcode" class="form-control"
                                placeholder="xxxxx-xxx" required :value="respatient.zipcode">
                            <label for="zipcode">CEP:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="street" id="street" :value="respatient.street" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="street">Logradouro:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="number" name="number" :value="respatient.number" id="number" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="number">Número:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="complement" :value="respatient.complement" id="numero" class="form-control"
                                placeholder="xxxxx-xxx" required>
                            <label for="numero">Complemento:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="neighborhood" :value="respatient.neighborhood" id="neighborhood" class="form-control"
                                placeholder="xxxxx-xxx" required>
                            <label for="neighborhood">Bairro:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="city" id="city" :value="respatient.city" class="form-control" placeholder="xxxxx-xxx"
                                required>
                            <label for="city">Cidade:</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="state" id="state" :value="respatient.state" class="form-control" placeholder="xxxxx-xxx"
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
                Atualizar cadastro
            </button>
        </div>

    </div>
</template>
<style>
.card {
    background: var(--gdt-card)
}
</style>
