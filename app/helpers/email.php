<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require dirname(APPROOT) . '/vendor/autoload.php';

class Email
{
  public static function sendEmailOrdersToUser($orders)
  {
    foreach ($orders as $order) {
      $email = $order->user_email;
      $name = $order->user_first_name;
      $orderTotal = $order->order_total;
    }

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'kurtcarveycadenas1401@gmail.com';
      $mail->Password   = 'fzkcesqvnuiantku';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('kurtcarveycadenas1401@gmail.com', "Cael's Delivery Admin");
      $mail->addAddress($email, $name);

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Your Orders';
      $body = "<table>
                  <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Billing Name</th>
                        <th>Billing Address</th>
                        <th>Billing City</th>
                      </tr>
                  </thead>
              ";
      foreach ($orders as $order) {
        $body .= "
                 <tbody>
                    <tr>
                        <td>$order->order_id</td>
                        <td>$order->product_name</td>
                        <td>&#8369;$order->product_price</td>
                        <td>$order->product_quantity</td>
                        <td>$order->shipping_name</td>
                        <td>$order->shipping_address</td>
                        <td>$order->shipping_city</td>
                    </tr>
                 </tbody>
                 ";
      }
      $body .= "
               <tr>
                  <td>Total: &#8369;$orderTotal</td>
               </tr>
               ";
      $mail->Body = $body . "</table>";
      $mail->AltBody = '';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  public static function sendOrdersOnDeliveryToUser($orders)
  {
    foreach ($orders as $order) {
      $email = $order->user_email;
      $name = $order->user_first_name;
      $orderTotal = $order->order_total;
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'kurtcarveycadenas1401@gmail.com';
      $mail->Password   = 'fzkcesqvnuiantku';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('kurtcarveycadenas1401@gmail.com', "Cael's Delivery Admin");
      $mail->addAddress($email, $name);

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Orders On Delivery';
      $body = "<table>
                <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                      <th>Billing Name</th>
                      <th>Billing Address</th>
                      <th>Billing City</th>
                      <th>Payment Method</th>
                    </tr>
                  </thead>
              ";
      foreach ($orders as $order) {
        $body .= "
                 <tbody>
                    <tr>
                        <td>$order->order_id</td>
                        <td>$order->product_name</td>
                        <td>$order->product_price</td>
                        <td>$order->product_quantity</td>
                        <td>$order->shipping_name</td>
                        <td>$order->shipping_address</td>
                        <td>$order->shipping_city</td>
                        <td>$order->payment_method</td>
                    </tr>
                 ";
      }
      $body .= "
                    <tr>
                        <td>Total: &#8369;$orderTotal</td>
                    </tr>
                </tbody>
               ";
      $mail->Body = $body . "</table>
                             <p>
                                <b>Thank you for ordering at Cael's Catering, We are please to serve healthy nutritious food</b>
                             </p>
                             <p>
                                <b>If you have time kindly please rate us on our Faceebook Page: https://www.facebook.com/AnalynPabloVizmanos</b>
                             </p>";
      $mail->AltBody = '';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  public static function sendOrdersCompleteToUser($orders)
  {
    foreach ($orders as $order) {
      $email = $order->user_email;
      $name = $order->user_first_name;
      $orderTotal = $order->order_total;
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'kurtcarveycadenas1401@gmail.com';
      $mail->Password   = 'fzkcesqvnuiantku';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('kurtcarveycadenas1401@gmail.com', "Cael's Delivery Admin");
      $mail->addAddress($email, $name);

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Orders Completed';
      $body = "<table>
                <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                      <th>Billing Name</th>
                      <th>Billing Address</th>
                      <th>Billing City</th>
                      <th>Payment Method</th>
                    </tr>
                  </thead>
              ";
      foreach ($orders as $order) {
        $body .= "
                 <tbody>
                    <tr>
                        <td>$order->order_id</td>
                        <td>$order->product_name</td>
                        <td>$order->product_price</td>
                        <td>$order->product_quantity</td>
                        <td>$order->shipping_name</td>
                        <td>$order->shipping_address</td>
                        <td>$order->shipping_city</td>
                        <td>$order->payment_method</td>
                    </tr>
                 ";
      }
      $body .= "
                    <tr>
                        <td>Total: &#8369;$orderTotal</td>
                    </tr>
                </tbody>
               ";
      $mail->Body = $body . "</table>
                             <p>
                                <b>Thank you for ordering at Cael's Catering, We are please to serve healthy nutritious food</b>
                             </p>
                             <p>
                                <b>If you have time kindly please rate us on our Faceebook Page: https://www.facebook.com/AnalynPabloVizmanos</b>
                             </p>";
      $mail->AltBody = '';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  public static function sendOrdersCancelledToUser($orders)
  {
    foreach ($orders as $order) {
      $email = $order->user_email;
      $name = $order->user_first_name;
      $orderTotal = $order->order_total;
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'kurtcarveycadenas1401@gmail.com';
      $mail->Password   = 'fzkcesqvnuiantku';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('kurtcarveycadenas1401@gmail.com', "Cael's Delivery Admin");
      $mail->addAddress($email, $name);

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Orders Cancelled';
      $body = "<table>
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                      <th>Billing Name</th>
                      <th>Billing Address</th>
                      <th>Billing City</th>
                      <th>Payment Method</th>
                    </tr>
                  </thead>
              ";
      foreach ($orders as $order) {
        $body .= "
                 <tbody>
                    <tr>
                        <td>$order->order_id</td>
                        <td>$order->product_name</td>
                        <td>$order->product_price</td>
                        <td>$order->product_quantity</td>
                        <td>$order->shipping_name</td>
                        <td>$order->shipping_address</td>
                        <td>$order->shipping_city</td>
                        <td>$order->payment_method</td>
                    </tr>
                 </tbody>
                 ";
      }
      $body .= "
               <tr>
                  <td>Total: &#8369;$orderTotal</td>
               </tr>
               ";
      $mail->Body = $body . "</table>
                             <p>
                                <b>Your request to cancel your order to cancel has been processed</b>
                             </p>
                             <p>
                                <b>If you have any concerns you can reach us on our Faceebook Page: https://www.facebook.com/AnalynPabloVizmanos</b>
                             </p>";
      $mail->AltBody = '';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  public static function sendPass($email, $token)
  {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'kurtcarveycadenas1401@gmail.com';
      $mail->Password   = 'fzkcesqvnuiantku';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('kurtcarveycadenas1401@gmail.com', "Cael's Delivery Admin");
      $mail->addAddress($email);

      //Content
      $mail->isHTML(true);
      $mail->Subject = "Account Reset | Cael's Party Mania";
      $mail->Body    = 'Click the link below to reset your password <a href=' . URLROOT . '/users/reset/' . $token . '>Password Reset</a>';
      $mail->AltBody = 'Thank you';
      $mail->send();

      redirect('users/forgot');
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
