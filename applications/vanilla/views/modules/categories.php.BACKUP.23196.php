<?php if (!defined('APPLICATION')) exit();
$CountDiscussions = 0;
$CategoryID = isset($this->_Sender->CategoryID) ? $this->_Sender->CategoryID : '';

if ($this->_CategoryData !== FALSE) {
   foreach ($this->_CategoryData->Result() as $Category) {
      $CountDiscussions = $CountDiscussions + $Category->CountDiscussions;
   }
   ?>
<div class="Box">
   <h4><?php echo T('Categories'); ?></h4>
   <ul class="PanelInfo">
      <li<?php
      if (!is_numeric($CategoryID) && $this->_Sender->SelfUrl == "discussions" )
         echo ' class="Active"';
         
<<<<<<< HEAD
      ?>><strong><?php echo Anchor(Format::Text(T('All Discussions')), '/discussions'); ?></strong> <?php echo $CountDiscussions; ?></li>
 <li<?php
      if (!is_numeric($CategoryID) && $this->_Sender->SelfUrl == "categories")
         echo ' class="Active"';
         
      ?>><strong><?php echo Anchor(Format::Text(T('All Categories')), '/categories'); ?></strong> <?php echo $CountDiscussions; ?></li>
=======
      ?>><strong><?php echo Anchor(Gdn_Format::Text(T('All Discussions')), '/discussions'); ?></strong> <?php echo $CountDiscussions; ?></li>
>>>>>>> upstream/master
      <?php
   foreach ($this->_CategoryData->Result() as $Category) {
      ?>
      <li<?php
      if ($CategoryID == $Category->CategoryID)
         echo ' class="Active"';
         
      ?>><strong><?php echo Anchor(Gdn_Format::Text(str_replace('&rarr;', '→', $Category->Name)), '/categories/'.$Category->UrlCode); ?></strong> <?php echo $Category->CountDiscussions; ?></li>
      <?php
   }
      ?>
   </ul>
</div>
   <?php
}