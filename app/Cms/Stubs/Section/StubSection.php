<?php namespace Cms\Stubs\Section;

use Cms\Stubs\StubModel;

class StubSection extends StubModel {

    protected $fillable = ['name', 'slug_url', 'type', 'menu', 'menu_order', 'published'];

}
