--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.18
-- Dumped by pg_dump version 9.1.18
-- Started on 2016-02-15 23:30:14 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1904 (class 1262 OID 16386)
-- Dependencies: 1903
-- Name: ipsfa-bss; Type: COMMENT; Schema: -; Owner: gesaodin
--

COMMENT ON DATABASE "ipsfa-bss" IS 'Apoyo y Bienestar Social';


--
-- TOC entry 171 (class 3079 OID 11644)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1907 (class 0 OID 0)
-- Dependencies: 171
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 166 (class 1259 OID 20855)
-- Dependencies: 5
-- Name: anomalia; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE anomalia (
    oid integer NOT NULL,
    codigo character varying(32),
    detalle text,
    fecha timestamp without time zone,
    tipo integer,
    prioridad integer,
    estatus bigint
);


ALTER TABLE public.anomalia OWNER TO gesaodin;

--
-- TOC entry 165 (class 1259 OID 20853)
-- Dependencies: 166 5
-- Name: anomalia_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE anomalia_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.anomalia_oid_seq OWNER TO gesaodin;

--
-- TOC entry 1908 (class 0 OID 0)
-- Dependencies: 165
-- Name: anomalia_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE anomalia_oid_seq OWNED BY anomalia.oid;


--
-- TOC entry 161 (class 1259 OID 16398)
-- Dependencies: 5
-- Name: productos; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE productos (
    cod character varying(20),
    nomb character varying(250),
    obse character varying(250),
    imag character varying(250),
    oid integer NOT NULL
);


ALTER TABLE public.productos OWNER TO gesaodin;

--
-- TOC entry 164 (class 1259 OID 16429)
-- Dependencies: 5 161
-- Name: productos_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE productos_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_oid_seq OWNER TO gesaodin;

--
-- TOC entry 1909 (class 0 OID 0)
-- Dependencies: 164
-- Name: productos_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE productos_oid_seq OWNED BY productos.oid;


--
-- TOC entry 168 (class 1259 OID 29091)
-- Dependencies: 5
-- Name: semillero; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE semillero (
    oid integer NOT NULL,
    codigo character varying(16),
    certi character varying(32),
    fecha timestamp without time zone,
    tipo bigint,
    observacion character varying(250) NOT NULL,
    estatus bigint
);


ALTER TABLE public.semillero OWNER TO gesaodin;

--
-- TOC entry 167 (class 1259 OID 29089)
-- Dependencies: 168 5
-- Name: semillero_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE semillero_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.semillero_oid_seq OWNER TO gesaodin;

--
-- TOC entry 1910 (class 0 OID 0)
-- Dependencies: 167
-- Name: semillero_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE semillero_oid_seq OWNED BY semillero.oid;


--
-- TOC entry 170 (class 1259 OID 29106)
-- Dependencies: 5
-- Name: solicitud; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE solicitud (
    oid integer NOT NULL,
    codigo character varying(16) NOT NULL,
    numero character varying(16),
    certi character varying(32),
    detalle text,
    recipes text,
    fecha timestamp without time zone,
    tipo bigint,
    estatus bigint
);


ALTER TABLE public.solicitud OWNER TO gesaodin;

--
-- TOC entry 169 (class 1259 OID 29104)
-- Dependencies: 5 170
-- Name: solicitud_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE solicitud_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_oid_seq OWNER TO gesaodin;

--
-- TOC entry 1911 (class 0 OID 0)
-- Dependencies: 169
-- Name: solicitud_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE solicitud_oid_seq OWNED BY solicitud.oid;


--
-- TOC entry 163 (class 1259 OID 16408)
-- Dependencies: 5
-- Name: usuario; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE usuario (
    oid integer NOT NULL,
    tipo character(1),
    cedu integer,
    nomb character varying(256),
    apel character varying(256),
    dire character varying(256),
    seud character varying(256),
    clav character varying(64),
    corr character varying(256),
    celu character varying(14),
    telf character varying(14),
    empr character varying(256),
    pag character varying(256),
    perf character varying(32)
);


ALTER TABLE public.usuario OWNER TO gesaodin;

--
-- TOC entry 162 (class 1259 OID 16406)
-- Dependencies: 163 5
-- Name: usuario_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE usuario_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_oid_seq OWNER TO gesaodin;

--
-- TOC entry 1912 (class 0 OID 0)
-- Dependencies: 162
-- Name: usuario_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE usuario_oid_seq OWNED BY usuario.oid;


