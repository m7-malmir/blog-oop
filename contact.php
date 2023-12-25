<?php
include 'partials/header.php';
?>
<section class="contact">
    <div class="container contact contact__container">
        <aside class="contact__aside">
            <div class="aside__image">
                <img src="./img/23.jpg" alt="">
            </div>
            <h2>Contact Us</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Doloremque laborum eius repudiandae neque?
            </p>
            <ul class="contact__details">
                <li>
                    <i class="uil uil-phone-times"></i>
                    <h5>+23453476022</h5>
                </li>
                <li>
                <i class="uil uil-envelope-alt"></i>
                    <h5>suppor@gmail.com</h5>
                </li>
                <li>
                    <i class="uil uil-location-point"></i>
                    <h5>Tehran Shahriar</h5></li>
                
            </ul>
            <ul class="contact__socials">
                <li> <a href="#"><i class="uil uil-instagram"></i></a></li>
                <li> <a href="#"><i class="uil uil-facebook"></i></a></li>
                <li> <a href="#"><i class="uil uil-twitter-alt"></i></a></li>
                <li> <a href="#"><i class="uil uil-linkedin"></i></a></li>
             </ul>
        </aside><!--contact__aside-->

        <form action="https://formspree.io/f/mnqypldd" method="POST" class="contact__form">
            <div class="form__name">
                <input type="text" name="first name" placeholder="First Name">
                <input type="text" name="last name" placeholder="Last Name">
            </div><!--form__name-->
            <input type="email" name="email address" placeholder="Your Email Address" required>
            <textarea name="message" id="" placeholder="Mwssage"  rows="7" required></textarea>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>

    </div><!--container contact contact__container-->
</section><!--contact-->

<?php
include('partials/footer.php');
?>