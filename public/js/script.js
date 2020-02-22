$(document).ready(function(){
  
  $("#submitWeather").click(function(){
            
        var city = $("#city").val();
        var key  = 'df88b4e3b544dce8edf4b359dc982656';

         if(city !=''){

          $.ajax({

            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid: key, units: 'metric'},
            // data:{q:city, appid: key, units: 'metric' , lang:'ar', mode:'html'}

            success: function(data){
              var wf = '';
              $.each(data.weather, function(index, val){

                wf += '<p><b>' + data.name + "</b><img src=http://openweathermap.org/img/wn/"+ val.icon +"@2x.png></p>"+ data.main.temp + '&deg;C ' + 
                ' | ' + val.main + ", " + val.description 

              });
            
             $("#showWeather").html(wf);
            }

          })

        }else{

          $("#error").html("<div class='alert alert-danger' id='errorCity'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Field cannot be empty</div>");
        }
        
        

  });
});
