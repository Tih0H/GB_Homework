
SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
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
-- Name: country; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.country (
    id integer NOT NULL,
    iso_code character varying(250) NOT NULL,
    name character varying(250) NOT NULL
);


ALTER TABLE public.country OWNER TO devavi;

--
-- Name: country_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.country_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.country_id_seq OWNER TO devavi;

--
-- Name: country_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.country_id_seq OWNED BY public.country.id;


--
-- Name: country_movie; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.country_movie (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    country_id integer NOT NULL
);


ALTER TABLE public.country_movie OWNER TO devavi;

--
-- Name: country_movie_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.country_movie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.country_movie_id_seq OWNER TO devavi;

--
-- Name: country_movie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.country_movie_id_seq OWNED BY public.country_movie.id;


--
-- Name: department; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.department (
    id integer NOT NULL,
    name character varying(255)
);


ALTER TABLE public.department OWNER TO devavi;

--
-- Name: department_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.department_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.department_id_seq OWNER TO devavi;

--
-- Name: department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.department_id_seq OWNED BY public.department.id;


--
-- Name: favorites; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.favorites (
    id integer NOT NULL,
    user_id integer,
    movie_id integer
);


ALTER TABLE public.favorites OWNER TO devavi;

--
-- Name: favorites_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.favorites_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favorites_id_seq OWNER TO devavi;

--
-- Name: favorites_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.favorites_id_seq OWNED BY public.favorites.id;


