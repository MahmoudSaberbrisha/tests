<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dalel; // Import the Dalel model

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dalel; // Import the Dalel model

class DalelController extends Controller
{
    public function treeDalel()
    {
        $data['accounts'] = Dalel::where('hesab_no3', 1)->get();
        $records = Dalel::where('id', '!=', 0)->get();
        $data['tree'] = $this->buildTree($records);
        $data['title'] = 'شجرة الدليل المحاسبي';
        return view('admin.finance_accounting.dalel.treedalel', $data);
    }

    public function buildTree($records)
    {
        $tree = [];
        foreach ($records as $record) {
            $tree[$record->parent_id][] = $record; // Assuming 'parent_id' is a field in the Dalel model
        }
        return $this->formatTree($tree);
    }

    private function formatTree($tree, $parentId = null)
    {
        $formatted = [];
        if (isset($tree[$parentId])) {
            foreach ($tree[$parentId] as $item) {
                $children = $this->formatTree($tree, $item->id);
                if ($children) {
                    $item->children = $children;
                }
                $formatted[] = $item;
            }
        }
        return $formatted;
    }





}