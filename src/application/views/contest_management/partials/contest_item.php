<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<tr>
    <th scope="row"><a href="/contest/show/<?php echo $contest_id ?>"><?php echo $title ?></a></th>
    <td><?php echo $starts_at ?></td>
    <td><?php echo $duration  ?></td>
    <td><?php echo $nb_problems  ?></td>
    <td><?php echo $optimal_score  ?></td>
    <th><a href="/contest_management/edit/<?php echo $contest_id ?>">Edit</a></th>
    <th><a href="/contest_management/delete/<?php echo $contest_id ?>">Delete</a></th>
</tr>

