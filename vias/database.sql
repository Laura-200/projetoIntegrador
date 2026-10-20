-- Criando a tabela de usuários
CREATE TABLE usuarios (
    id INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(20) NOT NULL DEFAULT 'cliente'
);

-- Colocando usuários de teste
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES
('Maria', 'maria@email.com', '123456', 'admin'),
('João', 'joao@email.com', '123456', 'cliente');

-- Consultando os usuários
SELECT * FROM usuarios;

-- Alterando um usuário
UPDATE usuarios
SET nome = 'Maria Atualizada'
WHERE id = 1;


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

-- Consultando os produtos e suas categorias
SELECT
    produtos.id,
    produtos.nome,
    categorias.nome AS categoria,
    produtos.preco
FROM produtos
INNER JOIN categorias
    ON produtos.categoria_id = categorias.id;