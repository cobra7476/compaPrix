Comment on va bosser à partir de maintenant (En toute sécurité)
Pour éviter de te taper la tête contre les murs et avancer sereinement, on va zapper complètement les commandes make:migration et doctrine:migrations:migrate. On va utiliser le combo suivant :

Quand tu ajoutes ou modifies une table (entité) :
Tu utilises l'assistant classique comme tu sais le faire : php bin/console make:entity.

Pour envoyer les modifications à MySQL sans perdre tes données :
Tu tapes directement :

Bash
php bin/console doctrine:schema:update --force
💡 Pourquoi cette commande est magique et sûre pour tes données ?
Contrairement à ce qu'on a fait tout à l'air (le database:drop), le schema:update est ultra intelligent :

Si tu as créé une nouvelle entité, il va juste faire un CREATE TABLE pour l'ajouter.

Si tu as ajouté un champ (par exemple, un champ description dans Product), il va faire un ALTER TABLE ... ADD description sans toucher au reste des colonnes ni effacer les produits que tu as déjà saisis.

Si tu n'as rien changé à ton code, il te dira juste Nothing to update.

Bref, c'est la commande parfaite pour le développement local quand les outils de migration buggent sous Windows.

Maintenant que la base est 100 % stable et que tu as la méthode safe pour la faire évoluer, par quoi tu veux commencer ? On crée un contrôleur pour afficher une première page, ou on s'attaque à l'entité User ?