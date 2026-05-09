<?php
$choixPossible =  [ ['index'=>'0', 'title'=>'stop', 'description'=>'j\'ai fini, arreter le programme'],
                    ['index'=>'1', 'title'=>'user', 'description'=>'un utilisateur'],
                    ['index'=>'2', 'title'=>'product', 'description'=>'un produit'],
                    ['index'=>'3', 'title'=>'store', 'description'=>'un magasin'],
                    ['index'=>'4', 'title'=>'price', 'description'=>'un prix'],
                    ['index'=>'5', 'title'=>'ShoppingList', 'description'=>'une liste de course'],
                    ['index'=>'6', 'title'=>'ListItem', 'description'=>'une correspondance entre ShoppingList et product']];


/*echo"ce script à pour objectif d'ajouter du contenu en base de donnée vous pourrez ainsi ajouter:\n
    1. un utilisateur (user)\n
    2. un produit (product)\n
    3. un magasin (store)\n
    4. un prix (price)\n
    5. une liste de course (ShoppingList)\n
    6. un table de correspondance entre ShoppingList et product (ListItem)\n";
*/
while(true){
    echo"\n";
    foreach($choixPossible as $choix){
        echo $choix['index'].'. '. $choix['description'].' ('. $choix['title'].")\n";
    }
    $reponse = readline("que voulez vous ajouter en base de donnée? vous pouvez ecrire le chiffre de l'élément choisi : ");
    switch($reponse){
        case '0':
            echo $reponse;
            echo 'ok,arret du programme';exit;
            break;

        case '1'://user
            echo $reponse.'ok, vous souhaitez enregister user '."\n\n";
            $userName = readline("veuillez choisir votre nom d'utilisateur");
            $userEmail = readline("veuillez entrer votre adresse email");
            $userPass = readline("veuillez saisir votre mot de passe une premiére fois");
            $userPassVerif = readline("veuillez saisir votre mot de passe une seconde fois");
            $userTimestamp = new time("now", EUROPE);
            echo "enregistrement terminé : \n
                username = $userName\n
                email = $userEmail\n
                mot de passe : $userPass\n
                verification du mot de passe : $userPassVerif\n
                timestamp = $userTimestamp\n
                ";
                /*
                    user :
                        id : int (clé primaire)
                        username : varchar (unique)
                        email : varchar (unique)
                        password_hash : varchar
                        created_at : timestamp
                */
                //id généré automatiquement par la bdd
                while(true)
                {
                    $user['name'] = readline('username : ');
                    if(preg_match("", $user['name'])!= false)//filtre
                    {
                        break;//échapera au while ou au switch aussi? à verifier
                    }
                }
                
                $user['email'] = readline('username : ');
                $user['pswrd'] = readline('username : ');
                //$created_at=time();
            break;

        case '2'://product
            echo $reponse.'ok, vous souhaitez enregister product '."\n\n";
            
            break;

        case '3'://store
            echo $reponse.'ok, vous souhaitez enregister store '."\n\n";
            /*
                store:
                    id : int
                    name : varchar
                    brand : varchar //L'enseigne, utile pour filtrer tous les "Lidl" d'un coup
                    location_city :  varchar
                    location_lat : decimal (10,8)
                    location_long : decimal (11,8)
                    location_adress : text
            */
            break;

        case '4'://price
            echo $reponse.'ok, vous souhaitez enregister price '."\n\n";
            /*
                price:
                    id: BigInt(clé primaire)
                    product_id :Foreign Key (vers product)
                    store_id : Foreign Key (vers store)
                    price : decimal (10,2)//(Toujours utiliser Decimal pour l'argent, jamais Float)
                    currency : varchar // ex: EUR
                    observed_at : timestamp
            */
            break;

        case '5'://ShoppingList
            echo $reponse.'ok, vous souhaitez enregister ShoppingList '."\n\n";
            /*
                shoppingList:
                    id: int (clé primaire)
                    user_id : Foreign Key (vers user)
                    name : varchar //nom de la liste de course
                    created_at : timestamp
            */
            break;

        case '6'://ListItem
            echo $reponse.'ok, vous souhaitez enregister istItem '."\n\n";
            /*
                listItem:
                    id: int (cléPrimaire)
                    list_id : Foreign Key (vers ShoppingList)
                    product_id : Foreign Key (vers product)
                    quantity : int
                    is_bought : boolean //pour cocher les articles en magasin
            */
            break;
    }
}




