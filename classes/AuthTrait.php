<?php
namespace family;

trait AuthTrait {
    private function HashPassword($passwd) {
        $options = [
            'cost' => 12,
        ];
        return password_hash($passwd, PASSWORD_BCRYPT, $options);
    }

    private function VerifyPassword($password, $hash) {

        return password_verify($password,$hash);
    }
}