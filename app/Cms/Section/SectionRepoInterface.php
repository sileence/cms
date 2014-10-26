<?php namespace Cms\Section;

use Cms\Base\BaseEntity;

interface SectionRepoInterface
{

    public function findOrFail($id);

    public function search(array $data = array(), $paginate = false);

    public function create(array $data);

    public function update($entity, array $data);

    public function delete($entity);
}