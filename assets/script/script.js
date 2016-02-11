$(function(){


  //product data 
  var table_product = $('#product-data').DataTable( {
        "processing": true,
        "aaSorting": [[0,'desc']],
        "ajax": {
        	url:Route+"store/product/get",
        	dataSrc:'',
        },
        "columns": [
            {
                "render":function(data, type, full, meta){
                   return full.Pcode +''+ full.PID;
                }
               },
            { "data": "Pname" },
            { "data": "Tname" },
			   {
			   	"render":function(data, type, full, meta){
			       return full.Psize +' / '+ full.Punit;
			    }
			   },
            { "data": "P_buy_f" },
            { "data": "P_buy_i" },
            { "data": "P_price_f" },
            { "data": "P_price_i" },
            {
                data: null,
                defaultContent: ''+
                '<a href="#" class="edit btn btn-info "><i class="fa fa-pencil"></i> Edit</a>'+
                ' <a href="#" class="remove btn btn-danger "><i class="fa fa-remove"></i> Delete</a>',
                orderable: true
            },
        ],
    } );

  	$('#product-data').on( 'click', 'a.remove', function (e) {
        var data = table_product.row( $(this).parents('tr') ).data();
        var text = 'Confirm!!';
        if(confirm(text)==true){
        	window.location=Route+"store/product/delete/"+data.PID;
        }
        return false;
    } );


    $('#product-data').on( 'click', 'a.edit', function (e) {
        var data = table_product.row( $(this).parents('tr') ).data();
        	window.location=Route+"store/product/edit/"+data.PID;
        return false;
    } );

     // Setup - add a text input to each footer cell
    $('#product-data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="ค้นหา '+title+'" />' );
    } );

    table_product.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );





  //purchase data 
  var PBID = $("#PBID").val();
  var table_purchase = $('#purchase-data').DataTable( {
        "processing": true,
        "aaSorting": [[0,'desc']],
        "ajax": {
        	url:Route+"store/purchase/get/"+PBID,
        	dataSrc:'',
        },
        "columns": [
        	{
			   	"render":function(data, type, full, meta){
			       return full.Ucode +''+ full.UID;
			    }
			 },
            { "data": "Cname" },
            { "data": "Pname" },
            { "data": "Tname" },
            { "data": "U_price" },
            { "data": "U_number" },
            {
			   	"render":function(data, type, full, meta){
			       return Number(full.U_price) + Number(full.U_number);
			    }
			 },
            { "data": "U_note" },
            {
                data: null,
                defaultContent: ''+
                '<a href="#" class="edit btn btn-info "><i class="fa fa-pencil"></i> Edit</a>'+
                ' <a href="#" class="remove btn btn-danger "><i class="fa fa-remove"></i> Delete</a>',
                orderable: true
            },
        ],
    } );

  	$('#purchase-data').on( 'click', 'a.remove', function (e) {
        var data = table_purchase.row( $(this).parents('tr') ).data();
        var text = 'Confirm!!';
        if(confirm(text)==true){
        	window.location=Route+"store/purchase/delete/"+data.UID+'/'+PBID;
        }
        return false;
    } );


    $('#purchase-data').on( 'click', 'a.edit', function (e) {
        var data = table_purchase.row( $(this).parents('tr') ).data();
        	window.location=Route+"store/purchase/edit/"+data.UID;
        return false;
    } );

     // Setup - add a text input to each footer cell
    $('#purchase-data tfoot th').each( function () {
        var title = $(this).text();
        	$(this).html( '<input type="text" class="form-control" placeholder="ค้นหา '+title+'" />' );
    } );

    table_purchase.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );



  //bill data 
  var table_bill = $('#bill-data').DataTable( {
        "processing": true,
        "aaSorting": [[1,'desc']],
        "ajax": {
        	url:Route+"store/purchase/get_bill",
        	dataSrc:'',
        },
        "columns": [
            {
			   	"render":function(data, type, full, meta){
			       return full.PB_code +''+ full.PBID;
			    }
			 },
            { "data": "PB_create" },
            {   'width':'30%',
                data: null,
                defaultContent: ''+
                ' <a href="#" class="check btn btn-success "><i class="fa fa-check"></i> Pay</a>'+
                ' <a href="#" class="view btn btn-info "><i class="fa fa-cog"></i> Manager</a>'+
                ' <a href="#" class="remove btn btn-danger "><i class="fa fa-remove"></i> Delete</a>',
                orderable: true
            },
        ],
    } );

  	$('#bill-data').on( 'click', 'a.remove', function (e) {
        var data = table_bill.row( $(this).parents('tr') ).data();
        var text = 'Confirm!!';
        if(confirm(text)==true){
        	window.location=Route+"store/purchase/delete_bill/"+data.PBID;
        }
        return false;
    } );


    $('#bill-data').on( 'click', 'a.view', function (e) {
        var data = table_bill.row( $(this).parents('tr') ).data();
        	window.location=Route+"store/purchase/add/"+data.PBID;
        return false;
    } );

    $('#bill-data').on( 'click', 'a.check', function (e) {
        var data = table_bill.row( $(this).parents('tr') ).data();
            window.location=Route+"store/purchase/pay/"+data.PBID;
        return false;
    } );

     // Setup - add a text input to each footer cell
    var tb = $('.datatables').DataTable();
    $('.datatables tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="ค้นหา '+title+'" />' );
    } );

    tb.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );






  //customer data 
  var table_customer = $('#customer-data').DataTable( {
        "processing": true,
        "aaSorting": [[0,'desc']],
        "ajax": {
        	url:Route+"store/customer/get",
        	dataSrc:'',
        },
        "columns": [
		   {
		   	"render":function(data, type, full, meta){
		       return full.CUcode +''+ full.CUID;
		    }
		   },
            { "data": "CUname" },
            { "data": "CUtel" },
            { "data": "CUaddress" },
            { "data": "CUmap" },
            { "data": "CUnote" },
            { "data": "CU_create" },
            {
                data: null,
                defaultContent: ''+
                '<a href="#" class="edit btn btn-info "><i class="fa fa-pencil"></i> Edit</a>'+
                ' <a href="#" class="remove btn btn-danger "><i class="fa fa-remove"></i> Delete</a>',
                orderable: true
            },
        ],
    } );

  	$('#customer-data').on( 'click', 'a.remove', function (e) {
        var data = table_customer.row( $(this).parents('tr') ).data();
        var text = 'Confirm!!';
        if(confirm(text)==true){
        	window.location=Route+"store/customer/delete/"+data.CUID;
        }
        return false;
    } );


    $('#customer-data').on( 'click', 'a.edit', function (e) {
        var data = table_customer.row( $(this).parents('tr') ).data();
        	window.location=Route+"store/customer/edit/"+data.CUID;
        return false;
    } );

     // Setup - add a text input to each footer cell
    $('#customer-data tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="ค้นหา '+title+'" />' );
    } );

    table_customer.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );




    //bill

    $('.add_data_bill').click(function (e) {
        var PID = $('#PID').val();
        var price = $('#price').val();
        var unit = $('#unit').val();
        var note = $('#note').val();
        if(PID!="" && price!="" && unit!=""){
            $.ajax({    
                    type:"post",
                    url:Route+'/store/bill/add_list',
                    data:{"PID":PID,"price":price,"unit":unit,"note":note},
                    //dataType:"json",
                    cache:false,
            }).done(function(respon){
                if(respon){
                    $('.append_data').append(respon);
                }
                //console.log(respon);
            });
        }else{
            alert('กรุณาป้อนข้อมูลให้ครบแล้วกดปุ่ม เพิ่มรายการ');
        }
    });


    //ship

    $('.add_data_ship').click(function (e) {
        var PID = $('#PID').val();
        var price = $('#price').val();
        var unit = $('#unit').val();
        var note = $('#note').val();
        if(PID!="" && price!="" && unit!=""){
            $.ajax({    
                    type:"post",
                    url:Route+'/store/ship/add_list',
                    data:{"PID":PID,"price":price,"unit":unit,"note":note},
                    //dataType:"json",
                    cache:false,
            }).done(function(respon){
                if(respon){
                    $('.append_data').append(respon);
                }
                //console.log(respon);
            });
        }else{
            alert('กรุณาป้อนข้อมูลให้ครบแล้วกดปุ่ม เพิ่มรายการ');
        }
    });


    //receive

    $('.add_data_receive').click(function (e) {
        var PID = $('#PID').val();
        var price = $('#price').val();
        var unit = $('#unit').val();
        var note = $('#note').val();
        if(PID!="" && price!="" && unit!=""){
            $.ajax({    
                    type:"post",
                    url:Route+'/store/receive/add_list',
                    data:{"PID":PID,"price":price,"unit":unit,"note":note},
                    //dataType:"json",
                    cache:false,
            }).done(function(respon){
                if(respon){
                    $('.append_data').append(respon);
                }
                //console.log(respon);
            });
        }else{
            alert('กรุณาป้อนข้อมูลให้ครบแล้วกดปุ่ม เพิ่มรายการ');
        }
    });


});

function remove_data(id){
        console.log(id);
        $('.append_data > tr#'+id).remove();
}


$(".int").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });






