<?php

namespace Anax\View;

/**
* Ip validation
*/

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Ip-Validering</h1>
<p>Skriv in en ip-address i fältet nedan så kommer den att validera om det är en ipv4 eller en ipv6 address.</p>
<p>För att använda JSON valideringen så kan ni använda de två länkar här nedan, en validerar en IPv4 address och den andra validerar en IPv6 address.
    Man kan även gå in på ip/json/validated?address= och skriva sin egna IP-address efter = tecknet.
</p>
<p>
    <a href="ip/json/validated?address=10.0.0.1">Validera IPv4 med JSON</a>
</p>
<p>
    <a href="ip/json/validated?address=1200:0000:AB00:1234:0000:2552:7777:1313">Validera IPv6 med JSON</a>
</p>
<form method="POST" action="ip/validate">
    <fieldset>
        <legend>IP-address</legend>
            <input type="text" name="address" placeholder="Skriv en address här">
            <input type="submit" name="validate" value="Validera">
        </legend>
    </fieldset>
</form>
