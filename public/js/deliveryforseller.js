
function step1(){
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var step3 = document.getElementById('step3');
  var step4 = document.getElementById('step4');
  var btnstep1 = document.getElementById('btnNextStep1').value;
  var btnstep2 = document.getElementById('btnNextStep2').value;
  var btnstep3 = document.getElementById('btnNextStep3').value;
  var btnstep4 = document.getElementById('btnNextStep4').value;

  if (btnstep1 == 1 && btnstep2 == 0 && btnstep3 == 0 && btnstep4 == 0 ) {
      step1.classList.remove("is-active");
      step1.classList.add("is-complete");
      step2.classList.add("is-active");
      step2.classList.remove("is-complete");
      step3.classList.remove("is-complete");
      step4.classList.remove("is-complete");
      document.getElementById('btnNextStep1').disabled = true;
      document.getElementById('btnNextStep2').disabled = false;
      document.getElementById('btnNextStep3').disabled = true;
      document.getElementById('btnNextStep4').disabled = true;  }
  else if(btnstep1 == 0 && btnstep2 == 0 && btnstep3 == 0 && btnstep4 == 0 ){
    step1.classList.add("is-active");
    step2.classList.remove("is-complete");
    step3.classList.remove("is-complete");
    step4.classList.remove("is-complete");
    document.getElementById('btnNextStep1').disabled = false;
    document.getElementById('btnNextStep2').disabled = true;
    document.getElementById('btnNextStep3').disabled = true;
    document.getElementById('btnNextStep4').disabled = true;
  }
}


$('#btnNextStep1').click(function(e) {
        var step1 = document.getElementById('step1');
        var step2 = document.getElementById('step2');
        var step3 = document.getElementById('step3');
        var step4 = document.getElementById('step4');
        var receivedOrder = 1;
        var orderId = document.getElementById('idOrder').value;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"/receivedOrder",
            method:"POST",
            data:{
              receivedOrder: receivedOrder,
              orderId : orderId,
                _token: _token  
            },
            success:function(data)
            {
               if (data == "success") {
                    step1.classList.remove("is-active");
                    step1.classList.add("is-complete");
                    step2.classList.add("is-active");
                    step2.classList.remove("is-complete");
                    step3.classList.remove("is-complete");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = false;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = true;
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                    $('meta[name=notification]').attr('icon', '#008000');
                    
                }else if (data == "failed") {
                    step1.classList.add("is-active");
                    step2.classList.remove("is-complete");
                    step3.classList.remove("is-complete");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = false;
                    document.getElementById('btnNextStep2').disabled = true;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = true;                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }else{
                      step1.classList.add("is-active");
                      step2.classList.remove("is-complete");
                      step3.classList.remove("is-complete");
                      step4.classList.remove("is-complete");
                      document.getElementById('btnNextStep1').disabled = false;
                      document.getElementById('btnNextStep2').disabled = true;
                      document.getElementById('btnNextStep3').disabled = true;
                      document.getElementById('btnNextStep4').disabled = true;                  
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                };
            },
            error: function(data, textStatus, errorThrown) {
                step1.classList.add("is-active");
                step2.classList.remove("is-complete");
                step3.classList.remove("is-complete");
                step4.classList.remove("is-complete");
                document.getElementById('btnNextStep1').disabled = false;
                document.getElementById('btnNextStep2').disabled = true;
                document.getElementById('btnNextStep3').disabled = true;
                document.getElementById('btnNextStep4').disabled = true;               
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                $('meta[name=notification]').attr('icon', '#ffa500');
            }
        })
});

