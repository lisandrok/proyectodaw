<?php

require_once "configuracion.php"; //Incluyo el archivo de configuracion con las credenciales de la bbdd

class Conexion {
    private static $host;
    private static $username;
    private static $password;
    private static $db;
    private static $dsn;
    private static $conexion = null;
    
    private static function inicializar() {
        if (self::$conexion === null) { //solo inicializa si nunca inicializo con anterioridad
            self::$host = DB_HOST;
            self::$db = DB_NAME;
            self::$username = DB_USERNAME;
            self::$password = DB_PASSWORD;
            self::$dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8mb4";
            
            try {
                self::$conexion = new PDO(self::$dsn, self::$username, self::$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die("Error en la conexión con la bbdd: mensaje: " . $ex->getMessage());
            }
            return self::$conexion;
        }
    }

    public static function getConexion() {
        self::inicializar();
        return self::$conexion;
    }

    public static function consulta($sql) {
        self::inicializar();
        try {
            $stmt = self::$conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $ex) {
            die("Fallo la query: " . $ex->getMessage());
        }
    }
}