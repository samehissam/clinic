function printDiv(id) {

  var html = "";

  $('link').each(function() { // find all <link tags that have
    if ($(this).attr('rel').indexOf('stylesheet') !=-1) { // rel="stylesheet"
      html += '<link rel="stylesheet" href="'+$(this).attr("href")+'" />';

    }
  });

  html += '<body onload="window.print()">'+$("#"+id).html()+'</body>';
  var w = window.open("","print");

  w.document.open();
  w.document.write(html);
  w.document.close();
  setTimeout(function(){w.close();},10);


}

function printPart(id){
  $("td:last-child").remove();
  $("th:last-child").remove();

  var html = "";

  $('link').each(function() { // find all <link tags that have
    if ($(this).attr('rel').indexOf('stylesheet') !=-1) { // rel="stylesheet"
      html += '<link rel="stylesheet" href="'+$(this).attr("href")+'" />';
    }
  });

  html += '<body onload="window.print()">'+$("#"+id).html()+'</body>';

  var w = window.open("","print");

  w.document.open();
  w.document.write(html);
  w.document.close();
  setTimeout(function(){w.close();},10);
  setTimeout( function(){
    window.open(window.location,"_self");
  }  , 100 );
}
$(document).ready(function() {



  window.setInterval(event, 4000);

function event() {
  if ($(".overlay")[0]){
     $(".index").removeClass("overlay");
    $(".index").addClass("img-cover");

} else {
  $(".index").removeClass("img-cover");
  $(".index").addClass("overlay");

}
}

  //$('#resume').prev('div.resumehint');

  $("form").on("submit",function() {

    $('input,textarea,select').attr('required',"required").filter(':visible').each(function(i, requiredField){

           if($(requiredField).val()==='')
           {
               $(requiredField).addClass('animated  shake');
             $(requiredField).on(
        "transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd",
        function() {
            $(this).removeClass("animated  shake");
        }
    );
           }
       });


  //to animate input fileds if not validated
    $(".btn").click(function(){
  $('input,textarea,select').attr('required',"required").filter(':visible').each(function(i, requiredField){

       if($(requiredField).val()==='')
       {
           $(requiredField).addClass('animated  shake');
         $(requiredField).on(
    "transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd",
    function() {
        $(this).removeClass("animated  shake");
    }
);
       }
   });
});
});
  $(document).on("click", ".item_select", function () {
           var clickedBtnID = $(this).attr('id'); // or var clickedBtnID = this.id
                  var id="#"+clickedBtnID;
                   $(id).select2({
                     placeholder: "حدد الصنف",
                     allowClear: true
                   });

                 });




//   $(function(){
//
//   $('.sum').each(function(){
//     total += parseFloat(this.value);
// });
//   $('#total').html("Total="+total.toString());
// });
  $('#item_select').select2({
    placeholder: "حدد الصنف",
    allowClear: true
  });



  $('#stock_select').select2({
    placeholder: "حدد المخزن",
    allowClear: true
  });
  $('#doctor_select').select2({
    placeholder: "حدد الطبيب",
    allowClear: true
  });
  $('#patient_select').select2({
    placeholder: "حدد المريض",
    allowClear: true
  });


  /*
  To remove the last column before printting
  $("td:last-child").remove();
  $("th:last-child").remove();
  */
  $('#print').click(function(){
$('#report').printArea();

    });



  $('#emp-print').click(function(){
    $("td:last-child").remove();
    $("th:last-child").remove();
    $('#report').printArea();
    setTimeout( function(){
      window.open("/clinic/frontend/web/index.php?r=employe/report","_self");
    }  , 1000 );

  });

  //toggle tabs hidden class when clik the btn-toggle
  $(".btn-toggle").click(function(){
    $("#tab").toggleClass("hidden");

  });

  // $(".req").val("0")
  //prop('required',true);
  // var arrow_keys_handler = function(e) {
  //     switch(e.keyCode){
  //         case 37: case 39: case 38:  case 40: // Arrow keys
  //         case 32: e.preventDefault();  break; // Space
  //         default: break; // do not block other keys
  //     }
  // };
  // window.addEventListener("keydown", arrow_keys_handler, false);
//  $('#barcode').focus();
//   document.documentElement.addEventListener('keydown', function (e) {
//     if ( ( e.keycode || e.which ) == 32) {
//         e.preventDefault();
//
//     }}
// );



  $("#barcode").on("keydown", function (e) {
      return e.which !== 32;
  });
  // USE space key to add orders and prevent scroll


    window.onkeydown = function(e) {
    if(e.keyCode == 13 ){
      $('#add-order').click();

    }else if (e.keyCode == 16) {
      if ($(".orders-form").length > 0 && $('.invoic-p').is(':visible')){
      $('.invoic-p').printArea();
      setTimeout( function(){
    window.open("/shop/frontend/web/index.php?r=orders/create","_self");
 }  , 1000 );
 }
    }else if (e.keyCode == 13) {
    //    $('#barcode').focus();
      }else   if(e.keyCode == 32){

           $('#barcode').focus();

       }



        //  $('#get-money').focus();

};

  // how to select items from dropDownList
  // .filter(function () {
  //     return ($(this).val() == val); //To select Blue
  // }).prop('selected', true);
  $("#barcode").focusin(function(){
        $(this).css("background-color", "red");
    });
    $("#barcode").focusout(function(){
        $(this).css("background-color", "#FFFFFF");
    });
  // $("body").blur(function(e) {
  //   $('#barcode').focus();
  //       //  e.preventDefault();
  //       //  e.stopPropagation();
  //  });
      // Hide the menus


$("#invoic-p").click(function(){

  $('.invoic-p').printArea();
  setTimeout( function(){
window.open("/shop/frontend/web/index.php?r=orders/create","_self");
}  , 1000 );



});


  //get item-btn click to get value and set it to barcode field

//                $(".item-btn").click(function () {
//
//                    var val = $(this).val();
//                       $('#barcode').focus();
//                    //check which input available
//                    var ids=getId();
//                    var num1=ids-1;
//                    var barcodeId="#orders-"+num1+"-barcode";
//                    var names=getProduct();
//                    var name1=names-1;
//                    var product_name="#orders-"+name1+"-product_name";
//                    var cost=getCost();
//                    var cost1=cost-1;
//                    var product_cost="#orders-"+cost1+"-cost";
//                    orderBarcode=$(barcodeId).val().length;
//
//                       if(ids==1 && orderBarcode == 0){
//                         var barcode=val;
//                       $(barcodeId).val(barcode);
//                       //$(barcodeId).prop('disabled', true);
//
//                  //     $('#barcode').focus();
//                  var barcodeValue=val;
//                   if($.trim(barcodeValue) !=''){
//                       /* thsi path to work on heroku not local*/
//                       $.post("/shop/frontend/web/Data/product-details.php",
//                           {barcodeValue},function(data){
//
//                          //    var name= data.substr(0, data.indexOf('!'));
//                          //
//                          // $('#product-name').val(name);
//                            d = JSON.parse(data);
//                            price=d.sale_cost;
//                           $(product_name).val(d.model);
//                             $(product_cost).val(price);
//                          //    $('#orders-0-order_qty').change(function(){
//                          //       var e = $("#orders-0-order_qty").val();
//                          //       totalcost=e*price;
//                          //       $(product_cost).val(totalcost);
//                          //
//                          //
//                          // });
//
//                          $('#barcode').val('');
//                           });
//
//                   }
//
//                     }
//
//                    else{
//
//
//                    $('.add-item:last').click();
//                    $('.add-item').hide();
//                    var ids=getId();
//                    var num1=ids-1;
//                    var barcodeId="#orders-"+num1+"-barcode";
//                    var names=getProduct();
//                    var name1=names-1;
//                    var product_name="#orders-"+name1+"-product_name";
//                    var cost=getCost();
//                    var cost1=cost-1;
//                    var product_cost="#orders-"+cost1+"-cost";
//                    // orderBarcode=$(barcodeId).val().length;
//
//                     var barcodeId2="#orders-"+num1+"-barcode";
//                      orderBarcode2=$(barcodeId2).val().length;
//                    // alert(barcodeId2);
//
//                    $(barcodeId2).val(val);
//                    //$(barcodeId2).prop('disabled', true);
//                    // alert(barcodeId2);
//                    var barcodeValue=val;
//                     if($.trim(barcodeValue) !=''){
//                         /* thsi path to work on heroku not local*/
//                         $.post("/shop/frontend/web/Data/product-details.php",
//                             {barcodeValue},function(data){
//
//                            //    var name= data.substr(0, data.indexOf('!'));
//                            //
//                            // $('#product-name').val(name);
//                              d = JSON.parse(data);
//
//                              $(product_name).val(d.model);
//                              price=d.sale_cost;
//                             $(product_name).val(d.model);
//                               $(product_cost).val(price);
//                            //    $('#orders-0-order_qty').change(function(){
//                            //       var e = $("#orders-0-order_qty").val();
//                            //       totalcost=e*price;
//                            //       $(product_cost).val(totalcost);
//                            //
//                            //
//                            // });
//
//
//                            $('#barcode').val('');
//                             });
//                    $('#barcode').focus();
//                      }
// }
//                  });
//
//                   //    $('#barcode').val(val);
                  // //    setTimeout( function(){
                  // //   $('#barcode').trigger("change");
                  // //  }  , 1000 );
                  //
                  //   $('#barcode').focus();





$('#search').on('click',function(){
       var phone=$("#client-phone").val();
        if($.trim(phone) !==''){
            /* thsi path to work on heroku not local*/
            $.post("/shop/frontend/web/Data/client.php",
                {phone},function(data){
                   // alert(data);
                    var name= data.substr(0, data.indexOf('!'));

                 $('#client-name').val(name);


                });

        }
   });
});
