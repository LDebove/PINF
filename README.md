# PINF
Projet Informatique LE2 !

# TUTO GITHUB
_______________________________________________________________
### Première utilisation
###### Installation du dossier de GitHub dans le répertoire courant
git clone https://github.com/LDebove/PINF.git

### Après avoir cloné les fichier/dossiers
###### se placer dans le bon dossier
cd cheminAModifier/PINF
###### après avoir modifié un fichier
git commit -a -m "message résumant ce que vous avez fait"
###### après avoir créé un dossier/fichier dans le dossier principal (PINF)
git add .
###### envoyer les modification sur GitHub (VOIR EN BAS SI ERREUR)
git push origin master

### Quand vous voulez synchroniser vos fichiers avec ceux de GitHub
###### Pour synchroniser vos fichiers avec le dossier de GitHub
git  pull

### Gestion des branches
###### Créer une nouvelle branche
git branch nomBranche
###### Créer une nouvelle branche et s'y positionner
git checkout -b nomBranche
###### Se placer dans une branche déjà existante du répertoire
git checkout nomBranche
###### Fusionner deux branches (B -> A) (A = A + B) (en s'étant placé dans la brancheA)
git merge brancheB

### Utile
###### afficher les log
git log
###### afficher le status
git status

### Si vous avez une erreur
###### enregistrer votre travail
git commit -a -m "message résumant ce que vous avez fait"
###### synchroniser votre travail
git pull
###### envoyer les modification sur GitHub
git push origin master
