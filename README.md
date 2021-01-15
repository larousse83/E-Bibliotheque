# E-Bibliotheque

#### Installation du projet

    git clone https://github.com/larousse83/E-Bibliotheque.git
    cd E-Bibliotheque

##### Il est important d'avoir déjà composer d'installé 
https://getcomposer.org/


    composer install
  
#### Création de la BDD

    symfony console doctrine:database:create
    symfony console doctrine:migrations:migrate
###### Seulement pour avoir des données de test

    php bin/console doctrine:fixtures:load
   
##### Avoir npm ou yarn d'installé sur sa machine
npm :  https://docs.npmjs.com/
 
yarn : https://yarnpkg.com/
 
Pour npm taper :

    npm i 
Pour yarn taper:
 
    yarn install
  
#### Pour lancer l'application

    symfony serve -d
    symfony open:local
    npm run dev






 

    

