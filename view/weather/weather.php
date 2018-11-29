<?php

namespace Anax\View;

?>
<h1>Väder</h1>
<p>
Man kan även gå in på json/weather/validated?address= och skriva sin egna IP-address efter = tecknet.
</p>
<p>
<a href="json/weather/validated?address=193.11.186.208">Hämta ut väder genom IPv4 address (JSON)</a>
</p>
<p>
<a href="json/weather/validated?address=2001:4860:4860::8888">Hämta ut väder genom IPv6 address (JSON)</a>
</p>
<form method="POST" action="weather/validate">
    <fieldset>
        <legend>IP-address</legend>
            <input type="text" name="address" placeholder="Skriv en address här">
            <input type="submit" name="validate" value="Validera">
        </legend>
    </fieldset>
</form>
