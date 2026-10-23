<?php
echo "=== PHP2Shell Vulnerability Scanner ===\n";

$v = PHP_VERSION;
echo "PHP Version: $v\n";

$fixed = ['8.5'=>'8.5.12', '8.4'=>'8.4.27', '8.3'=>'8.3.36', '8.2'=>'8.2.35'];
$branch = implode('.', array_slice(explode('.', $v),0,2));

if(isset($fixed[$branch])){
  if(version_compare($v,$fixed[$branch],'>=')) echo "✅ SECURE - You are safe!\n";
  else echo "🚨 VULNERABLE! Update to {$fixed[$branch]}\n";
} else {
  if(version_compare($v, '8.2.0', '<')){
    echo "ℹ️ NOT AFFECTED by PHP2Shell (Version $v < 8.2) but upgrading is recommended\n";
  } else {
    echo "🚨 CRITICALLY VULNERABLE! No official patch for $v\nUpgrade to 8.3.36+ ASAP\n";
  }
}
?>
