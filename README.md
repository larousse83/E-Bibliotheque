# E-Bibliotheque

#### Installation du projet
Lancer dans la console :

    git clone https://github.com/larousse83/E-Bibliotheque.git
    cd E-Bibliotheque

##### Il est important d'avoir déjà composer d'installé 
https://getcomposer.org/

Lancer dans la console :

    composer install
  
#### Création de la BDD
 
 Dans le fichier .env, decommanté la ligne choisi DATABASE_URL et compléter db_user et db_password 
 
 ```php
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/E-bibliotheque?serverVersion=5.7"
 ```     
Lancer dans la console :

    symfony console doctrine:database:create
    symfony console doctrine:migrations:migrate
###### Seulement pour avoir des données de test
Lancer dans la console :

    php bin/console doctrine:fixtures:load
   
##### Avoir npm ou yarn d'installé sur sa machine
npm :  https://docs.npmjs.com/
 
yarn : https://yarnpkg.com/
 
Pour npm taper dans la console :

    npm i 
Pour yarn taper dans la console :
 
    yarn install
 
#### Pour lancer l'application
Lancer dans la console :

    npm run dev
Ouvrir un autre console à la racine du projet et lancer :

    symfony serve -d
    symfony open:local
    
Trois jeux de test sont disponnible :

superAdmin@gmail.com , admin@gmail.com , test@gmail.com

mot de passe : admin






 

    

