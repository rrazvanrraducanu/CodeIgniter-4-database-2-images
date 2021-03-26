<?php
helper('form');
echo form_open_multipart('FlowerController/update');
$data1 = ['name'          => 'title',
        'id'            => 'title',
        'value'=>$flower['title'],
        'maxlength'     => '100',
        'size'          => '30',
       ];
$data2 = ['name'          => 'poza',
        'id'            => 'poza',
        'value'=>$flower['image'],
        'maxlength'     => '100',
        'size'          => '30',
       ];
$data3 = ['name'          => 'id',
        'id'            => 'id',
        'type'=>'hidden',
         'value'=>$flower['id'],
        'maxlength'     => '100',
        'size'          => '30',
       ];
?>
<?php echo form_input($data3);?>
<table>
<tr>
<td><?php echo form_label('Title ', 'title');?></td>
<td><?php echo form_input($data1);?></td>
</tr>
<tr>
<td><?php echo form_label('Image ', 'poza');?></td>
<td><?php echo form_upload($data2);?></td>
</tr>
</table>
<img src="<?php echo base_url($flower['image']); ?>" width="100" height="100">
<br/>
<?php echo form_submit('submit', 'Update');?>

