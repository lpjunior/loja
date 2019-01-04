<?php

    namespace Mystore\Model;
    use Mystore\DB\Sql;

    class User {

        public static function login($login, $password) {

            $sql = new sql();

            $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
                ":LOGIN"=>$login
            ));

            if(count($results) === 0)
            {
                throw new \Exception("Usuário inexistente ou senha inválida", 1);
            }

            $data = $results[0];
            if(password_verify($password, $data["despassword"]) === true)
            {
                $user = new User();
            } else {
                throw new \Exception("Usuário inexistente ou senha inválida", 1);
            }
        }
    }