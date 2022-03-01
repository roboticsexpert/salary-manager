#installation

first of you should have docker! 


1. login on the private registry and pull images (gitlab of our company)
   ```bash
   docker login registry.ecoex.ir
   ```
2. install composer packages for first time and anytime composer packages changes
   ```bash
   docker-compose run --rm web composer install
   ```

3. migrate database
   ```bash
   docker-compose run --rm migrate
   ```
1. start services
   ```bash
   docker-compose up -d
   ```
   > service are accessible at http://localhost:9000
   > database(mysql) is listening on 3306 (user: salary, pass: salary)

