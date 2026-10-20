<div align="center">
  <h1>
      VIAS PARA O CÉU
  </h1>
</div>

<p align="center">
  <strong>Uma loja virtual de artigos religiosos desenvolvida com PHP e PostgreSQL.</strong>
</p>

<p align="center">
  <img width="300" height="300" alt="ChatGPT Image 8 de out  de 2026, 16_15_02" src="https://github.com/user-attachments/assets/a148c7f9-937d-443c-9893-00e511500c65" />

</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-Backend-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/PostgreSQL-Banco_de_dados-4169E1?logo=postgresql&logoColor=white" alt="PostgreSQL">
  <img src="https://img.shields.io/badge/HTML-Estrutura-E34F26?logo=html5&logoColor=white" alt="HTML">
  <img src="https://img.shields.io/badge/CSS-Estilização-1572B6?logo=css3&logoColor=white" alt="CSS">
</p>

---

## ✦ Sobre o projeto

O **Vias para o Céu** é um sistema web de uma loja de artigos religiosos, desenvolvido com o objetivo de apresentar produtos, organizar categorias, permitir o cadastro e o acesso de clientes e registrar pedidos em um banco de dados.

O projeto possui uma área pública para navegação na loja, uma área destinada aos clientes e um painel administrativo para o gerenciamento dos produtos e das categorias.

Além de seu propósito comercial, o sistema foi desenvolvido como projeto acadêmico para praticar conceitos de desenvolvimento web, programação em PHP, banco de dados relacional e operações CRUD.

##  Objetivos

- Apresentar artigos religiosos em uma loja virtual.
- Organizar produtos por categorias.
- Permitir cadastro, login e logout de clientes.
- Disponibilizar um carrinho de compras.
- Calcular quantidades, subtotais e total do pedido.
- Registrar pedidos e seus respectivos itens no PostgreSQL.
- Permitir o gerenciamento administrativo dos produtos e das categorias.
- Praticar a integração entre PHP e PostgreSQL.

##  Tecnologias utilizadas

| Tecnologia | Finalidade |
|---|---|
| HTML | Estruturação das páginas |
| CSS | Estilização e organização visual |
| PHP | Processamento das informações e regras do sistema |
| PostgreSQL | Armazenamento dos dados |
| PDO | Comunicação entre PHP e PostgreSQL |
| VS Code | Ambiente de desenvolvimento |

##  Funcionalidades

### Área pública

- Página inicial.
- Apresentação da loja.
- Página sobre a loja.
- Página de contato.
- Listagem de produtos.
- Organização de produtos por categorias.
- Página de detalhes de cada produto.

### Área do cliente

- Cadastro de usuário.
- Login e logout.
- Verificação de senha.
- Sessão para manter o acesso do usuário.
- Visualização dos dados da própria conta.
- Adição de produtos ao carrinho.
- Aumento e diminuição de quantidades.
- Remoção de produtos.
- Cálculo de subtotais e total.
- Finalização da compra.
- Registro do pedido no banco de dados.
- Página de confirmação do pedido.

### Área administrativa

- Painel administrativo.
- Cadastro, consulta, edição e exclusão de produtos.
- Cadastro, consulta, edição e exclusão de categorias.
- Visualização dos clientes cadastrados.
- Visualização dos pedidos registrados.

##  Requisitos do sistema

### Requisitos funcionais

Os requisitos funcionais descrevem as ações que o sistema deve permitir.

- **RF01:** permitir a navegação pelas páginas públicas.
- **RF02:** listar produtos e apresentar seus detalhes.
- **RF03:** permitir o cadastro e o acesso dos clientes.
- **RF04:** permitir a manutenção do carrinho de compras.
- **RF05:** calcular o valor dos produtos e da compra.
- **RF06:** registrar pedidos e itens dos pedidos.
- **RF07:** permitir o gerenciamento de produtos.
- **RF08:** permitir o gerenciamento de categorias.
- **RF09:** permitir a visualização de clientes e pedidos pelo administrador.
- **RF10:** restringir o painel administrativo aos usuários autorizados.

