{{-- <?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?> --}}
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<style>
*{
    margin: 0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.contact{
    position: relative;
    min-height: 100vh;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background:#ECF0F5;
    background-size: cover;

}
.contact .laman{
    max-width: 100%;
    text-align:center;

}
.contact .laman h2{
    font-size:35px;
    font-weight: 500;
    color:#1f4256;
    margin-top: 0px;
}
.contact .laman p{

    font-weight: 300;
    color:#111214;
}
.lalagyanan{
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}
.lalagyanan .contactInfo{
    width: 50%;
    display: flex;
    flex-direction: column;
}
.lalagyanan .contactInfo  .kahon{
    position: relative;
    padding: 20px;
    display: flex;
}
.lalagyanan .contactInfo  .kahon .icon{
    min-width: 60px;
    height: 60px;
    background: #A52A2A;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
}
.lalagyanan .contactInfo  .kahon .text{
    display: flex;
    margin-left: 20px;
    font-size: 16px;
    color: #3C8DBC;
    flex-direction: column;
    font-weight: 300;
}
.lalagyanan .contactInfo  .kahon .text h3{
    font-weight: 500;
    color: #1f4256;

}
.contactForm{
    width: 40%;
    padding: 40px;
    background: #fff;
}
.contactForm h2{
    font-size: 30px;
    color: #111214;
    font-weight: 500;

}
.contactForm .inputbox{
    position: relative;
    width: 100%;
    margin-top: 10px;
}
.contactForm .inputbox input,
.contactForm .inputbox textarea{
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
}
.contactForm .inputbox span{
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;
}
.contactForm .inputbox input:focus ~ span,
.contactForm .inputbox input:valid ~ span,
.contactForm .inputbox textarea:focus ~ span,
.contactForm .inputbox textarea:valid ~ span
{
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
}
.contactForm .inputbox input[type="submit"]{
    width: 100px;
    background: #00bcd4;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
}
</style>
	{{-- <?php include 'includes/navbar.php'; ?> --}}

	  <div class="content-wrapper">
	    <div class="container">

        <section class="contact">
            <div class="laman">
                <h2>Contact Us</h2>
                <p>Contact information are presented below.</p>
                 </div>
                 <div class="lalagyanan">
                     <div class="contactInfo">
                         <div class="kahon">
                             <div class="icon">
    <i class="fa fa-map-marker" aria-hidden="true" style="color:white;'"></i>
                             </div>
                             <div class="text">
                                 <h3>Address</h3>
                                 <p>Sampaloc<br>Maynila, Philippines</p>
                             </div>
                         </div>
                         <div class="kahon">
                             <div class="icon">
    <i class="fa fa-phone" aria-hidden="true" style="color:white;'"></i>
                             </div>
                             <div class="text">
                                 <h3>Phone</h3>
                                 <p>+63 2 5235 1787</p>
                             </div>
                         </div>
                         <div class="kahon">
                             <div class="icon">
    <i class="fa fa-envelope" aria-hidden="true" style="color:white;'"></i>
                             </div>
                             <div class="text">
                                 <h3>Email</h3>
                                 <p>admin@gmail.com</p>
                             </div>
                         </div>
                     </div>
    <div class="contactForm">
        <form>
            <h2>Send Message</h2>
            <div class="inputbox">
                <input type="text" name="" required="required">
                <span>Full Name</span>
            </div>
            <div class="inputbox">
                <input type="text" name="" required="required">
                <span>Email</span>
            </div>
            <div class="inputbox">
            <textarea required="required"></textarea>
                <span>Type your message.....</span>
            </div>
            <div class="inputbox">
                <input type="submit" name="" value="Send">
            </div>
        </form>
    </div>
                 </div>
             </section>
	    </div>
	  </div>

  	{{-- <?php include 'includes/footer.php'; ?> --}}
</div>

{{-- <?php include 'includes/scripts.php'; ?> --}}
</body>
</html>
