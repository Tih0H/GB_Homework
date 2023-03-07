EXPLAIN ANALYZE SELECT DISTINCT
person.id,
person.name,
AVG(movie.popularity_kinopoisk) OVER (PARTITION BY person.id) AS kinopoisk_avg,
AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS imdb_avg,
AVG(movie.popularity_kinopoisk)+AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS rate_avg
FROM person
LEFT JOIN movie_cast
ON movie_cast.person_id=person.id
LEFT JOIN movie ON movie.id=movie_cast.movie_id
 GROUP by person.id,movie.popularity_kinopoisk,movie.popularity_imdb  order by rate_avg DESC;



"Unique  (cost=27.19..28.69 rows=100 width=121) (actual time=2.506..2.696 rows=152 loops=1)"
"  ->  Sort  (cost=27.19..27.44 rows=100 width=121) (actual time=2.504..2.545 rows=163 loops=1)"
"        Sort Key: (((avg(movie.popularity_kinopoisk)) + avg(movie.popularity_imdb) OVER (?))) DESC, person.id, person.name, (avg(movie.popularity_kinopoisk) OVER (?)), (avg(movie.popularity_imdb) OVER (?))"
"        Sort Method: quicksort  Memory: 39kB"
"        ->  WindowAgg  (cost=19.37..23.87 rows=100 width=121) (actual time=0.940..2.073 rows=163 loops=1)"
"              ->  GroupAggregate  (cost=19.37..21.87 rows=100 width=57) (actual time=0.890..1.392 rows=163 loops=1)"
"                    Group Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                    ->  Sort  (cost=19.37..19.62 rows=100 width=25) (actual time=0.874..0.922 rows=172 loops=1)"
"                          Sort Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                          Sort Method: quicksort  Memory: 37kB"
"                          ->  Hash Left Join  (cost=13.50..16.05 rows=100 width=25) (actual time=0.381..0.654 rows=172 loops=1)"
"                                Hash Cond: (movie_cast.movie_id = movie.id)"
"                                ->  Hash Right Join  (cost=3.25..5.52 rows=100 width=21) (actual time=0.179..0.340 rows=172 loops=1)"
"                                      Hash Cond: (movie_cast.person_id = person.id)"
"                                      ->  Seq Scan on movie_cast  (cost=0.00..2.00 rows=100 width=8) (actual time=0.010..0.038 rows=100 loops=1)"
"                                      ->  Hash  (cost=2.00..2.00 rows=100 width=17) (actual time=0.102..0.104 rows=100 loops=1)"
"                                            Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                            ->  Seq Scan on person  (cost=0.00..2.00 rows=100 width=17) (actual time=0.015..0.038 rows=100 loops=1)"
"                                ->  Hash  (cost=9.00..9.00 rows=100 width=12) (actual time=0.163..0.163 rows=101 loops=1)"
"                                      Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                      ->  Seq Scan on movie  (cost=0.00..9.00 rows=100 width=12) (actual time=0.011..0.087 rows=101 loops=1)"
"Planning Time: 1.994 ms"
"Execution Time: 2.961 ms"


// создаю индексы 

CREATE INDEX movie_cast_person_id_idx ON movie_cast (person_id);
CREATE INDEX movie_cast_movie_id_idx ON movie_cast (movie_id);

