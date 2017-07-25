<?php

include("config.php");
$s=$_GET["q"];
$sel_value=$_GET["p"];
if ($s!="") 
{
    	if ($sel_value=="all") 
    	{
    
			$query = mysqli_query($connect,"SELECT * FROM blog_master where blog_title LIKE '%".mysql_real_escape_string($s)."%' OR blog_desc LIKE '%".mysql_real_escape_string($s)."%' OR blog_category LIKE '%".mysql_real_escape_string($s)."%' ");

			if($query)
			{
				$rows=mysqli_num_rows($query);   

    			if($rows>0)
    			{	 
      
        
     		 		while($values = mysqli_fetch_assoc($query))
      				{ 
                 
                  
                  		$keyword = $s;
                 		// $values["blog_title"] = preg_replace("/\w*?".preg_quote($keyword)."\w*/i", "<b style='color: brown;''>$0</b>", $values["blog_title"]);
                   		$values["blog_title"] = preg_replace("/($keyword)/i","<b style='color: brown;'>$1</b>", $values["blog_title"]);

                    	$pos=stripos($values["blog_desc"], $s);
                    	
                    	$values["blog_desc"] = preg_replace("/($keyword)/i","<b style='color: brown;'>$1</b>", $values["blog_desc"]);
                    
                   	    $values["blog_category"] = preg_replace("/($keyword)/i","<b style='color: brown;'>$1</b>", $values["blog_category"]);
                    
                    	echo'<div class="container">
        				<div class="row">
            			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                		<div class="post-preview">
                   		<a href="detail.php?x='.html_entity_decode($values["blog_id"]).'">
                  		<h2 class="post-title">
                         	'.html_entity_decode($values["blog_title"]).'
                   		</h2>
                   		<h3 class="post-subtitle">
                            	'.html_entity_decode($values["blog_category"]).'
                  		</h3>
                   		</a>
                   		<p class="post-meta">Posted by <a href="author.php?x='. html_entity_decode($values["blogger_id"]). '""> '. html_entity_decode($values["blog_author"]). '</a> on '. html_entity_decode($values["creation_date"]).' </p>
                   		<p class="post-meta">'.substr(html_entity_decode($values["blog_desc"]),$pos,$pos+400).'</p>
                		</div>
                		<hr>
              			</div>
            	   		</div> 
                  		</div>';

      				}
    			}
   		   	    else
    			{
		            	$query = mysqli_query($connect,"SELECT * FROM files where file_name LIKE '%".mysql_real_escape_string($s)."%'");
		            	if ($query) 
		            	{
		            	   $rows=mysqli_num_rows($query);
		            	   if ($rows>0) 
		            	    {
		            	   	     while ($values=mysqli_fetch_assoc($query)) 
		            	   	     {
		            	   	           
                    					echo'<div class="container">
        									 <div class="row">
            							   	 <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                							 <div class="post-preview">
                  							 <h2 class="post-title">
                         					'.html_entity_decode($values["file_desc"]).'</h2>

                   						     <a href="'.$values["file"].'">'.$values["file_name"].'</a> 
                   							 </div>
                							 <hr>
              								 </div>
            	   							 </div> 
                  							 </div>';	
		            	   	     }
		            	   	}
		            	   	else
		            	   	{
                                echo "<center><font size='5'><p class='text-danger'>Oops ! No results found</p></font></center>";
			
		            	   	}	
		            	}
   
					
				} 
            }
       } 
       elseif ($sel_value=="files") 
       {
           
		            	$query = mysqli_query($connect,"SELECT * FROM files where file_name LIKE '%".mysql_real_escape_string($s)."%'");
		            	if ($query) 
		            	{
		            	   $rows=mysqli_num_rows($query);
		            	   if ($rows>0) 
		            	    {
		            	   	     while ($values=mysqli_fetch_assoc($query)) 
		            	   	     {
		            	   	           
                    					echo'<div class="container">
        									 <div class="row">
            							   	 <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                							 <div class="post-preview">
                  							 <h2 class="post-title">
                         					'.html_entity_decode($values["file_desc"]).'</h2>

                   						     <a href="'.$values["file"].'">'.$values["file_name"].'</a> 
                   							 </div>
                							 <hr>
              								 </div>
            	   							 </div> 
                  							 </div>';	
		            	   	     }
		            	   	}
		            	   	else
		            	   	{
                                echo "<center><font size='5'><p class='text-danger'>Oops ! No results found</p></font></center>";
			
		            	   	}
       }
      } 
       else
       {
       
		  $query = mysqli_query($connect,"SELECT * FROM blog_master where $sel_value LIKE '%".mysql_real_escape_string($s)."%'");
          
	      if($query)
	     {
		     $rows=mysqli_num_rows($query);   

    	     if($rows>0)
    	     {	 
       
                
     		     while($values = mysqli_fetch_assoc($query))
      		    { 
                 
                     $pos=0;  
                     $keyword = $s;
                    if ($sel_value!="blog_desc") 
                    {
                    	$values[$sel_value] = preg_replace("/($keyword)/i","<b style='color: brown;''>$1</b>", $values[$sel_value]);

                    }
                    else
                    {

                       $pos=stripos($values["blog_desc"], $s);
                       $values["blog_desc"] = preg_replace("/($keyword)/i","<b style='color: brown;''>$1</b>", $values["blog_desc"]);
                    	
                    }
                    echo'<div class="container">
        			<div class="row">
            		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                	<div class="post-preview">
                   	<a href="detail.php?x='.html_entity_decode($values["blog_id"]).'">
                  	<h2 class="post-title">
                         	'.html_entity_decode($values["blog_title"]).'
                   	</h2>
                   	<h3 class="post-subtitle">
                            	'.html_entity_decode($values["blog_category"]).'
                  	</h3>
                   	</a>
                   	<p class="post-meta">Posted by <a href="author.php?x='. html_entity_decode($values["blogger_id"]). '""> '. html_entity_decode($values["blog_author"]). '</a> on '. html_entity_decode($values["creation_date"]).' </p>
                   	<p class="post-meta">'.substr(html_entity_decode($values["blog_desc"]),$pos,$pos+400).'</p>
                	</div>
                	<hr>
              		</div>
            	    </div> 
                    </div>';

                }
             }
            else
            {
		      echo "<center><font size='5'><p class='text-danger'>Oops ! No results found</p></font></center>";
	        } 
        }	//ifquery	
     }//else
}
else
{
	$query = mysqli_query($connect,"SELECT * FROM blog_master");

	if($query)
	{
		$rows=mysqli_num_rows($query);   

    	if($rows>0)
    	{	 
      
        
     		 while($values = mysqli_fetch_assoc($query))
      		{

  				echo'<div class="container">
        			<div class="row">
            		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                	<div class="post-preview">
                   	<a href="detail.php?x='.html_entity_decode($values["blog_id"]).'">
                  	<h2 class="post-title">
                         	'.html_entity_decode($values["blog_title"]).'
                   	</h2>
                   	<h3 class="post-subtitle">
                            	'.html_entity_decode($values["blog_category"]).'
                  	</h3>
                   	</a>
                   	<p class="post-meta">Posted by <a href="author.php?x='. html_entity_decode($values["blogger_id"]). '""> '. html_entity_decode($values["blog_author"]). '</a> on '. html_entity_decode($values["creation_date"]).' </p>
                   	<p class="post-meta">'.substr(html_entity_decode($values["blog_desc"]),0,400).'</p>
                	</div>
                	<hr>
              		</div>
            	   </div> 
                  </div>';

      }
    }

  }
}
?>
