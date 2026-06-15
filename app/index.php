<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/layout.php';

$config = mineacle_config();
$voteSites = $config['vote_sites'] ?? [];
$serverIp = (string) ($config['site']['ip'] ?? 'mineacle.net');

mineacle_page_head('Vote | Mineacle Network');
mineacle_header('vote');
?>

<section class="vote-middle-shell" aria-label="Vote for Mineacle">
  <div class="vote-middle-hero">
    <div class="vote-middle-copy">
      <span class="eyebrow">Mineacle Rewards</span>
      <h1>Vote for Mineacle</h1>
      <p>Support the network, help more players find the server, and earn daily rewards in-game.</p>
      <div class="vote-middle-actions">
        <button class="btn red" type="button" data-copy-ip="<?= h($serverIp) ?>">Copy Server IP</button>
        <a class="btn soft" href="#vote-sites">View Vote Links</a>
      </div>
    </div>
    <div class="vote-middle-panel">
      <img class="vote-middle-logo" src="assets/mineacle-main-logo.png?v=votefull2.1" alt="Mineacle Network">
      <div class="vote-reward-card">
        <span>Daily Reward</span>
        <strong>Vote Key</strong>
        <p>Vote once per site and claim your reward after the vote is confirmed.</p>
      </div>
    </div>
  </div>
</section>

<section class="vote-middle-section" id="vote-sites">
  <div class="section-heading">
    <span>Daily Vote Links</span>
    <h2>Choose a vote site</h2>
    <p>Use your exact Minecraft username on each vote site so the reward goes to the right account.</p>
  </div>
  <div class="vote-link-grid">
    <?php foreach ($voteSites as $index => $site): ?>
      <article class="vote-link-card">
        <div class="vote-link-number"><?= (int) $index + 1 ?></div>
        <div class="vote-link-copy">
          <span>Vote Site</span>
          <h3><?= h((string) $site['name']) ?></h3>
          <p>Reward: <strong><?= h((string) $site['reward']) ?></strong></p>
        </div>
        <a class="btn red" href="<?= h((string) $site['url']) ?>" target="_blank" rel="noopener">Vote Now</a>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="vote-middle-section vote-how-section" aria-label="How voting works">
  <div class="vote-how-card">
    <div class="vote-how-copy">
      <span class="eyebrow">How It Works</span>
      <h2>Vote, join, collect</h2>
      <p>Voting helps Mineacle grow and gives players a simple daily reward loop.</p>
    </div>
    <div class="vote-how-steps">
      <div class="vote-how-step"><strong>1</strong><span>Open a vote link</span></div>
      <div class="vote-how-step"><strong>2</strong><span>Enter your Minecraft username</span></div>
      <div class="vote-how-step"><strong>3</strong><span>Join Mineacle and claim rewards</span></div>
    </div>
  </div>
</section>

<?php mineacle_footer(); ?>
