<?php

namespace App\Cosmonaut;

use App\Cosmonaut\Exception\CosmonautItemNotFoundException;

interface CosmonautRepositoryInterface
{
    /**
     * Vrati pole objektov vsetkych kozmonautov
     * @return array
     */
    public function getAllItems(): array;

    /**
     * Vrati objekt kozmonauta podla ID
     * @param int $id
     * @return CosmonautItem|null
     * @throws CosmonautItemNotFoundException
     */
    public function getItemById(int $id): ?CosmonautItem;

    /**
     * Vlozi noveho kozmonauta do DB
     * @param array $data
     * @return void
     */
    public function insertItem(array $data): void;

    /**
     * Zmaze existujuceho kozmonauta podla ID
     * @param int $id
     */
    public function deleteItem(int $id): void;

    /**
     * Ulozi upravene data kozmonauta
     * @param int $id
     * @param array $data
     * @return int
     */
    public function updateItem(int $id, array $data): int;
}
