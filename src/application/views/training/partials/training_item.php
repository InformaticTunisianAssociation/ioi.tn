<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<tr>
    <th scope="row"> <a href="/training/show/<?php echo $training_id ?>"><?php echo $title ?></a></th>
    <td><?php echo $starts_at ?></td>
    <td><?php echo $ends_at  ?></td>
    <td><?php echo $level  ?></td>
    <td> <a href="<?php echo $location_url ?>"><?php echo $location ?></a> </td>
    <td><?php echo $topic ?></td>
</tr>



