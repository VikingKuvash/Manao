<?php

class regModel extends Model {

    public function regNewUser ($login,$password, $email, $name, $data = []){
        $baseRead = $this->ReadBase();
        
        $login = trim($login);
        $email = trim ($email);
        
        $email_check = mb_strtolower($email);
        $login_check = mb_strtolower($login);

        try {
            if(isset($baseRead['email'][$email_check]) || isset($baseRead['login'][$login_check])){
                throw new Exception ('Данный пользователь c таким логином|емаилом уже зарегистрированн.'. '<br>');
            }
        } catch (Exception $th) {
            echo $th ->getMessage();
            return false;
        }
        
        // if(isset($baseRead['email'][$email_check]) || isset($baseRead['login'][$login_check])) {
        //     throw new Exceprion ('Данный пользователь уже зарегистрирован.');
        // }
        $password = trim($password);
        $baseRead['base'][] = array_merge(['User' => ['email' => $email, 'login' => $login, 'password' => $password,'name' => $name ]], $data);
        $indexCurrent = count($baseRead['base']) - 1;
        $baseRead['email'][$email_check] = $indexCurrent;
        $baseRead['login'][$login_check] = $indexCurrent;
        
        file_put_contents($this->fileBase, json_encode($baseRead, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE ));
        
        return true;

        
    }

}
