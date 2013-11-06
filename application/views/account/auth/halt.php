<?php $this->load->view('header');?>

<?php echo form_open('', array('class' => 'form-auth'));?>
	<h2 class="form-auth-heading">强制登出</h2>
	<?php if(!$no_action) { ?><p>您已经强制登出了正在其他位置登录的帐号，如果出现帐户异常请尽快修改密码。</p><?php } else { ?><p>正在其他位置登录的帐号已经登出无需强制注销，如果出现帐户异常请尽快修改密码。</p><?php } ?>
	<?php echo form_button(array(
		'name' => 'login',
		'content' => '登录',
		'type' => 'button',
		'class' => 'btn btn-primary',
		'onclick' => 'location.href=\''.base_url('account/login').'\''
	));?>
<?php echo form_close();?>

<?php $this->ui->js('footer', 'form_auth_center();');
$this->load->view('footer'); ?>