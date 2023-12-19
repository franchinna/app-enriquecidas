<?php
// Estos archivos de configuración deben solamente retornan un array asociativo con los valores en cuestión.
// Acá es donde normalmente se leen los valores del .env
// Dentro de Laravel, vamos a poder acceder a estos valores a través de la función config.
// En nuestro caso, para ejecutar código de configuración de clases para nuestro programa (como decirle a
// MercadoPago que éste es nuestro token), generalmente usamos algún ServiceProvider.
return [
    'access_token' => env('MERCADO_PAGO_CLIENT_SECRET', null)
];
