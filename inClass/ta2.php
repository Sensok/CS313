<!DOCTYPE html>

<html>

<head>

</head>

<body>
<form action="page.php" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email">

    <br>
    <br>
    Major: <br>
    <input type="radio" name="major" value="CS">Computer Science<br>
    <input type="radio" name="major" value="WDD">Web Developemnt and Design<br>
    <input type="radio" name="major" value="CIT">CIT<br>
    <input type="radio" name="major" value="CE">CE<br>
    <br>
    Places I have visited:
    <br>
    <input type="checkbox" name="places[]" value="North America">North America<br>
    <input type="checkbox" name="places[]" value="South America">South America<br>
    <input type="checkbox" name="places[]" value="Europe">Europe<br>
    <input type="checkbox" name="places[]" value="Asia">Asia<br>
    <input type="checkbox" name="places[]" value="Australia">Australia<br>
    <input type="checkbox" name="places[]" value="Africa">Africa<br>
    <input type="checkbox" name="places[]       " value="Antartica">Antartica<br>
    <br>
    Comments I have:<br>
    <textarea rows="10" cols="60" name="comments"></textarea>
    <br>
    <input type="submit" value="PRESS ME!"/>
    </form>


    </body>



    </html>