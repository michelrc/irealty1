<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<table cellspacing="0" cellpadding="10" style="color:#666;font:13px Arial;line-height:1.4em;width:100%;">
	<tbody>
		<tr>
            <td style="color:#536C0B;font-size:22px;border-bottom: 2px solid #536C0B;">
                <?php $company = CompanyInfo::model()->find();
                    if(isset($company)):
                        echo CHtml::encode($company->company_name);
                    else:
                        echo CHtml::encode(app()->name);
                    endif?>
            </td>
		</tr>
		<tr>
            <td style="color:#777;font-size:16px;padding-top:5px;">
            	<?php if(isset($data['description'])) echo $data['description'];  ?>
            </td>
		</tr>
		<tr>
            <td>
				<?php echo $content ?>
            </td>
		</tr>
	</tbody>
</table>
</body>
</html>