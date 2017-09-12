     $(document).ready(function(){

      $('.date_cell').mouseenter(function(){
        date = $(this).attr('date');
        $(".date_popup_wrap").fadeOut();
        $("#date_popup_"+date).fadeIn();  
      });

      $('.date_cell').mouseleave(function(){
        $(".date_popup_wrap").fadeOut();      
      });   

      $('.month_dropdown').on('change',function(){
        getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
      });

      $('.year_dropdown').on('change',function(){
        getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
      });

      $(document).click(function(){
        $('#event_list').slideUp('slow');
      });
      
    });  

var WICalendar = {};

WICalendar.getCalendar = function(target_div,year,month){
      $.ajax({
        type:'POST',
        url:'WICore/WIClass/WIAjax.php',
        data: {
          action : "getCalendar",
          year  : year,
          month : month
        },    
        success:function(html){
          $('#'+target_div).html(html);
        }
      });
    }
    
     WICalendar.getEvents = function(date){
      $.ajax({
        type:'POST',
        url:'WICore/WIClass/WIAjax.php',
        data: {
            action : "getEvents",
            date   : date
        },
        success:function(response){
          $('#event_list').html(response);
          $('#event_list').slideDown('slow');
        }
      });
    }
    
     WICalendar.addEvent = function(date){
      $.ajax({
        type:'POST',
        url:'WICore/WIClass/WIAjax.php',
        data: {
          action : addEvent,
          date   : date

        },
        success:function(html){
          $('#event_list').html(html);
          $('#event_list').slideDown('slow');
        }
      });
    }
    
