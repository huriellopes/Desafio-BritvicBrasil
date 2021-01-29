# Desafio para vaga de "Analista Web" na Britvic Brasil

> Projeto é um desafio para a empresa britânica "Britvic", com o intuito de avaliar o nível de proficiência técnica e de resolução de problemas, foi proposto o Desenvolvimento de um sistema de reservas de veículos usando o Laravel Framework e Vue.JS!

## ⚠ Requisitos:

- PHP >= 7.2.5
- Node.Js >= 12.13.1
- NPM >= 6.13.4
- PostgreSQL >= 12.2
- Docker e Docker Compose (opcional)

##### Deve ter o ambiente para o laravel configurado:

- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Modelagem do Banco de Dados

![modeling](.gitImage/modelagem.png)

## ⚡ Mão na massa:

> Você pode realizar o clone deste repositório ou baixar o arquivo .zip!

##### Clone este repositório:

````
git clone https://github.com/huriellopes/Desafio-BritvicBrasil.git
````

Para baixar o zip: [https://github.com/huriellopes/Desafio-BritvicBrasil/archive/master.zip](https://github.com/huriellopes/Desafio-BritvicBrasil/archive/main.zip)

## ✔ Executando a aplicação:

##### Na raiz do projeto, execute os comandos:

````
# Para instalar as dependências do Laravel
componser install

# Para instalar as dependecias do node_modules
npm install && npm run dev
```` 

##### Copie e configure as variaveis de ambiente no arquivo .env:

````
# Para copiar o .env.example para .env
copy .env.example .env ou cp .env.example .env

# Para gerar a key do projeto
php artisan key:generate

# configure as seguintes variaveis de ambiente
DB_CONNECTION=pgsql # default = mysql
DB_HOST=127.0.0.1 ou db (container do doker)
DB_PORT=5432 # default = 3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Atenção: Deve ser PostgreSQL e lembre-se de criar o schema/banco!
````

#### Caso queira utilizar docker, rode o seguinte comando:

````
copy docker-compose.example.yml docker-compose.yml ou cp docker-compose.example.yml docker-compose.yml
````

#### Depois configure as variaveis de ambiente no docker compose

````
    environment:
      POSTGRES_USER: "postgres"
      POSTGRES_PASSWORD: "YOUR_PASSWORD"
      POSTGRES_DB: "DATABASE_NAME"

    # O banco de dados está isolado, apenas a aplicação acessa!
````

##### Depois de configurar as variaveis de ambiente, ainda no raiz do projeto, execute os comandos:

````
# Para rodar as migrates e seeds
php artisan migrate --seed

# Caso queira desafazer
php artisan migrate:rollback

# Para rodar o servidor embutido => Caso opte por rodar localmente.
php artisan serve

# Irá executar na seguinte url, abra no navegador
http://localhost:8000

> Caso opte por rodar no docker, acesse no navegador:
http://localhost
````

## Créditos

Empresa Britvic Brasil - Pelo desafio proposto [Site da Empresa](https://www.britvic.com/our-brands/brazil/brazil-portfolio)

## 📝 Licença

Este repositório está sob a linceça MIT. Veja aqui [Licença](license)
