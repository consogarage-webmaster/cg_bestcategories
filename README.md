# cg_bestcategories Module

## Description
Le module `cg_bestcategories` permet d'afficher certaines catégories sur la page d'accueil de votre boutique PrestaShop. Il offre une interface dans le back-office pour sélectionner les catégories à afficher à l'aide de cases à cocher.

## Fonctionnalités
- Sélection des catégories à afficher sur la page d'accueil via une interface conviviale dans le back-office.
- Affichage des catégories sélectionnées avec leur titre (lien) et leur image sur la page d'accueil.
- Utilisation de hooks pour intégrer facilement le module dans le système de PrestaShop.

## Installation
1. Téléchargez le module `cg_bestcategories`.
2. Décompressez le fichier dans le répertoire `modules` de votre installation PrestaShop.
3. Connectez-vous à votre back-office PrestaShop.
4. Allez dans la section "Modules" et recherchez `cg_bestcategories`.
5. Cliquez sur "Installer" pour activer le module.

## Configuration
Après l'installation, vous pouvez configurer le module en suivant ces étapes :
1. Accédez à la section "Modules" dans le back-office.
2. Trouvez `cg_bestcategories` et cliquez sur "Configurer".
3. Sélectionnez les catégories que vous souhaitez afficher sur la page d'accueil à l'aide des cases à cocher.
4. Enregistrez vos modifications.

## Utilisation
Une fois configuré, le module affichera automatiquement les catégories sélectionnées sur la page d'accueil de votre boutique.

## Développement
Le module est développé en suivant les meilleures pratiques de PrestaShop. Les fichiers principaux incluent :
- `src/cg_bestcategories.php`: Point d'entrée du module.
- `src/Controller/AdminBestCategoriesController.php`: Gestion de l'interface du back-office.
- `src/Form/CategorySelectionType.php`: Formulaire de sélection des catégories.
- `src/Hook/DisplayHomeHook.php`: Gestion de l'affichage sur la page d'accueil.
- `views/templates/hook/displayHome.tpl`: Template pour l'affichage des catégories.
- `views/templates/admin/configure.tpl`: Template pour la configuration dans le back-office.

## Traductions
Le module inclut des traductions en français, disponibles dans le fichier `translations/fr.php`.

## Support
Pour toute question ou problème, veuillez contacter le support technique ou consulter la documentation de PrestaShop.