--
-- TOC entry 1781 (class 2604 OID 20858)
-- Dependencies: 166 165 166
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY anomalia ALTER COLUMN oid SET DEFAULT nextval('anomalia_oid_seq'::regclass);


--
-- TOC entry 1779 (class 2604 OID 16431)
-- Dependencies: 164 161
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY productos ALTER COLUMN oid SET DEFAULT nextval('productos_oid_seq'::regclass);


--
-- TOC entry 1782 (class 2604 OID 29094)
-- Dependencies: 168 167 168
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY semillero ALTER COLUMN oid SET DEFAULT nextval('semillero_oid_seq'::regclass);


--
-- TOC entry 1783 (class 2604 OID 29109)
-- Dependencies: 169 170 170
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY solicitud ALTER COLUMN oid SET DEFAULT nextval('solicitud_oid_seq'::regclass);


--
-- TOC entry 1780 (class 2604 OID 16411)
-- Dependencies: 162 163 163
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY usuario ALTER COLUMN oid SET DEFAULT nextval('usuario_oid_seq'::regclass);


--
-- TOC entry 1894 (class 0 OID 20855)
-- Dependencies: 166 1899
-- Data for Name: anomalia; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY anomalia (oid, codigo, detalle, fecha, tipo, prioridad, estatus) FROM stdin;
18	1	{"sexo":"true","fecha":"true","rango":"true"}	2016-02-14 09:33:23.928796	0	1	0
19	sysdb	{"Clase": "Solicitud", "Metodo": "crear()"}	2016-02-14 09:38:06.11669	1	2	0
20	1	{"sexo":"true","rango":"true"}	2016-02-14 21:15:00.405826	0	1	0
21	1	{"fecha":"true","componente":"true"}	2016-02-14 21:15:07.136338	0	1	0
22	1	{"sexo":"true","rango":"true"}	2016-02-15 23:09:22.925017	0	1	0
\.


--
-- TOC entry 1913 (class 0 OID 0)
-- Dependencies: 165
-- Name: anomalia_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('anomalia_oid_seq', 22, true);


