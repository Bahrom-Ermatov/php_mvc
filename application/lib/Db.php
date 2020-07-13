<?php
    function connect_db() {
        return new PDO ('mysql:host=localhost;dbname=f0454640_test', 'f0454640_root', 'root');    
    }
