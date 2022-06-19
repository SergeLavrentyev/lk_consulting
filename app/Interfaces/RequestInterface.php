<?php


namespace App\Interfaces;


interface RequestInterface
{
    /**
     * @param array $query
     * @return array
     */
    public function get(array $query): array;

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool;

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool;

    /**
     * @param array $data
     * @return bool
     */
    public function delete(array $data): bool;


}
