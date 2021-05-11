<div class="contentCard pckg">
  <div class="card-header">
    <h3 class="title">Package</h3>
    <a href="#" class="btn btn-sm btn-info">See All</a>
  </div>
  <div class="tb-resp">
    <table class="tb-full">
      <thead class="light">
        <tr>
          <th>No</th>
          <th>Durasi</th>
          <th>Price</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      <?php      
      if (isset($data->package)) 
      {        
        while($row = mysqli_fetch_array($data->package))                      
        {          
        ?>                  
          <tr>
            <td><?=$row[0]?></td>
            <td><?=$row[1]?></td>
            <td><?=$row[2]?></td>
            <td><?php 
            if($row[5] == 1) {echo "Active";}
            if($row[5] == 0) {echo "Deactived";}
            ?></td>
          </tr>
      <?php
        }   
      }      
      else
      {
      ?>
        <tr>
          <td colspan="4">
            DATA KOSONG
          </td>
        </tr>
      <?php
      }      
      ?>        
      </tbody>
    </table>
  </div>
</div>