"Unique  (cost=27.19..28.69 rows=100 width=121) (actual time=2.231..2.421 rows=152 loops=1)"
"  ->  Sort  (cost=27.19..27.44 rows=100 width=121) (actual time=2.230..2.270 rows=163 loops=1)"
"        Sort Key: (((avg(movie.popularity_kinopoisk)) + avg(movie.popularity_imdb) OVER (?))) DESC, person.id, person.name, (avg(movie.popularity_kinopoisk) OVER (?)), (avg(movie.popularity_imdb) OVER (?))"
"        Sort Method: quicksort  Memory: 39kB"
"        ->  WindowAgg  (cost=19.37..23.87 rows=100 width=121) (actual time=0.766..1.881 rows=163 loops=1)"
"              ->  GroupAggregate  (cost=19.37..21.87 rows=100 width=57) (actual time=0.735..1.232 rows=163 loops=1)"
"                    Group Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                    ->  Sort  (cost=19.37..19.62 rows=100 width=25) (actual time=0.720..0.769 rows=172 loops=1)"
"                          Sort Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                          Sort Method: quicksort  Memory: 37kB"
"                          ->  Hash Left Join  (cost=13.50..16.05 rows=100 width=25) (actual time=0.272..0.542 rows=172 loops=1)"
"                                Hash Cond: (movie_cast.movie_id = movie.id)"
"                                ->  Hash Right Join  (cost=3.25..5.52 rows=100 width=21) (actual time=0.118..0.278 rows=172 loops=1)"
"                                      Hash Cond: (movie_cast.person_id = person.id)"
"                                      ->  Seq Scan on movie_cast  (cost=0.00..2.00 rows=100 width=8) (actual time=0.010..0.038 rows=100 loops=1)"
"                                      ->  Hash  (cost=2.00..2.00 rows=100 width=17) (actual time=0.093..0.094 rows=100 loops=1)"
"                                            Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                            ->  Seq Scan on person  (cost=0.00..2.00 rows=100 width=17) (actual time=0.021..0.044 rows=100 loops=1)"
"                                ->  Hash  (cost=9.00..9.00 rows=100 width=12) (actual time=0.144..0.144 rows=101 loops=1)"
"                                      Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                      ->  Seq Scan on movie  (cost=0.00..9.00 rows=100 width=12) (actual time=0.011..0.084 rows=101 loops=1)"
"Planning Time: 1.249 ms"
"Execution Time: 2.645 ms"

// так как эффект от индексов не значителен убераю вычисдение срудних значений

EXPLAIN ANALYZE SELECT DISTINCT
person.id,
person.name,
AVG(movie.popularity_kinopoisk)+AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS rate_avg
FROM person
LEFT JOIN movie_cast
ON movie_cast.person_id=person.id
LEFT JOIN movie ON movie.id=movie_cast.movie_id
 GROUP by person.id,movie.popularity_kinopoisk,movie.popularity_imdb  order by rate_avg DESC;

"Unique  (cost=26.94..27.94 rows=100 width=57) (actual time=2.131..2.276 rows=152 loops=1)"
"  ->  Sort  (cost=26.94..27.19 rows=100 width=57) (actual time=2.129..2.170 rows=163 loops=1)"
"        Sort Key: (((avg(movie.popularity_kinopoisk)) + avg(movie.popularity_imdb) OVER (?))) DESC, person.id, person.name"
"        Sort Method: quicksort  Memory: 37kB"
"        ->  WindowAgg  (cost=19.37..23.62 rows=100 width=57) (actual time=0.776..1.819 rows=163 loops=1)"
"              ->  GroupAggregate  (cost=19.37..21.87 rows=100 width=57) (actual time=0.745..1.243 rows=163 loops=1)"
"                    Group Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                    ->  Sort  (cost=19.37..19.62 rows=100 width=25) (actual time=0.728..0.776 rows=172 loops=1)"
"                          Sort Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                          Sort Method: quicksort  Memory: 37kB"
"                          ->  Hash Left Join  (cost=13.50..16.05 rows=100 width=25) (actual time=0.280..0.551 rows=172 loops=1)"
"                                Hash Cond: (movie_cast.movie_id = movie.id)"
"                                ->  Hash Right Join  (cost=3.25..5.52 rows=100 width=21) (actual time=0.124..0.285 rows=172 loops=1)"
"                                      Hash Cond: (movie_cast.person_id = person.id)"
"                                      ->  Seq Scan on movie_cast  (cost=0.00..2.00 rows=100 width=8) (actual time=0.010..0.038 rows=100 loops=1)"
"                                      ->  Hash  (cost=2.00..2.00 rows=100 width=17) (actual time=0.098..0.099 rows=100 loops=1)"
"                                            Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                            ->  Seq Scan on person  (cost=0.00..2.00 rows=100 width=17) (actual time=0.026..0.050 rows=100 loops=1)"
"                                ->  Hash  (cost=9.00..9.00 rows=100 width=12) (actual time=0.146..0.146 rows=101 loops=1)"
"                                      Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                      ->  Seq Scan on movie  (cost=0.00..9.00 rows=100 width=12) (actual time=0.012..0.086 rows=101 loops=1)"
"Planning Time: 1.333 ms"
"Execution Time: 2.484 ms"