function step2(){
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var step3 = document.getElementById('step3');
  var step4 = document.getElementById('step4');
  var btnstep1 = document.getElementById('btnNextStep1').value;
  var btnstep2 = document.getElementById('btnNextStep2').value;
  var btnstep3 = document.getElementById('btnNextStep3').value;
  var btnstep4 = document.getElementById('btnNextStep4').value;
  if (btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 0 && btnstep4 == 0 ) {
      step1.classList.add("is-complete");
      step2.classList.remove("is-active");
      step2.classList.add("is-complete");
      step3.classList.add("is-active")
      step3.classList.remove("is-complete");
      step4.classList.remove("is-complete");
      document.getElementById('btnNextStep1').disabled = true;
      document.getElementById('btnNextStep2').disabled = true; 
      document.getElementById('btnNextStep3').disabled = false;
      document.getElementById('btnNextStep4').disabled = true;
  }
  else if(btnstep1 == 1 && btnstep2 == 0 && btnstep3 == 0 && btnstep4 == 0 )  {
    step1.classList.add("is-complete");
    step2.classList.remove("is-active");
    step3.classList.remove("is-complete");
    step4.classList.remove("is-complete");
    document.getElementById('btnNextStep1').disabled = true;
    document.getElementById('btnNextStep2').disabled = false;
    document.getElementById('btnNextStep3').disabled = true;
    document.getElementById('btnNextStep4').disabled = true; 

  }
}

$('#btnNextStep2').click(function(e) {
        var step1 = document.getElementById('step1');
        var step2 = document.getElementById('step2');
        var step3 = document.getElementById('step3');
        var step4 = document.getElementById('step4');
        var packagedOrder = 1;
        var orderId = document.getElementById('idOrder').value;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"/packagedOrder",
            method:"POST",
            data:{
              packagedOrder: packagedOrder,
              orderId : orderId,
                _token: _token  
            },
            success:function(data)
            {
               if (data == "success") {
                    step1.classList.add("is-complete");
                    step2.classList.remove("is-active");
                    step2.classList.add("is-complete");
                    step3.classList.add("is-active")
                    step3.classList.remove("is-complete");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = true; 
                    document.getElementById('btnNextStep3').disabled = false;
                    document.getElementById('btnNextStep4').disabled = true; 
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                    $('meta[name=notification]').attr('icon', '#008000');
                    
                }else if (data == "failed") {
                    step1.classList.add("is-complete");
                    step2.classList.remove("is-active");
                    step3.classList.remove("is-complete");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = false;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = true; 
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }else{
                      step1.classList.add("is-complete");
                      step2.classList.remove("is-active");
                      step3.classList.remove("is-complete");
                      step4.classList.remove("is-complete");
                      document.getElementById('btnNextStep1').disabled = true;
                      document.getElementById('btnNextStep2').disabled = false;
                      document.getElementById('btnNextStep3').disabled = true;
                      document.getElementById('btnNextStep4').disabled = true;                 
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                };
            },
            error: function(data, textStatus, errorThrown) {
                step1.classList.add("is-complete");
                step2.classList.remove("is-active");
                step3.classList.remove("is-complete");
                step4.classList.remove("is-complete");
                document.getElementById('btnNextStep1').disabled = true;
                document.getElementById('btnNextStep2').disabled = false;
                document.getElementById('btnNextStep3').disabled = true;
                document.getElementById('btnNextStep4').disabled = true;
               $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                $('meta[name=notification]').attr('icon', '#ffa500');
            }
        })
});

function step3(){
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var step3 = document.getElementById('step3');
  var step4 = document.getElementById('step4');
  var btnstep1 = document.getElementById('btnNextStep1').value;
  var btnstep2 = document.getElementById('btnNextStep2').value;
  var btnstep3 = document.getElementById('btnNextStep3').value;
  var btnstep4 = document.getElementById('btnNextStep4').value;
  if (btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 1 && btnstep4 == 0 ) {
      step1.classList.add("is-complete");
      step2.classList.add("is-complete");
      step3.classList.remove("is-active")
      step3.classList.add("is-complete")
      step4.classList.add("is-active");
      step4.classList.remove("is-complete");
      document.getElementById('btnNextStep1').disabled = true;
      document.getElementById('btnNextStep2').disabled = true;
      document.getElementById('btnNextStep3').disabled = true;
      document.getElementById('btnNextStep4').disabled = false;

  }
  else if(btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 0 && btnstep4 == 0 )  {
    step1.classList.add("is-complete");
    step2.classList.remove("is-complete");
    step3.classList.remove("is-active");
    step4.classList.remove("is-complete");
    document.getElementById('btnNextStep1').disabled = true;
    document.getElementById('btnNextStep2').disabled = true;
    document.getElementById('btnNextStep3').disabled = true;
    document.getElementById('btnNextStep4').disabled = false;

  }
}

