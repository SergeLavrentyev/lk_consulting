<?php


namespace App\Http\Controllers\Requests;


use App\Interfaces\OrderRequestInterface;
use App\Interfaces\RequestInterface;

class OrderRequest extends AbstractRequest implements OrderRequestInterface
{
    public function get(array $query): array
    {
        // TODO: Implement get() method.
    }

    public function update(array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function store(array $data): bool
    {
        // TODO: Implement store() method.
    }

    public function delete(array $data): bool
    {
        // TODO: Implement delete() method.
    }
}
