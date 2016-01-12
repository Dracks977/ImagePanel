# ImagePanel
Vous devez programmer un script générateur d'image. Celui-ci doit prendre en paramètre un lien vers une page html (locale ou sur internet), la parser pour récupérer toutes les images correspondantes aux critères qui suivent, puis générer une (ou plusieurs) méta-images représentant un panel ||, à la manière des "top friends" facebook. ||

N'oubliez pas de regarder la vidéo associée au projet avant de commencer.
La librairie gd est déjà installée sur OSX (la version de vos iMac)
Cet exercice ne sera pas corrigé par une moulinette, vous avez donc une certaine liberté pour tout ce qui est affichage, vous pouvez même ajouter des bonus, mais n'oubliez pas que le sujet doit quand même être respecté.
Le nom du binaire est : imagepanel.php
Les arguments du script

Le script fonctionne de la manière suivante :
php imagepanel.php [options] lien1 [lien2 [...]] base

Le script devra afficher le nombre d'images qu'il aura trouvé et utilisé sur la sortie standard.
Les options

Les options sont toujours placées avant les liens.

Option	Description
-g	La ou les images générées doivent être en GIF (.GIF ou .gif)
-j	La ou les images générées doivent être en JPEG (.JPEG, .jpeg, .JPG ou .jpg)
-l	L'argument suivant est le nombre maximum d'images incrustées dans la méta-image
-n	Afficher sous les images le nom de celles-ci (sans l'extension)
-N	Afficher sous les images le nom de celles-ci (avec l'extension)
-p	La ou les images générées doivent être en PNG (.PNG ou .png)
-s	Trier les images par ordre alphabétique
On peut bien évidemment combiner chaque option en faisant "-np" par exemple.
Pour les options de type, ou de limite, à vous de fixer vos propres valeurs par défaut lorsque celles-ci ne sont pas précisées.
Les liens

Au minimum un lien, pas de maximum
Un lien peut aussi bien être "http://www.google.com" que "../site_de_test/index.html"
Lorsque plusieurs liens sont fournis, le script doit collecter toutes les images de chacun des liens, puis les regrouper comme s'il ne s'agissait que d'un seul lien.
La base

La base est en fait la base du nom des images que le script va générer, c'est-à-dire sans l'extension (puisque celle-ci est gérée par les options). Voici un exemple explicite :

        $> php imagepanel.php -pl 20 ./mon_site/index.html mon_site
        63 images trouvees.
        $> ls
        imagepanel.php
        mon_site/
        mon_site.png
        mon_site2.png
        mon_site3.png
        mon_site4.png
        $>
      
Les images

Le but est de récupérer les vraies images à travers des regex obligatoirement, sans prendre en compte les images de fond. Pour cela, vous ne devez donc récupérer que les images provenant des balises <img>, et pour rendre le filtre un peu plus efficace, on va définir quelques règles, on ne récupère pas les images :

Qui contiennent le mot "background" dans leurs nom ou leurs path complet
Qui contiennent "_bg_" ou commencent par "bg_" ou finissent par "_bg"
Qui ne sont pas supportées par la librairie GD
Sur certains sites, on peut trouver "mon_image.jpg?w=200&h=100", ceci est correct, tout ce qui se trouve après le ? est considéré comme option.
attention à la casse, notamment pour les extensions des images. Vous devez récupérer aussi bien du .JPG que du .jpg (ou autres extensions)
Le rapport hauteur / largeur de chaque image doit être maintenu, attention lors de vos redimensionnements.
La gestion d'erreurs

Vous devez bien évidement gérer toutes les erreurs possibles, mais aucune liste d'erreurs possible ne vous est fournie. C'est à vous d'y penser. La règle à respecter est que vous devez afficher des messages d'erreurs clairs et compréhensibles par tous.
