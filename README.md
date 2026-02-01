# Proyecto Quacker
Proyecto de clases.
## Como desplegar
1. Dentro del proyecto debes de ejecuatar el siguiente comando:
```bash
composer setup
```

Las credenciales del usuario de prueba son:
```
mail: ignacio@email.com
password: amoelmvc
```
Puedes crear tu propio usuario si asi lo deseas.

2. **Si estas desarrollando** Haces los cambios que se te han solicitado y haces un push
```bash
git add .
git commint -m 'mensaje del commit'
git push origin nombre-de-tu-rama
```
# Desarrollar Quacker
## Requisitos previos y flujo de trabajo
### Generar y configurar clave SSH
1. Crear una clave SSH
```bash
ssh-keygen -t ed25519 -f ~/.ssh/id_ed25519_github -C "tu-correo@gmail.com"
```
2. Iniciar el agente SSH
```bash
eval "$(ssh-agent -s)"
```
3. Anadir la clave SSH
```bash
ssh-add ~/.ssh/id_ed25519_github
```
### Configurar SSH para que se anada la clave automaaticamente
1. Comprobar si existe un aconfiguracion de SSH
```bash
code ~/.ssh/config
```
Si no existe se crea manualmente y se anaden las siguientes lineas.
```bash
Host github.com
  IdentityFile ~/.ssh/id_ed25519_github
  AddKeysToAgent yes
```
### Anadir la clave SSH al github
```bash
cat ~/.ssh/id_ed25519_github.pub
```
Se copia el texto que sale en la terminal y se agrega al github
- En GitHub vas a Settings (Configuración) > SSH and GPG keys > New SSH key.
- Le pones un nombre cualquiera y pegas la clave en el campo de key
- Le das a Add SSH Key
### Comprobar que todo vaya bien
```bash
ssh -T git@github.com
```
Si te aparece el siguiente mensaje:
```bash
This key is not known by any other names.
Are you sure you want to continue connecting (yes/no/[fingerprint])?
```
debes de indicar "yes" y debes de obtener un input como el siguiente
```bash
Hi TuNombreDeUsuario! You've successfully authenticated, but GitHub does not provide shell access.
```
### Trabajar localmente
1. Clonar el repositorio
```bash
git clone git@github.com:BrknBlade/Quacker.git
```
2. Moverte a tu rama
```bash
git checkout nombre-de-tu-rama-personal
```
Posteriormente me encargare de hacer un merge de todas las ramas y resolver sus conflicots. Procurar
no hacer cambios muy grandes
