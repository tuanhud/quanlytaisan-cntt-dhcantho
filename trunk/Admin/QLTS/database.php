	<?php
    class database{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "vertrigo";
        private $dbname = "quanlytaisan";
        private $connection;                         
        private $flagconn = false;
        private $query;
        private $result;
        
        /*-----------------------------------------------------------------------
        Function: Construct
        Parameter: No parameter
        Return: No return
        -------------------------------------------------------------------------*/
       public function __construct(){
            
             if (!$this->connection = mysql_connect($this->hostname, $this->username, $this->password))
			 {
                die ("Không thể kết nối với server ");
             }
             else{
                if (!mysql_select_db($this->dbname,$this->connection)){
                    die ("Không thể kết nối với cơ sở dữ liệu ");
                    mssql_close($this->connection);
                }
                else{
                    mysql_query("SET CHARACTER SET utf8 ");
                    $this->flagconn = true;
                }
             }
        }
		
        /*---------------------------------------------------------
		set string query 
		-------------------------------------------------------------*/
        public function setQuery($query)
        {
            $this->query = $query;
        }
         
		/*---------------------------------------------------------
		get string query 
		-------------------------------------------------------------*/
        public function getQuery(){
            return $this->query;
        }
		
		/*---------------------------------------------------------
		get result of string query
		-------------------------------------------------------------*/
         public function getResult(){
            return $this->result;
        }
		
        /*---------------------------------------------------------
        Function: fetchAll
        Parameter: query string
        Return: array
        -------------------------------------------------------------*/
		 public function fetchAll(){
            if ($this->flagconn == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            return $this->result;
            
        }
		
		
		/*---------------------------------------------------------
        Function: isExits
        Parameter: table name , query string
        Return: false if table name or where string is empty, else return row number of ressult
        -------------------------------------------------------------*/
        public function isExits($table="", $where=""){
            
            if (empty($table) || empty($where))
            {
                return FALSE;
            }
            if ($this->flagconn == false){
                $this->__construct();
            } 
            $this->setQuery("select * from $table where $where");   
            $this->result = mysql_query($this->query);
            return mysql_num_rows($this->result);
        }
        
		/*---------------------------------------------------------
        Function: deleteRows
        Parameter: table name , query string
        Return: false if table name or where string  is empty, else return row number affected
        -------------------------------------------------------------*/
        public function deleteRows($table="", $where="")
        {
            if (empty($table) || empty($where))
            {
                return FALSE;
            }
            $this->query = "delete from $table where $where"; 
            $this->result = mysql_query($this->query, $this->connection);
            return  mysql_affected_rows($this->connection);
        }
		
        
		/*---------------------------------------------------------
        Function: insertRows
        Parameter: table name , atts array
        Return: false if table name or atts array is empty, else return row number affected
        -------------------------------------------------------------*/
		public function insertRows($table="", $atts="")
        {
            if(empty($table) || !is_array($atts))
            {
                return False;
            }
            else
            {
                while (list ($col, $val) = each ($atts))
                {
                    //if null go to the next array item
                    if ($val=="")
                    {
                        continue;
                    }
                    $col_str .= $col . ",";
                    if (is_int($val) || is_double ($val))
                    {
                        $val_str .= $val . ",";
                    }
                    else
                    {
                        $val_str .= "'$val',";
                    }
                }
                $this->query = "insert into $table ($col_str) values($val_str)";
                //trim trailing comma from both strings
                $this->query = str_replace(",)", ")", $this->query);
            }
            $this->result = mysql_query($this->query, $this->connection);
            return mysql_affected_rows($this->connection);
        }
        
		
		/*---------------------------------------------------------
        Function: updateRows
        Parameter: table name , atts array, string where
        Return: false if table name or atts array is empty, else return row number affected
        -------------------------------------------------------------*/
        public function updateRows($table="", $atts="", $where="")
        {
            if(empty($table) || !is_array($atts))
            {
                return FALSE;
            }
            else
            {
                while(list ($col, $val) = each ($atts))
                {
                    if ($val=="")
                    {
                        continue;
                    }
                    if(is_int($val) || is_double($val))
                    {
                        $str .= "$col=$val,";
                    }
                    elseif($val=="NULL" || $val=="null")
                    {
                        $str .= "$col=NULL,";
                    }
                    else
                    {
                        $str .= "$col='$val',";
                    }
                }
            }
            $str = substr($str, 0, -1);
            $this->query = "update $table set $str";
            if (!empty($where))
            {
                $this->query .= " where $where"; 
            }
            $this->result = mysql_query($this->query, $this->connection);
            return mysql_affected_rows($this->connection);
        }
        
        /*---------------------------------------------------------
        Function: execute query
        Parameter: query string
        Return: return 0 if ok, return 1 if fail
        Use:
            $db = new database();
            $db->setQuery("delete from NguoiDung where maSo='"."134567'");
            $db->executeQuery(); 
        ------------------------------------------------------------*/
        public function executeQuery(){
            if ($this->flagconn == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            return mysql_affected_rows($this->connection);
        }
		
		
		public function Execute($i_sql)
		 {
			mysql_query("SET NAMES 'utf8'");
			$resource = mysql_query($i_sql);
			return $resource;
		}
		
		
		public function ExecuteQuery2($i_sql){
			
			$resource = $this->Execute($i_sql);
			$result_array = array();
			//var_dump($resource);
			if($resource){
	
				$num_rec = 0;
				while($row = mysql_fetch_array($resource))
				{
					$result_array[$num_rec] = $row;
					$num_rec++;
				}
				mysql_free_result($resource);
							// echo "here";
							// echo $num_rec;
				if ($num_rec > 0 )
					return $result_array;
			}
			return false;
		}
        
        /*---------------------------------------------------------
        function: destruct
        Parameter: No parameter
        return: No return
        */
        /*public function __destruct() {        
            if ($this->flagconn == true) {
                mssql_free_result($this->result);
                mssql_close ( $this->connection );
            }
    
        }*/
        
        public function numRecord(){
            if ($this->flagconn == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
			if(mysql_num_rows($this->result)!=0){
            $num = mysql_num_rows($this->result);
            return $num;            
			}
        }
        public function getConnection(){
            return $this->connection;
        }
		public function setUsername($user){
			$this->username = $user;
			}
    }
?>
