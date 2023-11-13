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

    Doctrine ORM documentation
    Symfony’s doctrine documentation

Twig :

    Twig documentation
    Symfony’s twig usages

Avantage de Twig = 
* syntaxe simplifiée. Au lieu d'écrire <?php echo $var ?> il suffit d'écrire {{var}}
- paramétrage de tâches réccurentes possible
   
   
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
Creating a new page - whether it's an HTML page or a JSON endpoint - is a two-step process:

1) Create a controller: A controller is the PHP function you write that builds the page. You take the incoming request information 
and use it to create a Symfony Response object, which can hold HTML content, a JSON string or even a binary file like an image or PDF;
2) Create a route: A route is the URL (e.g. /about) to your page and points to a controller.

Une ROUTE est définie dans une classe et commence par # :

    class HomeController extends AbstractController
    {
      #[Route('/')]
      public function home(): Response
    {
      return $this->render('home/index.html.twig', [
      'controller_name' => 'HomeController',
      ]);
      }
    }


Voir toutes mes routes : php bin/console debug:router
Ici :
create new quack = coinCoin/new
show all the quacks = coinCoin/quackList
show a quack = coinCoin/{id}
edit a quack = coinCoin/{id}/edit
delete a quack = coinCoin/{id}



Create a entity Quack defined by a "content : text" & "created_at : date time"

Lancer le server symfony => dans le terminal écrire   symfony server:start  puis faire entrée


Réaligner correctement les lignes de code :
ctrl + alt + L


https://symfony.com/doc/current/security.html#the-user
Créer une classe user : $ php bin/console make:user
Créer ou modifier une entité : $ php bin/console make:entity


MIGRATION :
https://symfony.com/doc/current/doctrine.html#doctrine-creating-the-database-tables-schema
Une fois la classe définie, je peux créer la migration qui va générer la requête SQL correspondante à l'insertion de la base de données correspondante :
$ php bin/console make:migration
PUIS
la migration permet de MAJ la BDD et de créer la table correspondante :
$ php bin/console doctrine:migrations:migrate



