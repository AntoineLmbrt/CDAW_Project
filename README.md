# CDAW PROJECT : Pokemon APP
Pokémon App est un site web de jeu de pokémon, dans laquelle vous pouvez avoir votre collection pokémon et jouer avec vos amis.

## Demonstration


https://user-images.githubusercontent.com/92015870/210328954-388953d7-4990-4198-8aa4-72b0175ace3b.mp4


## Installation
Here are the steps to follow to install the project:
- Clone the project
```bash
git clone https://github.com/AntoineLmbrt/CDAW_Project.git
```
- Make sure you are in the project directory Pokemon
```bash
cd CDAW_Project
cd pokemon
```
- Install the dependencies with composer
```bash
composer install
```
- Migrate the database
```bash
php artisan migrate
```
- Run the seeders
```bash
php artisan db:seed --class=EnergySeeder
php artisan db:seed --class=PokemonSeeder
```
- Run the Project
```bash
php artisan serve
```
## Collaborators

- [AntoineLmbrt](https://github.com/AntoineLmbrt)
- [El Mahdi OUKHAMOU](https://github.com/elmahdi43)
