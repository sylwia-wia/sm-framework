<?php

namespace sm;

abstract class Model
{
    abstract static public function getAll(): array;

    abstract public function getTableName(): string;
    abstract public function getColumns(): array;
    abstract public function save(): bool;

    //save

}