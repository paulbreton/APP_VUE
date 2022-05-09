<?php

namespace App\Managers;

use App\Filters\CommentFilters;
use App\Repositories\CommentRepository;

class CommentManager extends CommonManager
{
    public function __construct(CommentRepository $commentGameRepository) {
        $this->repository = $commentGameRepository;
    }

    /**
     * @param CommentFilters $filters
     * @return mixed
     */
    public function newComment(CommentFilters $filters) {
        return $this->repository->store($filters);
    }

}
