// триггер - проверка при создании фильма на указание жанра и производственной компании

CREATE OR REPLACE FUNCTION create_movie_trigger()
RETURNS TRIGGER AS

$$
DECLARE is_set_genre BOOLEAN;
DECLARE is_set_production_company BOOLEAN;
BEGIN
is_set_genre:=NOT EXISTS(SELECT * FROM genre_movie WHERE genre_movie.movie_id = NEW.id);
is_set_production_company:=NOT EXISTS(SELECT * FROM movie_production_company WHERE movie_production_company.movie_id = NEW.id);
IF is_set_genre THEN
RAISE EXCEPTION 'NOT specified GENRE';
END IF;
IF is_set_production_company THEN
RAISE EXCEPTION 'NOT specified PRODUCTION COMPANY';
END IF;
RETURN NEW;
END
$$

LANGUAGE PLPGSQL;

// DROP TRIGGER check_movie_on_create ON movie;

CREATE TRIGGER check_movie_on_create AFTER INSERT ON movie
FOR EACH ROW
EXECUTE FUNCTION create_movie_trigger();

// Добавление movie теперь командой, пример

WITH ins1 AS (
   INSERT INTO movie (title)
   VALUES ('Rembo')
   RETURNING id AS movie_id
   ), ins2 AS (
   INSERT INTO genre_movie (movie_id, genre_id)
	SELECT movie_id, 1 FROM ins1
   )
INSERT INTO movie_production_company (movie_id, production_company_id)
SELECT movie_id, 1 FROM ins1;