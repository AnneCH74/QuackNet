# Symfony

#
🦆 Cahier des charges : QuackNet

Le projet QuackNet a vocation à être utilisé comme base à la réalisation de différents projets en PHP.

Ce document décrit les attentes fonctionnelles autour de cette interface. Il n’a pas vocation à être exhaustif et les fonctionnalités décrites dans ce document peuvent être complétées.

Le but de ce projet est de réaliser une interface de réseau social “twitter(x)-like” en ligne. Cette interface doit permettre à un canard de publier des coincoins en ligne.

  Un coincoin 💬 est une publication.

  Les canards 🦆 sont les utilisateurs.


Ressources

Symfony 6.3 :

    Symfony : getting started

Doctrine :

    Doctrine ORM documentation : https://www.doctrine-project.org/projects/doctrine-orm/en/2.16/index.html
    Symfony’s doctrine documentation

Twig :

    Twig documentation
    Symfony’s twig usages
  
   
Installer Symfony sur PHP Storm => https://symfony.com/doc/current/setup.html & https://symfony.com/download

Terminal :
curl -sS https://get.symfony.com/cli/installer | bash
  Puis
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
  Puis
sudo apt install symfony-cli
  Puis (SimpleXML extension)
sudo apt-get install php-xml
  Puis
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"


Create a first page in Symfony : https://symfony.com/doc/current/page_creation.html

