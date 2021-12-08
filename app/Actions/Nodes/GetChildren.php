<?php

namespace App\Actions\Nodes;

use App\Models\Node;
use Illuminate\Database\Eloquent\Collection;

class GetChildren
{
    /**
     * @param string $nodeId
     *
     * @return Collection $result
     */
    public static function getChildren(string $nodeId): Collection
    {
        $result = Node::whereParentId($nodeId)->get();

        return $result;
    }
}