### Requisitos não funcionais

- **RNF01:** utilizar PHP no processamento do sistema.
- **RNF02:** utilizar PostgreSQL para persistência dos dados.
- **RNF03:** utilizar PDO para acesso ao banco.
- **RNF04:** organizar o código em arquivos e diretórios.
- **RNF05:** proteger as senhas por meio de hash.
- **RNF06:** utilizar consultas preparadas para operações com dados externos.
- **RNF07:** apresentar uma interface organizada e adaptável aos diferentes tamanhos de tela.

##   Estrutura do projeto

O site fica dentro da pasta `vias/`, que está na raiz do repositório:

```text
projetoIntegrador/
├── README.md                    # Documentação do projeto
└── vias/                        # Pasta do site (rode o PHP daqui)
```

Dentro de `vias/`:

```text
vias/
├── adm/                                  # Páginas da área administrativa
│   ├── admin.php                         # Exibe o painel administrativo
│   ├── admin_produtos.php                # Lista e gerencia os produtos
│   ├── admin_produto_novo.php            # Cadastra novos produtos
│   ├── admin_produto_editar.php          # Edita produtos existentes
│   ├── admin_produto_excluir.php         # Exclui produtos
│   ├── admin_categorias.php              # Lista e gerencia categorias
│   ├── admin_categoria_nova.php          # Cadastra novas categorias
│   ├── admin_categoria_editar.php        # Edita categorias existentes
│   ├── admin_categoria_excluir.php       # Exclui categorias
│   ├── admin_clientes.php                # Lista os clientes cadastrados
│   └── admin_pedidos.php                 # Lista os pedidos realizados
├── config/
│   └── conexao.php              # Configura a conexão com o PostgreSQL
├── css/                         # Arquivos de estilo visual (um por página)
│   ├── style.css                # Estilo geral do site
│   ├── index.css                # Estilo da página inicial
│   ├── admin.css                # Estilo do painel administrativo
│   ├── cadastro.css             # Estilo da página de cadastro
│   ├── login.css                # Estilo da página de login
│   ├── perfil.css               # Estilo da página de perfil
│   ├── produtos.css             # Estilo da listagem de produtos
│   ├── produto.css              # Estilo dos detalhes do produto
│   ├── carrinho.css             # Estilo do carrinho
│   ├── finalizar_pedido.css     # Estilo da finalização do pedido
│   ├── pedido_confirmado.css    # Estilo da confirmação do pedido
│   ├── sobre.css                # Estilo da página sobre
│   └── contato.css              # Estilo da página de contato
├── imagens/                     # Imagens utilizadas no site
│   ├── logo.png                 # Logo da loja
│   └── produtos/                # Fotografias dos produtos
├── includes/
│   ├── header.php               # Cabeçalho e menu de navegação
│   └── footer.php               # Rodapé das páginas
├── produtos/
│   ├── produtos.php             # Exibe os produtos por categoria
│   └── produto.php              # Exibe detalhes de um produto
├── index.php                    # Página inicial da loja
├── cadastro.php                 # Cadastra novos clientes
├── login.php                    # Verifica os dados de acesso
├── logout.php                   # Encerra a sessão do usuário
├── perfil.php                   # Exibe os dados do cliente conectado
├── carrinho.php                 # Gerencia os produtos do carrinho
├── finalizar_pedido.php         # Registra o pedido no banco de dados
├── pedido_confirmado.php        # Exibe a confirmação do pedido
├── sobre.php                    # Apresenta informações sobre a loja
├── contato.php                  # Exibe os canais de contato
├── database.sql                 # Cria as tabelas e coloca categorias e produtos
├── vias_backup.sql              # Backup completo do banco (com pedidos e usuários)
└── anotacoes.md                 # Guarda anotações do desenvolvimento
```

### Organização dos diretórios

- `adm/`: páginas do painel administrativo.
- `config/`: configuração da conexão com o banco.
- `css/`: arquivos de estilização.
- `imagens/`: logo e imagens dos produtos.
- `includes/`: componentes compartilhados, como cabeçalho e rodapé.
- `produtos/`: listagem e detalhes dos produtos.

