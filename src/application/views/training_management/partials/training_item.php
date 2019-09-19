<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<tr>
    <th scope="row"><a href="/contest/show/<?php echo $training_id ?>"><?php echo $title ?></a></th>
    <td><?php echo $starts_at ?></td>
    <td><?php echo $ends_at  ?></td>
    <td><?php echo $level ?></td>
    <td><a href=""<?php echo $location_url ?>><?php echo $location ?></a> </td>
    <td><?php echo $topic ?></td>
    <th><a href="/training_management/edit/<?php echo $training_id ?>">Edit</a></th>
    <th><a href="/training_management/delete/<?php echo $training_id ?>">Delete</a></th>
</tr>

