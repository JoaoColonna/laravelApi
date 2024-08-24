Aqui está um exemplo de README.md para o seu projeto, incluindo instruções sobre como instalar e rodar o projeto com uma instância local de MySQL.

---

# Weather Data Project

Este projeto é uma aplicação Laravel que exibe dados meteorológicos usando a API OpenWeatherMap. O projeto inclui funcionalidades para buscar dados meteorológicos com base em coordenadas e exibir esses dados em uma tabela utilizando Laravel, Livewire e Bootstrap.

## Requisitos

- PHP 8.0 ou superior
- Composer
- Node.js e npm
- MySQL (ou MariaDB)

## Instalação

Siga os passos abaixo para configurar e rodar o projeto em sua máquina local.

### 1. Clonar o Repositório

Clone o repositório do projeto:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2. Instalar Dependências

Instale as dependências do PHP usando o Composer:

```bash
composer install
```

Instale as dependências do Node.js usando o npm:

```bash
npm install
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
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Criar o Banco de Dados

Antes de rodar as migrations, crie o banco de dados usando uma ferramenta de gerenciamento de banco de dados ou via linha de comando MySQL:

```sql
CREATE DATABASE nome_do_banco_de_dados;
```

### 5. Rodar as Migrations

Execute as migrations para criar as tabelas necessárias no banco de dados:

```bash
php artisan migrate
```

### 6. Compilar os Assets

Compile os assets (CSS, JavaScript) com o Laravel Mix:

```bash
npm run dev
```

### 7. Configurar a API Key

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
http://127.0.0.1:8000
```

### 10. Rotas Disponíveis

- **Buscar Dados Meteorológicos**: `GET /api-weather/{lat}/{lon}`
  - Exemplo: `http://127.0.0.1:8000/api-weather/33.44/-94.04`
- **Exibir Tabela de Dados Meteorológicos**: `GET /`
  - Exibe uma tabela com os dados meteorológicos salvos no banco de dados.

## Contribuindo

Se você encontrar problemas ou quiser contribuir para o projeto, por favor, abra um [issue](https://github.com/seu-usuario/seu-repositorio/issues) ou envie um pull request.

## Licença

Este projeto está licenciado sob a MIT License - veja o [LICENSE](LICENSE) para detalhes.

---
