// сложный запрос с использованием объединения JOIN - количество фильмов снятых в каждом из жанров 
SELECT DISTINCT
genre.id,
genre.name,
Count(genre_movie.genre_id) OVER (PARTITION BY genre.id) AS
genre_count
FROM genre
LEFT JOIN genre_movie
ON genre_movie.genre_id = genre.id order by genre_count DESC;


// сложный запрос с использованием объединения JOIN - поиск актера снявшегося в популярном фильме (сумма средних двух рейтингов)

SELECT DISTINCT
person.id,
person.name,
AVG(movie.popularity_kinopoisk) OVER (PARTITION BY person.id) AS kinopoisk_avg,
AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS imdb_avg,
AVG(movie.popularity_kinopoisk)+AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS rate_avg
FROM person
LEFT JOIN movie_cast
ON movie_cast.person_id=person.id
LEFT JOIN movie ON movie.id=movie_cast.movie_id GROUP by person.id,movie.popularity_kinopoisk,movie.popularity_imdb  order by rate_avg DESC;
