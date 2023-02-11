# Sistema de Busca Otimizada

> Desenvolver um cadastro de pacientes para validar meus conhecimentos na área, como esse é o único requisito irei criar como se estivesse trabalhando em um projeto real. Sendo assim apresento o sistema para o **Hospital Pediátrico Mineiro**. (nome fictício). 

O sistema do Hospital Pediátrico Mineiro auxilia médicos e funcionários a encontrar informações dos pacientes de forma rápida e precisa.

### Demanda

A demanda vem da necessidade de aposentar o uso de papéis do hospital dando espaço para tecnologia, preservando o meio ambiente e criando mais segurança aos dados dos pacientes. 

**Público Alvo**

O sistema será utilizado por pessoas de 18 à 60 anos de idade que atuam na área da hospitalar, seja na portaria, enfermeiros, médicos, secretárias. Portanto a atualização precisa ser rápida para manter os dados sincronizados.

**Metodologia**

Irei utilizar o método Kanban para organização do produto, tendo agrupamentos de Para Fazer, Executamdo, Teste, Ajuste, Feito. 

Os commits precisam seguir alguma regra, irei utilizar conventional commit como base.

**Banco de dados**
|Dados|Referência|Validacao|
|---|---|:---|
|Nome completo do paciente|name|No|
|Nome completo da mãe|parent|Yes|
|Data de nascimento|birthday|Yes|
|CPF|cpf|[Validador de CPF pt-br](https://github.com/LaravelLegends/pt-br-validator)|
|CNS |cns|[Validador de CNS](https://integracao.esusab.ufsc.br/ledi/documentacao/regras/algoritmo_CNS.html)|
|Endereço completo|address|[ViaCep](https://viacep.com.br/)|

**Arquitetura**

Tecnologias obrigatórias
- PHP (Laravel)
- PHP Unit
- Laravel Horizon
- Supervisord
- Elasticsearch
- Paginação
- Docker
- Docker-compose
- Redis
- Postgres

Funcionalidades
- Importação de CSV
- Insomnia collections com o nome de endpoints.json
- README com tutorial de como utilizar a plataforma

### MVP
O mínimo viável desse produto é que ele consiga listar pacientes, cadastrar, modificar ou apagar. Para isso será concluído primeiro, depois da arquitetura é claro, o CRUD em laravel e Vuejs.

#### *Referências*
[Conventional Commit](https://www.conventionalcommits.org/en/v1.0.0/)

[Error on Redis Docker](https://r-future.github.io/post/how-to-fix-redis-warnings-with-docker/)

[Config Nginx](https://medium.com/@vhsilva.ap/configurando-laravel-6-nginx-e-postgresql-com-docker-9ad29c53d5)

[Password Redis](https://aregsar.com/blog/2020/laravel-app-with-redis-in-docker/)

[Denied Redis connection](https://github.com/redis/redis/issues/3106)

[Elasticsearch Overview](https://madewithlove.com/blog/software-engineering/how-to-integrate-elasticsearch-in-your-laravel-app-2022/)