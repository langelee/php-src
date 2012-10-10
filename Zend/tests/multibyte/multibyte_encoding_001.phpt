--TEST--
Zend Multibyte and ShiftJIS
--SKIPIF--
<?php
if (!in_array("detect_unicode", array_keys(ini_get_all()))) {
  die("skip Requires configure --enable-zend-multibyte option");
}
if (!extension_loaded("mbstring")) {
  die("skip Requires mbstring extension");
}
?>
--INI--
mbstring.internal_encoding=SJIS
--FILE--
<?php
declare(encoding='Shift_JIS');
$s = "�\"; // 0x95+0x5c in script, not somewhere else "
printf("%x:%x\n", ord($s[0]), ord($s[1]));
?>
===DONE===
--EXPECT--
95:5c
===DONE===
