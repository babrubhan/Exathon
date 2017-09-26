 var qnum=1;
 var countq = 0;
 var b_status=-1; 
  var candidate_name;
  var fetch_user_r1=new Array();
  
jQuery(window).on("load", function(){
      candidate_name = $('.candidate_name').text();
     
//Start Temperorary code for color indications of the software 
$( '.quest_num_sub_div').each(function() {
   // var q_num=$(this).val();
   countq++;
 
});
 
var ident="allv";
   
    $.post('./is_visited_color.php',{candidate_name:candidate_name,ident:ident},function(data){
        
            var result1 = $.parseJSON(data);
            
          for(var i=0; i<countq; i++){
            
            if(result1[i] == 2){
          $('#'+(i+1)).css("background-color","red");
         $('#'+(i+1)).css("border","1px solid red");
         }
         else if(result1[i] == 1){
          $('#'+(i+1)).css("background-color","green");
         $('#'+(i+1)).css("border","1px solid green");
         }
          else if(result1[i] == 4){
          $('#'+(i+1)).css("background-color","blue");
        
          $('#'+(i+1)).css("border","1px solid blue");
         }
       else if(result1[i] == 3){
          $('#'+(i+1)).css("background-color","blue");
         
           $('#'+(i+1)).css("border","4px solid black");
         }
         
          }
           
}); 



 //End Temperorary code for color indications of the software
      
  fetch_user_res();
            
        $.post('./visited_q.php',{qnum:qnum,candidate_name:candidate_name},function(data){
           //alert(data);
            });
             var mark_rev_btn = "button";
    $.post('./mark_for_review.php',{qnum:qnum,candidate_name:candidate_name,mark_rev_btn:mark_rev_btn},function(data){
      $('#mrk_rview').val(data);
            });
            
         
            
            
        $.post('./fetch_question.php',{qnum:qnum},function(data){
            
       var result = $.parseJSON(data);
      
          $('.quest_num').html("Question No. "+qnum);
       $( '.quest_pannel' ).html(result[0]);
      $( '.radio1' ).html(result[1] );
    $( '.radio2' ).html(result[2] );
    $( '.radio3' ).html(result[3] );
    $( '.radio4' ).html(result[4] );
     
         
    });
 
});
$(document).ready(function(){
    candidate_name = $('.candidate_name').text();
    var array_retriv;
    //start Disable Button
    
    
   $('#deselect').click(function(){
     var q_ans_no=0;
     $.post('./save_response.php',{qnum:qnum,q_ans_no:q_ans_no,candidate_name:candidate_name},function(data){
           //alert(data);
            });
    deselect_fun();
    });
    //End Disable Button 
      
   $('#save').click(function(){
    var quest_num=$('#quest_num').val();
    
    $.post('./quest_config_save.php',{quest_num:quest_num},function(data){
        alert(data);
        
    });
   });
   
   $('#reset').click(function(){
    $('#qTextBox').val("");
    $('#aTextBox1').val("");
    $('#aTextBox2').val("");
    $('#aTextBox3').val("");
    $('#aTextBox4').val("");
  
   });
   
  
   $('#qSave').click(function(){
    var qTextBox=$('#qTextBox').val();
    var aTextBox1=$('#aTextBox1').val();
    var aTextBox2=$('#aTextBox2').val();
    var aTextBox3=$('#aTextBox3').val();
    var aTextBox4=$('#aTextBox4').val();
    $.post('./quest_ans.php',{qTextBox:qTextBox,aTextBox1:aTextBox1,aTextBox2:aTextBox2,aTextBox3:aTextBox3,aTextBox4:aTextBox4},function(data){
       alert(data); 
    });
   });
   
   //Start Radio button
   $('input[type="radio"]').on('click', function() {
     var q_ans_no=$(this).attr("class");
   //  var candidate_name = $('.candidate_name').text();
     //alert(candidate_name);
      //  A[qnum-1]=name;
     
        $.post('./save_response.php',{qnum:qnum,q_ans_no:q_ans_no,candidate_name:candidate_name},function(data){
      // localStorage.setItem("array_stor", JSON.stringify(A));
   // alert(data);
     });
      
    });
   //End Radio Button
   
  //Start Mark for review
  $('#mrk_rview').click(function(){
  var mark_rev_btn = "mark1";
    $.post('./mark_for_review.php',{qnum:qnum,candidate_name:candidate_name,mark_rev_btn:mark_rev_btn},function(data){
       // alert(data);
       $('#mrk_rview').val(data);
       
        });
    
 //temprary mark of review color indication
 var ident="alls";
   b_status = qnum;
  
    $.post('./is_visited_color.php',{candidate_name:candidate_name,ident:ident,b_status:b_status},function(data){
         
           var result3 = $.parseJSON(data);
           
        if(result3[1] == 2){
          $('#'+(result3[0])).css("background-color","red");
         $('#'+(result3[0])).css("border","1px solid red");
        
         }
         else if(result3[1] == 1){
          $('#'+(result3[0])).css("background-color","green");
         $('#'+(result3[0])).css("border","1px solid green");
        
         }
        else if(result3[1] == 4){
          $('#'+result3[0]).css("background-color","blue");
        
          $('#'+result3[0]).css("border","1px solid blue");
         }
       else if(result3[1] == 3){
          $('#'+result3[0]).css("background-color","blue");
         
           $('#'+result3[0]).css("border","4px solid black");
         }
       
         
         
        
           
}); 
 //temprary mark of review color indication   
  });
  
  //End of Mark for reviw
//Stsrt Save and next button
 
    $('#sav_next').click(function(){
     
         qnum=parseInt(qnum)+1;
        fetch_user_res();
          $.post('./fetch_question.php',{qnum:qnum},function(data){
       var result = $.parseJSON(data);
        $('.quest_num').html("Question No. "+qnum);
       $( '.quest_pannel' ).html(result[0]);
      $( '.radio1' ).html(result[1] );
    $( '.radio2' ).html(result[2] );
    $( '.radio3' ).html(result[3] );
    $( '.radio4' ).html(result[4] );
    });
    
    $.post('./visited_q.php',{qnum:qnum,candidate_name:candidate_name},function(data){
        //   alert(data);
            });
            
 //start temprary  for button click

  if(b_status!=-1){
    
        var ident="alls";
   
    $.post('./is_visited_color.php',{candidate_name:candidate_name,ident:ident,b_status:b_status},function(data){
         
            var result3 = $.parseJSON(data);;
            
      
            if(result3[1] == 2){
          $('#'+(result3[0])).css("background-color","red");
         $('#'+(result3[0])).css("border","1px solid red");
          
         }
         else if(result3[1] == 1){
          $('#'+(result3[0])).css("background-color","green");
         $('#'+(result3[0])).css("border","1px solid green");
         
         }
        else if(result3[1] == 4){
          $('#'+result3[0]).css("background-color","blue");
       
          $('#'+result3[0]).css("border","1px solid blue");
         }
       else if(result3[1] == 3){
          $('#'+result3[0]).css("background-color","blue");
        
           $('#'+result3[0]).css("border","4px solid black");
         }
       
         
         
        
           
}); 


      }
       b_status=qnum;
//end temprary  for button click
    });
//end save and next button
 //Start Question NUmver 
 
    $('.quest_num_sub_div').click(function(){
       deselect_fun();
       qnum=$(this).val();
//start temprary  for button click

  if(b_status!=-1){
    
        var ident="alls";
   
    $.post('./is_visited_color.php',{candidate_name:candidate_name,ident:ident,b_status:b_status},function(data){
         
            var result3 = $.parseJSON(data);;
            
      
            if(result3[1] == 2){
          $('#'+(result3[0])).css("background-color","red");
         $('#'+(result3[0])).css("border","1px solid red");
          
         }
         else if(result3[1] == 1){
          $('#'+(result3[0])).css("background-color","green");
         $('#'+(result3[0])).css("border","1px solid green");
       
         }
        else if(result3[1] == 4){
          $('#'+result3[0]).css("background-color","blue");
       
          $('#'+result3[0]).css("border","1px solid blue");
         }
       else if(result3[1] == 3){
          $('#'+result3[0]).css("background-color","blue");
        
           $('#'+result3[0]).css("border","4px solid black");
         }
         
        
           
}); 


      }
//end temprary  for button click
   //array_retriv = localStorage.getItem("array_stor");
   //A= JSON.parse(array_retriv);
   /* alert(array_retriv);
   var ArrayOfInts = array_retriv.split(',').map(Number);
   A=ArrayOfInts;
  alert(ArrayOfInts);*/

    
  

  
            fetch_user_res();
     
         $.post('./fetch_question.php',{qnum:qnum},function(data){
       var result = $.parseJSON(data);
        $('.quest_num').html("Question No. "+qnum);
       $( '.quest_pannel' ).html(result[0]);
      $( '.radio1' ).html(result[1] );
    $( '.radio2' ).html(result[2] );
    $( '.radio3' ).html(result[3] );
    $( '.radio4' ).html(result[4] );
    });
    
    $.post('./visited_q.php',{qnum:qnum,candidate_name:candidate_name},function(data){
         //   alert(data);
            });
            var mark_rev_btn = "button";
    $.post('./mark_for_review.php',{qnum:qnum,candidate_name:candidate_name,mark_rev_btn:mark_rev_btn},function(data){
      $('#mrk_rview').val(data);
            });
  
     b_status=qnum;
          
   });
   
   //End Question NUmver 
   
   var chk_var=0;
   $('.sel_all').click(function(){
  
   
    if(chk_var==0){
        $('.chk_box').prop('checked', true);
        
        chk_var=1;
    }
    else{
        $('.chk_box').prop('checked', false);
        chk_var=0;
    }
   
   
   });
//////////////////////////////////////////////////////////////////////   
   $('.crt_table').click(function(){
    
  
 var chk_sel_arr=new Array();
  
  $('.can_eid').each(function(i){
       chk_sel_arr[i]=$(this).text();
        var t_name=chk_sel_arr[i].trim();
        
       
        $.post('./creat_and_del.php',{t_name:t_name},function(data){
           //alert(data);
        });
       
    });
 
    
   
        
   });
   // alert($('.can_eid').text());
   //chk_sel_arr=JSON.parse($('.can_eid').text());
///////////////////////////////////////////////////////////////////////////
 
});

function deselect_fun(){
    $( '#radio1').prop('checked', false);
    $( '#radio2').prop('checked', false);
    $( '#radio3').prop('checked', false);
    $( '#radio4').prop('checked', false);
}

function fetch_user_res(){
           $.post('./fetch_user_response.php',{qnum:qnum,candidate_name:candidate_name},function(data){
     
        
        fetch_user_r1=$.parseJSON(data);
         deselect_fun();
         if(fetch_user_r1[1] == 1){
            $( '#radio1').prop('checked', true);
         }
         else if(fetch_user_r1[1] == 2){
            $( '#radio2').prop('checked', true);
         }
          else if(fetch_user_r1[1] == 3){
            $( '#radio3').prop('checked', true);
         }
          else if(fetch_user_r1[1] == 4){
            $( '#radio4').prop('checked', true);
         }
        
        //$('#1').val("jdfg");
         
    });
         
}

