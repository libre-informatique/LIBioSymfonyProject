<?php

/*
 * Copyright (C) Paweł Jędrzejewski
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Theme;

use Sylius\Bundle\ThemeBundle\Context\ThemeContextInterface;
use Sylius\Bundle\ThemeBundle\Repository\ThemeRepositoryInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Channel\Context\ChannelNotFoundException;
use Sylius\Component\Core\Model\ChannelInterface;

/**
 * @author Kamil Kokot <kamil.kokot@lakion.com>
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
final class ChannelBasedThemeContext implements ThemeContextInterface
{
    /**
     * @var ChannelContextInterface
     */
    private $channelContext;

    /**
     * @var ThemeRepositoryInterface
     */
    private $themeRepository;

    /**
     * @param ChannelContextInterface $channelContext
     * @param ThemeRepositoryInterface $themeRepository
     */
    public function __construct(ChannelContextInterface $channelContext, ThemeRepositoryInterface $themeRepository)
    {
        $this->channelContext = $channelContext;
        $this->themeRepository = $themeRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getTheme()
    {
        try {
            /** @var ChannelInterface $channel */
            $channel = $this->channelContext->getChannel();
            return $this->themeRepository->findOneByName($channel->getThemeName());
        } catch (ChannelNotFoundException $exception) {
            return null;
        } catch (\Exception $exception) {
            return null;
        }
    }
}