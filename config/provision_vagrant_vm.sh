#!/bin/bash
export DEBIAN_FRONTEND=noninteractive # to avoid pw prompts, etc

apt-get update
apt-get install memcached mysql-client php5 php5-gd php5-json php5-memcached php5-mcrypt php5-mysql php5-dev php-pear make git php5-curl ruby1.9.1 rubygems1.9.1 ruby1.9.1-dev mysql-server curl -y
sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
mysql -uroot -e"CREATE DATABASE IF NOT EXISTS forge;"
mysql -uroot -e"CREATE USER 'forge'@'%';"
mysql -uroot -e"GRANT ALL PRIVILEGES ON *.* TO 'forge'@'%';"
service mysql restart
pecl install xdebug
echo "zend_extension=/usr/lib/php5/20121212/xdebug.so" >> /etc/php5/apache2/php.ini
echo "zend_extension=/usr/lib/php5/20121212/xdebug.so" >> /etc/php5/cli/php.ini
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
ln -s /vagrant/config/vagrant_virtualhost.conf /etc/apache2/sites-available/vagrant_virtualhost.conf
a2enmod rewrite
a2enmod ssl
a2ensite vagrant_virtualhost
php5enmod memcached
php5enmod mcrypt
service apache2 restart
sudo gem install bundler --no-ri --no-rdoc
cd /vagrant
bundle
composer install -n
php artisan migrate -n
