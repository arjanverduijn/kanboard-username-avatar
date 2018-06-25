<?php

namespace Kanboard\Plugin\HsAvatar\User\Avatar;

use Kanboard\Core\User\Avatar\AvatarProviderInterface;
use Kanboard\User\Avatar\LetterAvatarProvider;

/**
 * Hukseflux Avatar Provider
 *
 * @package  hukseflux avatar
 * @author   Arjan Verduijn
 */
class HsAvatarProvider extends LetterAvatarProvider implements AvatarProviderInterface
{
    
    /**
     * Render avatar html
     * Override only this function
     *
     * @access public
     * @param  array $user
     * @param  int   $size
     * @return string
     */
    public function render(array $user, $size)
    {
        $initials = strtoupper($user['username']);
        $rgb = $this->getBackgroundColor($user['name'] ?: $user['username']);

        return sprintf(
            '<div class="avatar-letter" style="background-color: rgb(%d, %d, %d)" title="%s">%s</div>',
            $rgb[0],
            $rgb[1],
            $rgb[2],
            $this->helper->text->e($user['name'] ?: $user['username']),
            $initials
        );
    }
}
