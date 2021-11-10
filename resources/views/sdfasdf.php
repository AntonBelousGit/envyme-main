<?php

foreach ($items as $item) {
    $idx = mb_strtolower(__($item[0], 'fira'), 'UTF-8');
    echo '<option data-flag="' . $item[1] . '" data-background="' . $item[2] . '" ' . ($active == $idx ? ' selected' : '') .
        (!empty($actual) && !in_array($idx, $actual) ? ' disabled' : '') . 'value="' . $country_id . '"'   . ' >' .
        __($item[0], 'fira') .
        '</option>';
}