--
-- TOC entry 1889 (class 0 OID 16398)
-- Dependencies: 161 1899
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY productos (cod, nomb, obse, imag, oid) FROM stdin;
001	Inyectadora	Inyectadora de 50cc	inyectadora.jpg	1
PAPELKRAFFRESMAP	Papel Kraff Resma Pliego	Papel Kraff Resma Pliego	PAPELKRAFFRESMAPLIEGO.jpeg	2
AE18	Aguja Espinal N18 x 100	Aguja Espinal Caja x 100	espinal18.jpg	3
AE19	Aguja Espinal N19	Caja x 100 Unidades	espinal19.jpg	4
monocirujano	Mono Cirujano  x  Und	Mono Cirujano  x  Und	monocirujano.jpeg	5
kitpaciente	KIT PACIENTE X UND	KIT PACIENTE X UND	kitpaciente.jpeg	6
GUANTEesteril6di	Guante Esteril  N6  DINAREX  X50 UDS	GUANTE ESTERIL N6  DINAREX  X50 UDS	guanteesterildynarex.jpeg	7
GASA8x4ESTERILC/	Gasa 8x4 N Esteril	Gasa 8x4 N Esteril	nodisponible.jpg	8
adhesivoleuko2	Adhesivo Leukoplast 2p x 6 uds	Adhesivo Leukoplast 2p x 6 uds	leukoplast2.jpg	9
BANDEJA PUNSIONL	Bandeja de Punsion Lumbar  BUSSE Und	Bandeja de Punsion Lumbar  BUSSE Und	bandejapuncion.jpg	10
BOBINA5KPAPELBLA	Bobina 5K Papel BLANCO	Bobina 5K Papel BLANCO	nodisponible.jpg	11
CAL SODADA LITNO	CAL SODADA LITNOLYME UND	CAL SODADA LITNOLYME UND	calsodada.jpg	12
SmithMedical22	Smith Medical 22	Jelco Smith Medical 22	smith22.jpg	13
smith20	Smith Medical 20	Jelco Smith Medical 20	smith20.jpg	14
AdhesivoMicro1x1	Adhesivo Micropore 1pul x 10YDS 12	Adhe. Micropore 1pul x 10YDS 12Unidades 3M	micropore1pul.jpg	15
kitlaparatomia	Kit de Laparatomia Und	Kit de Laparatomia Unidad	kitlaparatomia.jpg	16
sonda	Sonda Foley n° 22	Sonda Foley	sondafoley22.JPG	17
puntasazules	Puntas Azules x 500	Puntas Azules	puntasazules.jpeg	18
algodon500	Algodon 500 grs	algodon 500 grs	algodon500.jpg	19
mascaraoxigenoCA	Mascara Oxigeno Adulto Card Health UND	Mascara Oxigeno CARD HEALTH UND	mascaraoxigenoadulto.jpg	20
mascarilla	Mascarilla 4 tiras	mascarilla 4 tiras	mascarilla4tiras.jpg	21
cubrebotas01	Cubre Botas Par	Cubre Botas Par	cubrebota.jpg	22
gorroe	Gorro Enf. Bulto x 100	Gorro de Enfermera Bulto x 100	gorroenfermera.jpg	23
PapelECG50	Papel para ECG 50MM	Papel para ECG 50MM	papelparaEgc.jpg	24
MASCARA OXIG C/R	Mascara Oxig. Con ReservorioCardinal Und	Mascara Oxig. Con ReservorioCardinal Und	mascarillaoxreservorio.jpg	25
gasa100y	Gasa 100 Yardas	Gasa 100 Yardas	gasa100y.jpg	26
jeringas1cc	Jeringas 1 cc x 100	Jeringas 1 cc x 100	inyectadora1.jpg	27
compresab	Compresa laparatomia bulto x 200	Compresa laparatomia bulto x 200	compresaseris.jpg	28
NASALADULTOBIGOT	Canula Nasal Adulto Und	Canula Nasal Adulto Und	canulanasaladulto.jpg	29
CENTRODECAMADESC	Centro De Cama DESCART ECON Und	Centro De Cama DESCART ECON Und	centrocama.jpg	30
CEPILLOPARACITOL	Cepillo Para Citologia CITOCEP x 100	Cepillo Para Citologia CITOCEP x 100	cepilloscitocep.jpg	31
COMPRESAFRIAP/TE	Compresa Fria Und	Compresa Fria Und	nodisponible.jpg	32
compresa18x18gae	Compresa de Laparatomia Gaesca18X18 x500 Und	Compresa de Laparatomia Gaesca18X18 x500 Und	compresa18x18gaesca.jpg	33
kitcirujano	Kit Cirujano  x Und	Kit Cirujano  x Und	kitcirujano.jpeg	34
GUANTEESTERIL7DY	Guante Esteril N7 Dinarex X50 Uds	GUANTE ESTERIL N7 DINAREX X50 UDS	guanteesterildynarex.jpeg	35
ADHESIVOMICROPOR	AdhesivoMicropore  3pul x 4uds	AdhesivoMicropore  3pul x 4uds	micropor3pul.jpg	36
ADHESMICROPIEL1x	AdhesivoMicropore Piel 1pul x 12 Uds	AdhesivoMicropore  PIEL 1pul x 12uds	microporepiel1.jpg	37
APOSITOAUTOADHES	Aposito Auto Adhesivo EST 9CM Medac x 50uds	Aposito Auto Adhesivo EST 9CM Medac x 50uds	nodisponible.jpg	38
Esquinerocamilla	Esquinero Camilla  4 Tiras  DAV x Ud	Esquinero Camilla  4 Tiras  DAV x Und	esquinerocamilla4tiras.jpeg	39
kitlaparatomiaII	Kit de Laparatomia II	Kit de Laparatomia II	kitlaparatomiaII.jpeg	40
ORTOBAN 20CMx3YD	Ortoban 20CMx3YDS	Ortoban 20CMx3YDS	ortoban20.jpg	41
ORTOBAN 10CMx3YD	Ortoban 10CMx3YDS	Ortoban 10CMx3YDS	ortoban10.jpg	42
ORTOBAN 15CMx3YD	Ortoban 15CMx3YDS	Ortoban 15CMx3YDS	ortoban15.jpg	43
obturadoramarill	Obturador Tapa Amarilla Ansin x100 Uds	Obturador Tapa Amarilla Ansin x100 Uds	obturador.jpg	44
MICRONEBULIZADOR	Micronebulizador Ped x Und	Micronebulizador Ped x Und	nebulizadorpediatrico.jpg	45
MEDIA ANTIEMBOLI	Media Antiembolica T S N1 UND	Media Antiembolica T S N1 UND	mediaantiembo.jpg	46
MEDIA ANTIEMBOLI	Media Antiembolica T L N5 UND	Media Antiembolica T L N5 UND	mediaantiembo.jpg	47
jeringa10cc	Jeringa 10cc 21x1 caja x 100	Jeringa 10cc 21x1 caja x 100	inyectadora10.jpg	48
jeringa20cc	Jeringa 20cc 21x1 caja x 100	Jeringa 20cc 21x1 caja x 100	inyectadora20.jpg	49
cepilloquirurgic	Cepillos Quirurgicos con Germicida UND	CEPILLOS QUIRURGICOS CON GERMICIDA UND	cepilloquirurgicohospomedi.jpeg	50
clorhexidina	Gel de Clorhexidina al 2 Porciento	Gel de Clorhexidina al 2% Secure	secure.jpg	51
bolsarecolector	Bolsa Recolectora de Orina Adulto 	Bolsa Recolectora de Orina Adulto 	bolsarecolector.jpg	52
sabana	Sabana de Camilla	Sabana de Camilla	sabanacamilla.png	53
sutura4014502T	Ethilon 4-0 14502T x12	Ethilon 4-0 14502T x12	ETHILON-4-0-14502T.jpg	54
Ethilon5014501T	Ethilon 5-0 14501T x12	Ethilon 5-0 14501T x12	ETHILON-5-0-14501T.jpg	55
ethilon60160T	Ethilon 6-0 160T x12	Ethilon 6-0 160T x12	ETHILON-6-0-160T.jpeg	56
PDSII20Z339H	PDSII 2-0 Z339H	PDSII 2-0 Z339H	Ethicon_Z339H.jpg	57
PDSII4-0Z496G	PDSII 4-0 Z496G	PDSII 4-0 Z496G	ethilon-4-0-Z496G.jpg	58
PDSII4-0Z304H	PDSII 4-0 Z304H	PDSII 4-0 Z304H	ehtilon-4-0-Z304H2.jpg	59
vicrylJP494G	Vicryl 4-0 JP494G x12	Vicryl 4-0 JP494G	vicryl-4-0-JP494G.jpeg	60
jelcosmith18	Smith Medical 18	Cateter Jelco Smith Medical 18	cateter+jelco+smith+medical+18.jpg	61
llave3	llave 3 Vias	llave 3 Vias	llave-de-tres-vias-con-tubo.jpg	62
recolectororina	Recolector de Orina Dexx	Recolector de Orina Plastico	recolectororina.jpg	63
macrogoterolazer	Macrogotero Laser	Macrogotero Lazer	macrolaser.jpg	64
hipodermica21x1	Aguja Hipodermica 21x1	Aguja Hipodermica 21x1	hipodermica21x1.jpg	65
solucion 	Solución Dextrosa al 5	Solución Dextrosa	soluciondextrosa.jpg	66
curitas	Curitas Redondas 	Curitas Redondas	curitas.png	67
BAJALENGUA	Baja Lenguas Seris	Bajalenguas	bajalenguas.jpg	68
AGUJA HIPODERMIC	Aguja Hipodermica 21gx1 y Medio	Aguja Hipodermica	hipodermica.jpg	69
aguja	Aguja Hipodermica 23gx1	Aguja Hipodermica	hipodermica.jpg	70
ADHMICRO2pulx6	Adhesivo Micropore 2pul x 6uds	Adhesivo Micropore 2pul x 6uds	micropore2pul.jpg	71
gerdex240	Gerdex 240cc	Gerdex 240cc	gerdex240cc.jpg	72
vasohumidificado	Vaso Humidificador 6PCI	Vaso Humidificador 6PCI	vasohimidificador6pci.jpg	73
jeringa3cc	Jeringa 3cc caja x 100	Jeringa 3cc caja x 100	jeringa3cc.jpg	74
vasonebulizador	Vaso Nebulizador Descartable Und	Vaso Nebulizador Descartable Und	vasonebulizadordescartable.jpg	75
vendaelastica12c	Venda Elastica 12cm	Venda Elastica 12cm	vendaelastica12cm.jpg	76
ApliacadoresconA	Aplicadores Con Algodon x 200	Aplicadores de Madera con Algodon 	APLICADORES CON ALGODON.jpg	77
Equipodeobstetri	Equipo de Obstetricia x 20	Equipo de Obstetricia bt x 20	EQUIPO DE OBSTETRICIA.jpg	78
batacirujano	Bata Cirujano	Bata Cirujano	batacirujano.jpg	79
batapaciente	Bata Paciente	Bata Paciente	batapaciente.jpg	80
BASTON1PUNTO928L	Baston de 1 Punto Cromado	Baston de 1 Punto Cromado	baston1puntocromado.jpeg	81
BASTON DE 1 PUNT	Baston de 1 Punto de Aluminio	BASTON DE 1 PUNTO ALUMINIO 928L	BASTON DE 1 PUNTO ALUMINIO 928L.jpeg	82
BASTON DE 1 PUNT	Baston de 1 Punto Plegable de Bronce	Baston de 1 Punto Plegable de Bronce	BASTON DE 1 PUNTO PLEGABLE BRONCE.jpeg	83
gypsona10	Venda Yeso Gipsona 10cm x Doc	Venda Yeso Gipsona 10cm x Doc	gipsona10.jpeg	84
Venda Yeso Gipso	Venda Yeso Gipsona 15cm x Doc	Venda Yeso Gipsona 15cm x Doc	gypsona15.jpeg	85
Venda Yeso Gipso	Venda Yeso Gipsona 20cm x Doc	Venda Yeso Gipsona 20cm x Doc	gipsona20.jpeg	86
Bolsasdesechospa	Bolsas para desechos patologicos Amarillo tipo 20lts x 50 Unidades	Bolsas para desechos patologicos Amarillo tipo 20lts x 50 Unidades	bolsadesechospatologicosama.jpeg	87
CampoAbierto500U	Campo Abierto 60x50  500 Unidades	Campo Abierto 60x50  500 Unidades	campoabierto.jpeg	88
Cateter Toraxico	Cateter Toraxico N16 PRONTOMEDICA	Cateter Toraxico N16 PRONTOMEDICA	nodisponible.jpg	89
Cateter Toraxico	Cateter Toraxico N18 PRONTOMEDICA	Cateter Toraxico N18 PRONTOMEDICA	nodisponible.jpg	90
Cateter Toraxico	Cateter Toraxico N20 PRONTOMEDICA	Cateter Toraxico N20 PRONTOMEDICA	nodisponible.jpg	91
Cateter Toraxico	Cateter Toraxico N22 PRONTOMEDICA	Cateter Toraxico N22 PRONTOMEDICA	nodisponible.jpg	92
Cinta Testigo 1x	Cinta Testigo 1x 30 Y MEDITEST x 18 Unds	Cinta Testigo 1x 30 Y MEDITEST x 18 Un	cintatestigo1p.jpeg	93
Vagiprot Cubiert	Vagiprot Cubierta Protectora x 80 Unds	Vagiprot Cubierta Protectora x 80 Unds	vagiprot.jpeg	94
Tubo Endotraquea	Tubo Endotraqueal con Balon 8.5 mm x 25	Tubo Endotraqueal con Balon 8.5 mm x 25	tuboendotraqueal.png	95
Tubo Endotraquea	Tubo Endotraqueal con Balon 7.5 mm x 25	Tubo Endotraqueal con Balon 7.5 mm x 25	tuboendotraqueal.png	96
Tubo Endotraquea	Tubo Endotraqueal con Balon 7.0 mm x25 Unds	Tubo Endotraqueal con Balon 7.0 mm x25 Unds	tuboendotraqueal.png	97
Triflow Ejercita	Triflow Ejercitador respiratorio X 12Unds	Triflow Ejercitador respiratorio X 12Unds	triflow.jpeg	98
Sonda de Salem N	Sonda de Salem N10 Doble Lumen X20 Uds	Sonda de Salem N10 Doble Lumen X20 Uds	sondasalen10.png	99
Sonda de Salem N	Sonda de Salem N12 Doble Lumen x20 Unds	Sonda de Salem N12 Doble Lumen x20 Unds	sondasalen12.png	100
Sonda de Nelaton	Sonda de Nelaton N22 x100 Unds	Sonda de Nelaton N22 x100 Unds	nelaton22.png	101
Sonda de Nelaton	Sonda de Nelaton N20 x100 Unds	Sonda de Nelaton N20 x100 Unds	nelaton20.png	102
Sonda de Aliment	Sonda de Alimentacion N8 x100 Unds	Sonda de Alimentacion N8 x100 Unds	nodisponible.jpg	103
Sonda de Aliment	Sonda de Alimentacion N5 x100 Unds	Sonda de Alimentacion N5 x100 Unds	nodisponible.jpg	104
Scalp Pericranea	Scalp Pericraneal N25 x 100 Uds	Scalp Pericraneal N25 x 100 Uds	scalp25.jpeg	105
scalp23	Scalp Pericraneal N23 x 100 Uds	Scalp Pericraneal N23 x 100 Uds	scalp23.jpeg	106
Scalp Pericranea	Scalp Pericraneal N21 x 100	Scalp Pericraneal N21 x 100	scalp21.jpeg	107
Scalp Pericranea	Scalp Pericraneal N19 x 100	Scalp Pericraneal N19 x 100	scalp19.jpeg	108
Rollo de goma la	Rollo de goma latex N205 x15mts	Rollo de goma latex N205 x15mts	gomalatex.jpg	109
Rollo de goma la	Rollo de goma latex N204 x15mts	Rollo de goma latex N204 x15mts	gomalatex.jpg	110
Rollo de goma la	Rollo de goma latex N203 x15mts	Rollo de goma latex N203 x15mts	gomalatex.jpg	111
Rollo de goma la	Rollo de goma latex N202 x15mts	Rollo de goma latex N202 x15mts	gomalatex.jpg	112
Microgotero x 25	Microgotero x 25 Uds	Microgotero x 25 Uds	microgotero.jpeg	113
Hojilla de Bistu	Hojilla de Bisturi N12 x100 Uds	Hojilla de Bisturi N12 x100 Uds	bistiri12.jpeg	114
Hojilla de Bistu	Hojilla de Bisturi N21 x100 Uds	Hojilla de Bisturi N21 x100 Uds	bisturi21.png	115
guantesexamennit	Guantes Examen Nitrilo S	Guantes Examen Nitrilo S	guantesnitrilo.jpeg	116
Guantes Examen L	Guantes Examen Latex M	Guantes Examen Latex M	guantesesteriles.jpeg	117
Eyectores para s	Eyectores para saliva nacionalx 100 Uds	Eyectores para saliva nacional x 100 Uds	eyectoressaliva.jpeg	118
\.


