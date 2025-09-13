<?php
class Conexao {
    private static $host = "localhost";
    private static $bd = "LORY";
    private static $usuario = "root";
    private static $senha = "root";

    public static function getConexao() {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . ";bdname=" . self::$bd, self::$usuario, self::$senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>