##  Banco de dados

O projeto utiliza o **PostgreSQL** como sistema gerenciador de banco de dados.

O banco utilizado no ambiente de desenvolvimento chama-se `vias`.

### Tabelas principais

| Tabela | Finalidade |
|---|---|
| `usuarios` | Armazenar dados dos usuários, credenciais protegidas e tipo de acesso |
| `categorias` | Organizar os produtos por categoria |
| `produtos` | Armazenar nome, descrição, preço, imagem e categoria |
| `pedidos` | Registrar os pedidos, o usuário responsável e o status |
| `itens_pedido` | Registrar os produtos, as quantidades e os preços de cada pedido |

### Relacionamentos

- Um usuário pode realizar vários pedidos.
- Um pedido pode conter vários itens.
- Cada item de pedido referencia um produto.
- Cada produto pertence a uma categoria.

As chaves primárias identificam os registros. As chaves estrangeiras relacionam as tabelas e ajudam a manter a integridade dos dados.

### Fluxo de registro de um pedido

1. O cliente adiciona produtos ao carrinho.
2. O sistema consulta os produtos no banco.
3. O cliente confere quantidades e valores.
4. O sistema registra o pedido na tabela `pedidos`.
5. Os produtos e suas quantidades são registrados em `itens_pedido`.
6. Uma transação confirma as operações em conjunto.
7. O carrinho é limpo e a página de confirmação é apresentada.

O total da compra é calculado pelo PHP com base nos preços dos produtos e nas quantidades selecionadas.

##  CRUD
- **Create:** criar registros.
- **Read:** consultar registros.
- **Update:** atualizar registros.
- **Delete:** excluir registros.

### CREATE — Inserção

Exemplo de inserção de uma categoria:

```sql
INSERT INTO categorias (nome)
VALUES ('Terços');
```

### READ — Consulta

Exemplo de consulta de produtos:

```sql
SELECT id, nome, preco
FROM produtos
ORDER BY nome;
```

### UPDATE — Atualização

Exemplo de alteração de um produto específico:

```sql
UPDATE produtos
SET preco = 45.00
WHERE id = 1;
```

### DELETE — Exclusão

Exemplo de exclusão de um produto específico:

```sql
DELETE FROM produtos
WHERE id = 1;
```

## 🔐 Login e segurança

O sistema utiliza sessões PHP para manter os dados necessários durante o acesso do usuário.

Entre os mecanismos de segurança utilizados estão:

- `password_hash()` para gerar hashes de senhas no cadastro.
- `password_verify()` para verificar as senhas no login.
- Consultas preparadas com PDO para operações no banco.
- Verificação do tipo de usuário para restringir o painel administrativo.
- Uso de `htmlspecialchars()` para escapar conteúdos exibidos em HTML.

Esses mecanismos ajudam a proteger o sistema, mas não substituem uma revisão de segurança completa. Senhas reais não devem ser armazenadas em texto puro nem publicadas no repositório.

##  Fluxos de navegação

### Cliente

```text
Página inicial
      ↓
Listagem de produtos
      ↓
Detalhes do produto
      ↓
Carrinho
      ↓
Login, quando necessário
      ↓
Finalização da compra
      ↓
Registro do pedido
      ↓
Pedido confirmado
```

### Administrador

```text
Login
↓
Painel administrativo
├── Produtos
├── Categorias
├── Clientes
└── Pedidos
```

##  Conexão com o banco

A conexão com o PostgreSQL é centralizada no arquivo:

```text
config/conexao.php
```

O arquivo utiliza PDO para estabelecer a comunicação entre o PHP e o banco de dados.

As credenciais ficam na configuração local e não devem ser publicadas no GitHub. Para uma instalação em outro computador, é necessário configurar os dados de conexão correspondentes ao ambiente.

## Como executar o projeto

### 1. Pré-requisitos

Antes de começar, instale:

