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

### Endpoints

### Autor
[Luiz Felipe M. Galindo](https://github.com/lfgalindo) <<lfgalindo@live.com>>
