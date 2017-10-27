<?php
class Usuario {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $cpf;

        public function getId(){
            return $this->id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function getCpf(){
            return $this->cpf;
        }
    
    
        public function setId($value){
            $this->id = $value;
            return $this;
        }
        public function setNome($value){
            $this->nome = $value;
            return $this;
        }
        public function setEmail($value){
            $this->email = $value;
            return $this;
        }
        public function setSenha($value){
            $this->senha = $value;
            return $this;
        }
        public function setCpf($value){
            $this->cpf = $value;
            return $this;
        }
    }



?>