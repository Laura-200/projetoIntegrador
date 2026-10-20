-- -- TABELA DE USUÁRIOS

-- CREATE TABLE usuarios (
--     id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
--     nome VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL,
--     senha VARCHAR(100) NOT NULL

-- );

-- SELECT * FROM usuarios;

-- COLOCANDO OS PRIMEIROS USUÁRIOS

-- INSERT INTO usuarios (nome, email, senha)
-- VALUES
-- ('Maria', 'maria@email.com', '123456'),
-- ('João', 'joao@email.com', '123456');

-- SELECT * FROM usuarios;

--alterando dados com update
-- UPDATE usuarios
-- SET nome = 'Maria Atualizada'
-- WHERE id = 1;

-- SELECT * FROM usuarios;



-- PREPARANDO A TABELA DE USUÁRIOS
-- Aumentando o tamanho da coluna senha.
-- Isso é necessário porque o PHP vai transformar a senha em um código seguro antes de salvar.

-- ALTER TABLE usuarios
-- ALTER COLUMN senha TYPE VARCHAR(255);

-- -- CONFERINDO A TABELA

-- SELECT * FROM usuarios;



-- =========================================
-- VIAS PARA O CÉU
-- TABELAS DE CATEGORIAS E PRODUTOS
-- =========================================


-- =========================================
-- TABELA DE CATEGORIAS
-- =========================================

-- -- Cada categoria terá um ID e um nome.

-- CREATE TABLE categorias (
--     id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
--     nome VARCHAR(100) NOT NULL
-- );


-- -- =========================================
-- -- TABELA DE PRODUTOS
-- -- =========================================

-- -- Cada produto pertence a uma categoria.

-- CREATE TABLE produtos (
--     id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,

--     nome VARCHAR(150) NOT NULL,

--     descricao TEXT,

--     preco DECIMAL(10,2) NOT NULL,

--     imagem VARCHAR(255),

--     categoria_id INTEGER NOT NULL,

--     CONSTRAINT fk_produto_categoria
--         FOREIGN KEY (categoria_id)
--         REFERENCES categorias(id)
-- );


-- -- =========================================
-- -- COLOCANDO AS CATEGORIAS
-- -- =========================================

-- INSERT INTO categorias (nome)
-- VALUES
-- ('Escapulários'),
-- ('Terços'),
-- ('Cruzes'),
-- ('Imagens religiosas'),
-- ('Artigos religiosos');


-- -- =========================================
-- -- COLOCANDO ALGUNS PRODUTOS DE TESTE
-- -- =========================================

-- INSERT INTO produtos
-- (nome, descricao, preco, imagem, categoria_id)
-- VALUES

-- (
--     'Escapulário Nossa Senhora do Carmo',
--     'Escapulário artesanal de Nossa Senhora do Carmo, confeccionado com carinho e devoção.',
--     35.00,
--     'escapulario-nossa-senhora.jpg',
--     1
-- ),

-- (
--     'Escapulário Sagrado Coração de Jesus',
--     'Escapulário artesanal com a representação do Sagrado Coração de Jesus.',
--     35.00,
--     'escapulario-sagrado-coracao.jpg',
--     1
-- ),

-- (
--     'Escapulário Nossa Senhora',
--     'Escapulário religioso confeccionado artesanalmente.',
--     32.00,
--     'escapulario-nossa-senhora.jpg',
--     1
-- ),

-- (
--     'Terço Nossa Senhora',
--     'Terço para momentos de oração e devoção.',
--     45.00,
--     'terco-nossa-senhora.jpg',
--     2
-- ),

-- (
--     'Cruz Decorativa',
--     'Cruz religiosa para decoração e momentos de oração.',
--     40.00,
--     'cruz-decorativa.jpg',
--     3
-- );

-- -- CONFERINDO AS CATEGORIAS


-- SELECT * FROM categorias;

-- -- CONFERINDO OS PRODUTOS

-- SELECT * FROM produtos;

-- Cria a tabela de pedidos


-- CREATE TABLE pedidos (
--     id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,

--     usuario_id INTEGER NOT NULL,

--     data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

--     status VARCHAR(30) NOT NULL DEFAULT 'Pendente',

--     CONSTRAINT fk_pedido_usuario
--         FOREIGN KEY (usuario_id)
--         REFERENCES usuarios(id)
-- );


-- Cria a tabela dos produtos de cada pedido
-- CREATE TABLE itens_pedido (
--     id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,

--     pedido_id INTEGER NOT NULL,

--     produto_id INTEGER NOT NULL,

--     quantidade INTEGER NOT NULL DEFAULT 1,

--     preco DECIMAL(10,2) NOT NULL,

--     CONSTRAINT fk_item_pedido
--         FOREIGN KEY (pedido_id)
--         REFERENCES pedidos(id),

--     CONSTRAINT fk_item_produto
--         FOREIGN KEY (produto_id)
--         REFERENCES produtos(id)
-- );


-- Mostra a estrutura da tabela itens_pedido
-- SELECT
--     column_name,
--     data_type
-- FROM information_schema.columns
-- WHERE table_name = 'itens_pedido'
-- ORDER BY ordinal_position;


-- Mostra os relacionamentos da tabela itens_pedido
-- SELECT
--     tc.constraint_name,       -- Mostra o nome do relacionamento

