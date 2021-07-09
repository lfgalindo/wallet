## Wallet

Um jeito facil de enviar dinheiro para seu amigos.

### Requisitos
- **[Docker](https://docker.com/)** instalado e executando.
- **[docker-compose](https://docs.docker.com/compose/)** instalado.

### Instalação
Para realizar a instalação, utilizando o Docker, siga as instruções abaixo:
```
# Clone o repositório
git clone https://github.com/lfgalindo/wallet

# Entre na pasta do projeto e crie o arquivo *.env*
cd wallet && cp .env.example .env
   
# Se alterar as configurações de acesso ao banco de dados no arquivo *.env*,
# você precisará alterar também o arquivo a seguir
vim docker/prod/docker-compose.yml

# Crie os containers
docker-compose -f docker/prod/docker-compose.yml up --build -d

# Crie as tabelas do banco de dados
docker exec -ti api-sms php artisan migrate

# Concluído!!!
```

### Containers
- wallet-api ```php:7.4.21-fpm-alpine3.13```
- wallet-queue ```php:7.4.21-fpm-alpine3.13```
- wallet-nginx ```php:7.4.21-fpm-alpine3.13```
- wallet-db ```mysql```

### Modelagem do banco de dados

<img src="https://github.com/lfgalindo/wallet/blob/488e19290945abd88122223b27985a2fda1cb767/docs/mer.png" />

### Endpoints

A documentação dos endpoints foi criada utilizando a ferramenta Postman. [Clique aqui](https://documenter.getpostman.com/view/13008741/Tzm6mwHD) para ver a documentação completa.

#### ```POST``` **/api/user**
Realiza o cadastro de um novo usuário.

#### ```POST``` **/api/transaction**
Realiza uma transferência de dinheiro entre usuários.

### Autor
[Luiz Felipe M. Galindo](https://github.com/lfgalindo) <<lfgalindo@live.com>>
