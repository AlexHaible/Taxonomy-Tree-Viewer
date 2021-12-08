<?php

namespace App\Actions\Nodes;

use App\Models\Node;

class AddNode
{
    /**
     * @param int $parentId
     * @param string $name
     * @param ?string $details
     *
     * @return boolean
     */
    public static function addNode(int $parentId, string $name, ?string $details = null): bool
    {
        $newNode = new Node;
        $newNode->parent_id = $parentId;
        $newNode->name = $name;
        $newNode->height = Node::find($parentId)->height + 1;
        $newNode->details = $details;
        $response = $newNode->save();

        return $response;
    }
}
