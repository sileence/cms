<?php namespace Cms\Section;

use Cms\Base\BaseEntity;

class Section extends BaseEntity {

    protected $fillable = ['name', 'slug_url', 'type', 'menu', 'menu_order', 'published'];

}