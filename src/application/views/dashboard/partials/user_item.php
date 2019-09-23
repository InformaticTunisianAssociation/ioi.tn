<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<tr>
    <td><a href="/user_management/edit_info/<?php echo $id ?>"><?php echo $id ?></a></td>
    <td><a href="/user_management/edit_info/<?php echo $id ?>"><?php echo $username ?></a></td>
    <td><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></td>
    <td><?php echo $grade ?></td>
    <td><?php echo $city ?></td>
    <td><?php echo $phone ?></td>
    <td><a target="_blank" href="/u/<?php echo $username ?>">Show</a></td>
</tr>



