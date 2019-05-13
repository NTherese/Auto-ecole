--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 11.2

-- Started on 2019-05-13 10:02:03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 208 (class 1255 OID 52446)
-- Name: ajouter_admin(text, text, integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.ajouter_admin(text, text, integer) RETURNS integer
    LANGUAGE plpgsql
    AS '
declare f_login alias for $1;
declare f_password alias for $2;
declare f_statut alias for $3;
declare id integer;
declare retour integer;

begin 
select into id id_admin from admin where login=f_login and password=f_password and statut=f_statut;
if not found then
	retour=-1;
	insert into admin(login,password,statut) values(f_login,f_password,f_statut);
	select into id id_admin from admin where login=f_login and password=f_password and statut=f_statut;
if not found then 
retour =0;
else
 retour =1;
 end if;
 else
 retour=2;
 end if;
 return retour;
 end;
';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 202 (class 1259 OID 50966)
-- Name: admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login text,
    password text,
    statut integer
);


--
-- TOC entry 201 (class 1259 OID 50964)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.admin_id_admin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 201
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 188 (class 1259 OID 50022)
-- Name: cd_rom; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cd_rom (
    cdromid integer NOT NULL,
    editeur character(32)
);


--
-- TOC entry 187 (class 1259 OID 50020)
-- Name: cd_rom_cdromid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cd_rom_cdromid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 187
-- Name: cd_rom_cdromid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cd_rom_cdromid_seq OWNED BY public.cd_rom.cdromid;


--
-- TOC entry 192 (class 1259 OID 50038)
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    clienid integer NOT NULL,
    nom character(32),
    prenom character(32),
    adresse character(32),
    datenaiss date,
    login character(25),
    password character(25),
    email character(25)
);


--
-- TOC entry 191 (class 1259 OID 50036)
-- Name: client_clienid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.client_clienid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 191
-- Name: client_clienid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.client_clienid_seq OWNED BY public.client.clienid;


--
-- TOC entry 199 (class 1259 OID 50075)
-- Name: client_examen_code; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client_examen_code (
    clienid integer NOT NULL,
    passage_codeid integer NOT NULL,
    nbrefautes integer
);


--
-- TOC entry 198 (class 1259 OID 50068)
-- Name: client_seance_code; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client_seance_code (
    clienid integer NOT NULL,
    seanceid integer NOT NULL,
    nbrefautes integer
);


--
-- TOC entry 190 (class 1259 OID 50030)
-- Name: examen_code; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.examen_code (
    passage_codeid integer NOT NULL,
    dateexamen date,
    heureexamen time(4) without time zone,
    lieuexamen character(32)
);


--
-- TOC entry 189 (class 1259 OID 50028)
-- Name: examen_code_passage_codeid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.examen_code_passage_codeid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 189
-- Name: examen_code_passage_codeid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.examen_code_passage_codeid_seq OWNED BY public.examen_code.passage_codeid;


--
-- TOC entry 196 (class 1259 OID 50054)
-- Name: seance_code; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.seance_code (
    seanceid integer NOT NULL,
    serieid integer NOT NULL,
    dateseance date,
    heureseance time(4) without time zone
);


--
-- TOC entry 186 (class 1259 OID 50013)
-- Name: serie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.serie (
    serieid integer NOT NULL,
    cdromid integer NOT NULL
);


--
-- TOC entry 200 (class 1259 OID 50126)
-- Name: faute_serie_cdrom; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.faute_serie_cdrom AS
 SELECT avg(c.nbrefautes) AS avg
   FROM ((public.client_seance_code c
     JOIN public.seance_code s ON ((c.seanceid = s.seanceid)))
     JOIN public.serie e ON ((s.serieid = e.serieid)))
  WHERE ((e.cdromid = 14) AND (e.serieid = 5));


--
-- TOC entry 194 (class 1259 OID 50046)
-- Name: question; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.question (
    questionid integer NOT NULL,
    intitule character(32),
    reponse character(32),
    niveaudif character(32),
    theme character(32)
);


