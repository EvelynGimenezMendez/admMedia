<?php
    class Db
    {
        public function connectDB()
        {
            $db_user = 'root'; //usuario bd
            $db_pass = '';  //contraseña bd
            try
            {
                return new PDO("mysql:host=localhost;dbname=nombreBd;charset=utf8mb4;port=puerto;", $db_user, $db_pass,
                        array(
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        ));
            }
            catch (PDOException $e) {
                exit ('Exception: '. ($e->getMessage()) );
                
            }
            catch (Exception $e) {
                exit ('DB Exception: '. ($e->getMessage()) );
            }
        }
    }
