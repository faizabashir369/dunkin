
<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<br>
<div id="send_rating" class="center-align">
<button class="pink-clr add_address" onclick="showMessage()">Add New Address</button>
</div><br>
<div id="rejected_transfer" class="center-align">
<button class="pink-clr add_address" onclick="rejectedMessage()">Rejected Transfer</button>
</div><br>
<div id="completed_transfer" class="center-align">
<button class="pink-clr add_address" onclick="completedMessage()">Accepted Transfer</button>
</div><br>
<div id="busy_branch" class="center-align">
<button class="pink-clr add_address" onclick="busyBranch()">Branches List</button>
</div><br>
<div id="accepted_ordr" class="center-align">
<button class="pink-clr add_address" onclick="acceptedOrder()">Order Accepted</button>
</div><br>
<div id="accepted_ordr" class="center-align">
<button class="pink-clr add_address" onclick="rejectOrder()">Order Rejected</button>
</div><br>
<div id="order_avail" class="center-align">
<button class="pink-clr add_address" onclick="orderAvail()">Check order Availability</button>
</div><br>
<div class="center-align">
<button class="pink-clr add_address" onclick="chooseTime()">Order Time </button>
</div>
<br>
<div class="center-align">
<button class="pink-clr add_address" onclick="orderNotAvail()">Order Not Avaiable</button>
</div>
<br>
<div class="center-align">
<button class="pink-clr add_address" onclick="saveFav()">Save favourite order</button>
</div>



<br>
<div class="center-align">
<a href="about_us.php">About us</a><br>
<a href="policy.php">Privacy Policy</a><br>
<a href="partners.php">Partners</a><br>
<a href="terms.php">Terms of Use</a><br>
<a href="address.php">Addresses</a><br>
<a href="edit_address.php">Edit Address</a><br>
</div>

