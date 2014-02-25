<?php
include('sqlfunc.php');
?>

<html>
<body>
<div>
<form>
<select name="action">
     <option value="insert">Add</option>
     <option value="update">Update</option>
     <option value="drop">Remove</option>
     </select>
     <select name="table">
     <option value="product">Product</option>
     <option value="mill">Mill</option>
     <option value="species">Species</option>
     <option value="widths">Width</option>
     </select>
     <br/>
     </form>
     </div>
</body>
</html>