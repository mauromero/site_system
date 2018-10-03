<?php

namespace App\Policies;

use App\User;
use App\Assessment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssessmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the assessment.
     *
     * @param  \App\User  $user
     * @param  \App\Assessment  $assessment
     * @return mixed
     */
    public function view(User $user)
    {
      
    }

    /**
     * Determine whether the user can create assessments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the assessment.
     *
     * @param  \App\User  $user
     * @param  \App\Assessment  $assessment
     * @return mixed
     */
    public function update(User $user, Assessment $assessment)
    {
        return  $user->id==$assessment->user_id;
    }

    public function edit(User $user, Assessment $assessment)
    {
        // return $user->role == 'admin' || $user->id == $assessment->user_id;
        return  $user->id == $assessment->user_id;
    }
    
    public function edit_submitted(User $user, Assessment $assessment)
    {
        return $user->id == $assessment->user_id;
    }

    /**
     * Determine whether the user can delete the assessment.
     *
     * @param  \App\User  $user
     * @param  \App\Assessment  $assessment
     * @return mixed
     */
    public function delete(User $user, Assessment $assessment)
    {
        //
    }
}
