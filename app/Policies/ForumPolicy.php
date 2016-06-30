<?php

namespace FCLLA\Policies;

class ForumPolicy {

    /**
     * Permission: Create categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function createCategories($user)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Manage category.
     *
     * @param  object  $user
     * @return bool
     */
    public function manageCategories($user)
    {
        if($user->admin != 1) {
            return false;
        }

        return $this->moveCategories($user) ||
        $this->renameCategories($user);
    }

    /**
     * Permission: Move categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function moveCategories($user)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Rename categories.
     *
     * @param  object  $user
     * @return bool
     */
    public function renameCategories($user)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: Mark new/updated threads as read.
     *
     * @param  object  $user
     * @return bool
     */
    public function markNewThreadsAsRead($user)
    {
        return true;
    }

    /**
     * Permission: View trashed threads.
     *
     * @param  object  $user
     * @return bool
     */
    public function viewTrashedThreads($user)
    {
        if($user->admin != 1) {
            return false;
        }

        return true;
    }

    /**
     * Permission: View trashed posts.
     *
     * @param  object  $user
     * @return bool
     */
    public function viewTrashedPosts($user)
    {
        return true;
    }

}