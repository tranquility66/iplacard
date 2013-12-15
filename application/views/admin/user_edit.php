<?php $this->load->view('header');?>

<div class="page-header">
	<h1><?php echo $action == 'add' ? '添加用户' : icon('user').$user['name'];?></h1>
</div>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">帮助</div>
			<div class="panel-body"><?php if($action == 'edit') { ?>
				<p>您可以通过此页面修改管理用户信息并调整管理权限。</p>
				<p style="margin-bottom: 0;">不同的管理权限具有不同的职能，当选择主席或面试官权限后，您需要选定对应的委员会。指定委员会之后，主席权限将可以管理该委员会。</p>
				<?php } else { ?>
				<p>您可以通过此页面添加管理用户并分配管理权限。</p>
				<p>不同的管理权限具有不同的职能，当选择主席或面试官权限后，您需要选定对应的委员会。指定委员会之后，主席权限将可以管理该委员会。</p>
				<p style="margin-bottom: 0;">将会发送一封包含登录信息的邮件给新添加的管理用户。</p>
			<?php } ?></div>
		</div>
	</div>
	
	<div class="col-md-9">
		<?php echo form_open($action == 'add' ? 'user/edit' : "user/edit/{$user['id']}", array('class' => 'well form-horizontal'), array('change_name' => false, 'change_email' => false, 'change_phone' => false));?>
			<?php echo form_fieldset('个人信息'); ?>
				<p>用户的个人信息将会用于登录和接收通知，请确保信息正确。</p>
		
				<div class="form-group <?php if(form_has_error('name')) echo 'has-error';?>">
					<?php echo form_label('姓名', 'name', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<div class="<?php if($action == 'edit') echo 'input-group';?>">
							<?php echo form_input(array(
								'name' => 'name',
								'id' => 'name',
								'value' => set_value('name', $action == 'add' ? '' : $user['name']),
								$action == 'edit' ? 'disabled' : 'enabled' => NULL,
								'class' => 'form-control',
								'required' => NULL
							));
							if($action == 'edit') { ?><span class="input-group-addon" onclick="edit_item('name');"><?php echo icon('pencil', false);?></span><?php } ?>
						</div>
						<?php if(form_has_error('name'))
							echo form_error('name');
						elseif($action == 'edit') { ?><div class="help-block">点击右侧图标以更改姓名。</div><?php } ?>
					</div>
				</div>
		
				<div class="form-group <?php if(form_has_error('email')) echo 'has-error';?>">
					<?php echo form_label('电子邮箱', 'email', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<div class="<?php if($action == 'edit') echo 'input-group';?>">
							<?php echo form_input(array(
								'name' => 'email',
								'id' => 'email',
								'value' => set_value('email', $action == 'add' ? '' : $user['email']),
								$action == 'edit' ? 'disabled' : 'enabled' => NULL,
								'class' => 'form-control',
								'required' => NULL
							));
							if($action == 'edit') { ?><span class="input-group-addon" onclick="edit_item('email');"><?php echo icon('pencil', false);?></span><?php } ?>
						</div>
						<?php if(form_has_error('email'))
							echo form_error('email');
						elseif($action == 'edit') { ?><div class="help-block">点击右侧图标以更改邮箱。</div><?php } ?>
					</div>
				</div>
				
				<div class="form-group <?php if(form_has_error('phone')) echo 'has-error';?>">
					<?php echo form_label('手机', 'phone', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<div class="<?php if($action == 'edit') echo 'input-group';?>">
							<?php echo form_input(array(
								'name' => 'phone',
								'id' => 'phone',
								'value' => set_value('phone', $action == 'add' ? '' : $user['phone']),
								$action == 'edit' ? 'disabled' : 'enabled' => NULL,
								'class' => 'form-control',
								'required' => NULL
							));
							if($action == 'edit') { ?><span class="input-group-addon" onclick="edit_item('phone'); $('#phone_text').text('仅支持中国大陆地区运营商号码。');"><?php echo icon('pencil', false);?></span><?php } ?>
						</div>
						<?php if(form_has_error('phone'))
							echo form_error('phone');
						elseif($action == 'edit') { ?><div class="help-block" id="phone_text">点击右侧图标以更改手机号码。</div><?php }
						else { ?><div class="help-block">仅支持中国大陆地区运营商号码。</div><?php } ?>
					</div>
				</div>
			<?php echo form_fieldset_close();?>
			
			<br />
			
			<?php echo form_fieldset($action == 'add' ? '设置密码' : '修改密码'); ?>
				<p><?php echo $action == 'edit' ? '如无需修改密码则不必填写。' : '一封包含登录密码的邮件将会发送给此用户。';?></p>
			
				<div class="form-group <?php if(form_has_error('password')) echo 'has-error';?>">
					<?php echo form_label('新密码', 'password', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<?php echo form_password(array(
							'name' => 'password',
							'id' => 'password',
							'class' => 'form-control',
							$action == 'add' ? 'required' : NULL => NULL,
						));
						echo form_error('password');?>
					</div>
				</div>
				
				<div class="form-group <?php if(form_has_error('password_repeat')) echo 'has-error';?>">
					<?php echo form_label('重复密码', 'password_repeat', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<?php echo form_password(array(
							'name' => 'password_repeat',
							'id' => 'password_repeat',
							'class' => 'form-control',
							$action == 'add' ? 'required' : NULL => NULL,
						));
						echo form_error('password_repeat');?>
					</div>
				</div>
				
				<?php if($action == 'edit') { ?><div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<label class="checkbox" style="font-weight: normal;">
							<?php echo form_checkbox(array(
								'name' => 'sendmail',
								'id' => 'sendmail',
								'value' => true,
								'checked' => set_value('sendmail', true)
							));?> 通过电子邮件将登录信息和密码发送给此用户
						</label>
					</div>
				</div><?php }
				else
					form_hidden('sendmail', true); ?>
				
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<?php echo form_button(array(
							'name' => 'generate_password',
							'content' => '生成随机密码',
							'type' => 'button',
							'class' => 'btn btn-primary',
							'onclick' => "$('#password, #password_repeat').val(random_password(12));"
						));
						
						$random_password_js = '
						function random_password(length, special) {
							var iteration = 0;
							var password = "";
							var randomNumber;
							if(special == undefined){
								var special = false;
							}
							while(iteration < length){
								randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
								if(!special){
									if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
									if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
									if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
									if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
								}
								iteration++;
								password += String.fromCharCode(randomNumber);
							}
							return password;
						}';
						$this->ui->js('footer', $random_password_js);?>
					</div>
				</div>
			<?php echo form_fieldset_close();?>
			
			<br />
			
			<?php echo form_fieldset('权限设置'); ?>
				<p>请确保权限设置正确以避免越权情况出现。</p>
			
				<div class="form-group <?php if(form_has_error('role')) echo 'has-error';?>">
					<?php echo form_label('管理权限', 'role', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-6">
						<div class="input-group" style="width: 100% !important;">
							<?php foreach($roles as $name => $role) { ?><label class="checkbox" style="font-weight: normal;">
								<span id="role_<?php echo $name;?>_help" data-html=true data-placement="top" data-trigger="hover focus" data-original-title="<?php echo "{$role['title']}权限";?>" data-toggle="popover" data-content="<?php echo str_replace('|', '<br />', $role['description']);?>">
									<?php
									echo form_checkbox(array(
										'id' => "role_{$name}",
										'name' => "role_{$name}",
										'value' => true,
										'checked' => set_value("role_{$name}", $action == 'add' ? false : $user["role_{$name}"])
									));
									echo ' ';
									echo $role['title'];?>
								</span>
							</label><?php $this->ui->js('footer', "$('#role_{$name}_help').popover();");
							} ?>
						</div>
						<?php echo form_error('role');?>
					</div>
				</div>
				
				<div class="form-group <?php if(form_has_error('committee')) echo 'has-error';?>">
					<?php echo form_label('委员会', 'committee', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<?php
						if(!empty($committees))
							$array = array('' => '选择委员会') + $committees;
						else
							$array = array('' => '委员会为空');
						echo form_dropdown('committee', $array, set_value('committee', $action == 'add' ? '' : $user['committee']), 'class="form-control" id="committee"');
						if(form_has_error('committee'))
							echo form_error('committee');
						else { ?><div class="help-block">对应主席和面试官权限生效。</div><?php } ?>
					</div>
				</div>
				
				<div class="form-group <?php if(form_has_error('title')) echo 'has-error';?>">
					<?php echo form_label('职务', 'title', array('class' => 'col-lg-2 control-label'));?>
					<div class="col-lg-4">
						<?php echo form_input(array(
							'name' => 'title',
							'id' => 'title',
							'value' => set_value('title', $action == 'add' ? '' : $user['title']),
							'class' => 'form-control',
						));
						if(form_has_error('title'))
							echo form_error('title');
						else { ?><div class="help-block">职务信息将会在联系信息中显示。</div><?php } ?>
					</div>
				</div>
			<?php echo form_fieldset_close();?>
		
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo form_button(array(
						'name' => 'submit',
						'content' => $action == 'add' ? '添加用户' : '修改用户',
						'type' => 'submit',
						'class' => 'btn btn-primary',
					));?>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

<?php
$edit_js = <<<EOT
function edit_item(item)
{
	$('#'+item).removeAttr('disabled');
	$('input[name=change_'+item+']').val(true);
}
EOT;
if($action == 'edit')
	$this->ui->js('footer', $edit_js);
$this->load->view('footer');?>