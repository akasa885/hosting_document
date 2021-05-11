<div class="contentCard client">
  <div class="card-header">
    <h3 class="title">Client</h3>
    <a href="#" class="btn btn-sm btn-info">See All</a>
  </div>
  <div class="tb-resp">
    <table class="tb-full">
      <thead class="light">
        <tr>
          <th>Nama</th>
          <th>Domain</th>
          <th>Start Date</th>
          <th>Due Date</th>
          <th>Added By</th>
        </tr>
      </thead>
      <tbody>
      <?php      
      if (isset($data->client)) 
      {
        while($row = mysqli_fetch_array($data->client))                      
        {          
        ?>                  
          <tr>
            <td><?=$row[1]?></td>
            <td><?=$row[2]?></td>
            <td><?=$row[6]?></td>
            <td><?=$row[7]?></td>
            <td><?=$row[4]?></td>
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
