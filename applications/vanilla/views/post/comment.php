<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
$NewOrDraft = !isset($this->Comment) || property_exists($this->Comment, 'DraftID') ? TRUE : FALSE;
$Editing = isset($this->Comment);
?>
<div id="CommentForm">
   <h2><?php echo T($Editing ? 'Edit Comment' : 'Add Comment'); ?></h2>
   <?php
      echo $this->Form->Open();
      echo $this->Form->Errors();
      echo $this->Form->TextBox('Body', array('MultiLine' => TRUE));
      echo $this->Form->Button('Post Comment', array('class' => 'Button CommentButton'));
      if ($NewOrDraft)
         echo $this->Form->Button('Save Draft', array('class' => 'Button DraftButton'));
      
      echo $this->Form->Button('Preview', array('class' => 'Button PreviewButton'));
      $this->FireEvent('AfterFormButtons');
      echo Anchor(T('Cancel'), '/vanilla/discussion/'.$this->DiscussionID, 'Cancel');
      echo $this->Form->Close();
   ?>
</div>