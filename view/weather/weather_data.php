<?php

namespace Anax\View;

?>
<h1> Weather data based on IP-address</h1>
<?php if ($resTwo["type"] == null) : ?>
    <p>This isn't a valid IP-address</p>
<?php else : ?>
    <p>IP-address: <?= $resTwo["ip"] ?></p>
    <p>Continent: <?= $resTwo["continent_name"] ?></p>
    <p>Country: <?= $resTwo["country_name"] ?></p>
    <p>Region: <?= $resTwo["region_name"] ?></p>
    <p>City: <?= $resTwo["city"] ?></p>
    <p>Latitude: <?= $resTwo["latitude"] ?></p>
    <p>Longitude: <?= $resTwo["longitude"] ?></p>
<?php endif; ?>
<?php if (sizeOf($resOne) == 2) : ?>
    <p><?= $resOne["error"] ?></p>
<?php else : ?>
    <h2>Weather for day/time</h2>
    <?php foreach ($resOne["daily"]["data"] as $value) : ?>
        <h3><?= gmdate("Y-m-d/H:i:s", $value["time"]) ?></h3>
        <p>Weather: <?= $value["summary"] ?></p>
    <?php endforeach ?>
<?php endif ?>
<?php if (!$resTwo["type"] == null) : ?>
    <h2>Karta över platsen</h2>
    <iframe width="75%" height="550" src="http://www.openstreetmap.org/export/embed.html?bbox=<?= $resTwo["longitude"] ?>%2C<?= $resTwo["latitude"] ?>%2C<?= $resTwo["longitude"] ?>%2C<?= $resTwo["latitude"] ?>&marker=<?= $resTwo["latitude"] ?>%2C<?= $resTwo["longitude"] ?>&layers=ND"></iframe>
<?php endif; ?>
