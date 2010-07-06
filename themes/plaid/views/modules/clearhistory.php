<?php if (!defined('APPLICATION')) exit();
if ($this->ConversationID > 0)
   echo Anchor(T('<span>Clear Conversation History</span>'), '/messages/clear/'.$this->ConversationID, 'BigButton ClearConversation');