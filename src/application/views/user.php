
<style>
 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
} 

td {
    text-align: center;
}
</style>


<img src="/assets/img/users/<?php echo $photo ?>" width="15%" alt="User Pic" />
<h1><?php echo $firstname." ".$lastname ?></h1>

<p>
    France-IOI: <?php echo $franceioi ?>
</p>

<p>
    CodeForces: <?php echo $codeforces ?>
</p>

Competitions:
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Score</th>
        <th>Rank</th>
        <th>Medal</th>
    </tr>

    <tr>
        <td>TOP 2017</td>
        <td>150</td>
        <td>16</td>
        <td>None</td>
    </tr>
</table>

Training:
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Date</th>
        <th>Location</th>
    </tr>

    <?php
    foreach($participants as $participant): ?>
         <?php echo "<tr>"; ?>
             <?php echo "<td>"."Name"."</td>"; ?>
             <?php echo "<td>"."Name"."</td>"; ?>
             <?php echo "<td>"."Name"."</td>"; ?>
             <?php echo "<td>".$participant->role."</td>"; ?>
        <?php echo "</tr>"; ?>
    <?php endforeach; ?>
    

    <tr>
        <td>Summer Camp 2019 - 2</td>
        <td>Participant</td>
        <td>20-08-2019</td>
        <td>Crefoc - Nabeul</td>
    </tr>
</table>
