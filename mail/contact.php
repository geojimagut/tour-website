<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

?>
<script>
$.ajax({
  url: "https://formsubmit.co/ajax/geojimagut@gmail.com",
  //info@pulmertours.co.ke
  method: "POST",
  data: {
  INQUIRY: "",
  NAME:<?php echo json_encode($name);?>,
  EMAIL:<?php echo json_encode($email);?>,
  MESSAGE:<?php echo json_encode($message);?>,
  },
  dataType: "json"
  
  })
</script>
