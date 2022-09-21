<?php

namespace app\modules\api\models;

use app\models\LoginForm as ModelsLoginForm;
use app\modules\api\resources\UserResource;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends ModelsLoginForm
{
    /**
     * Finds user by [[username]]
     *
     * @return UserResource|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserResource::findByUsername($this->username);
        }

        return $this->_user;
    }
}