--     kcu.column_name,          -- Mostra a coluna que faz o relacionamento

--     ccu.table_name AS tabela_referenciada, -- Mostra a tabela ligada

--     ccu.column_name AS coluna_referenciada -- Mostra a coluna ligada
-- FROM information_schema.table_constraints AS tc

-- -- Liga as informações do relacionamento às colunas da tabela
-- INNER JOIN information_schema.key_column_usage AS kcu
--     ON tc.constraint_name = kcu.constraint_name

-- -- Descobre qual tabela e coluna são referenciadas
-- INNER JOIN information_schema.constraint_column_usage AS ccu
--     ON ccu.constraint_name = tc.constraint_name

-- -- Procura somente os relacionamentos da tabela itens_pedido
-- WHERE tc.table_name = 'itens_pedido'

-- -- Procura somente chaves estrangeiras
--   AND tc.constraint_type = 'FOREIGN KEY';


-- Mostra os usuários cadastrados
-- SELECT
--     id,       -- Identificação do usuário
--     nome,     -- Nome do usuário
--     email     -- E-mail do usuário
-- FROM usuarios
-- ORDER BY id;


-- Mostra os produtos cadastrados
-- SELECT
--     id,          -- Identificação do produto
--     nome,        -- Nome do produto
--     preco,       -- Preço do produto
--     categoria_id -- Identificação da categoria
-- FROM produtos
-- ORDER BY id;


-- Cria um pedido de teste para a Maria
-- INSERT INTO pedidos (
--     usuario_id,
--     status
-- )
-- VALUES (
--     1,
--     'Pendente'
-- );


-- Cria um pedido de teste para a Maria
-- INSERT INTO pedidos (
--     usuario_id,
--     status
-- )
-- VALUES (
--     1,
--     'Pendente'
-- );



-- Mostra o pedido criado
-- SELECT
--     id,          -- Identificação do pedido
--     usuario_id,  -- Usuário que fez o pedido
--     data_pedido, -- Data e hora do pedido
--     status       -- Situação do pedido
-- FROM pedidos
-- ORDER BY id DESC
-- LIMIT 1;


-- Adiciona o primeiro produto ao pedido
-- INSERT INTO itens_pedido (
--     pedido_id,
--     produto_id,
--     quantidade,
--     preco
-- )
-- VALUES (
--     4,
--     1,
--     1,
--     35.00
-- );



-- Adiciona o segundo produto ao pedido
-- INSERT INTO itens_pedido (
--     pedido_id,
--     produto_id,
--     quantidade,
--     preco
-- )
-- VALUES (
--     4,
--     4,
--     1,
--     45.00
-- );



-- Mostra o pedido com seus produtos
-- SELECT
--     pedidos.id AS pedido_id,              -- Identificação do pedido
--     usuarios.nome AS cliente,             -- Nome do cliente
--     produtos.nome AS produto,             -- Nome do produto
--     itens_pedido.quantidade,              -- Quantidade comprada
--     itens_pedido.preco,                   -- Preço do produto
--     pedidos.status                        -- Status do pedido
-- FROM pedidos

-- -- Liga o pedido ao usuário que fez a compra
-- INNER JOIN usuarios
--     ON pedidos.usuario_id = usuarios.id

-- -- Liga o pedido aos seus itens
-- INNER JOIN itens_pedido
--     ON pedidos.id = itens_pedido.pedido_id

-- -- Liga cada item ao produto correspondente
-- INNER JOIN produtos
--     ON itens_pedido.produto_id = produtos.id

-- -- Mostra apenas o nosso pedido de teste
-- WHERE pedidos.id = 4;


-- Mostra todos os itens cadastrados no pedido 4
-- SELECT
--     id,          -- Identificação do item
--     pedido_id,   -- Pedido ao qual o item pertence
--     produto_id,  -- Produto comprado
--     quantidade,  -- Quantidade comprada
--     preco        -- Preço do produto
-- FROM itens_pedido
-- WHERE pedido_id = 4
-- ORDER BY id;


-- Mostra todos os relacionamentos entre as tabelas
-- SELECT
--     tc.table_name AS tabela,                    -- Tabela que possui o relacionamento
--     tc.constraint_name AS relacionamento,       -- Nome do relacionamento
--     kcu.column_name AS coluna,                  -- Coluna que faz a ligação
--     ccu.table_name AS tabela_referenciada,      -- Tabela que recebe a ligação
--     ccu.column_name AS coluna_referenciada      -- Coluna ligada
-- FROM information_schema.table_constraints AS tc

-- -- Liga o relacionamento à coluna correspondente
-- INNER JOIN information_schema.key_column_usage AS kcu
--     ON tc.constraint_name = kcu.constraint_name
--     AND tc.table_schema = kcu.table_schema

-- -- Encontra a tabela e coluna referenciadas
-- INNER JOIN information_schema.constraint_column_usage AS ccu
--     ON tc.constraint_name = ccu.constraint_name
--     AND tc.table_schema = ccu.table_schema

-- -- Mostra somente chaves estrangeiras
-- WHERE tc.constraint_type = 'FOREIGN KEY'

-- -- Organiza por tabela
-- ORDER BY tc.table_name;
