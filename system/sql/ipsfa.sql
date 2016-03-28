--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.5
-- Dumped by pg_dump version 9.4.5
-- Started on 2016-03-28 06:41:52 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 3061 (class 1262 OID 33254)
-- Dependencies: 3060
-- Name: ipsfa-bss; Type: COMMENT; Schema: -; Owner: gesaodin
--

COMMENT ON DATABASE "ipsfa-bss" IS 'Apoyo y Bienestar Social';


--
-- TOC entry 195 (class 3079 OID 12809)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3064 (class 0 OID 0)
-- Dependencies: 195
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 33255)
-- Name: _usuarioperfil; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE _usuarioperfil (
    oidu integer,
    oidp integer
);


ALTER TABLE _usuarioperfil OWNER TO gesaodin;

--
-- TOC entry 173 (class 1259 OID 33258)
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


ALTER TABLE anomalia OWNER TO gesaodin;

--
-- TOC entry 174 (class 1259 OID 33264)
-- Name: anomalia_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE anomalia_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE anomalia_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3065 (class 0 OID 0)
-- Dependencies: 174
-- Name: anomalia_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE anomalia_oid_seq OWNED BY anomalia.oid;


--
-- TOC entry 175 (class 1259 OID 33266)
-- Name: archivo; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE archivo (
    oid integer NOT NULL,
    codigo character varying(20),
    nombre character varying(250),
    coddoc integer
);


ALTER TABLE archivo OWNER TO gesaodin;

--
-- TOC entry 176 (class 1259 OID 33269)
-- Name: archivo_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE archivo_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE archivo_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3066 (class 0 OID 0)
-- Dependencies: 176
-- Name: archivo_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE archivo_oid_seq OWNED BY archivo.oid;


--
-- TOC entry 190 (class 1259 OID 41448)
-- Name: concepto_archivo; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE concepto_archivo (
    oid integer NOT NULL,
    codi character(16),
    tipo character(1),
    valo character varying(256),
    nomb character varying(256),
    esta bigint
);


ALTER TABLE concepto_archivo OWNER TO gesaodin;

--
-- TOC entry 189 (class 1259 OID 41446)
-- Name: concepto_archivo_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE concepto_archivo_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE concepto_archivo_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3067 (class 0 OID 0)
-- Dependencies: 189
-- Name: concepto_archivo_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE concepto_archivo_oid_seq OWNED BY concepto_archivo.oid;


--
-- TOC entry 194 (class 1259 OID 41470)
-- Name: notificaciones; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE notificaciones (
    oid integer NOT NULL,
    cedula character varying(32),
    codigo character varying(32),
    resumen character varying(128),
    descripcion character varying(256),
    app character varying(128),
    fecha timestamp without time zone,
    estatus integer
);


ALTER TABLE notificaciones OWNER TO gesaodin;

--
-- TOC entry 193 (class 1259 OID 41468)
-- Name: notificaciones_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE notificaciones_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE notificaciones_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3068 (class 0 OID 0)
-- Dependencies: 193
-- Name: notificaciones_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE notificaciones_oid_seq OWNED BY notificaciones.oid;


--
-- TOC entry 177 (class 1259 OID 33279)
-- Name: productos; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE productos (
    cod character varying(20),
    nomb character varying(250),
    obse character varying(250),
    imag character varying(250),
    oid integer NOT NULL
);


ALTER TABLE productos OWNER TO gesaodin;

--
-- TOC entry 178 (class 1259 OID 33285)
-- Name: productos_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE productos_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE productos_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3069 (class 0 OID 0)
-- Dependencies: 178
-- Name: productos_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE productos_oid_seq OWNED BY productos.oid;


--
-- TOC entry 179 (class 1259 OID 33287)
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


ALTER TABLE semillero OWNER TO gesaodin;

--
-- TOC entry 180 (class 1259 OID 33290)
-- Name: semillero_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE semillero_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE semillero_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3070 (class 0 OID 0)
-- Dependencies: 180
-- Name: semillero_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE semillero_oid_seq OWNED BY semillero.oid;


--
-- TOC entry 181 (class 1259 OID 33292)
-- Name: sidrofan; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE sidrofan (
    codigo character varying(255),
    nombre character varying(255),
    contenido character varying(255),
    zpreprd character varying(255),
    cforfrc character varying(255),
    cclaprd character varying(255),
    cedofis character varying(255),
    cpriact character varying(255),
    oid integer NOT NULL
);


ALTER TABLE sidrofan OWNER TO gesaodin;

--
-- TOC entry 182 (class 1259 OID 33298)
-- Name: sidrofan_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE sidrofan_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sidrofan_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3071 (class 0 OID 0)
-- Dependencies: 182
-- Name: sidrofan_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE sidrofan_oid_seq OWNED BY sidrofan.oid;


--
-- TOC entry 192 (class 1259 OID 41459)
-- Name: solicitud; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE solicitud (
    oid integer NOT NULL,
    codigo character varying(16) NOT NULL,
    numero character varying(16) NOT NULL,
    certi character varying(32),
    detalle text,
    recipes text,
    fecha timestamp without time zone,
    tipo bigint,
    estatus bigint,
    fcita date
);


ALTER TABLE solicitud OWNER TO gesaodin;

--
-- TOC entry 191 (class 1259 OID 41457)
-- Name: solicitud_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE solicitud_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE solicitud_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3072 (class 0 OID 0)
-- Dependencies: 191
-- Name: solicitud_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE solicitud_oid_seq OWNED BY solicitud.oid;