--
-- TOC entry 193 (class 1259 OID 50044)
-- Name: question_questionid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.question_questionid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 193
-- Name: question_questionid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.question_questionid_seq OWNED BY public.question.questionid;


--
-- TOC entry 197 (class 1259 OID 50061)
-- Name: question_serie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.question_serie (
    questionid integer NOT NULL,
    serieid integer NOT NULL,
    numero bigint
);


--
-- TOC entry 195 (class 1259 OID 50052)
-- Name: seance_code_seanceid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.seance_code_seanceid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 195
-- Name: seance_code_seanceid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.seance_code_seanceid_seq OWNED BY public.seance_code.seanceid;


--
-- TOC entry 185 (class 1259 OID 50011)
-- Name: serie_serieid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.serie_serieid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 185
-- Name: serie_serieid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.serie_serieid_seq OWNED BY public.serie.serieid;


--
-- TOC entry 204 (class 1259 OID 51662)
-- Name: vue_client_examen_code; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_client_examen_code AS
 SELECT client_examen_code.clienid,
    client_examen_code.passage_codeid,
    client_examen_code.nbrefautes,
    examen_code.dateexamen,
    examen_code.heureexamen,
    examen_code.lieuexamen,
    client.nom,
    client.prenom,
    client.adresse,
    client.datenaiss
   FROM public.client,
    public.client_examen_code,
    public.examen_code
  WHERE ((client.clienid = client_examen_code.clienid) AND (client_examen_code.passage_codeid = examen_code.passage_codeid))
  ORDER BY client.nom;


--
-- TOC entry 203 (class 1259 OID 51658)
-- Name: vue_client_seance_code; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_client_seance_code AS
 SELECT client_seance_code.clienid,
    client_seance_code.seanceid,
    client_seance_code.nbrefautes,
    seance_code.dateseance,
    seance_code.heureseance
   FROM public.client_seance_code,
    public.seance_code
  WHERE (client_seance_code.seanceid = seance_code.seanceid)
  ORDER BY client_seance_code.nbrefautes;


--
-- TOC entry 205 (class 1259 OID 51666)
-- Name: vue_question_serie; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_question_serie AS
 SELECT question_serie.questionid,
    question_serie.serieid,
    question_serie.numero,
    question.intitule,
    question.reponse,
    question.niveaudif,
    question.theme
   FROM public.question,
    public.question_serie
  WHERE (question.questionid = question_serie.questionid)
  ORDER BY question_serie.numero;


--
-- TOC entry 206 (class 1259 OID 51670)
-- Name: vue_seance_code; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_seance_code AS
 SELECT seance_code.seanceid,
    seance_code.serieid,
    seance_code.dateseance,
    seance_code.heureseance
   FROM public.seance_code;


--
-- TOC entry 207 (class 1259 OID 51674)
-- Name: vue_serie_cd_rom; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_serie_cd_rom AS
 SELECT serie.serieid,
    serie.cdromid,
    cd_rom.editeur
   FROM public.serie,
    public.cd_rom
  WHERE (serie.cdromid = cd_rom.cdromid);


--
-- TOC entry 2085 (class 2604 OID 50969)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 2080 (class 2604 OID 50025)
-- Name: cd_rom cdromid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cd_rom ALTER COLUMN cdromid SET DEFAULT nextval('public.cd_rom_cdromid_seq'::regclass);


--
-- TOC entry 2082 (class 2604 OID 50041)
-- Name: client clienid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client ALTER COLUMN clienid SET DEFAULT nextval('public.client_clienid_seq'::regclass);


--
-- TOC entry 2081 (class 2604 OID 50033)
-- Name: examen_code passage_codeid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.examen_code ALTER COLUMN passage_codeid SET DEFAULT nextval('public.examen_code_passage_codeid_seq'::regclass);


