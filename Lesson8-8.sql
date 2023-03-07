// пользовательская функция - количество избранных фильмов юзера по ID

CREATE FUNCTION favorite_movie_amount_by_user_id (userId INTEGER)
RETURNS BIGINT AS
$$
SELECT COUNT(movie_id) FROM favorites
WHERE user_id = userId
GROUP BY user_id LIMIT 1;;
$$

LANGUAGE SQL;

SELECT favorite_movie_amount_by_user_id(5);