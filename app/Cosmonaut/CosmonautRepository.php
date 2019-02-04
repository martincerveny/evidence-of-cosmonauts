<?php

namespace App\Cosmonaut;

use App\Cosmonaut\Exception\CosmonautItemNotFoundException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class CosmonautRepository implements CosmonautRepositoryInterface
{
    /**
     * Vrati instanciu DB builder tabulky 'cosmonauts'
     * @return Builder
     */
    private function getQueryBuilder(): Builder
    {
        return DB::table('cosmonauts');
    }

    /**
     * Vrati pole objektov vsetkych kozmonautov
     * @return array
     */
    public function getAllItems(): array
    {
        $rows = $this->getQueryBuilder()
            ->get()
            ->toArray();

        return $this->items($rows);
    }

    /**
     * Vrati objekt kozmonauta podla ID
     * @param int $id
     * @return CosmonautItem
     * @throws CosmonautItemNotFoundException
     */
    public function getItemById(int $id): CosmonautItem
    {
        $row = $this->getQueryBuilder()
            ->where('id', $id)
            ->first();

        if ($row === null) {
            throw new CosmonautItemNotFoundException();
        }

        return $this->item($row);
    }

    /**
     * Vlozi noveho kozmonauta do DB
     * @param array $data
     * @return void
     */
    public function insertItem(array $data): void
    {
        $this->getQueryBuilder()
            ->insert($data);
    }

    /**
     * Zmaze existujuceho kozmonauta podla ID
     * @param int $id
     */
    public function deleteItem(int $id): void
    {
        $this->getQueryBuilder()
            ->where('id', $id)
            ->delete();
    }

    /**
     * Ulozi upravene data kozmonauta
     * @param int $id
     * @param array $data
     * @return int
     */
    public function updateItem(int $id, array $data): int
    {
        return $this->getQueryBuilder()
            ->where('id', $id)
            ->update($data);
    }

    /**
     * vytvori cosmonaut item z query
     * @param \stdClass $row
     * @return CosmonautItem
     */
    protected function item(\stdClass $row): CosmonautItem
    {
        return new CosmonautItem((array)$row);
    }

    /**
     * Vytvori pole objektov kozmonautov
     * @param array $rows
     * @return array
     */
    protected function items(array $rows): array
    {
        $items = [];
        foreach ($rows as $row) {
            $items[] = $this->item($row);
        }

        return $items;
    }
}
