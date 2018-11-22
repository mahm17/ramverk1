<?php

namespace Anax\View;

/**
* Ip validation
*/

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Ip-Validering med position</h1>
<p>Skriv in en ip-address i fältet nedan så kommer den att validera om det är en ipv4 eller en ipv6 address och sen även se vilken position ip-addressen ligger på.</p>
<p>För att använda JSON valideringen så kan ni använda de två länkar här nedan, en validerar en IPv4 address och den andra validerar en IPv6 address.
    Man kan även gå in på position/json/validated?address= och skriva sin egna IP-address efter = tecknet.
</p>
<p>
    <a href="json/position/validated?address=193.11.186.208">Validera IPv4 med JSON</a>
</p>
<p>
    <a href="json/position/validated?address=2001:6b0:2a:c280:2d56:dbec:e1d6:cb41">Validera IPv6 med JSON</a>
</p>
<form method="POST" action="position/validate">
    <fieldset>
        <legend>IP-address</legend>
            <input type="text" name="address" placeholder="Skriv en address här">
            <input type="submit" name="validate" value="Validera">
        </legend>
    </fieldset>
</form>
