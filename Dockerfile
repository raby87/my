FROM skiychan/nginx-php7:latest

WORKDIR /laravel

COPY . .

RUN ln -s /usr/local/php/bin/php  /usr/local/bin/php

RUN yum install git
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer install



RUN git clone https://github.com/laravel/laravel.git

CMD ["/bin/sh","/start.sh"]