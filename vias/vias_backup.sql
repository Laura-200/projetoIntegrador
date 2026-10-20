--
-- PostgreSQL database dump
--


-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id integer NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.categorias ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: itens_pedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.itens_pedido (
    id integer NOT NULL,
    pedido_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer DEFAULT 1 NOT NULL,
    preco numeric(10,2) NOT NULL
);


ALTER TABLE public.itens_pedido OWNER TO postgres;

--
-- Name: itens_pedido_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.itens_pedido ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.itens_pedido_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: pedidos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pedidos (
    id integer NOT NULL,
    usuario_id integer NOT NULL,
    data_pedido timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(30) DEFAULT 'Pendente'::character varying NOT NULL
);


ALTER TABLE public.pedidos OWNER TO postgres;

--
-- Name: pedidos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.pedidos ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.pedidos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(150) NOT NULL,
    descricao text,
    preco numeric(10,2) NOT NULL,
    imagem character varying(255),
    categoria_id integer NOT NULL
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.produtos ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(255) NOT NULL,
    tipo character varying(20) DEFAULT 'cliente'::character varying NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.usuarios ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, nome) FROM stdin;
1	Escapulários
2	Terços
4	Imagens religiosas
5	Artigos religiosos
3	Crucifixos
\.


--
-- Data for Name: itens_pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.itens_pedido (id, pedido_id, produto_id, quantidade, preco) FROM stdin;
10	4	1	1	35.00
11	4	4	1	45.00
12	5	2	3	35.00
13	6	2	2	35.00
14	7	2	1	35.00
15	8	2	1	35.00
16	9	2	1	35.00
17	10	2	1	35.00
18	11	2	1	35.00
19	12	2	1	35.00
20	13	2	1	35.00
21	14	2	1	35.00
22	15	2	1	35.00
23	16	10	1	85.00
24	17	2	3	35.00
25	17	4	1	45.00
26	18	2	4	35.00
27	18	5	3	40.00
28	18	7	2	55.00
\.


--
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pedidos (id, usuario_id, data_pedido, status) FROM stdin;
1	1	2026-10-06 13:57:42.100294	Pendente
2	1	2026-10-06 13:58:18.764138	Pendente
3	1	2026-10-06 13:58:20.569781	Pendente
4	1	2026-10-06 13:58:20.897847	Pendente
5	5	2026-10-06 14:48:12.178117	Pendente
6	5	2026-10-08 14:03:22.368351	Pendente
7	5	2026-10-08 14:09:01.941909	Pendente
8	5	2026-10-08 14:11:41.51366	Pendente
9	5	2026-10-08 14:14:03.701801	Pendente
10	5	2026-10-08 14:14:39.008627	Pendente
11	5	2026-10-08 14:15:30.566784	Pendente
12	5	2026-10-08 14:16:58.97616	Pendente
13	5	2026-10-08 14:18:13.494648	Pendente
14	5	2026-10-08 14:19:05.342709	Pendente
15	5	2026-10-08 14:33:46.682642	Pendente
16	7	2026-10-08 14:49:10.378607	Pendente
17	5	2026-10-08 15:01:11.232096	Pendente
18	8	2026-10-20 09:43:29.281831	Pendente
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (id, nome, descricao, preco, imagem, categoria_id) FROM stdin;
2	Escapulário Sagrado Coração de Jesus	Escapulário artesanal com a representação do Sagrado Coração de Jesus.	35.00	escapulario-sagrado-coracao.png	1
3	Escapulário Nossa Senhora	Escapulário religioso confeccionado artesanalmente.	32.00	escapulario-nossa-senhora.png	1
4	Terço Nossa Senhora	Terço para momentos de oração e devoção.	45.00	terco-azul.png	2
6	Escapulário de Fita	Escapulário artesanal de fita com imagens de Nossa Senhora do Carmo e do Sagrado Coração de Jesus.	40.00	escapulario-de-fita.png	1
7	Terço Rosa	Terço artesanal em tons de rosa com detalhes dourados para momentos de oração e devoção.	55.00	terco-rosa.png	2
8	Terço de Madeira	Terço artesanal de madeira com acabamento tradicional para momentos de oração.	48.00	terco-madeira.png	2
9	Crucifixo de Madeira Entalhada	Crucifixo decorativo de madeira com acabamento artesanal.	65.00	crucifixo-madeira.png	3
10	Crucifixo Dourado Decorativo	Crucifixo decorativo com acabamento dourado e detalhes trabalhados.	85.00	crucifixo-dourado.png	3
5	Crucifixo de Madeira	Cruz religiosa para decoração e momentos de oração.	40.00	cruz-decorativa.png	3
1	Escapulário Nossa Senhora do Carmo	Escapulário artesanal de Nossa Senhora do Carmo, confeccionado com carinho e devoção.	35.00	escapulario-nossa-senhora-do-carmo.png	1
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, nome, email, senha, tipo) FROM stdin;
2	Cliente	cliente@vias.com	$2y$12$ABLREa9tKoPMgOixmrgmaulKIB75EknrtBPj/A7k6c0ck2NlwXSea	cliente
3	Laura teste	laura.m@senai.com	$2y$12$1ky1p2FFyXUxggxlKYx5ZuwTJlIRbaxH.rOZlvmuYytavM1mxL8KW	cliente
4	Laura teste	laura.m@senai.com	$2y$12$JvnSldSCfrLMwrhPJp5R3.TEJWRSCXZxUV3aTeAf6Mh03oyCyDDUu	cliente
5	laura teste email	laura.magazil@com.br	$2y$12$.dZxwq5x0HXei5i9QNyv3eD.JOlgnC7q6oXwqFvGxXQfcADjPZ/Xi	cliente
1	Administrador	admin@vias.com	$2y$12$H3RHQ4FWt4bH5pk8tkta8ebmJijLZZFHdB8woLBKIWrWmHX582Po6	admin
6	adm teste	adm@vias.com	$2y$12$7slm/J1KiHR3kUQZtT5Fd.J/aO/Eg1..qw2b.llNX44sd4ErrQbQO	admin
7	anderson retamero	anderson@gmail.com	$2y$12$fEfWZUGKe2E9i57UNa8OQe8jPOlnXSMnRhLY0KFl6W65qZilobXMi	cliente
8	lau	lau@gmail.com	$2y$12$wpmBFJuVn9F3jzw62y/mAu.309EWVnaqBrlCMx9ro80vuFtzIosbi	cliente
\.


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 6, true);


--
-- Name: itens_pedido_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.itens_pedido_id_seq', 28, true);


--
-- Name: pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pedidos_id_seq', 18, true);


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_id_seq', 13, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 8, true);


--
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: itens_pedido itens_pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens_pedido
    ADD CONSTRAINT itens_pedido_pkey PRIMARY KEY (id);


--
-- Name: pedidos pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: itens_pedido fk_item_pedido; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens_pedido
    ADD CONSTRAINT fk_item_pedido FOREIGN KEY (pedido_id) REFERENCES public.pedidos(id);


--
-- Name: itens_pedido fk_item_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens_pedido
    ADD CONSTRAINT fk_item_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id);


--
-- Name: pedidos fk_pedido_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id);


--
-- Name: produtos fk_produto_categoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT fk_produto_categoria FOREIGN KEY (categoria_id) REFERENCES public.categorias(id);


--
-- PostgreSQL database dump complete
--


