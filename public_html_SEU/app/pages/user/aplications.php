<?php
    $id = user('id');
    //echo $id;
    $query = "SELECT candidates.job_id, industries.Nameindustry, candidates.date, jobs.job_name, jobs.time, jobs.state, jobs.city, jobs.salary from candidates
     INNER JOIN jobs on candidates.job_id = jobs.id
     INNER JOIN industries on candidates.industry_id = industries.IndustryId
      Where candidates.user_id = '$id'";
    $row = query($query);
    $count = 1;
    echo '<pre>';
   // print_r($row);
    echo '</pre>';

?>
<div class="container">
<div class="row">
<div class="col-12">

<div class="table-responsive">
  <!--Table-->
  <table class="table table-striped table-bordered">

    <!--Table head-->
    <thead>
      <tr>
        <th>#</th>
        <th>Job:</th>
        <th>Industry:</th>
        <th>State:</th>
        <th>City:</th>
        <th>Salary:</th>
        <th>Time:</th>
        <th>Status:</th>
    </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      
        <?php if ($row > 0): ?>
        <?php foreach ($row as $key): ?>
      <tr>
            <th scope="row"><?= $count?></th>
            <td><?=$key['job_name'] ?></td>
            <td><?=$key['Nameindustry'] ?></td>
            <td><?=$key['state'] ?></td>
            <td><?=$key['city'] ?></td>
            <td>$<?=$key['salary']?>/hr</td>
            <td><?=$key['time']?></td>
            <td><span class="badge badge-warning rounded-pill d-inline">Revision</span></td>
        </tr>
        <?php $count++ ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
    <!--Table body-->
  </table>
  <!--Table-->
</div>

</div>
</div>
</div>


