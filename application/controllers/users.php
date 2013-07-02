<?php

use Framework\RequestMethods as RequestMethods;

class Users extends Shared\Controller
{
    public function login()
    {
        if (RequestMethods::post("login"))
        {
            $email = RequestMethods::post("email");
            $password = RequestMethods::post("password");
            
            $view = $this->getActionView();
            $error = false;
            
            if (empty($email))
            {
                $view->set("email_error", "�û�������Ϊ��");
                $error = true;
            }
            
            if (empty($password))
            {
                $view->set("password_error", "�û����벻��Ϊ��");
                $error = true;
            }
            
            if (!$error)
            {
                $user = User::first(array(
                        "email = ?" => $email
                ));
                
                $flag = false;
                if (!empty($user))
                {
                    $flag = $user->checkPassword();
                }
                if ($flag)
                {
                    $this->user = $user;
                    self::redirect("/home/index.html");
                }
                else
                {
                    $view->set("password_error", "�û������û����벻��ȷ");
                }
            }
        }
    }
    public function logout()
    {
        $this->setUser(false);
        self::redirect("/home/index.html");
    }
    
    public function register()
    {
        $view = $this->getActionView();
        $view->set("errors", array());
        
        if (RequestMethods::post("register"))
        {
            $user = new User(array(
                    "name" => RequestMethods::post("name"),
                    "email" => RequestMethods::post("email"),
                    "password" => RequestMethods::post("password"),
                    "password_again" => RequestMethods::post("password_again")
            ));
            if ($user->validate())
            {
                $user->save();
                self::redirect("/home/index.html");
            }
            
            $view->set("errors", $user->getErrors());
        }
    }
}