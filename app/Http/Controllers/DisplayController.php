<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class DisplayController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $nodes = Node::all();
        $sortedNodes = $nodes->keyBy('id');
        $parentGroup = $nodes->groupBy('parent_id');

        $treeData = collect($this->getNode(1, $sortedNodes, $parentGroup))->toJson();
        $nodeData = collect($this->getNodeData($nodes))->toJson();

        return view('index')
            ->with('treeData', $treeData)
            ->with('nodeData', $nodeData);
    }

    /**
     * @param int $id
     * @param Collection $sorted
     * @param Collection $parents
     *
     * @return array $array
     */
    public function getNode(int $id, Collection $sorted, Collection $parents): array
    {
        $children = Arr::get($parents, $id, []);
        $array = [];
        foreach ($children as $child) {
            $id = $child->id;
            $array[$id] = $this->getNode($id, $sorted, $parents);
        }

        return $array;
    }

    /**
     * @param Collection $nodes
     *
     * @return array $array
     */
    public function getNodeData(Collection $nodes): array
    {
        $array = [];
        foreach ($nodes as $node) {
            $array[$node->id] = ["trad" => "Name: $node->name<br>Details: $node->details<br>Node Height: $node->height"];
        }

        return $array;
    }
}
