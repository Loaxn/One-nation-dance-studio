## url du site: https://chalach.butmmi.o2switch.site/resaweb/

## Description complète de la procédure à faire pour réinstaller le site et la base de données sur un serveur local XAMPP:

Clonez le dépôt du site à partir de GitHub ou extrayez le contenu du fichier ZIP sur votre machine locale.

Démarrez le serveur Apache et MySQL dans XAMPP.

Ouvrez un navigateur web et accédez à [http://localhost/phpmyadmin] pour accéder à l'interface de gestion de la base de données.

Créez une nouvelle base de données vide avec un nom de votre choix (par exemple, pour mon cas c'etait base_resaweb).

Exporter le fichier de sauvegarde de la base de données (fichier SQL) dans la base de données nouvellement créée. Vous pouvez trouver le fichier de sauvegarde dans le meme dossier ou vous avez trouvé ce README.md.

Dans phpmyadmin cliquez sur l'onglet "Importer" dans la barre de navigation supérieure.
Cliquez sur le bouton "Choose File" et sélectionnez le fichier de sauvegarde SQL.
Cliquez sur le bouton "Importer" pour importer les données dans la base de données.

Déplacez le contenu du répertoire du site (les fichiers PHP, JS, CSS, etc.) dans le répertoire htdocs de votre installation XAMPP. Le chemin typique du répertoire htdocs est "C:\xampp\htdocs" sur Windows.

Par la suite , il est important de s'assurer que les informations de connexion à la base de données dans votre site sont correctement configurées pour correspondre à la configuration locale: 
exemple : $db = new PDO('mysql:host=localhost;dbname=base_resaweb;port=3306', 'root', '');
et pour o2switch il y a differents changement: $db = new PDO('mysql:host=localhost;dbname=chalach_base_resaweb;port=3306', 'chalach', '77TShRTfS9D9zUY');

Lancez un navigateur web et accédez à l'URL locale correspondant au répertoire du site dans le répertoire htdocs. Par exemple, si vous avez placé les fichiers du site dans un dossier nommé "base_resaweb" dans le répertoire htdocs, l'URL locale peut être [http://localhost/phpmyadmin/index.php?route=/database/structure&db=base_resaweb].

Vous devriez maintenant voir le site web et pouvoir l'utiliser localement sur votre machine avec la base de données réinstallée.