--
-- TOC entry 2083 (class 2604 OID 50049)
-- Name: question questionid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.question ALTER COLUMN questionid SET DEFAULT nextval('public.question_questionid_seq'::regclass);


--
-- TOC entry 2084 (class 2604 OID 50057)
-- Name: seance_code seanceid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.seance_code ALTER COLUMN seanceid SET DEFAULT nextval('public.seance_code_seanceid_seq'::regclass);


--
-- TOC entry 2079 (class 2604 OID 50016)
-- Name: serie serieid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.serie ALTER COLUMN serieid SET DEFAULT nextval('public.serie_serieid_seq'::regclass);


--
-- TOC entry 2261 (class 0 OID 50966)
-- Dependencies: 202
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.admin (id_admin, login, password, statut) VALUES (1, 'admin', 'admin', 1);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (14, 'franck', 'fr', 2);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (13, 'jules', 'jules 2', 7);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (10, 'Thérèse Mérile NDZIE', '69555587', 5);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (12, 'linda', 'lin 2', 8);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (11, 'wawa', 'waa', 6);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (15, 'sylvana', 'sylv', 1);
INSERT INTO public.admin (id_admin, login, password, statut) VALUES (9, 'moi', 'lui', 5);


--
-- TOC entry 2248 (class 0 OID 50022)
-- Dependencies: 188
-- Data for Name: cd_rom; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.cd_rom (cdromid, editeur) VALUES (1, 'Sefora                          ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (2, 'Jules                           ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (3, 'Walid                           ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (4, 'Jacquemin                       ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (5, 'Laffineur                       ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (14, 'Pierre                          ');
INSERT INTO public.cd_rom (cdromid, editeur) VALUES (15, 'therese                         ');


--
-- TOC entry 2252 (class 0 OID 50038)
-- Dependencies: 192
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client (clienid, nom, prenom, adresse, datenaiss, login, password, email) VALUES (1, 'NDZIE                           ', 'Thérèse                         ', 'Rue des blancs mouchons,17,7000 ', '1997-02-19', 'TN                       ', 'moi                      ', 'nt@moi.com               ');
INSERT INTO public.client (clienid, nom, prenom, adresse, datenaiss, login, password, email) VALUES (2, 'KOUAM                           ', 'Donald                          ', 'Charleroi                       ', '1995-05-01', 'DK                       ', 'lui                      ', 'dk@moi.com               ');
INSERT INTO public.client (clienid, nom, prenom, adresse, datenaiss, login, password, email) VALUES (5, 'jacquemin                       ', 'Gregoire                        ', 'mons                            ', '2589-02-18', 'greg                     ', 'greg                     ', 'greg@jj                  ');
INSERT INTO public.client (clienid, nom, prenom, adresse, datenaiss, login, password, email) VALUES (12, 'Condorcet                       ', 'moi                             ', 'cond                            ', '0258-02-12', 'mp                       ', 'mpo                      ', 'mmdmd@llm                ');


--
-- TOC entry 2259 (class 0 OID 50075)
-- Dependencies: 199
-- Data for Name: client_examen_code; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client_examen_code (clienid, passage_codeid, nbrefautes) VALUES (1, 1, 4);


--
-- TOC entry 2258 (class 0 OID 50068)
-- Dependencies: 198
-- Data for Name: client_seance_code; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client_seance_code (clienid, seanceid, nbrefautes) VALUES (1, 1, 3);
INSERT INTO public.client_seance_code (clienid, seanceid, nbrefautes) VALUES (2, 2, 5);
INSERT INTO public.client_seance_code (clienid, seanceid, nbrefautes) VALUES (1, 2, 2);


--
-- TOC entry 2250 (class 0 OID 50030)
-- Dependencies: 190
-- Data for Name: examen_code; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (1, '2019-04-02', '19:59:00', 'Mons                            ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (2, '2019-03-31', '10:00:00', 'Bruxelles                       ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (3, '2019-03-30', '15:00:00', 'Charleroi                       ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (4, '2019-04-03', '14:00:00', 'Louvain-la-neuve                ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (8, '2019-04-28', '19:14:00', 'quaregnon                       ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (9, '2019-05-06', '09:15:00', 'quaregnon                       ');
INSERT INTO public.examen_code (passage_codeid, dateexamen, heureexamen, lieuexamen) VALUES (10, '2019-05-06', '09:15:00', 'quaregnon                       ');


--
-- TOC entry 2254 (class 0 OID 50046)
-- Dependencies: 194
-- Data for Name: question; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.question (questionid, intitule, reponse, niveaudif, theme) VALUES (1, 'question 1                      ', 'reponse 1                       ', 'facile                          ', 'theme 1                         ');


--
-- TOC entry 2257 (class 0 OID 50061)
-- Dependencies: 197
-- Data for Name: question_serie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.question_serie (questionid, serieid, numero) VALUES (1, 5, 5);


--
-- TOC entry 2256 (class 0 OID 50054)
-- Dependencies: 196
-- Data for Name: seance_code; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.seance_code (seanceid, serieid, dateseance, heureseance) VALUES (1, 5, '2019-02-21', '16:22:00');
INSERT INTO public.seance_code (seanceid, serieid, dateseance, heureseance) VALUES (2, 5, '2019-02-22', '15:00:00');


--
-- TOC entry 2246 (class 0 OID 50013)
-- Dependencies: 186
-- Data for Name: serie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.serie (serieid, cdromid) VALUES (5, 14);


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 201
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 15, true);


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 187
-- Name: cd_rom_cdromid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cd_rom_cdromid_seq', 5, true);


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 191
-- Name: client_clienid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.client_clienid_seq', 12, true);


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 189
-- Name: examen_code_passage_codeid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.examen_code_passage_codeid_seq', 10, true);


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 193
-- Name: question_questionid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.question_questionid_seq', 1, true);


--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 195
-- Name: seance_code_seanceid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.seance_code_seanceid_seq', 2, true);


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 185
-- Name: serie_serieid_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.serie_serieid_seq', 1, false);


--
-- TOC entry 2113 (class 2606 OID 50974)
-- Name: admin pk_admin; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT pk_admin PRIMARY KEY (id_admin);


--
-- TOC entry 2090 (class 2606 OID 50027)
-- Name: cd_rom pk_cd_rom; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cd_rom
    ADD CONSTRAINT pk_cd_rom PRIMARY KEY (cdromid);


--
-- TOC entry 2094 (class 2606 OID 50043)
-- Name: client pk_client; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT pk_client PRIMARY KEY (clienid);


--
-- TOC entry 2111 (class 2606 OID 50079)
-- Name: client_examen_code pk_client_examen_code; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_examen_code
    ADD CONSTRAINT pk_client_examen_code PRIMARY KEY (clienid, passage_codeid);


--
-- TOC entry 2107 (class 2606 OID 50072)
-- Name: client_seance_code pk_client_seance_code; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_seance_code
    ADD CONSTRAINT pk_client_seance_code PRIMARY KEY (clienid, seanceid);


--
-- TOC entry 2092 (class 2606 OID 50035)
-- Name: examen_code pk_examen_code; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.examen_code
    ADD CONSTRAINT pk_examen_code PRIMARY KEY (passage_codeid);


--
-- TOC entry 2096 (class 2606 OID 50051)
-- Name: question pk_question; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.question
    ADD CONSTRAINT pk_question PRIMARY KEY (questionid);


--
-- TOC entry 2103 (class 2606 OID 50065)
-- Name: question_serie pk_question_serie; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.question_serie
    ADD CONSTRAINT pk_question_serie PRIMARY KEY (questionid, serieid);


--
-- TOC entry 2099 (class 2606 OID 50059)
-- Name: seance_code pk_seance_code; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.seance_code
    ADD CONSTRAINT pk_seance_code PRIMARY KEY (seanceid);


--
-- TOC entry 2088 (class 2606 OID 50018)
-- Name: serie pk_serie; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.serie
    ADD CONSTRAINT pk_serie PRIMARY KEY (serieid);


--
-- TOC entry 2108 (class 1259 OID 50080)
-- Name: i_fk_client_examen_code_client; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_client_examen_code_client ON public.client_examen_code USING btree (clienid);


--
-- TOC entry 2109 (class 1259 OID 50081)
-- Name: i_fk_client_examen_code_examen; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_client_examen_code_examen ON public.client_examen_code USING btree (passage_codeid);


--
-- TOC entry 2104 (class 1259 OID 50073)
-- Name: i_fk_client_seance_code_client; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_client_seance_code_client ON public.client_seance_code USING btree (clienid);


--
-- TOC entry 2105 (class 1259 OID 50074)
-- Name: i_fk_client_seance_code_seance; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_client_seance_code_seance ON public.client_seance_code USING btree (seanceid);


--
-- TOC entry 2100 (class 1259 OID 50066)
-- Name: i_fk_question_serie_question; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_question_serie_question ON public.question_serie USING btree (questionid);


--
-- TOC entry 2101 (class 1259 OID 50067)
-- Name: i_fk_question_serie_serie; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_question_serie_serie ON public.question_serie USING btree (serieid);


--
-- TOC entry 2097 (class 1259 OID 50060)
-- Name: i_fk_seance_code_serie; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_seance_code_serie ON public.seance_code USING btree (serieid);


--
-- TOC entry 2086 (class 1259 OID 50019)
-- Name: i_fk_serie_cd_rom; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX i_fk_serie_cd_rom ON public.serie USING btree (cdromid);


--
-- TOC entry 2120 (class 2606 OID 50112)
-- Name: client_examen_code fk_client_examen_code_client; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_examen_code
    ADD CONSTRAINT fk_client_examen_code_client FOREIGN KEY (clienid) REFERENCES public.client(clienid);


--
-- TOC entry 2121 (class 2606 OID 50117)
-- Name: client_examen_code fk_client_examen_code_examen_cod; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_examen_code
    ADD CONSTRAINT fk_client_examen_code_examen_cod FOREIGN KEY (passage_codeid) REFERENCES public.examen_code(passage_codeid);


--
-- TOC entry 2118 (class 2606 OID 50102)
-- Name: client_seance_code fk_client_seance_code_client; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_seance_code
    ADD CONSTRAINT fk_client_seance_code_client FOREIGN KEY (clienid) REFERENCES public.client(clienid);


--
-- TOC entry 2119 (class 2606 OID 50107)
-- Name: client_seance_code fk_client_seance_code_seance_cod; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client_seance_code
    ADD CONSTRAINT fk_client_seance_code_seance_cod FOREIGN KEY (seanceid) REFERENCES public.seance_code(seanceid);


--
-- TOC entry 2116 (class 2606 OID 50092)
-- Name: question_serie fk_question_serie_question; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.question_serie
    ADD CONSTRAINT fk_question_serie_question FOREIGN KEY (questionid) REFERENCES public.question(questionid);


--
-- TOC entry 2117 (class 2606 OID 50097)
-- Name: question_serie fk_question_serie_serie; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.question_serie
    ADD CONSTRAINT fk_question_serie_serie FOREIGN KEY (serieid) REFERENCES public.serie(serieid);


--
-- TOC entry 2115 (class 2606 OID 50087)
-- Name: seance_code fk_seance_code_serie; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.seance_code
    ADD CONSTRAINT fk_seance_code_serie FOREIGN KEY (serieid) REFERENCES public.serie(serieid);


--
-- TOC entry 2114 (class 2606 OID 50082)
-- Name: serie fk_serie_cd_rom; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.serie
    ADD CONSTRAINT fk_serie_cd_rom FOREIGN KEY (cdromid) REFERENCES public.cd_rom(cdromid);


-- Completed on 2019-05-13 10:02:06

--
-- PostgreSQL database dump complete
--