--
-- TOC entry 1914 (class 0 OID 0)
-- Dependencies: 164
-- Name: productos_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('productos_oid_seq', 118, true);


--
-- TOC entry 1896 (class 0 OID 29091)
-- Dependencies: 168 1899
-- Data for Name: semillero; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY semillero (oid, codigo, certi, fecha, tipo, observacion, estatus) FROM stdin;
1	00000000	c4ca4238a0b923820dcc509a6f75849b	2016-02-14 23:08:35.479045	1		1
2	00000002	c4ca4238a0b923820dcc509a6f75849b	2016-02-14 23:17:33.041885	2	Pensamiento	0
\.


--
-- TOC entry 1915 (class 0 OID 0)
-- Dependencies: 167
-- Name: semillero_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('semillero_oid_seq', 2, true);


--
-- TOC entry 1898 (class 0 OID 29106)
-- Dependencies: 170 1899
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY solicitud (oid, codigo, numero, certi, detalle, recipes, fecha, tipo, estatus) FROM stdin;
1	1	00000002	c4ca4238a0b923820dcc509a6f75849b	2	2	2016-02-15 23:28:11.91527	0	0
\.


--
-- TOC entry 1916 (class 0 OID 0)
-- Dependencies: 169
-- Name: solicitud_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('solicitud_oid_seq', 5, true);


--
-- TOC entry 1891 (class 0 OID 16408)
-- Dependencies: 163 1899
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY usuario (oid, tipo, cedu, nomb, apel, dire, seud, clav, corr, celu, telf, empr, pag, perf) FROM stdin;
1	1	17522251	Carlos E.	Peña A	El Moral	MamonSoft	fb7f016949f642234b312503c784f415	gesaodin@gmail.com			MamonSoft C.A	http://www.mamonsoft.com.ve	\N
\.


--
-- TOC entry 1917 (class 0 OID 0)
-- Dependencies: 162
-- Name: usuario_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('usuario_oid_seq', 1, true);


--
-- TOC entry 1787 (class 2606 OID 29114)
-- Dependencies: 170 170 1900
-- Name: solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (codigo);


--
-- TOC entry 1785 (class 2606 OID 16416)
-- Dependencies: 163 163 1900
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (oid);


--
-- TOC entry 1906 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-02-15 23:30:15 VET

--
-- PostgreSQL database dump complete
--
