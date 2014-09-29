<style type="text/css">
body {
  font-family: Arial, Tahoma, sans-serif;
}
.alert {
padding: 8px 35px 8px 14px;
margin-bottom: 20px;
text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
.alert-danger, .alert-error {
color: #B94A48;
background-color: #F2DEDE;
border-color: #EED3D7;
}
</style>
<div class="alert alert-error">
              <?=$_SESSION['error_message'];?>
</div>