--
-- Name: gender; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.gender (
    id integer NOT NULL,
    gender character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.gender OWNER TO devavi;

--
-- Name: gender_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.gender_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.gender_id_seq OWNER TO devavi;

--
-- Name: gender_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.gender_id_seq OWNED BY public.gender.id;


--
-- Name: genre; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.genre (
    id integer NOT NULL,
    name character varying(255) DEFAULT NULL::character varying,
    slug character varying(255) DEFAULT NULL::character varying,
    description text,
    icon character varying(255)
);


ALTER TABLE public.genre OWNER TO devavi;

--
-- Name: genre_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.genre_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.genre_id_seq OWNER TO devavi;

--
-- Name: genre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.genre_id_seq OWNED BY public.genre.id;


--
-- Name: genre_movie; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.genre_movie (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    genre_id integer NOT NULL
);


ALTER TABLE public.genre_movie OWNER TO devavi;

--
-- Name: genre_movie_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.genre_movie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.genre_movie_id_seq OWNER TO devavi;

--
-- Name: genre_movie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.genre_movie_id_seq OWNED BY public.genre_movie.id;


--
-- Name: movie; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.movie (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    overview text,
    homepage character varying(255) DEFAULT NULL::character varying,
    runtime integer,
    popularity_imdb integer,
    popularity_kinopoisk integer,
    poster character varying(255) DEFAULT NULL::character varying,
    release_date date
);


ALTER TABLE public.movie OWNER TO devavi;

--
-- Name: movie_cast; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.movie_cast (
    id integer NOT NULL,
    movie_id integer,
    person_id integer,
    gender_id integer,
    character_name character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.movie_cast OWNER TO devavi;

--
-- Name: movie_cast_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.movie_cast_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_cast_id_seq OWNER TO devavi;

--
-- Name: movie_cast_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.movie_cast_id_seq OWNED BY public.movie_cast.id;


--
-- Name: movie_crew; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.movie_crew (
    id integer NOT NULL,
    movie_id integer,
    person_id integer,
    department_id integer,
    job text
);


ALTER TABLE public.movie_crew OWNER TO devavi;

--
-- Name: movie_crew_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.movie_crew_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_crew_id_seq OWNER TO devavi;

--
-- Name: movie_crew_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.movie_crew_id_seq OWNED BY public.movie_crew.id;


--
-- Name: movie_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.movie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_id_seq OWNER TO devavi;

--
-- Name: movie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.movie_id_seq OWNED BY public.movie.id;


--
-- Name: movie_production_company; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.movie_production_company (
    id integer NOT NULL,
    movie_id integer NOT NULL,
    production_company_id integer NOT NULL
);


ALTER TABLE public.movie_production_company OWNER TO devavi;

--
-- Name: movie_production_company_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.movie_production_company_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_production_company_id_seq OWNER TO devavi;

--
-- Name: movie_production_company_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.movie_production_company_id_seq OWNED BY public.movie_production_company.id;


--
-- Name: person; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.person (
    id integer NOT NULL,
    name character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.person OWNER TO devavi;

--
-- Name: person_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.person_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.person_id_seq OWNER TO devavi;

--
-- Name: person_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.person_id_seq OWNED BY public.person.id;


--
-- Name: price_plan; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.price_plan (
    id integer NOT NULL,
    name text,
    price integer
);


ALTER TABLE public.price_plan OWNER TO devavi;

--
-- Name: price_plan_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.price_plan_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.price_plan_id_seq OWNER TO devavi;

--
-- Name: price_plan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.price_plan_id_seq OWNED BY public.price_plan.id;


--
-- Name: production_company; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.production_company (
    id integer NOT NULL,
    name text NOT NULL,
    country_id integer NOT NULL,
    headquaters character varying(255),
    established integer,
    notes text
);


ALTER TABLE public.production_company OWNER TO devavi;

--
-- Name: production_company_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.production_company_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.production_company_id_seq OWNER TO devavi;

--
-- Name: production_company_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.production_company_id_seq OWNED BY public.production_company.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: devavi
--

CREATE TABLE public.users (
    id integer NOT NULL,
    login character varying(255) DEFAULT NULL::character varying,
    password_hash character varying(34),
    email character varying(255) DEFAULT NULL::character varying,
    price_plan_id integer,
    price_plan_expires_on character varying(255)
);


ALTER TABLE public.users OWNER TO devavi;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: devavi
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO devavi;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: devavi
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: country id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.country ALTER COLUMN id SET DEFAULT nextval('public.country_id_seq'::regclass);


--
-- Name: country_movie id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.country_movie ALTER COLUMN id SET DEFAULT nextval('public.country_movie_id_seq'::regclass);


--
-- Name: department id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.department ALTER COLUMN id SET DEFAULT nextval('public.department_id_seq'::regclass);


--
-- Name: favorites id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.favorites ALTER COLUMN id SET DEFAULT nextval('public.favorites_id_seq'::regclass);


--
-- Name: gender id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.gender ALTER COLUMN id SET DEFAULT nextval('public.gender_id_seq'::regclass);


--
-- Name: genre id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.genre ALTER COLUMN id SET DEFAULT nextval('public.genre_id_seq'::regclass);


--
-- Name: genre_movie id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.genre_movie ALTER COLUMN id SET DEFAULT nextval('public.genre_movie_id_seq'::regclass);


--
-- Name: movie id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.movie ALTER COLUMN id SET DEFAULT nextval('public.movie_id_seq'::regclass);


--
-- Name: movie_cast id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.movie_cast ALTER COLUMN id SET DEFAULT nextval('public.movie_cast_id_seq'::regclass);


--
-- Name: movie_crew id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.movie_crew ALTER COLUMN id SET DEFAULT nextval('public.movie_crew_id_seq'::regclass);


--
-- Name: movie_production_company id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.movie_production_company ALTER COLUMN id SET DEFAULT nextval('public.movie_production_company_id_seq'::regclass);


--
-- Name: person id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.person ALTER COLUMN id SET DEFAULT nextval('public.person_id_seq'::regclass);


--
-- Name: price_plan id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.price_plan ALTER COLUMN id SET DEFAULT nextval('public.price_plan_id_seq'::regclass);


--
-- Name: production_company id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.production_company ALTER COLUMN id SET DEFAULT nextval('public.production_company_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: devavi
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.country (id, iso_code, name) FROM stdin;
1	AO	Estonia
2	EH	Ukraine
3	PN	Congo
4	SR	Poland
5	IE	Czech Republic
6	CL	Bermuda
7	MO	Bahrain
8	BT	Antarctica (the territory South of 60 deg S)
9	GU	Cook Islands
10	UG	Burkina Faso
11	ET	Albania
12	MX	Australia
13	BJ	Mozambique
14	AX	Jersey
15	US	Macao
16	CX	Liechtenstein
17	SN	Martinique
18	GH	Fiji
19	ER	Slovenia
20	LC	Nicaragua
21	MU	Panama
22	IQ	Costa Rica
23	TK	Bangladesh
24	GM	Haiti
25	SD	Wallis and Futuna
26	ML	United States Virgin Islands
27	IR	Saint Kitts and Nevis
28	BQ	Maldives
29	MR	Heard Island and McDonald Islands
30	IS	Tanzania
31	MW	Libyan Arab Jamahiriya
32	VU	Kuwait
33	IM	Tajikistan
34	JM	Korea
\.


--
-- Data for Name: country_movie; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.country_movie (id, movie_id, country_id) FROM stdin;
1	14	10
2	94	5
3	5	6
4	70	16
5	45	2
6	80	24
7	66	10
8	45	30
9	42	13
10	41	20
11	26	27
12	44	22
13	22	10
14	94	11
15	91	3
16	57	6
17	57	13
18	63	31
19	95	18
20	12	5
21	98	9
22	23	19
23	32	3
24	72	29
25	76	9
26	94	26
27	23	28
28	31	19
29	37	6
30	83	21
31	88	27
32	17	26
33	99	8
34	39	12
35	71	30
36	1	30
37	81	2
38	74	19
39	41	7
40	25	23
41	62	17
42	10	18
43	33	5
44	21	30
45	4	16
46	83	2
47	9	32
48	84	13
49	79	27
50	6	25
51	69	22
52	67	2
53	44	19
54	37	20
55	70	5
56	52	17
57	33	28
58	93	7
59	45	10
60	44	14
61	5	25
62	99	5
63	72	16
64	3	10
65	92	28
66	30	14
67	56	19
68	73	28
69	80	4
70	16	3
71	86	6
72	17	30
73	55	15
74	20	32
75	2	26
76	24	2
77	35	21
78	22	20
79	8	25
80	20	3
81	71	11
82	18	29
83	67	14
84	39	20
85	8	13
86	14	11
87	29	7
88	5	16
89	29	15
90	87	5
91	68	24
92	22	21
93	41	14
94	39	29
95	51	5
96	31	18
97	89	31
98	34	11
99	65	7
100	36	10
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.department (id, name) FROM stdin;
1	Mi Industries
2	Vehicula Et Institute
3	Amet LLC
4	Phasellus Fermentum Convallis Foundation
5	Leo Corporation
6	Euismod Est Arcu Associates
7	A Felis Inc.
8	Commodo Auctor Corporation
9	Cursus Diam Limited
10	Egestas Limited
11	Placerat Consulting
12	Rutrum Company
13	Neque Tellus Incorporated
14	Euismod Mauris LLP
15	Pretium Neque Morbi Associates
16	Nunc Id Enim Industries
17	Donec Feugiat Corp.
18	Ac Metus Consulting
19	Cursus Luctus Ipsum Limited
20	Posuere Cubilia Curae PC
21	Proin Vel Foundation
22	Luctus Felis Purus LLC
23	Odio Auctor Vitae LLP
24	Malesuada Fames Ac Associates
25	Vitae Diam Limited
26	Lobortis Quam Company
27	Sed Institute
28	Interdum Libero PC
29	Sit Amet Dapibus Corporation
30	Penatibus Et Ltd
\.


--
-- Data for Name: favorites; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.favorites (id, user_id, movie_id) FROM stdin;
1	20	21
2	4	73
3	99	82
4	27	57
5	15	80
6	44	47
7	1	46
8	13	27
9	59	57
10	64	84
11	17	2
12	32	58
13	12	94
14	87	13
15	73	68
16	95	98
17	12	38
18	39	58
19	21	78
20	96	70
21	71	4
22	65	73
23	78	22
24	62	2
25	5	2
26	95	87
27	30	76
28	2	63
29	14	71
30	64	58
31	34	5
32	40	71
33	53	26
34	95	32
35	82	42
36	72	15
37	7	12
38	54	95
39	50	56
40	100	65
41	88	55
42	10	20
43	18	5
44	45	7
45	96	9
46	11	76
47	70	52
48	25	18
49	62	88
50	60	55
51	28	73
52	52	17
53	37	30
54	77	74
55	95	94
56	80	60
57	20	19
58	73	34
59	27	14
60	60	39
61	83	56
62	64	22
63	75	93
64	54	64
65	41	19
66	23	50
67	51	45
68	91	9
69	40	42
70	38	66
71	55	39
72	62	85
73	42	51
74	36	62
75	58	22
76	53	93
77	50	48
78	36	54
79	82	18
80	3	33
81	94	6
82	98	13
83	70	76
84	7	43
85	83	43
86	21	63
87	6	51
88	5	8
89	90	34
90	75	8
91	95	8
92	19	78
93	29	32
94	79	46
95	71	57
96	64	50
97	29	25
98	7	75
99	32	19
100	95	13
\.


--
-- Data for Name: gender; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.gender (id, gender) FROM stdin;
1	iaculis
2	posuere
\.


--
-- Data for Name: genre; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.genre (id, name, slug, description, icon) FROM stdin;
1	dictum	ac tellus.	semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper	https://walmart.com
2	et ultrices posuere	montes,	mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non	https://wikipedia.org
3	elementum, lorem ut	ullamcorper, velit in	vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut	http://nytimes.com
4	libero.	Proin eget	Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede,	https://whatsapp.com
5	lectus quis	ornare. Fusce	pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor	https://pinterest.com
6	vehicula. Pellentesque tincidunt	Nunc ut	in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In	https://google.com
7	lorem, eget	adipiscing elit.	sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis	http://baidu.com
8	rutrum	tempus scelerisque,	magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in	https://yahoo.com
9	urna.	interdum enim non	risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam	https://youtube.com
10	tortor. Nunc	Nulla eu	risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis,	http://bbc.co.uk
11	mauris blandit	auctor odio	Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et	http://whatsapp.com
12	enim	euismod	eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem,	https://guardian.co.uk
13	sem, vitae aliquam	tempus non,	semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.	http://nytimes.com
14	Sed et libero.	ipsum porta	velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel	https://twitter.com
15	est.	Nulla	purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis	https://instagram.com
16	non dui nec	bibendum ullamcorper. Duis	aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse	https://naver.com
17	dolor, tempus	Proin vel	pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum	http://netflix.com
18	sed leo.	in	et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque	http://whatsapp.com
19	non, luctus	mauris. Suspendisse aliquet	dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas	http://reddit.com
20	Nulla eget metus	enim non	Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod	http://nytimes.com
21	sodales nisi	et ipsum	varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum	https://instagram.com
22	In lorem.	et malesuada	elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis	https://reddit.com
23	consequat purus.	tempor erat neque	nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est,	http://google.com
24	nec, euismod	ac arcu.	nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Phasellus ornare. Fusce mollis.	https://bbc.co.uk
25	Nulla	eu	non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus	http://google.com
26	consequat	venenatis a, magna.	at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed,	https://wikipedia.org
27	malesuada	sagittis	erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem	https://naver.com
28	eu tellus.	Curabitur vel lectus.	Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In	http://cnn.com
29	egestas lacinia.	blandit enim	dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec	http://bbc.co.uk
30	Fusce feugiat.	eleifend	luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula.	http://instagram.com
\.


--
-- Data for Name: genre_movie; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.genre_movie (id, movie_id, genre_id) FROM stdin;
1	6	29
2	43	8
3	29	16
4	85	21
5	21	28
6	66	23
7	79	5
8	95	20
9	64	4
10	16	24
11	72	5
12	71	13
13	36	21
14	37	22
15	2	29
16	98	28
17	68	29
18	4	8
19	10	23
20	69	3
21	29	16
22	2	5
23	70	5
24	67	11
25	90	14
26	90	20
27	27	1
28	11	25
29	18	10
30	47	19
31	39	15
32	67	29
33	91	9
34	68	18
35	33	2
36	42	2
37	18	16
38	64	3
39	82	12
40	72	8
41	93	13
42	80	5
43	5	8
44	38	19
45	94	6
46	26	4
47	4	12
48	43	27
49	24	10
50	36	25
51	97	13
52	3	29
53	45	4
54	51	19
55	52	2
56	71	24
57	32	14
58	52	12
59	7	7
60	90	23
61	45	2
62	100	18
63	19	8
64	72	11
65	57	29
66	36	3
67	85	12
68	94	18
69	90	28
70	21	12
71	31	10
72	18	5
73	93	12
74	15	27
75	46	4
76	88	18
77	93	25
78	23	9
79	5	20
80	30	21
81	71	14
82	44	5
83	14	24
84	52	30
85	39	1
86	70	22
87	98	8
88	21	21
89	13	26
90	27	20
91	87	15
92	59	6
93	6	18
94	84	28
95	61	17
96	8	7
97	51	2
98	77	21
99	65	25
100	16	4
\.


--
-- Data for Name: movie; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.movie (id, title, overview, homepage, runtime, popularity_imdb, popularity_kinopoisk, poster, release_date) FROM stdin;
13	tempor	Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper	https://pinterest.com	63	3	3	http://walmart.com	2020-01-24
14	Proin mi.	volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing,	http://google.com	143	6	3	https://zoom.us	2018-01-17
15	dictum augue malesuada	pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet	https://yahoo.com	67	8	10	https://twitter.com	2020-02-14
16	et, rutrum	velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus	https://naver.com	170	4	10	https://ebay.com	2019-07-05
17	nascetur ridiculus mus.	mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare	https://reddit.com	145	5	1	https://guardian.co.uk	2018-02-21
18	ut, sem. Nulla	fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a	https://baidu.com	123	4	5	http://youtube.com	2018-03-16
19	congue. In	eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et	https://netflix.com	65	3	4	https://zoom.us	2021-05-15
20	sit amet	massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare,	http://reddit.com	80	5	6	https://twitter.com	2020-08-27
21	tellus	ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor,	http://cnn.com	67	9	6	http://ebay.com	2019-02-19
22	et ultrices posuere	dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor	http://naver.com	99	3	4	https://instagram.com	2021-02-07
23	Proin	varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id	http://nytimes.com	90	6	9	https://google.com	2020-08-19
24	tempus, lorem	Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem	http://netflix.com	138	8	4	http://bbc.co.uk	2020-02-22
25	Cum sociis natoque	at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis	https://bbc.co.uk	107	8	5	https://youtube.com	2021-09-11
26	nisl. Quisque	aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci,	http://netflix.com	146	9	9	http://wikipedia.org	2019-07-25
27	eleifend, nunc	tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper,	https://zoom.us	95	9	8	https://instagram.com	2021-02-19
28	nibh. Donec	ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor	https://baidu.com	102	9	4	http://yahoo.com	2019-03-24
29	vulputate	consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac	http://naver.com	126	7	3	http://yahoo.com	2020-11-07
30	nibh lacinia	ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget,	https://youtube.com	137	6	3	https://walmart.com	2020-05-15
31	rhoncus.	a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus	https://google.com	172	10	7	http://nytimes.com	2019-04-01
32	convallis	mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae,	https://pinterest.com	105	5	10	https://twitter.com	2020-08-05
33	mauris sapien,	convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci.	http://baidu.com	117	8	7	http://reddit.com	2019-07-19
34	Suspendisse	a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum	http://walmart.com	118	9	6	http://youtube.com	2020-03-23
35	sit amet metus.	semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat	http://guardian.co.uk	162	1	1	http://netflix.com	2019-05-26
36	sagittis. Nullam	tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,	https://whatsapp.com	128	5	8	http://wikipedia.org	2021-11-28
37	id sapien.	pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu	https://guardian.co.uk	135	1	8	https://pinterest.com	2019-07-25
38	placerat, augue.	pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu.	https://twitter.com	137	5	7	http://ebay.com	2019-04-13
39	Nulla facilisi. Sed	Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et	http://instagram.com	163	1	7	https://youtube.com	2018-04-22
40	Praesent eu nulla	risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum	https://wikipedia.org	141	4	2	https://reddit.com	2021-01-25
41	Nullam lobortis	libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu.	http://wikipedia.org	110	6	7	https://naver.com	2021-08-26
42	pharetra ut,	Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus.	https://guardian.co.uk	164	2	10	https://twitter.com	2018-09-04
43	semper	sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam	http://guardian.co.uk	179	5	6	http://walmart.com	2018-05-01
45	et	aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.	http://reddit.com	177	2	1	http://google.com	2019-02-16
46	diam	vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula	https://twitter.com	170	10	6	https://youtube.com	2021-04-20
47	posuere	interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget,	http://netflix.com	99	9	5	https://pinterest.com	2018-10-05
48	Proin	mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at,	https://instagram.com	96	9	9	http://cnn.com	2021-10-21
49	aliquet, metus	nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor	https://cnn.com	117	9	8	https://netflix.com	2021-10-03
50	libero	Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel	http://facebook.com	77	4	9	https://guardian.co.uk	2021-08-30
51	sit amet,	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a	https://nytimes.com	122	5	6	https://guardian.co.uk	2021-10-16
52	non	Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla.	http://facebook.com	111	1	6	https://facebook.com	2020-10-14
53	volutpat.	tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus	https://facebook.com	138	3	3	http://whatsapp.com	2019-10-12
54	urna. Nullam	dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit	https://netflix.com	132	6	8	https://nytimes.com	2021-09-13
55	pretium aliquet,	mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis	https://google.com	85	5	6	https://bbc.co.uk	2021-04-05
56	rutrum lorem	per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus.	http://cnn.com	79	9	1	https://instagram.com	2019-07-02
57	tellus id nunc	urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam	http://cnn.com	135	10	9	http://youtube.com	2019-10-28
58	libero mauris,	ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque	http://whatsapp.com	105	7	6	https://pinterest.com	2020-10-25
59	vel, mauris.	vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas	http://yahoo.com	107	2	7	http://instagram.com	2020-07-13
60	dictum cursus. Nunc	egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat	https://facebook.com	75	3	6	https://nytimes.com	2018-07-08
61	blandit enim consequat	semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem	http://naver.com	140	6	5	https://instagram.com	2020-09-20
62	parturient montes, nascetur	In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy.	https://zoom.us	96	8	6	http://walmart.com	2018-06-24
63	magnis dis	magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante	https://facebook.com	169	2	6	https://ebay.com	2019-07-22
64	Fusce aliquam,	nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante	http://youtube.com	167	7	2	https://ebay.com	2021-08-28
65	lorem. Donec	Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a	https://youtube.com	115	3	1	https://baidu.com	2021-10-28
66	lectus	cubilia Curae Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed	http://whatsapp.com	104	7	5	http://pinterest.com	2020-02-22
67	Nulla eget	malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices.	https://wikipedia.org	99	4	8	https://zoom.us	2021-03-04
68	nec, diam.	eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis.	https://whatsapp.com	76	5	8	https://nytimes.com	2018-03-01
69	Nunc	malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer	http://whatsapp.com	131	6	1	https://wikipedia.org	2021-06-10
70	in sodales elit	amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi	https://whatsapp.com	114	4	3	https://nytimes.com	2019-04-17
71	ac ipsum.	egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit,	https://pinterest.com	80	5	2	https://bbc.co.uk	2018-07-20
72	commodo	ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales.	https://guardian.co.uk	138	9	4	https://whatsapp.com	2019-05-13
73	in	sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie	https://cnn.com	99	3	2	http://baidu.com	2019-02-21
74	congue turpis.	odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum.	http://bbc.co.uk	155	9	2	https://pinterest.com	2019-10-06
75	rutrum. Fusce dolor	facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum	http://google.com	93	7	7	http://baidu.com	2021-02-28
76	sagittis placerat. Cras	dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo.	http://zoom.us	172	4	3	http://netflix.com	2021-05-12
77	lacus. Quisque	Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui	http://guardian.co.uk	171	2	7	https://whatsapp.com	2021-04-13
78	ultricies ornare,	ultrices posuere cubilia Curae Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem,	http://bbc.co.uk	151	8	6	https://whatsapp.com	2019-06-17
79	Quisque tincidunt	magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.	https://bbc.co.uk	87	5	8	http://yahoo.com	2020-09-10
80	massa. Suspendisse eleifend.	non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus	http://google.com	157	10	8	http://instagram.com	2019-06-12
81	nibh sit	ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec	https://bbc.co.uk	98	9	9	http://naver.com	2020-03-12
82	Fusce aliquam,	orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et	https://bbc.co.uk	96	1	5	https://whatsapp.com	2021-09-18
83	urna et arcu	risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget	https://nytimes.com	99	7	8	http://facebook.com	2020-06-13
84	condimentum. Donec	lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit	https://youtube.com	104	8	4	https://google.com	2019-03-16
85	et malesuada	libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut	https://bbc.co.uk	154	4	2	https://nytimes.com	2019-06-01
86	vitae nibh.	ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.	https://baidu.com	130	7	6	http://bbc.co.uk	2021-01-15
87	non, feugiat nec,	vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla	http://twitter.com	134	2	8	https://twitter.com	2021-09-05
88	elit pede,	ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis	https://netflix.com	114	2	3	https://wikipedia.org	2018-03-15
89	eu tellus. Phasellus	ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut,	http://whatsapp.com	136	3	5	https://netflix.com	2018-11-23
90	aliquam eu, accumsan	consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,	https://bbc.co.uk	92	10	7	http://cnn.com	2019-01-06
91	vitae purus	turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Donec tincidunt. Donec vitae erat vel pede blandit	http://netflix.com	94	9	7	https://ebay.com	2021-07-02
92	a,	accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus	https://bbc.co.uk	91	4	2	https://bbc.co.uk	2020-07-16
93	felis eget varius	amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus.	https://instagram.com	103	9	9	http://yahoo.com	2018-10-31
94	euismod est	ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor	https://twitter.com	170	8	3	https://cnn.com	2018-04-06
1	et magnis dis	turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem	https://pinterest.com	93	5	5	https://cnn.com	2019-08-31
2	Aenean egestas	magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat	https://zoom.us	157	3	8	https://youtube.com	2018-11-11
3	dolor dapibus	mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus.	http://walmart.com	76	6	9	http://guardian.co.uk	2021-08-31
4	laoreet posuere, enim	neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in	https://youtube.com	132	1	7	http://netflix.com	2018-01-25
5	cursus et, magna.	vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante,	https://wikipedia.org	76	3	3	http://baidu.com	2020-02-04
6	laoreet, libero et	purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum	https://guardian.co.uk	113	2	9	http://guardian.co.uk	2019-08-25
7	conubia nostra, per	ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie	https://guardian.co.uk	121	3	5	https://wikipedia.org	2018-11-20
8	elit. Curabitur	molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus	https://walmart.com	107	6	6	https://twitter.com	2021-12-05
9	risus. Nunc	dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque	https://wikipedia.org	92	4	4	https://instagram.com	2019-01-18
10	eget nisi	consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed	https://instagram.com	102	6	9	https://guardian.co.uk	2020-02-26
11	metus. Vivamus	vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis	http://walmart.com	159	9	7	https://guardian.co.uk	2020-05-16
12	purus sapien, gravida	Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus	http://reddit.com	120	7	6	https://baidu.com	2020-07-12
44	faucibus orci	ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce	http://guardian.co.uk	103	8	7	https://yahoo.com	2018-06-24
95	adipiscing lobortis	dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit	https://ebay.com	110	7	7	http://facebook.com	2019-02-07
96	enim diam	magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean	http://google.com	99	10	1	http://zoom.us	2020-09-18
97	elit,	faucibus orci luctus et ultrices posuere cubilia Curae Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit.	http://google.com	146	9	9	http://netflix.com	2019-09-03
98	Suspendisse	magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet	http://twitter.com	106	7	3	http://walmart.com	2021-03-01
99	varius et, euismod	iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie	http://baidu.com	133	9	7	https://instagram.com	2021-10-05
100	elit, pellentesque a,	nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna	https://walmart.com	112	4	8	https://baidu.com	2019-09-04
\.


--
-- Data for Name: movie_cast; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.movie_cast (id, movie_id, person_id, gender_id, character_name) FROM stdin;
1	96	3	2	Tatyana Petersen
2	22	3	2	Carter Luna
3	77	18	2	Elaine Strickland
4	95	18	2	Benedict Valencia
5	98	22	1	Priscilla Chase
6	90	3	1	Rhona Moore
7	50	26	1	Jolie Sharp
8	36	24	2	Kenneth Ballard
9	43	19	1	Regan Stevenson
10	25	23	2	Nissim Mcclain
11	60	12	2	Virginia Jimenez
12	92	21	2	Malcolm Bean
13	2	9	1	Alea Trujillo
14	4	25	2	Cameran Gay
15	44	26	1	Harriet Nieves
16	44	14	1	Declan Pierce
17	55	23	1	Elizabeth Hanson
18	21	7	2	Keith Patel
19	77	19	2	Sopoline Hartman
20	91	10	1	Judith Herring
21	39	4	1	Oprah Rodriguez
22	54	4	2	Harriet Snider
23	83	4	2	Ivory Cooley
24	88	24	2	Isaac Bernard
25	91	8	2	Craig Jackson
26	29	9	2	Riley Jennings
27	77	19	1	Audrey Raymond
28	45	16	2	Clementine Burns
29	88	13	2	Helen Sears
30	4	24	1	Zachery Haley
31	37	4	2	Noelle Haley
32	94	27	2	Amery Merritt
33	41	15	2	Dennis Gay
34	76	3	1	Victor Harvey
35	74	12	2	Inez Woodward
36	67	11	1	Colby Hampton
37	71	19	2	Oliver Santana
38	59	20	2	Athena Guerra
39	62	4	2	Vladimir Hahn
40	97	10	2	Eve Mcgowan
41	24	5	1	Cora Martinez
42	9	27	2	Lani Lara
43	36	18	1	Fallon Acosta
44	22	23	1	Keefe Monroe
45	28	27	2	Ivor Singleton
46	56	6	2	Deacon Crane
47	96	18	1	Yael English
48	4	19	2	Vivian Howard
49	57	15	1	Kessie Dominguez
50	52	18	1	Katell Bennett
51	58	4	2	Macy Sanchez
52	29	9	1	Evan Garrison
53	15	21	2	Serena Kelly
54	24	27	2	Barbara Stevenson
55	91	29	2	Urielle Luna
56	99	25	1	Lacy Horton
57	12	10	1	Aurora Meyers
58	58	25	2	Edward Mclean
59	82	21	1	Uma Pruitt
60	35	25	1	Suki Santana
61	3	3	2	Catherine Woodward
62	59	20	1	Noah Morrison
63	29	22	1	Brenna Armstrong
64	84	7	1	Elliott Parrish
65	91	6	2	Kyra Burt
66	9	29	1	Geraldine Maxwell
67	67	12	2	Stuart Grant
68	74	5	2	Abraham Marquez
69	14	5	1	Moana Owens
70	54	24	2	Hamish Santiago
71	24	5	1	Dorian Abbott
72	11	15	2	Abel Morse
73	18	27	1	Russell Grant
74	79	10	2	Leslie Black
75	74	19	2	Belle Atkins
76	75	28	2	Quail Roy
77	58	10	1	Jasper Sweet
78	66	2	1	Daphne Cash
79	46	20	2	Chandler Davidson
80	86	10	1	Hadley Pacheco
81	50	27	1	Cain Rosario
82	57	9	1	Cody Donaldson
83	71	3	1	Kasimir Trevino
84	63	5	2	Chanda Moran
85	87	21	2	Brenden Battle
86	6	11	2	Claire Kirkland
87	10	22	1	Ferris Washington
88	91	29	2	Robert Holloway
89	30	15	2	Palmer Turner
90	94	29	1	Len Puckett
91	56	29	2	Steven Solis
92	86	11	2	Tallulah Hubbard
93	78	26	2	Nichole Graham
94	42	30	1	Demetria Bridges
95	60	6	2	Daquan Hopper
96	14	16	2	Plato Bray
97	98	11	2	Levi Wilson
98	53	14	1	Carissa Fields
99	98	9	1	Simon Wiggins
100	86	3	2	Joel Bruce
\.


--
-- Data for Name: movie_crew; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.movie_crew (id, movie_id, person_id, department_id, job) FROM stdin;
1	88	15	5	id nunc
2	29	23	9	ornare sagittis
3	94	28	9	pede. Praesent
4	9	25	20	Nulla eu
5	97	19	25	ac nulla.
6	14	28	13	tincidunt nibh.
7	51	25	28	bibendum. Donec
8	39	6	20	natoque penatibus
9	39	9	18	neque. Nullam
10	82	11	6	vestibulum massa
11	89	5	2	tincidunt pede
12	69	24	12	a odio
13	71	17	30	in, dolor.
14	94	27	23	Vivamus sit
15	59	4	12	Donec sollicitudin
16	95	10	14	lorem lorem,
17	5	27	7	non massa
18	46	14	13	sit amet
19	26	20	15	Mauris vestibulum,
20	84	23	2	Quisque ornare
21	64	5	18	in aliquet
22	9	13	8	magna a
23	70	11	21	penatibus et
24	13	8	27	congue turpis.
25	6	8	9	non, hendrerit
26	20	6	27	et, magna.
27	75	8	25	rutrum urna,
28	48	7	14	quis diam
29	5	3	18	vestibulum lorem,
30	69	26	12	sollicitudin a,
31	70	12	16	Aliquam rutrum
32	67	21	16	Aenean gravida
33	4	27	7	arcu. Nunc
34	68	16	4	sapien, cursus
35	13	29	24	Curabitur massa.
36	69	24	18	magna. Ut
37	76	5	20	Suspendisse sagittis.
38	24	4	16	a nunc.
39	70	16	17	ante, iaculis
40	23	3	15	dapibus quam
41	39	2	14	parturient montes,
42	93	30	26	faucibus id,
43	91	24	3	tempor diam
44	87	27	6	ornare, lectus
45	20	13	26	id, mollis
46	70	8	18	ultricies adipiscing,
47	67	9	11	eleifend. Cras
48	16	3	10	ac mattis
49	76	28	3	orci quis
50	86	20	20	aliquet. Proin
51	23	14	11	mollis non,
52	71	23	4	varius orci,
53	80	1	11	Suspendisse dui.
54	43	6	3	arcu. Vestibulum
55	9	27	30	Proin non
56	28	8	13	lobortis mauris.
57	58	9	4	vestibulum nec,
58	60	2	20	Cras dolor
59	10	7	8	Cras lorem
60	63	26	27	augue id
61	80	17	16	leo. Vivamus
62	9	6	28	sit amet
63	1	2	20	Aenean euismod
64	58	7	20	nisi magna
65	64	23	16	lobortis quam
66	28	20	25	non magna.
67	99	21	11	Aliquam nec
68	56	21	7	quis, pede.
69	45	7	23	Aliquam tincidunt,
70	63	26	29	molestie sodales.
71	34	4	29	convallis convallis
72	13	26	3	nunc sit
73	35	27	13	adipiscing lobortis
74	44	7	1	sit amet
75	60	24	18	enim. Etiam
76	82	29	30	risus quis
77	53	23	21	eu, accumsan
78	79	16	21	convallis erat,
79	93	15	19	Nunc ac
80	51	2	12	dui. Cras
81	69	26	13	enim commodo
82	38	2	8	erat. Sed
83	31	28	12	Suspendisse ac
84	32	21	8	Fusce aliquam,
85	21	4	26	nec ante.
86	49	9	20	nascetur ridiculus
87	16	16	17	rhoncus id,
88	61	14	11	ultricies dignissim
89	63	6	15	eget mollis
90	3	15	26	nibh dolor,
91	52	22	21	ultricies sem
92	99	2	5	tempor, est
93	79	10	20	vehicula et,
94	19	28	15	Nunc commodo
95	59	21	13	dui nec
96	77	12	7	pharetra nibh.
97	99	23	29	tincidunt congue
98	37	5	19	Suspendisse sed
99	32	10	3	facilisis, magna
100	60	10	4	a, arcu.
\.


--
-- Data for Name: movie_production_company; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.movie_production_company (id, movie_id, production_company_id) FROM stdin;
1	95	15
2	21	8
3	46	13
4	54	7
5	34	11
6	9	2
7	10	7
8	84	1
9	64	2
10	54	25
11	52	7
12	27	17
13	15	21
14	10	30
15	3	5
16	72	24
17	63	12
18	55	28
19	83	28
20	69	24
21	20	30
22	9	5
23	84	14
24	35	29
25	29	9
26	7	9
27	27	25
28	27	14
29	51	18
30	68	6
31	40	19
32	53	23
33	54	9
34	87	15
35	24	25
36	99	10
37	29	29
38	72	20
39	1	8
40	71	14
41	40	8
42	68	13
43	32	4
44	25	17
45	14	23
46	71	25
47	21	28
48	75	12
49	26	11
50	32	22
51	50	16
52	38	8
53	45	10
54	39	5
55	27	11
56	79	4
57	94	6
58	68	22
59	92	24
60	39	13
61	58	13
62	90	3
63	45	12
64	9	15
65	33	10
66	50	1
67	6	22
68	73	12
69	38	7
70	36	6
71	45	10
72	65	15
73	44	28
74	13	22
75	1	22
76	29	21
77	40	11
78	86	14
79	63	23
80	69	12
81	50	9
82	82	2
83	8	24
84	68	22
85	32	4
86	96	17
87	5	26
88	2	27
89	34	4
90	46	18
91	47	8
92	17	20
93	39	27
94	98	5
95	25	6
96	18	8
97	23	21
98	78	22
99	82	20
100	61	19
\.


--
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.person (id, name) FROM stdin;
1	Rana Clark
2	Quynn James
3	Mannix Gates
4	Britanney Stout
5	Quynn Pugh
6	Ivory William
7	Phelan Sanchez
8	Hedda Murphy
9	Reuben Gill
10	Autumn Webb
11	Cain Schultz
12	Cheryl Shannon
13	Quinn Collier
14	Kennedy Wilcox
15	Macey Holloway
16	Wesley Stout
17	Devin Barnett
18	Hollee Cruz
19	Adria Collier
20	Genevieve Acevedo
21	Jackson Dillard
22	Zane Gilmore
23	Camden Diaz
24	Herman Cooke
25	Colton Horn
26	Nolan Summers
27	Cadman Cain
28	Nora Swanson
29	Anika Dalton
30	Fay Arnold
31	Kasper Farley
32	Jolene Woodard
33	Genevieve Davis
34	Malachi Holland
35	Iona Marsh
36	Travis Harvey
37	Scarlet Lucas
38	Yen Curtis
39	Knox Matthews
40	Savannah Fischer
41	Jelani Trevino
42	Lana Harper
43	Dorian Schwartz
44	Hammett Gill
45	Graiden Gray
46	Grady Shepard
47	Wayne Price
48	Bruno Ayala
49	Yoshi Jensen
50	Dieter Abbott
51	Bree Hawkins
52	Minerva Wooten
53	Ramona Rowe
54	Jerome Frye
55	Allistair Wolfe
56	Wade Goodwin
57	Cruz Donovan
58	Rae Glover
59	Cheyenne Morris
60	Kane Spears
61	Ahmed Weaver
62	Angela Phillips
63	Brianna Andrews
64	Genevieve Newman
65	Herrod Allison
66	Nasim Shelton
67	Gray Hyde
68	Patience Adkins
69	Dominic Gross
70	Chanda Nunez
71	Alexandra Daniel
72	Vanna Gaines
73	Alma Dunn
74	Buckminster Lyons
75	Kylee Harrell
76	Marah Rivers
77	Hop Delacruz
78	Isadora Stark
79	Samantha Kennedy
80	Rowan Allison
81	Amery Osborn
82	Colt Pope
83	Sandra Ramsey
84	Amity Rosa
85	Holly Zimmerman
86	Jared Carver
87	Talon Armstrong
88	Chloe Reed
89	Trevor Tillman
90	Pamela Espinoza
91	Aimee Freeman
92	Rashad Hewitt
93	Dieter Foley
94	Shaine Aguirre
95	Harrison Bennett
96	Ira Day
97	Hoyt Suarez
98	Holmes Ward
99	Mannix Solomon
100	Sonia Rogers
\.


--
-- Data for Name: price_plan; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.price_plan (id, name, price) FROM stdin;
1	bibendum fermentum metus. Aenean sed pede nec ante blandit	361
2	justo nec ante.	384
3	eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur	760
4	tellus. Nunc lectus	453
5	cursus et, magna. Praesent interdum	861
6	ornare sagittis felis.	682
7	neque. In ornare sagittis felis. Donec tempor,	604
8	sit amet ultricies sem magna nec quam. Curabitur	404
9	neque.	153
10	congue. In scelerisque	715
\.


--
-- Data for Name: production_company; Type: TABLE DATA; Schema: public; Owner: devavi
--

COPY public.production_company (id, name, country_id, headquaters, established, notes) FROM stdin;
1	vestibulum lorem, sit	16	Gladstone	1995	mauris ipsum porta elit, a feugiat tellus lorem eu
2	odio. Etiam ligula	5	Fréjus	1999	vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse
3	Curabitur	9	Torghar	2011	ultricies ligula. Nullam enim. Sed
4	arcu.	24	Aizwal	1996	diam. Sed diam lorem,
5	amet metus. Aliquam	8	Palma de Mallorca	2013	mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim.
6	quis arcu	8	O'Higgins	2010	Aliquam nec enim. Nunc ut erat. Sed nunc est,
7	egestas ligula.	7	Sint-Pieters-Leeuw	2009	penatibus et magnis
8	ut	11	Słupsk	1997	adipiscing, enim mi tempor
9	lobortis quis, pede.	29	Gangneung	2002	Cum sociis natoque penatibus et magnis dis
10	at, libero.	29	Veracruz	2001	lobortis quis, pede. Suspendisse dui. Fusce diam
11	et, lacinia vitae,	17	Manokwari	2016	auctor ullamcorper, nisl arcu iaculis enim, sit amet
12	Mauris blandit	24	La Paz	2006	facilisis facilisis,
13	magnis dis	24	Washuk	2015	bibendum
14	massa non ante	24	Kidapawan	2013	a, enim.
15	sem	29	Rivne	2004	in lobortis tellus justo sit
16	mollis.	31	Cà Mau	2020	tincidunt,
17	Quisque	3	Neuwied	2020	rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales
18	libero	2	Gangneung	1999	amet lorem semper
19	Donec	5	Sandviken	2017	et, euismod et, commodo at,
20	risus.	29	Tengah	1994	ultrices iaculis odio. Nam interdum enim non
21	hendrerit. Donec	11	Cork	1993	Donec fringilla. Donec feugiat metus sit amet ante. Vivamus
22	Suspendisse ac	25	Nova Kakhovka	2015	tristique pellentesque, tellus sem mollis dui, in sodales elit
23	ipsum cursus vestibulum.	30	Montague	1992	dictum. Proin eget
24	tristique pellentesque,	12	Upper Hutt	1991	orci luctus et ultrices posuere
25	nibh enim,	2	Lạng Sơn	2013	vehicula risus. Nulla eget metus eu erat semper
26	vel, faucibus id,	24	Berlin	2002	venenatis
27	sit amet	3	Gmunden	2012	sit
28	ac ipsum.	3	Tranås	1998	est mauris, rhoncus id,
29	gravida. Praesent	8	Parys	1992	arcu et pede. Nunc sed orci lobortis augue
30	Nulla dignissim.	17	Bauchi	2020	cursus non, egestas a,
\.
--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: devavi
--
COPY public.users (id, login, password_hash, email, price_plan_id, price_plan_expires_on) FROM stdin;
1	Ina	SE1550164544884343363473	a.aliquet@protonmail.ca	3	14/07/2022
2	Nola	LV87EAIT0155474549431	ultricies@icloud.ca	2	21/09/2022
3	Randolph	TN1706233322463696865453	arcu.iaculis@protonmail.couk	8	25/12/2022
4	Pandora	MD2371281801147171803589	morbi.tristique@yahoo.com	3	09/07/2023
5	Herrod	RO62LITS5192351030871942	sem.egestas@icloud.couk	2	27/08/2023
6	Higgins	CH4282578404845172184	elit.elit.fermentum@protonmail.edu	4	07/05/2023
7	Whitehead	PL60700302128823625757576867	nunc.sed@protonmail.org	2	09/10/2022
8	Danielle	BH97465371273749075875	donec.sollicitudin@protonmail.com	6	01/08/2023
9	Byers	HU13721367359240785496377562	ante.ipsum.primis@hotmail.com	8	03/02/2023
10	Clements	MK04131439568840511	aliquam.erat.volutpat@google.org	6	12/03/2023
11	Giles	DO07815707125582715677841724	auctor.non.feugiat@yahoo.edu	5	09/01/2024
12	Price	DO77577381654435433898412397	vulputate.lacus@protonmail.org	2	09/11/2022
13	Mannix	DO64220588324129633251761888	fusce.aliquam@google.net	5	25/03/2023
14	Church	GI80CPOC335024689534282	ligula@hotmail.net	1	03/10/2023
15	Hatfield	LB04954633471173542862545360	facilisi@google.com	4	14/02/2023
16	Camden	FO7832017157115735	purus@aol.net	7	14/06/2022
17	Xena	ES9540807742144441517961	vivamus@icloud.couk	10	05/01/2024
18	Kerr	BA967564881981707382	iaculis@protonmail.edu	3	06/04/2022
19	Emerson	CZ0640692584486398153032	vitae.odio.sagittis@google.ca	10	15/08/2023
20	Gretchen	HR0688694106279765842	eros.non.enim@outlook.ca	1	24/01/2023
21	Robles	CZ3346349584888314756865	aliquam@icloud.net	1	16/02/2023
22	Evan	PL23213717675186528152442632	sagittis.augue@hotmail.org	7	04/06/2023
23	Rana	ES1717314235494087568351	et@yahoo.net	1	03/12/2022
24	Sullivan	NL35SQUO7881626156	laoreet@yahoo.edu	5	03/07/2022
25	Howard	TN1087517472629046121720	vitae.velit.egestas@yahoo.ca	8	20/08/2022
26	Leon	GR9012213755418823546788301	arcu.vestibulum@aol.net	3	24/04/2022
27	David	MC8496171357067433526368742	facilisis.vitae@yahoo.com	3	02/05/2023
28	Howe	BE97797459314076	interdum.ligula@google.edu	8	17/05/2022
29	Vazquez	NL24MISD7738623987	aliquam.erat@hotmail.com	6	15/06/2022
30	Carla	AD5465843235395863382733	tincidunt.donec.vitae@protonmail.net	9	25/02/2023
31	Byrd	CZ9886495762849245414128	aliquet.nec.imperdiet@icloud.ca	8	22/12/2022
32	Hurst	IL719247182531145117478	praesent.luctus@outlook.ca	8	07/07/2022
33	Hiroko	KZ401660785367118815	ut.nec.urna@hotmail.edu	9	14/03/2023
34	Keegan	CY16124883421025756783986756	arcu.vestibulum.ante@hotmail.com	6	21/08/2023
35	Denton	KZ518436686396763167	varius.ultrices.mauris@aol.net	3	21/12/2023
36	Dunn	HU78980628510173468442346805	velit.eu@aol.com	5	27/03/2022
37	Robbins	EE764555549414154647	et.ultrices@google.edu	3	05/05/2022
38	Jameson	MU8874376165371337896319817655	metus.eu.erat@protonmail.edu	10	01/02/2022
39	Katell	SE4760202940639472366781	integer@icloud.couk	6	29/04/2022
40	Lester	AE748525675517913952227	luctus@aol.edu	2	02/01/2024
41	Kline	AZ24871221285351785495573342	nec.orci.donec@icloud.org	8	23/03/2023
42	Herring	AL74423183710118529642170858	eu.sem@protonmail.net	9	23/01/2023
43	Cruz	PT41274430859687868558196	cursus@yahoo.net	7	03/09/2023
44	Ezekiel	LI5096964080836686724	in.felis@protonmail.org	8	05/08/2023
45	Adam	IT890GNLLI76271099759838350	lobortis.class@icloud.ca	1	03/03/2023
46	April	GL8509035338635157	nec.tellus@aol.couk	7	07/03/2023
47	Grace	IS178826130424270113641882	tristique.senectus@hotmail.edu	3	15/11/2022
48	Patton	SA3223122949039317851188	integer@google.edu	8	27/04/2023
49	Colby	RO24MELD7039721113223485	suspendisse@protonmail.com	6	03/06/2023
50	Quynn	LT051482284958463458	in.faucibus@yahoo.com	8	03/07/2022
51	Denise	FR7418789521988284377245848	dui.suspendisse@aol.net	1	21/08/2022
52	Raja	SK8466571581346174408763	tincidunt.adipiscing.mauris@aol.ca	8	19/04/2023
53	Booker	BA623854453315825342	felis@protonmail.org	4	17/11/2022
54	Mooney	LU246044771244343412	euismod.et.commodo@protonmail.ca	1	26/09/2022
55	Noelani	AD6777788013243106786885	dolor.quisque.tincidunt@google.org	2	02/09/2023
56	Mack	MD4240116211387923263216	tincidunt.orci@google.org	6	14/11/2023
57	Xandra	BG31KPXD71165515883300	nunc.est@google.com	6	26/08/2023
58	Jessamine	SM7231551391803492225232176	penatibus.et@protonmail.com	8	06/01/2024
59	Garza	TR340517427351430216253867	arcu.imperdiet@yahoo.org	6	12/11/2022
60	Baxter	CY93222170674277217374734351	auctor.velit.aliquam@outlook.com	8	24/02/2022
61	Sylvia	FO6215792748054778	purus.mauris@aol.ca	2	10/08/2022
62	Campbell	GI75IRCU318547753325383	nunc.nulla@icloud.net	8	27/07/2023
63	Garrison	ME57717474457374225411	lectus@protonmail.net	5	01/05/2022
64	Brenda	CH1105955228471932561	at.velit.cras@yahoo.ca	7	25/07/2023
65	Saunders	LU438508359447232277	rutrum.fusce@hotmail.ca	8	06/03/2022
66	Fuller	RS67715956487804980776	tincidunt.neque.vitae@google.net	4	15/11/2022
67	Gonzales	CH5743361158240543189	ornare@outlook.edu	2	23/11/2023
68	Tana	SM1113124329142376135806684	non.enim@icloud.org	8	07/11/2023
69	Kato	IL202447341470381315148	est@icloud.couk	9	10/11/2022
70	Arden	AT568337613881338378	ligula.eu.enim@aol.edu	10	17/04/2023
71	Illiana	SE0639147549575878574008	in.dolor@protonmail.couk	9	29/03/2023
72	Thomas	AD6469253781515372604315	quis.diam@google.edu	9	26/07/2022
73	Tad	CZ2945853256567370776444	mollis@yahoo.com	1	22/05/2023
74	Holly	GR7118554172384934118581857	tempor.erat.neque@outlook.net	6	10/05/2023
75	Samson	MD7173234431318103461254	leo.cras@aol.couk	8	17/01/2023
76	Madden	SA1450384258831476057761	venenatis.lacus@hotmail.edu	9	19/06/2023
77	Sanford	PL82534281734675856185395658	magna.sed@yahoo.org	4	26/06/2023
78	Bruce	GI87NMBZ606118512689239	congue.in@hotmail.com	3	02/11/2023
79	Garner	RS63385584726477344731	luctus@protonmail.couk	1	07/04/2022
80	Snyder	CR2650774372778527212	erat.vel@icloud.edu	10	12/04/2022
81	Rhea	AZ59741300571473618003247741	elementum.purus@hotmail.ca	5	25/11/2023
82	Kane	BA635975105220658205	duis.cursus@protonmail.com	2	13/06/2022
83	Hedley	HU83877412184464823003129080	elit.pede.malesuada@outlook.edu	3	12/11/2022
84	Duran	EE261234706206452049	ornare.tortor@yahoo.org	2	03/07/2022
85	Burnett	AD3503677346217608529259	sed.neque@aol.couk	8	10/01/2023
86	Aretha	GB32EUTL51060580713005	nec.diam.duis@icloud.org	9	10/07/2023
87	Moran	LT927335480785375023	vivamus@yahoo.com	8	28/11/2022
88	Nielsen	SE1670751515832557616328	aenean.eget.magna@yahoo.org	2	25/10/2022
89	Gillian	FI7164335587778438	bibendum@aol.net	5	01/10/2023
90	Burch	AE112146384860161248503	scelerisque.neque@yahoo.edu	3	12/08/2022
91	Andrews	LU685744208982761714	pulvinar.arcu@aol.net	8	07/08/2022
92	Anthony	BE66405068346570	metus.aliquam@protonmail.ca	4	16/11/2023
93	Reeves	FR2843366533073457117671030	magnis.dis.parturient@yahoo.ca	4	26/01/2023
94	Peter	RS61898627185136526874	etiam.gravida@aol.ca	2	10/12/2022
95	Amity	GB94VIPM53541725138739	sed.pede@outlook.com	9	02/09/2022
96	Molina	LT085063431797567137	magna.praesent@aol.com	9	16/09/2022
97	Thaddeus	PK9651508322364935372305	augue@icloud.edu	3	31/03/2023
98	Randall	CR2361243428443848261	et.lacinia.vitae@google.net	2	13/01/2023
99	Clare	FI6431286620937353	vehicula.risus@hotmail.ca	8	22/04/2023
100	Jason	EE557174825597773237	nunc@icloud.edu	8	03/01/2023
\.
--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.country_id_seq', 34, true);
--
-- Name: country_movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.country_movie_id_seq', 100, true);
--
-- Name: department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.department_id_seq', 30, true);
--
-- Name: favorites_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.favorites_id_seq', 100, true);
--
-- Name: gender_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.gender_id_seq', 2, true);
--
-- Name: genre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.genre_id_seq', 30, true);
--
-- Name: genre_movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.genre_movie_id_seq', 100, true);
--
-- Name: movie_cast_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.movie_cast_id_seq', 100, true);
--
-- Name: movie_crew_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.movie_crew_id_seq', 100, true);
--
-- Name: movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.movie_id_seq', 100, true);
--
-- Name: movie_production_company_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.movie_production_company_id_seq', 100, true);
--
-- Name: person_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.person_id_seq', 100, true);
--
-- Name: price_plan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.price_plan_id_seq', 10, true);
--
-- Name: production_company_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.production_company_id_seq', 30, true);
--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: devavi
--
SELECT pg_catalog.setval('public.users_id_seq', 100, true);
--
-- Name: country country_iso_code_key; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country
    ADD CONSTRAINT country_iso_code_key UNIQUE (iso_code);
--
-- Name: country_movie country_movie_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country_movie
    ADD CONSTRAINT country_movie_pkey PRIMARY KEY (id);
--
-- Name: country country_name_key; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country
    ADD CONSTRAINT country_name_key UNIQUE (name);
--
-- Name: country country_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country
    ADD CONSTRAINT country_pkey PRIMARY KEY (id);
--
-- Name: department department_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.department
    ADD CONSTRAINT department_pkey PRIMARY KEY (id);
--
-- Name: favorites favorites_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.favorites
    ADD CONSTRAINT favorites_pkey PRIMARY KEY (id);
--
-- Name: gender gender_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.gender
    ADD CONSTRAINT gender_pkey PRIMARY KEY (id);
--
-- Name: genre_movie genre_movie_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.genre_movie
    ADD CONSTRAINT genre_movie_pkey PRIMARY KEY (id);
--
-- Name: genre genre_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.genre
    ADD CONSTRAINT genre_pkey PRIMARY KEY (id);
--
-- Name: movie_cast movie_cast_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_cast
    ADD CONSTRAINT movie_cast_pkey PRIMARY KEY (id);
--
-- Name: movie_crew movie_crew_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_crew
    ADD CONSTRAINT movie_crew_pkey PRIMARY KEY (id);
--
-- Name: movie movie_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie
    ADD CONSTRAINT movie_pkey PRIMARY KEY (id);
--
-- Name: movie_production_company movie_production_company_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_production_company
    ADD CONSTRAINT movie_production_company_pkey PRIMARY KEY (id);
--
-- Name: person person_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id);
--
-- Name: price_plan price_plan_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.price_plan
    ADD CONSTRAINT price_plan_pkey PRIMARY KEY (id);
--
-- Name: production_company production_company_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.production_company
    ADD CONSTRAINT production_company_pkey PRIMARY KEY (id);
--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
--
-- Name: country_movie country_movie_country_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country_movie
    ADD CONSTRAINT country_movie_country_id_fk FOREIGN KEY (country_id) REFERENCES public.country(id) ON DELETE CASCADE;
--
-- Name: country_movie country_movie_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.country_movie
    ADD CONSTRAINT country_movie_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: favorites favorites_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.favorites
    ADD CONSTRAINT favorites_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: favorites favorites_user_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.favorites
    ADD CONSTRAINT favorites_user_id_fk FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
--
-- Name: genre_movie genre_movie_genre_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.genre_movie
    ADD CONSTRAINT genre_movie_genre_id_fk FOREIGN KEY (genre_id) REFERENCES public.genre(id) ON DELETE CASCADE;
--
-- Name: genre_movie genre_movie_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.genre_movie
    ADD CONSTRAINT genre_movie_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: movie_cast movie_cast_gender_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_cast
    ADD CONSTRAINT movie_cast_gender_id_fk FOREIGN KEY (gender_id) REFERENCES public.gender(id) ON DELETE CASCADE;
--
-- Name: movie_cast movie_cast_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_cast
    ADD CONSTRAINT movie_cast_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: movie_cast movie_cast_person_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_cast
    ADD CONSTRAINT movie_cast_person_id_fk FOREIGN KEY (person_id) REFERENCES public.person(id) ON DELETE CASCADE;
--
-- Name: movie_crew movie_crew_department_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_crew
    ADD CONSTRAINT movie_crew_department_id_fk FOREIGN KEY (department_id) REFERENCES public.department(id) ON DELETE CASCADE;
--
-- Name: movie_crew movie_crew_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_crew
    ADD CONSTRAINT movie_crew_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: movie_crew movie_crew_person_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_crew
    ADD CONSTRAINT movie_crew_person_id_fk FOREIGN KEY (person_id) REFERENCES public.person(id) ON DELETE CASCADE;
--
-- Name: movie_production_company movie_production_company_movie_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_production_company
    ADD CONSTRAINT movie_production_company_movie_id_fk FOREIGN KEY (movie_id) REFERENCES public.movie(id) ON DELETE CASCADE;
--
-- Name: movie_production_company movie_production_company_production_company_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.movie_production_company
    ADD CONSTRAINT movie_production_company_production_company_id_fk FOREIGN KEY (production_company_id) REFERENCES public.production_company(id) ON DELETE CASCADE;
--
-- Name: production_company production_company_country_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.production_company
    ADD CONSTRAINT production_company_country_id_fk FOREIGN KEY (country_id) REFERENCES public.country(id) ON DELETE CASCADE;
--
-- Name: users users_price_plan_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: devavi
--
ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_price_plan_id_fk FOREIGN KEY (price_plan_id) REFERENCES public.price_plan(id) ON DELETE CASCADE;
--
-- PostgreSQL database dump complete
--
