<?php
declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryContract
{
    public function find(int $id) : Model|null;
    public function create(array $data): Model;
    public function update(array $data, $id): bool;
    public function delete($id): bool;

}
