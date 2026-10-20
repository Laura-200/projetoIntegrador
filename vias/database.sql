-- =====================================================
-- BANCO DE DADOS DA LOJA VIAS PARA O CÉU
-- Rode este arquivo dentro de um banco VAZIO chamado "vias".
-- Ele cria as 5 tabelas e coloca as categorias e os produtos.
-- =====================================================


-- Criando a tabela de usuários
CREATE TABLE usuarios (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(20) NOT NULL DEFAULT 'cliente'
);

-- Colocando as contas padrão (senhas já em hash)
-- Administrador: admin@vias.com / admin123
-- Cliente:       cliente@vias.com / cliente123
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES
('Administrador', 'admin@vias.com', '$2y$12$H3RHQ4FWt4bH5pk8tkta8ebmJijLZZFHdB8woLBKIWrWmHX582Po6', 'admin'),
('Cliente', 'cliente@vias.com', '$2y$12$ABLREa9tKoPMgOixmrgmaulKIB75EknrtBPj/A7k6c0ck2NlwXSea', 'cliente');


-- Criando as categorias dos produtos
CREATE TABLE categorias (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Colocando as categorias
INSERT INTO categorias (nome)
VALUES
('Escapulários'),
('Terços'),
('Crucifixos'),
('Imagens religiosas'),
('Artigos religiosos');


-- Criando a tabela de produtos
CREATE TABLE produtos (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255),
    categoria_id INTEGER NOT NULL,

    CONSTRAINT fk_produto_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias(id)
);

-- Colocando os produtos
INSERT INTO produtos (nome, descricao, preco, imagem, categoria_id)
VALUES
(
    'Escapulário Nossa Senhora do Carmo',
    'Escapulário artesanal de Nossa Senhora do Carmo.',
    35.00,
    'escapulario-nossa-senhora-do-carmo.png',
    1
),
(
    'Escapulário Sagrado Coração de Jesus',
    'Escapulário artesanal do Sagrado Coração de Jesus.',
    35.00,
    'escapulario-sagrado-coracao.png',
    1
),
(
    'Escapulário Nossa Senhora',
    'Escapulário artesanal de Nossa Senhora.',
    32.00,
    'escapulario-nossa-senhora.png',
    1
),
(
    'Terço Nossa Senhora',
    'Terço artesanal de Nossa Senhora.',
    45.00,
    'terco-azul.png',
    2
),
(
    'Crucifixo de Madeira',
    'Crucifixo artesanal de madeira.',
    40.00,
    'cruz-decorativa.png',
    3
),
(
    'Escapulário de Fita',
    'Escapulário artesanal feito com fita.',
    40.00,
    'escapulario-de-fita.png',
    1
),
(
    'Terço Rosa',
    'Terço artesanal na cor rosa.',
    55.00,
    'terco-rosa.png',
    2
),
(
    'Terço de Madeira',
    'Terço artesanal de madeira.',
    48.00,
    'terco-madeira.png',
    2
),
(
    'Crucifixo de Madeira Entalhada',
    'Crucifixo artesanal de madeira entalhada.',
    65.00,
    'crucifixo-madeira.png',
    3
),
(
    'Crucifixo Dourado',
    'Crucifixo com acabamento dourado.',
    85.00,
    'crucifixo-dourado.png',
    3
);


-- Criando a tabela de pedidos
CREATE TABLE pedidos (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    usuario_id INTEGER NOT NULL,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(30) NOT NULL DEFAULT 'Pendente',

    CONSTRAINT fk_pedido_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
);


-- Criando a tabela dos itens de cada pedido
CREATE TABLE itens_pedido (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    pedido_id INTEGER NOT NULL,
    produto_id INTEGER NOT NULL,
    quantidade INTEGER NOT NULL DEFAULT 1,
    preco DECIMAL(10,2) NOT NULL,

    CONSTRAINT fk_item_pedido
        FOREIGN KEY (pedido_id)
        REFERENCES pedidos(id),

    CONSTRAINT fk_item_produto
        FOREIGN KEY (produto_id)
        REFERENCES produtos(id)
);


-- Conferindo os produtos e suas categorias
SELECT
    produtos.id,
    produtos.nome,
    categorias.nome AS categoria,
    produtos.preco
FROM produtos
INNER JOIN categorias
    ON produtos.categoria_id = categorias.id;
