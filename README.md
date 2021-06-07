#### Pré requisitos
* Ter o [Docker](https://docs.docker.com/install/linux/docker-ce/debian/) na máquina que irá subir o projeto.
* Ter o [Docker Compose](https://docs.docker.com/compose/install/) na máquina que irá subir o projeto.

#### Instalação
1. Rodar o comando abaixo para subir os containers necessários: 
```sh
$ docker-compose up -d
```
2. Rodar o comando abaixo para instalar as dependências do projeto: 
```sh
$ docker run  --rm  --volume $PWD:/app --user $(id -u):$(id -g)   composer install --ignore-platform-reqs
```
3. Alterar as permissões do diretorio var:
```sh
$ docker exec -it web_cadastro_cliente chmod 777 -R /app/var
``` 
4. Criar o schema do banco de dados
```sh
$ docker exec -it  web_cadastro_cliente php bin/console doctrine:schema:create
```
Após efetuar esses passos, acessar o seguinte endereço em seu navegador: http://localhost
