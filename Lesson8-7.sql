// представление - отображает количесво пользователей использующих тот или иной тарифный план

DROP VIEW price_plan_usage;

CREATE VIEW price_plan_usage AS
SELECT DISTINCT price_plan.id, price_plan.name, price_plan.price,
COUNT(price_plan.id) OVER (PARTITION BY users.price_plan_id) AS price_plan_count
FROM price_plan
LEFT JOIN users
ON users.price_plan_id = price_plan.id ORDER BY price_plan.id;

SELECT * FROM price_plan_usage;

// представление - количество фильмов по странам происхождения производственной компании

DROP VIEW movie_amount_produced_by_country;

CREATE VIEW movie_amount_produced_by_country AS
WITH production_company_movie AS(
SELECT DISTINCT
	COUNT(movie_production_company.movie_id) OVER (PARTITION BY production_company.id) AS movie_count,
	production_company.id,
	production_company.name,
	production_company.country_id
	FROM movie_production_company
	LEFT JOIN production_company
	ON production_company.id=movie_production_company.production_company_id 
	order by production_company.id)
SELECT DISTINCT country.id,
country.iso_code,
country.name,
SUM(production_company_movie.movie_count) OVER (PARTITION BY country.id) AS movie_sum
FROM country 
LEFT JOIN production_company_movie
ON production_company_movie.country_id=country.id ORDER BY country.id;

SELECT * FROM movie_amount_produced_by_country;