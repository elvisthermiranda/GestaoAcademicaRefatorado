## Projeto Gestão Acadêmica
#### Tecnologias Utilizadas

 - **Back-End**
	 - PHP 8.0.2 (Linguagem de Programação)
	 - Laravel 9.0 (Framework)
	 - MySql 5.7.33 (Banco de Dados)
	 - Composer 2.0.11 (Gerenciador de Pacotes)
- **Front-End**
	 - HTML 5, CSS3 e JavaScript (Linguagens)
	 - Bootstrap 4.6 (Biblioteca CSS)
	 - jQuery (Biblioteca JS - Versão dependente do Bootstrap)
	 - Popper.js (Biblioteca JS - Versão dependente do Bootstrap)
	 - Npm 6.14.12 (Gerenciador de Pacotes - Requer Node instalado)

#### Instalando o Projeto

 - **Requisitos**
	 - Git instalado na máquina
	 - Composer instalado na máquina
	 - Node.JS e NPM instalados na máquina
	 - MySql instalado na máquina

Abra o terminal em uma pasta escolhida (Ex: Documentos) e execute o comando de clonagem de repositórios:

`git clone https://github.com/elvisthermiranda/GestaoAcademicaRefatorado.git`

Entre na pasta onde o projeto foi instalado e execute o comando de instalação de dependências do composer:

`composer update`

Ainda na pasta root, execute o comando de instalação de dependências do npm:

`npm update`

Para compilar os arquivos do Front-End do projeto, execute o seguinte comando:

`npm run dev` ou `npm run watch`

Lembre-se de criar o arquivo `.env`. Este arquivo é responsável por definir as variáveis de ambiente. Sem este arquivo criado, o banco de dados não será conectado a aplicação e irá estourar um erro 500 na tela ao rodar o servidor. Copie o arquivo `.env.example` na pasta root e cole, trocando seu nome para `.env`, e após configue as variáveis do banco de acordo com os dados vigentes na sua máquina:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestao_academica
DB_USERNAME=root
DB_PASSWORD=
```

Após tudo configurado, execute o comando que faz rodar o servidor da aplicação:
`php artisan serve`

#### Documentação
   - Laravel 9: https://laravel.com/docs/9.x
