<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

?><h1>View all items</h1>

<p>
    <a href="book/create">Create</a> |
    <a href="book/delete">Delete</a>
</p>

<?php if (!$items) : ?>
    <p>There are no items to show.</p>
    <?php
    return;
endif;
?>

<table>
    <tr>
        <th>Id</th>
        <th>Titel</th>
        <th>Beskrivning</th>
        <th>Författare</th>
        <th>Bild</th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>
        <td>
            <a href="<?= url("book/update/{$item->id}"); ?>"><?= $item->id ?></a>
        </td>
        <td><?= $item->column1 ?></td>
        <td><?= $item->column2 ?></td>
        <td><?= $item->column3 ?></td>
        <td><img src="<?= $item->column4 ?>" alt="" height="100" width="100"></img></td>
    </tr>
    <?php endforeach; ?>
</table>
