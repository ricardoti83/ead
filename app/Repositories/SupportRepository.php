<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
                    ->supports()
                    ->where(function($query) use($filters){
                        if(isset($filters['lesson'])){
                            $query->where('lesson_id', ($filters['lesson']));
                        }
                        if(isset($filters['status'])){
                            $query->where('status', ($filters['status']));
                        }
                        if(isset($filters['filter'])){
                            $filter = $filters['filter'];
                            $query->where('description', 'LIKE', "%{$filter}%");
                        }

                    })
                    ->get();
    }

    public function createNewSupport(array $data)
    {
       $support = $this->getUserAuth()
                ->supports()
                ->create([
                    'lesson_id' => $data['lesson'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'status' => $data['status']
                ]);

        return $support;
    }

    // Replies

    public function createReplyToSupportId(string $supportId, array $data)
    {
        $this->getSupport($supportId)
                ->replies()
                ->create([
                    'description' => $data['description'],
                    'user_id' => $this->getUserAuth()->id
                ]);
    }

    private function getSupport(string $id)
    { //Get the support by id
        return $this->entity->findOrFail($id);
    }

    private function getUserAuth(): User
    {// Get the user logged "Only tests"
        // return auth()->user();
        return User::first();
    }
}
