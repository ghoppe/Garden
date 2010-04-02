<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <?php $this->RenderAsset('Head'); ?>
</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
	<div id="ev_bg">
		<div id="everything">
			<div id="header">
			</div>
			<div id="Frame">
				<div id="Head">
					<div class="Menu">
						<h1><a class="Title" href="<?php echo Url('/'); ?>">
							<span><?php echo Gdn::Config('Garden.Title', 'Vanilla'); ?></span>
						</a></h1>
						<?php
							$Session = Gdn::Session();
							if ($this->Menu) {
								$this->Menu->AddLink('Dashboard', Gdn::Translate('Dashboard'), '/garden/settings', 
									array('Garden.Settings.Manage'));
								$this->Menu->AddLink('Dashboard', Gdn::Translate('Users'), '/user/browse', 
									array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
								$this->Menu->AddLink('Activity', Gdn::Translate('Activity'), '/activity');
								$Authenticator = Gdn::Authenticator();
								if ($Session->IsValid()) {
									$Name = $Session->User->Name;
									$CountNotifications = $Session->User->CountNotifications;
									if (is_numeric($CountNotifications) && $CountNotifications > 0)
										$Name .= '<span>'.$CountNotifications.'</span>';
									$this->Menu->AddLink('User', $Name, '/profile/{UserID}/{Username}', 
										array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
									$this->Menu->AddLink('SignOut', Gdn::Translate('Sign Out'), 
										$Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
								} else {
									$Attribs = array();
									if (Gdn::Config('Garden.SignIn.Popup'))
										$Attribs['class'] = 'SignInPopup';
									$this->Menu->AddLink('Entry', Gdn::Translate('Sign In'), 
										$Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
								}
								echo $this->Menu->ToString();
							}
						?>
						<div id="Search"><?php
							$Form = Gdn::Factory('Form');
							$Form->InputPrefix = '';
							echo 
								$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
								$Form->TextBox('Search'),
								$Form->Button('Go', array('Name' => '')),
								$Form->Close();
						?></div>
					</div>
				</div>
				<div id="Body">
					<div id="Content"><?php $this->RenderAsset('Content'); ?></div>
					<div id="Panel"><?php $this->RenderAsset('Panel'); ?></div>
				</div>
				<div id="sidebar">
					<%= render :partial => "/shared/header" %>
				</div>
			</div>
			<div id="Foot">
				<?php $this->RenderAsset('Foot'); ?>
				<div id="subnav"><a href="http://wow.clanplaid.net/">Home</a> 
					             | <a href="http://wow.clanplaid.net/v/index.php">Barrens Chat</a> 
									     | <a href="http://wow.clanplaid.net/pages/about-us">About Us</a> 
				<div class="credits">
					<?php printf(Gdn::Translate('Barrens Chat is powered by %s'), '<a href="http://vanillaforums.org"><span>Vanilla</span></a>'); ?>
				</div>
				</div>									
				<div>
				<p><span class="copyright">World of Warcraft&reg; and Blizzard Entertainment&reg; are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. <br> These terms and all related materials, logos, and images are copyright &copy; Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment&reg;.</span></p>
			</div>
		</div>
	</div>
	<?php $this->FireEvent('AfterBody'); ?>
</body>
</html>