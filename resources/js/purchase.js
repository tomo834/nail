
	function getStringFromDate(date) {
	 
	  var year_str = date.getFullYear();
	  //月だけ+1すること
	  var month_str = 1 + date.getMonth();
	  var day_str = date.getDate();
	  var hour_str = date.getHours();
	  var minute_str = date.getMinutes();
	  var second_str = date.getSeconds();
	  
	  month_str = ('0' + month_str).slice(-2);
	  day_str = ('0' + day_str).slice(-2);
	  hour_str = ('0' + hour_str).slice(-2);
	  minute_str = ('0' + minute_str).slice(-2);
	  second_str = ('0' + second_str).slice(-2);
	  
	  format_str = 'yyyyMMddhhmmss';
	  format_str = format_str.replace(/yyyy/g, year_str);
	  format_str = format_str.replace(/MM/g, month_str);
	  format_str = format_str.replace(/dd/g, day_str);
	  format_str = format_str.replace(/hh/g, hour_str);
	  format_str = format_str.replace(/mm/g, minute_str);
	  format_str = format_str.replace(/ss/g, second_str);
	  
	  return format_str;
	};
 	function sum(){
    // 表の金額を取得する(tdの奇数列を取得)
	    var pricelist = $("table span[class=total]").map(function(index, val){
	      var price = parseInt($(val).text());
	      if(price >= 0) {
	        return price;
	      } else {
	        return null;
	      }
	    });
	    // 価格の合計を求める
	    var total = 0;
	    pricelist.each(function(index, val){
	      total = total + val;
	    });
	    $("#sum_price").text(total);
	    $("#confirm_total").text(total);
  	}
    $(function(){
	 $('#gadget_amount').on('input',function(){
	 	var gad_amount = $('#gadget_amount').val();
	 	if ($.isNumeric(gad_amount)){

	 	}else{
	 		$('#gadget_amount').val(0);
	 		window.alert("数値を入力してください");
	 	}
	 	var gad_price = $('#gadget_price').text();
	 	var gad_total = (gad_amount * gad_price);
	 	$('#gadget_total').text(gad_total);
	 	$('#confirm_gad_amount').text(gad_amount);
	 	$('#confirm_gad_total').text(gad_total);
	 	sum();
	 });

	 $('#gel_amount').on('input',function(){
	 	var gel_amount = $('#gel_amount').val();
	 	if ($.isNumeric(gel_amount)){

	 	}else{
	 		$('#gel_amount').val(0);
	 		window.alert("数値を入力してください");
	 	}
	 	var gel_price = $('#gel_price').text();
	 	var gel_total = (gel_amount * gel_price);
	 	$('#gel_total').text(gel_total);
	 	$('#confirm_gel_amount').text(gel_amount);
	 	$('#confirm_gel_total').text(gel_total);

	 	sum();
	 });

     $('#myButton').click(function(){
      $('#client_field1').val("device" + $('#gadget_amount').val() + "-coat" + $('#gel_amount').val());
      var shop = $('#myshop').val();
      var order = $('#myorder').val();
      var gadget = $('#gadget_amount').val();
      var gel = $('#gel_amount').val();
      $("#myamount").val($("#sum_price").text());
      var amount = $('#myamount').val();
      var gad_amount = $("#confirm_gad_amount").text()
      var gel_amount = $("#confirm_gel_amount").text()
      var gad_total = $("#confirm_gad_total").text()
      var gel_total = $("#confirm_gel_total").text()
      $("#client_field1").val(gad_amount + "device" +gad_total + "-" + gel_amount + "coat" + gel_total);
      console.log($('#client_field1').val())
      var now = new Date();
      var password = "6ftzw5gc";
      var date = getStringFromDate(now);
      $('#mydate').val(date);
      var info = $.md5(shop + "|" + order + "|" + amount + "||" + password + "|" +date);
      $('#myinfo').val(info);
      console.log(shop + "|" + order + "|" + amount + "||" + password + "|" +date);
      $('#myform').submit();
     });
    });  