$('#btnNextStep3').click(function(e) {
        var step1 = document.getElementById('step1');
        var step2 = document.getElementById('step2');
        var step3 = document.getElementById('step3');
        var step4 = document.getElementById('step4');
        var inprogress = 1;
        var orderId = document.getElementById('idOrder').value;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"/inprogressOrder",
            method:"POST",
            data:{
              inprogress: inprogress,
              orderId : orderId,
                _token: _token  
            },
            success:function(data)
            {
               if (data == "success") {
                    step1.classList.add("is-complete");
                    step2.classList.add("is-complete");
                    step3.classList.remove("is-active")
                    step3.classList.add("is-complete")
                    step4.classList.add("is-active");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = true;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = false;
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                    $('meta[name=notification]').attr('icon', '#008000');
                    
                }else if (data == "failed") {
                    step1.classList.add("is-complete");
                    step2.classList.remove("is-complete");
                    step3.classList.remove("is-active");
                    step4.classList.remove("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = true;
                    document.getElementById('btnNextStep3').disabled = false;
                    document.getElementById('btnNextStep4').disabled = false;
                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }else{
                      step1.classList.add("is-complete");
                      step2.classList.remove("is-complete");
                      step3.classList.remove("is-active");
                      step4.classList.remove("is-complete");
                      document.getElementById('btnNextStep1').disabled = true;
                      document.getElementById('btnNextStep2').disabled = true;
                      document.getElementById('btnNextStep3').disabled = false;
                      document.getElementById('btnNextStep4').disabled = false;                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                };
            },
            error: function(data, textStatus, errorThrown) {
                step1.classList.add("is-complete");
                step2.classList.remove("is-complete");
                step3.classList.remove("is-active");
                step4.classList.remove("is-complete");
                document.getElementById('btnNextStep1').disabled = true;
                document.getElementById('btnNextStep2').disabled = true;
                document.getElementById('btnNextStep3').disabled = false;
                document.getElementById('btnNextStep4').disabled = false;  
                $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                $('meta[name=notification]').attr('icon', '#ffa500');
            }
        })
});

function step4(){
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var step3 = document.getElementById('step3');
  var step4 = document.getElementById('step4');
  var btnstep1 = document.getElementById('btnNextStep1').value;
  var btnstep2 = document.getElementById('btnNextStep2').value;
  var btnstep3 = document.getElementById('btnNextStep3').value;
  var btnstep4 = document.getElementById('btnNextStep4').value;
  if (btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 1 && btnstep4 == 1 ) {
      step1.classList.add("is-complete");
      step2.classList.add("is-complete");
      step3.classList.add("is-complete")
      step4.classList.remove("is-active");
      step4.classList.add("is-complete");
      document.getElementById('btnNextStep1').disabled = true;
      document.getElementById('btnNextStep2').disabled = true;
      document.getElementById('btnNextStep3').disabled = true;
      document.getElementById('btnNextStep4').disabled = true;
  }
  else if(btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 1 && btnstep4 == 0 )  {
    step1.classList.add("is-complete");
    step2.classList.add("is-complete");
    step3.classList.add("is-complete");
    step4.classList.add("is-active");
    document.getElementById('btnNextStep1').disabled = true;
    document.getElementById('btnNextStep2').disabled = true;
    document.getElementById('btnNextStep3').disabled = true;
    document.getElementById('btnNextStep4').disabled = false;

  }
}

