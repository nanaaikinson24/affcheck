<p>Welcome <?= $userData['first_name'] . ' ' . $userData['last_name']; ?>, </p>
<br>
<p>We are happy to have you on board. </p>
<p>Your login is <?= $userData['email']; ?> </p>
<p>Your password is <?= $userData['password']; ?> </p>
<p>To access this app, click on the link below <br>
	<a href="<?= base_url('/'); ?>"><?= base_url('/'); ?></a>
</p>
