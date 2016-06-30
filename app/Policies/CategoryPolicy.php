<?php

namespace FCLLA\Policies;

use Riari\Forum\Models\Category;

class CategoryPolicy {

    /**
     * Permission: Create threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function createThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Manage threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function manageThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return $this->deleteThreads($user, $category) ||
        $this->enableThreads($user, $category) ||
        $this->moveThreadsFrom($user, $category) ||
        $this->lockThreads($user, $category) ||
        $this->pinThreads($user, $category);
    }

    /**
     * Permission: Delete threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function deleteThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Enable threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function enableThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Move threads from category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function moveThreadsFrom($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Move threads to category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function moveThreadsTo($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Lock threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function lockThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Pin threads in category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function pinThreads($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: View category. Only takes effect for 'private' categories.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function view($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Delete category.
     *
     * @param  object  $user
     * @param  Category  $category
     * @return bool
     */
    public function delete($user, Category $category)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

}