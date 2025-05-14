setup:
	#cp ./src/workshop/.env.example ./src/workshop/.env
	docker compose build
	docker compose up -d
	docker exec workshop /bin/sh -c "composer install && npm install && chmod -R guo+w storage && php artisan key:generate"
	#cp ./src/pmw/.env.example ./src/pmw/.env
	docker exec pmw /bin/sh -c "composer install && npm install && chmod -R guo+w storage && php artisan key:generate"

setup-db:
	#cp ./src/backend/.env.example ./src/backend/.env
	#cp ./src/workshop/.env.example ./src/workshop/.env
	#cp ./src/pmw/.env.example ./src/pmw/.env
	docker compose build
	docker compose up -d
	docker exec workshop /bin/sh -c "composer install && npm install && chmod -R guo+w storage && php artisan key:generate && php artisan migrate:fresh"
	docker exec pmw /bin/sh -c "composer install && npm install && chmod -R guo+w storage && php artisan key:generate && php artisan migrate:fresh"
	docker exec -i mysql_workshop mysql -u wirausaha -pKewirausahaan2025 pmw < src/workshop/database/seeders/students.sql
	docker exec -i mysql_pmw mysql -u wirausaha -pKewirausahaan2025 pmw < src/pmw/database/seeders/output.sql
	docker exec -i mysql_pmw mysql -u wirausaha -pKewirausahaan2025 pmw < src/pmw/database/seeders/students.sql
  
run-app:
	docker compose up -d

kill-app:
	docker compose down -v

nginx:
	docker exec -it nginx /bin/sh

workshop:
	docker exec -it workshop /bin/sh

pmw:
	docker exec -it pmw /bin/sh

mysql-workshop:
	docker exec -it mysql_workshop /bin/sh

mysql-pmw:
	docker exec -it mysql_pekan_mahasiswa_wirausaha /bin/sh

flush-db:
	docker exec workshop /bin/sh -c "php artisan migrate:fresh"
	docker exec pmw /bin/sh -c "php artisan migrate:fresh"

flush-db-seed:
	docker exec workshop /bin/sh -c "php artisan migrate:fresh --seed"
	docker exec pmw /bin/sh -c "php artisan migrate:fresh --seed"

code-check:
	docker exec workshop /bin/sh -c "npm run format:check"
	docker exec pmw /bin/sh -c "npm run format:check"  

code-format:
	docker exec workshop /bin/sh -c "npm run format"
	doker exec pmw /bin/sh -c "npm run format"

code-test:
	docker exec workshop /bin/sh -c "php artisan test"
	docker exec pmw /bin/sh -c "php artisan test"

restart:
	docker compose down -v
	docker compose up -d
