<?php
include("config.php");
class blogger{
	
	public function __construct($connect){
	$this->connect=$connect;
	}
	public function signup($username,$password){
    $query="select blogger_id from blogger_info where blogger_username='$username'";
    $result=$this->connect->query($query);
    $q="select * from blogger_info";
    $result2=$this->connect->query($q);
    if($result->num_rows==0){
    $cdate=date('Y-m-d');
    $end = date('Y-m-d', strtotime('+5 years'));
    if($result2->num_rows==0){
    $query="insert into blogger_info values('1','$username','$password','$cdate',0,'$cdate','$end')";
    }
    else{
    $query="insert into blogger_info values(' ','$username','$password','$cdate',0,'$cdate','$end')";
    }
    $this->connect->query($query);
	return true;
    }
    else{
    return false;
   }
   }
   public function signin($username,$password){
   $query="select * from blogger_info where blogger_username='$username' and blogger_password='$password'";
   $result=$this->connect->query($query);
   if($result->num_rows==1){
    
    return true;
   }
   }
   public function active($username){
    $query="select blogger_is_active from blogger_info where blogger_username='$username'";
    $result=$this->connect->query($query);
    $row=$result->fetch_assoc();
    $x=$row['blogger_is_active'];
    
    if($x==0)
    {
        return false;
    }
    else
    {
        return true;
    }
   }
   public function getid($username){
    $query="select blogger_id from blogger_info where blogger_username='$username'";
    $result=$this->connect->query($query);
    $row=$result->fetch_assoc();
    $x=$row['blogger_id'];
    return $x;
   }
   public function addblog($username,$x,$title,$content,$category){
    
    $date=date("Y-m-d");
    $query="insert into blog_master values(' ',$x,'$title','$content','$category','$username','0','$date','$date')";
    $this->connect->query($query);
    $query="select blog_id from blog_master where blog_author='$username' and blog_desc='$content'";
    $result=$this->connect->query($query);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $x=$row['blog_id'];
    return $x;
    }
   public function get_blogs($username){
    $query="select * from blog_master where blog_author='$username'";
    $result=$this->connect->query($query);
    $x=$result->num_rows;
    $i=1;
    while($row=$result->fetch_array(MYSQLI_ASSOC)) {
       
        $array[$i][1]=$row['blog_title'];
        $array[$i][2]=$row['blog_category'];
        $array[$i][3]=$row['blog_desc'];
        $array[$i][4]=$row['blog_author'];
        $array[$i][5]=$row['updated_date'];
        $array[$i][6]=$row['blog_id'];
        $i++; 
       }
       if($x==0){
        return 0;
       } 
       else{
        return $array;
       }
    }
    public function get_blogsrow($username){
    $query="select * from blog_master where blog_author='$username'";
    $result=$this->connect->query($query);
    $x=$result->num_rows;
    return $x;
   }
   public function retrive($id,$username){
    $query="select * from blog_master where blog_author='$username' and blog_id='$id'";
    $result=$this->connect->query($query);
    $x=$result->num_rows;
    $i=1;
    while($row=$result->fetch_array(MYSQLI_ASSOC)) {
       
        $array[$i][1]=$row['blog_title'];
        $array[$i][2]=$row['blog_category'];
        $array[$i][3]=$row['blog_desc'];
        $i++; 
       }
       if($x==0){
        return 0;
       } 
       else{
        return $array;
       }
    }
   public function edit($id,$title,$category,$content){
    $date=date("Y-m-d");
    $query="update blog_master set blog_title='$title',blog_category='$category',blog_desc='$content',updated_date='$date' where blog_id='$id'";
    $this->connect->query($query);
   }
   public function image($id,$path){
        $query="insert into blog_detail values(' ',$id,'$path')";
        $result=$this->connect->query($query);
        
       }
       public function eimage($bid,$id,$path){
        $query="update blog_detail set blog_detail_image='$path' where blog_id='$id' and blog_detail_id='$bid'";
        $result=$this->connect->query($query);
        
       }
  public function rimage($id){

        $query="select * from blog_detail where blog_id='$id'";
        
        if($result=$this->connect->query($query))
        {
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $n=$result->num_rows;
        if($n!=0){
        $array[1]=$row['blog_detail_image'];
        $array[2]=$row['blog_detail_id'];
        return $array;
        }
        else{
          return 0;
        }
        }
  }
  }  
   class admin{
     
    public function __construct($connect){
    $this->connect=$connect;
    }

    public function asignin($username,$password){
      if($username=="admin" && $password=="system123"){
        return true;    
      }
      else{
        return false;
      }
      }
        public function req($username){
        $query="select blogger_id as id,blogger_username as username from blogger_info where blogger_is_active='0'";
        $result=$this->connect->query($query);
        $i=1;
        $x=$result->num_rows;
        while ($row=$result->fetch_array(MYSQLI_ASSOC)) { 
            $array[$i][1]=$row['id'];
            $array[$i][2]=$row['username'];
            $i++; 
         }
         if($x==0){
            return 0;
         }
         else{
         return $array;
       }
       }
       public function row($i){
        $query="select blogger_id as id,blogger_username as name from blogger_info where blogger_is_active='$i'";
        $result=$this->connect->query($query);
        $x=$result->num_rows;
        return $x;
       }
       public function accept($username,$i){
        $query="update blogger_info set blogger_is_active='$i' where blogger_username='$username'";
        $result=$this->connect->query($query);
       }
       public function blog_ger(){
        $query="select * from blogger_info where blogger_is_active='1'";
        $result=$this->connect->query($query);
        $i=1;
        $x=$result->num_rows;
        while ($row=$result->fetch_array(MYSQLI_ASSOC)) { 
            $array[$i][1]=$row['blogger_id'];
            $array[$i][2]=$row['blogger_username'];
            $array[$i][3]=$row['blogger_creation_date'];
            $array[$i][4]=$row['blogger_is_active'];
            $i++; 
         }
         if($x==0){
            return 0;
         }
         else{
         return $array;
       }
       }
       }
       class viewer{
        public function __construct($connect){
            $this->connect=$connect;
        }
        public function blogs(){
           $query="select * from blog_master";
           $result=$this->connect->query($query);
           $x=$result->num_rows;
          $i=1;
    while($row=$result->fetch_array(MYSQLI_ASSOC)) {
       
        $array[$i][1]=$row['blog_title'];
        $array[$i][2]=$row['blog_category'];
        $array[$i][3]=$row['blog_desc'];
        $array[$i][4]=$row['blog_author'];
        $array[$i][5]=$row['updated_date'];
        $array[$i][6]=$row['blog_id']; 
        $array[$i][7]=$row['blogger_id'];
        $i++; 
       }
       if($x==0){
        return 0;
       } 
       else{
        return $array;
       }
     }
        public function blogsdetail($id){
           $query="select * from blog_master where blog_id='$id'";
           $result=$this->connect->query($query);
           $x=$result->num_rows;
          $i=1;
         while($row=$result->fetch_array(MYSQLI_ASSOC)) {
       
        $array[$i][1]=$row['blog_title'];
        $array[$i][2]=$row['blog_category'];
        $array[$i][3]=$row['blog_desc'];
        $array[$i][4]=$row['blog_author'];
        $array[$i][5]=$row['updated_date'];
        $array[$i][6]=$row['blog_id']; 
        $array[$i][7]=$row['blogger_id'];
        $i++; 
       }
       if($x==0){
        return 0;
       } 
       else{
        return $array;
       }
        }
        public function blogs_rows(){
            $query="select * from blog_master";
           $result=$this->connect->query($query);
           $x=$result->num_rows;
           return $x;
        }
        public function author($id){
          $query="select * from blogger_info where blogger_id='$id'";
          $result=$this->connect->query($query);
              
    while($row=$result->fetch_array(MYSQLI_ASSOC)) {
       
        $array[1][1]=$row['blogger_id'];
        $array[1][2]=$row['blogger_username'];
        $array[1][3]=$row['blogger_creation_date'];
        $array[1][4]=$row['blogger_is_active'];
        $array[1][5]=$row['blogger_end_date'];
        
       }
       return $array;
        }
        public function deletep($id){
          $query="select * from blog_detail where blog_id='$id'";
          $result=$this->connect->query($query);
          $row=$result->fetch_array(MYSQLI_ASSOC);
          $path=$row['blog_detail_image'];
          $query="delete from blog_detail where blog_id='$id'";
          $this->connect->query($query);
          unlink($path);
          $query="delete from blog_master where blog_id='$id'";
          $this->connect->query($query);
        }
       } 
?>												