<p>Hello <?= $userData['first_name'] . ' ' . $userData['last_name']; ?>, </p>
<br>
<p>You requested for a reset of password. </p>
<p>Your new password is <?= $userData['password']; ?> </p>
<p>To access this app, click on the link below <br>
  <a href="<?= base_url('/'); ?>"><?= base_url('/'); ?></a>
</p>