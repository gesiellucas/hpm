<template>
    <main class="text-center p-4 banner">
        <video autoplay muted loop>
            <source src="/videos/background.mp4" type="video/mp4">
        </video>
        <div class="content">
            <h3 class="">Teste de habilidades</h3>
            <p class="w-75 mx-auto"><small>Desenvolver um cadastro de pacientes para validar meus conhecimentos na área,
                    como esse é o único requisito irei criar como se estivesse trabalhando em um projeto real. Sendo
                    assim apresento o sistema para o <b>Hospital Pediátrico Mineiro</b>. (nome fictício).</small></p>
            <div class="px-4 py-5 my-3 text-center">

                <h1 class="display-5 fw-bold">Hospital Pediátrico Mineiro</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">O sistema do Hospital Pediátrico Mineiro auxilia médicos e funcionários a
                        encontrar informações dos pacientes de forma rápida e precisa.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="/pesquisa" type="button" class="btn search-button btn-lg px-4 gap-3">Pesquisar
                            pacientes</a>
                        <a href="/cadastro" type="button" class="btn btn-outline-light btn-lg px-4">Cadastrar
                            Pacientes</a>
                    </div>
                    <a href="/csv" type="button" class="py-3 btn btn-link">Importar arquivos .csv</a>
                </div>
            </div>
        </div>

    </main>

</template>
<style>
.banner {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.banner video {
    filter: brightness(30%);
    position: fixed;
    top: 0;
    left: 0;
    object-fit: cover;
    width: 100%;
}
.banner .content {
  position: relative;
  z-index: 1;
  max-width: 1000px;
  margin: 0 auto;
  text-align: center;
}
.search-button {
    background: var(--gdt-primary);
    color:white;
    box-shadow: 0px 0px 10px 1px #0081a7;
}
</style>
