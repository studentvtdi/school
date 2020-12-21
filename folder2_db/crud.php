<?php 


class crud{

    //private database object
    private $db;
    
        //constructor to initialize private variable to the database connection
    
        function __construct($conn){
            $this->db = $conn;
        }
    
        public function insertStudents($fname, $lname, $addres, $birthdate, $email, $gender,$majors,$avatar_path){
    
            try {
                $sql="INSERT INTO student (firstname,lastname,mailaddress,dateofbirth,emailaddress,gender,major_ID,avatar_path) VALUES (:fname,:lname,:addres,:birthdate,:email,:gender,:majors,:avatar_path)";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':addres',$addres);
                $stmt->bindparam(':birthdate',$birthdate);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':majors',$majors);
                $stmt->bindparam(':avatar_path',$avatar_path);
                $stmt->execute();
                return true;
                
                              
            } 
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
                
            
            }
    
    }    


    
    public function editStudent($id,$fname, $lname, $addres, $birthdate, $email, $gender,$majors){
        $sql="UPDATE student SET firstname=:fname,lastname=:lname,mailaddress=:addres,
        dateofbirth=:birthdate,emailaddress=:email,gender=:gender,major_ID=:majors WHERE student_ID=:id";

            try{
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':addres',$addres);
                $stmt->bindparam(':birthdate',$birthdate);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':majors',$majors);
                $stmt->execute();
                return true;

            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
                
            
            }
                   
    }
    
    public function getStudents(){
        try{
            $sql="SELECT*FROM student s inner join majors m  on s.major_ID=m.major_id";
            $result=$this->db->query($sql);
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        
        }
        
        

    }

    public function getStudentDetails($id){
        try{
            $sql="SELECT*FROM student s inner join majors m  on s.major_ID=m.major_id WHERE student_ID=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        
        }
        
    }
    

    public function deleteStudent($id){
        try{
            $sql="DELETE FROM student WHERE student_ID=:id ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
                    
        }
    }
    



    public function getMajors(){

        try{
            $sql="SELECT*FROM majors";
            $result=$this->db->query($sql);
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
                    
        }
        
        

    }


}

?>

