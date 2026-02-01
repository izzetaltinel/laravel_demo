docker container prune
docker volume prune

docker exec -it app-php bash
chown -R www-data:www-data storage bootstrap/cache && chmod -R ug+rwX storage bootstrap/cache


sudo chown -R $USER:$USER storage bootstrap/cache
chmod -R ug+rwX storage bootstrap/cache
