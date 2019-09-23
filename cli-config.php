<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require '../vendor/autoload.php';

return ConsoleRunner::createHelperSet($entityManager);
