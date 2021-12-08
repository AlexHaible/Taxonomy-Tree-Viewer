<?php

namespace App\Actions\Nodes;

use App\Models\Node;

class ChangeParent
{
    /**
     * @param string $nodeId
     * @param int $newParentId
     *
     * @return boolean
     */
    public static function changeParent(string $nodeId, int $newParentId): bool
    {
        if ($nodeId === "1") {
            return "Updating the root is not allowed.";
        }

        $changedNode = Node::find($nodeId);
        $changedNode->parent_id = $newParentId;
        $changedNode->height = $changedNode->parent->height + 1;
        $response = $changedNode->save();

        return $response;
    }
}
