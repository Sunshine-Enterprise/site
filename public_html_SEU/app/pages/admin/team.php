<?php
$query = "SELECT * FROM team";
$team = query($query);
//print_r($url);
?>


<?php if($action == 'add'):?>
<div class="container">
<div class="row">
<div class="col-12">
      <form method="post">
        <fieldset class="p-4">
            <div class="row">
        <!---Name--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Team Member*" name="name" />
            </div>  
            </div>
        
            <div class="row">
        <!---Position--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Position*" name="position" />
                </div>  
            </div>
            <!---Photo--------------------------->
                <div class="row">
                    <div class="col">
                    <img class="" src="<?= get_image($team['photo'])?>" alt="" style="width:100px; height: 100px border: 20px solid black; border-radius: 50%;">
                    <input type="file" class="form-control" name="photo" id="" placeholder="" aria-describedby="fileHelpId">
                    </div>       
                </div>
            
            <div class="row mt-3">
            <div class="col">
                <select value="<?=old_value('disabled')?>" class="form-control mb-3 w-100" placeholder="Status*" name="status"> 
                    <option value ='1'>Define status</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select>     
                </div>       
            </div> 
            
            <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
            <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/team">Go back</a>
            
            </div>
        </fieldset>
    </form>
</div>
</div>
</div>
<?php elseif($action == 'edit'):?>
<div class="container">
<div class="row">
<div class="col-12">

            <h3>Edit Team Member</h3>
            <form method="post">
        <fieldset class="p-4">
            <div class="row">
        <!---Name--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Team Member*" name="Nameindustry" />
            </div>  
            </div>
        
            <div class="row">
        <!---Position--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Position*" name="Nameindustry" />
                </div>  
            </div>
            <!---Photo--------------------------->
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control" name="photo" id="" placeholder="" aria-describedby="fileHelpId">
                        <img class="" src="<?= get_image($team['photo'])?>" alt="" style="width:100px; height: 100px border: 20px solid black; border-radius: 50%;">
                    </div>       
                </div>
            
            <div class="row mt-3">
            <div class="col">
                <select value="<?=old_value('disabled')?>" class="form-control mb-3 w-100" placeholder="Status*" name="disabled"> 
                    <option value ='1'>Define status</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select>     
                </div>       
            </div> 
            
            <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
            <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/team">Go back</a>
            
        </div>
        </fieldset>
          </form>
</div>
</div>
</div>

<?php elseif($action == 'delete'):?>
<div class="container">
<div class="row">
<div class="col-12">
        <h3>Delete Team Member</h3>
        <form method="post">
        <fieldset class="p-4">
            <div class="row">
        <!---Name--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Team Member*" name="Nameindustry" />
            </div>  
            </div>
        
            <div class="row">
        <!---Position--------------------------->
            <div class="col">
                <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Position*" name="Nameindustry" />
                </div>  
            </div>
            <!---Photo--------------------------->
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control" name="" id="" placeholder="" aria-describedby="fileHelpId">
                    </div>       
                </div>
            
            <div class="row mt-3">
            <div class="col">
                <select value="<?=old_value('disabled')?>" class="form-control mb-3 w-100" placeholder="Status*" name="disabled"> 
                    <option value ='1'>Define status</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select>     
                </div>       
            </div> 
            
            <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
            <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/team">Go back</a>
            
        </div>
        </fieldset>
          </form>
</div>
</div>
</div>
<?php else:?>


<div class="container">
<div class="row">
<div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Team Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php foreach ($team as $teammates) : ?>
                        <tr class="">
                            <td scope="row"><?=$teammates['name']?></td>
                            <td scope="row"><?=$teammates['position']?></td>
                            <td scope="row">
                                <img class="" src="<?= get_image($teammates['photo'])?>" alt="" style="width:100px; height: 100px border: 20px solid black; border-radius: 50%;">
                            </td>
                            <td scope="row"><?=$teammates['status'] == 1 ? 'Active' : 'Disabled' ?></td>
                            <td class="text-center"> 
                                <a href="<?=ROUTE.'/admin/team/edit/'?><?=$teammates['id']?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td class="text-center"> 
                                <a href="<?=ROUTE.'/admin/team/delete/'?><?=$teammates['id']?>" data-toggle="tooltip" data-placement="top" title="Delete" class="delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?=ROUTE.'/admin/team/add'?>">
            <button  type="submit" class="btn btn-warning btn-sm">
              Add Team Member 
            </button>
        </a>
        <a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/admin">Go back</a>    
</div>
</div>
</div>
<?php endif;?>