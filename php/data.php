<?php
 while($row = mysqli_fetch_assoc($sql)){
    echo "<a href='#'>
    <div class='content'>
        <img src= 'php/image/$row[img]' alt=''>
        <div class='details'>
            <span>$row[fname] $row[lname]</span>
            <p>Hlw rahul kkrh?</p>
        </div>
    </div>
    <div class='status-dot'><i class='fas fa-circle'></i></div>
</a> ";
}
?>