<?php include_once('partials/header.php'); ?>


    <div class="contact">
        <div class="container2">
        <p class="p2">Contact Us</p>
        <form class="" action="<?php echo HOMEURL;?>email.php" method="post">
            <table>
                <tr>
                  <td>
                    <input type="text" name="name" id="" placeholder="Full name">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" name="mail" id="" placeholder="Email">
                   </td>
                </tr>
                   <tr>
                <td>
                    <input type="text" name="subject" id="" placeholder="Subject">
                   </td>
                </tr>
                <tr>
                   <td>
                     <textarea class="mgn-left" name="message" id="" cols="100" rows="10" placeholder="Message"></textarea>
                   </td>
                </tr>
                <tr>
                    <td>
                      <input type="submit" name="submit" value="SEND MAIL">
                    </td>
                </tr>
            </table> 
        </form>
        </div>
    </div>



<?php include_once('partials/footer.php'); ?>
