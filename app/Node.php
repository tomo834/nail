<?php
namespace App;

use Franzose\ClosureTable\Models\Entity;

class Node extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nodes';

    /**
     * ClosureTable model instance.
     *
     * @var \App\NodeClosure
     */
    protected $closure = 'App\NodeClosure';

    public function admin_info(){
        return $this->belongsTo('App\Admin', 'shop');
    }
}
