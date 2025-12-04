# Proyecto Quacker
Proyecto de clases
## Requisitos previos y flujo de trabajo
### Generar y configurar clave SSH
1. Crear una clave SSH
```shell
ssh-keygen -t ed25519 -f ~/.ssh/id_ed25519_github -C "tu-correo@gmail.com"
```
2. Iniciar el agente SSH
```shell
eval "$(ssh-agent -s)"
```
3. Anadir la clave SSH
```shell
ssh-add ~/.ssh/id_ed25519_github
```
### Configurar SSH para que se anada la clave automaaticamente
1. Comprobar si existe un aconfiguracion de SSH
```shell
code ~/.ssh/config
```
Si no existe se crea manualmente y se anaden las siguientes lineas.
```shell
Host github.com
  IdentityFile ~/.ssh/id_ed25519_github
  AddKeysToAgent yes
```
### Anadir la clave SSH al github
```shell
cat ~/.ssh/id_ed25519_github.pub
```
Se copia el texto que sale en la terminal y se agrega al github
- En GitHub vas a Settings (Configuración) > SSH and GPG keys > New SSH key.
- Le pones un nombre cualquiera y pegas la clave en el campo de key
- Le das a Add SSH Key
### Comprobar que todo vaya bien
```shell
ssh -T git@github.com
```
Si te aparece el siguiente mensaje:
```shell
This key is not known by any other names.
Are you sure you want to continue connecting (yes/no/[fingerprint])?
```
debes de indicar "yes" y debes de obtener un input como el siguiente
```shell
Hi TuNombreDeUsuario! You've successfully authenticated, but GitHub does not provide shell access.
```
### Trabajar localmente
1. Clonar el repositorio
```shell
git clone git@github.com:BrknBlade/Quacker.git
```
2. Moverte a tu rama
```shell
git checkout nombre-de-tu-rama-personal
```
Posteriormente me encargare de hacer un merge de todas las ramas y resolver sus conflicots. Procurar
no hacer cambios muy grandes
# Como desplegar
1. Dentro del proyecto debes de ejecuatr los siguientes comandos:
```shell
composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

composer run dev
```
2. Haces los cambios que se te han solicitado y haces un push
```shell
git add .
git commint -m 'mensaje del commit'
git push origin nombre-de-tu-rama
```
