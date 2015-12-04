<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 11/13/2015
 * Time: 2:45 PM
 */






$files = glob('../../nightly_exports/*');

foreach($files as $f) {
    echo '<a href="'.$f.'">'.$f.'</a><br />';
}