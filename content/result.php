<div id="navPath">
	<button class="btn" onclick="location.href = '/defi/'" >Home</button>
	<button class="btn" onclick="location.href = '/login'">Login</button>
    <button class="btn" onclick="location.href = '/user_registration'">Register</button>
</div>
<fieldset>
    <legend>Search's Result</legend>
    <?php 
      foreach ($latests as $i=>$latest): ?>
    <div class="rownav<?php echo $i % 2; ?>">
      <p> <?php echo $latest;  ?></p>
    </div>
  <?php endforeach; ?>
  </div>
</fieldset>