// добавил индексы на popularity_imdb и popularity_kinopoisk и изменил запрос

CREATE INDEX movie_popularity_imdb_idx ON movie (popularity_imdb);
CREATE INDEX movie_popularity_kinopoisk_idx ON movie (popularity_kinopoisk);

EXPLAIN ANALYZE SELECT DISTINCT
person.id,
person.name,
AVG(movie.popularity_kinopoisk)+AVG(movie.popularity_imdb) OVER (PARTITION BY person.id) AS rate_avg
FROM movie_cast
LEFT JOIN person
ON person.id=movie_cast.person_id
LEFT JOIN movie 
ON movie.id=movie_cast.movie_id
GROUP by person.id, movie.popularity_kinopoisk, movie.popularity_imdb  order by rate_avg DESC;

 "Unique  (cost=26.96..27.96 rows=100 width=57) (actual time=1.466..1.554 rows=80 loops=1)"
"  ->  Sort  (cost=26.96..27.21 rows=100 width=57) (actual time=1.465..1.490 rows=91 loops=1)"
"        Sort Key: (((avg(movie.popularity_kinopoisk)) + avg(movie.popularity_imdb) OVER (?))) DESC, person.id, person.name"
"        Sort Method: quicksort  Memory: 32kB"
"        ->  WindowAgg  (cost=19.39..23.64 rows=100 width=57) (actual time=0.655..1.292 rows=91 loops=1)"
"              ->  GroupAggregate  (cost=19.39..21.89 rows=100 width=57) (actual time=0.624..0.947 rows=91 loops=1)"
"                    Group Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                    ->  Sort  (cost=19.39..19.64 rows=100 width=25) (actual time=0.602..0.632 rows=100 loops=1)"
"                          Sort Key: person.id, movie.popularity_kinopoisk, movie.popularity_imdb"
"                          Sort Method: quicksort  Memory: 32kB"
"                          ->  Hash Left Join  (cost=13.52..16.07 rows=100 width=25) (actual time=0.288..0.491 rows=100 loops=1)"
"                                Hash Cond: (movie_cast.movie_id = movie.id)"
"                                ->  Hash Left Join  (cost=3.25..5.52 rows=100 width=21) (actual time=0.130..0.251 rows=100 loops=1)"
"                                      Hash Cond: (movie_cast.person_id = person.id)"
"                                      ->  Seq Scan on movie_cast  (cost=0.00..2.00 rows=100 width=8) (actual time=0.028..0.056 rows=100 loops=1)"
"                                      ->  Hash  (cost=2.00..2.00 rows=100 width=17) (actual time=0.084..0.085 rows=100 loops=1)"
"                                            Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                            ->  Seq Scan on person  (cost=0.00..2.00 rows=100 width=17) (actual time=0.011..0.035 rows=100 loops=1)"
"                                ->  Hash  (cost=9.01..9.01 rows=101 width=12) (actual time=0.148..0.149 rows=101 loops=1)"
"                                      Buckets: 1024  Batches: 1  Memory Usage: 13kB"
"                                      ->  Seq Scan on movie  (cost=0.00..9.01 rows=101 width=12) (actual time=0.011..0.086 rows=101 loops=1)"
"Planning Time: 1.322 ms"
"Execution Time: 1.744 ms"