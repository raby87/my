#!/bin/sh
version="5.0.9"

tar_file="redis-{$version}.tar.gz"
if [ ! -f "$tar_file" ]; then
  wget http://download.redis.io/releases/$tar_file
fi

tar -zxvf $tar_file
cd redis-$version
make && make install PREFIX=/usr/local/redis
cd ..
mv redis-$version /usr/local/redis-$version
cd /usr/local/redis/bin/
cp /usr/local/redis-$version/redis.conf /usr/local/redis/bin/
ln -s /usr/local/redis/bin/redis-cli /usr/bin/redis

./redis-server
