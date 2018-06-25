<?php

namespace Kanboard\Plugin\UsernameAvatar;

use Kanboard\Plugin\UsernameAvatar\User\Avatar\UsernameAvatarProvider;
use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Avatar provider
        $this->avatarManager->register(new UsernameAvatarProvider($this->container));
        
        // Board (private and public)
        $this->template->setTemplateOverride('board/task_private', 'usernameavatar:board/task_private');
        $this->template->setTemplateOverride('board/task_public', 'usernameavatar:board/task_public');
        
        // Task list
        $this->template->setTemplateOverride('task_list/task_avatars', 'usernameavatar:task_list/task_avatars');
        
        // Avatar styles
        $this->hook->on('template:layout:css', array('template' => 'plugins/UsernameAvatar/assets/css/avatar.css'));
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses() {
        return array(
            'Kanboard\Plugin\UsernameAvatar\User\Avatar' => array('UsernameAvatarProvider',)
        );
    }

    public function getPluginName()
    {
        return 'Username Avatar';
    }

    public function getPluginDescription()
    {
        return t('Provides modified avatars with username instead of initials');
    }

    public function getPluginAuthor()
    {
        return 'Arjan Verduijn';
    }

    public function getPluginVersion()
    {
        return '0.9.0';
    }

    public function getPluginHomepage()
    {
        return '';
    }
    
    public function getCompatibleVersion()
    {
        return '>=1.0.48';
    }
}

