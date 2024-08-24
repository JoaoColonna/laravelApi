# Weather Data Project

Este projeto é uma aplicação Laravel que exibe dados meteorológicos usando a API OpenWeatherMap. O projeto inclui funcionalidades para buscar dados meteorológicos com base em coordenadas e exibir esses dados em uma tabela utilizando Laravel, Jquery e Bootstrap.

## Requisitos

- PHP 8.0 ou superior
- Composer
- MySQL (ou MariaDB)

## Instalação

Siga os passos abaixo para configurar e rodar o projeto em sua máquina local.

### 1. Clonar o Repositório

Clone o repositório do projeto:

```bash
git clone https://github.com/JoaoColonna/laravelApi.git
```

### 2. Instalar Dependências

Instale as dependências do PHP usando o Composer:

```bash
composer install
```

### 3. Configurar o Ambiente

Crie um arquivo `.env` na raiz do projeto a partir do arquivo de exemplo:

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as variáveis de ambiente para a conexão com o banco de dados. Atualize os valores conforme sua configuração local de MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelapi
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Criar o Banco de Dados

Antes de rodar as migrations, crie o banco de dados usando uma ferramenta de gerenciamento de banco de dados ou via linha de comando MySQL:

```sql
CREATE DATABASE laravelapi;
```

### 5. Rodar as Migrations

Execute as migrations para criar as tabelas necessárias no banco de dados:

```bash
php artisan migrate
```

### 6. Configurar a API Key

No arquivo `.env`, adicione sua chave de API do OpenWeatherMap:

```env
API_WEATHER_KEY=sua_chave_de_api
```

### 8. Rodar o Servidor Local

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

### 9. Acessar a Aplicação

Abra o navegador e acesse a aplicação através do endereço:

```
http://127.0.0.1:8000/weather
```

### 10. Rotas Disponíveis

- **Buscar Dados Meteorológicos**: `GET /api-weather/{lat}/{lon}`
  - Exemplo: `http://127.0.0.1:8000/api-weather/33.44/-94.04`
- **Exibir Tabela de Dados Meteorológicos**: `GET /weather`
  - Exibe uma tabela com os dados meteorológicos salvos no banco de dados.

---
