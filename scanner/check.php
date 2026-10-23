<?php
echo "=== PHP2Shell Vulnerability Scanner ===\n";
$v = PHP_VERSION;
echo "PHP Version: $v\n";
$fixed = ['8.5'=>'8.5.12','8.4'=>'8.4.27','8.3'=>'8.3.36','8.2'=>'8.2.35'];
$branch = implode('.', array_slice(explode('.', $v),0,2));
if(isset($fixed[$branch])){
  if(version_compare($v,$fixed[$branch],'>=')) echo "✅ SECURE\n";
  else echo "🚨 VULNERABLE! Update to {$fixed[$branch]}\n";
} else {
  echo "🚨 CRITICALLY VULNERABLE! No official patch for $v\nUpgrade to 8.3.36+ ASAP\n";
}
?>
