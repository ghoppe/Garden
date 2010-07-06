<?php if (!defined('APPLICATION')) exit(); ?>
<table class="AltColumns">
	<?php
   $Header = array();
   $Filename = GetValue('OriginalFilename', $this->Data);
   if($Filename)
      $Header[T('Filename')] = $Filename;

   $Header = array_merge($Header, (array)GetValue('Header', $this->Data, array()));
   $Stats = (array)GetValue('Stats', $this->Data, array());
   $Info = array_merge($Header, $Stats);
	foreach($Info as $Name => $Value) {
      if(substr_compare('Time', $Name, 0, 4, TRUE) == 0)
         $Value = Gdn_Timer::FormatElapsed($Value);


		$Name = htmlentities($Name);
		$Value = htmlentities($Value);

		echo "<tr><th>$Name</th><td class=\"Alt\">$Value</td></tr>\n";
	}
	?>
</table>