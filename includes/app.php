<?php
require 'funciones.php';
require 'config/database.php';
require '/laragon/www/vendor/autoload.php';

use Model\ActiveRecord;

ActiveRecord::setConection(createConnection());