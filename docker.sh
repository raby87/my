#!/bin/sh
product_dir=/www/web

docker stop c_web
docker rm c_web
docker build -t web .

docker run --name c_web -d -p 81:80 -v ${product_dir}:${product_dir} /bin/bash

docker exec -it c_web /bin/bash