ALTER TABLE country_movie
ADD CONSTRAINT country_movie_country_id_fk
FOREIGN KEY (country_id)
REFERENCES country (id)
ON DELETE CASCADE;

ALTER TABLE country_movie
ADD CONSTRAINT country_movie_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE favorites
ADD CONSTRAINT favorites_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE favorites
ADD CONSTRAINT favorites_user_id_fk
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE CASCADE;

ALTER TABLE genre_movie
ADD CONSTRAINT genre_movie_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE genre_movie
ADD CONSTRAINT genre_movie_genre_id_fk
FOREIGN KEY (genre_id)
REFERENCES genre (id)
ON DELETE CASCADE;

ALTER TABLE users
ADD CONSTRAINT users_price_plan_id_fk
FOREIGN KEY (price_plan_id)
REFERENCES price_plan (id)
ON DELETE CASCADE;

ALTER TABLE production_company
ADD CONSTRAINT production_company_country_id_fk
FOREIGN KEY (country_id)
REFERENCES country (id)
ON DELETE CASCADE;

ALTER TABLE movie_production_company
ADD CONSTRAINT movie_production_company_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE movie_production_company
ADD CONSTRAINT movie_production_company_production_company_id_fk
FOREIGN KEY (production_company_id)
REFERENCES production_company (id)
ON DELETE CASCADE;

ALTER TABLE movie_cast
ADD CONSTRAINT movie_cast_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE movie_cast
ADD CONSTRAINT movie_cast_person_id_fk
FOREIGN KEY (person_id)
REFERENCES person (id)
ON DELETE CASCADE;

ALTER TABLE movie_cast
ADD CONSTRAINT movie_cast_gender_id_fk
FOREIGN KEY (gender_id)
REFERENCES gender (id)
ON DELETE CASCADE;

ALTER TABLE movie_crew
ADD CONSTRAINT movie_crew_movie_id_fk
FOREIGN KEY (movie_id)
REFERENCES movie (id)
ON DELETE CASCADE;

ALTER TABLE movie_crew
ADD CONSTRAINT movie_crew_person_id_fk
FOREIGN KEY (person_id)
REFERENCES person (id)
ON DELETE CASCADE;

ALTER TABLE movie_crew
ADD CONSTRAINT movie_crew_department_id_fk
FOREIGN KEY (department_id)
REFERENCES department (id)
ON DELETE CASCADE;