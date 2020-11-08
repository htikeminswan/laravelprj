$(document).ready(function(){
   
    showData();
    count();
 	$(".addtocartBtn").click(function(){
 		
 		let id=$(this).data('id');
 		
 		let code_no=$(this).data('code');
 		 
 		let name=$(this).data('name');
 	
 		let photo=$(this).data('photo');
 		
 		let price=$(this).data('price');
 		let discount=$(this).data('discount');
 		
 		let qty=1;

 		let items={
 			     id:id,
 			     name:name,
 			     code_no:code_no,
 			     photo:photo,
 			     qty  :qty,
 			     price:price,
 			     discount:discount

         }
        // console.log(items);

 		
 		let items_list=localStorage.getItem("shop");
 		
 		var items_array;



 		 if(items_list==null){
 		  items_array=[];
 		  }else{
 			items_array=JSON.parse(items_list);
 		 }
 		 
 		 let status=false;
 		 $.each(items_array,function(k,v){
 		 	if(v.id==id){
 		 		v.qty++;
 		 		status=true;
 		 	}
 		 })
 		 if(!status){
 		 	items_array.push(items);
 		 }

 		
 		 let items_string=JSON.stringify(items_array);
 		 localStorage.setItem("shop",items_string);
 		 
 		
     })

     //increase qty
 	$('.increase').click(function(){
        //alert("ok");
        let id=$(this).data('id');

        var qty=$(this).data('qty');

         var items_list=localStorage.getItem('shop');
        var items_array=JSON.parse(items_list);
        $.each(items_array,function(k,v){
            if(k==id)
            {
                v.qty++;
            }

        })
        var items_string=JSON.stringify(items_array);
        localStorage.setItem("shop",items_string);
        showData();
        count();

    })
    $('.decrease').click(function(){
        //alert("ok");
        let id=$(this).data('id');

        let qty=$(this).data('qty');

         let items_list=localStorage.getItem('shop');
         let items_array=JSON.parse(items_list);
        $.each(items_array,function (i,v) {
           if (i == id) 
           {
               v.qty--;
               if (v.qty == 0) 
               {
                   items_array.splice(id,1);
                   

               }
           }
       })
                    let items_string=JSON.stringify(items_array);
                    localStorage.setItem("shop",items_string);
                    showData();
                    count();
                
        

    });

     $.ajaxSetup({
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
     $('.checkoutbtn').click(function (e) {
        //console.log('ok');
         let notes= $('#notes').val();
         if (notes === "") {
            return true;
          }else{
            let order = localStorage.getItem('shop'); 
            // console.log(order);
            
            $.post("/order",{order:order,notes:notes},function (response) {
                console.log(response.msg);
                localStorage.clear();
                location.href="/";
              })
              e.preventDefault();

          }
         
      });

        //filter from date to date
      
        
        //  $('.searchdate').click(function(){
        //     var from_date = $('#from_Date').val();  
        //     var to_date = $('#to_Date').val();  
        //   alert("ok");
        //     if(from_date != '' && to_date != '')  
        //     {  
        //         $.ajax({  
        //             url:"/order",  
        //             method:"POST",  
        //             data:{from_date:from_date, to_date:to_date},  
        //             success:function(data)  
        //             {  
        //                     $('.dataTable').html(data);  
        //             }  
        //         });  
        //     }
        //     else  
        //             {  
        //                 alert("Please Select Date");  
        //             }    

        // })
    });
 function count(){ 
    let total_count=0;
    let total=0;
    let items_list=localStorage.getItem('shop');
    if(items_list){
        let items_array=JSON.parse(items_list);
        $.each(items_array,function(k,v){
            let unitprice=v.price;
            let discount=v.discount;
            if(discount){
                var price=discount
            }else{
                var price=unitprice;
            }
            var subtotal=price*v.qty;
              total+=subtotal++;
            total_count+=v.qty;
        })
        $(".cartNoti").html(total_count);
        $(".total").html(total);
    }
    else{
       $('.cartNoti').html(0);
       $('.total').html(0+' Ks');
   }
}
 function showData(){
    //alert("ok");
    var cart = localStorage.getItem('shop');

   if (cart) {
       $('.shoppingcart_div').show();
       $('.noneshoppingcart_div').hide();

       var cartArray = JSON.parse(cart);
       var shoppingcartData='';


       if (cartArray.length > 0) {
           var total = 0;
           $.each(cartArray, function(i,v){
               var id = v.id;
               var codeno = v.code_no;
               var name = v.name;
               var unitprice = v.price;
               var discount = v.discount;
               var photo = v.photo;
               var qty = v.qty;

               if (discount) {
                   var price = discount;
               }
               else{
                   var price = unitprice;
               }
               var subtotal = price * qty;
        shoppingcartData += `<tr> 
                                       <td> 
                                           <button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%"> 
                                               X</i> 
                                           </button>
                                       </td>
                                       <td> 
                                           <img src="${photo}" class="cartImg" width="100px" height="100px">
                                       </td>
                                       <td>
                                           <p> ${name} </p>
                                           <p> ${codeno} </p>
                                       </td>
                                       <td>
                                           <button class="btn btn-outline-secondary increase" data-id="${i}"> 
                                              +</i> 
                                           </button>
                                       </td>
                                       <td>
                                           <p> ${qty} </p>
                                       </td>
                                       <td>
                                           <button class="btn btn-outline-secondary decrease" data-id="${i}"> 
                                              -</i>
                                           </button>
                                       </td>
                                       <td>`; 
                                       if (discount>0) {
                   shoppingcartData += `<p class="text-danger"> 
                                           ${discount} Ks
                                       </p>
                                       <p class="font-weight-lighter">
                                           <del> ${unitprice} Ks </del>
                                       </p>
                                       `;
               }
               else{
                   shoppingcartData += `<p class="text-danger"> 
                                           ${unitprice} Ks
                                       </p>`;
               }

               shoppingcartData+=`</td>
                                   <td> 
                                       <p> ${subtotal} Ks </p> 
                                   </td>
                           </tr>`;
               total += subtotal++;


           });

           $('#shoppingcart_table').html(shoppingcartData);
           $('.cartTotal').html(total);

       }
       else{
           $('.shoppingcart_div').hide();
           $('.noneshoppingcart_div').show();

       }
   }
   else{
       $('.shoppingcart_div').hide();
       $('.noneshoppingcart_div').show();

   }

}	
            