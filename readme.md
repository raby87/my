## php安装

rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
yum install php72w-common php72w-fpm php72w-opcache php72w-gd php72w-mysqlnd php72w-mbstring php72w-pecl-redis php72w-pecl-memcached php72w-devel

## 
将SELINUX=enforcing改为SELINUX=disabled并重启系统 就可以了

##
虚拟机和主机WIFI，必须在同一网段才能通信