$('#btnNextStep4').click(function(e) {
        var step1 = document.getElementById('step1');
        var step2 = document.getElementById('step2');
        var step3 = document.getElementById('step3');
        var step4 = document.getElementById('step4');
        var idBoook = document.getElementById("idBookdelivery").value;

        var shippedOrder = 1;
        var orderId = document.getElementById('idOrder').value;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"/shippedOrder",
            method:"POST",
            data:{
              shippedOrder: shippedOrder,
              idBoook:idBoook,
              orderId : orderId,
                _token: _token  
            },
            success:function(data)
            {
               if (data == "success") {
                    step1.classList.add("is-complete");
                    step2.classList.add("is-complete");
                    step3.classList.add("is-complete")
                    step4.classList.remove("is-active");
                    step4.classList.add("is-complete");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = true;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = true;
                    $('meta[name=notification]').attr('content', 'success');
                    $('meta[name=notification]').attr('title', 'Thành công -  Successfully');
                    $('meta[name=notification]').attr('noticontent', 'Thao tác được thực hiện thành công.');
                    $('meta[name=notification]').attr('icon', '#008000');
                    
                }else if (data == "failed") {
                    step1.classList.add("is-complete");
                    step2.classList.add("is-complete");
                    step3.classList.add("is-complete");
                    step4.classList.add("is-active");
                    document.getElementById('btnNextStep1').disabled = true;
                    document.getElementById('btnNextStep2').disabled = true;
                    document.getElementById('btnNextStep3').disabled = true;
                    document.getElementById('btnNextStep4').disabled = false;                    $('meta[name=notification]').attr('content', 'warning');
                    $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                    $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                    $('meta[name=notification]').attr('icon', '#ffa500');
                }else{
                      step1.classList.add("is-complete");
                      step2.classList.add("is-complete");
                      step3.classList.add("is-complete");
                      step4.classList.add("is-active");
                      document.getElementById('btnNextStep1').disabled = true;
                      document.getElementById('btnNextStep2').disabled = true;
                      document.getElementById('btnNextStep3').disabled = true;
                      document.getElementById('btnNextStep4').disabled = false;                  
                        $('#login-modal').modal('hide');
                        $('meta[name=notification]').attr('content', 'error');
                        $('meta[name=notification]').attr('title', 'Lỗi - Error');
                        $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                        $('meta[name=notification]').attr('icon', '#FF0000');
                };
            },
            error: function(data, textStatus, errorThrown) {
                step1.classList.add("is-complete");
                step2.classList.add("is-complete");
                step3.classList.add("is-complete");
                step4.classList.add("is-active");
                document.getElementById('btnNextStep1').disabled = true;
                document.getElementById('btnNextStep2').disabled = true;
                document.getElementById('btnNextStep3').disabled = true;
                document.getElementById('btnNextStep4').disabled = false;
               $('meta[name=notification]').attr('content', 'warning');
                $('meta[name=notification]').attr('title', 'Cảnh báo - Warning');
                $('meta[name=notification]').attr('noticontent', 'Lỗi.Vui lòng thực hiện lại thao tác.');
                $('meta[name=notification]').attr('icon', '#ffa500');
            }
        })
});
function onloadDelivery(){
  
var btnstep1 = document.getElementById('btnNextStep1').value;
var btnstep2 = document.getElementById('btnNextStep2').value;
var btnstep3 = document.getElementById('btnNextStep3').value;
var btnstep4 = document.getElementById('btnNextStep4').value;
if(btnstep1 == 1 && btnstep2 == 0 && btnstep3 == 0 && btnstep4 == 0 )
{
window.onload=step1();
}else if(btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 0 && btnstep4 == 0 ){
window.onload=step1();
window.onload=step2();

}else if(btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 1 && btnstep4 == 0 ){
window.onload=step1();
window.onload=step2();
window.onload=step3();

}else if(btnstep1 == 1 && btnstep2 == 1 && btnstep3 == 1 && btnstep4 == 1 ){
window.onload=step1();
window.onload=step2();
window.onload=step3();
window.onload=step4();
}
}






