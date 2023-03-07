// #1 сложный запрос с использованием подзапросов поиска фильмов и снявшихся в них актеров

SELECT 
movie_cast.id,
(SELECT movie.title FROM movie WHERE movie.id=movie_cast.movie_id) as movie_title,
(SELECT person.name FROM person WHERE person.id=movie_cast.person_id)
FROM movie_cast ORDER BY movie_title;

// #2 сложный запрос с использованием подзапросов поиска login полтзователя и название его избранных фильмов

SELECT id,
(SELECT users.login FROM users WHERE users.id=favorites.user_id) as user_login,
(SELECT movie.title FROM movie WHERE movie.id=favorites.movie_id) as movie_title
FROM favorites;