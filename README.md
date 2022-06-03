<p align="center"><img src="https://i.imgur.com/31YRPVd.png" alt="Bon Voyage" width="400"></p>

Proyecto web de reserva de vuelos para una pequeña aerolínea operativa en diferentes países. Proyecto realizado con fines educativos.

## Funcionalidades

- Apartado de noticias con los vuelos recientes
- Búsqueda de vuelos por cualquier concepto (Precio, destino, fecha, clase)
- Panel de administrador para publicación de nuevos vuelos
- Mensajería privada entre clientes y administradores para resolver dudas
- Check-in y cambio de silla visual
- Envío de correos electrónicos con información de pasabordo y compras
- Carrito de compras con vuelos seleccionados
- Reserva de tiquetes
- Diferentes roles de usuario (root, administrador, cliente, visitante)
- Pagos con tarjetas creadas dentro del sistema, para simular una pasarela de pagos. Admite tarjetas de crédito y débito
- Reserva y compra de tiquetes para múltiples pasajeros a la vez
- Diseño responsive con Tailwind 3
- Seeders con creación de países, ciudades, destinos, vuelos en fechas cercanas y cuentas de usuarios de prueba

## Instalación

Clonar el repositorio

`
git clone https://github.com/sort72/bon-voyage.git
`

Inicializar composer

`
composer install
`

Copiar el archivo .env.example y configurarlo con las credenciales necesarias (Principalmente para la conexión con la base de datos y de envío de correos electrónicos)

`
cp .env.example .env
`

Generar una nueva clave para la aplicación

`
php artisan key:generate
` 

Ejecutar las migraciones y los seeders

`
php artisan migrate --seed
`

Inicializar y correr npm

`
npm install && npm run prod
`

Con los pasos anteriores el proyecto estará listo para ser utilizado, si no se cuenta con un servidor apache, se puede ejecutar un servidor sobre la marcha con el comando

`
php artisan serve
`

## Usuarios de prueba

La aplicación crea tres usuarios diferentes con los roles existentes, se puede iniciar sesión utilizando las siguientes credenciales:

- Usuario root (Puede crear administradores): root@bon-voyage.com
- Usuario administrador (Puede crear vuelos): admin@bon-voyage.com
- Usuario cliente: cliente@bon-voyage.com

La contraseña para todos los usuarios es la misma: **password**

## Tecnologías utilizadas

- Laravel 8
- Tailwind 3
- Alpine js
- flatpickr

## Creditos

- [@sort72](https://github.com/sort72) - Alejandro Ortega
- [@ttatiana18](https://github.com/ttatiana18) - Nicole Rios
- [@JohanRestrepo19](https://github.com/JohanRestrepo19) - Johan Esteban Restrepo
- [@Lyzder](https://github.com/Lyzder) - Santiago Torres
- [@evelynrodriguez](https://github.com/evelynrodriguezc)