<script>
        function showMessage()
        {
            Swal.fire({
              title: 'Rate Your Experience',
              showCloseButton: true,
              showConfirmButton:true,
              html:
              '<span><img src="images/star.svg" class="star"><span>'+
              '<span><img src="images/star.svg" class="star"><span>'+
              '<span><img src="images/half_star.svg" class="star"><span>'+
              '<span><img src="images/empty_star.svg" class="star"><span>'+
              '<span><img src="images/empty_star.svg" class="star"><span>'+
              '<div class="btns"><span class="send_rating"><button class="send_rating">Send Rating</button></span><span class="take_survey"><button class="take_survey">Take A Survey</button></span></div>',
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function rejectedMessage()
        {
            Swal.fire({
              title: '<button class="transfer_p">Transfet Points</button>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<p class="trans-rejected">The transfer process has been completed successfully</p>',
              width:'690px',
              customClass: 'custom-padding',
              background: '#fff',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function completedMessage()
        {
            Swal.fire({
              title: '<button class="transfer_p">Transfet Points</button>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<p class="trans-rejected">The transfer process has been rejected Please try again</p>',
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function busyBranch()
        {
            Swal.fire({
              title: '<p class="trans-rejected">This branch is busy at the moment. Please check the nearest branch to you on our mapping list.</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<button class="transfer_p">Branches List</button>',
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function acceptedOrder()
        {
            Swal.fire({
              title: '<p class="trans-rejected">Congratulations! <br> Your order has been accepted</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<button class="transfer_p">Payment Process</button>',
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function rejectOrder()
        {
            Swal.fire({
              title: '<p class="trans-rejected">We\'re sorry! <br> Your order has been rejected.We suggest you to check our menu again</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<button class="transfer_p">Go To The Menu</button>',
              background: '#fff',
              width:'690px',
              customClass: 'custom-padding',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function orderAvail()
        {
            Swal.fire({
              title: '<p class="check_avail">Checking order availability</p>',
              showCloseButton: false,
              showConfirmButton:false,
              html:
              '<div class="progress"><div class="indeterminate"></div></div>',
              background: 'transparent',
              width:'690px',
              padding: '0',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<style>
    
</style>
<script>
       
            $('.datepicker').datepicker();
          
        function chooseTime()
        {
            Swal.fire({
              title: '<p class="trans-rejected" id="date_time">Choose your desired date and time</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<input id="chose_date" type="date" class="datepicker" name="order_date"><label for="lbl_date" id="lbl_date">Choose Date</label>'+
              '<input id="chose_time" type="time" name="order_time" value="8:45 PM to 9:50 PM"><label for="lbl_time" id="lbl_time">Choose Time</label>'+
              '<button class="transfer_p" id="transfer_p">Payment Process</button>',
              background: '#fff',
              customClass: 'swal-height',
              width:'690px',
              padding: '0 50px',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>

<script>
        function orderAvail()
        {
            Swal.fire({
              title: '<p class="check_avail">Checking order availability</p>',
              showCloseButton: false,
              showConfirmButton:false,
              html:
              '<div class="progress"><div class="indeterminate"></div></div>',
              background: 'transparent',
              width:'690px',
              padding: '0',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<div id="notAvail">
<script>
        function orderNotAvail()
        {
            Swal.fire({
              title: '<p class="trans-rejected msg-padding">We’re sorry!<br> The chosen orders are not available at the moment. We suggest you to check our menu again.</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<div class="container"><div class="row menu_again valign-wrapper">'+
                    '<div class="col s3 m3 l3"><img class="responsive-img order-img img-circle"  src="images/img1.svg"></div>'+
                    '<div class="col s6 m6 l6">'+
                    '<p class="item-no left-align orange-font" id="item-no">Item 1 <span class="item-size">L</span></p><div class=flav"><button class="sugar float-left">Double Eespresso + Zero Sugar</button></div></div>'+
                    '<div class="col s2 m2 l2"><span class="item-qua">4</span></div><div class="col s3 m3 l3"><span class="item-price">$20.00</span></div></div>'+
                    '<div class="row menu_again valign-wrapper">'+
                    '<div class="col s3 m3 l3"><img class="responsive-img order-img img-circle"  src="images/img1.svg"></div>'+
                    '<div class="col s6 m6 l6">'+
                    '<p class="item-no left-align orange-font">Item 1 <span class="item-size">L</span></p><div class=flav"><button class="sugar float-left">Double Eespresso + Zero Sugar</button></div></div>'+
                    '<div class="col s2 m2 l2"><span class="item-qua">4</span></div><div class="col s3 m3 l3"><span class="item-price">$20.00</span></div></div>'+
                    '<div class="row menu_again valign-wrapper">'+
                    '<div class="col s3 m3 l3"><img class="responsive-img order-img img-circle"  src="images/img1.svg"></div>'+
                    '<div class="col s6 m6 l6">'+
                    '<p class="item-no left-align orange-font">Item 1 <span class="item-size">L</span></p><div class=flav"><button class="sugar float-left">Double Eespresso + Zero Sugar</button></div></div>'+
                    '<div class="col s2 m2 l2"><span class="item-qua">4</span></div><div class="col s3 m3 l3"><span class="item-price">$20.00</span></div></div>'+
                    '</div><button class="transfer_p" id="transfer_p">Go To The Menu</button>',
              background: '#fff',
              width:'580px',
              customClass: 'swal-height2',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
<script>
        function saveFav()
        {
            Swal.fire({
              title: '<p class="trans-rejected save-padding">Save your favorite order for the future</p>',
              showCloseButton: true,
              showConfirmButton:false,
              html:
              '<input id="save_fav" type="text" class="datepicker" name="order_date" value="Add a name to your favorite order"><label for="lbl_date" id="lbl_fav">Order Name</label>'+
              '<button class="transfer_p" id="transfer_p margin-bottom">Save As Favourite</button>',
              width:'690px',
              padding: '0',
              customClass: 'save-fav',
              backdrop: `
               rgba(38, 38, 38, 0.8);
              `
            })
        }
</script>
</div>