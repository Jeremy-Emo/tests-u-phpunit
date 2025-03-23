<?php
declare(strict_types=1);

namespace src\Repository;

interface DatabaseInterface
{
    function save(object $entity): void;
    function delete(object $entity): void;
}