<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected $entity;

    public function __construct(Module $model)
    {
        $this->entity = $model;
    }

    public function getModulesFromCourse(string $courseId)
    {
        return $this->entity->where('course_id', $courseId)->get();
    }

}
