<?php

use DigitalRiver\Admin\Menu\Options;
use DigitalRiver\Admin\Fields\Fields;

$options = new Options();
$options->instance();
$fields = new Fields($options);
$fields->defineFields();