- [Git](https://git-scm.com/downloads)
- [PHP](https://www.php.net/downloads.php)
- [PostgreSQL](https://www.postgresql.org/download/) ou acesso ao servidor PostgreSQL utilizado pelo projeto.
- [Visual Studio Code](https://code.visualstudio.com/)

**No Linux (Ubuntu, Debian e parecidos)**, dá para instalar tudo de uma vez pelo terminal:

```bash
sudo apt update
```

```bash
sudo apt install git php php-pgsql postgresql
```

Depois, ligue o PostgreSQL:

```bash
sudo systemctl start postgresql
```

> O `sudo` pede a senha do **seu usuário do Linux**. Ela também não aparece enquanto você digita.

### 2. Baixar o projeto

Abra o terminal e execute o comando abaixo:

```bash
git clone https://github.com/Laura-200/projetoIntegrador.git
```

Entre na pasta do site. Ela é a pasta `vias`, **dentro** de `projetoIntegrador`:

```bash
cd projetoIntegrador/vias
```

> O comando `git clone` cria a pasta do projeto e baixa os arquivos que estão salvos no repositório. Não é necessário criar as pastas manualmente depois disso.

### 3. Abrir no Visual Studio Code

Dentro da pasta `vias`, execute:

```bash
code .
```

Se o comando `code` não estiver disponível, abra o Visual Studio Code manualmente e selecione **Arquivo → Abrir Pasta → projetoIntegrador → vias**.

### 4. Conferir a instalação do PHP

No terminal integrado do VS Code, execute:

```bash
php -v
```

Esse comando mostra a versão do PHP instalada.

Depois, confira se o PHP sabe conversar com o PostgreSQL:

```bash
php -m
```

Na lista que aparecer, precisa existir a linha `pdo_pgsql`. Se ela não aparecer:

- **Windows:** abra o arquivo `php.ini` (fica na pasta onde o PHP foi instalado), procure a linha `;extension=pdo_pgsql`, apague o `;` do começo, salve e abra um terminal novo.
- **Linux:** instale o pacote que falta com `sudo apt install php-pgsql`.

### 5. Conferir se você está na pasta certa

Execute:

```bash
ls
```

Se aparecerem o arquivo `index.php`, o arquivo `database.sql` e a pasta `config`, você está no lugar certo. Se não aparecerem, volte ao passo 2.

### 6. Configurar o banco de dados (passo a passo)

Siga os passos na ordem, um de cada vez.

#### 6.1 O que é isso tudo?

- O **PostgreSQL** é um armário gigante.
- O **banco `vias`** é uma gaveta desse armário, só da nossa loja.
- As **tabelas** são caixinhas dentro da gaveta: uma de usuários, uma de produtos, uma de pedidos...
- O **usuário do banco** (`vias_user`) é quem tem a chave da gaveta. O site usa esse usuário para entrar no banco.
- O **`psql`** é a janelinha preta onde a gente escreve ordens para o armário.

Se a gaveta `vias` não existir, o site não acha nada e mostra *"Não foi possível conectar ao banco"*.

#### 6.2 Abrir o psql como administrador

Primeiro entramos com o usuário `postgres`, que é o "dono do armário". Só ele pode criar usuários e bancos novos.

**Windows:**

1. Aperte a tecla do Windows.
2. Digite **SQL Shell (psql)** e abra.
3. Ele vai perguntar `Server`, `Database`, `Port` e `Username`. Só aperte **Enter** em cada um (ele usa o padrão).
4. Quando pedir `Password`, digite a senha que você escolheu ao instalar o PostgreSQL e aperte **Enter**.

**Linux:**

```bash
sudo -u postgres psql
```

> ⚠️ A senha **não aparece** enquanto você digita. Nem bolinha, nem asterisco. Isso é normal! Digite normalmente e aperte Enter.

Deu certo quando aparecer isto:

```text
postgres=#
```

Esse `postgres=#` quer dizer: *"estou ouvindo, pode mandar"*.

#### 6.3 Criar o usuário e a gaveta `vias`

Ainda no psql, crie o usuário que o site vai usar:

```sql
CREATE USER vias_user WITH PASSWORD 'vias123';
```

Agora crie o banco e diga que ele pertence a esse usuário:

```sql
CREATE DATABASE vias OWNER vias_user;
```

> **Regra de ouro:** comando SQL termina com **ponto e vírgula** `;`. Se esquecer, o psql fica esperando e mostra `postgres-#` (com tracinho). Aí é só digitar `;` e apertar Enter.

Se aparecerem `CREATE ROLE` e `CREATE DATABASE`, deu certo!

> A senha `vias123` é um exemplo. Pode trocar por outra, mas lembre dela: ela vai no passo 6.6.

Pronto, já pode sair do psql:

```sql
\q
```

> Comandos que começam com `\` (barra invertida) são do próprio psql e **não** precisam de `;`.

#### 6.4 Encher a gaveta com as caixinhas

Agora o trabalho é feito com o usuário novo, `vias_user`. Abra o terminal do VS Code **dentro da pasta `vias`**.

Aqui você escolhe **UM** caminho. **Só um!** Se fizer os dois, as caixinhas brigam e dá erro.

**Caminho A: começar do zero (recomendado)**

Cria as 5 tabelas e coloca as categorias e os produtos. Também cria as 2 contas padrão (veja o passo 6.7). Não vem nenhum pedido.

```bash
psql -h localhost -U vias_user -d vias -f database.sql
```

**Caminho B: restaurar o backup**

Traz tudo do jeito que estava: produtos, usuários e pedidos antigos.

```bash
psql -h localhost -U vias_user -d vias -f vias_backup.sql
```

> O backup também já vem com as 2 contas padrão do passo 6.7.

Nos dois caminhos, ele pede a senha do `vias_user` (`vias123`, se você não trocou).

> **O que é cada pedaço do comando?**
> `-h localhost` = o banco está neste computador · `-U vias_user` = entra com esse usuário · `-d vias` = na gaveta `vias` · `-f arquivo.sql` = roda os comandos desse arquivo.

> **Windows:** se aparecer `'psql' não é reconhecido como um comando`, use o caminho completo do programa (troque o `18` pela versão instalada):
>
> ```powershell
> & "C:\Program Files\PostgreSQL\18\bin\psql.exe" -h localhost -U vias_user -d vias -f database.sql
> ```

#### 6.5 Conferir se as caixinhas estão lá

Entre no banco com o usuário novo:

```bash
psql -h localhost -U vias_user -d vias
```

O começo da linha agora é `vias=>`. Liste as tabelas:

```sql
\dt
```

Tem que aparecer uma lista com estas 5 tabelas:

```text
categorias
itens_pedido
pedidos
produtos
usuarios
```

Quer ver os produtos?

```sql
SELECT * FROM produtos;
```

Se aparecerem o Terço Rosa, o Crucifixo Dourado e companhia, o banco está pronto. Para sair, digite `\q`.

#### 6.6 Contar para o PHP onde fica o banco

Abra o arquivo `config/conexao.php` e deixe estas linhas assim:

```php
$servidor = "localhost";       // "localhost" = o banco está no seu próprio computador
$porta = "5432";               // porta padrão do PostgreSQL
$banco = "vias";               // o nome da gaveta que você criou
$usuario = "vias_user";        // o usuário criado no passo 6.3
$senha = "vias123";            // a senha criada no passo 6.3
```

- Se o banco estiver no seu computador, use `localhost`.
- Se o banco estiver no servidor da escola, use o endereço IP do servidor e o usuário e a senha de lá.
- **Nunca** envie a sua senha verdadeira para o GitHub.

#### 6.7 Contas padrão do site

Os dois caminhos já criam estas contas para testar o site:

| Tipo | E-mail | Senha |
|---|---|---|
| Administrador | `admin@vias.com` | `admin123` |
| Cliente | `cliente@vias.com` | `cliente123` |

> Não confunda: essas são contas **do site** (para fazer login na loja). O `vias_user` é o usuário **do banco** (só o PHP usa).

As senhas ficam guardadas no banco em **hash** (um código embaralhado), igual às contas criadas pelo cadastro do site.

> Essas senhas são só para testes. Se o site for usado de verdade, troque-as ou apague essas contas.

**Quer transformar a sua própria conta em administrador?**

1. Inicie o site (passo 7) e abra `http://localhost:8000/cadastro.php`.
2. Cadastre-se normalmente, com o seu e-mail.
3. Entre no banco (`psql -h localhost -U vias_user -d vias`) e rode:

```sql
UPDATE usuarios
SET tipo = 'admin'
WHERE email = 'seu@email.com';
```

4. Saia e entre de novo no site. Agora o painel administrativo abre.

#### 6.8 Fazer o backup do banco (dump)

O **dump** é uma "foto" do banco inteiro: tabelas, produtos, usuários e pedidos, tudo num arquivo `.sql`. Faça isso antes de mudar algo importante ou de entregar o projeto.

No terminal, dentro da pasta `vias`:

```bash
pg_dump -h localhost -U vias_user -d vias --no-owner --no-privileges -f vias_backup.sql
```

Ele pede a senha do `vias_user` e cria (ou **substitui**) o arquivo `vias_backup.sql`.

> **O que é cada pedaço?**
> `--no-owner` e `--no-privileges` = não grava quem é o dono das tabelas. Assim o backup pode ser restaurado com qualquer usuário, em qualquer computador.

> **Windows:** se aparecer `'pg_dump' não é reconhecido como um comando`, use o caminho completo (troque o `18` pela versão instalada):
>
> ```powershell
> & "C:\Program Files\PostgreSQL\18\bin\pg_dump.exe" -h localhost -U vias_user -d vias --no-owner --no-privileges -f vias_backup.sql
> ```

Quer guardar backups antigos sem apagar? Coloque a data no nome:

```bash
pg_dump -h localhost -U vias_user -d vias --no-owner --no-privileges -f vias_backup_2026-10-20.sql
```

Para **restaurar** um backup, use o Caminho B do passo 6.4, num banco vazio.

#### Deu erro?

| Mensagem | O que quer dizer | O que fazer |
|---|---|---|
| `'psql' não é reconhecido como um comando` | O Windows não sabe onde está o psql | Use o caminho completo (veja o passo 6.4) |
| `password authentication failed` | Senha errada | Digite de novo, com calma (ela não aparece mesmo) |
| `Peer authentication failed for user "vias_user"` (Linux) | Faltou o `-h localhost` no comando | Rode de novo com `-h localhost` |
| `role "vias_user" already exists` | O usuário já existe | Tudo bem! Pule para o `CREATE DATABASE` |
| `database "vias" already exists` | A gaveta já existe | Tudo bem! Pule para o passo 6.4 |
| `relation "usuarios" already exists` | As tabelas já foram criadas antes | Não rode o script de novo. Se quiser zerar, veja abaixo |
| `permission denied for schema public` | O banco não pertence ao `vias_user` | No psql como `postgres`, rode `ALTER DATABASE vias OWNER TO vias_user;` |
| `could not find driver` (no site) | O PHP não tem o `pdo_pgsql` ligado | Volte ao passo 4 |
| `Connection refused` (no site ou no psql) | O PostgreSQL está desligado ou o `$servidor` está errado | Linux: `sudo systemctl start postgresql`. Confira o `config/conexao.php` |
| `postgres-#` e nada acontece | Faltou o `;` | Digite `;` e aperte Enter |

**Quero apagar tudo e começar de novo** ⚠️ (isso apaga **todos** os dados do banco `vias`, sem volta; faça um dump antes, se precisar):

Abra o psql como administrador (passo 6.2) e rode:

```sql
DROP DATABASE vias;
CREATE DATABASE vias OWNER vias_user;
```

Depois, repita o passo 6.4.

#### Colinha de comandos

| Comando | O que faz |
|---|---|
| `sudo -u postgres psql` | (Linux) Abre o psql como administrador |
| `psql -h localhost -U vias_user -d vias` | Entra no banco `vias` com o usuário do site |
| `pg_dump -h localhost -U vias_user -d vias --no-owner --no-privileges -f vias_backup.sql` | Faz o backup (dump) |
| `\l` | Lista todos os bancos (gavetas) |
| `\du` | Lista os usuários do banco |
| `\c vias` | Entra no banco `vias` |
| `\dt` | Lista as tabelas (caixinhas) |
| `\d produtos` | Mostra as colunas da tabela `produtos` |
| `SELECT * FROM usuarios;` | Mostra todos os usuários do site |
| `\q` | Sai do psql |

### 7. Iniciar o servidor PHP

No terminal do VS Code, dentro da pasta `vias`, execute:

```bash
php -S localhost:8000
```

Esse comando inicia o servidor local de desenvolvimento do PHP.

Mantenha o terminal aberto enquanto estiver utilizando o site.

### 8. Acessar o site

Abra o navegador e acesse:

```text
http://localhost:8000
```

A página inicial do projeto será exibida.

### 9. Encerrar o servidor

Para interromper a execução, volte ao terminal e pressione:

```text
Ctrl + C
```

### 10. Observações importantes

- O banco de dados PostgreSQL precisa estar acessível para que as funcionalidades que utilizam dados funcionem corretamente.
- O arquivo `vias_backup.sql` é um backup do banco de dados. Ele contém e-mails e senhas (em hash) de usuários, então deve ser guardado em local seguro.
- O backup não precisa ser restaurado a cada execução do site. Para gerar um novo, veja o passo 6.8.
- As credenciais do banco de dados não devem ser publicadas no GitHub.
- O servidor iniciado com `php -S` é destinado ao desenvolvimento e aos testes locais, não à hospedagem de produção.

##  Testes do projeto

De acordo com os testes registrados durante o desenvolvimento, foram verificadas as seguintes funcionalidades:

- Cadastro de clientes.
- Tratamento de e-mail já cadastrado e campos obrigatórios.
- Login e logout.
- Acesso ao perfil.
- Listagem e detalhes dos produtos.
- Adição e remoção de produtos do carrinho.
- Alteração das quantidades.
- Cálculo de subtotais e total.
- Finalização da compra.
- Registro de pedidos e itens no banco.
- Página de confirmação.
- Acesso ao painel administrativo.
- Operações CRUD de produtos e categorias.
- Visualização de clientes e pedidos.
- Verificações de acesso e senha.

Esses itens representam os testes informados durante o desenvolvimento. A validação final deve ser repetida no ambiente de entrega, especialmente após alterações no código ou no banco.


##  Autoavaliação 

### Onde os dados ficam armazenados?

No PostgreSQL, organizados em tabelas relacionadas entre si.

### Qual é a diferença entre `INSERT` e `SELECT`?

`INSERT` adiciona registros. `SELECT` consulta os registros existentes.

### O que são chaves primárias e estrangeiras?

A chave primária identifica cada registro de uma tabela. A chave estrangeira relaciona registros de tabelas diferentes.

### O que é CRUD?

É o conjunto de operações de criação, consulta, atualização e exclusão de registros.

### Por que as senhas são protegidas com hash?

Para evitar o armazenamento direto das senhas em texto puro. O login compara a senha digitada com o hash armazenado.

### Por que utilizar transações na finalização de pedidos?

Para que as operações relacionadas ao pedido sejam confirmadas em conjunto ou desfeitas em caso de falha, evitando registros parcialmente gravados.

##  Conclusão

O **Vias para o Céu** reúne conceitos de desenvolvimento web, integração com banco de dados relacional, autenticação de usuários, gerenciamento de produtos e categorias e registro de pedidos.

O projeto permitiu praticar PHP, HTML, CSS, PostgreSQL, PDO e operações CRUD, além de compreender a importância da organização do código, da integridade dos dados e da proteção das informações dos usuários.

O objetivo é oferecer uma base funcional para uma loja virtual de artigos religiosos e demonstrar, na prática, os conhecimentos desenvolvidos durante o projeto acadêmico.