--
-- TOC entry 183 (class 1259 OID 33308)
-- Name: tdocumento; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE tdocumento (
    oid integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE tdocumento OWNER TO gesaodin;

--
-- TOC entry 184 (class 1259 OID 33311)
-- Name: tdocumento_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE tdocumento_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tdocumento_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3073 (class 0 OID 0)
-- Dependencies: 184
-- Name: tdocumento_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE tdocumento_oid_seq OWNED BY tdocumento.oid;


--
-- TOC entry 185 (class 1259 OID 33313)
-- Name: traza; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE traza (
    oid integer NOT NULL,
    cedu character varying(32),
    obse character varying(256),
    app character varying(256),
    fech timestamp without time zone,
    tipo integer
);


ALTER TABLE traza OWNER TO gesaodin;

--
-- TOC entry 186 (class 1259 OID 33319)
-- Name: traza_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE traza_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE traza_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3074 (class 0 OID 0)
-- Dependencies: 186
-- Name: traza_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE traza_oid_seq OWNED BY traza.oid;


--
-- TOC entry 187 (class 1259 OID 33321)
-- Name: usuario; Type: TABLE; Schema: public; Owner: gesaodin; Tablespace: 
--

CREATE TABLE usuario (
    oid integer NOT NULL,
    tipo character(1),
    cedu character varying(32),
    nomb character varying(256),
    seud character varying(256),
    clav character varying(64),
    corr character varying(256),
    resp character varying(256),
    empr character varying(256),
    perf character varying(32),
    pagi character varying(256),
    esta bigint
);


ALTER TABLE usuario OWNER TO gesaodin;

--
-- TOC entry 188 (class 1259 OID 33327)
-- Name: usuario_oid_seq; Type: SEQUENCE; Schema: public; Owner: gesaodin
--

CREATE SEQUENCE usuario_oid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_oid_seq OWNER TO gesaodin;

--
-- TOC entry 3075 (class 0 OID 0)
-- Dependencies: 188
-- Name: usuario_oid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gesaodin
--

ALTER SEQUENCE usuario_oid_seq OWNED BY usuario.oid;


--
-- TOC entry 2905 (class 2604 OID 33329)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY anomalia ALTER COLUMN oid SET DEFAULT nextval('anomalia_oid_seq'::regclass);


--
-- TOC entry 2906 (class 2604 OID 33330)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY archivo ALTER COLUMN oid SET DEFAULT nextval('archivo_oid_seq'::regclass);


--
-- TOC entry 2913 (class 2604 OID 41451)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY concepto_archivo ALTER COLUMN oid SET DEFAULT nextval('concepto_archivo_oid_seq'::regclass);


--
-- TOC entry 2915 (class 2604 OID 41473)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY notificaciones ALTER COLUMN oid SET DEFAULT nextval('notificaciones_oid_seq'::regclass);


--
-- TOC entry 2907 (class 2604 OID 33332)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY productos ALTER COLUMN oid SET DEFAULT nextval('productos_oid_seq'::regclass);


--
-- TOC entry 2908 (class 2604 OID 33333)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY semillero ALTER COLUMN oid SET DEFAULT nextval('semillero_oid_seq'::regclass);


--
-- TOC entry 2909 (class 2604 OID 33334)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY sidrofan ALTER COLUMN oid SET DEFAULT nextval('sidrofan_oid_seq'::regclass);


--
-- TOC entry 2914 (class 2604 OID 41462)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY solicitud ALTER COLUMN oid SET DEFAULT nextval('solicitud_oid_seq'::regclass);


--
-- TOC entry 2910 (class 2604 OID 33336)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY tdocumento ALTER COLUMN oid SET DEFAULT nextval('tdocumento_oid_seq'::regclass);


--
-- TOC entry 2911 (class 2604 OID 33337)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY traza ALTER COLUMN oid SET DEFAULT nextval('traza_oid_seq'::regclass);


--
-- TOC entry 2912 (class 2604 OID 33338)
-- Name: oid; Type: DEFAULT; Schema: public; Owner: gesaodin
--

ALTER TABLE ONLY usuario ALTER COLUMN oid SET DEFAULT nextval('usuario_oid_seq'::regclass);


--
-- TOC entry 3033 (class 0 OID 33255)
-- Dependencies: 172
-- Data for Name: _usuarioperfil; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY _usuarioperfil (oidu, oidp) FROM stdin;
\.


--
-- TOC entry 3034 (class 0 OID 33258)
-- Dependencies: 173
-- Data for Name: anomalia; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY anomalia (oid, codigo, detalle, fecha, tipo, prioridad, estatus) FROM stdin;
\.


--
-- TOC entry 3076 (class 0 OID 0)
-- Dependencies: 174
-- Name: anomalia_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('anomalia_oid_seq', 2, true);


--
-- TOC entry 3036 (class 0 OID 33266)
-- Dependencies: 175
-- Data for Name: archivo; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY archivo (oid, codigo, nombre, coddoc) FROM stdin;
\.


--
-- TOC entry 3077 (class 0 OID 0)
-- Dependencies: 176
-- Name: archivo_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('archivo_oid_seq', 30, true);


--
-- TOC entry 3051 (class 0 OID 41448)
-- Dependencies: 190
-- Data for Name: concepto_archivo; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY concepto_archivo (oid, codi, tipo, valo, nomb, esta) FROM stdin;
1	ODONT           	1	factura	Factura de Cancelacion Firmada	1
2	ODONT           	1	presupuesto	Presupuesto	1
3	ODONT           	1	informe	Informe Odontologico	1
\.


--
-- TOC entry 3078 (class 0 OID 0)
-- Dependencies: 189
-- Name: concepto_archivo_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('concepto_archivo_oid_seq', 3, true);


--
-- TOC entry 3055 (class 0 OID 41470)
-- Dependencies: 194
-- Data for Name: notificaciones; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY notificaciones (oid, cedula, codigo, resumen, descripcion, app, fecha, estatus) FROM stdin;
\.


--
-- TOC entry 3079 (class 0 OID 0)
-- Dependencies: 193
-- Name: notificaciones_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('notificaciones_oid_seq', 1, false);


--
-- TOC entry 3038 (class 0 OID 33279)
-- Dependencies: 177
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
-- TOC entry 3080 (class 0 OID 0)
-- Dependencies: 178
-- Name: productos_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('productos_oid_seq', 118, true);


--
-- TOC entry 3040 (class 0 OID 33287)
-- Dependencies: 179
-- Data for Name: semillero; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY semillero (oid, codigo, certi, fecha, tipo, observacion, estatus) FROM stdin;
1	00000000	7426affe1f6e9f4cf62dca4b8efca7a7	2016-03-12 16:08:19.263551	1		0
2	00000002	7426affe1f6e9f4cf62dca4b8efca7a7	2016-03-27 19:05:28.492662	4	Cita	0
\.


--
-- TOC entry 3081 (class 0 OID 0)
-- Dependencies: 180
-- Name: semillero_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('semillero_oid_seq', 2, true);


--
-- TOC entry 3042 (class 0 OID 33292)
-- Dependencies: 181
-- Data for Name: sidrofan; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY sidrofan (codigo, nombre, contenido, zpreprd, cforfrc, cclaprd, cedofis, cpriact, oid) FROM stdin;
A-DVIT01	A-D VIT. PREPARADOS DE CALCIO. SUSPENSION  240 ML	240ML     	SUSPENSION	SUSP	NORM	LIQU	352	1
ABILI 01	ABILIFY. ARIPRIPAZOL. TABLETAS 15MG X10TAB	15MG      	TABLETAS  	TABL	NORM	PAST	39	2
ABILIF01	ABILIFY. ARIPIPRAZOL. TABLETAS 30 MG X 10 TAB	30 MG     	TABLETAS  	TABL	NORM	PAST	39	3
ABRETI01	ABRETIA. ATOMOXETINA. TABLETAS 10MG X 7 TAB	10MG      	TAB       	TABL	NORM	TAGR	43	4
ABRETI02	ABRETIA. ATOMOXETINA. TABLETAS 18MG X 7 TAB	18MG      	TAB       	TABL	NORM	TAGR	43	5
ABRETI03	ABRETIA. ATOMOXETINA. TABLETAS 25MG X 14 TAB	25MG      	TAB       	TABL	NORM	TAGR	43	6
ABRETI04	ABRETIA. ATOMOXETINA. TABLETAS 40MG X 14 TAB	40MG      	TAB       	TABL	NORM	TAGR	43	7
ACCURE01	ACCURETIC. QUINAPRIL+HCT. TABLETAS RECUBIERTAS 20/12.5 MG X 28	20/12.5 MG	TABLETAS  	TABL	NORM	PAST	360	8
ACETA 01	ACETAMINOFEN. ACETAMINOFEN. SOLUCION GOTAS FRASCO DE 30ML	          	GOTAS     	GOTA	NORM	LIQU	7	9
ACETA 02	ACETAMINOFEN. ACETAMINOFEN. TABLETAS 650 MG X 10 TAB	650 MG    	TABLETAS  	TABL	NORM	PAST	7	10
ACETAB01	ACETAB. ACETAZOLAMIDA. TABLETAS 250MG X 20	250MG     	TABLETAS  	TABL	NORM	PAST	453	11
ACETAM01	ACETAMINOFEN. ACETAMINOFEN. TABLETAS 500 MG X 20 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	7	12
ACETAM02	ACETAMINOFEN. ACETAMINOFEN. TABLETAS 650 MG X 20 TAB	650 MG    	TABLETAS  	TABL	NORM	PAST	7	13
ACETAM03	ACETAMINOFEN. ACETAMINOFEN. JARABE 120 ML	          	JARABE    	JARA	NORM	LIQU	7	14
ACETAM04	ACETAMINOFEN. ACETAMINOFEN. SUPOSITORIOS 125 MG X 6 SUP	125MG     	SUP       	SUPO	NORM	SUPO	7	15
ACETAM05	ACETAMINOFEN. ACETAMINOFEN. SUPOSITORIOS 250 MG X 6 SUP	250MG     	SUPOSITORI	SUPO	NORM	SUPO	7	16
ACETAM06	ACETAMINOFEN. ACETAMINOFEN. TABLETAS 500 MG X 100 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	7	17
ACETAM07	ACETAMINOFEN. ACETAMINOFEN. JARABE 150 MG /5 ML X 60 ML PEDIATRICO	150 MG/5ML	JARABE    	JARA	NORM	LIQU	7	18
ACETAM08	ACETAMINOFEN. ACETAMINOFEN.  TABLETAS 500 MG X 10 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	7	19
ACICLO01	ACICLOR. ACICLOVIR. CREMA TOPICA 10 G X 5%	10G  X 5% 	CREMA     	CREM	NORM	POMA	14	20
ACICLO02	ACICLOR. ACICLOVIR. CREMA LABIAL 5% X 5 G	5% X 5G   	CREMA     	CREM	NORM	POMA	14	21
ACICLO03	ACICLOR. ACICLOVIR. POMADA OFTALMICA  3% X 4.5GR	3%        	POMADAS   	POMA	NORM	POMA	14	22
ACICLO04	ACICLOR. ACICLOVIR. TABLETAS 200 MG X 15 TAB	200 MG    	TAB       	TABL	NORM	PAST	14	23
ACICLO05	ACICLOR. ACICLOVIR. COMPRIMIDO 800 MG	800MG     	TAB       	TABL	NORM	PAST	14	24
ACICLO06	ACICLOR. ACICLOVIR. COMPRIMIDO 400 MG X 10 COMP	400 MG    	COMPRIMIDO	COMP	NORM	PAST	14	25
ACICLO07	ACICLOR. ACICLORVIR. COMPRIMIDO 1 G X 10 TAB	1G        	TAB       	TABL	NORM	PAST	14	26
ACICLO08	ACICLOR. ACICLOVIR. SUSPENSION 200MG/5ML FRASCO 60ML	200MG     	SUSPENSION	SUSP	NORM	LIQU	14	27
ACICLO09	ACICLOR. ACICLOVIR. TABLETAS DE 200 MG X 25 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	0	28
ACID M01	ACID MANTLE. ACETATO DE ALUMINIO. LOCION 0.059G X 400ML	0.059G    	LOCION    	LOCI	NORM	POMA	11	29
ACID M02	ACID MANTLE. ACETATO DE ALUMINIO.  LOCION X 120ML	120ML     	LOCION    	LOCI	NORM	LIQU	11	30
ACIDMA01	ACID MANTLE. ACETATO DE ALUMINIO. CREMA 0.05 G X 20 G	0.05 G    	CREMA     	CREM	NORM	POMA	11	31
ACIDMA02	ACID MANTLE. ACETATO DE ALUMINIO. LOCION  0.059 G X 60 ML	0.059G    	LOCION    	LOCI	NORM	POMA	11	32
ACIDOA01	ACIDO ALENDRONICO. ACIDO ALENDRONICO. TABLETAS 70 MG X 2 TAB	70 MG     	TABLETAS  	TABL	NORM	PAST	21	33
ACIDOA02	ACIDO ALENDRONICO. ACIDO ALENDRONICO. 70MG X 4 TABLETAS	70MG      	TABLETAS  	TABL	NORM	PAST	21	34
ACIDOF01	ACIDO FÓLICO. ACIDO FOLICO. TABLETAS 10 MG X 30 TAB	10MG      	TAB       	TABL	NORM	PAST	17	35
ACIDOF02	ACIDO FÓLICO. ACIDO FOLICO. CAPSULAS 5 MG X 20 CAP	5 MG      	TABLETAS  	CAPS	NORM	PAST	17	36
ACIDOF03	ACIDO FÓLICO. ACIDO FOLICO. GOTAS 10MG/ML  X 15 ML	          	GOTAS     	GOTA	NORM	GOTA	17	37
ACIDOF04	ACIDO FOLICO. ACIDO FOLICO. TABLETAS 10MG X 20 TAB	10MG      	TABLETAS  	TABL	NORM	PAST	17	38
ACLOV 01	ACICLOVIR. ACICLOVIR. TABLETAS 200 MG X 25 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	14	39
ACLOV 02	ACICLOVIR. ACICLOVIR. CREMA LABIAL  5 % X 5 G	5 %       	CREMA     	CREM	NORM	POMA	14	40
ACRYLA01	ACRYLARM. ACIDO POLIACRILICO. GEL OFATLMICO 10G	2MG       	GEL OFTALM	GEL 	NORM	LIQU	336	41
ACTONE01	ACTONEL. RISEDRONATO SODICO. TABLETAS 35 MG X 2 TAB	35 MG     	TABLETAS  	TABL	NORM	PAST	374	42
ACTOS 01	ACTOS. PIOGLITAZONA. TABLETAS 15 MG X 15TAB	15MG      	TAB       	TABL	NORM	PAST	331	43
ACTOS 02	ACTOS. PIOGLITAZONA. TABLETAS 30 MG X 15 TAB	30MG      	TAB       	TABL	NORM	PAST	331	44
ACTOSM01	ACTOS MET. PIOGLITAZONA+METFORMINA. TABLETAS 15 MG/ 500 MG X 30 TAB	15/500 MG 	TABLETAS  	TABL	NORM	PAST	331	45
ACTOSM02	ACTOS MET. PIOGLITAZONA+METFORMINA. TABLETAS 15 MG / 850 MG X 30 TAB	15/850 MG 	TABLETAS  	TABL	NORM	PAST	562	46
ACUTEN01	ACUTEN. ACETAMINOFEN+CODEINA. TABLETAS  500MG/25MG X 20 TABLETAS	500MG/25MG	TABLETAS  	TABL	NORM	PAST	10	47
ADACAI01	ADACAI. AZETIMIBA. TABLETAS 10/80MG X 14TAB	10/80MG X1	TAB       	TABL	NORM	PAST	177	48
ADACAI02	ADACAI. AZETIMIBA.TABLETAS 10/10MG X 14 TAB	10/10MG   	TAB       	TABL	NORM	PAST	177	49
ADACAI03	ADACAI. AZETIMIBA. TABLETAS 10/20MG TAB	10/20MG   	TAB       	TABL	NORM	PAST	177	50
ADACAI04	ADACAI. AZETIMIBA.  TABLETAS  10/40MG X 14TAB	10/40     	TAB       	TABL	NORM	PAST	177	51
ADALAT01	ADALATOROS. NIFEDIPINA. TABLETAS 20 MG X 16 TABLETAS	20MG      	TABLETAS  	TABL	NORM	PAST	297	52
ADALAT02	ADALATOROS. NIFEDIPINA. TABLETAS 30 MG X 7 TAB	30 MG     	TABLETAS  	TABL	NORM	PAST	297	53
ADALAT03	ADALATOROS. NIFEDIPINA. TABLETAS 60 MG X 7 TAB	60MG      	TAB       	TABL	NORM	PAST	297	54
ADALAT04	ADALATOROS. NIFEDIPINA. TABLETAS 30MG X 14 TABLETAS	30MG      	TABLETAS  	TABL	NORM	PAST	297	55
ADALAT05	ADALATOROS. NIFEDIPINA. TABLETAS 60MG X 14 TABLETAS	60MG      	TABLETAS  	TABL	NORM	PAST	297	56
ADOLEN01	ADOLEN. ACETAMINOFEN+CAFEINA. TABLETAS 250MG / 65 MG X 20 TABLETAS	250 MG/65 	TABLETAS  	TABL	NORM	PAST	10	57
ADVANT01	ADVANTAN. ACEPONATO DE METILPREDNISOLONA. CREMA X  15 G	          	15G       	CREM	NORM	POMA	6	58
ADVANT02	ADVANTAN. ACEPONATO DE METILPREDNISOLONA. CREMA 0.1 % X 15 G	0.1%      	CREMA     	EMUL	NORM	POMA	6	59
ADVANT03	ADVANTAN. ACEPONATO DE METILPREDNISOLONA. CREMA DE 0.1 % X 20G	0.1% X20MG	CREMA     	CREM	NORM	POMA	0	60
AFLARE01	AFLAREX. FLUOROMETALONA ACETATO. SUSPENSION OFTALMICA 0.1% X 5 ML	0.1%      	GOTAS     	GOTA	NORM	GOTA	190	61
AFOKLI01	AFOKLIN. ACIDO FOLICO. GOTAS 10MG/ML X 15ML	10MG/ML   	SOL GOTAS 	GOTA	NORM	GOTA	17	62
AFOKLI02	AFOKLIN. ACIDO FOLICO. COMPRIMIDOS 5 MG X 20 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	17	63
AFRIN 01	AFRIN. CLORIHIDRATO DE OXIMETAZOLINA. FRASCO 15 ML	15ML      	GOTAS     	GOTA	NORM	GOTA	122	64
AGURIN01	AGURIN. PARACETAMOL. COMPRIMIDOS 1 G	1G        	TAB       	TABL	NORM	PAST	320	65
AIRON 01	AIRON. MONTELUKAST SODICO. TABLETAS MASTICABLES 4 MG X 10 TABLETAS	4 MG      	TABLETAS  	TABL	NORM	PAST	288	66
AIRON 02	AIRON. MONTELUKAST SODICO. TABLETAS  MASTICABLES 4 MG  X 30 TAB	4 MG      	TABLETAS  	TABL	NORM	PAST	288	67
AIRON 03	AIRON. MONTELUKAST SODICO. TABLETAS 10 MG X10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	288	68
AIRON 04	AIRON. MONTELUKAST SODICO. TABLETAS 10 MG  X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	288	69
AIRON 05	AIRON. MONTELUKAST SODICO. TABLETAS  MASTICABLES 5 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	288	70
AIRON 06	AIRON. MONTELUKAST SODICO. TABLETAS MASTICABLES 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	288	71
AKINE 01	AKINETON. CLORHIDRATO DE BIPERIDENO. LP 4MG TABLETAS	4MG       	TABLETAS  	TABL	NORM	PAST	461	72
AKINET01	AKINETON. CLORHIDRATO DE BIPERIDENO. TABLETAS 2MG	2MG       	TABLETAS  	TABL	NORM	PAST	461	73
ALB   01	ALBENDAZOL. ALBENDAZOL. SUSPENSION 40MG/ML X 20 ML	400MG     	SUSPENSION	SUSP	NORM	LIQU	20	74
ALB   02	ALBENDAZOL. ALBENDAZOL. SUSP 100MG/5ML X 20 ML	100 MG    	SUSPENSION	SUSP	NORM	LIQU	20	75
ALBEND01	ALBENDAZOL. ALBENDAZOL. TABLETAS 400 MG	400MG     	TAB       	TABL	NORM	PAST	20	76
ALBEND02	ALBENDAZOLE. ALBENDAZOL. SUSPENSION 400 MG / 10 ML	400 MG / 1	SUSPENSION	SUSP	NORM	LIQU	20	77
ALBEND03	ALBENDAZOL. ALBENDAZOL. TABLETAS 200MG X 6 TAB	200MG     	TAB       	TABL	NORM	PAST	20	78
ALBEND04	ALBENDAZOL. ALBENDAZOL. TABLETAS 200 MG X 2 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	20	79
ALDAC 01	ALDACTAZIDA. ESPIRONOLACTONA+HIDROCLOROTIAZIDA. TABLETAS 25MG X 10 TAB	25MG      	TABLETAS  	TABL	NORM	TAGR	497	80
ALDAC 02	ALDACTAZIDA. ESPIRONOLACTONA+HIDROCLOROTIAZIDA. TABLETAS 25MG X 30 TAB	25MG      	TAB       	TABL	NORM	PAST	497	81
ALDACT01	ALDACTONE. ESPIRONOLACTONA. TABLETAS 25 MG X 20 TAB	25MG      	TAB       	TABL	NORM	PAST	167	82
ALDACT02	ALDACTONE. ESPIRONOLACTONA. TABLETAS 100 MG X 30 TAB	100MG     	TAB       	TABL	NORM	PAST	167	83
ALDACT03	ALDACTONE. ESPIRONOLACTONA. TAB 100 MG X 10 TAB	100MG     	TABLETA   	TABL	NORM	PAST	167	84
ALDOME01	ALDOMET. METILDOPA. TABLETAS 250 MG X 30 TABLETAS	250MG     	TABLETAS  	TABL	NORM	PAST	279	85
ALENDR01	ALENDRONATO SODICO. ALENDRONATO SODICO. TABLETAS 70 MG X 4 TAB	70MG      	TABLETAS  	TABL	NORM	PAST	21	86
ALERGO01	ALERGOT. AZELASTINA. SOL OFTALMICA 0.05% X 5 ML	0.05%     	GOTAS     	GOTA	NORM	GOTA	46	87
ALEVIA01	ALEVIAN DUO. PINAVERIO+DIMETICONA. TABLETAS 100/300MG X 16 CAPSULAS BL	100/300MG 	CAPSULAS  	CAPS	NORM	PAST	523	88
ALEVIA02	ALEVIAN DUO TAB 100/300 MG X 32 TABLETAS	100/300 MG	TABLETAS  	TABL	NORM	PAST	523	89
ALGORE01	ALGOREN. PROPANOLOL. TABLETAS 10 MGX 20 TABLETAS	10 MG     	TABLETAS  	TABL	NORM	PAST	356	90
ALGORE02	ALGOREN. PROPANOLOL. TABLETAS 40 MG X 20 TAB	40MG      	TABLETAS  	TABL	NORM	PAST	356	91
ALGORE03	ALGOREN. PROPANOLOL. TABLETAS 80 MG X 20 TAB	80 MG X 20	TABLETAS  	TABL	NORM	PAST	356	92
ALLERG01	ALLERGODIL. AZELASTINA. ATOMIZADOR NASAL X 5ML	5ML       	ATOMIZADOR	AERO	NORM	LIQU	46	93
ALOVEN01	ALOVENT. IPATROPIIO BROMURO. AEROSOL DOSIFICADOR 10 ML X 300 DOSIS	10ML      	AEROSOL   	AERO	NORM	LIQU	233	94
ALOVEN02	ALOVENT. IPATROPIO BROMURO. SOLUCION PARA INHALAR  0.25 MG/ML FCO  X 2	20 ML     	SOLUCION  	SOLI	NORM	LIQU	233	95
ALOVEN03	ALOVENT. IPATROPIO BROMURO. HFA SOLUCION AEROSOL 20 MCG / 200 DOSIS X	20MCG/200D	AEROSOL   	AERO	NORM	LIQU	233	96
ALPHAG01	ALPHAGAN P. BRIMONIDINA TARTRATO. SOLUCION OFTALMICA AL 0.15% X 5 ML	0.15%     	GOTAS     	SOLI	NORM	GOTA	68	97
ALPHAG02	ALPHAGAN. BRIMONIDINA TARTRATO. SOLUCION OFTALMICA AL 0.2% X 5ML	0.2%      	GOTAS     	GOTA	NORM	GOTA	68	98
ALPRA 01	ALPRAZOLAM TABLETAS 1MG X 30 TABLETAS	1MG       	TABLETAS  	TABL	NORM	PAST	455	99
ALPRAZ01	ALPRAZOLAM COMPRIMIDOS 0.5MG X 30 COMPRIMIDOS	0.5MG     	COMPRIMIDO	COMP	NORM	PAST	455	100
ALTAC101	ALTACE PLUS. RAMIPRIL+CLOROTIAZIDA. TABLETAS 5/25MG X 15 TABLETAS	5/25MG    	TABLETAS3 	TABL	NORM	PAST	366	101
ALTAC102	ALTACE PLUS. RAMIPRIL+CLOROTIAZIDA. TABLETAS 2.5/12.5 MG X 15 TABLETAS	2.5/12.5MG	TABLETAS  	TABL	NORM	PAST	366	102
ALTACE01	ALTACE. RAMIPRIL. COMPRIMIDOS 10 MG X 15 COMPRIMIDOS	10 MG     	COMPRIMIDO	TABL	NORM	PAST	365	103
ALTACE02	ALTACE. RAMIPRIL. COMPRIMIDOS 2.5 MG X 15 COMPRIMIDOS	2.5 MG    	COMPRIMIDO	TABL	NORM	PAST	365	104
ALTACE03	ALTACE. RAMIPRIL. COMPRIMIDOS 5 MG X 15 COMPRIMIDOS	5 MG      	COMPRIMIDO	COMP	NORM	PAST	365	105
ALTACO01	ALTACOR. RAMIPRIL+FELODIPINA. TABLETAS L.P 5 MG/5MG X 15 TABLETAS	5/5 MG    	TABLETAS  	TABL	NORM	PAST	367	106
ALURON01	ALURON. ALOPURINOL. TABLETAS 100 MG X 30 TABLETAS	100MG     	TABLETAS  	TABL	NORM	PAST	26	107
ALVESC01	ALVESCO. CICLESONIDA DESISOBUTIRIL. INHALADOR 80 MCG X 60 DOSIS	80MCG     	INHALADOR 	AERO	NORM	GOTA	100	108
ALVESC02	ALVESCO. CICLESONIDA DESISOBUTIRIL. INHALADOR 80 MCG X 120 DOSIS	80MCG     	INHALADOR 	AMPO	NORM	GOTA	100	109
ALVESC03	ALVESCO. CICLESONIDA DESISOBUTIRIL. INHALADOR 160 MCG X 60 DOSIS	160 MCG   	INHALADOR 	AERO	NORM	GOTA	100	110
AM    01	AMOXICILINA. AMOXICILINA. SUSPENSION 250MG/5ML X 60 ML	250MG     	SUSPENSION	SUSP	NORM	LIQU	35	111
AMAR  01	AMARYL M TABLETAS 2MG/1000 X 16 COMP	2MG/1000  	TAB       	TABL	NORM	PAST	206	112
AMAR  02	AMARYL. GLIMEPIRIDE. TABLETAS 2MG X 15 TABLETAS	2MG       	TAB       	TABL	NORM	PAST	206	113
AMAR  03	AMARYL. GLIMEPIRIDE. TABLETAS 4MG X 15 TAB	4MG       	TAB       	TABL	NORM	PAST	206	114
AMARYL01	AMARYL M. GLIMEPIRIDE+METFORMINA. TABLETAS  2MG/500 MG X 30 TABLETAS	2MG/500MG 	TABLETAS  	TABL	NORM	PAST	207	115
AMARYL02	AMARYL M. GLIMEPIRIDA+METFORMINA. COMPRIMIDOS 2 MG/1000 MG X 16 COMP	2MG/1000MG	COMPRIMIDO	COMP	NORM	PAST	207	116
AMBRO 01	AMBROXOL. AMBROXOL. JARABE PEDIATRICO 15 MG/5 ML X 120 ML	15MG/5ML  	JARABE    	JARA	NORM	LIQU	30	117
AMBRO 02	AMBROXOL. AMBROXOL. JARABE ADULTO 30MG/5ML X 120 ML	30MG/5ML  	JARABE    	JARA	NORM	LIQU	30	118
AMBROC01	AMBROCLAR. AMBROXOL+LORATADINA. TABLETAS 5MG /30 MG X 10 TAB	5/30 MG   	TABLETAS  	TABL	NORM	PAST	29	119
AMBROC02	AMBROCLAR. AMBROXOL+LORATADINA. GOTAS 5MG-30MG /5ML  X 15 ML	15ML      	GOTAS     	GOTA	NORM	GOTA	29	120
AMBROC03	AMBROCLAR. AMBROXOL+LORATADINA. JARABE 5MG/30MG/5ML X 60ML	5/30MG /5M	JARABE    	JARA	NORM	LIQU	29	121
AMBROX01	AMBROXOL + CLENBUTEROL. AMBROXOL+CELNBUTEROL. JARABE PEDIATRICO 7.5 MG	0.005/7.5M	JARABE    	JARA	NORM	LIQU	28	122
AMBROX02	AMBROXOL + CLENBUTEROL. AMBROXOL+CLENBUTEROL. JARABE ADULTO 15 MG-0.01	120ML     	JARABE    	JARA	NORM	LIQU	28	123
AMBROX03	AMBROXOL + CLENBUTEROL. AMBROXOL+CLENBUTEROL. ELIXIR X 120 ML	120ML     	JARABE    	JARA	NORM	LIQU	28	124
AMIODA01	AMIODARONA. AMIODARONA. TABLETAS  200 MG  X 10  TABLETAS	200 MG    	TABLETAS  	TABL	NORM	PAST	31	125
AML   01	AMLODIPINA. AMLODIPINA.  TABLETAS 10MG X 30TAB	10MG      	TAB       	TABL	NORM	PAST	32	126
AMLIBO01	AMLIBON B. AMLODIPINA+BENAZEPRIL. TABLETAS 5MG/10MGX 30 TABLETAS	5MG-10MG  	TABLETAS  	TABL	NORM	PAST	456	127
AMLIP 01	AMLIP. AMLODIPINA. COMPRIMIDOS 10MG X 30COMPRIMIDOS	10MG      	COMPRIMIDO	COMP	NORM	PAST	32	128
AMLIP 02	AMLIP. AMLODIPINA. COMPRIMIDOS 5 MG X 10 TAB	5 MG      	COMPRIMIDO	COMP	NORM	PAST	32	129
AMLIP 03	AMLIP. AMLODIPINA. 5MG X 10 COMPRIMIDOS	5MG       	COMPRIMIDO	COMP	NORM	PAST	32	130
AMLOD 01	AMLODIPINA. AMLODIPINA. TAB 5 MG X 10 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	32	131
AMLOD 02	AMLODIPINA. AMLODIPINA. TAB 10 MG X  10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	32	132
AMLOD 03	AMLODIPINA. AMLODIPINA. TABLETAS  10MG X 20TAB	10MG      	TABLETAS  	TABL	NORM	PAST	32	133
AMO   01	AMOXICILINA. AMOXICILINA. CAPSULAS 250MG X 6 CAP	250MG     	CAPSULAS  	CAPS	NORM	PAST	35	134
AMOCI 01	AMOXICILINA. AMOXICILINA. SUSPENSION 750MG / 5ML X 70ML  POLVO PARA SU	750MG     	P/PSUSP   	SUSP	NORM	LIQU	35	135
AMOCI 02	AMOXICILINA. AMOXICILINA. SUSPENSION 250 MG/5 ML FCO 60 ML	250 MG    	SUSPENSION	SUSP	NORM	LIQU	35	136
AMOVIN01	AMOVIN. AZITROMICINA. TABLETAS RECUBIERTAS 500 MG X 6 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	449	137
AMOVIN02	AMOVIN. AZITROMICINA. TABLETAS 500 MG X 3 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	449	138
AMOXC 01	AMOXICILINA. AMOXICILINA.  P/P SUSPENSION 125 MG/5 ML FCO  X 45 ML	125MG/5ML 	P/P SUSP  	POLV	NORM	LIQU	35	139
AMOXI 01	AMOXICILINA. AMOXICILINA. CAPSULAS 750MG X 10 CAPSULAS	750MG     	CAPSULAS  	CAPS	NORM	PAST	35	140
AMOXIC01	AMOXICILINA. AMOXICILINA. CAPSULAS 500 MG X 6 CAP	500MG     	CAPSULAS  	CAPS	NORM	PAST	35	141
AMPICI01	AMPICILINA. AMPICILINA. SUSPENSION  250MG X 60 ML	          	          	AMPO	NORM	AMPO	37	142
AMPICI02	AMPICILINA. AMPICILINA. CAPSULAS 500 MG X 8 CAPSULAS	500MG     	CAPSULAS  	CAPS	NORM	PAST	37	143
AMPICI03	AMPICILINA. AMPICILINA. POLVO PARA SUSPENSION 125 MG/5 ML FCO X 60 ML	125MG/5ML 	P/P SUSPEN	SUSP	NORM	LIQU	37	144
AMPICI04	AMPICILINA. AMPICILINA. POLVO PARA SUSPENSION 250 MG/5ML  X 60 ML	250 MG    	P/P SUSPEN	POLV	NORM	TAGR	37	145
AMPICI05	AMPICILINA. AMPICILINA. CAPSULAS 500MG X 16 TAB	500MG     	CAP       	CAPS	NORM	PAST	37	146
AMPICI06	AMPICILINA. AMPICILINA. CAPSULA 250MG X 8 CAPSULAS	250MG     	CAPSULAS  	CAPS	NORM	PAST	37	147
ANAL  01	ANALPER PLUS. HIOSCINA N-BUTILBROMURO+CAETAMINOFEN. TABLETA 500MG X 10	500MG     	TAB       	TABL	NORM	PAST	222	148
ANALPE01	ANALPER FEM. IBUPROFENO. TABLETAS 200MG X 10 TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	224	149
ANASMO01	ANASMOL.WARFARINA SODICA. COMPRIMIDOS 5 MG X 20 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	440	150
ANASMO02	ANASMOL. WARFARINA SODICA. COMPRIMIDOS 2.5 MG X 20 COMP	2.5 MG    	COMPRIMIDO	COMP	NORM	PAST	440	151
ANASMO03	ANASMOL. WARFARINA SODICA. TABLETAS 2.5MG X 10 TAB	2.5MG     	TABLETAS  	TABL	NORM	PAST	440	152
ANASMO04	ANASMOL. WARFARINA SODICA. TABLETAS 5MG X 10 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	440	153
ANASMO05	ANASMOL. WARFARINA SODICA. COMPRIMIDOS 2.5 MG X 30 COMPRIMIDOS	2.5 MG    	COMP      	COMP	NORM	PAST	440	154
ANDANT01	ANDANTOL. ISOTIPENDYL.  JALEA X 20 G	20 G      	JALEA     	JALE	NORM	POMA	239	155
ANTUX 01	ANTUX. LEVODROPROPICINA. SOLUCION  0.06%  X 180 ML	0.06% 180 	SOLUCION  	SOLI	NORM	LIQU	258	156
ANTUX 02	ANTUX. LEVODROPROPICINA. GOTAS  6% X 30 ML	6%        	GOTAS     	GALL	NORM	GOTA	258	157
ANTUX 03	ANTUX. LEVODROPROPICINA. SOLUCION  0.6% X 120 ML	0.6%      	SOLUCION  	SOLI	NORM	LIQU	258	158
APRON 01	APRONAX. NAPROXENO SÓDICO. TAB 550 MG X 10 TABLETAS	550 MG    	TABLETAS  	TABL	NORM	PAST	292	159
APRON 02	APRONAX. NAPROXENO SÓDICO. TAB  275 MG X 10 TABLETAS	275 MG    	TABLETAS  	TABL	NORM	PAST	292	160
APROVE01	APROVEL. IRBESARTAN. TABLETAS 150 MG X 14 TAB	150 MG    	TABLETAS  	TABL	NORM	PAST	235	161
APROVE02	APROVEL. IRBESARTAN. TABLETAS 300 MG X 14 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	235	162
ARANDA01	ARANDA. LOSARTÁN + AMLODIPINA. CAPSULAS 2.5 MG / 50 MG X 18 CAP	2.5 MG/ 50	CAPSULAS  	CAPS	NORM	PAST	267	163
ARANDA02	ARANDA. LOSARTÁN + AMLODIPINA. CAPSULAS 5 MG/100MG X 18  CAP	100MG/5MG 	CAPSULAS  	AMPO	NORM	PAST	267	164
ARCALI01	ARCALION. SULBUTIAMINA. GRAGEAS 200 MG X 20 GRAGEAS	200MG     	GRAGEAS   	GRAG	NORM	PAST	389	165
ARIXTR01	ARIXTRA. FONDAPARINUX SÓDICO. AMPOLLAS  2.5 MG/0.5 ML X 2	2.5 MG/0.5	AMPOLLAS  	AMPO	NORM	AMPO	193	166
ARTHR 01	ARTHROTEC. DICLOFENAC SÓDICO + MI SOPROSTOL. 75MG/200MCG X 20 TAB	75MG/200MC	TAB       	TABL	NORM	TAGR	481	167
ARTHRO01	ARTHROTEC. DICLOFENAC SÓDICO + MISOPROSTOL.TABELTAS  LC 50 MG/200MCG X	50MG/200MC	TABLETAS  	TABL	NORM	TAGR	481	168
ARTROD01	ARTRODAR. DIACEREINA. CAPSULAS  50 MG X 10 CAPSULAS	50 MG     	CAPSULAS  	CAPS	NORM	PAST	140	169
ASAPRO01	ASAPROL. ACIDO ACETIL SALICÍLICO. 81MG COMPRIMIDOS X 30 COMPRIMIDOS	81MG      	COMPRIMIDO	COMP	NORM	PAST	7	170
ASMANE01	ASMANEX. FUROATO DE MOMETASONA. DISPENSADOR ORAL 200 MCG X 30 DOSIS	200MCG    	DISPENSADO	AERO	NORM	LIQU	198	171
ASPI  01	ASPIRINA BAYER. ACIDO ACETIL SALICÍLICO.  TABLETAS 100MG X 28TABLETAS	100MG     	TABLETAS  	TABL	NORM	PAST	576	172
ASPIRI01	ASPIRINA INFANTIL. ACIDO ACETIL SALICÍLICO. TABLETAS 100 MG X 20 TABLE	100 MG    	TABLETAS  	TABL	NORM	PAST	13	173
ATAC  01	ATACAND. CANDESARTÁN. TABLETAS 8 MG X 14 TAB	8 MG      	TAB       	TABL	NORM	PAST	81	174
ATAC  02	ATACAND. CANDESARTÁN. TABLETAS 16 MG X 14 TAB	16 MG     	TAB       	TABL	NORM	PAST	81	175
ATAC  03	ATACAND. CANDESARTÁN. TABLETAS 32 MG X 14 TAB	32 MG     	TAB       	TABL	NORM	PAST	81	176
ATACAN01	ATACAND PLUS. CANDESARTÁN + HIDROCLOROTIAZIDA. TABLETAS 16MG/12.5MG X	16MG/12.5M	TABLETAS  	TABL	NORM	PAST	81	177
ATE   01	ATENOLOL. ATENOLOL. TABLETAS 100 MG X 30 TABLETAS	100MG     	TABLETAS  	TABL	NORM	PAST	41	178
ATE   02	ATENOLOL. ATENOLOL. TABLETAS 50 MG X 30 TABLETAS	50 MG     	TABLETAS  	TABL	NORM	PAST	41	179
ATENOL01	ATENOLOL + CLORTALIDONA. ATENOLOL + CLORTALIDONA. TABLETAS  50MG/12.5M	50MG/12.5M	TABLETAS  	TABL	NORM	PAST	42	180
ATENOL02	ATENOLOL + CLORTALIDONA. ATENOLOL + CLORTALIDONA. TABLETAS 100MG/25MG	100MG/25MG	TABLETAS  	TABL	NORM	PAST	42	181
ATENOL03	ATENOLOL + CLORTALIDONA TABLETAS 50 MG/25 MG X 20 TAB	50 MG/25MG	TABLETAS  	TABL	NORM	PAST	42	182
ATIVAN01	ATIVAN. LORAZEPAM. TABLETAS 1 MG  X 30 TABLETAS	1 MG      	TABLETAS  	TABL	NORM	PAST	571	183
ATIVAN02	ATIVAN. LORAZEPAM. TABLETAS  2 MG  X 30 TABLETAS	2 MG      	TABLETAS  	TABL	NORM	PAST	571	184
ATORVA01	ATORVASTATINA. ATORVASTATINA.COMPRIMIDOS 10 MG X 14 COMPRIMIDOS	10 MG     	COMPRIMID 	TABL	NORM	PAST	44	185
ATORVA02	ATORVASTATINA. ATORVASTATINA. COMPRIMIDOS 20 MG X 10 COMPRIMIDOS	20MG      	COMPRIMIDO	TABL	NORM	PAST	44	186
ATORVA03	ATORVASTATINA. ATORVASTATINA. COMPRIMIDOS 40 MG X 14 COMPRIMIDOS	40MG      	COMPRIMIDO	TABL	NORM	PAST	44	187
ATORVA04	ATORVASTATINA COMPRIMIDOS 80 MG X 14 COMPRIMIDOS	80MG      	COMPRIMIDO	TABL	NORM	PAST	44	188
ATORVA05	ATORVASTATINA COMPRIMIDOS 10MG X 10 COMPRIMIDOS	10MG      	COMPRIMIDO	TABL	NORM	PAST	44	189
ATORVA06	ATORVASTATINA. ATORVASTATINA. COMPRIMIDOS 40MG X 10 COMP	40MG      	COMPRIMIDO	COMP	NORM	PAST	44	190
ATORVA07	ATORVASTATINA. ATORVASTATINA. COMPRIMIDOS 80 MG X 10 COMP	80MG      	COMRIMIDOS	COMP	NORM	PAST	44	191
AUGMEN01	AUGMENTIN. AMOXICILINA + ACIDO CLAVULANICO. TABLETAS  500/12.5 MG TABL	500/125MG 	TABLETAS  	AMPO	NORM	PAST	36	192
AUGMEN02	AUGMENTIN. AMOXICILINA + ACIDO CLAVULANICO. TABLETAS 875/12.5 MG X 14	875/125MG 	TABLETAS  	TABL	NORM	PAST	36	193
AUGMEN03	AUGMENTIN. AMOXICILINA + ACIDO CLAVULANICO. SUSPENSION 400 MG X 60 ML	400MG     	SUSPENSION	SUSP	NORM	LIQU	36	194
AUGMEN04	AUGMENTIN. AMOXICILINA + ACIDO CLAVULANICO. SUSPENSION 250/62.5MG/ML	250/62.5MG	SUSPENSION	SUSP	NORM	LIQU	35	195
AUGMEN05	AUGMENTIN. AMOXICILINA + ACIDO CLAVULANIOCO. SUSPENSION 400/57MG/5ML	400/57MG/5	SUSPENSION	SUSP	NORM	LIQU	35	196
AUGMEN06	AUGMENTIN  ES. AMOXICILINA + ACIDO CLAVULANICO. SUSPENSION 600/42.9MG/	600/42.9MG	SUSPENSION	SUSP	NORM	LIQU	35	197
AUGMEN07	AUGMENTIN  ES SUSP 600/42.9 MG/ 5ML X 50ML	600/42.9 M	SUSPENSION	SUSP	NORM	LIQU	36	198
AVELOX01	AVELOX. MOXIFLOXACINA. TABLETAS 400MG X 5 COMPRIMIDOS	400 MG    	COMPRIMIDO	COMP	NORM	PAST	289	199
AVODAR01	AVODART. DUDASTERIDA. CAPSULAS 0.5 MG X 30 CAPSULAS	0.5 MG    	CAPSULAS  	CAPS	NORM	PAST	156	200
AXOKIN01	AXOKINE. MOXIFLOXACINA. COMPRIMIDOS 400 MG X 5 COMPRIMIDOS	400MG     	COMPRIMIDO	TABL	NORM	PAST	289	201
AZITRO01	AZITROMICINA. AZITROMICINA. TABLETAS 500MG X 3 TABLETAS	500MG     	TABLETAS  	TABL	NORM	PAST	449	202
AZITRO02	AZITROMICINA. AZITROMICINA. SUSP  ORAL 200 MG / 5ML X 15 ML	200/5X15  	SUSP      	SUSP	NORM	LIQU	449	203
AZLAIR01	AZLAIRE. PRALUKAST. CAPSULAS 112.5 MG X 56 TABLETAS	112.5MG   	TABLETAS  	TABL	NORM	PAST	344	204
AZLAIR02	AZLAIRE. PRALUKAST. SOBRES 50MG/0.5G X 30 SOBRES	50MG/0.5MG	GRANULADOS	GRAN	NORM	TAGR	344	205
AZLAIR03	AZLAIRE. PRALUKAST.  SOBRES 100 MG /1G  X 30 SOBRES	100/I MG  	SOBRES    	GRAN	NORM	TAGR	344	206
AZOPT 01	AZOPT. BRIZOLAMIDA. 0.1% SOLUCION OFTALMICA X 5ML	0.1%      	GOTAS     	GOTA	NORM	GOTA	462	207
BACITR01	BACITRACINA. BACITRACINA. UNGÜENTO X 15 G	15G       	UNGUENTO  	UNGU	NORM	POMA	48	208
BACTEV01	BACTEVAL. SULFAMETIZOL+FEMILAZODIAMINAPIRIDINA. CAPSULAS 250MG/50MG X	250/50MG  	CAPSULAS  	CAPS	NORM	PAST	392	209
BACTEV02	BACTEVAL. SULFAMETIZOL+FEMILAZODIAMINAPIRIDINA. CAPSULAS 250MG/25MG X	250MG/25MG	CAPSULAS  	CAPS	NORM	PAST	392	210
BACTR 01	BACTRON. TRIMETROPINA+SULFAMETOXAZOL. TABLETAS 80MG/400MG X 20 TAB	80MG/400MG	TABLETAS  	TABL	NORM	PAST	426	211
BACTRI01	BACTRIMEL. TRIMETOPRINA+SULFAMETOXAZOL. AMPOLLAS  400MG/80 MG X 5ML	400 MG/80 	AMPOLLAS  	AMPO	NORM	AMPO	426	212
BACTRI02	BACTRIMEL. TRIMETOPRINA+SULFAMETOXAZOL. TABLETAS 80MG/400MG  X 20 TAB	80MG/400MG	TABLETAS  	TABL	NORM	PAST	426	213
BACTRI03	BACTRIMEL. TRIMETOPRINA+SULFAMETOXAZOL. SUSPENSION  200/40 MG/ 5 ML PE	200/40 MG/	SUSPENSION	SUSP	NORM	LIQU	426	214
BACTRN01	BACTRON. TRIMETROPINA+SULFAMETOXAZOL. TABLETAS 80MG/400 MG X 20 TAB	80/400 MG 	TABLETAS  	TABL	NORM	PAST	426	215
BACTRO01	BACTROBAN. MUPIROCIN. UNGÜENTO 2% X 30 G	2%        	UNGUENTO  	UNGU	NORM	POMA	290	216
BACTRO02	BACTROBAN. MUPIROCIN. UNGUENTO 2% X 15 G	2%        	15G       	UNGU	NORM	POMA	290	217
BARGON01	BARGONIL. TRIBENOSIDO+LIDOCAINA. UNGUENTO RECTAL X 15 G	15G       	UNGUENTO  	UNGU	NORM	POMA	348	218
BARGON02	BARGONIL. TRIBENOSIDO+LIDOCAINA. UNGUENTO RECTAL 2% X 10GR	2% X 10 G 	UNGUENTO  	UNGU	NORM	POMA	348	219
BATRA 01	BATRAFEN. CICLOPIROX+OLAMINA. SOLUCION AL 1% FRASCO GOTAS X 20ML	1%        	SOLUCION  	SOLI	NORM	LIQU	101	220
BATRA 02	BATRAFEN. CICLOPIROX+OLAMINA. SOLUCION AL 1 % FRASCO PULVERIZADOR X 20	1%        	SOLUCION  	SOLI	NORM	LIQU	101	221
BATRAF01	BATRAFEN. CICLOPIROX+OLAMINA. CREMA VAGINAL 1% X 40 G X 6 APLICADORES	1%        	CREMA     	CREM	NORM	POMA	101	222
BATRAF02	BATRAFEN. CICLOPIROX+OLAMINA. CREMA 1% X 20 GR	1%        	CREMA     	CREM	NORM	POMA	101	223
BECLOF01	BECLOFORTIL. BECLOMETASONA.  AEROSOL INHALADOR X 200 DOSIS	200DOSIS  	AEROSOL   	AERO	NORM	LIQU	49	224
BECLOM01	BECLOMET. BETAMETASONA+CLORFEMIRAMINA. COMPOSITUM AEROSOL PARA INHALAC	50MCG     	AEROSOL   	AERO	NORM	LIQU	49	225
BECLOS01	BECLOSIL. BECLOMETASONA. INHALADOR ORAL 50 MCG X 200 DOSIS	50MCG     	INHALADOR 	AERO	NORM	LIQU	49	226
BECONA01	BECONASE. BECLOMETASONA. ACUOSO SUSP/ATOMIZADOR 50 MCG/DOSIS X 200	50MCG     	AEROSOL   	AERO	NORM	LIQU	49	227
BEDUCE01	BEDUCEN. DEXPANTENOL. CREMA 5% X 30G	5%        	CREMA     	CREM	NORM	POMA	138	228
BELARA01	BELARA. ACETATO DE CLORMADINONA+ETIMILESTRADIOL. TABLETAS 2MG/0.03 MG	2/0.3 MG  	TABLETAS  	TABL	NORM	PAST	12	229
BENADO01	BENADON. VITAMINA B6. COMPRIMIDOS 300 MG X 10 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	437	230
BENADR01	BENADRYL. DIFENHIDRAMINA. 12.5MG/5ML  JARABE X 120ML	12.5MG    	JARABE    	JARA	NORM	LIQU	476	231
BENCID01	BENCIDAMINA 0.15% SOLUCION TOPICO BUCAL X 240 ML	0.15 MG   	SOLUCION  	SOLU	NORM	LIQU	50	232
BENDOX01	BENDOX. ALBENDAZOL. SUSPENSION ORAL 400MG/10ML SUSPENSION	400MG     	SUSPENSION	SUSP	NORM	LIQU	20	233
BENDOX02	BENDOX. ALBENDAZOL. COMPRIMIDOS 5 MG / 80 MG X 14 COMP	5MG/80MG  	COMPRIMIDO	COMP	NORM	PAST	20	234
BENI  01	BENICAR. OLMESARTAN. TABLETAS 20MG X 14 TABLETAS	20MG      	TABLETAS  	TABL	NORM	PAST	308	235
BENIAM01	BENICAR AMLO. OLMESARTAN+ANLODOPINA. TABLETAS 40MG /5 MG  X  14 TAB	40/5 MG   	TABLETAS  	TABL	NORM	PAST	564	236
BENIAM02	BENICAR AMLO. OLMESARTAN+ANLODIPINA. 40 MG / 10 MG X 14 TAB	40/10 MG  	TABLOETAS 	TABL	NORM	PAST	564	237
BENIAM03	BENICAR AMLO. OLMERSARTAN+ANLODIPINA. TABLETAS 20 MG / 5 MG  X 14 TABL	20/5 MG   	TABLETAS  	TABL	NORM	PAST	564	238
BENIC101	BENICAR HCT. OLMESARTAN HIDROCLOROTIAZIDA. TABLETAS 20MG/12.5MG X 14 T	20MG/12.5M	TABLETAS  	TABL	NORM	PAST	309	239
BENIC102	BENICAR HCT. OLMESARTAN HODROCLOROTIAZIDA. TABLETAS 40MG/12.5MG X 14 T	40MG/12.5M	TABLETAS  	TABL	NORM	PAST	309	240
CLOFTA01	CLOFTAL  SOLUCIÓN OFTÁLMICA 0.25% X 5 ML	0.25%     	SOL OFTALM	SOLU	NORM	LIQU	474	241
BENIC103	BENICAR HCT. OLMESARTAN HIDROCLOROTIAZIDA. TABLETAS 40MG/25MG X 14 TAB	40MG/25MG 	TABLETAS  	TABL	NORM	PAST	309	242
BENICA01	BENICAR. OLMESARTAN. TABLETAS 20MG X 7 TABLETAS	20MG      	TABLETAS  	TABL	NORM	PAST	308	243
BENICA02	BENICAR. OLMESARTAN. TABLETAS 40 MG X 7 TABLETAS	40MG      	TABLETAS  	TABL	NORM	PAST	308	244
BENUTR01	BENUTREX. COMPLEJO B. GRAGEAS X  30 GRAGEAS	          	GRAGEAS   	GRAG	NORM	PAST	126	245
BENUTR02	BENUTREX. COMPLEJO B. SOL. INYECTABLE	          	SOL. INYEC	AMPO	NORM	AMPO	126	246
BENZAC01	BENZAC AC. BENZOILO PEROXIDO. GEL  2.5% X60 G	2.5% X 60G	GEL       	GEL 	NORM	POMA	51	247
BENZAC02	BENZAC AC. BENZOILO PEROXIDO. GEL 5 % X 60 G	5% X 60G  	GEL       	GEL 	NORM	POMA	51	248
BENZAC03	BENZAC AC. BENZOILO PEROXIDO. GEL 10% X 60 G	10% X 60 G	GEL       	GEL 	NORM	POMA	51	249
BENZE101	BENZETACIL L.A. PENICILINA G BENZATINICA. AMPOLLA 600.000 UI	600.000UI 	AMPOLLA   	AMPO	NORM	AMPO	323	250
BENZE102	BENZETACIL L.A. PENICILINA G BENZATINICA. AMPOLLA 1.200.000 UI	1.200.000U	AMPOLLA   	AMPO	NORM	AMPO	323	251
BENZE103	BENZETACIL L.A. PENICILINA G BENZATINICA. AMPOLLA 2.400.000 UI	2.400.000U	AM        	AMPO	NORM	AMPO	323	252
BENZET01	BENZETACIL. PENICILINA G BENZATINICA. AMPOLLA 6-3-3	6-3-3     	AMPOLLA   	AMPO	NORM	AMPO	322	253
BEROCC01	BEROCCA C PLUS. VIT. B COMPLEJO+VIT. C+MINERALES. COMPRIMIDOS EFERV. X	          	TABLETAS  	TABL	NORM	PAST	438	254
BEROCC02	BEROCCA C PLUS.  TABLETAS EFERVESCENTES	          	TAB. EFERV	TABL	NORM	PAST	438	255
BERODU01	BERODUAL. IPATROPIO BROMURO+FENOTEROL. SOLUCION PARA INHALAR  0.25MG-0	          	SOLUCION  	SOLI	NORM	LIQU	234	256
BERODU02	BERODUAL. IPATROPIO BROMURO+FENOTEROL. HFA AEROSOL P/INHALAR 20MG/50MC	20MG/50MCG	AEROSOL   	AERO	NORM	LIQU	234	257
BES   01	BES. VITAMINA E. CAPSULAS 400 UI X 30 CAPSULAS	400 UI    	CAPSULAS  	CAPS	NORM	PAST	452	258
BEST  01	BEST. VITAMINA E. CAPSULAS 400 UI  X 30 CAP	400UI     	CAPSULAS  	CAPS	NORM	PAST	452	259
BETA  01	BETAMETASONA. BETAMETASONA. AMPOLLA 4MG/ML	4MG       	AMPOLLA   	AMPO	NORM	AMPO	54	260
BETA  02	BETAMETASONA. BETAMETASONA. CREMA 0.1% X 40G	0.1%      	CREMA     	CREM	NORM	POMA	60	261
BETACO01	BETACORT. BETAMETASONA. CREMA 1% TUBO 15 GM	1%        	CREMA     	CREM	NORM	POMA	56	262
BETAGE01	BETAGEN SOLSPEN. FOSFATO+ACETATO DE BETAMETASONA.  HYPAK 1ML X 1 JERIN	          	JERINGA PR	AMPO	NORM	AMPO	59	263
BETALO01	BETALOCZOK LP. BETOPROLOL. COMPRIMIDOS 95 MG  X 14 COMP	95 MG     	COMPRIMIDO	COMP	NORM	PAST	568	264
BETALO02	BETALOCZOK LP. BETOPROLOL. COMPRIMIDOS 47.5 MG X 14 COMPRIMIDOS	47.5 MG   	COMPRIMIDO	COMP	NORM	PAST	567	265
BETALO03	BETALOCZOK LP. BETOPROLOL. COMPRIMIDOS 25 MG X 14 COMPRIMIDOS	25 MG     	COMPRIMIDO	COMP	NORM	PAST	567	266
BETAME01	BETAMETASONA. BETAMETASONA. CREMA 0.1% X 15 G	0.1MG     	CREMA     	CREM	NORM	POMA	60	267
BETAVE01	BETAVERT. BETAHISTINA. TABLETAS 8MG X 20TAB	8MG       	TAB       	TABL	NORM	TAGR	53	268
BETNOV01	BETNOVATE. BETAMETASONA VALERATO. SOLUCION CAPILAR 0.1 % X 15ML	0.1 % X 15	LOCION CAP	LOCI	NORM	LIQU	60	269
BEZALI01	BEZALIP. BEZFIBRATO. TABLETAS 200MG X30 TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	459	270
BI-EU101	BI-EUGLUCON M. METFORMINA+GLIBENCLAMIDA. TABLETAS 500/5 MG X 30 TABLET	500/5MG   	TABLETAS  	TABL	NORM	PAST	278	271
BI-EUG01	BI-EUGLUCON M. METFORMINA+GLIBENCLAMIDA. TABLETAS 500/2.5 MG X 30 TABL	500/2.5MG 	TABLETAS  	TABL	NORM	PAST	278	272
BIDROX01	BIDROXYL. CEFADROXILO. CAPSULAS 500 MG X 12 TAB	500MG     	TABLETAS  	AMPO	NORM	PAST	93	273
BIDROX02	BIDROXYL. CEFADROXILO. POLVO PARA SUSPENSION 250MG/5ML X 60 ML	250MG/5ML 	SUSPENSCIO	SUSP	NORM	LIQU	93	274
BIFRIL01	BIFRIL. ZOFENOPRIL. COMPRIMIDOS 30 MG X 14 COMPRIMIDOS	30MG      	COMPRIMIDO	TABL	NORM	PAST	444	275
BIPRET01	BIPRETERAX. PEDINDOPRIL+INDAPAMIDA. COMPRIMIDOS 4 MG/1.25 MG X 10 COMP	4MG/1.25MG	COMPRIMIDO	TABL	NORM	PAST	325	276
BISOLV01	BISOLVON. BROMEXINA. COMPRIMIDOS 8 MG X 20 COMPRIMIDOS	8MG       	COMPRIMIDO	TABL	NORM	PAST	70	277
BISOLV02	BISOLVON. BROMEXINA. AMPOLLAS 4MG/2ML X 2	4MG       	AMPOLLAS  	AMPO	NORM	AMPO	70	278
BLOKIU01	BLOKIUM. ATENOLOL. TABLETAS 50 MG X 30 TABLETAS	50 MG     	TABLETAS  	TABL	NORM	PAST	41	279
BLOKIU02	BLOKIUM. ATENOLOL. TABLETAS 100 MG X 30 TABLETAS	100 MG    	TABLETAS  	TABL	NORM	PAST	41	280
BLOKIU03	BLOKIURET. ATENOLOL+CLORTALIDONA. COMPRIMIDOS 100/25MG X 20 COMP	100/25MG  	COMPRIMIDO	COMP	NORM	PAST	42	281
BLOPRE01	BLOPRESS PLUS. CANDESARTAN+HIDROCLOROTIAZIDA. TABLETAS 16MG/12.5MG	16MG/12.5M	TAB       	TABL	NORM	TAGR	529	282
BONAME01	BONAMES. IBANDRONATO SODICO. TABLETAS 150MG X 1 TABLETAS	150MG     	TABLETAS  	TABL	NORM	PAST	540	283
BOROGI01	BOROGIN. CLORURO DE CETILPIRINIO. POLVO 5 SOBRES X 5 G	0.150 G   	SOBRES    	SOBR	NORM	TAGR	446	284
BREINO01	BREINOX. PIRACETAM. TABLETAS 400 MG X 30 TABLETAS	400 MG    	TABLETAS  	TABL	NORM	PAST	332	285
BREINO02	BREINOX. PIRACETAM. TABLETAS 800 MG X 30 TABLETAS	800 MG    	TABLETAS  	TABL	NORM	PAST	332	286
BRODIL01	BRODILIN. CLENBUTEROL. GOTAS 0.014MG/ML  X 15 ML	0.014M    	GOTAS     	GOTA	NORM	GOTA	112	287
BROMA 01	BROMAZEPAM. BROMAZEPAM. TABLETAS 6MG X 10 TABLETAS	6MG       	TABLETAS  	TABL	SICO	TAGR	463	288
BROMAZ01	BROMAZEPAM. BROMAZEPAM. TABLETAS 3MG X 10 TABLETAS	3MG       	TABLETAS  	TABL	NORM	PAST	463	289
BROMEX01	BROMEXINA. BROMEXINA. JARABE ADULTO 8 MG/5ML X 120 ML	8MG/5ML   	JARABE    	JARA	NORM	LIQU	70	290
BROMEX02	BROMEXINA. BROMEXINA. JARABE PEDIATRICO 4MG/5ML  X 120 ML	4MG/5ML   	JARABE    	JARA	NORM	LIQU	70	291
BRUDOL01	BRUDOL. IBUPROFENO+DIHIDROERGOTMINA+CAFEINA. COMPRIMIDOS X 10 COMP	          	COMPRIMIDO	TABL	NORM	PAST	225	292
BRUGES01	BRUGESINA. HIOSCINA N-BUTILBRO+DIPIRONA. 300MG/10MG X 20TAB	300MG/10MG	TAB       	TABL	NORM	PAST	222	293
BU    01	BUSCAPINA PLUS. N-BULTIBROMURO DE HIOSCINA. TABLETAS MOROCHO 10MG/500M	10MG/500MG	TABLETAS  	TABL	NORM	PAST	503	294
BUMELE01	BUMELEX. BUMETANIDA. COMPRIMIDOS 1 MG X 16 COMP	1MG       	COMPRIMIDO	COMP	NORM	PAST	75	295
BUMETI01	BUMETIN RETARD. TRIMEBUTINA. TABLETAS 300 MG X 20 TABLETAS	300MG     	TABLETAS  	TABL	NORM	PAST	424	296
BUSCA 01	BUSCAPINA. N-BUTILBROMURO DE HIOSCINA. GRAGEAS 0.01G X 20 GRAGEAS	0.01G     	GRAGEAS   	GRAG	NORM	PAST	503	297
BUSCAP01	BUSCAPINA COMPOSITUM  GRAGEAS 10 MG/250MG X 30 GRAGEAS	10/250 MG 	GRAGEAS   	GRAG	NORM	PAST	222	298
BUSCAP02	BUSCAPINA COMPOSITUM. HIOSCINA N-BUTILBROMURO+DIPIRONA. GOTAS  X 20 ML	          	GOTAS     	GOTA	NORM	GOTA	222	299
BUTOS 01	BUTOSOL. BECLOMETASONA+SALBUTAMOL. INHALADOR X 200 DOSIS	100MCG/0.5	IINHALADO 	AERO	NORM	LIQU	49	300
BUTROP01	BUTROPINA. ATROPINA METIL-NITRATO+BUTABAR+CITRATO. GOTAS X 20 ML	          	GOTAS     	GOTA	NORM	GOTA	45	301
CADUET01	CADUET. AMLODIPINA+ATORVASTATINA. TABLETAS 5MG/10MGX14 TABLETAS	5MG/10MGX1	TABLETAS  	TABL	NORM	PAST	33	302
CADUET02	CADUET. AMLODIPINA+ATORVASTATINA. TABLETAS 5 MG/20MGX14 TABLETAS	5MG/20MGX1	TABLETAS  	TABL	NORM	PAST	33	303
CADUET03	CADUET. AMLODIPINA+ATORVASTATINA. TABLETAS 5MG/40MGX14 TABLETAS	5MG/40MGX1	TABLETAS  	TABL	NORM	PAST	33	304
CALCIO01	CALCIO+ D3. CALCIO CARBONATO+D3. CAPSULAS BLANDAS 750MG/100 UI  CAP	750MG/100U	CAPSULAS  	CAPS	NORM	PAST	79	305
CANDES01	CANDESARTAN. CANDESARTAN. TABLETAS 8 MG X 14 TAB	8MG       	TABLETAS  	TABL	NORM	PAST	81	306
CANDES02	CANDESARTAN. CANDESARTAN. TABLETAS 16 MG X 14 TABLETAS	16 MG X 14	TABLETAS  	TABL	NORM	PAST	81	307
CANEST01	CANESTEN. CLOTRIMAZOL. AL 2 % CREMA	2 %       	CREMA     	CREM	NORM	POMA	124	308
CANEST02	CANESTEN. CLOTRIMAZOL. CREMA AL 1% X 20 G	1%        	CREMA     	CREM	NORM	POMA	124	309
CANEST03	CANESTEN. CLOTRIMAZOL. SOLUCIÓN AL 1%  X 20 ML	1%        	SOLUCIÓN  	SOLI	NORM	LIQU	124	310
CAPOZ 01	CAPOZIDE. CAPTOPEIL+HIDROCLOROTIAZIDA. TABLETAS 50MG/12.5MG X 30 TAB	50MG/12.5M	TABLETAS  	TABL	NORM	TAGR	82	311
CAPOZI01	CAPOZIDE. CAPTORPIL+HIDRPCLOROTIAZIDA. TABLETAS 25MG/12.5MG X 30 TAB	25MG/12.5M	TABLETAS  	TABL	NORM	TAGR	82	312
CAPTOP01	CAPTOPRIL. CAPTOPRIL. TABLETAS 25 MG X 20 TABLETAS	25MG      	TABLETAS  	TABL	NORM	PAST	82	313
CAPTOP02	CAPTOPRIL. CAPTOPRIL. TABLETAS 50 MG X 20 TABLETAS	50 MG     	TABLETAS  	TABL	NORM	PAST	82	314
CAPTOP03	CAPTOPRIL. CAPTOPRIL. TABLETAS 25 MG  X 30 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	82	315
CAPTOP04	CAPTOPRIL. CAPTOPRIL. TABLETAS 50 MG X  30 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	82	316
CARB  01	CARBAMAZEPINA. CARBAMAZEPINA. TABLETAS 200MG X 10 TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	83	317
CARBAM01	CARBAMAZEPINA. CARBAMAZEPINA. TABLETAS 200 MG  X 20 COMPRIMIDOS	200 MG    	TABLETAS  	TABL	NORM	PAST	83	318
CARBAM02	CARBAMAZEPINA. CARBAMAZEPINA. COMPRIMIDOS L.C. 400 MG  X  10 COMPRIMID	400 MG    	COMPRIMIDO	COMP	NORM	PAST	83	319
CARBON01	CARBONATO DE LITIO. CARBONATO DE LITIO. CAPSULAS 300 MG X 20 CAPSULAS	300 MG X 2	CAPSULAS  	TABL	NORM	PAST	90	320
CARDI 01	CARDIVAS. CARVEDILOL. TABLETAS 6.25MG X 20TABLETAS	6.25MG    	TABLETAS  	TABL	NORM	PAST	92	321
CARDIO01	CARDIOSOL. NIFEDIPINA. TABLETAS 30 MG  X 30 TABLETAS	30 MG     	TABLETAS  	TABL	NORM	PAST	297	322
CARDIO02	CARDIOSOL. NIFEDIPINA. TABLETAS 60 MG  X 30 TABLETAS	60 MG     	TABLETAS  	TABL	NORM	PAST	297	323
CARDIO03	CARDIOSOL. CARDIOSOL. TABLETAS 60 MG X 7 TAB	60MG      	TABLETAS  	TABL	NORM	PAST	297	324
CARDIV01	CARDIVAS. CARVEDILOL. TABLETAS 6.25MG X 10 TABLETAS	6.25MG    	TABLETAS  	TABL	NORM	PAST	92	325
CARDUR01	CARDURA. DOXAZOSINA. TABLETAS 2 MG X 14 TABLETAS	2 MG      	TABLETAS  	TABL	NORM	PAST	154	326
CARDUR02	CARDURA. DOXAZOSINA. TABLETAS 4MG X 14 TABLETAS	4MG       	TABLETAS  	TABL	NORM	PAST	154	327
CARTEO01	CARTEOL. DIACEREINA. CAPSULAS 50MG X 10 CAPSULAS	50MG      	CAPSULAS  	CAPS	NORM	PAST	140	328
CARVED01	CARVEDILOL. CARVEDILOL. TABLETAS 6.25 MG X 20 TAB	6.25 MG   	TABLETAS  	TABL	NORM	PAST	92	329
CARVED02	CARVEDILOL. CARVEDILOL. TABLETAS 12.5 MG X 20 TAB	12.5MG    	TABLETAS  	TABL	NORM	PAST	92	330
CARVED03	CARVEDILOL. CARVEDILOL. TABLETAS 25 MG X 30 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	92	331
CARVED04	CARVEDILOL. CARVEDILOL. TABLETAS  25 MG X 14 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	92	332
CARVED05	CARVEDILOL. CARVEDILOL. TABLETAS 6.5 MG X 14 TAB	6.25      	TABLETAS  	COMP	NORM	PAST	92	333
CARVED06	CARVEDILOL. CARVEDILOL. TABLETAS 12.5MG X 14 TAB	12.5MG    	TABLETAS  	TABL	NORM	PAST	92	334
CARVIX01	CARVIX. COMPLEJO B+ACIDO FOLICO. CAPSULAS BLANDAS  X 30 CAPSULAS	30 CAP    	CAPSULAS  	CAPS	NORM	PAST	127	335
CATAFL01	CATAFLAM. DICLOFENAC POTASICO. GOTAS 1.5%  EQUIV 0.5MG X 20ML	1.5 %     	GOTAS     	GOTA	NORM	GOTA	141	336
CATAFL02	CATAFLAM. DICLOFENAC POTASICO. SUPOSITORIOS 12.5MG X 5 SUPOSITORIOS	12.5MG    	SUPOSITORI	SUPO	NORM	SUPO	141	337
CATAFL03	CATAFLAM. DICLOFENAC POTASICO. GOTAS X 20ML	20 ML     	GOTAS     	GOTA	NORM	LIQU	141	338
CATAFL04	CATAFLAM. DICLOFENAC POTASICO. EMULGEL 1% X 30 GR	1 %       	GEL       	GEL 	NORM	POMA	141	339
CATAFL05	CATAFLAM. DICLOFENAC POTASICO. TABLETAS  50 MG X 20 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	141	340
CATAFL06	CATAFLAN. DICLOFENAC POTASICO. SOLUCION ORAL 120 ML	120 ML    	SOLIUCION 	SOLI	NORM	LIQU	141	341
CATAPR01	CATAPRESAN. CLONIDINA CLORHIDRATO. COMPRIMIDOS 0.150 MG X 30 COMPRIMID	0.150MG   	COMPRIMIDO	COMP	NORM	PAST	117	342
CECLO 01	CECLOR. CEFACLOR. SUSPENSIÓN 375MG/5ML X 75ML	375MG     	SUSPENSION	SUSP	NORM	LIQU	467	343
CECLOR01	CECLOR. CEFACLOR. SUSPENSION 250MG/5ML X 75ML	250MG     	SUSPENSION	SUSP	NORM	LIQU	467	344
CEDAX 01	CEDAX. CEFTIBUFEN. CAPSULAS 400 MG X 5 TABLETAS	400 MG    	TABLETAS  	TABL	NORM	PAST	95	345
CEDAX 02	CEDAX. CEFTIBUFEN. SUSPENSION 180 MG/5ML X 30 ML SUSPENSION	180MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	95	346
CEFADR01	CEFADROXILO. CEFADROXIILO. CAPSULAS 500 MG X 12 CAPSULAS	500 MG    	CAPSULAS  	CAPS	NORM	PAST	93	347
CEFADR02	CEFADROXILO. CEFADROXILO. SUSPESION 250 MG/5 ML X 60 ML PEDIATRICO	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	93	348
CEFADR03	CEFADROXILO. CEFADROXILO. POLVO PARA SUSPENSION 250 MG X 120 ML	250 MG    	SUSPENSION	SUSP	NORM	LIQU	93	349
CELEBR01	CELEBREX. CELECOXIB. TABLETAS 200MG X 10 TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	97	350
CELECT01	CELECTAN. NITAZOXAMIDA. TABLETAS 500 MG X 6 TABLETAS	500MG     	TABLETAS  	TABL	NORM	PAST	301	351
CELECT02	CELECTAN. NITAZOXIDA. 100MG/5ML X 60 ML POLVO PARA SUSPENSION ORAL	60 ML     	SOLUCION  	SOLI	NORM	LIQU	301	352
CELECT03	CELECTAN. NITAZOXAMIDA. FRASCO SOLUCION 30 ML	30ML      	SOLUCION  	SOLI	NORM	LIQU	301	353
CELES 01	CELESTAMINE. LORATADINA. JARABE JARABE 0.25MG- 2.00MG/5ML X 120ML	120ML     	JARABE    	JARA	NORM	LIQU	266	354
CELES101	CELESTONE. BETAMETASONA FOSFATO DISODICO. TABLETAS  0.5 MG X 30 TABLET	0.5 MG    	TABLETAS  	TABL	NORM	PAST	59	355
CELES102	CELESTONE. BETAMETASONA FOSFATO DISODICO. GOTAS 0.5 MG/ML X 15 ML	0.5 MG/ML 	GOTAS     	GOTA	NORM	GOTA	59	356
CELES103	CELESTONE. BETAMETASONA FOSFATO DISODICO. JARABE X 120 ML JARABE	120 ML    	JARABE    	JARA	NORM	LIQU	59	357
CELES104	CELESTONE. BETAMETASONA FOSFATO DISODICO. AMPOLLAS 4 MG X 1 ML AMPOLLA	4MG       	AMPOLLAS  	AMPO	NORM	AMPO	59	358
CELEST01	CELESTODERM. BETAMETASONA VALERATO. UNGÜENTO X 15 GR	15 GR     	UNGUENTO  	UNGU	NORM	POMA	60	359
CELEST02	CELESTODERM CON GENTALYN. BETAMETASONA VALERATO. CREMA TOPICA 0.1%/ 0.	0.1%      	CREMA TOPI	CREM	NORM	POMA	60	360
CENARE01	CENARET. LEVOCETIRIZINA. COMPRIMIDOS ORODISPERSABLES 5MG X 10 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	550	361
CENARE02	CENARET. LEVOCETIRIZINA. COMPRIMIDOS RECUBIERTOS 5MG X 10 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	550	362
CENTEL01	CENTELLA ASIATICA. CENTELLA ASIATICA. CAPSULAS 500 MG X 60 CAP	500 MG    	CAPSULAS  	CAPS	NORM	PAST	98	363
CESTOX01	CESTOX. PRAZIQUANTIL. TABLETAS 150 MG	150 MG    	TABLETAS  	TABL	NORM	PAST	560	364
CETIRI01	CETIRIZINA. CETIRIZINA. TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	99	365
CETRIZ01	CETRIZ. CETIRIZINA. TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	99	366
CETRIZ02	CETRIZ. CETIRIZINA. GOTAS 10 MG X 30 ML	10 MG     	GOTAS     	GOTA	NORM	GOTA	99	367
CHAMPI01	CHAMPIX. VARENICLINA. TABLETAS 0.5 MG X 11  Y 1 MG X 14 TERAPIA INICIA	0.5MG     	TABLETAS  	TABL	NORM	PAST	432	368
CHAMPI02	CHAMPIX. VERENICLINA. TABLETAS 1 MG X 28  TAB TERAPIA DE MANTENIMIENTO	1MG       	TABLETAS  	TABL	NORM	PAST	432	369
CICLOF01	CICLOFAST. PPIROXICAN+B-CICLODETRINA. TABLETAS 20 MG X 10 TABLETAS	20 MG     	TABLETAS  	TABL	NORM	PAST	334	370
CILOST01	CILOSTAL. CILOSTAZOL. COMPRIMIDOS 100 MG X 30 COMPRIMIDOS	100 MG    	COMPRIMIDO	COMP	NORM	PAST	102	371
CILOST02	CILOSTAL. CILOSTAZOL. TABLETAS 50MG X 30 TAB	50MG      	TABLETAS  	TABL	NORM	PAST	102	372
CIM   01	CIMETIDINA. CIMETIDINA. TABLETAS 400MG X 20 TABLETAS	400MG     	TABLETAS  	TABL	NORM	PAST	473	373
CIM   02	CIMETIDINA. CIMETIDINA. TABLETAS 200MG X 20 TABLETAS	200MG     	TABLETA   	TABL	NORM	PAST	473	374
CIMAL 01	CIMAL. CITALOPRAM BROMOHIDRATO. TABLETAS  20 MG X 14 TABLETAS	20 MG     	TABLETAS  	TABL	NORM	PAST	108	375
CIMAL 02	CIMAL. CITALOPRAM BROMOHIDRATO. COMPRIMIDOS  40 MG X 30 COMPRIMIDOS	40 MG     	COMPRIMIDO	COMP	NORM	PAST	108	376
CIMETI01	CIMETIDINA. CIMETIDINA. COMPRIMIDOS 200MG X 40 COMPRIMIDOS	200MG     	COMPRIMIDO	COMP	NORM	PAST	473	377
CINARE01	CINAREN RETARD. CINNARIZINA. TABLETAS LP 150 MG X 20TABLETAS	150MG     	TABLETAS  	TABL	NORM	PAST	103	378
CINARE02	CINAREN RETARD. CINARIZINA. TAB LP 150MG X 10 TABLETAS	150MG     	TABLETAS  	TABL	NORM	PAST	103	379
CINNAR01	CINNARIZINA. CINNARIZINA. COMPRIMIDOS 25 MG X 50 COMP	25MG      	COMPRIMIDO	COMP	NORM	PAST	103	380
CINNAR02	CINNARIZINA. CINNARIZINA. COMPRIMIDOS 75 MG X 20 COMP	          	          	AMPO	NORM	PAST	103	381
CINNAR03	CINNARIZINA. CINNARIZINA. CAPSULAS 75 MG X 10 CAP	75 MG     	CAPSULAS  	CAPS	NORM	PAST	103	382
CIP   01	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 500MG X 14 TAB	500NG     	TABLETAS  	TABL	NORM	PAST	105	383
CIPR  01	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 500MG X 16 TAB	500MG     	TABLETAS  	TABL	NORM	PAST	105	384
CIPRO 01	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 500MG  MOROCHO X 6 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	105	385
CIPRO 02	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 250MG X 10 TAB	250MG     	TABLETAS  	TABL	NORM	TAGR	105	386
CIPROF01	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 500 MG X 10 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	105	387
CIPROF02	CIPROFLOXACINA. CIPROFLOXACINA. TABLETAS 750 MG X 6 TAB	          	          	AMPO	NORM	PAST	105	388
CIPROX01	CIPROXINA XR. CIPROFLOXACINA. TABLETAS 1G X 1 TAB	1G        	TABLETAS  	AMPO	NORM	PAST	105	389
CIPROX02	CIPROXINA XR. CIPROFLOXACINA. TABLETAS 500 MG X 3 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	105	390
CIPROX03	CIPROXINA XR. CIPROFLOXACINA. TABLETAS 1G X 3 TAB	1G        	TABLETAS  	TABL	NORM	PAST	105	391
CITRAT01	CITRATO DE CALCIO + VIT D3. CALCIO+D3. 1500MG/200UI  X 20 TAB	1500MG/200	TABLETAS  	TABL	NORM	PAST	77	392
CLAR  01	CLARITROMICINA. CLARITROMICINA. TABLETAS 250MG X 16 TAB	250MG     	TAB       	TABL	NORM	PAST	111	393
CLARI 01	CLARITROMICINA. CLARITROMICINA. SUSPENSION ORAL 250MG/5ML X 50ML	250MG     	SUSP      	SUSP	NORM	TAGR	111	394
CLARIC01	CLARICORT. BETAMETASONA. TABLETAS 0.25-5MG X 10 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	54	395
CLARID01	CLARIDEX. LORATADINA. JARABE 5MG/5ML X 100ML	5MG       	JARABE    	JARA	NORM	LIQU	266	396
CLARID02	CLARIDEX. LORATADINA. JARABE  PEDIATRICO 5MG  / 60 MG  X 60 ML	5/60 MG   	JARABE    	JARA	NORM	LIQU	572	397
CLARII01	CLARICORT. BETAMETASONA. SOLUCION ORAL  X 60ML	          	SOLUCION  	SOLI	NORM	LIQU	54	398
CLARIT01	CLARITROMICINA. CLARITROMICINA. TABLETAS 500 MG X 10 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	111	399
CLARIX01	CLARIX. OXIMETAZOLINA. SOL. NASAL ADULTO 0.05% (ATOMIZADOR) X 15 ML	15 ML     	ATOMIZADOR	AERO	NORM	GOTA	314	400
CLARIX02	CLARIX. OXIMETAZOLINA. GOTAS OFTALMICA 0.255 MG/ML  X 15 ML	255	SOL       	SOLI	NORM	GOTA	314	401
CLARIX03	CLARIX. OXIMETAZOLINA. ATOMIZADOR NASAL PEDIATRICAS 0.025 % X 15 ML	0.025%    	GOTAS     	GOTA	NORM	GOTA	314	402
CLARIX04	CLARIX. OXIMETAZOLINA. SOL. NASAL ADULTO 0.05%  (GOTAS) X 15ML	0.05%     	GOTAS     	GOTA	NORM	LIQU	314	403
CLAVO 01	CLAVOXILIN. AMOXICILINA+CLAVULANICO. P/SUSPENSION  250MG/62.5MG/5ML X	250MG-62.5	JARABE    	JARA	NORM	LIQU	36	404
CLAVOX01	CLAVOXILIN. AMOXICILINA+CLAVULANICO. TABLETAS 500MG/125MG X 16 TAB	500MG/125M	TAB       	TABL	NORM	PAST	36	405
CLENB 01	CLENBUXOL. AMBROXOL+CLENBUTEROL. JARABE ADULTO 0.01MG/15MG 5 ML 120ML	0.01/15 MG	JARABE    	JARA	NORM	LIQU	28	406
CLENB 02	CLENBUXOL. AMBROXOL+CLENBUTEROL. JARABE PED 0.005 MG - 7.5 MG/5 ML X 1	0.005 - 7.	JARABE    	JARA	NORM	LIQU	28	407
CLENBU01	CLENBUTEROL. CLENBUTEROL. JARABE ADULTO 0.01 MG/5ML X 60 ML	0.01 /5ML 	JARABE    	JARA	NORM	LIQU	112	408
CLENBU02	CLENBUTEROL. CLENBUTEROL. JARABE ADULTO 0.01 MG/5MLX 120ML	0.01/5ML  	JARABE    	JARA	NORM	LIQU	112	409
CLENBU03	CLENBUTEROL. CELNBUTEROL CLORHIDRATO. JARABE PED 0.05MG/5ML  X 120ML	0.05MG/5ML	JARABE    	JARA	NORM	LIQU	112	410
CLIMA 01	CLIMATROL CICLICO HT. ESTROGENO+PROGESTAS. CAP BLANDAS 0.625MG X 17 CA	0.625MG   	CAP BLANDA	CAPS	NORM	PAST	500	411
CLIMAT01	CLIMATROL E. ESTRAGENO+PROGESTAS. COMPRIMIDOS 0.3MX X 30 COMP	0.3MG     	COMP      	COMP	NORM	PAST	500	412
CLIMEN01	CLIMENE. ESTRADIOL+CIPROTERONA. GRAGEAS X 21 GRA	          	          	AMPO	NORM	PAST	171	413
CLINDA01	CLINDAMICINA. CLINDAMICINA. CREMA VAGINAL 2% X 7 APLICADORES	2%        	CREMA VAGI	CREM	NORM	POMA	114	414
CLINDO01	CLINDOXYL. CLINDAMICINA+BENZOIL PEROXIDO. GEL X 30 G	          	          	AMPO	NORM	POMA	113	415
CLO   01	CLOTRIMAZOL  POLVO 1GR X 30GR	1GR X30GR 	POLVO     	POLV	NORM	TAGR	124	416
CLO   02	CLOTRIMAZOL  SOL TOPIC (GOTAS) 1% X 20ML	1%        	SOLUCION  	SOLI	NORM	LIQU	124	417
CLO   03	CLOTRIMAZOL CREMA 15 G AL 1%	1% - 15 G 	CREMA     	CREM	NORM	POMA	124	418
CLOBET01	CLOBETASOL UNGÜENTO TOPICO 0.05 % X 20 G	0.05%     	UNGUENTO  	UNGU	NORM	POMA	54	419
CLODOX01	CLODOXIN COMPRIMIDOS  X 20 COMP	20COMP    	COMPRIMIDO	TABL	NORM	PAST	281	420
CLOFEN01	CLOFEN GOTAS 15MG/ML X 15ML	15 MG/ML  	GOTAS     	GOTA	NORM	GOTA	141	421
CLONAC01	CLONAC COMPRIMIDOS 05.5MG X 30 TAB	0.5MG     	TAB       	TABL	NORM	TAGR	116	422
CLONAC02	CLONAC COMPRIMIDOS 2MG X 30 TAB	2MG       	TAB       	TABL	NORM	TAGR	116	423
CLONID01	CLONIDINA CLORHIDRATO TABLETAS  0.150 MG X 20 TAB	0.150 MG  	TABLETAS  	TABL	NORM	PAST	117	424
CLONIP01	CLONIPRES COMPRIMIDOS 0.150 MG X 20 COMP	0.150 MG  	COMPRIMIDO	COMP	NORM	PAST	117	425
CLOP  01	CLOPID  TABLETAS 75MG X 14 TAB	75MG      	TAB       	TABL	NORM	TAGR	47	426
CLOP  02	CLOPID TABLETAS 75 MG X 30 TAB	75 MG     	TABLETAS  	TABL	NORM	PAST	47	427
CLOPID01	CLOPIDOGREL TABLETAS 75 MG X 14 TAB	75 MG     	TABLETAS  	TABL	NORM	PAST	47	428
CLOPID02	CLOPIDOGREL TABLETAS 75 MG X 10 TAB	75 MG     	TABLETA   	TABL	NORM	PAST	47	429
CLOPIL01	CLOPILET  TABLETAS 75MG  X 14 TAB	75MG      	TAB       	TABL	NORM	TAGR	47	430
CLORA 01	CLORASONA GOTAS X 10ML	          	GOTAS     	GOTA	NORM	PAST	346	431
CLORAS01	CLORASONA SUSPENSION OFTALMICA  2.5 MG  / 5 MG  X 5 ML	2.5 MG/5MG	GOTAS     	GOTA	NORM	GOTA	346	432
CLORAS02	CLORASONA SOLUCION OFTALMICA 0.25%/0.5%  X 5ML	0.25%/0.5%	GOTAS     	GOTA	NORM	GOTA	346	433
CLORFE01	CLORFENIRAMINA MALEATO AMPOLLAS 10 MG/ML	10 MG     	AMPOLLAS  	AMPO	NORM	AMPO	119	434
CLOROT01	CLOROTRIMETON GRAGEAS 8 MG X 20 GRAGEAS	8 MG      	GRAGEAS   	GRAG	NORM	PAST	119	435
CLOROT02	CLOROTRIMETON JARABE  2.5 MG/5ML X 120 ML PEDIATRICO	2.5 MG/5ML	JARABE    	JARA	NORM	LIQU	119	436
CLOROT03	CLOROTRIMETRON TABLETAS 4MG X 20 TABLETAS	4 MG      	TABLETAS  	TABL	NORM	PAST	119	437
CLOROT04	CLOROTRIMETRON  AMPOLLA 10MG/ML X 1/1ML AMP	10MG/ML   	AMPOLLAS  	AMPO	NORM	AMPO	119	438
CLOROT05	CLOROTRIMETRON JARABE 0.5MG X 120 ML	0.5MG     	JARABE    	JARA	NORM	LIQU	119	439
CLOTMA01	CLOTRIMAZOL OVULOS 500 MG X 1 CAPSULA BLANDA	500 MG    	OVULOS    	OVUL	NORM	SUPO	124	440
CLOTR 01	CLOTRIIMAZOL  SOLUCIÓN 1% X 15ML	1%        	SOLUCIÓN  	SOLU	NORM	LIQU	124	441
CLOTRI01	CLOTRIMAZOL CREMA DERMICA 20 G AL 1%	1%        	CREMA     	CREM	NORM	POMA	124	442
CLOTRI02	CLOTRIMAZOL CREMA VAGINAL. 1% X 50 G X 6 CANULAS	1% X 50 G 	CREMA     	CREM	NORM	POMA	124	443
CLOTRI03	CLOTRIMAZOL CREMA VAGINAL 2% X 20 G X 3 APLICADORES	2% X 20 G 	CREMA     	CREM	NORM	POMA	124	444
CLOTRI04	CLOTRIMAZOL CAPSULAS  BLANDA VAGINAL 100 MG X 6 CAPS	100 MG    	CAPSULA   	CAPS	NORM	PAST	124	445
CLOTRI05	CLOTRIMAZOL TABLETAS VAGINAL 100 MG X 6 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	124	446
CLOTRI06	CLOTRIMAZOL  CREMA AL 1 % TUBO 20 G	1% - 20 G 	CREMA     	CREM	NORM	POMA	124	447
CLOTRI07	CLOTRIMAZOL-NEOMICINA-DEXAMETASONA X 20 G	20 G      	CREMA     	CREM	NORM	POMA	124	448
COAPRO01	COAPROVEL COMPRIMIDOS 150MG/12.5 MG X 14 COMP	150/12.5MG	COMPRIMIDO	COMP	NORM	PAST	236	449
COAPRO02	COAPROVEL COMPRIMIDOS 300MG/12.5 MG X 14 COMP	300/12.5MG	COMPRIMIDO	COMP	NORM	PAST	236	450
COAPRO03	COAPROVEL COMPRIMIDOS 300 MG/25MG	300MG/25MG	COMPRIMIDO	COMP	NORM	PAST	236	451
CODIPR01	CODIPRONT CAPSULAS  30/10 MG X 8 CAPS	30/10MG   	CAPSULAS  	CAPS	NORM	PAST	125	452
CODIPR02	CODIPRONT JARABE X 60 ML	60 ML     	JARABE    	JARA	NORM	LIQU	125	453
COLAYT01	COLAYTE POLVO  X 4 SOBRES	          	POLVO     	POLV	NORM	TAGR	478	454
COLFEN01	COLFENE COMPRIMIDO 400/4MG X 15 COMP	400/4 MG  	COMPRIMIDO	COMP	NORM	PAST	226	455
COMBAR01	COMBAREN COMPRIMIDOS 50MG/50 MG X 10 COMP	50MG/50MG 	COMPRIMIDO	COMP	NORM	PAST	144	456
COMBIG01	COMBIGAN COLIRIO X 5ML	5 ML      	COLIRIO   	COLI	NORM	GOTA	67	457
COMENT01	COMENTER COMPRIMIDOS 30 MG X 30 COMP	30 MG     	COMPRIMIDO	COMP	NORM	PAST	287	458
COMPLE01	COMPLEJO B ELIXIR X 90ML	90 ML     	JARABE    	JARA	NORM	LIQU	126	459
COMPLE02	COMPLEJO B AMPOLLA X 2ML X 3 AMP	2ML X 3   	AMP       	AMPO	NORM	AMPO	126	460
COMTAM01	COMTAM COMPRIMIDOS 200 MG  X 30 COMP	200 MG    	COMPRIMIDO	COMP	NORM	PAST	161	461
CONCOR01	CONCOR TABLETAS 1.25 MG X 30  TAB	1.25 MG   	TABLETAS  	TABL	NORM	PAST	66	462
CONCOR02	CONCOR TABLETAS 2.5 MG X  30 TAB	2.5 MG    	TABLETAS  	TABL	NORM	PAST	66	463
CONCOR03	CONCOR TABLETAS 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	66	464
CONCOR04	CONCOR TABLETAS 10 MG X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	66	465
CORASP01	CORASPIRINA TABLETAS 81 MG X 24 TABLETAS	81 MG     	TABLETAS  	TABL	NORM	PAST	13	466
CORAZ 01	CORAZEM TABLETAS 90MG X1OTAB	90MG      	TABLETAS  	TABL	NORM	PAST	147	467
CORAZ 02	CORAZEM TABLETAS 60MG X 2O TAB	60MG      	TABLETAS  	TABL	NORM	PAST	147	468
CORAZE01	CORAZEM CD CAPSULAS LP 120 MG X 10 CAPSULAS	120 MG    	CAPSULAS  	CAPS	NORM	PAST	147	469
CORAZE02	CORAZEM CD CAPSULAS 180 MG X 10 CAPS	180 MG    	CAPSULAS  	CAPS	NORM	PAST	147	470
CORENT01	CORENTEL COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	66	471
CORGAR01	CORGARD TABLETAS  80 MG X 20 TAB	80 MG     	TABLETAS  	TABL	NORM	PAST	566	472
CORMAT01	CORMATIC PLUS TAB 100MG/25MG X 15 TAB	100 MG/25 	TABLETAS  	TABL	NORM	PAST	270	473
COSOPT01	COSOPT SOL OFTALMICA  X 5ML	5 ML      	GOTAS     	GOTA	NORM	GOTA	487	474
COUMAD01	COUMADIN TABLETAS 1 MG X 30 TAB	1 MG      	TABLETAS  	TABL	NORM	PAST	440	475
COUMAD02	COUMADIN TABLETAS 2 MG	2 MG      	TABLETAS  	TABL	NORM	PAST	440	476
COUMAD03	COUMADIN TABLETAS 5 MG	5 MG      	TABLETAS  	TABL	NORM	PAST	440	477
COVERS01	COVERSYL COMPRIMIDOS 5 MG X 10 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	563	478
COVERS02	COVERSYL COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	563	479
COVERS03	COVERSYL COMPRIMIDOS 10 MG X 10 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	563	480
COVERS04	COVERSYL COMPRIMIDOS 10 MG X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	563	481
CRESTO01	CRESTOR TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	377	482
CRESTO02	CRESTOR TABLETAS 20 MG X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	377	483
CRESTO03	CRESTOR TABLETAS 40 MG X 10 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	377	484
CROMOF01	CROMOFTAL ATOMIZADOR  NASAL 2% X 15 ML	2% X 15ML 	SOLUCION N	SOLU	NORM	LIQU	129	485
CROMOF02	CROMOFTAL ATOMIZADOR NASAL  4% X 15 ML	4% X 15 ML	SOLUCION N	SOLU	NORM	LIQU	129	486
CROMOF03	CROMOFTAL FRASCO NEBULIZADOR  2% X 30 ML	2% X 30ML 	NEBULIZADO	GOTA	NORM	LIQU	129	487
CROMOF04	CROMOFTAL FRASCO NEBULIZADOR  4%  X 30 ML	4% X 30 ML	NEBULIZADO	GOTA	NORM	LIQU	129	488
CROMOF05	CROMOFTAL SOLUCION OFTALMICA  2 %  X 10 ML	2% X 10 ML	SOLUCION O	GOTA	NORM	GOTA	129	489
CROMOF06	CROMOFTAL SOLUCION OFTALMICA 4 % X 10 ML	4% X 10 ML	SOL OFTALM	GOTA	NORM	GOTA	129	490
CROMOF07	CROMOFTAL SOLUCION NASAL AL 2%	2%        	SOLUCION  	GOTA	NORM	GOTA	129	491
CROMOF08	CROMOFTAL SOLUCION NASAL AL 4%	4%        	SOLUCION  	GOTA	NORM	GOTA	129	492
CURAM 01	CURAM SUSPENSION 400MG/57/5ML  X 70ML	400/57/5ML	SUSPENSION	SUSP	NORM	LIQU	36	493
CURAM 02	CURAM SUSPENSION 250/62.5MG/5ML X 60 ML	250/62.5ML	SUSPENSION	SUSP	NORM	LIQU	35	494
CURAM 03	CURAM TABLETAS  500/125MG  X12TAB	500/125MG 	TAB       	TABL	NORM	PAST	35	495
CURAM 04	CURAM TABLETAS 1000MG (875MG/125MG) X 10 TAB	875MG/125M	TAB       	TABL	NORM	PAST	35	496
CYMB  01	CYMBALTA CAPSULAS 60 MG X 28 CAPS	60 MG     	CAPSULAS  	CAPS	NORM	PAST	157	497
CYMBAL01	CYMBALTA CAPSULAS 30 MG X 7 CAPS	30 MG     	CAPSULAS  	CAPS	NORM	PAST	157	498
DAFLON01	DAFLON COMPRIMIDOS 500 MG X 30 COMP	500 MG    	COMPRIMIDO	COMP	NORM	PAST	486	499
DAKTAR01	DAKTARIN GEL ORAL X 78 GR	78 G      	GEL ORAL  	GEL 	NORM	POMA	286	500
DAKTAR02	DAKTARIN CREMA 20 MG X 30 GR	20MG X 30G	CREMA     	CREM	NORM	POMA	286	501
DAKTAR03	DAKTARIN POLVO 20 MG X 20 GR	20 MG     	POLVO     	POLV	NORM	LIQU	286	502
DALA  01	DALACIN  CREMA VAGINAL AL 2%  40G Y 7 APLICADORES DESECHABLES	2% - 40G  	CREMA     	CREM	NORM	POMA	114	503
DALACI01	DALACIN CAPSULAS 300 MG X 16 CAPS	300 MG    	CAPSULAS  	CAPS	NORM	PAST	114	504
DALACI02	DALACIN OVULOS 100 MG X 3 OVULOS	100 MG X 3	OVULOS    	OVUL	NORM	SUPO	114	505
DALACI03	DALACIN LOCION 10 MG X 30 ML	10 MG     	LOCION    	LOCI	NORM	LIQU	114	506
DALACI04	DALACIN  AL 1% SOLUCION TOPICA X 30 ML	AL 1% X 30	SOLUCION  	SOLI	NORM	LIQU	114	507
DALACI05	DALACIN AL 1% LOCION TOPICA X 60ML	1% X 60 ML	LOCION    	LOCI	NORM	LIQU	114	508
DALPAS01	DALPAS  TABLETAS  5MG X 30 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	465	509
DALPAS02	DALPAS TABLETAS 10MG X 30 TAB	10MG      	TABLETAS  	TABL	NORM	TAGR	465	510
DANTOI01	DANTOINAL TABLETAS 100MG	100MG     	TAB       	TABL	NORM	PAST	483	511
DAZOLI01	DAZOLIN TABLETAS 5MG  X 30 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	152	512
DAZOLI02	DAZOLIN TABLETAS 10 MG X 30 TAB	10 MG X 30	TABLETAS  	TABL	NORM	PAST	152	513
DAZOLI03	DAZOLIN TAB EMG X 30	5MG       	TAB       	TABL	NORM	PAST	120	514
DAZOLI04	DAZOLIN TABLETAS 5 MG X 15 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	152	515
DECAVE01	DECAVEN SOLUCION OFTALMICA X 5 ML	5 ML      	SOL OFTALM	SOLI	NORM	GOTA	136	516
DECOBE01	DECOBEL AMPOLLAS 8 MG/ML X 2 ML	          	AMPOLLAS  	AMPO	NORM	AMPO	135	517
DEFIXA01	DEFIXAL COMPRIMIDOS 35MG X 4 COMP	35 MG X 4 	COMPRIMIDO	COMP	NORM	PAST	15	518
DEFIXA02	DEFIXAL COMPRIMIDOS 70 MG X 4 TAB	70 MG     	COMPRIMIDO	COMP	NORM	PAST	21	519
DEFIXA03	DEFLAZACORT  TABLETAS 30MG X 10 TAB	30MG      	TAB       	TABL	NORM	PAST	131	520
DEFLAZ01	DEFLAZACORT TABLETAS 6 MG X 10 TAB.	6 MG      	TABLETAS  	TABL	NORM	PAST	131	521
DEFLAZ02	DEFLAZACORT 30MG X 30 TAB	30MG      	TAB       	TABL	NORM	PAST	131	522
DEPAKI01	DEPAKINE FCO 250MG/5ML X 120ML	250MG     	JARABE    	JARA	NORM	LIQU	519	523
DERAIN01	DERAIN CREMA X 15 G	15 G      	CREMA     	CREM	NORM	POMA	176	524
DERAIN02	DERAIN GASAS X 10 GASAS	          	GASAS     	OTRO	NORM	MICE	176	525
DERMAC01	DERMACORTINE  CREMA 0.1 % X 15 G	0.1 %     	CREMA     	CREM	NORM	POMA	574	526
DERMAC02	DERMACORTINE CREMA TOPICA 15 G.	15 G      	CREMA     	CREM	NORM	POMA	574	527
DERMO101	DERMOSUPRIL C CREMA 0.1%/ - 3%X 15 G	0.1%-3%   	CREMA     	CREM	NORM	POMA	134	528
DERMOS01	DERMOSUPRIL LOCION 0.1 % X 30 ML	          	          	AMPO	NORM	LIQU	133	529
DERMOS02	DERMOSUPRIL CREMA 0.1 %X 15 G	0.1% X 15 	CREMA     	CREM	NORM	POMA	133	530
DERMOS03	DERMOSUPRIL CREMA 0.05 % X 15 G	0.05% X 15	CREMA     	CREM	NORM	POMA	133	531
DERMOV01	DERMOVATE SOLUCION CAPILAR 0. 05 % X 25 ML	0.5% X 25 	LOCION    	LOCI	NORM	LIQU	115	532
DERMOV02	DERMOVATE CREMA 0.05% X 30 G	0.05% X 30	CREMA     	CREM	NORM	POMA	115	533
DESLOR01	DESLORATADINA COMPRIMIDOS 5MG X 10 COMP	5 MG      	COMPRIMIDO	TABL	NORM	PAST	132	534
DESLOR02	DESLORATADINA  JARABE 0.5 MG/ML X 60 ML	0.5 MG/ML 	JARABE    	JARA	NORM	LIQU	132	535
DETRU101	DETRUSITOL SR CAPSULAS 4 MG X 28 CAP	4 MG      	CAPSULAS  	CAPS	NORM	PAST	415	536
DETRUS01	DETRUSITOL TABLETAS 2 MG X 60 TAB	2 MG      	TABLETAS  	TABL	NORM	PAST	415	537
DETRUS02	DETRUSITOL TABLETAS 2 MG X 28 TAB	2 MG      	TABLETAS  	TABL	NORM	PAST	415	538
DEXA  01	DEXAMETASONA TABLETAS 0.5MG X 30 TAB	0.5MG     	TABLETAS  	TABL	NORM	TAGR	135	539
DEXAM 01	DEXAMETASONA TABLETAS 0.75MG X 30 TAB	7.5MG     	TAB       	TABL	NORM	TAGR	135	540
DEXAME01	DEXAMETASONA SOLUCION AMPOLLA  4MG/ML	4MG/ML    	AMPOLLAS  	AMPO	NORM	AMPO	135	541
DEXTRA01	DEXTRAN SOLUCION OFTALMICA 15 ML	15 ML     	SOL. OFTAL	COLI	NORM	GOTA	139	542
DHIABE01	DHIABETINAT CREMA AL 10%	10%       	CREMA     	CREM	NORM	POMA	536	543
DI-EU 01	DI-EUDRIN TABLETAS 25MG X 24 TABLETAS	25MG      	TAB       	TABL	NORM	PAST	216	544
DI-EUD01	DI-EUDRIN TABLETAS  50 MG  X 24 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	216	545
DI-EUD02	DI-EUDRIN TABLETAS 12.5 MG  X 24 TAB	12.5 MG   	TABLETAS  	TABL	NORM	PAST	216	546
DIABIO01	DIABION CAPSULAS X 30	          	          	AMPO	NORM	PAST	397	547
DIAMIC01	DIAMICRON MR COMPRIMIDOS 30MG X 30 COMP	30MG      	COMP      	COMP	NORM	PAST	511	548
DIAMIC02	DIAMICRON TABLETAS 60MG	60MG      	TAB       	TABL	NORM	PAST	511	549
DIAMIC03	DIAMICRON  TABLETAS 80MG X 20 TAB	80MG      	TAB       	TABL	NORM	PAST	200	550
DIAMIC04	DIAMICRON MR COMPRIMIDOS  60 MG  X 15 COMP.	60 MG     	COMPRIMIDO	COMP	NORM	PAST	511	551
DIAZ  01	DIAZEPAM TABLETAS 10MG X 30 TAB	10MG      	TAB       	TABL	NORM	PAST	479	552
DIAZEP01	DIAZEPAM  TABLETAS 5MG X 30 TAB	5MG       	TABLETAS  	TABL	NORM	TAGR	479	553
DICETE01	DICETEL TABLETAS 50 MG x 20	50 MG     	TABLETAS  	TABL	NORM	PAST	329	554
DICETE02	DICETEL TABLETAS 100 MG X 20	100 MG    	TABLETAS  	TABL	NORM	PAST	329	555
DICIFE01	DICIGEL  GEL 180ML	180 ML    	GEL       	GEL 	NORM	LIQU	480	556
DICL  01	DICLOCIL P/SUSPENSION 250MG/5ML X 100ML	250MG     	SUSPENSION	SUSP	NORM	TAGR	482	557
DICLO 01	DICLOFENACO GEL AL 1%	1 %       	GEL       	GEL 	NORM	POMA	142	558
DICLO 02	DICLOFENACO SODICO 100MG X 20 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	142	559
DICLOC01	DICLOCIL  CAPSULAS 500MG X 20 CAP	500MG     	CAP       	CAPS	NORM	TAGR	482	560
DICLOF01	DICLOFENAC POTASICO GRAGEAS 25MG X 20	25MG      	GRAGEAS   	GRAG	NORM	PAST	141	561
DICLOF02	DICLOFENAC POTASICO COMPRIMIDOS 50 MG X  10 COMP	50 MG     	GRAGEAS   	COMP	NORM	PAST	141	562
DICLOF03	DICLOFENAC POTASICO COMPRIMIDOS AP 100 MG	100 MG    	COMPRIMIDO	COMP	NORM	PAST	141	563
DICLOF04	DICLOFENAC POTASICO AMPOLLAS 75 MG/3ML	75 MG/3ML 	AMPOLLAS  	AMPO	NORM	AMPO	142	564
DICLOF05	DICLOFENAC POTASICO GEL 1.16 % X 20 G	1.16% X20G	GEL       	GEL 	NORM	POMA	142	565
DICLOF06	DICLOFENAC POTASICO GOTAS 15 MG/ML X 20ML	15 MG/ML  	GOTAS     	GOTA	NORM	GOTA	141	566
DICLOF07	DICLOFENAC POTASICO TABLETAS 50MG MOROCHO	50MG      	TAB       	TABL	NORM	PAST	141	567
DICLOF08	DICLOFENAC POTASICO TAB 50MG X 20 GRAGEAS	50 MG     	TABLETAS  	TABL	NORM	PAST	141	568
DICLSO01	DICLOFENAC SODICO AMP 75 MG/3ML	75 MG     	AMPOLLAS  	AMPO	NORM	AMPO	142	569
DICLSO02	DICLOFENAC SODICO TABLETAS AP 100 MG X 10 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	142	570
DICLSO03	DICLOFENAC SODICO TABLETAS 50MG X 20 TAB	50MG      	TAB       	TABL	NORM	TAGR	142	571
DICLSO04	DICLOFENAC SODICO TABLETAS 100 MG X 20 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	142	572
DICY  01	DICYNONE COMPRIMIDOS 600MG X 6	600MG     	COMPRIMIDO	COMP	NORM	PAST	534	573
DIFFER01	DIFFERIN GEL 0.1% X 30 G	0.1%X30G  	GEL       	GEL 	NORM	POMA	19	574
DIFFER02	DIFFERIN CREMA 0.1% X 30 G	0.1% X 30G	CREMA     	CREM	NORM	POMA	19	575
DIFLUC01	DIFLUCAN TABLETAS 200 MG X 4 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	187	576
DIFLUC02	DIFLUCAN SUSPENSION 50 MG X 35 ML	50MG      	SUSPENSION	SUSP	NORM	LIQU	187	577
DIGOXI01	DIGOXINA TABLETAS 0.25 MG X 30	0.25 MG   	TABLETAS  	TABL	NORM	PAST	145	578
DILANT01	DILANTIN  TABLETAS  100MG	100MG     	TAB       	TABL	NORM	PAST	483	579
DINITR01	DINITRATO DE ISOSORBIDE TABLETAS 10MG X 30TAB	10MG      	TAB       	TABL	NORM	PAST	521	580
DIODOQ01	DIODOQUIN SUSPENSION 4.2 G /100ML X 120 ML	4.2G X120M	SUSPENSION	SUSP	NORM	LIQU	221	581
DIODOQ02	DIODOQUIN TABLETAS 650MG X 30 TAB	650MG     	TAB       	TABL	NORM	TAGR	221	582
DIOVA 01	DIOVAN COMPRIMIDOS 320 MG X14 COMP	320 MG    	COMPRIMIDO	COMP	NORM	PAST	429	583
DIOVA 02	DIOVAN COMP 320 MG X 28 COMP	320 MG    	COMPRIMIDO	COMP	NORM	PAST	429	584
DIOVA 03	DIOVAN COMPRIMIDOS 160 MG X 14 COMP	160 MG    	COMPRIMIDO	COMP	NORM	PAST	429	585
DIOVA 04	DIOVAN COMPRIMIDOS 160 MG X 28 COMP	160 MG    	COMPRIMIDO	COMP	NORM	PAST	429	586
DIOVA 05	DIOVAN COMPRIMIDOS 80 MG X 14 COMP	80 MG     	COMPRIMIDO	COMP	NORM	PAST	429	587
DIOVA 06	DIOVAN COMPRIMIDOS 80 MG X 28 COMP	80 MG     	COMPRIMIDO	COMP	NORM	PAST	429	588
DIOVA 07	DIOVAN COMPRIMIDOS 40 MG X 14 COMP	40 MG     	COMPRIMIDO	COMP	NORM	PAST	429	589
DIOVA 08	DIOVAN COMPRIMIDOS 40 MG X  28 COMP	40 MG     	COMPRIMIDO	COMP	NORM	PAST	429	590
DIOVA101	DIOVAN/AMLIBON COMPRIMIDOS 160 MG/5MG X 14 COMP	160MG/5MG 	COMPRIMIDO	COMP	NORM	PAST	430	591
DIOVA102	DIOVAN/AMLIIBON COMPRIMIDOS 80 MG/5 MG X14 COMP	80MG/5MG  	COMPRIMIDO	COMP	NORM	PAST	430	592
DIOVAN01	DIOVAN HCT COMPRIMIDOS 80MG/12.5 MG X 14	80/12.5 M 	COMPRIMIDO	COMP	NORM	PAST	431	593
DIOVAN02	DIOVAN HCT COMPRIMIDOS 160MG/ 25 MG X 14 COMP	160MG/25MG	COMPRIMIDO	COMP	NORM	PAST	431	594
DIOVAN03	DIOVAN HCT COMPRIMIDOS 160 MG / 12.5MG X 14 COMP.	160/12.5MG	COMPRIMIDO	COMP	NORM	PAST	431	595
DIOVAN04	DIOVAN HCT COMPRIMIDOS  160 MG/12.5 MGX 28 COMP	160/12.5MG	COMPRIMIDO	COMP	NORM	PAST	431	596
DIOVAN05	DIOVAN HCT COMPRIMIDOS 320MG/12.5 MG X 14 COMP	320/12.5 M	COMPRIMIDO	COMP	NORM	PAST	431	597
DIOVEN01	DIOVENOR COMPRIMIDOS  600MG X 15 COMP	600MG     	COMPRIMIDO	COMP	NORM	PAST	485	598
DIPRO101	DIPROSONE CREMA  0.05% X 15 G	0.05% X15G	CREMA     	CREM	NORM	POMA	57	599
DIPRO201	DIPROSPAN  HYPACK  JERINGA PRELLENADA 1 ML	1 ML      	JERINGA   	AMPO	NORM	AMPO	58	600
DIPRO202	DIPROSPAN  VIAL  AMPOLLAS 5/ 2 MG X 2ML	5/2 MG    	AMPOLLA   	AMPO	NORM	AMPO	58	601
DIPROC01	DIPROCEL GEL 0.05% X 15G	0.05%X15G 	GEL       	GEL 	NORM	POMA	57	602
DIPROS01	DIPROSALIC LOCION CAPILAR X 30 ML	30 ML     	LOCION    	LOCI	NORM	LIQU	55	603
DIPROS02	DIPROSALIC UNGÜENTO X 20 G	20 G      	UNGUENTO  	UNGU	NORM	POMA	55	604
DISGRE01	DISGREN CAPSULAS 300 MG	300 MG    	CAPSULAS  	CAPS	NORM	PAST	423	605
DOBET 01	DOBET  SOLUCION OFTALMICA  X 5ML	5 ML      	GOTAS     	GOTA	NORM	GOTA	487	606
DOCE  01	DOCE PLEX ELIXIR 240ML	240 ML    	ELIXIR    	ELIX	NORM	LIQU	438	607
DOCE P01	DOCE PLEX  ELIXIR FRASCO 120ML	120 ML    	FRASCO    	JARA	NORM	LIQU	438	608
DOL   01	DOL TABLETAS X 20TAB	          	TAB       	TABL	NORM	PAST	146	609
DOL PL01	DOL PLUS  TABLETAS 650MG X10TAB	650MG     	TABLETAS  	TABL	NORM	PAST	7	610
DOL PL02	DOL PLUS TABLETAS 650 MG X 10	650 MG    	TABLETAS  	TABL	NORM	PAST	7	611
DOLAK 01	DOLAK COMPRIMIDOS 10MG X 20 COMPRIMIDOS	10MG      	COMPRIMIDO	COMP	NORM	PAST	247	612
DOMPER01	DOMPERIDONA  TABLETAS 10 MG X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	151	613
DOMPID01	DOMPIDON  COMPRIMIDOS 10 MG X 30 COMP	30 MG     	COMPRIMIDO	COMP	NORM	PAST	151	614
DORICU01	DORICUM COMPRIMIDOS 7.5MG X 30 COMP	7.5MG     	COMPRIMIDO	COMP	NORM	PAST	518	615
DORICU02	DORICUM AMPOLLAS 15 MG / 3 ML	15 MG/ 3ML	AMPOLLAS  	AMPO	NORM	AMPO	518	616
DORZOL01	DORZOL SOLUCION OFTALMICA 2% X 5 ML	2% X 5ML  	GOTAS     	GOTA	NORM	GOTA	153	617
DOSTIN01	DOSTINEX TABLETAS 0.5 MG X 2 TAB	0.5 MG    	TABLETAS  	TABL	NORM	PAST	76	618
DOXA  01	DOXAZOSINA TABLETAS 4MG  X 14 TAB	4MG       	TAB       	TABL	NORM	TAGR	154	619
DOXAZO01	DOXAZOSINA TABLETAS 2 MG	2MG       	TAB       	TABL	NORM	PAST	154	620
DOXICI01	DOXICICLINA CAPSULAS 100 MG X10 CAPS	100 MG    	CAPSULAS  	CAPS	NORM	PAST	155	621
DOXICI02	DOXICICLINA CAPSULAS 100 MG X 5 CAPS	100 MG    	CAPSULAS  	CAPS	NORM	PAST	155	622
DOXIUM01	DOXIUM CAPSULAS 500 MG X 30 CAPS	500 MG    	CAPSULAS  	CAPS	NORM	PAST	150	623
DOXIVE01	DOXIVENIL GEL  X 30 G	30 G      	GEL       	GEL 	NORM	LIQU	150	624
DULCOL01	DULCOLAX GRAGEAS 5 MG X 10 GRAGEAS	5 MG      	          	GRAG	NORM	PAST	64	625
DUOP  01	DUOPRES CAPSULAS 5MG/20MG X 18 CAPS	5MG/20MG  	CAPSULAS  	CAPS	NORM	PAST	457	626
DUOPRE01	DUOPRES TABLETAS 5MG/10MG X 18 TAB	5MG/10MG  	TABLETAS  	TABL	NORM	PAST	160	627
DUOPRE02	DUOPRES CAPSULAS 5/10 MG X 30 CAPS	5/10MG    	CAPSULAS  	CAPS	NORM	PAST	160	628
DUOPRE03	DUOPRES  CAPSULAS 2.5MG/10MG	2.5MG/10MG	CAPSULAS  	CAPS	NORM	PAST	457	629
DUOTRA01	DUOTRAV SOLUCION OFTALMICA 5 MG / 40 MCG X 2.5 ML	5MG/40MCG 	SOL OFTALM	SOLU	NORM	GOTA	407	630
DUSPAT01	DUSPATALIN CAPSULAS LP 200 MG	200 MG    	CAPSULAS  	CAPS	NORM	PAST	274	631
DUVADI01	DUVADILAN COMPRIMIDOS  10 MG X 30 COMP	10MG X 30 	COMPRIMIDO	COMP	NORM	PAST	241	632
EBIXA 01	EBIXA COMPRIMIDOS  10 MG X 28 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	570	633
EFEXOR01	EFEXOR XR CAPSULAS L.P.  75 MG X 10 CAPS	75 MG X 10	CAPSULAS  	CAPS	NORM	PAST	433	634
EFEXOR02	EFEXOR XR CAPSULAS L.P. 150 MG X 10 CAPS	150 MG X10	CAPSULAS  	CAPS	NORM	PAST	433	635
EFEXOR03	EFEXOR XR LP 75MG X 15 COMPRIMIDOS	75MG      	COMPRIMIDO	COMP	NORM	PAST	433	636
EFFIEN01	EFFIENT COMPRIMIDOS 10 MG X 10 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	561	637
EFFONT01	EFFONTIL COMPRIMIDOS 5 MG X 20 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	174	638
EFFONT02	EFFONTIL GOTAS 7.5 MG/ML  X 15 ML	7.5 MG/ML 	GOTAS     	GOTA	NORM	GOTA	174	639
ELANT 01	ELANTAN COMPRIMIDOS 20 MG  X 20 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	567	640
ELANTA01	ELANTANG  LOGN CAPSULAS  LP 50 MG  X 10 CAP	50 MG     	CAPSULAS  	CAPS	NORM	PAST	567	641
ELIDEL01	ELIDEL CREMA 1 %  X 30 G	30 G      	CREMA     	CREM	NORM	POMA	328	642
ELOCON01	ELOCON CREMA 0.1 % X 25 G	0.1% X 25G	CREMA     	CREM	NORM	POMA	198	643
ELOCON02	ELOCON LOCION CAPILAR 0.1% X 30 ML	30 ML     	LOCION    	LOCI	NORM	LIQU	198	644
ELZYM 01	ELZYM 120 MG - 100 MG CAPSULAS	120 MG - 1	CAPSULAS  	CAPS	NORM	PAST	162	645
EMULGE01	EMULGEL GEL 1% GEL	1%        	GEL       	GEL 	NORM	POMA	141	646
ENALA 01	ENALAPRIL TAB 10MG X 60 TAB	10MG      	TAB       	TABL	NORM	PAST	158	647
ENALA 02	ENALAPRIL TABLETAS 5 MG X 20 TAB MOROCHO	5MG       	TABLETAS  	TABL	NORM	PAST	158	648
ENALA 03	ENALAPRIL TABLETAS 10MG X 10 TABLETAS	10MG      	TABLETAS  	TABL	NORM	PAST	158	649
ENALAP01	ENALAPRIL MALEATO TABLETAS 5 MG X 20 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	158	650
ENALAP02	ENALAPRIL TABLETAS 10 MG X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	158	651
ENALAP03	ENALAPRIL TABLETAS 20 MG X 30 TAB	20 MG     	TAB       	TABL	NORM	PAST	158	652
ENALAP04	ENALAPRIL MALEATO TABLETAS 20 MG X 20 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	158	653
ENTERO01	ENTEROGERMINA SUSPENSION ORAL 5ML  X 10 VIALES	5ML       	SUSPENSION	SUSP	NORM	LIQU	168	654
ENTERO02	ENTEROGERMINA CAPSULAS ORAL X 12 CAPS	12 CAPS   	CAPSULAS  	CAPS	NORM	PAST	168	655
EPAMIN01	EPAMIN SUSPENSION 125MG/5ML  X 120 ML	125MG/5ML 	SUSP      	SUSP	NORM	LIQU	483	656
EPAMIN02	EPAMIN TABLETAS 100MG	100MG     	TAB       	TABL	NORM	PAST	483	657
ERANZ 01	ERANZ TABLETAS 5MG X 28 TAB	5MG       	TAB       	TABL	NORM	PAST	531	658
ERANZ 02	ERANZ TABLETAS 10MG X 28 TABLETAS	10MG      	TAB       	TABL	NORM	PAST	152	659
ERIT  01	ERITROMICINA TABLETAS 500MG X 20 TAB	500MG     	TAB       	TABL	NORM	TAGR	164	660
ERITRO01	ERITROMICINA SUSPENSION PEDIÁTRICA 250 MG/5ML  FRASCO DE  60 ML CALOX	250MG/5ML 	SUSPENSIÓN	SUSP	NORM	LIQU	164	661
ERYACN01	ERYACNE 4%  GEL X 30 G	4% X30G   	GEL       	GEL 	NORM	POMA	164	662
ESOMEP01	ESOMEPRAZOL TABLETAS 20 MG X 7 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	166	663
ESOMEP02	ESOMEPRAZOL TABLETAS 40 MG X 7 TAB	40 MG     	TABLETAS  	AMPO	NORM	PAST	166	664
ESOMEP03	ESOMEPRAZOLTABLETAS 20 MG X 10 TAB	20 MG     	TABLETASS 	TABL	NORM	PAST	166	665
ESOMEP04	ESOMEPRAZOL TABLETAS 40 MG X 10 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	166	666
ESOZ  01	ESOZ TABLETAS 20MG X 14 TAB	20MG      	TAB       	TABL	NORM	PAST	166	667
ESOZ  02	ESOZ TABLETAS 40MG  X 14 TAB	40MG      	TAB       	TABL	NORM	PAST	166	668
ESPIRO01	ESPIRONOLACTONA  25 MG X 20 TABLETAS	25 MG     	TABLETAS  	TABL	NORM	PAST	167	669
ESPIRO02	ESPIRONOLACTONA  TABLETAS 100 MG X  10 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	167	670
ESTRA 01	ESTRADOT PARCHES 50 MCG X 8 PARCHES	50 MCG    	PARCHES   	PARC	NORM	PARC	170	671
ESTRAD01	ESTRADOT PARCHES  25 MCG/DIA X 8 PARCHES	25 MCG    	PARCHES   	PARC	NORM	PARC	170	672
ESTRAD02	ESTRADOT PARCHES 37.5 MCG/ DIA X 8 PARCHES	37.5	PARCHES   	PARC	NORM	PARC	170	673
ESTROG01	ESTROGEL GEL 60 MG/100 X 80 G CON DOSIFICADOR	60 MG/100 	GEL       	GEL 	NORM	POMA	170	674
EUTHYR01	EUTHYROX TABLETAS 25 MCG X 25 TAB	25 MCG    	TABLETAS  	TABL	NORM	PAST	262	675
EUTHYR02	EUTHYROX TABLETAS 50 MCG X 50 TAB	50 MCG    	TABLETAS  	TABL	NORM	PAST	262	676
EUTHYR03	EUTHYROX TABLETAS 100 MCG X 50 TAB	100 MCG   	TABLETAS  	TABL	NORM	PAST	262	677
EUTHYR04	EUTHYROX TABLETAS 125 MCG X 25 TAB	125 MCG   	TABLETAS  	TABL	NORM	PAST	262	678
EUTHYR05	EUTHYROX TABLETAS 150 MCG X 25 TAB	150 MCG   	TABLETAS  	TABL	NORM	PAST	262	679
EUTHYR06	EUTHYROX TABLETAS 175 MCG X 25 TAB	175 MCG   	TABLETAS  	TABL	NORM	PAST	262	680
EUTHYR07	EUTHYROX TABLETAS 200 MCG X 25 TAB	200 MCG   	TABLETAS  	TABL	NORM	PAST	262	681
EUTHYR08	EUTHYROX TABLETAS 125 MCG X 50 TAB	125 MCG   	TABLETAS  	TABL	NORM	PAST	261	682
EUTHYR09	EUTHYROX TABLETAS 150MCG   X 50 TAB	A50MCG    	TAB       	TABL	NORM	TAGR	261	683
EUTHYR10	EUTHYROX TABLETAS 175MCG X 50 TAB	175MCG    	TAB       	TABL	NORM	TAGR	261	684
EUTHYR11	EUTHYROX TABLETAS 200MCG X 50 TAB	200MCG    	TAB       	TABL	NORM	TAGR	261	685
EUTHYR12	EUTHYROX TABLETAS 50 MCG X 25 TAB	50 MCG    	TABLETAS  	TABL	NORM	PAST	262	686
EUTHYR13	EUTHYROX TABLETAS 100 MCG X 25 TAB	100 MCG   	TABLETAS  	TABL	NORM	PAST	261	687
EVISTA01	EVISTA COMPRIMIDOS  60 MG X 28 COMP	60 MG     	COMPRIMIDO	TABL	NORM	PAST	364	688
EXC   01	EXELON 10 CM2  9.5MG / 24HORAS X  30 UDS	9.5 MG    	PARCHES   	PARC	NORM	PARC	376	689
EXELON01	EXELON CAPSULAS 1.5 MG X 28 CAPS	1.5 MG    	CAPSULAS  	CAPS	NORM	PAST	376	690
EXELON02	EXELON CAPSULAS 3.0  MG X 28 CAPS	3 MG      	CAPSULAS  	CAPS	NORM	PAST	376	691
EXELON03	EXELON CAPSULAS 4.5 MG X 28 CAPS	4.5 MG    	CAPSULAS  	CAPS	NORM	PAST	376	692
EXELON04	EXELON CAPSULAS 6.0 MG X 28 CAPS	6 MG      	CAPSULAS  	CAPS	NORM	PAST	376	693
EXELON05	EXELON PARCHES 18 MG/10 CM X 30 PARCHES	18MG/10CM 	PARCHES   	PARC	NORM	PARC	376	694
EXELON06	EXELON PARCHES  9MG / 5 CM X 30 PARCHES	9MG/5CM   	PARCHES   	PARC	NORM	PARC	376	695
EXELON07	EXELON PARCHES 4.6 MG/ 5 CM2 X 24 HORAS	4.6 MG/5CM	PARCHES   	PARC	NORM	PARC	376	696
EXFORG01	EXFORGE COMPRIMIDOS 5 MG /80MG X 14 COMP	5/80 MG   	COMPRIMIDO	COMP	NORM	PAST	34	697
EXFORG02	EXFORGE COMPRIMIDOS 5 MG/160MG X 14	5/160MG   	COMPRIMIDO	COMP	NORM	PAST	34	698
EXFORG03	EXFORGE COMPRIMIDOS 10MG/160 MG X 14 COMP	160MG/10MG	COMPRIMIDO	COMP	NORM	PAST	34	699
EXFORG04	EXFORGE COMPRIMIDOS 10 MG/ 320MG COMPRIMIDOS	10/320 MG 	COMPRIMIDO	COMP	NORM	PAST	27	700
EXFORG05	EXFORGE COMPRIMIDOS 5MG/320 MG COMPRIMIDOS	5/320 MG  	COMPRIMIDO	COMP	NORM	PAST	32	701
EXFORG06	EXFORGE HCT COMPRIMIDOS 5MG-160 MG - 12.5MG X 28 COMP	5/160/12.5	COMPRIMIDO	COMP	NORM	PAST	578	702
FAMOGE01	FAMOGEL  CAPSULAS BLANDAS 20MG X 20 CAP.	20MG      	CAPSULAS  	CAPS	NORM	PAST	178	703
FAMOTI01	FAMOTIDINA TABLETAS 20 MG X 20 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	178	704
FAMOTI02	FAMOTIDINA TABLETAS 40 MG X 20 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	178	705
FAMOTI03	FAMOTIDINA TABLETAS 40MG X 10 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	178	706
FEDYCL01	FEDYCLAR  GOTAS  PEDIATRICAS 0.5 MG/6 MG X 60 ML	0.5/6 MG  	GOTAS     	GOTA	NORM	GOTA	572	707
FEDYCL02	FEDYCLAR GRAGEAS 5 MG / 120MG  X 20 GRAGEAS	5/120 MG  	GRAGEAS   	GRAG	NORM	PAST	572	708
FEDYCL03	FEDYCLAR PLUS  COMRPIMIDOS 10 MG / 240 MG  X 10 COMP	10/240 MG 	COMPRIMIDO	COMP	NORM	PAST	572	709
FEDYCL04	FEDYCLAR JARABE 5 MG / 60 MG X 60 ML	5/60 MG   	JARABE    	JARA	NORM	LIQU	572	710
FENOBA01	FENOBARBITAL TABLETAS 100MG X 30 TAB	100MG     	TABLETAS  	TABL	NORM	TAGR	504	711
FENOBA02	FENOBARBITAL ELIXIR	          	ELIXIR    	ELIX	NORM	LIQU	504	712
FERGA101	FERGANIC FOLIC JARABE 40/360 MG/15ML X 120 ML	40/360 MG 	JARABE    	JARA	NORM	LIQU	358	713
FERGA102	FERGANIC FOLIC TABLETAS 40 MG/350 MCG  X 30 TAB	40/350 MG 	TABLETAS  	TABL	NORM	PAST	358	714
FERGA103	FERGANIC FOLIC TABLETAS MASTICABLES  40 MG / 350 MG X 20 TABLETAS	40/350 MG 	TABLETAS  	TABL	NORM	PAST	358	715
FERGA104	FERGANIC FOLIC GOTAS 20/80 MG X 30 ML	20/80 MG  	GOTAS     	GOTA	NORM	GOTA	358	716
FERGAN01	FERGANIC CAPSULAS 40 MG X 14 CAPSULAS	40 MG     	CAPSULAS  	CAPS	NORM	PAST	357	717
FERGAN02	FERGANIC JARABE 40 MG/15ML  X 120 ML	40 MG/120M	JARABE    	JARA	NORM	LIQU	357	718
FERGAN03	FERGANIC GOTAS  20 MG X 15 ML	20 MG     	GOTAS     	GOTA	NORM	GOTA	357	719
FERRO-01	FERRO-FOLIC TABLETAS X 30	          	          	AMPO	NORM	PAST	196	720
FERROL01	FERROLIVER TABLETAS X 60 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	183	721
FERRON01	FERRONORM CAPSULAS X 30 CAP	300 MG    	CAPSULAS  	COMP	NORM	PAST	196	722
FESTAL01	FESTAL GRAGEAS X 20 GRA.	          	GRAGEAS   	GRAG	NORM	PAST	353	723
FESTAL02	FESTAL  GRAGEAS X 10 GRA.	          	GRAGEAS   	GRAG	NORM	PAST	353	724
FESTAL03	FESTAL  GRAGEAS X 50 GRA.	          	GRAGEAS   	GRAG	NORM	PAST	353	725
FEX   01	FEXORIL 120MG  X  10 COMP	120MG     	COMPRIMIDO	COMP	NORM	PAST	184	726
FEX   02	FEXORIL  D SUSPENSION 30MG/ 30MG X  5ML	30MG /30MG	SUSPENSION	SUSP	NORM	LIQU	537	727
FEX   03	FEXORIL D TABLETAS  5MG	5MG       	TABLETAS  	TABL	NORM	PAST	537	728
FEXO  01	FEXOFENADINA TABLETAS 180MG X 10 TAB	180MG     	TAB       	TABL	NORM	PAST	184	729
FEXOFE01	FEXOFENADINA TABLETAS 120 MG X 10 TAB	120 MG    	TABLETAS  	TABL	NORM	PAST	184	730
FEXORD01	FEXORIL D COMPRIMIDOS 60MG / 60MG X 14 COMP	60MG / 60M	COMPRIMIDO	COMP	NORM	PAST	537	731
FEXORI01	FEXORIL TABLETAS 120 MG X 10 TAB	120MG     	TABLETAS  	TABL	NORM	PAST	184	732
FEXORI02	FEXORIL TABLETAS 180 MG X 10 TAB	180 MG    	TABLETAS  	TABL	NORM	PAST	184	733
FINAST01	FINASTERIDE TABLETAS 5 MG  X 15 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	185	734
FLAVOL01	FLAVOL CAPSULAS DE 300MG X 20 CAP	300MG     	CAPSULAS  	CAPS	NORM	PAST	447	735
FLEETA01	FLEET ADULTO ENEMA SOLUCION X  135 ML	          	SOLUCION  	SOLI	NORM	LIQU	62	736
FLEETF01	FLEET FOSFOSODA SOL. ORAL 21.6-8.1G/ 45 ML	21.6-8.1G/	SOLUCION O	SOLI	NORM	LIQU	62	737
FLEETP01	FLEET PEDIATRICO ENEMA 16G-6G/100X 67.5 ML	16G-6G/100	ENEMA     	ENEM	NORM	LIQU	62	738
FLEFYL01	FLEGYL BENZOIL SUSPESION 250 MG/5ML FRASCO 120 ML	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	283	739
FLEFYL02	FEGYL SUSPENSION 250 MG/ 5 ML X 120 ML	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	283	740
FLIX  01	FLIXOTIDE INHALADOR 125 MCG X 60 DOSIS	125MCG    	INHALADOR 	AERO	NORM	GOTA	192	741
FLIXON01	FLIXONASE INH NASAL NEBULIZADOR NASAL 0.5%  X 120 DOSIS	0.5%      	INHALADOR 	AERO	NORM	GOTA	192	742
FLIXOT01	FLIXOTIDE SUSPENSION PARA INHALAR 50 MCG X 60 DOSIS	50 MCG    	SUSPENSION	SUSP	NORM	GOTA	192	743
FLIXOT02	FLIXOTIDE SUSPENSION P/ INHALACION CON ENV  250 MCG X 60 DOSIS	250 MCG   	SUSPENSION	SUSP	NORM	GOTA	192	744
FLIXOT03	FLIXOTIDE SUSPENSION PARA INHALAR  50 MCG X  120 DOSIS	50 MCG    	SUSPENSION	SUSP	NORM	GOTA	192	745
FLODON01	FLODONT ENJUAGUE BUCAL FCO X 180ML	          	FRASCO    	ELIX	NORM	LIQU	522	746
FLORES01	FLORESTOR CAPSULAS X 6 CAP	          	CAPSULAS  	CAPS	NORM	PAST	263	747
FLORES02	FLORESTOR 200 MG  X 6 SOBRES	200MG     	SOBRES    	SOBR	NORM	TAGR	263	748
FLOX  01	FLOXAPEN SUSPENSION 250MG/5ML X 75ML	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	508	749
FLOXAP01	FLOXAPEN CAPSULAS 500MG X 15 CAP	500MG     	CAP       	CAPS	NORM	PAST	508	750
FLOXST01	FLOXSTAT TABLETAS 200 MG X 12 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	306	751
FLOXST02	FLOXSTAT TABLETAS 400 MG X 8 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	306	752
FLUC  01	FLUCONAZOL  CAPSULAS 50MG X 10 TAB	50MG      	CAPSULAS  	CAPS	NORM	PAST	187	753
FLUCON01	FLUCONAZOL CAPSULAS 150MG X 2 CAP	150MGX2CAP	CAPSULAS  	CAPS	NORM	PAST	187	754
FLUCON02	FLUCONAZOL CAPSULAS  200 MG	          	CAPSULAS  	CAPS	NORM	PAST	187	755
FLUDIL01	FLUDIL TABLETAS 10 MG X 20 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	189	756
FLUNAC01	FLUNACIN COMPRIMIDOS 10 MG X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	188	757
FLUNAR01	FLUNARIZINA TABLETAS 10 MG X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	188	758
FLUOXE01	FLUOXETINA TABLETAS  20 MG X 14 TAB	20MG      	TABLETAS  	TABL	NORM	PAST	191	759
FLUR  01	FLURALEMA CAPSULAS 30MG X 30 CAP	30MG      	CAP       	CAPS	NORM	PAST	509	760
FLURAL01	FLURALEMA CAPSULAS 15MG X 30 CAP	15MG      	CAP       	CAPS	NORM	PAST	509	761
FOMENE01	FOMENE COMP 2.5 MG X 28 COMP	2.5 MG    	COMPRIMIDO	COMP	NORM	PAST	525	762
FORAD101	FORADIL/ MIFLONIDE POLVO P/INH 200MCG/12MCG	200MCG / 1	POLVO P/IN	POLV	NORM	TAGR	73	763
FORADI01	FORADIL CAPSULAS 12 MCG X 30 CAP + INHALADOR	12MCG     	INHALADOR 	AERO	NORM	PAST	194	764
FORADI02	FORADIL /MIFLONIDE POLVO / INH 400 MCG/12MCG	400MCG/12M	POLVO P/IN	POLV	NORM	TAGR	73	765
FOSAMA01	FOSAMAX PLUS TABLETAS 70MG/2800UI  X 4 TAB	70MG / 280	TABLETAS  	TABL	NORM	PAST	22	766
FUNGOS01	FUNGOSIN  TABLETAS 100MG	100MG     	TABLETAS  	TABL	NORM	PAST	242	767
FUR   01	FUROSEMIDA  TABLETAS 40MG X 10 TAB	40MG      	TABLETAS  	TABL	NORM	PAST	199	768
FURACI01	FURACIN APOSITOS SOLUBLE TUBO X 30 G	          	APOSITOS  	PARC	NORM	POMA	303	769
FURDIU01	FURDIUREN 40MG/10MG  X 30COMP	40MG/1OMG 	COMPRIMIDO	COMP	NORM	TAGR	510	770
FURFUR01	FURFURIL 0.2G APOSITO SOLUBLES X 30 G	0.2 G     	CREMA     	CREM	NORM	POMA	303	771
FURO  01	FUROSEMIDA TABLETAS 40MG X 12 TAB	40MG      	TAB       	TABL	NORM	PAST	199	772
FUROSE01	FUROSEMIDA TABLETAS 20 MG X 12 TAB	20MG      	TABLETAS  	TABL	NORM	PAST	199	773
FUROX 01	FUROXONA SUSPESIÓN 3.33MG/ML X 120ML	3.33MG    	SUSPENSIÓN	SOLI	NORM	GOTA	197	774
FUROXO01	FUROXONA TABLETAS 100 MG X 30 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	197	775
FUROXO02	FUROXONA SUSPENSION 50 MG/ 5 ML X 120 ML	50 MG/ 5ML	SUSPENCION	SUSP	NORM	LIQU	197	776
FUROXO03	FUROXONA GOTAS PEDIATRICAS 900MG X 30 ML	900MG     	GOTAS     	GOTA	NORM	GOTA	197	777
GAAP  01	GAAP SOLUCION OFTALMICA 0.05 MG/ ML X 3 ML	0.05 MG/ML	GOTAS     	GOTA	NORM	GOTA	252	778
GABANT01	GABANTIN 300MG TABLETAS X 20 TABLETAS	300MG     	TABLETAS  	TABL	NORM	PAST	200	779
GABANT02	GABANTIN 400MG TABLETAS	400MG     	TABLETAS  	TABL	NORM	PAST	200	780
GABAPE01	GABAPENTINA TABLETAS 600MG X 20 TAB	600MG     	TABLETAS  	TABL	NORM	PAST	200	781
GALVME01	GALVUS MET COMPRIMIDOS 50/500 MG X 14 COMP	50/500 MG 	COMPRIMIDO	COMP	NORM	PAST	541	782
GALVME02	GALVUS MET COMPRIMIDOS 50/500 MG X 28 COMP	50/500 MG 	COMPRIMIDO	COMP	NORM	PAST	541	783
GALVME03	GALVUS MET COMPRIMIDOS 50/850 MG X 14 COMP	50/850 MG 	COMPRIMIDO	COMP	NORM	PAST	541	784
GALVME04	GALVUS MET COMPRIMIDOS 50/850 MG X 28 COMP	50/850 MG 	COMPRIMIDO	COMP	NORM	PAST	541	785
GALVME05	GALVUS MET COMPRIMIDOS 50/1000 MG X 14 COMP	50/1000 MG	COMPRIMIDO	COMP	NORM	PAST	541	786
GALVME06	GALVUS MET COMPRIMIDOS 50/1000 MG X 28  COMP	50/1000   	COMPRIMIDO	COMP	NORM	PAST	541	787
GALVUS01	GALVUS TABLETAS 50 MG X 28 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	436	788
GANTIC01	GANTICOL SOLUCION OFTALMICA 4% X 15 ML	4%        	SOL. OFT. 	SOLI	NORM	GOTA	394	789
GARABE01	GARABET SOLUCION OFTALMICA 0.3% / 0.1% X 5 ML	0.3%/0.1 X	SOLUCION  	SOLI	NORM	GOTA	203	790
GARASO01	GARASONE SOLUCION OFTALMICA X 10 ML	          	SOL. OFT. 	SOLI	NORM	GOTA	203	791
GARDEN01	GARDENAL COMPRIMIDOS 50MG X 30 COMP	50G       	COMPRIMIDO	COMP	NORM	PAST	504	792
GEMFIB01	GEMFIBROZIL COMPRIMIDOS DE 600 MG X 20 TAB	600MGX20TA	TABLETAS  	TABL	NORM	PAST	GENF	793
GENTAL01	GENTALYN  UNGUENTO 0.1% X 15G	0.1 %     	CREMA     	CREM	NORM	POMA	204	794
GENTAL02	GENTALYN CREMA AL 0.1% X 15G	0.1%      	CREMA     	CREM	NORM	POMA	204	795
GENTAM01	GENTAMICINA SULFATO GOTAS OFTALMICAS 3MG/ML X 5 ML	3MG/ML    	GOTAS     	GOTA	NORM	GOTA	204	796
GENTAM02	GENTAMICINA SULFATO CREMA 0.1% X 15 G	0.1%      	CREMA     	CREM	NORM	POMA	204	797
GENTEA01	GENTEAL SOLUCION OFTALMICA 0.3 %  X 10 ML	0.3%      	SOLUCION  	SOLI	NORM	GOTA	220	798
GENTEA02	GENTEAL GEL OFTALMICO 0.3% X 10 G	0.3%      	GEL       	GEL 	NORM	POMA	220	799
GENURI01	GENURIN GRAGEAS 200 MG X 10 GRA	200MG     	GRAGEAS   	GRAG	NORM	PAST	186	800
GEODON01	GEODON CAPSULAS 40 MG X 28 TAB	40 MG     	CAPSULAS  	CAPS	NORM	PAST	443	801
GEODON02	GEODON CAPSULAS 80 MG X 14 CAP	80 MG     	CAPSULAS  	CAPS	NORM	PAST	443	802
GEODON03	GEODON AMPOLLAS 20 MG/ML	20 MG/ML  	AMPOLLAS  	AMPO	SICO	AMPO	443	803
GEODON04	GEODON TABLETAS 40 MG X 14 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	451	804
GEODON05	GEODON TABLETAS 80 MG X 28 TAB	80 MG     	TABLETAS  	TABL	NORM	PAST	451	805
GESLUT01	GESLUTIN CAPSULAS BLANDAS 100 MG  X 30 CAP	100 MG    	CAPSULAS  	CAPS	NORM	PAST	354	806
GESLUT02	GESLUTIN CAPSULAS  BLANDAS  200 MG  X 15 CAP	200 MG    	CAPSULAS  	CAPS	NORM	PAST	354	807
GLA   01	GLAUCOTENSIL T  SOLUCION OFTALMICA X 5ML	          	SOLUCION  	GOTA	NORM	LIQU	487	808
GLAUCO01	GLAUCOTENSIL D SOL. OFTALMICA X 5 ML	2 %       	SOL. OFTAL	SOLI	NORM	GOTA	153	809
GLIBEN01	GLIBENCLAMIDA TABLETAS 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	205	810
GLICIR01	GLICIRON COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	205	811
GLICLA01	GLICLAZIDA TABLETAS 80MG X 60 TAB	80MG      	TAB       	TABL	NORM	PAST	511	812
GLIME 01	GLIMEPIRIDE TABLETAS  2 MG X 16 TAB	2MG       	TABLETAS  	TABL	NORM	PAST	GLIM	813
GLIMEP01	GLIMEPIRIDA TABLETAS 2 MG X 15 TAB	2MG       	TABLETAS  	TABL	NORM	PAST	206	814
GLIMEP02	GLIMEPIRIDA TABLETAS 4 MG X 16 TAB	4 MG      	TABLETAS  	TABL	NORM	PAST	206	815
GLUCO 01	GLUCONATO FERROSO JARABE X 120ML	          	JARABE    	JARA	NORM	LIQU	512	816
GLUCO101	GLUCOFAGE XR TABLETAS L.P. 500 MG X 30 TAB	500MG     	TABLETAS  	TABL	NORM	PAST	277	817
GLUCO102	GLUCOFAGE XR TABLETAS L.P.  750 MG X 30 TAB	750 MG    	TABLETAS  	TABL	NORM	PAST	277	818
GLUCO201	GLUCOSAMINE CHONDROITIN CAPSULAS  500 G  X 30 CAP	          	CAPSULAS  	CAPS	NORM	PAST	209	819
GLUCO202	GLUCOSAMINE CHONDROITIN CAPSULAS X 60CAPSULAS	60G       	CAPSULAS  	CAPS	NORM	PAST	209	820
GLUCOB01	GLUCOBAY  GOTAS X 15 ML	          	GOTAS     	GOTA	NORM	GOTA	3	821
GLUCOB02	GLUCOBAY TABLETAS 50 MG X 21 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	3	822
GLUCOB03	GLUCOBAY TABLETAS 100 MG X 21 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	3	823
GLUCOF01	GLUCOFAGE TABLETAS 500 MG X 30 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	277	824
GLUCOF02	GLUCOFAGE TABLETAS  1 G X 30 TAB	1 G       	TABLETAS  	TABL	NORM	PAST	277	825
GLUCOS01	GLUCOSAMINA SOBRES AL 1.5 X 15	          	          	AMPO	NORM	LIQU	208	826
GLUCOS02	GLUCOSAMINE CHONDROTIN CAPSULAS 500 MG/400 MG X 30 CAP	500MG/400M	CAPSULAS  	CAPS	NORM	PAST	209	827
GLUCOV01	GLUCOVANCE TABLETAS 250MG/1.25 MG X 30 TAB	250/1.25 M	TABLETAS  	TABL	NORM	PAST	278	828
GLUCOV02	GLUCOVANCE TABLETAS 500MG / 2.5 MG X 30 TAB	500/2.5 MG	TABLETAS  	TABL	NORM	PAST	278	829
GLUCOV03	GLUCOVANCE TABLETAS 500MG / 5 MG X 30 TABLETAS	500/5MG   	TABLETAS  	TABL	NORM	PAST	278	830
GLYPIR01	GLYPIRIDE TABLETAS 2MG TAB	2MG       	TAB       	TABL	NORM	PAST	206	831
GLYPIR02	GLYMEPIRIDE TABLETAS 4MG	4MG       	TAB       	TABL	NORM	PAST	206	832
GLYVEN01	GLYVENOL CAPSULAS BLANDAS 400 MG X 10 CAP	400MG     	CAPSULAS  	CAPS	NORM	PAST	421	833
GYNOCA01	GYNO CANESTEN CREMA VAGINAL AL 2 % TUBO 20 G CON 3 APLICADORES	2% - 20G  	CREMA     	CREM	NORM	POMA	124	834
GYNODA01	GYNO DAKTARIN DUAL 400MG/OVULOS  9MG/G DE CREMA X 3 OVULOS	400MG/OV  	OVULOS    	OVUL	NORM	SUPO	286	835
GYNODE01	GYNODERAIN CREMA VAGINAL 20%  X 60 G	20% X 60G 	CREMA VAGI	CREM	NORM	POMA	176	836
GYNODE02	GYNODERAIN OVULOS 0.6 G X 6 OVULOS	0.6 G X 6 	OVULOS    	OVUL	NORM	SUPO	176	837
GYNOZA01	GYNOZALAIN OVULOS ESTUCHE CON 1 DE 300 MG	300MG     	OVULOS    	OVUL	NORM	SUPO	450	838
GYNOZA02	GYNOZALAIN DUAL OVULO ESTUCHE CON 1 DE 300MG + TUBO DE CREMA 9G AL 2%	300 MG/ 2%	OVULO     	OVUL	NORM	SUPO	450	839
HAL   01	HALDOL TABLETAS 5MG X 20TAB	5MG       	TABLETAS  	TABL	NORM	PAST	212	840
HAL   02	HALDOL  AMPOLLAS DE 50MG / ML	50MG/ML   	AMPOLLAS  	AMPO	NORM	AMPO	212	841
HALCIC01	HALCICOMB CREMA X 30G	30G       	CREMA     	CREM	NORM	POMA	515	842
HALDOL01	HALDOL TABLETA 10 MG X 20 TABLETAS	10 MG     	TABLETAS  	TABL	NORM	PAST	212	843
HALDOL02	HALDOL SOL. GOTAS FRASCO X 30ML	30ML      	FCO       	GOTA	NORM	GOTA	212	844
HALDOL03	HALDOL TABLETAS 2 MG X 20 TAB	2 MG      	TABLETAS  	TABL	NORM	PAST	212	845
HELAL 01	HELAL TABLETAS 200MG X 2 TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	20	846
HEPAFO01	HEPAFOL  B12 X 30 TABLETAS	VITAMINAS 	TABLETAS  	TABL	NORM	PAST	183	847
HERRON01	HERRONGYN X 30 CAPSULAS	          	CAP       	CAPS	NORM	PAST	393	848
HEXOME01	HEXOMEDINE COLUTORIO FCO. AEROSOL X 0.03G	30G       	AEROSOL   	AERO	NORM	LIQU	213	849
HIDRAS01	HIDRASEC CAPSULAS 100 MG X 9 CAP	100 MG    	CAPSULAS  	CAPS	NORM	PAST	363	850
HIDRAS02	HIDRASEC GRANULADO PARA SUSPENSION PEDIATRICO ORAL 10 MG X10 ML	10 MG     	GRANULADO 	GRAN	NORM	LIQU	363	851
HIDRAS03	HIDRASEC GRANULADO  SUSPENSION  PEDIATRICO ORAL 30 MGX 10ML	30 MG     	GRANULADO 	GRAN	NORM	LIQU	363	852
HIDROC01	HIDROCLOROTIAZIDA TABLETAS 50MG X 30 TAB	50MG      	TABLETAS  	TABL	NORM	PAST	216	853
HIDROC02	HIDROCLOROTIAZIDA TABLETAS 25 MG  X 30 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	216	854
HIDROX01	HIDROXIDO DE ALUMINIO + MAGNESIO SUSPENSION 291/98/5ML X 180 ML	291/98/5ML	SUSPENSION	SUSP	NORM	LIQU	219	855
HIPERL01	HIPERLIPEN TABLETAS 100 MG X 10 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	104	856
HUM   01	HUMULIN R FCO AMP  100 UI/ ML X 10ML	100 UI / M	AMP       	AMPO	NORM	AMPO	232	857
HUMAL101	HUMALOG MIX 25  ESTUCHE CON 5 CARTUCHOS X 3ML DESCARTABLES	100UI     	CARTUCHO  	AMPO	NORM	AMPO	229	858
HUMAL102	HUMALOG MIX 25 CARTUCHO DE 3 ML	HUMALOG   	CARTUCHOS 	AMPO	NORM	AMPO	0	859
HUMAL103	HUMALOG MIX 25 100UI/ML KMIKPEN JERINGA PRELLENADA	100UI     	AMPOLLA   	AMPO	NORM	AMPO	229	860
HUMALO01	HUMALOG AMPOLLAS 100 UI/ML X 10 ML ; CARTUCHO	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	861
HUMALO02	HUMALOG 100 U/ML ESTUCHES X 5 INYECTORES DE 3ML C/U	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	862
HUMALO03	HUMALOG KWIKPEN CARTUCHO DE 3 ML X 5 INY	100UI/ML  	CARTUCHOS 	AMPO	NORM	AMPO	229	863
HUMALO04	HUMALOG 100 UI/10 ML FRASCO VIAL	100UI/10 M	FCO VIAL  	AMPO	NORM	AMPO	229	864
HUMUL101	HUMULIN  70/30 AMPOLLA 100 UI/ML X 10 ML	100 UI/ML 	AMPOLLAS  	AMPO	NORM	AMPO	232	865
HUMUL102	HUMULIN 70/30 CARTUCHO 100 UI/ML X 3ML	100 UI/ML 	CARTUCHO  	AMPO	NORM	AMPO	232	866
HUMUL103	HUMULIN 70/30 CARTUCHO 100 UI/ML X10 ML	100UI/ML X	CARTUCHO  	AMPO	NORM	AMPO	232	867
HUMUL201	HUMULIN N 100 UI/ML X FRASCO AMP 10 ML	100UI/ML  	AMPOLLA   	AMPO	NORM	AMPO	232	868
HUMUL202	HUMULIN N 100UI/ML 5 CARTUCHOS DE 3ML	100UI/ML  	AMP       	AMPO	NORM	AMPO	232	869
HUMULI01	HUMULIN  R  FCO 100 UI / ML X 10 ML	100 UI/ML 	FCO       	AMPO	NORM	AMPO	232	870
HYALGA01	HYALGAN JERINGA PRELLENADA 20MG/2ML	20MG/2ML  	JERINGA PR	AMPO	NORM	AMPO	214	871
HYFLON01	HYFLON CAPSULAS 200MG X 30 CAP	200 MG    	CAPSULAS  	CAPS	NORM	PAST	218	872
HYPERI01	HYPERIUM COMPRIMIDOS 1MG X 15 COMP	1 MG      	COMPRIMIDO	COMP	NORM	PAST	373	873
HYTRIN01	HYTRIN TABLETAS 2 MG X 14 TAB	2MG       	TABLETA   	TABL	NORM	PAST	404	874
HYTRIN02	HYTRIN TABLETAS 5MG X 14 TAB	5MG       	TABLETA   	TABL	NORM	PAST	404	875
HYZAAR01	HYZAAR TABLETAS 100MG / 12.5MG  X 15 TAB	100MG/12.5	TABLETA   	TABL	NORM	PAST	268	876
HYZAAR02	HYZAAR TABLETAS 50 MG / 12.5 MG X 15 TAB	50MG / 12.	TABLETAS  	TABL	NORM	PAST	268	877
HYZARP01	HYZAAR PLUS TABLETAS 100 MG / 25 MGX 15 TAB	100/25 MG 	TABLETAS  	TABL	NORM	PAST	268	878
IBU   01	IBUPROBENO TABLETAS 600MG MOROCHO	600MG     	TABLETAS  	TABL	NORM	PAST	276	879
IBU   02	IBUPROFENO TABLETAS 400 MG X 20 TAB MOROCHO	400 MG    	TABLETAS  	TABL	NORM	PAST	224	880
IBU   03	IBUPROFENO SUSPENSION 100MG/5ML X 60ML	100MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	224	881
IBU   04	IBUPROFENO TABLETAS 400 MG X 20 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	224	882
IBU   05	IBUPROFENO TABLETAS 600 MG X 20 TAB.	600 MG    	TABLETAS  	TABL	NORM	PAST	224	883
IBU   06	IBUPROFENO SUSP 100 MG /120 ML	100 MG/120	SUSPENSION	SUSP	NORM	LIQU	224	884
IBUCOL01	IBUCOLVAL COMPRIMIDOS 400MG / 4MG X 10 COMP	400MG / 4M	COMPRIMIDO	COMP	NORM	PAST	226	885
IBUPRO01	IBUPROFENO TABLETAS 200MG	          	TABLETA   	TABL	NORM	PAST	224	886
IBUPRO02	IBUPROFENO TABLETAS 400 MG X 10 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	224	887
IBUPRO03	IBUPROFENO TABLETAS 600MG  X 10 TAB	600MG     	TABLETAS  	TABL	NORM	PAST	224	888
IBUPRO04	IBUPROFENO TABLETAS 800MG X 10 TAB	800 MG    	TABLETAS  	TABL	NORM	PAST	224	889
IBUPRO05	IBUPROFENO TABLETAS 800 MG X 50 TAB	800 MG    	TABLETAS  	TABL	NORM	PAST	224	890
ICADEN01	ICADEN CREMA VAGINAL 1%  X 40 G X 7 APLICADORES	1% X40G   	CREMA VAGI	CREM	NORM	POMA	237	891
ICADEN02	ICADEN 600MG X 1 OVULO	1	OVULO     	OVUL	NORM	SUPO	237	892
ICADEN03	ICADEN SOLUCION TOPICA AL 1% X  20 ML	1%        	SOLUCION T	SOLI	NORM	LIQU	237	893
ICADEN04	ICADEN CREMA TOPICA X 20 G	20 G      	CREMA TOPI	CREM	NORM	POMA	237	894
IDENA 01	IDENA COMPRIMIDOS 150 MG X 1 COMP	150 MG    	COMPRIMIDO	COMP	NORM	PAST	223	895
IDEOS 01	IDEOS COMPRIMIDOS MASTICABLES  500MG  CAL 400UI DE VIT D3 X 30 COMP	500MG/400U	COMPRIMIDO	COMP	NORM	PAST	77	896
ILOS  01	ILOSONE SUSPENSION 150MG/5ML X 100ML	15OMG     	SUSPENSION	SUSP	NORM	LIQU	164	897
ILOSON01	ILOSONE SUSPENSION 250MG/5ML X 100ML	250MG     	SUSPRNSION	SUSP	NORM	LIQU	164	898
INDERA01	INDERAL TABLETAS 10 MG X 20 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	356	899
INDERA02	INDERAL TABLETAS 40 MG X 20 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	356	900
INSP  01	INSPRA TABLETAS 50 MG X  20TABLETAS	50MG      	TABLETAS  	TABL	NORM	PAST	576	901
INSPRA01	INSPRA TABLETAS 25MG X 20  TABLETAS	25MG      	TABLETAS  	TABL	NORM	PAST	576	902
INSU  01	INSU AEROSOL DOSIFICADOR 10 ML X 200 DOSIS	          	          	AMPO	NORM	LIQU	234	903
INSUMA01	INSUMAN 100UI/ML 1VIAL X 5ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	232	904
INSUMA02	INSUMAN R AMPOLLAS 100UI/ML X 5ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	232	905
INSUMA03	INSUMAN OPTISEN NPH CARTUCHOS	3 ML      	AMPOLLAS  	AMPO	NORM	AMPO	232	906
INSUMA04	INSUMAN N AMPOLLAS 100 UI/ML X 5ML	100 UI/ML 	AMPOLLAS  	AMPO	NORM	AMPO	232	907
INSUMA05	INSUMAN R 100UI/ML VIAL X 5ML	100UI/ML  	AMPOLLA   	AMPO	NORM	AMPO	232	908
INSUMA06	INSUMAN N 100 UI/ML VIAL X 5ML	100 UI/ML 	AMPOLLA   	AMPO	NORM	AMPO	232	909
INTAFE01	INTAFER GOTAS  50MG X  30 ML	          	GOTAS     	GOTA	NORM	GOTA	339	910
INUVIC01	INUVIC GRANULADOS 4 MG X 15 SOBRES	4 MG      	GRANULADOS	GRAN	NORM	TAGR	288	911
INUVIC02	INUVIC COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	288	912
INUVIC03	INUVIC COMPRIMIDOS 10 MG X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	288	913
INVEGA01	INVEGA TABLETAS 6 MG X 14 TAB	6 MG      	TABLETAS  	TABL	NORM	PAST	317	914
INVEGA02	INVEGA TABLETAS 3MG X 14 TAB	3MG       	TABLETAS  	TABL	NORM	PAST	317	915
IPRAN 01	IPRAN COMPRIMIDOS 20MG X 30 TAB	20MG      	COMPRIMIDO	COMP	NORM	PAST	165	916
IRBE  01	IRBESARTAN + HIDROCLOROTIAZIDA COMP 150MG/12.5MG X 14	150MG/12.5	COMP      	COMP	NORM	PAST	236	917
IRBE  02	IRBESARTAN + HIDROCLOROTIAZIDA TABLETAS 3030/12.5MG X 14TAB	          	TAB       	TABL	NORM	PAST	236	918
IRBERT01	IRBERTAN TABLETAS 150MG TABLETAS X 10TAB	150MG     	TABLETAS  	TABL	NORM	PAST	235	919
IRBERT02	IRBESARTAN COMP 300MG X 7 TAB	300MG     	TAB       	TABL	NORM	PAST	235	920
IRBERT03	IRBERTAN COMP 150MG X 10 COMP	150MG     	COMP      	TABL	NORM	PAST	235	921
IRBESA01	IRBESARTAN COMPRIMIDOS 150 MG X 10	150MG     	COMPRIMIDO	AMPO	NORM	PAST	235	922
IRBESA02	IRBESARTAN COMPRIMIDOS 300 MG X 10 COMP	300 MG    	          	COMP	NORM	PAST	235	923
IRIDUS01	IRIDUS CAPSULAS 100 MG X 12 CAP	100 MG    	CAPSULAS  	CAPS	NORM	PAST	291	924
IRIDUS02	IRIDUS COMPRIMIDOS 200 MG  X 20 COMP	200 MG    	COMPRIMIDO	COMP	NORM	PAST	291	925
IRIDUS03	IRIDUS CAPSULAS 100 MG X 24 CAPS	100 MG    	CAPSULAS  	CAPS	NORM	PAST	291	926
IRMIL 01	IRMIL TABLETAS 15 MG X 15	10 MG     	TABLETAS  	TABL	NORM	PAST	39	927
IRMIL 02	IRMIL COMPRIMIDOS 20 MG X 15 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	40	928
IRMIL 03	IRMIL COMPRIMIDOS 15 MG X 30 COMP	15 MG     	COMPRIMIDO	COMP	NORM	PAST	40	929
IRMIL 04	IRMIL TABLETAS 10 MG X 15 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	39	930
IRTOPA01	IRTOPAN AMPOLLAS 2 ML	2 ML      	AMPOLLA   	AMPO	NORM	AMPO	281	931
IRTOPA02	IRTOPAN GOTAS 2.6MG/ML 30 ML	2.6 MG/ML 	GOTAS     	GOTA	NORM	GOTA	281	932
ISMO  01	ISMO  COMPRIMIDOS 20 MG  X 20 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	567	933
ISOFAC01	ISOFACE CAPSULAS  BLANDAS 10 MG X 30 CAP	10 MG     	CAPSULA   	CAPS	NORM	PAST	240	934
ISOFAC02	ISOFACE CAPSULAS BLANDAS   20 MG X 20 CAP	20 MG     	CAPSULA   	CAPS	NORM	PAST	240	935
ISOFAC03	ISOFACE CAPSULAS BLANDAS 20MG X 30 CAP	20MG      	CAPSULAS B	CAPS	NORM	PAST	240	936
ISOPRA01	ISOSPRAY COLUTORIO ATOMIZADOR X 30 ML	          	AEROSOL   	AERO	NORM	LIQU	123	937
ISORDI01	ISORDIL TABLETAS SUBLINGUALES 5 MG X 100 TABLETAS	5 MG      	TABLETAS  	TABL	NORM	PAST	238	938
ISORDI02	ISORDIL TABLETAS 10MG X 40TAB	10MG      	TAB       	TABL	NORM	PAST	521	939
ISORDI03	ISORDIL TABLETAS 5 MG SUBLINGUAL X 40 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	238	940
ITAKA 01	ITAKA COMPRIMIDOS RECUBIERTOS 25 MG X 1 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	384	941
ITAKA 02	ITAKA COMPRIMIDOS 50 MG X 1 COMP	50 MG     	COMPRIMIDO	COMP	NORM	PAST	384	942
IVERGO01	IVERGOT FCO GOETRO 6MG/ML X 5ML	6MG/ML    	GOTAS     	GOTA	NORM	LIQU	544	943
JANUME01	JANUMET COMPRIMIDOS 50 MG/850 MG X 28 COMP	50MG/850MG	COMPRIMIDO	COMP	NORM	PAST	387	944
JANUME02	JANUMET COMPRIMIDOS 50 MG/1000 MG X 28 COMP	50MG/1000M	COMPRIMIDO	COMP	NORM	PAST	387	945
JANUME03	JANUMET COMPRIMIDOS 50 MG/500 MG X 28 COMP	50MG/500MG	COMPRIMIDO	COMP	NORM	PAST	387	946
JANUME04	JANUMET  COMPRIMIDOS 50MG/1000MG X 56 COMPRIMIDOS	50MG/1000 	COMP      	COMP	NORM	PAST	387	947
JANUVI01	JANUVIA TABLETAS 25 MG X 14 TAB	25 MG     	TABLETA   	TABL	NORM	PAST	386	948
JANUVI02	JANUVIA TABLETAS 50 MG X 14 TAB	50 MG     	TABLETA   	TABL	NORM	PAST	386	949
JANUVI03	JANUVIA TABLETAS 100 MG X 14 TAB	100MG     	TABLETA   	TABL	NORM	PAST	386	950
JUMEX 01	JUMEX COMPRIMIDOS 5MG  X 50 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	532	951
KATIVI01	KATIVIL SOLUCION  1G/10ML X 120ML	1G/10ML   	SOLUCION  	SOLU	NORM	LIQU	254	952
KEFOR 01	KEFORAL SUSPENSION 250MG/5ML	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	469	953
KEFORA01	KEFORAL CAPSULAS 500MG  X 12 CAP	500MG     	CAP       	CAPS	NORM	PAST	469	954
KELO-C01	KELO-COTE GEL X 15 G	15 G      	GEL       	GEL 	NORM	POMA	341	955
KENAC101	KENACORT IA AMPOLLA 10 MG/ML	10MG/ML   	AMPOLLA   	AMPO	NORM	AMPO	419	956
KENAC201	KENACORT IM AMPOLLA 40 MG / 1ML	40MG/ML   	AMPOLLAS  	AMPO	NORM	AMPO	419	957
KENACO01	KENACORT TABLETAS 4 MG	4 MG      	TABLETAS  	TABL	NORM	PAST	419	958
KEPPR 01	KEPPRA JARABE X 180 ML	          	JARABE    	JARA	NORM	LIQU	256	959
KEPPRA01	KEPPRA COMPRIMIDOS 1 G X 30 COMP	1 G       	COMPRIMIDO	AMPO	NORM	PAST	256	960
KETOCO01	KETOCONAZOL TABLETAS 400 MG X 10 TAB	400 MG    	TABLETA   	TABL	NORM	PAST	245	961
KETOCO02	KETOCONAZOL TABLETAS 200MG X 10 CAP	200MGX10  	TAB       	TABL	NORM	PAST	245	962
KETOCO03	KETOCONAZOL CREMA 2% X15G	2%        	CREMA     	CREM	NORM	POMA	245	963
KETOPR01	KETOPROFENO COMPRIMIDOS 100 MG X 10 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	246	964
KETOPR02	KETOPROFENO COMPRIMIDOS AP 200 MG X 10 COMP	200 MG    	COMPRIMIDO	COMP	NORM	PAST	246	965
KETOPR03	KETOPROFENO CAPSULAS 50MG X 10 CAP	50MG      	CAPSULAS  	AMPO	NORM	PAST	246	966
KETOPR04	KETOPROFENO 200MG X 10 TAB	200MG     	TAB       	TABL	NORM	PAST	246	967
KETOPR05	KETOPROFENO COMPRIMIDOS 100 MG  X 10 COMP	100 MG    	COMPRIMIDO	TABL	NORM	PAST	246	968
KETOPT01	KETOPTIC SOLUCION OFTALMICA 0.05 %  X 5 ML	0.05%     	SOLUCION  	SOLI	NORM	GOTA	248	969
KITCAL01	KIT CAL SUSPENSION X 18O ML  (TODOS LOS SABORES)	          	SUSPENSION	SUSP	NORM	LIQU	88	970
KLARIC01	KLARICID U.D. TABLETAS 500 MG X 12 TAB	500 MG    	TABLETA   	TABL	NORM	PAST	111	971
KLAS  01	KLAS JARABE 100MG/ML X 120 ML	100MG/ML  	JARABE    	JARA	NORM	LIQU	30	972
KLAS  02	KLAS CAPSULAS 100MG X 20 CAP	100MG     	CAPSULAS  	CAPS	NORM	PAST	30	973
L-CARN01	L-CARNITINA AMPOLLAS 1G/5ML	1G/5ML    	AMPOLLAS  	AMPO	NORM	AMPO	254	974
L-CARN02	L-CARNITINA  JARABE 1G/10ML X 120ML	1G/10ML   	JARABE    	JARA	NORM	LIQU	254	975
LACRIM01	LACRIMART SOLUCION OFTALMICA 15 ML	          	          	GOTA	NORM	GOTA	326	976
LACTEO01	LACTEOL FORT  CAPSULAS 170MG X 12 CAP	170 MG    	CAPSULAS  	CAPS	NORM	PAST	502	977
LAGRIC01	LAGRICEL OFTENO SOLUCION  OFTALMICA  4 MG/ML SOBRES X 5 TUBOS  C/U	4 MG/ML   	SOL OFTALM	GOTA	NORM	GOTA	215	978
LAGRIM01	LAGRIMAS ARTIFICIALES SOL.OFT. (DEXTRAN) 70  0.01% X 15 ML	70 0.01%  	SOLUCION  	SOLI	NORM	GOTA	139	979
LAMICT01	LAMICTAL PEDIATRICO TABLETAS  5 MGX 30 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	250	980
LAMICT02	LAMICTAL TABLETAS 25 MG X 30 TAB	25 MG     	TABLETA   	TABL	NORM	PAST	250	981
LAMICT03	LAMICTAL TABLETAS  50MG X 30 TAB	50MG      	TABLETA   	TABL	NORM	PAST	250	982
LAMICT04	LAMICTAL TABLETAS  100MG X 30 TAB	100MG     	TABLETA   	TABL	NORM	PAST	250	983
LAMICT05	LAMICTAL TABLETAS 50MG X 10 TABLETAS	50 MG     	TABLETAS  	TABL	NORM	PAST	250	984
LAMICT06	LAMICTAL TABLETAS 100 MG X 10 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	250	985
LAMICT07	LAMICTAL COMPRIMIDOS 25MG  X 10 COMP	25 MG     	COMPRIMIDO	TABL	NORM	PAST	250	986
LAMISI01	LAMISIL CREMA 1% TUBO 15 G	1%        	CREMA     	CREM	NORM	POMA	121	987
LAMISI02	LAMISIL COMPRIMIDOS 250MG X 14 COMP	250MG     	COMPRIMIDO	COMP	NORM	PAST	121	988
LANCER01	LANCERAN  JARABE 5MG/5ML X 120 ML	5MG/5ML   	JARABE    	JARA	NORM	LIQU	281	989
LANITO01	LANITOP TABLETAS  0.1MG TAB	0.1MG     	TABLETAS  	TABL	NORM	POMA	458	990
LANSOP01	LANSOPRAZOL CAPSULAS 30 MG X 28 CAP	30MG      	CAPSULA   	CAPS	NORM	PAST	251	991
LANSOP02	LANSOPRAZOL CAPSULAS 30MG X 28 CAP	30MG      	CAPSULAS  	CAPS	NORM	PAST	251	992
LANSOP03	LANSOPRAZOL CAPSULAS 30 MG X 14 CAPS	30 MG     	CAPSULAS  	CAPS	NORM	PAST	251	993
LANSOV01	LANSOVAX CAPSULAS 30 MG	30 MG     	CAPSULAS  	CAPS	NORM	PAST	251	994
LANSOV02	LANSOVAX CAPSULAS 15 MG X 10 CAP	15 MG     	CAPSULAS  	CAPS	NORM	PAST	251	995
LANT  01	LANTUS CARTUCHO 100 UI /ML    1 VIAL X 3 ML	100 UI    	AMP       	AMPO	NORM	AMPO	231	996
LANT  02	LANTUS FLESPEN	          	AMP       	AMPO	NORM	AMPO	231	997
LANT  03	LANTUS SOLOSTAR  PLUMA 100 UI/ML 1 CARTUCHO DE 3ML	100 UI    	AMP       	AMPO	NORM	AMPO	231	998
LANT  04	LANTUS 100 UI/ML IU/ML 1 VIAL X 10 ML	100UI     	VIAL      	AMPO	NORM	AMPO	0	999
LANTUS01	LANTUS	100UI/ML  	          	AMPO	NORM	AMPO	231	1000
LANZOP01	LANZOPRAL CAPSULAS 15 MG X 28 CAPSULAS	15 MG     	CAPSULAS  	CAPS	NORM	PAST	251	1001
LASOBE01	LASOBERON COMPRIMIDOS 5MG X 20 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	327	1002
LASOBE02	LASOBERON GOTAS 7.5 MG/ML  X 15 ML	7.5 MG/ML 	GOTAS     	GOTA	NORM	GOTA	327	1003
LENDOR01	LENDORMIN COMPRIMIDOS 0.25 MG X 30 COMP	0.25MG    	COMPRIMIDO	COMP	NORM	PAST	72	1004
LENTCO01	LENTERMINA COMPLEX  HYPACK X 3 UNID	          	SOL. INYEC	AMPO	NORM	AMPO	126	1005
LENTOC01	LENTOCILIN  FRASCO AMPOLLAS 2.400.000 UI X 2ML	2400000	AMPOLLAS  	AMPO	NORM	AMPO	323	1006
LEPRIT01	LEPRIT COMPRIMIDOS 25 MG X 30 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	260	1007
LETIS 01	LETISAN SOLUCION  GOTAS X120ML	          	GOTAS     	GOTA	NORM	GOTA	16	1008
LETISA01	LETISAN GOTAS X 20 ML	20 ML     	GOTAS     	GOTA	NORM	GOTA	16	1009
LEVEMI01	LEVEMIR CARTUCHO PENFILL 1ML/100UI X 5 X 3 ML	1ML/100UI 	AMPOLLAS  	AMPO	NORM	LIQU	230	1010
LEVEMI02	LEVEMIR FLEXPEN 1ML/100UI X 3 ML X 1	1ML/100UI 	AMPOLLAS  	AMPO	NORM	AMPO	230	1011
LEVEMI03	LEVEMIR FLEXPEN 1ML/100UI X 3 ML X 5	1ML/100UI 	AMPOLLAS  	AMPO	NORM	AMPO	230	1012
LEVODO01	LEVODOPA 200 MG X 14 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	501	1013
LEVOFL01	LEVOFLOXACINA TABLETAS 500 MG X 5 TAB	500MG     	TABLETAS  	TABL	NORM	PAST	259	1014
LEXAPR01	LEXAPRO TABLETAS 20 MG	20MG      	TABLETAS  	TABL	NORM	PAST	165	1015
LEXAPR02	LEXAPRO COMPRIMIDOS 10MG X 28 COMP	10MG      	COMPRIMIDO	COMP	NORM	PAST	165	1016
LEXAPR03	LEXAPRO  TABLETAS 10 MG X 14 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	496	1017
LINFOD01	LINFODERM UNGÜENTO X 30 G	          	UNGUENTO  	UNGU	NORM	POMA	128	1018
LIOLAC01	LIOLACTIL CAPSULAS  250MG X 12 CAP	250MG     	CAPSULAS  	CAPS	NORM	PAST	182	1019
LIOLAC02	LIOLACTIL 1.5 G X 6 SOBRES	1.5 G     	GRANULADOS	GRAN	NORM	TAGR	182	1020
LIPOVA01	LIPOVAS TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	44	1021
LIPOVA02	LIPOVAS TABLETAS 20 MG  X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	44	1022
LISIFO01	LISIFORT 2.7 G X 6 SOBRES	2.7 G     	GRANULADOS	GRAN	NORM	TAGR	86	1023
LISILE01	LISILETIC COMPRIMIDOS 20/12.5MG	20/12.5MG 	COMP      	COMP	NORM	PAST	554	1024
LISINO01	LISINOPRIL COMPRIMIDOS 5 MG X 14 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	265	1025
LISINO02	LISINOPRIL COMPRIMIDOS 10 MG X 14 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	265	1026
LISINO03	LISINOPRIL COMPRIMIDOS 20 MG X 14 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	265	1027
LITONA01	LITONATE TABLETAS 30 MG X 30 TAB	30 MG     	TABLETAS  	TABL	NORM	PAST	98	1028
LITONA02	LITONATE POLVO 2% X 10 G	2% X 10 G 	POLVO     	POLV	NORM	TAGR	98	1029
LITONA03	LITONATE UNGUENTO 1% X 10 G	1%        	UNGUENTO  	UNGU	NORM	POMA	98	1030
LOF   01	LOFTYL TABLETAS 600MG X 12 TAB	600MG     	TAB       	TABL	NORM	TAGR	477	1031
LOFLOX01	LOFLOX TABLETAS  400 MG  X 10 TABLETAS	400 MG    	TABLETAS  	TABL	NORM	PAST	573	1032
LOFTYL01	LOFTYL TABLETAS 300MG X 20TAB	300 MG    	TABLETAS  	TABL	NORM	TAGR	475	1033
LOFTYL02	LOFTYL TABLETAS 300MG X 20TAB	300MG     	TABLETAS  	TABL	NORM	PAST	477	1034
LOGANI01	LOGANIL JARABE ADULTO 250MG / 5ML   X  120 ML	250MG / 5M	JARABE    	JARA	NORM	LIQU	91	1035
LOGANI02	LOGANIL GOTAS 50MG/ML X 30 ML	5MG/ML    	GOTAS     	GOTA	NORM	GOTA	91	1036
LONGAC01	LONGACEF COMPRIMIDOS 400 MG X 5 COMP	400MG     	COMPRIMIDO	COMP	NORM	PAST	94	1037
LONGAC02	LONGACEF SUSPENSION 100MG/5ML X 30 ML	100MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	94	1038
LONGAC03	LONGACEF SUSPENSION 100 MG /5 ML X 60 ML	100MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	94	1039
LONGAC04	LONGACEF COMPRIMIDOS DE 400 MG X 7	400 MG    	COMPRIMIDO	COMP	NORM	PAST	94	1040
LONGAC05	LONGACEF COMPRIMIDOS 400 MG X 10 TAB	400 MG    	10 TAB    	COMP	NORM	PAST	94	1041
LOP   01	LOPID TABLETAS 600MG X 20 TAB	600MG     	TABLETAS  	TABL	NORM	PAST	202	1042
LOPID 01	LOPID TABLETAS 300 MG X 30 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	202	1043
LOPID 02	LOPID TABLETAS  900 MG X 10 TAB	900MG     	TABLETAS  	TABL	NORM	PAST	202	1044
LOPRES01	LOPRESOR GRAGEAS 100 MG X 20 GRA	100 MG    	GRAGEAS   	GRAG	NORM	PAST	282	1045
LORAT 01	LORATADINA JARABE FCO 5MG/ML X 60ML	5MG       	JARABE    	JARA	NORM	LIQU	266	1046
LORATA01	LORATADINA TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	266	1047
LORATA02	LORATADINA JARABE 1MG/ML X 60 ML	60ML      	JARABE    	JARA	NORM	LIQU	266	1048
LORATS01	LORATADINA+PSEUDOEFEDRINA JARABE PEDIATRICO 5MG / 60 MG X 60 ML	5 MG / 60 	JARABE    	JARA	NORM	LIQU	572	1049
LOSAR101	LOSARTAN POTASICO + HIDROCLOROTIAZIDA TABLETAS 50MG/12.5MG X 10 TAB	50MG/12.5M	TABLETAS  	TABL	NORM	PAST	270	1050
LOSAR102	LOSARTAN POTASICO + HIDROCLOROTIAZIDA TABLETAS  100MG/25MG MG X 15 TAB	100 MG / 2	TABLETAS  	TABL	NORM	PAST	270	1051
LOSART01	LOSARTAN POTASICO TABLETAS 50 MG X 10 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	269	1052
LOSART02	LOSARTAN POTASICO TABLETAS 100 MG X 14 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	269	1053
LOSART03	LOSARTAN POTASICO TABLETAS 50 MG X 30 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	269	1054
LOTRIC01	LOTRICOMB CREMA 0.643MG - 10MG/G  X 20 G	          	CREMA     	CREM	NORM	POMA	56	1055
LOVAST01	LOVASTATINA TABLETAS 20 MG	20 MG     	TABLETAS  	TABL	NORM	PAST	528	1056
LOXONI01	LOXONIN TABLETAS 60 MG X 15 TAB	60 MG     	TABLETAS  	TABL	NORM	PAST	271	1057
LUDIOM01	LUDIOMIL GRAGEAS 75 MG	          	          	AMPO	NORM	PAST	272	1058
LUDIOM02	LUDIOMIL GRAGEAS 75 MG X 20 GRAG	75 MG     	GRAGEAS   	GRAG	NORM	PAST	272	1059
LUMIGA01	LUMIGAN SOLUCION OFTALMICA X 3 ML	          	SOL. OFT. 	SOLI	NORM	GOTA	63	1060
LYRICA01	LYRICA CAPSULAS 75 MG X 14 CAP	75 MG     	CAPSULAS  	CAPS	NORM	PAST	351	1061
LYRICA02	LYRICA CAPSULAS 150 MG X 14 CAP	150 MG    	CAPSULA   	CAPS	NORM	PAST	351	1062
LYRICA03	LYRICA CAPSULAS 300 MG  X 14  CAP	300 MG    	CAPSULAS  	CAPS	NORM	PAST	351	1063
MAALOX01	MAALOX PLUS SUSPENSION 360 ML	          	SUSPENSION	SUSP	NORM	LIQU	219	1064
MAALOX02	MAALOX SUSPENSION 180 ML	          	SUSPENSION	SUSP	NORM	LIQU	219	1065
MACROD01	MACRODANTINA CAPSULAS 50 MG X 30 CAP	50 MG     	CAPSULAS  	CAPS	NORM	PAST	302	1066
MACROD02	MACRODANTINA CAPSULAS 100 MG X 40 CAP	100 MG    	CAPSULAS  	CAPS	NORM	PAST	302	1067
MADOPA01	MADOPAR COMPRIMIDOS 200/50MG X 30 COMP	200/50MG  	COMPRIMIDO	COMP	NORM	PAST	257	1068
MALTOF01	MALTOFERFOL JARABE  50 MG - 120 MCG  X 120 ML	50MG/120MC	JARABE    	JARA	NORM	LIQU	340	1069
MALTOF02	MALTOFERFOL TABLETAS  MASTICABLES  100 MG  350MCG X 30 TAB	100MG/350M	TABLETAS  	TABL	NORM	PAST	340	1070
MANI  01	MANIDON TABLETAS 80MG X 50 TAB	80MG      	TABLETAS  	TABL	NORM	PAST	434	1071
MANI  02	MANIDON TABLETAS 40 MG X 50 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	434	1072
MANIDO01	MANIDON RETARD TABLETAS  240 MG X 10 TAB	240 MG    	TABLETAS  	TABL	NORM	PAST	434	1073
MARADE01	MARADEX SUSPENSION OFTALMICA  0.1%  X  5 ML	0.1%      	SUSP. OFT.	SOLI	NORM	LIQU	135	1074
MATILO01	MATILOL SOLUCION OFTALMICA 0.25% X 6 ML	0.25%     	SOL. OFT. 	SOLI	NORM	GOTA	406	1075
MATILO02	MATILOL SOLUCION OFATALMICA  0.50% X 6 ML	0.50%     	SOL. OFT. 	SOLI	NORM	GOTA	406	1076
MAXEPA01	MAXEPA CAPSULAS BLANDAS FRASCO X 30 CAP	          	CAPSULAS  	CAPS	NORM	PAST	4	1077
MAXICO01	MAXICORT SUSPENSION OFTALMICA X 5 ML	          	SUSPENSION	SUSP	NORM	GOTA	137	1078
MAXICO02	MAXICORT UNGUENTO  OFTALMICO X 3.5 G	          	UNGUENTO  	UNGU	NORM	POMA	137	1079
MEBEND01	MEBENDAZOL TABLETAS 100 MG X 6 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	273	1080
MEDROL01	MEDROL TABLETAS 16 MG X 14 TAB	16MG      	TABLETAS  	TABL	NORM	PAST	280	1081
MELOXI01	MELOXICAM TABLETAS 15 MG X 10 TAB	15 MG     	TABLETAS  	TABL	NORM	PAST	276	1082
MELOXI02	MELOXICAM TABLETAS 7.5 MG X 10 TAB	7.5 MG    	TABLETAS  	TABL	NORM	PAST	276	1083
MESTIN01	MESTINON TABLETAS 60 MG X 20 TAB	60 MG     	TABLETAS  	TABL	NORM	PAST	71	1084
METFO 01	METFORMINA  CLORHIDRATO TABLETAS 500 MG  X 30 TABLETAS	500 MG    	TABLETAS  	TABL	NORM	PAST	277	1085
METFO 02	METFORMINA TABLETAS  850 MG  X 28 TAB	850 MG    	TABLETAS  	TABL	NORM	PAST	277	1086
METFOR01	METFOR TABLETAS  LP  1 G  (1000MG) X 30 TAB	1 G       	TABLETAS  	TABL	NORM	PAST	277	1087
METFOR02	METFOR  TABLETAS LP  1 G  (1000MG) X 10 TAB	1 G       	TABLETAS  	TABL	NORM	PAST	277	1088
METFOR03	METFORMINA/GLIBENCLAMIDA TABLETAS  500 MG/2.5 MG X 15 TAB	500/2.5MG 	TABLETAS  	TABL	NORM	PAST	278	1089
METIC101	METICORTEN TABLETAS 20 MG X 20 TAB.	20 MG     	TABLETAS  	TABL	NORM	PAST	349	1090
METIC102	METICORTEN TABLETAS  5 MG X 10 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	349	1091
METIC103	METICORTEN TABLETAS  5 MG  X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	349	1092
METIC104	METICORTEN TABLETAS 50 MG X 10 TAB.	50 MG     	TABLETAS  	TABL	NORM	PAST	349	1093
METICO01	METICORTELONE SOLUCION ORAL  3 MG/ ML  X 60 ML	3 MG/ ML  	SOLUCION  	SOLI	NORM	LIQU	195	1094
METOCL01	METOCLOPRAMIDA TABLETAS 10 MG X 20 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	281	1095
METOCL02	METOCLOPRAMIDA AMP 10MG / 2ML	10MG / ML 	AMPOLLAS  	AMPO	NORM	AMPO	281	1096
METRO101	METRONIDAZOL BENZOIL SUSPENSION 125 MG/5ML X 120 ML	125 MG / 5	SUSPENSION	SUSP	NORM	LIQU	284	1097
METRO102	METRONIDAZOL BENZOIL SUSPENSION 250 MG/5ML X 120 ML	250MG /5ML	SUSPENSION	SUSP	NORM	LIQU	284	1098
METRON01	METRONIDAZOL TABLETAS 500 MG X 10 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	283	1099
METRON02	METRONIDAZOL OVULOS 500 MG X 10 OVU	500 MG    	OVULOS    	OVUL	NORM	SUPO	283	1100
METRON03	METRONIDAZOL TABLETAS 250MG/ 5ML	250MG / 5M	TABLETAS  	TABL	NORM	PAST	283	1101
METRON04	METRONIDAZOL SUSPENSION 125MG  X 120 ML	125MG / 5M	SUSPENSION	SUSP	NORM	LIQU	283	1102
METRON05	METRONIDAZOL SUSPENSION 250 MG/ 5ML  X 120 ML	250 MG/5ML	SUSPENSION	SUSP	NORM	LIQU	283	1103
METROV01	METROVAX OVULOS VAGINALES 500MG X 10	500 MG    	OVULOS    	OVUL	NORM	SUPO	283	1104
MEVALO01	MEVALOTIN TABLETAS 40 MG X 10 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	345	1105
MEVALO02	MEVALOTIN TABLETAS 20 MG  X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	345	1106
MICAR101	MICARDIS PLUS TABLETAS 80/12.5 MG X 14 TAB	80/12.5 MG	TABLETAS  	TABL	NORM	PAST	402	1107
MICARD01	MICARDIS TABLETAS 40 MG  X 14 TAB	40MG      	TABLETAS  	TABL	NORM	PAST	400	1108
MICARD02	MICARDIS TABLETAS 80 MG X 14 TAB	80MG      	TABLETAS  	TABL	NORM	PAST	400	1109
MICARD03	MICARDIS PLUS TABLETAS 40 MG/12.5 MG X 14 TAB	40/12.5 MG	TABLETAS  	TABL	NORM	PAST	401	1110
MICARD04	MICARDIS PLUS COMPRIMIDOS 80/25 MG X 14	80/25 MG  	COMPRIMIDO	COMP	NORM	PAST	402	1111
MICROS01	MICROSER TABLETAS 8 MG X 20 TAB	8 MG      	TABLETAS  	TABL	NORM	PAST	53	1112
MICROS02	MICROSER  FORTE TABLETAS 16 MG X 20 TAB	16 MG     	TABLETAS  	TABL	NORM	PAST	53	1113
MIGRAV01	MIGRAVAL COMPRIMIDOS 100 MG X 2 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	396	1114
MILAX 01	MILAX POLVO X 360 G	          	POLVO     	GRAN	NORM	TAGR	338	1115
MINIDI01	MINIDIAB COMPRIMIDOS 5MG X 15 COMP	5MG       	COMP      	COMP	NORM	PAST	513	1116
MINPRE01	MINPRES TABLETAS  1 MG X 30 TAB	1 MG      	TABLETAS  	TABL	NORM	PAST	559	1117
MIOVIT01	MIOVIT GOTAS X 20 ML	          	GOTAS     	GOTA	NORM	GOTA	439	1118
MIOVIT02	MIOVIT JARABE X 90 ML	          	JARABE    	JARA	NORM	LIQU	439	1119
MIRAPE01	MIRAPEX TABLETAS 0.25 MG X 30 TAB	0.25 MG   	TABLETAS  	TABL	NORM	PAST	343	1120
MIRAPE02	MIRAPEX TABLETAS 1 MG X 30 TAB	1 MG      	TABLETAS  	TABL	NORM	PAST	343	1121
MOBIC 01	MOBIC 7.5 MG X 10 TAB	7.5 MG    	TABLETAS  	TABL	NORM	PAST	276	1122
MOBIC 02	MOBIC AMPOLLA 15MG/1.5 ML X 1 AMP	15MG/1.5ML	AMPOLLAS  	AMPO	NORM	AMPO	276	1123
MODERA01	MODERAN SOLUCION ORAL 10.1G / 15ML X 120 ML	10.1G/15ML	SOL. ORAL 	SOLI	NORM	LIQU	249	1124
MODURE01	MODURETIC TABLETAS 5MG-50 MG X 30 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	217	1125
MON   01	MONOPRIL  TABLETAS 20MG X 10 TAB	20MG      	TABLETAS  	TABL	NORM	TAGR	506	1126
MONO  01	MONOPRIL PLUS TABLETAS 20MG/12.5MG X 10TAB	20MG/12.5M	TABLETAS  	TABL	NORM	PAST	538	1127
MONOCA01	MONOCARD TABLETAS 20MG X 30 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	542	1128
MONOCA02	MONOCARD  TABLETAS 40MG X 10 TAB	40MG      	TABLETAS  	TABL	NORM	PAST	542	1129
MONOPR01	MONOPRIL 10MG X 10 TBLETAS	10MG      	TAB       	TABL	NORM	TAGR	506	1130
MONTE 01	MONTELUKAST TABLETAS 5MG X 10TAB	5MG       	TABLETAS  	TABL	NORM	PAST	288	1131
MONTEL01	MONTELUKAST SODICO COMPRIMIDOS MASTICABLES 5 MG X 10 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	288	1132
MONTEL02	MONTELUKAST SODICO COMPRIMIDOS AP 10 MG X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	288	1133
MONTEL03	MONTELUKAST SODICO TABLETAS MASTICABLES 4 MG X 10 TAB	4 MG      	TABLETAS  	TABL	NORM	PAST	288	1134
MOXIFL01	MOXIFLOXACINA TABLETAS 400 MG X 5 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	289	1135
MOXIFL02	MOXIFLOXACINA TABLETAS 400 MG X 10 TAB	400MG     	TABLETAS  	TABL	NORM	PAST	289	1136
MUCOSO01	MUCOSOLVAN JARABE PEDIATRICO 150MG/5ML X 120 ML	150MG/5ML 	JARABE    	JARA	NORM	LIQU	524	1137
MUCOSO02	MUCOSOLVAN  JARABE ADULTO 30MG/5ML X 120ML	30MG      	JARABE    	JARA	NORM	LIQU	524	1138
MUKIAL01	MUKIAL POLVO/SUSP ORAL 3.5%  X  60ML	3.5%      	POLVO     	POLV	NORM	LIQU	494	1139
MULTI 01	MULTIVIRAL  CASULAS X 30 CAP	          	CAP       	CAPS	NORM	PAST	533	1140
MULTIV01	MULTIVITAMINICO TABLETAS X 60 TAB	          	TABLETAS  	TABL	NORM	PAST	439	1141
MYCOFE01	MYCOFENTIN OVULOS 600MG X 2 OVULOS	600MG     	OVULOS    	OVUL	NORM	SUPO	181	1142
MYCOFE02	MYCOFENTIN CREMA VAGINAL X 40 G Y 8 APLICADORES	40 G      	CREMA     	CREM	NORM	POMA	181	1143
MYCOFE03	MYCOFENTIN CREMA TOPICA AL 2% TUBO DE 20 G	2%        	CREMA     	CREM	NORM	POMA	181	1144
MYCOS 01	MYCOSPOR CREMA 1% X 15G	1%        	CREMA     	CREM	NORM	POMA	460	1145
MYCOSP01	MYCOSPOR SOLUCION FRASCO 15ML	          	SOLUCION  	SOLU	NORM	LIQU	460	1146
NAABAK01	NAABAK SOLUCION OFT 4.9%	4.9%      	GOTAS     	GOTA	NORM	GOTA	454	1147
NASACO01	NASACORT AQ ATOMIZADOR NASAL 55 MCG X 120 DOSIS	55 MCG    	ATOMIZADOR	AERO	NORM	GOTA	419	1148
NASAIR01	NASAIR ATOMIZADOR NASAL 50MCG/DOSIS 200 OSIS	50MCG/DOSI	ATOMIZADOR	AERO	NORM	LIQU	49	1149
NASONE01	NASONEX INHALADOR  NASAL 50 MCG/DOSIS X 60 DOSIS	50MCG/DOSI	AEROSOLES 	AERO	NORM	GOTA	198	1150
NATELE01	NATELE TABLETAS X 28 TAB	          	TABLETAS  	TABL	NORM	PAST	89	1151
NATRIL01	NATRILIX COMPRIMIDOS 2.5 MG X 10 COMP	2.5 MG    	COMPRIMIDO	COMP	NORM	PAST	228	1152
NATRIL02	NATRILIX  A.P COMPRIMIDOS 1.5MG	1.5MG     	COMP      	COMP	NORM	PAST	228	1153
NEBILE01	NEBILET TABLETAS 5 MG X 14 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	295	1154
NEO-S 01	NEO-SYNALAR UNGUENTO 0.025% X 30G	0.025%    	UNGUENTO  	UNGU	NORM	POMA	507	1155
NEO-SY01	NEO-SYNALAR UNGUENTO 0.01% X 30 G	0.01%     	UNGUENTO  	UNGU	NORM	POMA	507	1156
NEOMIC01	NEOMICINA+ BACITRACINA UNGÜENTO X 15 G	          	UNGUENTO  	UNGU	NORM	POMA	296	1157
NEURO 01	NEURONTIN  CAPSULAS 800MG X 18 CAP	800MG     	CAPSULAS  	CAPS	NORM	PAST	200	1158
NEURON01	NEURONTIN TABLETAS 300 MG X 20 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	200	1159
NEURON02	NEURONTIN CAPSULAS  400 MG X 20 CAPSULAS	400 MG    	CAPSULAS  	CAPS	NORM	PAST	200	1160
NEURON03	NEURONTIN TABLETAS 600 MG  X 18 TAB	600 MG    	TABLETAS  	TABL	NORM	PAST	200	1161
NEXIUM01	NEXIUM SOBRES 4MG	4MG       	SOBRES    	SOBR	NORM	TAGR	166	1162
NIFEDI01	NIFEDIPINA CAPSULAS LP 30 MG X 15 CAP	30 MG     	CAPSULAS  	CAPS	NORM	PAST	297	1163
NIFEDI02	NIFEDIPINA COMPRIMIDOS AP 20 MG X 20 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	297	1164
NIFEDI03	NIFEDIPINA COMPRIMIDOS 10 MG X 20 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	297	1165
NIFEDI04	NIFEDIPINA  COMPRIMIDOS  10 MG  X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	297	1166
NIMESU01	NIMESULIDE TABLETAS 100 MG X 10 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	298	1167
NIMESU02	NIMESULIDE  COMPRIMIDOS 10 MG X 20 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	297	1168
NIMESU03	NIMESULIDE COMPRIMIDOS 10 MG  X 30 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	298	1169
NIMODI01	NIMODIPINA COMPRIMIDOS 30 MG X 30 COMP	30MG      	COMPRIMIDO	COMP	NORM	PAST	299	1170
NIMODI02	NIMODIPINA COMPRIMIDOS 40 MG X 20 COMP	40 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1171
NIMODI03	NIMODIPINA COMPRIMIDOS  30MG X 15 COMP	30MG      	COMP      	COMP	NORM	PAST	299	1172
NIMODI04	NIMODIPINA COMPRIMIDOS 30MGX 15 COMP	30MG      	COMP      	COMP	NORM	PAST	299	1173
NISTAT01	NISTATINA UNGUENTO TOPICO  100.000UI/G X 15G	100.000 UI	UNGUENTO  	CREM	NORM	POMA	300	1174
NISTAT02	NISTATINA CREMA VAGINAL 100.000 U/G + APLICADOR X 60 G	100.000U/G	CREMA     	CREM	NORM	POMA	300	1175
NISTAT03	NISTATINA GOTAS 100 U/G X 30 ML	100 U/G   	GOTAS     	GOTA	NORM	GOTA	300	1176
NITREN01	NITRENDIL CAPSULAS 20 MG	20 MG     	CAPSULAS  	CAPS	NORM	PAST	565	1177
NITREN02	NITRENDIL CAPSULAS 10 MG	10 MG     	CAPSULAS  	CAPS	NORM	PAST	565	1178
NITROC01	NITROCARD TABLETAS 2.5 MG	25 MG     	TABLETAS  	TABL	NORM	PAST	304	1179
NITROD01	NITRODERM  25 MG X 5 PARCHES	25 MG     	PARCHES   	PARC	NORM	PARC	304	1180
NORFLO01	NORFLOXACINA TABLETAS 400 MG X 7	400 MG    	TABLETAS  	TABL	NORM	PAST	305	1181
NORFLO02	NORFLOXACINA TABLETAS 400 MG X 6	400 MG    	TABLETAS  	TABL	NORM	PAST	305	1182
NORFLO03	NORFLOXACINO TABLETAS 400 MG X 14	400 MG    	TABLETAS  	TABL	NORM	PAST	305	1183
NORVAS01	NORVAS COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	32	1184
NORVAS02	NORVASC COMPRIMIDOS 10 MG X 10 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	32	1185
NORVAS03	NORVAS TABLETAS  5 MG X 10 TAB	5MG       	TABLETA   	COMP	NORM	PAST	32	1186
NOTOLA01	NOTOLAC TABLETAS  20 MG X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	247	1187
NOTOLA02	NOTOLAC AMPOLLA 30 MG/ML  X 1 ML	30 MG/ML  	AMPOLLAS  	AMPO	NORM	AMPO	247	1188
NOTOLA03	NOTOLAC HYPAK 30MG/ML JERINGA RELLENA	30MG/ML   	HYPAK     	AMPO	NORM	AMPO	247	1189
NOTOLA04	NOTOLAC TABLETAS SUBLINGUALES 30 MG X 4 TAB	30 MG     	TABLETAS  	TABL	NORM	PAST	247	1190
NOTOLA05	NOTOLAC TABLETAS 10 MG X 12 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	247	1191
NOVARO01	NOVARONA TABLETAS 200 MG X 10 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	31	1192
NOVO  01	PENFILL 10UI/ML X 3ML	          	AMP       	AMPO	NORM	AMPO	229	1193
NOVO  02	NOVORAPID 5 FLEXPEN 100UI/ML  X 3ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1194
NOVOL101	NOVOLIN N AMPOLLAS 100 UI/ML X 10 ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1195
NOVOL102	NOVOLIN N  AMPOLLAS 100UI/ML X 10ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1196
NOVOL201	NOVOLIN R AMPOLLAS 100 UI/ML X 10 ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1197
NOVOL202	NOVOLIN R PENFILL 100UI/ML X 3ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1198
NOVOLI01	NOVOLIN  70/30 AMPOLLAS  100 UI/ML X 10 ML	100 UI/ML 	AMPOLLAS  	AMPO	NORM	AMPO	229	1199
NOVOLI02	NOVOLIN 70/30 PENFILL 100UI/ML X 3ML	100 UI/ML 	AMPOLLAS  	AMPO	NORM	AMPO	229	1200
NOVOM 01	NOVOMIX 25 PENFILL 100UI/ML  1 X 3ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1201
NOVOM 02	NOVOMIX 25 FLEXPEN	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1202
NOVOM 03	NOVO MIX  FLEXPEN ESTUCHE X 5 FLEXPEN	5 FLEXPLEN	ESTUCHE   	AMPO	NORM	AMPO	229	1203
NOVOMI01	NOVOMIX FLEXPEN 30  100UI/ ML 1 X 3ML	100UI/ML  	AMPOLLA   	AMPO	NORM	AMPO	229	1204
NOVOMI02	PENFILL 100UI/ML X 3ML	          	AMP       	AMPO	NORM	AMPO	229	1205
NOVONO01	NOVONORM COMPRIMIDOS 1 MG X 30 COMP	1 MG      	COMPRIMIDO	COMP	NORM	PAST	370	1206
NOVONO02	NOVONORM COMPRIMIDOS 2 MG X 30 COMP	2 MG      	COMPRIMID 	COMP	NORM	PAST	370	1207
NOVORA01	NOVORAPID PENFILL 100 UI/ML X 3 ML	100UI/ML  	AMPOLLAS  	AMPO	NORM	AMPO	229	1208
NUTIZY01	NUTIZYM COMPOSITUM GRAGEAS X 20 GRA	          	GRAGEAS   	GRAG	NORM	PAST	69	1209
NUTRAC01	NUTRACORT CREMA  X 60 G	          	CREMA     	CREM	NORM	POMA	516	1210
OCUPRE01	OCUPRED SUSPENSION OFTALMICA  1 % X 5 ML	1 %       	SUSPENSION	GOTA	NORM	GOTA	347	1211
OFTERR01	OFTERRA UNGÜENTO OFTALMICO X 7G	7G        	UNGUENTO  	UNGU	NORM	POMA	315	1212
OLANZA01	OLANZAPINA TABLETAS  5MG X 60 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	307	1213
OMEGA 01	OMEGA CAPSULAS BLANDAS 1000 MG X 60 CAP	1000 MG   	CAPSULAS  	CAPS	NORM	PAST	4	1214
OMEPRA01	OMEPRAZOL CAPSULAS 20 MG X 14 CAP	20MG      	CAPSULAS  	CAPS	NORM	PAST	310	1215
OMEPRA02	OMEPRAZOL CAPSULAS 20MG X 7 CAPSULAS	20MG      	CAPSULAS  	CAPS	NORM	PAST	310	1216
OMETRI01	OMETRIX  CAPSULA BLANDA 1000MG X 30 CAP BLANDAS	1000MG    	CAPSULAS B	CAPS	NORM	PAST	4	1217
OMETRI02	OMETRIX CAPSULAS BLANDAS 1000MG X 60 CAP	1000MG    	CAPSULAS B	CAPS	NORM	PAST	4	1218
OMMUNA01	OMMUNAL CAPSULAS 7 MG	          	          	AMPO	NORM	PAST	264	1219
OMMUNA02	OMMUNAL CAPSULAS PED 3.5MG X 10 CAP	3.5MG     	CAPSULAS  	CAPS	NORM	PAST	264	1220
OMMUNA03	OMMUNAL CAPSULAS 7MG X 10 CAP	7MG       	CAPSULAS  	CAPS	NORM	PAST	264	1221
OMMUNA04	OMMUNAL SOBRES PEDIATRICOS X 10	          	SOBRES    	SOBR	NORM	TAGR	264	1222
ORTHOG01	ORTHOGYNEST OVULOS  3.5MG X 6 OVULOS	3.5MG     	OVULOS    	OVUL	NORM	SUPO	172	1223
OTALEX01	OTALEX GOTAS OTICAS 0.2-1G / 100ML  X 5 ML	0.2-1G/100	GOTAS OT. 	GOTA	NORM	GOTA	107	1224
OVESTI01	OVESTIN COMPRIMIDOS ORALES 1 MG X 30 COMP	1 MG      	COMPRIMIDO	COMP	NORM	PAST	172	1225
OVESTI02	OVESTIN COMPRIMIDOS ORALES  2 MG X 30 COMP	2 MG      	COMPRIMIDO	COMP	NORM	PAST	172	1226
OVESTI03	OVESTIN CREMA VAGINAL  1MG/G  X  15 G	1MG/G     	CREMA VAG.	CREM	NORM	POMA	172	1227
OVESTI04	OVESTIN  0.5 MG/ OVULOS X 15 OVULOS	0.5 MG    	OVULOS    	OVUL	NORM	SUPO	172	1228
OXIDRE01	OXIDREN TABLETAS 35 MG X 4 TAB	35 MG     	TABLETAS  	TABL	NORM	PAST	374	1229
OXIDRE02	OXIDREN TABLETAS  150 MG  X  1 TAB	150 MG    	TABLETAS  	TABL	NORM	PAST	374	1230
OXIMET01	OXIMETAZOLINA SOLU NASAL PEDIATICAS (0.025%) 0.25 MG/ML  X 15 ML	0.25MG X 1	GOTAS     	GOTA	NORM	GOTA	314	1231
OXIMET02	OXIMETAZOLINA  SOLUC NASAL ADULTOS (0.05%)  50MGX 15 ML	50MG / 100	GOTAS     	SOLI	NORM	GOTA	314	1232
OXIMET03	OXIMETAZOLINA 0.50MG/ML SOLUC NASAL ATOMIZADOR  X 15ML	0.50MG X 1	ATOMIZADOR	AERO	NORM	GOTA	314	1233
OXIMET04	OXIMETAZOLINA ATOMIZADOR FCO GOTERO CON 15ML DEL 25MG(0.025%) / 100ML	25MG      	ATOMIZADOR	AERO	NORM	LIQU	314	1234
OXOLA 01	OXOLAM JARABE ADULTOS 50MG / 5ML X 120 ML	50MG/5ML  	JARABE    	JARA	NORM	LIQU	316	1235
OXOLA 02	OXOLAM JARABE PEDIATRICO 50MG/ 5ML X 120ML	50MG / 5ML	JARABE    	JARA	NORM	LIQU	316	1236
OXOLAM01	OXOLAMINA JARABE ADULTO 70 MG/5ML X 120ML	70MG/5ML  	JARABE    	JARA	NORM	LIQU	316	1237
OXOLAM02	OXOLAMINA JARABE PEDIATRICO 50MG/5ML X 120ML	50MG/5ML  	JARABE    	JARA	NORM	LIQU	316	1238
PAINFO01	PAINFORT COMPRIMIDOS 50MG / 50MG X 10 COMPRIMIDOS	50MG/ 50MG	COMPRIMIDO	COMP	NORM	PAST	143	1239
PAINFO02	PAINFORT COMPRIMIDO 50MG / 50MG X 10 COMPR	50MG /50MG	COMPRIMIDO	CAPS	SICO	PAST	143	1240
PAN   01	PANKREON  TABLETAS X 50 TAB	          	TAB       	TABL	NORM	TAGR	492	1241
PANKRE01	PANKREOSIL 172MG/80MG X 20 GRAGEAS	172MG/80MG	GRAGEAS   	GRAG	NORM	PAST	163	1242
PANT  01	PANTOP COMPRIMIDOS 40MG X 7 COMP	40MG      	COMPRIMIDO	COMP	NORM	PAST	319	1243
PANTOM01	PANTOMICINA TABLETAS 600MG	600MG     	TAB       	TABL	NORM	PAST	164	1244
PANTOP01	PANTOPRAZOL TABLETAS 20 MG X 7 TAB	20MG      	TABLETAS  	TABL	NORM	PAST	319	1245
PANTOP02	PANTOPRAZOL TABLETAS 40 MG X 7 TAB	40MG      	TABLETAS  	TABL	NORM	PAST	319	1246
PANTOP03	PANTOPRAZOL. PANTROPAZOL. TABLETAS 40 MG X 14 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	319	1247
PARIET01	PARIET TABLETAS 20 MG X 7 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	362	1248
PARIET02	PARIET TABLETAS 10 MG X 14 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	362	1249
PARLOD01	PARLODEL COMPRIMIDOS 2.5MG X 28 COMP	2.5MG     	COMPRIMIDO	COMP	NORM	PAST	464	1250
PAROXE01	PAROXETINA TABLETAS 20 MG X 10 TAB	20MG      	TABLETAS  	TABL	NORM	PAST	321	1251
PAROXI01	PAROXIL TABLETAS 20 MG X 20 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	321	1252
PATANO01	PATANOL SOLUCION OFTALMICA 0.1% X 5 ML	0.1%      	SOL.OFT.  	SOLI	NORM	GOTA	120	1253
PAXIL 01	PAXIL TABLETAS 20 MG X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	321	1254
PAXIL 02	PAXIL TABLETAS 20 MG X 20 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	321	1255
PAXILC01	PAXIL CR TABLETAS 12.5 MG X 10 TAB	12.5 MG   	TABLETAS  	TABL	NORM	PAST	321	1256
PAXILC02	PAXIL CR TABLETAS 25 MG X 10 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	321	1257
PEDIAC01	PEDIACORT GOTAS 1.33%  X 10 ML	1.33%     	GOTAS     	GOTA	NORM	GOTA	169	1258
PENICI01	PENICILINA FCO AMPOLLA  1.200.000 UI	1.200.000U	AMPOLLAS  	AMPO	NORM	AMPO	322	1259
PENICI02	PENICILINA  AMPOLLAS 6-3-3	6-3-3     	AMPOLLAS  	AMPO	NORM	AMPO	323	1260
PENTOL01	PENTOLINA TABLETAS LP 400 MG X 30 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	324	1261
PENTOL02	PENTOXIFILINA 400MG X 30 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	324	1262
PERIDO01	PERIDONT SOLUCION 0.12% X 350ML	0.12%     	SOLUCION  	SOLU	NORM	LIQU	530	1263
PERMUC01	PERMUCAL POMADA X 30 GR	          	POMADA    	POMA	NORM	POMA	311	1264
PERMUC02	PERMUCAL SUPOSITORIOS 4MG/1MG  ESTUCHES X 10 SUP	4MG/1MG   	SUPOSITORI	SUPO	NORM	SUPO	311	1265
PERSAN01	PERSANTIN GRAGEAS 25MG X 20 GRA	25MG      	GRAGEAS   	GRAG	NORM	PAST	148	1266
PERSAN02	PERSANTIN GRAGEAS  75 MG  X 12	75MG      	GRAGEAS   	GRAG	NORM	PAST	148	1267
PEVA  01	PEVARYL CREMA 1% X 15G	1%        	CREMA     	CREM	NORM	POMA	490	1268
PEVARY01	PEVARYL  POLVO 1% X 30 G	1%        	POLVO     	POLV	NORM	TAGR	490	1269
PHARMA01	PHARMATON  KIDDI 200 ML	          	JARABE    	JARA	NORM	LIQU	127	1270
PHARMA02	PHARMATON KIDDI  JARABE 120 ML	          	JARABE    	JARA	NORM	LIQU	127	1271
PHDERM01	PH DERM CREMA 100 G	          	CREMA     	CREM	NORM	POMA	84	1272
PHDERM02	PH DERM LOCION HIDRATANTE X 190 ML	          	LOCION    	LOCI	NORM	LIQU	84	1273
PHDERM03	PH DERM PLUS CREMA 85 G	          	CREMA     	CREM	NORM	POMA	84	1274
PHDERM04	PH DERM CHAMPU  X 120ML	120 ML    	CHAMPU    	CHAM	NORM	LIQU	84	1275
PINVEX01	PINVEX SOLUCION TOPICO BUCAL  5G-1G/100ML X 10ML	5G-1G/100M	SOL. TOP. 	SOLI	NORM	LIQU	210	1276
PLANTA01	PLANTABEN POLVO EFERVESCENTE  5G  X 30 SOBRES	          	SOBRES    	SOBR	NORM	LIQU	335	1277
PLAVIX01	PLAVIX TABLETAS 75MG X 14 TAB	75MG      	TABLETAS  	TABL	NORM	PAST	47	1278
PLEND 01	PLENDIL TABLETAS 10MG X 10TAB	10MG      	TAB       	TABL	NORM	TAGR	179	1279
PLENDI01	PLENDIL TABLETAS L.P. 5 MG X 10 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	179	1280
POENFL01	POENFLOX SOLUCION OFTALMICA  X 10 ML	          	SOL.OFT.  	GOTA	NORM	GOTA	306	1281
POLI-O01	POLI-OTICO SOL GOTAS 0.5GR  (FRASCO GOTERO) X 5ML	0.5 GR    	GOTAS     	GOTA	NORM	GOTA	136	1282
PRADAX01	PRADAXA TABLETAS 110 MG X 30 TAB	110 MG    	TABLETAS  	TABL	NORM	PAST	130	1283
PRADAX02	PRADAXA CAPSULAS 150MG X 30 CAPS	150MG     	CAPS      	CAPS	NORM	PAST	130	1284
PRANE101	PRANEX  L.P CAPSULAS 90 MG X 10 CAP	90MG      	CAPSULAS  	CAPS	NORM	PAST	5	1285
PRANEX01	PRANEX CAPSULAS 60 MG  X 10 CAP	60MG      	CAPSULAS  	CAPS	NORM	PAST	5	1286
PREBLO01	PREBLOC TABLETAS 10 MG X 30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	66	1287
PREBLO02	PREBLOC TABLETAS 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	66	1288
PREDNE01	PREDNEFRIN FORTE GOTAS OFTALMICAS 10 MG   X 5 ML	10 MG     	GOTAS     	GOTA	NORM	GOTA	350	1289
PREDNI01	PREDNISONA TABLETAS 5 MGX 10 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	349	1290
PREDNI02	PREDNISONA TABLETAS 50 MG X 10 TABLETAS	50 MG     	TABLETAS  	TABL	NORM	PAST	349	1291
PREDNI03	PREDNISONA  TABLETAS 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	349	1292
PREM  01	PREMARIN GRAGEAS  0.625MG X 28 GRAGEAS	0.625MG   	GRAGEAS   	GRAG	NORM	PAST	173	1293
PREMAR01	PREMARIN GRAGEAS 0.3MG X 28 GRA	0.3MG     	GRAGEAS   	GRAG	NORM	PAST	173	1294
PREMAR02	PREMARIN CREMA VAGINAL X 21 G	21 G      	CREMA     	CREM	NORM	POMA	173	1295
PRESID01	PRESIDERM UNGUENTO AL 2% X 15 G	2 %       	UNGUENTO  	UNGU	NORM	POMA	290	1296
PRETER01	PRETERAX COMPRIMIDOS 2 MG/0.625 MG X 10 COMP	2MG / 0.62	COMPRIMIDO	COMP	NORM	PAST	325	1297
PRIMPE01	PRIMPERAN GOTAS 2.6MG/ML X 30ML	2.6MG/ML  	GOTAS     	GOTA	NORM	GOTA	281	1298
PRIMPE02	PRIMPERAN SOLUCION ORAL  1MG/ML X 100ML	1MG/ML    	SOL. ORAL 	SOLI	NORM	LIQU	281	1299
PRIMPE03	PRIMPERAN COMPRIMIDOS 10 MG X 20 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	281	1300
PRIT  01	PRITOR TM TABLETAS 80MG X 14TAB	80 MG     	TABLETAS  	TABL	NORM	PAST	400	1301
PRITO 01	PRITOR TM 40MG X 14 TABLETAS	40MG      	TABLETAS  	TABL	NORM	PAST	400	1302
PRITOR01	PRITOR PLUS TABLETAS 40MG/12.5MG X 14 TAB	40MG/12.5M	TABLETAS  	TABL	NORM	PAST	401	1303
PRITOR02	PRITOR PLUS TABLETAS 80MG/12.5MG X 14 TAB	80MG / 12.	TABLETAS  	TABL	NORM	PAST	401	1304
PROC  01	PROCEF SUSPENSIÓN 250MG/5ML X 100ML	250MG/5ML 	SUSPENSIÓN	SUSP	NORM	LIQU	470	1305
PROCEF01	PROCEF TABLETAS 500MG X 10 TAB	500MG     	TABLETAS  	TABL	NORM	TAGR	470	1306
PROCOR01	PROCORALAN TABLETAS 5MG  X 28 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	543	1307
PROCOR02	PROCORALAN TABLETAS  7.5MG X 28 TAB	7.5MG     	TABLETAS  	TABL	NORM	PAST	543	1308
PROCTO01	PROCTO GLYVENOL TUBO CON 30G	30 G      	CREMA     	CREM	NORM	POMA	422	1309
PROCTO02	PROCTO GLYVENOL SUPOSITORIOS 400MG/40MG X 5 SUPOSITORIOS	400MG/40MG	SUPOSITORI	SUPO	NORM	SUPO	422	1310
PROFEN01	PROFENID BI COMPRIMIDOS LC  150 MG X 10 COMP	150 MG    	COMPRIMIDO	COMP	NORM	PAST	246	1311
PRONAP01	PRONAPEN AMPOLLA 1.200.000UI  X 1 AMP	1.200.00UI	AMPOLLA   	AMPO	NORM	AMPO	322	1312
PRONEU01	PRONEURAX  LP COMPRIMIDOS 8 MG X 7 COMP	8 MG      	COMPRIMIDO	COMP	NORM	PAST	201	1313
PRONEU02	PRONEURAX CAPSULAS L.P 16 MG X 7 CAP	16 MG     	CPSULAS   	CAPS	NORM	PAST	201	1314
PROPAN01	PROPANOLOL TABLETAS 10 MG X 20 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	356	1315
PROPAN02	PROPANOLOL TABLETAS 40 MG X 20 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	356	1316
PROTEL01	PROTELOS SOBRES 2 G X 28 SOBRES	2 G       	SOBRES    	GRAN	NORM	TAGR	368	1317
PROTOP01	PROTOPIC UNGÜENTO  0.1% X 10G	0.1%      	UNGUENTO  	UNGU	NORM	POMA	398	1318
PROTOP02	PROTOPIC UNGÜENTO 0.03 % X 10 G	0.03%     	UNGUENTO  	UNGU	NORM	POMA	398	1319
PROTOS01	PROTOSULFIL CREMA  1%  X 30G	1%        	CREMA     	CREM	NORM	POMA	391	1320
PROVAX01	PROVAX CAPSULAS BLANDAS X 30 CAP	          	CAPSULAS  	CAPS	NORM	PAST	52	1321
PROVER01	PROVERA TABLETAS 5 MG X 20 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	275	1322
PROVER02	PROVERA TABLETAS 10 MG X 20 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	275	1323
PROVER03	PROVERA TABELTAS  2.5 MG  X 20 TAB	2.5 MG    	TABLETAS  	TABL	NORM	PAST	275	1324
PROXIM01	PROXIME COMPRIMIDOS  750 MG X 5 COMP	750 MG    	COMPRIMIDO	AMPO	NORM	PAST	259	1325
PROXIM02	PROXIME COMPRIMIDOS  500 MG X 7 COMP	500 MG    	COMPRIMIDO	COMP	NORM	PAST	259	1326
PROXIM03	PROXIME COMPRIMIDOS  250 MG  X 5 COMP	250 MG    	COMPRIMIDO	COMP	NORM	PAST	259	1327
PULMIC01	PULMICORT INHALADOR ORAL   200 MCG X 200 DOSIS	200MCG    	INHALADOR 	AERO	NORM	GOTA	74	1328
PULMIC02	PULMICORT SUSPENSION PARA NEBULIZAR  0.25MG/1ML X 20 VIALES	0.25MG/ML 	SUSP. P/NE	AERO	NORM	LIQU	74	1329
PULMIC03	PULMICOR INHALADOR 50 MG X 200 DOSIS	50 MG     	INHALADOR 	AERO	NORM	LIQU	74	1330
PULMOL01	PULMOLET SUSPENSION P/NEB 1MG/ML FRASCO X 15 ML	1MG/ML    	SUSP. P/NE	SUSP	NORM	LIQU	74	1331
QUADRI01	QUADRIDERM CREMA X 25 G	          	CREMA     	CREM	NORM	POMA	61	1332
QUANTR01	QUANTREL SUSPENSION X 15 ML	          	SUSPENSION	SUSP	NORM	LIQU	318	1333
QUETID01	QUETIDIN COMPRIMIDOS 25 MG X 30 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	359	1334
QUETID02	QUETIDIN COMPRIMIDOS 300 MG X 30 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1335
QUETID03	QUETIDIN COMPRIMIDOS 300 MG X 30 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1336
QUETID04	QUETIDIN COMPRIMIDOS 300 MG X 30 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1337
QUINAP01	QUINAPRIL CLORHIDRATO TABLETAS 10 MG X 14 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	361	1338
QUINAP02	QUINAPRIL CLORHIDRATO TABLETAS 20 MG X 14 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	361	1339
QUINOC01	QUINOCORT SUSPENSION OFTALMICA X 5 ML	          	SUSP. OFT.	GOTA	NORM	GOTA	106	1340
QUINOF01	QUINOFTAL SOLUCION OFTALMICA 0.3 %  X 5 ML	0.3%      	SOL. OFT. 	GOTA	NORM	GOTA	105	1341
QUINOF02	QUINOFTAL UNGÜENTO OFT. 0.3% X 7.5 G	0.3%      	UNGUENTO O	UNGU	NORM	POMA	105	1342
RACOR 01	RACOR COMPRIMIDOS  20 MG  X 14 COMP.	20 MG     	COMPRIMIDO	COMP	NORM	PAST	377	1343
RACOR 02	RACOR COMPRIMIDOS 10 MG  X 14 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	377	1344
RAMIPR01	RAMIPRIL TABLETAS 2.5 MG X 20 TAB	2.5 MG    	TABLETAS  	TABL	NORM	PAST	365	1345
RAMIPR02	RAMIPRIL TABLETAS 5 MG X 20 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	365	1346
RAMIPR03	RAMIPRIL TABLETAS 10 MG X 15 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	365	1347
RAMIPR04	RAMIPRIL TABLETAS 5 MG X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	365	1348
RAMIPR05	RAMIPRIL  TABLETAS 5 MG X 12 TAB	5MG       	TABLETAS  	TABL	NORM	PAST	365	1349
RANITI01	RANITIDINA TABLETAS 150 MG X 20 TAB	150 MG    	TABLETAS  	TABL	NORM	PAST	369	1350
RANITI02	RANITIDINA TABLETAS 300 MG X 10 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	369	1351
RANITI03	RANITIDINA AMPOLLA 50 MG /2 ML	50 MG/2 ML	AMPOLLA   	AMPO	NORM	AMPO	369	1352
RANITI04	RANITIDINA SUSPENSION	          	SUSPENSIÓN	SUSP	NORM	LIQU	369	1353
RANITI05	RANITIDINA AMPOLLAS 25 MG/ 2ML	25 MG     	AMPOLLAS  	AMPO	NORM	AMPO	369	1354
RASI  01	RASILEZ HCT  TABLETAS 150MG/12.5MG X 14 TAB	150MG/12.5	TAB       	TABL	NORM	TAGR	25	1355
RASI  02	RASILEZ HCT TAB 300MG/12.5MG X 28 TAB	300MG/12.5	TAB       	TABL	NORM	TAGR	25	1356
RASILE01	RASILEZ COMPRIMIDOS 150 MG X 14 COMP	150 MG    	COMPRIMIDO	COMP	NORM	PAST	25	1357
RASILE02	RASILEZ COMPRIMIDOS 300 MG X 14 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	25	1358
REFLUX01	REFLUXIL SUSPENSION X 360 ML	360 ML    	SUSPENSIÓN	SUSP	NORM	LIQU	24	1359
REMERO01	REMERON SOLTAB TABLETAS 15 MG X 30 TAB	15 MG     	TABLETAS  	TABL	NORM	PAST	287	1360
REMERO02	REMERON SOL TAB TABLETAS 30 MG X 30 TAB	30 MG     	TABLETAS  	TABL	NORM	PAST	287	1361
REMINA01	REMINALET COMPRIMIDOS 10/25 MG X 14  COMP	10/25 MG  	COMPRIMIDO	COMP	NORM	PAST	159	1362
REMINA02	REMINALET COMPRIMIDOS 20/12.5 MG X 14 COMP	20/12.5 MG	COMPRIMIDO	COMP	NORM	PAST	159	1363
RESCUL01	RESCULA SOLUCION OFTÁLMICA 1.2 MG/ML X 5 ML	1.2 MG/ML 	SOL OFTÁLM	SOLI	NORM	GOTA	427	1364
RESPID01	RESPIDUAL  0.25MG/0.5MG/ML SOL P/NEBULIZAR X 20ML	0.25MG/0.5	SOL P/NEB 	SOLI	NORM	LIQU	520	1365
RESTAS01	RESTASIS EMULSIÓN OFTALMICAS VIALES UNIDOSIS  0.05MG/4ML X 32	0.05MG    	EMULSIÓN  	EMUL	NORM	AMPO	472	1366
RETACN01	RETACNYL CREMA 0.025% X 30 G	0.025%    	CREMA     	CREM	NORM	POMA	371	1367
RETACN02	RETACNYL  CREMA  0.05 %  X 30 GR	0.050%    	CREMA     	CREM	NORM	POMA	371	1368
RETEV101	RETEVEN L.P COMPRIMIDOS 10 MG X 10 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	313	1369
RETEVE01	RETEVEN COMPRIMIDOS 5 MG X 30 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	313	1370
RHINOC01	RHINOCORT AQUA ATOMIZADOR NASAL DE  32 UG X 120 DOSIS DE 10 ML	32UG/10ML 	ATOMIZADOR	SOLI	NORM	LIQU	74	1371
RHINOC02	RHINOCORT AQUA ATOMIZADOR 64 UG X 120 DOSIS  DE 10 ML	64UG/10ML 	ATOMIZADOR	GOTA	NORM	GOTA	313	1372
RIFADI01	RIFADIN  CAPSULAS 150 MG X 8 CAPS	150 MG    	CAPSULAS  	CAPS	NORM	PAST	372	1373
RIFADI02	RIFADIN CAPSULAS 300 MG X 4 CAPS	300 MG    	CAPSULAS  	CAPS	NORM	PAST	372	1374
RIFOCI01	RIFOCINA ATOMIZADOR 10MG/ML X 50ML	10MG/ML   	FRASCO ATO	AERO	NORM	LIQU	372	1375
RIFOCI02	RIFOCINA  SOL. TOP.  10MG/MG X 50ML	10MG/MG   	SOL. TOP. 	SOLI	NORM	LIQU	372	1376
RINOMA01	RINOMAX SOLUCION  NASAL  X 15 ML	15 ML     	SOL NASAL 	GOTA	NORM	GOTA	244	1377
RISEND01	RISENDRONATO TABLETAS  35 MG X 4 TAB .	35 MG     	TABLETAS  	TABL	NORM	PAST	549	1378
RISPE 01	RISPERID COMP. RECUBIERTO 2 MG X 30 COMP	2 MG      	COMPRIMIDO	COMP	NORM	PAST	375	1379
RISPE 02	RISPERID COMP. RECUBIERTOS 3 MG X 30 COMP	3 MG      	COMPRIMIDO	COMP	NORM	PAST	375	1380
RISPE 03	RISPERID TABLETAS 1MG X 30 TAB.	1MG       	TABLETAS  	TABL	NORM	PAST	375	1381
RISPE101	RISPERDAL QUICKLET TABLETAS ORODISPERSABLES  0.5 MG X 20 TAB	0.5 MG    	TABLETAS  	TABL	NORM	PAST	375	1382
RISPE102	RISPERDAL QUICKLET TABLETAS 1 MG X 20 TAB	1 MG      	TABLETAS  	TABL	NORM	PAST	375	1383
RISPE103	RISPERDAL QUICKLET TABLETAS 2 MG X 20 TAB	2 MG      	TABLETAS  	TABL	NORM	PAST	375	1384
RISPEC01	RISPERDAL JERINGA PRELLENADA 25 MG X 1 AMPOLLA	25 MG     	AMPOLLA   	AMPO	NORM	AMPO	375	1385
RISPEC02	RISPERDAL CONSTA JERINGA PRELLENADA 37.5 MG X 1 AMPOLLA	37.5 MG   	AMPOLLA   	AMPO	NORM	AMPO	375	1386
RISPEN01	RISPEN TABLETAS RECUBIERTAS 1MG X 14 TABLETAS	1MG       	TABLETAS  	TABL	NORM	PAST	375	1387
RISPER01	RISPERDAL TABLETAS 1 MG X 30 TAB	1 MG      	TABLETAS  	TABL	NORM	PAST	375	1388
RISPER02	RISPERDAL TABLETAS 2 MG X 30 TAB	2 MG      	TABLETAS  	TABL	NORM	PAST	375	1389
RISPER03	RISPERDAL TABLETAS 3 MG X 10 TAB	3 MG      	TABLETAS  	TABL	NORM	PAST	375	1390
RISPER04	RISPERDAL TABLETAS  4 MG X 20 TAB	4 MG      	TABLETAS  	TABL	NORM	PAST	375	1391
RISPER05	RISPERDAL GOTAS 1 MG/ 1ML X 10 ML	1 MG/ 1ML 	GOTAS     	GOTA	NORM	GOTA	375	1392
RIVOTR01	RIVOTRIL TABLETAS 0.5MG	0.5MG     	TAB       	TABL	NORM	TAGR	116	1393
RIVOTR02	RIVOTRIL TABLETAS DE 2MG X 20TAB	2MG       	TAB       	TABL	NORM	TAGR	116	1394
ROBIT 01	ROBITUSSIDEM JARABE X 118 ML	118 ML    	JARABE    	JARA	NORM	LIQU	211	1395
ROBITU01	ROBITUSSIN JARABE X 120 ML	120 ML    	JARABE    	JARA	NORM	LIQU	514	1396
ROCALT01	ROCALTROL CAPSULAS 0.25 MCG X 30 CAPS	0.25 MCG  	CAPSULAS  	CAPS	NORM	PAST	80	1397
ROCALT02	ROCALTROL CAPSULAS 0.5 MCG X 30 CAPS	0.5 MCG   	CAPSULAS  	CAPS	NORM	PAST	80	1398
ROSULI01	ROSULIP COMPRIMIDOS 10 MG X 18 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	377	1399
ROSULI02	ROSULIP COMPRIMIDOS 20 MG X 18 COMPRIMIDOS	20 MG     	COMPRIMIDO	COMP	NORM	PAST	377	1400
ROSUV 01	ROSUVASTATINA  TABLETAS 20 MG X 14 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	377	1401
ROSUVA01	ROSUVASTATINA TABLETAS 10 MG X 14  TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	377	1402
ROSUVA02	ROSUVASTATINA TAB 20 MG X 7 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	377	1403
ROWATI01	ROWATINEX CAPSULAS BLANDAS FCO CON 50	50 CAPS   	CAPSULAS  	CAPS	NORM	PAST	330	1404
ROWATI02	ROWATINEX GOTAS X  5 ML	5 ML      	GOTAS     	GOTA	NORM	GOTA	330	1405
RYTMON01	RYTMONORM TABLETAS 150 MG X 30 TAB	150 MG    	TABLETAS  	TABL	NORM	PAST	355	1406
SALBT 01	SALBUTAN  SUSPENSION  PARA INHALACION ORAL 100  MCG X 200 DOSIS	100 MCG   	SUSP INH O	SUSP	NORM	LIQU	378	1407
SALBUT01	SALBUTAMOL JARABE  2MG/5ML X 120 ML	2MG/5ML   	JARABE    	JARA	NORM	LIQU	378	1408
SCHERI01	SCHERIPROCT POMADA X 15 G	15 G      	POMADA    	POMA	NORM	POMA	348	1409
SCHERI02	SCHERIPROCT SUPOSITORIOS 1MG/40MG  X10 SUP	1MG/40MG  	SUPOSITORI	SUPO	NORM	SUPO	348	1410
SECITR01	SECNIDAZOL - ITRACONAZOL CAPSULAS 166.66 MG/ 33.33 MG X 12 CAP	166.66MG/3	CAPSULAS  	CAPS	NORM	PAST	448	1411
SECNID01	SECNIDAZOL TABLETAS 500 MG X 4 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	380	1412
SECNID02	SECNIDAZOL TABLETAS 1 G X 2 MOROCHO	1 G       	TABLETAS  	TABL	NORM	PAST	380	1413
SECNID03	SECNIDAZOL SUSPENSION 750 MG USO PEDIATRICO	750 MG    	SUSPENSIÓN	SUSP	NORM	LIQU	380	1414
SECNID04	SECNIDAZOL TABLETAS 1 G X 2 TAB	1 G       	TABLETAS  	TABL	NORM	PAST	380	1415
SECNID05	SECNIDAZOL SUSPENSIÓN PEDIÁTRICA 500 MG/15 ML	500MG/15ML	SUSPENSIÓN	SUSP	NORM	LIQU	380	1416
SECNIV01	SECNIVAX  POLVO PARA SUSPENSION 750 MG X 18 ML USO PEDIATRICO	750 MG    	P.P.SUSP  	POLV	NORM	LIQU	380	1417
SECOTE01	SECOTEX OCAS COMPRIMIDOS 0.4 MG X 30 COMP	0.4 MG    	COMPRIMDOS	COMP	NORM	PAST	399	1418
SEGAMO01	SEGAMOL COMPRIMIDOS 5 MG X 20 COMP	5 MG      	COMPRIMIDO	COMP	NORM	PAST	505	1419
SENOK101	SENOKOT CON DOCUSATO TABLETAS  X 20 TAB	          	TABLETAS  	TABL	NORM	PAST	382	1420
SENOKO01	SENOKOT JARABE X 120 ML	JARABE    	JARABE    	JARA	NORM	LIQU	381	1421
SERC  01	SERC TABLETAS 16 MG X 20 TAB	16MG      	TAB       	TABL	NORM	TAGR	53	1422
SERC  02	SERC TABLETAS 24MG X 20 TAB	24MG      	TAB       	TABL	NORM	TAGR	53	1423
SERETI01	SERETIDE SUPENSION PARA INHALAR ORAL  25 MCG/125MCG X120 DOSIS	25/125 MCG	SUSP P/INH	SUSP	NORM	GOTA	442	1424
SERETI02	SERETIDE SUSPENSION  PARA INHALAR  25 MCG/250 MCG X 120 DOSIS	25/250 MCG	SUSP P/INH	SUSP	NORM	GOTA	442	1425
SERETI03	SERETIDE DISKUS 50 MCG/100 MCG X 60 DOSIS	50MCG/100 	POLVO P/IN	POLV	NORM	GOTA	442	1426
SERETI04	SERETIDE DISKUS 50 MCG /250 MCG X 60 DOSIS	50/250 MCG	POLVO P/IN	POLV	NORM	GOTA	442	1427
SERETI05	SERETIDE DISKUS 50 MCG/500 MCG X 60 DOSIS	50/500MCG 	POLVO P/IN	POLV	NORM	GOTA	442	1428
SERETI06	SERETIDE SUSPENSION PARA INHALAR 25 MCG/50 MCG X 120 DOSIS	25/50 MCG 	SUSP P/INH	SUSP	NORM	GOTA	442	1429
SERETI07	SERETIDE SUSP.  PARA INH. 25MCG/60MCG X 120 DOSIS	25MCG/60MC	SUSP. P/IN	SUSP	NORM	GOTA	442	1430
SEREVE01	SEREVENT SUPENSION PARA INHALACION 25 MCG X 60 DOSIS	25 MCG    	SUSPENSIÓN	SUSP	NORM	GOTA	441	1431
SEROQ101	SEROQUEL XR  COMPRIMIDOS 300 MG X 30 COMP	300 MG    	COMPRIMIDO	TABL	NORM	PAST	359	1432
SEROQ102	SEROQUEL COMPRIMIDOS XR 100 MG X 30 COMPRIMIDOS	100 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1433
SEROQ103	SEROQUEL COMPRIMIDOS XR 50 MG X 30 COMP	50 MG     	COMPRIMIDO	COMP	NORM	PAST	359	1434
SEROQ104	SEROQUEL COMPRIMIDOS XR 25 MG X 30 COMPRIMIDOS	25 MG     	COMPRIMIDO	COMP	NORM	PAST	359	1435
SEROQU01	SEROQUEL COMPRIMIDOS 300 MG X 30 COMP	300 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1436
SEROQU02	SEROQUEL COMPRIMIDOS 200 MG X 30 COMP	200 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1437
SEROQU03	SEROQUEL COMPRIMIDOS 100 MG X 30  COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	359	1438
SEROQU04	SEROQUEL COMPRIMIDOS 25 MG X 30 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	359	1439
SERTRA01	SERTRALINA COMPRIMIDOS 50 MG X 10 COMP	50 MG     	COMPRIMIDO	COMP	NORM	PAST	383	1440
SERTRA02	SERTRALINA COMPRIMIDOS 100 MG X 10 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	383	1441
SESARE01	SESAREN  XR  CAPSULAS 75 MG X 15 CAP	75 MG     	CAPSULA   	CAPS	NORM	PAST	433	1442
SESARE02	SESAREN XR CAPSULAS 150 MG  X 15 CAP	150 MG    	CAPSULAS  	CAPS	NORM	PAST	433	1443
SESARE03	SESAREN XR CAPSULAS 150MG X 15 CAPSULAS	150 MG    	CAPSULAS  	CAPS	NORM	PAST	433	1444
SILDEN01	SILDENAFIL TABLETAS 50 MG X 5	50 MG     	TABLETAS  	TABL	NORM	PAST	384	1445
SILDEN02	SILDENAFIL TABLETAS 100 MG X 1 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	384	1446
SILDEN03	SILDENAFIL TABLETAS 50 MG X  1 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	384	1447
SILDEN04	SILDENAFIL TABLETAS 50 MG X 2 TAB	50MG      	TAB       	TABL	NORM	PAST	384	1448
SILDEN05	SILDENAFIL TABLETAS 50 MG X 5 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	384	1449
SILDEN06	SILDENAFIL TABLETAS 100MG X 5 TAB	100MG     	TABLETAS  	TABL	NORM	PAST	384	1450
SILDEX01	SILDEX TABLETAS 50 MG X 2 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	384	1451
SILKIS01	SILKIS UNGUENTO X 30 G	30 G      	UNGUENTO  	UNGU	NORM	POMA	80	1452
SIMPLA01	SIMPLA COMPRIMIDO 150 MG X 1 COMP	150 MG    	COMPRIMIDO	COMP	NORM	PAST	223	1453
SIMVAS01	SIMVASTATINA TABLETAS 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	385	1454
SIMVAS02	SIMVASTATINA TABLETAS 20 MG X 10 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	385	1455
SIMVAS03	SIMVASTATINA TABLETAS 40 MG X 10 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	385	1456
SIMVAS04	SIMVASTATINA TABLETAS 80 MG X 10 TAB	80 MG     	TABLETAS  	TABL	NORM	PAST	385	1457
SIMVAS05	SIMVASTATINA TABLETAS 20 MG X 60 TAB	20 MG     	TABLETAS  	TABL	NORM	PAST	385	1458
SINEM101	SINEMET CR TABLETAS L.C. 50MG/200MG X 28 TAB	50MG/200MG	TABLETAS  	TABL	NORM	PAST	85	1459
SINEME01	SINEMET TABLETAS  25 MG/250 MG X 30 TAB	25MG/250MG	TABLETAS  	TABL	NORM	PAST	85	1460
SINGUL01	SINGULAIR SOBRES 4 MG X 30 SOBRES	4 MG      	SOBRES    	GRAN	NORM	TAGR	288	1461
SINGUL02	SINGULAIR  TABLETAS  MASTICABLES  4 MG  X 30 TAB	4 MG      	TABLETAS  	TABL	NORM	PAST	288	1462
SINGUL03	SINGULAIR TABLETAS  MASTICABLES  5 MG  X 30 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	288	1463
SINGUL04	SINGULAIR TABLETAS 10 MG  X 30 TABLETAS	10 MG     	TABLETAS  	TABL	NORM	PAST	288	1464
SINGUL05	SINGULAIR 4MG X 10 SOBRES	4MG X 10  	SOBRES    	SOBR	NORM	TAGR	288	1465
SINOGA01	SINOGAN COMPRIMIDOS 25 MG X 20 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	551	1466
SINOGA02	SINOGAN COMPRIMIDOS 100 MG X 20 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	551	1467
SIRDAL01	SIRDALUD COMPRIMIDOS  2 MG X 15 COMP	2 MG      	COMPRIMIDO	COMP	NORM	PAST	411	1468
SOLTIN01	SOLTIN SOLUCION OFTALMICA X 15 ML	15 ML     	SOL OFTALM	SOLI	NORM	GOTA	180	1469
SOLUVI01	SOLUVIT GOTAS X 15 ML	15 ML     	GOTAS     	GOTA	NORM	GOTA	342	1470
SOLUVI02	SOLUVIT JARABE X 120 ML	120 ML    	JARABE    	JARA	NORM	LIQU	342	1471
URINOZ01	URINOZINC CAPSULAS X 60 CAP	60	CAPSULAS  	CAPS	NORM	PAST	379	1472
SOM   01	SOMAZINA SOLUCION ORAL 1000 MG/10 ML	100 MG    	SOLUCION  	SOLI	NORM	LIQU	109	1473
SOMAZI01	SOMAZINA COMPRIMIDOS 500 MG X 15 COMP	500 MG    	COMPRIMIDO	COMP	NORM	PAST	109	1474
SOMERG01	SOMERGAN LOCION 120 ML	120 ML    	LOCION    	LOCI	NORM	LIQU	547	1475
SOMERG02	SOMERGAN CHAMPU 120 ML	120 ML    	CHAMPU    	CHAM	NORM	LIQU	547	1476
SOMESE01	SOMESE TABLETAS 0.125 MG X 10 TAB	0.125 MG X	TABLETAS  	TABL	NORM	PAST	420	1477
SOMESE02	SOMESE TABLETAS 0.25 X 10 TAB	0.25 MG   	TABLETAS  	TABL	NORM	PAST	420	1478
SPIRIV01	SPIRIVA CAPSULAS 18 MCG  X 30 CAP CON HANDIHALER	18 MCG    	          	CAPS	NORM	PAST	410	1479
SPIRIV02	SPIRIVA RESPIMAT 2.5 MCG/PULS INH X 30 DOSIS	2.5 MCG   	INHALADOR 	AERO	NORM	GOTA	416	1480
SPORAN01	SPORANOX TABLETAS 100 MG X 14 TAB	100 MG X 1	TABLETAS  	TABL	NORM	PAST	242	1481
SPORAS01	SPORASEC CAPSULAS 33.3MG/166MG X 12 TAB	33.3 MG/16	TABLETAS  	AMPO	NORM	PAST	243	1482
STABLO01	STABLON COMPRIMIDOS 12.5 MG X 10 TAB	12.5 MG X1	TABLETAS  	TABL	NORM	PAST	405	1483
STABLO02	STABLON TABLETAS 12.5MG X 15 COMPRIMIDOS	12.5MG    	COMPRIMIDO	COMP	NORM	PAST	405	1484
STALEV01	STALEVO COMPRIMIDOS 50/12.5/200MG X 30 TAB	50/12 MG  	TABLETAS  	TABL	NORM	PAST	257	1485
STALEV02	STALEVO COMPRIMIDOS  100/25/200 MG  X 30 COMP	100/25MG  	TABLETAS  	COMP	NORM	PAST	257	1486
STALEV03	STALEVO COMPRIMIDOS 150/37.5 MG  X 30 COMP	150/37.5 M	COMPRIMIDO	COMP	NORM	PAST	257	1487
STARFO01	STARFORM COMPRIMIDOS 120/500 MG X 12 TAB	120/500MG 	TABLETAS  	TABL	NORM	PAST	294	1488
STARLI01	STARLIX COMPRIMIDOS 120 MG	          	          	AMPO	NORM	PAST	293	1489
STILNO01	STILNOX  TABLETAS REC 10 MG X 10 TAB	10 MG     	TABLETAS  	TABL	SICO	PAST	539	1490
STRAT 01	STRATTERA COMPRIMIDOS 18MG X 7 TABLETAS	18MG      	COMPRIMIDO	COMP	NORM	PAST	43	1491
STRAT 02	STRATTERA TABLETAS 10MG X  14 TAB	10MG      	TAB       	TABL	NORM	TAGR	43	1492
STRATT01	STRATTERA CAPSULAS 25 MG X 14 CAP	25 MG     	CAPSULAS  	CAPS	NORM	PAST	43	1493
STRATT02	STRATTERA CAPSULAS 40 MG X 14 CAP	40 MG     	CAPSULAS  	CAPS	NORM	PAST	43	1494
STRATT03	STRATTERA CAPSULAS 60 MG  X 14 CAPSULAS	60 MG     	CAPSULAS  	CAPS	NORM	PAST	43	1495
STRATT04	STRATERA  COMPRIMIDOS 10MG	10MG      	COMPRIMIDO	COMP	NORM	PAST	43	1496
STROCI01	STROCIT TABLETAS 500 MG X 30 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	109	1497
STUGER01	STUGERON.CINARIZINA. TABLETAS 25MG X 50TAB	25MG      	TAB       	TABL	NORM	TAGR	103	1498
STUGER02	STUGERON CAPSULAS  75MG X 20 CAP	75MG      	CAP       	CAPS	NORM	TAGR	103	1499
SUCRAL01	SUCRALFATO SUSPENSION 1 G  X 120 ML	1 G       	SUSPENSION	SUSP	NORM	LIQU	388	1500
SULFAC01	SULFACET SOLUCION OFTALMICA X 15 ML	          	          	AMPO	NORM	GOTA	390	1501
SULFAD01	SULFADIAZINA DE PLATA CREMA X 30 G	          	          	AMPO	NORM	POMA	391	1502
SULTAM01	SULTAMICILINA  SUSPENSION  250MG/5ML  X 75ML	250MG     	SUSPENSION	SUSP	NORM	LIQU	527	1503
SULTAM02	SULTAMICILINA TABLETAS 375MG X 6 TAB	375MG     	TAB       	TABL	NORM	PAST	527	1504
SULTAM03	SULTAMICILINA TABLETAS 750MG X 8TAB	750MG     	TAB       	TABL	NORM	TAGR	527	1505
SULTAM04	SULTAMICILINA TABLETAS 750 MG  X  8 TAB	750 MG    	TABLETAS  	TABL	NORM	PAST	389	1506
SUVIT 01	SUVIT GOTAS 20 ML	20ML      	GOTAS     	GOTA	NORM	GOTA	439	1507
SYMB  01	SYMBICORT TURBUHALER POLVO PARA INHALAR 160/4.5MCG X 60 DOSIS	160/4.5MCG	POLVO     	POLV	NORM	TAGR	73	1508
SYMBI 01	SYMBICORT TURBUHALER POLVO PARA INHALAR 80/4.5MCG X 60 DOSIS	80/4.5MCG 	POLVO     	POLV	NORM	TAGR	73	1509
SYMBIC01	SYMBICORT TURBUHALER P/ INHALAR 320/9 MCG X 60 DOSIS	320/9MCG X	POLVO     	POLV	NORM	TAGR	73	1510
SYMBIC02	SYMBICORT TURBUHALER  POLVO P/INHALAR 80/4.5 MCG X 120 DOSIS	80/4.5 MCG	SUSPENSION	SUSP	NORM	TAGR	73	1511
SYMMET01	SYMMETREL CAPSULAS 100 MG X 60 CAP	100MGX60CA	CAPSULAS  	CAPS	NORM	PAST	27	1512
SYNAPR01	SYNAPROSYN TABLETAS 250 MG	          	          	AMPO	NORM	PAST	292	1513
SYNAPR02	SYNAPROSYN TABLETAS 500 MG	          	          	AMPO	NORM	PAST	292	1514
SYSTAN01	SYSTANE  ULTRA GOTAS OFTALMICAS 0.4%- 0.3%  X 10ML	0.4%-0.3% 	GOTAS     	GOTA	NORM	GOTA	337	1515
SYSTAN02	SYSTANE ULTRA GOTAS OFTALMICAS X 15ML	          	GOTAS     	GOTA	NORM	GOTA	337	1516
TACHIP01	TACHIPIRIN JARABE PEDIATRICO 120MG/5ML 120ML	120MG/5ML 	JARABE    	JARA	NORM	LIQU	7	1517
TAMSUL01	TAMSULON CAPSULAS L.P 0.4 MG X 30 CAP	0.4 MG    	CAPSULAS  	CAPS	NORM	PAST	399	1518
TANFED01	TANFEDIN  FCO AL 2% X 100ML	2% X 100 M	SUSPENSION	SUSP	NORM	LIQU	83	1519
TANFED02	TANFEDIN  TABLETAS 200MG	200MG     	TAB       	TABL	NORM	PAST	83	1520
TANTU 01	TANTUM SOBRES SOBRES X 10	          	GRANULADOS	GRAN	NORM	TAGR	50	1521
TANTUM01	TANTUM COMPRIMIDOS 50 MG X 20 COMP	50 MG     	COMPRIMIDO	AMPO	NORM	PAST	50	1522
TANTUM02	TANTUM TOPICO BUCAL 0.15% X 240 ML	0.15%     	240 ML    	SOLI	NORM	LIQU	50	1523
TANTUM03	TANTUM TOPICO BUCAL 0.15 % X 120 ML	0.15%     	120 ML    	SOLI	NORM	LIQU	50	1524
TAPAZO01	TAPAZOL TABLETAS 5 MG  X 60 TABL	5 MG      	TABLETAS  	TABL	NORM	PAST	569	1525
TARKA 01	TARKA CAPSULAS 180 MG X 28CAP	180MGX28CA	CAP       	CAPS	NORM	PAST	435	1526
TEGRET01	TEGRETOL COMPRIMIDOS  200 MG X 20 COMP	200 MG    	COMPRIMIDO	GRAG	NORM	PAST	83	1527
TEGRET02	TEGRETOL GRAGEAS L.C. 200 MG X 20	200 MG    	GRAGEAS L.	GRAG	NORM	PAST	83	1528
TEGRET03	TEGRETOL GRAGEAS L.C. 400 MG X 10	400 MG    	GRAGEAS L.	GRAG	NORM	PAST	83	1529
TEGRET04	TEGRETOL SUSPENSION  2% X 100 ML	2% X 100 M	SUSPENSION	SUSP	NORM	LIQU	83	1530
TEGRET05	TEGRETOL COMPRIMIDO  400 MG X 10 COMPRIMIDOS	400 MG    	COMPRIMIDO	COMP	NORM	PAST	83	1531
TENILA01	TENILAC TABLETAS MASTICABLES  20 TAB	          	TAB/MAST  	TABL	NORM	TAGR	178	1532
TENORE01	TENORETIC TAB 100 MG/25 MG X 14 TAB	100MG/25MG	TABLETAS  	TABL	NORM	PAST	42	1533
TENORE02	TENORETIC TAB 50 MG/12.5 MG X  14 TAB	50MG/12.5M	TABLETAS  	TABL	NORM	PAST	42	1534
TENSOM01	TENSOMAX LP CAPSULAS 30 MG 10 CAP	30MG      	CAP       	CAPS	NORM	PAST	297	1535
TENSOM02	TENSOMAX LP CAPSULAS 60MG X 10 CAP	60MG      	CAP       	CAPS	NORM	PAST	297	1536
TEO   01	TEOBID TABLETAS 200 MG  X 20 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	403	1537
TEO   02	TEOBID TABLETAS 100 MG X 30 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	403	1538
TEO   03	TEOBID TABLETAS L.P 200 X 20 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	403	1539
TEOBID01	TEOBID TABLETAS L.P. 300 MG X 20 TAB	300 MG    	TABLETAS  	TABL	NORM	PAST	403	1540
TEOBID02	TEOBID TABLETAS L.P 200 MG X 50 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	403	1541
TERBIN01	TERBINAFINA CLORHIIDRATO COMPRIMIDOS 250 MG X28 COMP	250 MG    	COMPRIMIDO	COMP	NORM	PAST	546	1542
TETAVA01	TETAVAX TOXOIDE 1AMP X 0.5ML	0.5ML     	AMP       	AMPO	NORM	AMPO	575	1543
TEVETE01	TEVETEN TABLETAS 600MG X14	600MG     	TAB       	TABL	NORM	TAGR	493	1544
THIOCT01	THIOCTACID COMPRIMIDOS 600 MG	          	          	AMPO	NORM	PAST	18	1545
THYRAX01	THYRAX TABLETAS 0.1 MG X 50	          	          	AMPO	NORM	PAST	261	1546
THYRAX02	THYRAX TABLETAS 0.025MG X 100TAB	0.025MG   	TAB       	TABL	NORM	PAST	552	1547
TICLID01	TICLID GRAGEAS 250 MG X 10 GRAG.	250 MG    	GRAGEAS   	GRAG	NORM	PAST	545	1548
TILIUM01	TILIUM TABLETAS 10 MG X 30 TAB	10MG      	TABLETAS  	TABL	NORM	PAST	151	1549
TILIUM02	TILIUM SUSPENSION 0.1 MG/ML X 100 ML SUSP	0.1MG/ML  	SUSPENSION	AMPO	NORM	LIQU	151	1550
TILIUM03	TILIUM TABLETAS 10MG X  60 TABLETAS	10MG      	TABLETAS  	TABL	NORM	PAST	151	1551
TILZAE01	TILAZEM  TABLETAS 60MG X 20TAB	60MG      	TAB       	TABL	NORM	TAGR	147	1552
TIOCO101	TIOCOLFEN TABLETAS 600 MG/4 MG X 15 TAB	600MG     	TABLETAS  	TABL	NORM	PAST	9	1553
TIOCOL01	TIOCOLCHICOSIDO AMPOLLAS 4MG/2MLX 1AMP	4MG/2ML   	AMPOLLAS  	AMPO	NORM	AMPO	408	1554
TIOCOL02	TIOCOLCHICOSIDO TABLETAS 4 MG X  12 TAB	4MG       	TABLETAS  	TABL	NORM	PAST	408	1555
TIOVA 01	TIOVA CAPSULAS 9 MCG  INHALADOR X 60 DOSIS	9 MCG     	CAP INH   	CAPS	NORM	PAST	410	1556
TIOVA 02	TIOVA CAPSULAS 9MCG INHALADOR X 120 DOSIS	9 MCG     	CAP. INH  	CAPS	NORM	PAST	410	1557
TITRA 01	TITRALAC SUSPENSION  100 ML	100 ML    	SUSPENSION	SUSP	NORM	LIQU	78	1558
TITRA 02	TITRALAC SUSPENSION 200MG/ML X 100ML	200MG     	SUSPENSION	SUSP	NORM	LIQU	78	1559
TITRAL01	TITRALAC TABLETAS 420 MG X 40 TABLETAS	420 MG    	TABLETAS  	TABL	NORM	PAST	78	1560
TOBREX01	TOBREX UNGÜENTO OFTALMICO	3.5 G     	UNGUENTO  	UNGU	NORM	POMA	412	1561
TOBREX02	TOBREX SOLUCION OFTALMICA X 5 ML	5 ML      	SOLUCION O	GOTA	NORM	GOTA	412	1562
TODEX 01	TODEX SUSPENSION OFTALMICA X  5 ML	5ML       	SUSPENSION	GOTA	NORM	GOTA	413	1563
TODEX 02	TODEX UNGUENTO OFTALMICO X 7.5 G.	7.5 G     	UNGUENTO  	UNGU	NORM	POMA	413	1564
TOFRAN01	TOFRANIL GRAGEAS 10 MG  X 20 GRAGEAS	10 MG     	GRAGEAS   	GRAG	NORM	PAST	227	1565
TOFRAN02	TOFRANIL GRAGEAS 25 MG  X 20 GRAGEAS	25 MG     	GRAGEAS   	GRAG	NORM	PAST	227	1566
TOPAMA01	TOPAMAX TABLETAS RECUBIERTAS  25 MG  X 20 TAB	25 MG     	TABLETAS  	TABL	NORM	PAST	416	1567
TOPAMA02	TOPAMAX TABLETAS RECUBIERTAS  100 MG X 20 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	416	1568
TOPAMA03	TOPAMAX TABLETAS 50  MG	50 MG     	TABLETAS  	TABL	NORM	PAST	416	1569
TOPICT01	TOPICTAL COMPRIMIDOS 50 MG X 28 COMP	50MG      	COMPRIMIDO	COMP	NORM	PAST	416	1570
TOPICT02	TOPITEC TABLETAS  50 MG  X 30 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	416	1571
TOPICT03	TOPICTAL COMPRIMIDOS 25 MG X 28 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	416	1572
TOPICT04	TOPICTAL COMPRIMIDOS  100 MG X 28 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	416	1573
TOPITE01	TOPITEC COMPRIMIDOS  RECUBIERTOS 25 MG X30 COMP	25 MG     	COMPRIMIDO	COMP	NORM	PAST	416	1574
TOPITE02	TOPITEC COMPRIMIDOS REC. 100 MG X 30 COMP	100 MG    	COMPRIMIDO	COMP	NORM	PAST	416	1575
TOPR  01	TOPRIL CAPSULAS 5MG X 30 CAP	5MG       	CAPSULAS  	CAPS	NORM	PAST	365	1576
TOXOID01	TOXOIDE TETANICO AMPOLLAS  0.5 ML X 1	0.5 ML    	AMPOLLAS  	AMPO	NORM	AMPO	575	1577
TRAFLA01	TRAFLAN SOLUCION INYECTABLE 1G X  2ML	1G        	AMPOLLA   	AMPO	NORM	AMPO	535	1578
TRALEN01	TRALEN SOLUCION 28 % X 10 ML	28%       	SOLUCION  	SOLI	NORM	LIQU	409	1579
TRAVAT01	TRAVATAN SOLUCION OFTALMICA X 2.5 ML	2.5ML     	SOLUCION  	GOTA	NORM	GOTA	417	1580
TRENTA01	TRENTAL TABLETAS LP 400 MG X 20 TAB	400 MG    	TABLETAS  	TABL	NORM	PAST	324	1581
TRENTA02	TRENTAL TABLETAS L.P. 600 MG X 20 TAB	600MG     	TABLETAS  	TABL	NORM	PAST	324	1582
TRI-LU01	TRI-LUMA  TUBO CREMA X 15 G	15 G      	GREMA     	CREM	NORM	POMA	517	1583
TRILEP01	TRILEPTAL SUSPENSION  6 % 100 ML	6%        	SUSPENSION	SUSP	NORM	LIQU	312	1584
TRILEP02	TRILEPTAL COMPRIMIDOS 300 MG x 20	          	          	AMPO	NORM	PAST	312	1585
TRILEP03	TRILEPTAL COMPRIMIDOS 600 MG  X10 COMP	600 MG    	COMPRIMIDO	COMP	NORM	PAST	312	1586
TRIMEB01	TRIMEBUTINA TABLETAS 200 MGX 20 TAB	200 MG    	TABLETAS  	TABL	NORM	PAST	424	1587
TRIMEB02	TRIMEBUTINA TABLETAS 200MG X 30TABLETAS	200MG     	TABLETAS  	TABL	NORM	PAST	424	1588
TRITTI01	TRITTICO TABLETAS 50 MG X 30 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	418	1589
TRITTI02	TRITTICO TABLETAS 100 MG X  30 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	418	1590
TRIVAS01	TRIVASTAL GRAGEAS 50 MG X15 GRAGEAS	50 MG     	GRAGEAS   	GRAG	NORM	PAST	333	1591
TROPOC01	TROPOCER COMPRIMIDOS  A.P.  90 MG X 20 COMP	90 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1592
TROPOC02	TROPOCER  A P  COMPRIMIDOS  90 MG X 6 COMP	90 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1593
TROPOC03	TROPOCER  AP COMPRIMIDOS 90MG X 12 COMP	90 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1594
TROPOC04	TROPOCER AP COMPRIMIDOS  DE 60 MG  X 6 COMP	60 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1595
TROPOC05	TROPOCER AP COMPRIMIDOS  60 MG X 12 COMP	60 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1596
TROPOC06	TROPOCER AP  COMPRIMIDOS  60 MG  X 20 COMP	60 MG     	COMPRIMIDO	COMP	NORM	PAST	299	1597
TROPOC07	TROPOCER TABLETAS A.P 120 MG X 20 TAB	120 MG    	TABLETAS  	TABL	NORM	PAST	299	1598
TROPOC08	TROPOCER TABLETAS AP 120 MG X 12 TAB	120 MG    	TABLETAS  	TABL	NORM	PAST	299	1599
TROVIA01	TROVIA COMPRIMIDOS 30 MG X 7 COMP	30MG      	COMPRIMIDO	COMP	NORM	PAST	287	1600
TRYPTA01	TRYPTANOL TABLETAS 25MG X 30 TAB	25MG      	TAB       	TABL	NORM	PAST	526	1601
TUMETI01	TUMETIL CAPSULAS 200 MG  X 20 CAP	200 MG    	CAPSULAS  	CAPS	NORM	PAST	285	1602
TUMS  01	TUMS FRASCO TAB X 75 TAB	          	TABLETAS  	TABL	NORM	PAST	87	1603
ULCON 01	ULCON TABLETAS 1 G X 40 TAB	1G        	TABLETAS  	TABL	NORM	PAST	388	1604
ULCON 02	ULCON SUSPENSION 1 G/ 5 ML X 120 ML	1 G/ 5 ML 	SUSPENSION	SUSP	NORM	LIQU	388	1605
ULPRAT01	ULPRATOP  TABLETAS 40MG X 7 TABLETAS	40 MG     	TABLETAS  	TABL	NORM	PAST	319	1606
ULTRA 01	ULTRATOP TABLETAS 40MG X 7 TAB	40 MG     	TABLETAS  	TABL	NORM	PAST	319	1607
UNACIL01	UNACILYN FRASCO AMPOLLAS 1.5 G X 1	1.5 G     	FCO AMPOLL	AMPO	NORM	AMPO	38	1608
UNACIL02	UNACILYN  AMPOLLA  1.5G X 1 AMP	1.5G      	AMP       	AMPO	NORM	AMPO	37	1609
UNASYN01	UNASYN TABLETAS 375 MG X 8 TAB	375 MG    	TABLETAS  	TABL	NORM	PAST	38	1610
UNASYN02	UNASYN TABLETAS 750 MG X 8 TAB	750 MG    	TABLETAS  	TABL	NORM	PAST	38	1611
UNASYN03	UNASYN AMPOLLAS 1.5 G X 1 AMP	1.5 G     	AMPOLLAS  	AMPO	NORM	AMPO	38	1612
UNASYN04	UNASYN AMPOLLAS 3 G	          	          	AMPO	NORM	AMPO	38	1613
UROCIT01	UROCIT TABLETAS 1080 MG ( 10MEQ) X FRASCO O DE 100 TAB	1080 MG   	TABLETAS  	TABL	NORM	PAST	110	1614
UROMUN01	UROMUNAL CAPSULAS  6 MG X 15 TAB	6MG       	TABLETAS  	TABL	NORM	PAST	175	1615
VAL   01	VALPAX COMPRIMIDOS  2MG X 30 COMP	2MG       	COMPRIMIDO	COMP	NORM	PAST	116	1616
VALCO101	VALCOTE  ER  TABLETAS LP 500 MG X 30TAB	500MG     	TABLETAS  	TABL	NORM	PAST	149	1617
VALCO102	VALCOTE LP TABLETAS 250MG X 30 TAB	250MG     	TABLETAS  	TABL	NORM	PAST	149	1618
VALCOT01	VALCOTE TABLETAS 250 MG X 30 TAB	250 MG    	TABLETAS  	TABL	NORM	PAST	149	1619
VALCOT02	VALCOTE TABLETAS 500 MG X 30 TABLETAS	500MG     	TABLETAS  	AMPO	NORM	PAST	149	1620
VALIUM01	VALIUM  COMPRIMIDOS 5MG X 20 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	479	1621
VALP  01	VALPAX  COMPRIMIDOS 1MG X 30 COMP	1MG       	COMPRIMIDO	COMP	NORM	PAST	116	1622
VALPAX01	VALPAX COMPRIMIDOS  0.5 MG X TAB	0.5 MG    	TABLETAS  	TABL	NORM	PAST	116	1623
VALPRO01	VALPRON TABLETAS 260MG X 50 TABLETAS	260MG     	TABLETAS  	TABL	NORM	PAST	519	1624
VALPRO02	VALPRON  JARABE 290MG/5ML X 180ML	290MG/5ML 	JARABE    	JARA	NORM	LIQU	519	1625
VALPRO03	VALPRON TABLETAS 500MG X 60TAB	500MG     	TABLETAS  	TABL	NORM	TAGR	519	1626
VALPRO04	VALPRON  JARABE  250MG/5ML X 120ML JARAB	250MG     	JARABE    	JARA	NORM	LIQU	519	1627
VALSAR01	VALSARTAN CAP 80MG X 14	80MG      	CAPSULAS  	CAPS	NORM	PAST	429	1628
VALSAR02	VALSARTAN CAPSULAS 160 MG X 7 CAP	160 MG    	CAPSULAS  	CAPS	NORM	PAST	429	1629
VALSAR03	VALSARTAN  HCT  CAPSULAS 160 / 12.5 MG  X 14 CAP	160/12.5 M	CAPSULAS  	CAPS	NORM	PAST	431	1630
VALSAR04	VALSARTAN - HIDROCLOROTIAZIDA TABLETAS 80 MG/12.5 MG X 14 TAB	80/12.5MG 	TABLETAS  	TABL	NORM	PAST	431	1631
VALTRE01	VALTREX TABLETAS 500 MG X 10 TAB	500 MG    	TABLETAS  	TABL	NORM	PAST	428	1632
VARTAL01	VARTALON SOBRES 1.5G X 15 SOBRES	1.5G      	SOBRES    	GRAN	NORM	TAGR	209	1633
VASTAR01	VASTAREL . TRIMETAZIDINA DICLORHIDRATO. MR COMPRIMIDOS 35 MG X 30 CO	35 MG     	COMPRIMIDO	COMP	NORM	PAST	425	1634
VENTID01	VENTIDE INHALADOR  100 MG /50 MG X 200 DOSIS	100/50MG  	INHALADOR 	SOLU	NORM	LIQU	548	1635
VERA  01	VERACEF CAPSULAS DE 500MG X 18 CAP	500MG     	CAPSULAS  	CAPS	NORM	PAST	468	1636
VERAC 01	VERACEF  CAPSULAS 500MG X18 CAP	500MG     	CAP       	CAPS	NORM	TAGR	468	1637
VERACE01	VERACEF POLVO PARA SUSPENSION 250MG/5ML X 100ML	250MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	468	1638
VERACO01	VERACOR GRAGEAS 80 MG X 20 GRAGEAS	80 MG     	GRAGEAS   	GRAG	NORM	PAST	434	1639
VERAPA01	VERAPAMIL TABLETAS 80 MG X 30 TAB	80 MG     	TABLETAS  	TABL	NORM	PAST	434	1640
VERAPA02	VERAPAMIL TABLETAS 40 MG X 30 TAB.	40 MG     	TABLETAS  	TABL	NORM	PAST	434	1641
VESSEL01	VESSEL DUE CAPSULAS 250 MG  X 50 CAP	250MG     	CAPSULAS  	CAPS	NORM	PAST	395	1642
VESSEL02	VESSEL DUE AMPOLLAS  600 LSU/2ML X 5 AMPOLLAS	600LSU/2ML	AMPOLLAS  	AMPO	NORM	AMPO	395	1643
VESSEL03	VESSEL DUE ESTUCHE 250MG X 25 CAP	250 MGX25C	CAPSULAS  	CAPS	NORM	PAST	0	1644
VI TRE01	VI-TRESINCO AMPOLLA/3ML X 1  AMP	3ML       	AMPOLLA   	AMPO	NORM	AMPO	439	1645
VIASEK01	VIASEK TABLETAS 50 MG X 1 TAB	50 MG     	TABLETAS  	TABL	NORM	PAST	384	1646
VIAVOX01	VIAVOX GEL 1 %	1 %       	GEL       	GEL 	NORM	POMA	142	1647
VIGAMO01	VIGAMOX SOLUCION OFTALMICA  X 5 ML	5ML       	SOLUCION O	GOTA	NORM	GOTA	289	1648
VISCOT01	VISCOTEARS GEL 0.2 % X 10 G	0.2%      	GEL       	GEL 	NORM	POMA	336	1649
VISKAL01	VISKALDIX COMPRIMIDOS 5MG/10MG X 20 TAB	5/10 MG   	TABLETAS  	TABL	NORM	PAST	118	1650
VITAM101	VITAMINA E CAPSULAS  400 UI X  30 CAP	400 UI X 3	CAPSULAS  	CAPS	NORM	PAST	414	1651
VITAMI01	VITAMINA B COMPLEJO AMPOLLAS X 3 ML	3ML       	AMPOLLAS  	AMPO	NORM	AMPO	439	1652
VITONA01	VITONAL TABLETAS  X 30 TAB	B1/2/6/12 	TABLETAS  	TABL	NORM	PAST	126	1653
VIZERU01	VIZERUL  COMPRIMIDOS REC. 150 MG X 10 COMP	150 MG    	COMPRIMIDO	COMP	NORM	PAST	369	1654
VOLTA 01	VOLTAREN IP  TABLETAS LC 75MG X 20 TAB	75MG      	TABLETAS  	TABL	NORM	PAST	142	1655
VOLTAR01	VOLTAREN GRAGEAS 50MG X 20TAB	50MG      	GRAGEAS   	GRAG	NORM	PAST	142	1656
VOLTAR02	VOLTAREN AMPOLLAS 75MG/3ML X  5 AMP	75MG      	AMP       	AMPO	NORM	AMPO	142	1657
VOLTAR03	VOLTAREN GEL 1.16% X 15G	1.16%     	GEL       	GEL 	NORM	POMA	142	1658
VOLTEN01	VOLTEN SUSPENSION GOTAS OFTALMICA 0.1 % X 5ML	0.1%      	GOTAS     	GOTA	NORM	GOTA	142	1659
VUSCOB01	VUSCOBRAS GRAGEAS 30 MG-10 MG X 8 GRAGEAS	30MG-10MG 	GRAGEAS   	GRAG	NORM	PAST	466	1660
VYTORI01	VYTORIN COMPRIMIDOS 10/10 MG X 14 COMP	10/10MG   	COMPRIIMID	COMP	NORM	PAST	177	1661
VYTORI02	VYTORIN COMPRIMIDOS 10/80 MG X 14 COMPRIMIDOS	10/80 MG  	COMPRIMIDO	COMP	NORM	PAST	177	1662
VYTORI03	VYTORIN COMPRIMIDOS 10/20 MG X 14 COMP	10/20 MG  	COMPRIMIDO	COMP	NORM	PAST	177	1663
VYTORI04	VYTORIN COMPRIMIDOS 10/40 MG	          	          	AMPO	NORM	PAST	177	1664
WOBENZ01	WOBENZYM GRAGEAS  X 40 GRAGEAS	          	GRAGEAS   	GRAG	NORM	PAST	491	1665
XALACO01	XALACOM SOLUCION OFTALMICA X  2.5 ML X  5ML	2.5 ML    	SOLUCION  	SOLI	NORM	GOTA	253	1666
XALATA01	XALATAN SOLUCION OFTALMICA 2.5ML X 5ML	2.5ML     	GOTAS     	GOTA	NORM	GOTA	252	1667
XATRAL01	XATRAL TABLETAS L.P. 10 MG X  30 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	23	1668
XYLON 01	XYLON TABLETAS 2.5/6.25MG	25.5/6.25.	TAB       	TABL	NORM	TAGR	65	1669
XYLON 02	XYLON TABLETAS 5/6.25MG	5/6.25MG  	TASB      	TABL	NORM	TAGR	65	1670
XYLON 03	XYLON TABLETAS 10/6.25MG	10/6.25MG 	TAB       	TABL	NORM	TAGR	65	1671
YONAL 01	YONAL JARABE 15MG/5ML X 120 ML	15MG/5ML  	JARABE    	JARA	NORM	LIQU	211	1672
ZALDIA01	ZALDIAR TABLETA  325/37.5 MG X 10 TAB	325/37.5 M	TABLETAS  	TABL	NORM	PAST	8	1673
ZANIDI01	ZANIDIP COMPRIMIDOS 10 MG X 14 COMP	10MG      	COMPRIMIDO	COMP	NORM	PAST	255	1674
ZANIDI02	ZANIDIP COMPRIMIDOS  20 MG X14 COMP	20 MG     	COMPRIMIDO	COMP	NORM	PAST	255	1675
ZANTAC01	ZANTAC JARABE 150MG/10ML FCO X 150ML	150MG/10ML	JARABE    	JARA	NORM	LIQU	369	1676
ZETIA 01	ZETIA  TABLETAS 10MG X 14 TAB	10MG      	TABLETAS  	TABL	NORM	PAST	177	1677
ZIAC  01	ZIAC TABLETAS 2.5/6.25 MG X 30 TAB	2.5/6.25 M	TABLETAS  	TABL	NORM	PAST	65	1678
ZIAC  02	ZIAC TABLETAS 5/6.25 MG X 30 TAB	5/6.25 MG 	TABLETAS  	TABL	NORM	PAST	65	1679
ZIAC  03	ZIAC TABLETAS 10/6.25 MG X 30 TAB	10/6.25 MG	TABLETAS  	TABL	NORM	PAST	65	1680
ZINNAT01	ZINNAT TABLETAS 500 MG X 6 TAB.	500 MG    	TABLETAS  	TABL	NORM	PAST	96	1681
ZINNAT02	ZINNAT GRANULADO P/SUSP 125 MG/5 ML	          	          	AMPO	NORM	TAGR	96	1682
ZINNAT03	ZINNAT GRANULADO P/SUSP  250 MG/5 ML X 70 ML	250MG/5ML 	P/SUSPENSI	SUSP	NORM	TAGR	96	1683
ZITROM01	ZITROMAX TABLETAS DE 500MG X 3TAB	500MG     	TABLETAS  	TABL	NORM	PAST	47	1684
ZITROM02	ZITROMAX POLVO PARA SUSPENSION 900MG/5ML  X 22.5 ML	900MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	449	1685
ZITROM03	ZITROMAX POLVO P/SUSP.200MG/5ML X 22.5 ML	200MG/5ML 	P/P SUSPEN	SUSP	NORM	LIQU	449	1686
ZOLOFT01	ZOLOFT  TABLETAS 50 MG X 14 TAB	50 MG     	TABLETAS  	TABL	NORM	PARC	383	1687
ZOLOFT02	ZOLOFT TABLETAS 100 MG X 10 TAB	100 MG    	TABLETAS  	TABL	NORM	PAST	383	1688
ZOMIG 01	ZOMIG COMPRIMIDOS 2.5 MG X 3 COMPRIMIDOS	2.5 MG    	COMPRIMIDO	COMP	NORM	PAST	445	1689
ZONTRI01	ZONTRICON SUSPENSION 100 MG / 5 MG X30 ML	100/5 MG. 	SUSPENSION	SUSP	NORM	LIQU	301	1690
ZONTRI02	ZONTRICON SUSPENSION 100 MG / 5 ML X 60 ML	100MG/5ML 	SUSPENSION	SUSP	NORM	LIQU	301	1691
ZONTRI03	ZONTRICON COMPRIMIDOS 500 MG X 6 COMPRIMIDOS	500 MG    	COMPRIMID 	COMP	NORM	PAST	301	1692
ZONTRI04	ZONTRICON COMPRIMIDOS REC. 500 MG X 6 COMPRIMIDOS	500 MG    	COMPRIMIDO	COMP	NORM	PAST	301	1693
ZYLORI01	ZYLORIC COMPRIMIDOS 300 MG X 20 COMP	300MG     	COMPRIMIDO	COMP	NORM	PAST	26	1694
ZYPRE 01	ZYPREXA ZYDIS COMPRIMIDOS 10MG X 7 COMPRIMIDOS	10MG      	COMPRIMIDO	COMP	SICO	PAST	307	1695
ZYPRE101	ZYPREXA ZYDIS TABLETAS 5 MG X  7  TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	307	1696
ZYPRE102	ZYPREXA ZYDIS TABLETAS 10 MG X 7 TAB	10MG      	TABLETAS  	TABL	NORM	PAST	307	1697
ZYPRE103	ZYPREXA ZYDIS TABLETAS 5 MG X 14 TAB	5 MG      	TABLETAS  	TABL	NORM	PAST	307	1698
ZYPRE104	ZYPREXA ZYDIS TAB 10 MG X 14 TAB	10 MG     	TABLETAS  	TABL	NORM	PAST	307	1699
ZYPRE105	ZYPREXA ZYDIS COMPRIMIDOS 5MG X 7 COMPRIMIDOS	5MG       	COMPRIMIDO	COMP	SICO	PAST	307	1700
ZYPREX01	ZYPREXA COMPRIMIDOS 5 MG X  14 COMP	5MG       	COMPRIMIDO	COMP	NORM	PAST	307	1701
ZYPREX02	ZYPREXA COMPRIMIDOS 10 MG X 7 COMP	10MG      	COMPRIMIDO	COMP	NORM	PAST	307	1702
ZYPREX03	ZYPREXA AMPOLLAS X 10 MG X 1 AMPO	10 MG     	AMPOLLAS  	AMPO	NORM	AMPO	307	1703
ZYRT  01	ZYRTEC D TABLETAS 5/120MGX 10 TAB	5/120MG   	TABLETAS  	TABL	NORM	TAGR	471	1704
ZYRTEC01	ZYRTEC COMPRIMIDOS  10 MG X10 COMP	10 MG     	COMPRIMIDO	COMP	NORM	PAST	99	1705
ZYRTEC02	ZYRTEC SOLUCION ORAL 1MG/ML X 60ML	1MG/ML X60	SOLUCION  	SOLI	NORM	LIQU	99	1706
ZYRTEC03	ZYRTEC SOLUCION ORAL GOTAS 10MG/ML X 10 ML	10MG/ML   	SOLUCION  	SOLI	NORM	GOTA	99	1707
\.


--
-- TOC entry 3082 (class 0 OID 0)
-- Dependencies: 182
-- Name: sidrofan_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('sidrofan_oid_seq', 1707, true);


--
-- TOC entry 3053 (class 0 OID 41459)
-- Dependencies: 192
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY solicitud (oid, codigo, numero, certi, detalle, recipes, fecha, tipo, estatus, fcita) FROM stdin;
1	11953710	00000002	7426affe1f6e9f4cf62dca4b8efca7a7	{"desde":"2016-03-28","hasta":"2016-04-17"}	2016-03-28	2016-03-28 06:32:50.453706	4	1	2016-03-28
\.


--
-- TOC entry 3083 (class 0 OID 0)
-- Dependencies: 191
-- Name: solicitud_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('solicitud_oid_seq', 1, true);


--
-- TOC entry 3044 (class 0 OID 33308)
-- Dependencies: 183
-- Data for Name: tdocumento; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY tdocumento (oid, nombre) FROM stdin;
1	Informe Medico
2	Carta Aval
3	Agotamiento de Cobertura
4	Exposición de Motivo
5	Deuda Contraida
6	Presupuesto de Gastos
7	Fe de Vida
\.


--
-- TOC entry 3084 (class 0 OID 0)
-- Dependencies: 184
-- Name: tdocumento_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('tdocumento_oid_seq', 7, true);


--
-- TOC entry 3046 (class 0 OID 33313)
-- Dependencies: 185
-- Data for Name: traza; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY traza (oid, cedu, obse, app, fech, tipo) FROM stdin;
1	11953710	Inicio de Sesión	Panel	2016-03-14 17:46:52.519599	0
2	11953710	Inicio de Sesión	Panel	2016-03-18 20:50:25.41405	0
3	11953710	Inicio de Sesión	Panel	2016-03-19 07:10:47.406511	0
4	11953710	Inicio de Sesión	Panel	2016-03-26 14:10:01.624279	0
5	11953710	Inicio de Sesión	Panel	2016-03-26 21:16:06.117838	0
6	11953710	Inicio de Sesión	Panel	2016-03-27 07:14:57.885544	0
7	11953710	Inicio de Sesión	Panel	2016-03-27 17:55:11.251854	0
8	11953710	Inicio de Sesión	Panel	2016-03-27 17:55:19.090119	0
9	11953710	Inicio de Sesión	Panel	2016-03-27 17:55:56.873206	0
10	11953710	Inicio de Sesión	Panel	2016-03-27 18:19:38.834513	0
11	11953710	Inicio de Sesión	Panel	2016-03-27 18:20:26.660003	0
12	11953710	Inicio de Sesión	Panel	2016-03-28 06:31:40.886147	0
\.


--
-- TOC entry 3085 (class 0 OID 0)
-- Dependencies: 186
-- Name: traza_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('traza_oid_seq', 12, true);


--
-- TOC entry 3048 (class 0 OID 33321)
-- Dependencies: 187
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: gesaodin
--

COPY usuario (oid, tipo, cedu, nomb, seud, clav, corr, resp, empr, perf, pagi, esta) FROM stdin;
2	1	11953710	TCNEL. LUIS VARELA	gesaodin	fb7f016949f642234b312503c784f415	gesaodin@gmail.com	223132671ce5d229277e22b4ebe54b77				0
\.


--
-- TOC entry 3086 (class 0 OID 0)
-- Dependencies: 188
-- Name: usuario_oid_seq; Type: SEQUENCE SET; Schema: public; Owner: gesaodin
--

SELECT pg_catalog.setval('usuario_oid_seq', 2, true);


--
-- TOC entry 2921 (class 2606 OID 41456)
-- Name: concepto_archivo_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY concepto_archivo
    ADD CONSTRAINT concepto_archivo_pkey PRIMARY KEY (oid);


--
-- TOC entry 2923 (class 2606 OID 41467)
-- Name: numero_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY solicitud
    ADD CONSTRAINT numero_pkey PRIMARY KEY (numero);


--
-- TOC entry 2917 (class 2606 OID 33342)
-- Name: traza_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY traza
    ADD CONSTRAINT traza_pkey PRIMARY KEY (oid);


--
-- TOC entry 2919 (class 2606 OID 33344)
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: gesaodin; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (oid);


--
-- TOC entry 3063 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-03-28 06:41:52 VET

--
-- PostgreSQL database dump complete
--

