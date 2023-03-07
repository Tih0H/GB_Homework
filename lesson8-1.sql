// таблица со сущностью страна производства фильма

CREATE DATABASE online_cinema;

DROP TABLE IF EXISTS 'country'; 

CREATE TABLE 'country' (
  id SERIAL PRIMARY KEY,
  iso_code varchar(250) NOT NULL UNIQUE,
  name varchar(250) NOT NULL UNIQUE
); 

// таблица с сущностью фильм

DROP TABLE IF EXISTS "movie";

CREATE TABLE "movie" (
  id SERIAL PRIMARY KEY,
  title varchar(255) NOT NULL,
  overview TEXT default NULL,
  homepage varchar(255) default NULL,
  release_date date NOT NULL,
  runtime integer default NULL,
  popularity_IMDb integer default NULL,
  popularity_kinopoisk integer default NULL,
  poster varchar(255) default NULL
);

// таблица с связи много-ко-много фильм/страна производства

DROP TABLE IF EXISTS "country_movie";

CREATE TABLE "country_movie" (
  id SERIAL PRIMARY KEY,
  movie_id integer NOT NULL,
  country_id integer NOT NULL
);

// таблица с сущностью жанр

DROP TABLE IF EXISTS "genre";

CREATE TABLE "genre" (
  id SERIAL PRIMARY KEY,
  name varchar(255) default NULL,
  slug varchar(255) default NULL,
  description TEXT default NULL,
  icon varchar(255)
);

// таблица с связи много-ко-много фильм/жанр

DROP TABLE IF EXISTS "genre_movie";

CREATE TABLE "genre_movie" (
  id SERIAL PRIMARY KEY,
  movie_id integer NOT NULL,
  genre_id integer NOT NULL
);

// таблица с сущностью компания производства фильма

DROP TABLE IF EXISTS "production_company";

CREATE TABLE "production_company" (
  id SERIAL PRIMARY KEY,
  name TEXT  NOT NULL,
  country_id integer NOT NULL,
  headquaters varchar(255),
  established integer NULL,
  notes TEXT default NULL
);

// таблица с сущностью пол для персонажа

DROP TABLE IF EXISTS gender;

CREATE TABLE gender (
  id SERIAL PRIMARY KEY,
  gender VARCHAR(255) default NULL
);

// таблица с сущностью человек/персона (актер, режиссер и тд.)

DROP TABLE IF EXISTS person;

CREATE TABLE person (
  id SERIAL PRIMARY KEY,
  name varchar(255) default NULL
);

// таблица с сущностью подразделение (продюссирование, режессирование, камера и свет и тд)

DROP TABLE IF EXISTS department;

CREATE TABLE "department" (
  id SERIAL PRIMARY KEY,
  name varchar(255)
);

// таблица с составом актеров фильма

DROP TABLE IF EXISTS "movie_cast";

CREATE TABLE "movie_cast" (
  id SERIAL PRIMARY KEY,
  movie_id integer NULL,
  person_id integer NULL,
  gender_id integer NULL,
  character_name TEXT default NULL
);

// таблица с составом команды производства фильма

DROP TABLE IF EXISTS "movie_crew";

CREATE TABLE "movie_crew" (
  id SERIAL PRIMARY KEY,
  movie_id integer NULL,
  person_id integer NULL,
  department_id integer NULL,
  job TEXT default NULL
);

// таблица с сущностью тарифный план 

DROP TABLE IF EXISTS "price_plan";

CREATE TABLE "price_plan" (
  id SERIAL PRIMARY KEY,
  name TEXT default NULL,
  price integer NULL
);

// таблица с сущностью пользователи

DROP TABLE IF EXISTS "users";

CREATE TABLE "users" (
  id SERIAL PRIMARY KEY,
  login varchar(255) default NULL,
  password_hash varchar(34),
  emaIl varchar(255) default NULL,
  price_plan_id integer NULL,
  price_plan_expires_on varchar(255)
);

// таблица связи избранныйх фильмов пользователя

DROP TABLE IF EXISTS "favorites";

CREATE TABLE "favorites" (
  id SERIAL PRIMARY KEY,
  user_id integer NULL,
  movie_id integer NULL
);