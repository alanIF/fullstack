# Desafio LessClick de Seleção
	Passo a Passo para execução do projeto:
	* Execute no seu banco de dados o arquivo bd/bd.sql 
	* Abre o terminal na pasta projeto.
	* Execute o comando : 
		php artisan migrate
	* Execute o comando que criará o usuario administrador padrao inicial: 
		php artisan db:seed
	* O usuário para login  é : email: administrador@gmail.com senha : 123456
	* Execute o comando para rodar a aplicação: 
		php artisan serve