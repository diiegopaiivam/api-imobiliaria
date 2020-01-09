<?php 

class Conexao extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function connDb(){

        $banco = getenv('MDB_FILE_PATH');
        $def_dir = getenv('MDB_DIR_PATH');

        $cfg_dsn = "DRIVER=Microsoft Access Driver (*.mdb);
                DBQ=$banco;
                UserCommitSync=Yes;
                Threads=3;
                SafeTransactions=0;
                PageTimeout=10;
                MaxScanRows=16;
                MaxBufferSize=4096;
                DriverId=281;
                DefaultDir=$def_dir";

        $cfg_dsn_login="";
        $cfg_dsn_mdp="";

        $conn = @odbc_connect($cfg_dsn, $cfg_dsn_login, $cfg_dsn_mdp);

        return $conn;
    }

}