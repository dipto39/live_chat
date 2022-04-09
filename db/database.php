<?php
class database{
    private $host="localhost";
    private $uname="root";
    private $pass="";
    private $dbname="test";

    private $conn=false;
    private $result=array();
    private $mysqli="";

   public function __construct()
    {
        if(!$this->conn){
           $this->mysqli=new mysqli($this->host,$this->uname,$this->pass,$this->dbname);
           if($this->mysqli->connect_error){
               array_push($this->result,$this->mysqli->connect_error);
               return false;
           }
        }else{
            return true;
        }
    }
// creat table

public function addtable($s){
    if($this->mysqli->query($s)){
        array_push($this->result,"Table insert successfully...");
            return true;
    }else{
        array_push($this->result,$s);
        return false;
    }
}
    ///for select some data 
    public function select($table,$clumn="*",$join=null,$where=null,$order=null,$limit=null)
    {
        if($this->tableexist($table)){
        $sql="select $clumn from $table";
        if(!$join == null){
            $sql.="$join ";
        }
        if(!$where == null){
            $sql.=" where $where";
        }
        if(!$order == null){
            $sql.=" order by $order";
        }
        if(!$limit == null){
            $sql.=" limit 0,$limit";
        }
        $res=$this->mysqli->query($sql);
        if($res){
            array_push($this->result,$res->fetch_all(MYSQLI_ASSOC));
            return true;
        }else{
            array_push($this->result,$this->mysqli->error);
            return false;
        }
    }
    }
    public function insert($table,$parm=array()){
        if($this->tableexist($table)){
        $arrv=implode("','",$parm);
        $arrk=implode(",",array_keys($parm));
        $sql="insert into $table($arrk) values('$arrv')";
        $res=$this->mysqli->query($sql);
        if($res){
            array_push($this->result,"insert successfully..");
            return true;
        }else{
            array_push($this->result,$this->mysqli->error);
            return false;

        }
    }
    }
    public function update($table,$parm=array(),$where){
        if($this->tableexist($table)){
            $sql="update $table set ";
            $arr=array();
            foreach($parm as $key => $value){
                $arr[]="$key = '$value'";
            }
            $sql.=implode(",",$arr)." where $where";
            // array_push($this->result,$sql);
            $ress=$this->mysqli->query($sql);
            if($ress){
                array_push($this->result,"update successfully..");
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
            return false;
            }
        }
    }
    public function update_a($table,$parm=array(),$where){
        if($this->tableexist($table)){
            $sql="update $table set ";
            $arr=array();
            foreach($parm as $key => $value){
                $arr[]="$key = $value";
            }
            $sql.=implode(",",$arr)." where $where";
            // array_push($this->result,$sql);
            $ress=$this->mysqli->query($sql);
            if($ress){
                array_push($this->result,$sql);
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
            return false;
            }
        }
    }
    public function delete_row($table,$where){
        if($this->tableexist($table)){
            $sql="delete from $table where sid =$where";
            $ress=$this->mysqli->query($sql);
            if($ress){
                array_push($this->result,"delete successfully..");
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
            return false;
            }
        }
    }
    public function tableexist($table){
        $sql="show tables from $this->dbname like '$table'";
        $ress=$this->mysqli->query($sql);
        if($ress){
            if($ress->num_rows > 0){
                return true;
            }else{
                array_push($this->result,"$table not exist...");
                return false;
            }
        }
    }
    public function show_result(){
        $res=$this->result;
        $this->result=array();
        return $res;
    }

   public function __destruct()
    {
       if($this->conn){
           if($this->sql->close()){
               $this->conn=false;
               return true;
           }
       }else{
           return false;
       }
    }
}


?>