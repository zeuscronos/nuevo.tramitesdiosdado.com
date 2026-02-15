<?php

if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $regexp = str_replace('\\\\', '\\', $_POST['regexp']);
    $content = file_get_contents($url);
    preg_match('/' . $regexp . '/m', $content, $matches);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($matches, JSON_PRETTY_PRINT);
} else {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Compras Pa Cuba - Bot</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" />
<style>
body {
    font-family: 'Nunito', sans-serif;
    font-size: 14px;
}
table#log, table#log tr { border-collapse: collapse; }
table#log td.time { background-color: #dee9ff; }
table#log tr.request td.message { background-color: #fff3c1; }
table#log tr.response td.message { background-color: #cfffcf; }
table#log tr.info td.message { background-color: #ffd7d7; }
table#log td { padding: 4px 12px; }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

let botToken = '2006502700:AAGCnlTHHj_FRdU9VG9I7yNO__hrY-zRbZE';
// let chatId = '1304313063'; // Angel (for debugging)
let chatId = '-644356809'; // Negocios

let LOG_TYPE_REQUEST = 'request';
let LOG_TYPE_RESPONSE = 'response';
let LOG_TYPE_INFO = 'info';
// let periodInSeconds = 5; // 5 seconds (for debugging)
let periodInSeconds = 180; // 1 minute

let items = [
    {
        name: 'Mascarillas',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2540&id_producto=27289',
        available: undefined,
    },
    {
        name: 'Barniz',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2131&id_producto=27785',
        available: undefined,
    },
    {
        name: 'Barniz sintético para exteriores',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2718&id_producto=27785',
        available: undefined,
    },
    {
        name: 'Refresco TuKola - Ciego Montero',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21183',
        available: undefined,
    },
    {
        name: 'Refresco Naranja - Ciego Montero',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21184',
        available: undefined,
    },
    {
        name: 'Refresco Limón - Ciego Montero',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21185',

        available: undefined,
    },
    {
        name: 'Refresco Piña - Ciego Montero',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21204',
        available: undefined,
    },
    {
        name: 'Refresco Fiesta Cola',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21223',
        available: undefined,
    },
    {
        name: 'Refresco Naranja - Dely',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=27727',
        available: undefined,
    },
    {
        name: 'Refresco Pomito Cola',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21116',
        available: undefined,
    },
    {
        name: 'Refresco Pomito Limón',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21114',
        available: undefined,
    },
    {
        name: 'Refresco Pomito Naranja',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21115',
        available: undefined,
    },
    {
        name: 'Esmalte - Blanco',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2131&id_producto=26999',
        available: undefined,
    },
    /*
    {
        name: 'Esmalte - Negro',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2131&id_producto=25901',
        available: undefined,
    },
    */
    {
        name: 'Velas Bujías',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1206&id_producto=25275',
        available: undefined,
    },
    {
        name: 'Olla Reina',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=22&id_producto=18749',
        available: undefined,
    },
    {
        name: 'Olla Reina (recogida por el cliente)',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=22&id_producto=18750',
        available: undefined,
    },
    {
        name: 'Ventilador de Pie',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=22&id_producto=20764',
        available: undefined,
    },
    /*
    {
        name: 'Televisor ATEC 32"',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=22&id_producto=27062',
        available: undefined,
    },
    */
    {
        name: 'Óxido Gris',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2261&id_producto=31580',
        available: undefined,
    },
    {
        name: 'Diluyente',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2261&id_producto=30485',
        available: undefined,
    },
    {
        name: 'Olla Arrocera',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2585&id_producto=18751',
        available: undefined,
    },
    {
        name: 'Esmalte Blanco 4.4 L',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=2261&id_producto=31745',
        available: undefined,
    },
    {
        name: 'Producto Por Nombrar 1',
        url: 'https://www.bazar-virtual.ca/prod_detalle.php?id_dpto=1379&id_producto=21114',
        available: undefined,
    },
];

// window.lengths = []; // for debugging

$(function(){
    send_telegram_message('☀️🔆 Acabo de Reiniciarme 🔆☀️');
    check_availability();
    setInterval(function(){
        check_availability();
    }, periodInSeconds * 1000);
});
function check_availability() {
    for (let item of items) {
        log(`Chequeando: ${item.name}`, LOG_TYPE_REQUEST);
        $.post('/robot', {
            url: item.url,
            regexp: '<li>[\\s\\t]*(Cantidad)[\\s\\t]*<\\/li>',
        }, 'json').done(function (response) {
            // const available = (lengths[item.url] === true); // for debugging
            const available = (response.length > 0);
            let message;
            if (item.available !== available) {
                if (available) {
                    if (item.available === undefined) {
                        message = `🥳🥳🥳 Hay disponible: <b>${item.name}</b>`;
                    } else {
                        message = `🥳🥳🥳 Acaban de sacar: <b>${item.name}</b>`;
                    }
                } else {
                    if (item.available) {
                        message = `😡😡😡 Se acabó: <b>${item.name}</b>`;
                    }
                }
                item.available = available;
                if (message) {
                    log(message, LOG_TYPE_RESPONSE);
                    message += ` | ${item.url}`;
                    send_telegram_message(message);
                }
            }
        });
    }
}
function send_telegram_message(message) {
    // Reference: https://core.telegram.org/bots/api#sendmessage
    $.post(`https://api.telegram.org/bot${botToken}/sendMessage`, {
        chat_id: chatId,
        text: message,
        parse_mode: 'html',
        disable_web_page_preview: true,
    }).done(function() {
        log(`Notificación enviada al grupo de Telegram.`, LOG_TYPE_INFO);
    });
}
function log(message, type) {
    let tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
    let time = (new Date(Date.now() - tzoffset)).toISOString().slice(0, 19).replace('T', ' ');
    $('table#log > tbody').prepend($(`<tr class="${type}">
        <td class="time">${time}</td>
        <td class="message">${message}</td>
    </tr>`));
}
</script>
</head>
<body>
<table id="log">
    <tbody></tbody>
</table>
</body>
</html>

<?php
    }
?>
