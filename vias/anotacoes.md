# Vias para o Céu

## 1. Identificação

**Nome:** Vias para o Céu\
**Tipo:** Sistema web para uma loja de artigos religiosos.

**Objetivo:** criar uma loja virtual para apresentar produtos, permitir
cadastro e login de clientes, organizar produtos e categorias, registrar
pedidos e oferecer uma área administrativa.

## 2. Objetivos do sistema

-   Apresentar os produtos da loja.
-   Organizar produtos por categorias.
-   Permitir cadastro, login e logout.
-   Permitir adicionar produtos ao carrinho.
-   Permitir finalizar pedidos.
-   Registrar pedidos no banco de dados.
-   Permitir que o administrador gerencie produtos, categorias, clientes
    e pedidos.

## 3. Tecnologias

-   HTML: estruturando as páginas.
-   CSS: estilizando o site.
-   PHP: criando a parte dinâmica e comunicando com o banco.
-   PostgreSQL: armazenando os dados.
-   PDO: criando a comunicação entre PHP e PostgreSQL.
-   VS Code: desenvolvendo o projeto.

## 4. Requisitos funcionais

### Cliente

-   Cadastrar conta.
-   Entrar e sair da conta.
-   Visualizar produtos e detalhes.
-   Adicionar, alterar quantidade e remover produtos do carrinho.
-   Finalizar pedidos.
-   Visualizar os dados da própria conta.

### Administrador

-   Acessar o painel.
-   Cadastrar, editar e excluir produtos.
-   Cadastrar, editar e excluir categorias.
-   Visualizar clientes.
-   Visualizar pedidos.

## 5. Requisitos não funcionais

-   Utilizar PostgreSQL.
-   Utilizar PHP no backend.
-   Possuir interface organizada e responsiva.
-   Armazenar senhas de forma protegida.
-   Restringir a área administrativa aos administradores.
-   Organizar os dados por tabelas e relacionamentos.

## 6. Estrutura do projeto

``` text
vias/
├── index.php
├── cadastro.php
├── login.php
├── logout.php
├── perfil.php
├── carrinho.php
├── finalizar_pedido.php
├── pedido_confirmado.php
├── sobre.php
├── contato.php
├── produtos/
├── css/
├── imagens/
├── config/
├── includes/
└── adm/
```

## 7. Banco de dados

O banco utilizado é o PostgreSQL.

### usuarios

Armazenando nome, e-mail, senha e tipo de usuário.

### categorias

Armazenando as categorias dos produtos.

### produtos

Armazenando nome, descrição, preço, imagem e categoria.

### pedidos

Armazenando os pedidos, o usuário responsável e o status.

### itens_pedido

Armazenando os produtos, quantidades e preços de cada pedido.

## 8. Relacionamentos

-   Um usuário pode possuir vários pedidos.
-   Um pedido pode possuir vários itens.
-   Cada item está relacionado a um produto.
-   Cada produto pertence a uma categoria.

## 9. CRUD

### CREATE

Inserindo novos registros.

``` sql
INSERT INTO usuarios (nome, email, senha)
VALUES ('Nome', 'email@email.com', 'senha');
```

### READ

Consultando registros.

``` sql
SELECT * FROM produtos;
```

### UPDATE

Alterando registros.

``` sql
UPDATE usuarios
SET tipo = 'admin'
WHERE id = 1;
```

### DELETE

Excluindo registros.

``` sql
DELETE FROM produtos
WHERE id = 1;
```

É necessário ter cuidado principalmente com UPDATE e DELETE para não
alterar ou excluir dados incorretos.

## 10. Login e segurança

O sistema utiliza sessões para guardar os dados do usuário durante o
acesso.

As senhas são protegidas utilizando `password_hash()` no cadastro e
`password_verify()` no login.

O tipo de usuário também é verificado para controlar o acesso à área
administrativa.

## 11. Fluxo do cliente

``` text
Home → Produtos → Produto → Carrinho → Login → Finalização → Pedido confirmado
```

## 12. Fluxo do administrador

``` text
Login → Painel → Produtos / Categorias / Clientes / Pedidos
```

## 13. Conexão com o banco

A conexão é realizada pelo arquivo `config/conexao.php`, utilizando PDO
e PostgreSQL.

## 14. Testes realizados

Foram testados:

-   Cadastro.
-   Login e logout.
-   Perfil.
-   Produtos.
-   Carrinho.
-   Alteração de quantidade.
-   Remoção de produtos.
-   Finalização de pedidos.
-   Registro do pedido no banco.
-   Pedido confirmado.
-   Área administrativa.
-   CRUD de produtos.
-   CRUD de categorias.
-   Visualização de clientes.
-   Visualização de pedidos.

## 15. Execução

Dentro da pasta do projeto, o servidor PHP pode ser iniciado com:

``` bash
php -S localhost:8000
```

Acessando depois:

``` text
http://localhost:8000
```

## 16. Entregas do desafio

Devem ser preparados:

1.  O projeto ou link do repositório.
2.  O arquivo de autoavaliação.
3.  O dump do banco em `.sql`.

## 17. Autoavaliação

**Onde os dados ficam armazenados?**\
No banco PostgreSQL, organizados em tabelas.

**Qual a diferença entre INSERT e SELECT?**\
INSERT insere novos registros. SELECT consulta registros existentes.

**Como explicar a estrutura das tabelas?**\
As tabelas possuem colunas para os dados e uma chave primária para
identificar cada registro.

**Como explicar os relacionamentos?**\
As chaves estrangeiras ligam registros de tabelas diferentes, como
produto e categoria.

**Por que ter cuidado com UPDATE e DELETE?**\
Porque eles podem alterar ou excluir dados que já existem.

## 18. Dump do banco

O banco deverá ser exportado em um arquivo `.sql` contendo a estrutura e
os dados necessários para reconstruir o banco do projeto.

## 19. Conclusão

O projeto Vias para o Céu foi desenvolvido utilizando HTML, CSS, PHP e
PostgreSQL. O sistema possui área pública, área de cliente e área
administrativa, além de banco de dados organizado com tabelas e
relacionamentos.

O projeto permite trabalhar com cadastro, consulta, alteração e exclusão
de dados, além do registro de pedidos.
