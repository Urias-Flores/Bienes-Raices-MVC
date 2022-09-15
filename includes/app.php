<?php
require 'funciones.php';
require 'config/database.php';
require '../vendor/autoload.php';

use Model\ActiveRecord;

ActiveRecord::setConection(createConnection());