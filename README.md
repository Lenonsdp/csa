
### Configurando o Tabex
# Tabex

Aplicação desenvolvida em php, utilizando framework laravel.

## Sumário

- [Tabex](#tabex)
	- [Sumário](#sumário)
	- [Instalação](#instalação)
		- [Pré-requisitos](#pré-requisitos)
			- [Construção](#construção)
			- [Rotas](#rotas)

## Instalação

Para utilizar o sistema Tabex, você precisa atender os [pré-requisitos](#pré-requisitos) e, em seguida, configura-lo.

### Pré-requisitos

Para configurar o Tabex, certifique-se de que os seguintes softwares estão instalados no sistema operacional:

* [PHP](https://www.php.net/manual/pt_BR/install.php)
* [Mysql](https://dev.mysql.com/doc/refman/8.0/en/installing.html)
* [Laravel 7x](https://laravel.com/docs/7.x/installation)
* [Composer](https://getcomposer.org/download/)

Antes de configurar o Tabex, você precisa baixar este repositório Git. Depois disso, você pode instalar a aplicação.

Utilize o seguinte comando para baixar o repositório:

```
$ git clone https://github.com/Lenonsdp/csa
```

#### Construção

Para construir o projeto, siga os passos abaixo executando os comandos diretório raiz do projeto.

Copie o arquivo contendo as variáveis de ambiente do projeto:

```
$ cp .env.example .env
```


Para instalar as dependencias:

```
$ composer install
```
Cosntrua a database ```csa```, na sua IDE de preferência conforme configurado nas variáveis de ambiente.

```
CREATE DATABASE csa;
```

Gere a chave de criptografia do ***Illuminate***.

```
$ php artisan key:generate
```

Por fim iremos rodar as migrations.

```
$ php artisan migrate
```

Para subir o servidor local execute.

```
$ php artisan serve
```

Aqui estão alguns dados inicias inclusão de marcas, categorias e um produto.

```
INSERT INTO csa.categorias (descricao) 
VALUES 
('Roupa'),
('Tênis'),
('Chapéu'),
('Infantil'),
('Adulto'),
('Masculino'),
('Feminino'),
('Inverno'),
('Verão'),
('Promoção');

INSERT INTO csa.marcas (descricao) 
VALUES 
('Nike'),
('Adidas'),
('Puma'),
('Tommy'),
('Versace'),
('Colcci'),
('Dolce Gabbana'),
('Chanel'),
('Gucci'),
('Prada');

INSERT INTO csa.produtos (nome, especificacao_tecnica, marca_id) 
VALUES 
('Moletom', 'Estampa posterior de logo, gola clássica. Material: algodão. Cor: Preto.', '6');

INSERT INTO csa.produto_categorias (produto_id, categoria_id) 
VALUES 
(1, 5);
```

#### Rotas
Rotas definidas na contrução da aplicação, conforme utilizado o blade template, o retorno de algumas funcões,
redireciona para a view, algo que pode ser feito é aplicar a duplicacão das rotas para fornecer uma interface rest e uma para view(Blade).
![](https://i.imgur.com/xuiVFWt.png)
