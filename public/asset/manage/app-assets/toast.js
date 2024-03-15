function info_noti(message){
       $.toast({
            heading: 'Aiims Raebareli',
            text:message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3000, 
            stack: 6
          });
    }    

    function warning_noti(message){
       $.toast({
            heading: 'Aiims Raebareli',
            text:message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3000, 
            stack: 6
          });
    }        

    function success_noti(message){
       $.toast({
            heading: 'Aiims Raebareli',
            text:message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3000, 
            stack: 6
          });
    }            