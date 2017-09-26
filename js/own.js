$(document).ready(function(){
	
		//$.post('./inde.php')
	
       
       $('.upanel').click(function(){
       var uemail= $('#uemail').val();
       alert(uemail);
       $.post('./online_exam_index.php',{uemail:uemail},function(data){
      // alert(data);
        
              });
       });
});