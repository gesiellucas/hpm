<script>
export default {
    data() {
        return {

        }
    },
    methods: {
        async uploadFile(event) {
            let file = event.target.files[0]
            let formData = new FormData()
            let config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            formData.append('csv', file)
            return await axios.post('/insertcsv', formData, config)
            .then( res => {
                console.log(res)
            })
        }
    }
}
</script>
<template>
    <main class="text-center p-4 container">
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <div class="button-group d-flex justify-content-end">
                    <a href="/pesquisa" class="btn btn-light shadow-4">
                        Voltar
                    </a>
                </div>
                <form action="#">
                    <h4 class="w-75 mx-auto">Ganhe tempo enviando mais pacientes de uma única vez.</h4>
                    <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
                        <input class="list-group-item-check pe-none" type="file" name="listGroupCheckableRadios"
                            id="listGroupCheckableRadios1" @change="uploadFile" checked>
                        <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">
                            Importar dados de arquivo .csv
                            <span class="d-block small opacity-50">Clique aqui para pesquisar o arquivo em seu dispositivo.</span>
                        </label>

                        <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios"
                            id="listGroupCheckableRadios2" value="">
                        <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios2">
                            Download de .csv exemplo
                            <span class="d-block small opacity-50">Veja qual modelo seguir para tudo funcionar bem. <br> Não altere a ordem.</span>
                        </label>
                    </div>
                </form>
            </div>
        </div>

    </main>
</template>

<style scoped>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}

.list-group {
    max-width: 460px;
    margin: 1rem auto;
}

.form-check-input:checked+.form-checked-content {
    opacity: .5;
}

.form-check-input-placeholder {
    border-style: dashed;
}

[contenteditable]:focus {
    outline: 0;
}

.list-group-checkable .list-group-item {
    cursor: pointer;
}

.list-group-item-check {
    position: absolute;
    clip: rect(0, 0, 0, 0);
}

.list-group-item-check:hover+.list-group-item {
    background-color: var(--bs-light);
}

.list-group-item-check:checked+.list-group-item {
    color: #fff;
    background-color: var(--bs-blue);
}

.list-group-item-check[disabled]+.list-group-item,
.list-group-item-check:disabled+.list-group-item {
    pointer-events: none;
    filter: none;
    opacity: .5;
}

.list-group-radio .list-group-item {
    cursor: pointer;
    border-radius: .5rem;
}

.list-group-radio .form-check-input {
    z-index: 2;
    margin-top: -.5em;
}

.list-group-radio .list-group-item:hover,
.list-group-radio .list-group-item:focus {
    background-color: var(--bs-light);
}

.list-group-radio .form-check-input:checked+.list-group-item {
    background-color: var(--bs-body);
    border-color: var(--bs-blue);
    box-shadow: 0 0 0 2px var(--bs-blue);
}

.list-group-radio .form-check-input[disabled]+.list-group-item,
.list-group-radio .form-check-input:disabled+.list-group-item {
    pointer-events: none;
    filter: none;
    opacity: .5;
}
.card {
    background: var(--gdt-card)
}
</style>
