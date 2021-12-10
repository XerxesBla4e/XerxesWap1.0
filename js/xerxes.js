const form = document.getElementById("payForm");
form.addEventListener("submit",payNow);

function payNow(e){
    //prevent default form submit
   e.preventDefault();

//Set configurations
   FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-5af3cd808a9c515f98a1ee0e97906d25-X",
      tx_ref:"xer"+Math.floor((Math.random()*1000000000)+1),
      amount: document.getElementById("amount").value,
      currency: "UGX",
      customer: {
        email: document.getElementById("email").value,
        phonenumber: document.getElementById("phoneNumber").value,
        name: document.getElementById("fullName").value,
      },
      callback:function(data){
         // console.log(data);
         //redirect to song download page
         let reference = document.getElementById("mvieid").value;
         window.location = "http://127.0.0.1/mvie/songdld.php?id="+reference;

      },
      customizations:{
           'title':'XerxesWap',
           'description':'Music Isnt for the broke',  
      }
   });
}