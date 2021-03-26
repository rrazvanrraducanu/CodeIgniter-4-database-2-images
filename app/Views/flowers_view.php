<!DOCTYPE html>
  <head>
  </head>
  <body>
    <table>
     <tr>
      <td><strong>Nume</strong></td>
      <td><strong>Imagine</strong></td>
    </tr> 
     <?php foreach($flori as $var){?>
     <tr>
         <td><?php echo $var['title'];?></td>
         <td><img src="<?php echo base_url($var['image']);?>" width="100" height="100"></td>
<td>
            <?php echo '<a href="FlowerController/view/'.$var['id'].'">View</a>';?>
         <?php echo '<a href="FlowerController/edit/'.$var['id'].'">Edit</a>';?>
         <?php echo '<a href="FlowerController/delete/'.$var['id'].'">Delete</a>';?>
         </td>
      </tr>     
     <?php }?>  
   </table
<br><br>
<a href='FlowerController/upload/'>Upload another image</a>
  </body>
</html>