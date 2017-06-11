<?php
namespace TYPO3\CMS\Core\Tests\Unit\Messaging;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\Renderer\PlaintextRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class PlaintextRendererTest extends UnitTestCase
{
    /**
     * @test
     */
    public function renderCreatesCorrectOutputForFlashMessage()
    {
        $rendererClass = GeneralUtility::makeInstance(PlaintextRenderer::class);
        $flashMessage = GeneralUtility::makeInstance(
            FlashMessage::class,
            'messageBody',
            'messageTitle',
            FlashMessage::NOTICE
        );
        $this->assertSame('[NOTICE] messageTitle: messageBody', $rendererClass->render([$flashMessage]));
    }

    /**
     * @test
     */
    public function renderCreatesCorrectOutputForFlashMessageWithoutTitle()
    {
        $rendererClass = GeneralUtility::makeInstance(PlaintextRenderer::class);
        $flashMessage = GeneralUtility::makeInstance(
            FlashMessage::class,
            'messageBody',
            '',
            FlashMessage::NOTICE
        );
        $this->assertSame('[NOTICE] messageBody', $rendererClass->render([$flashMessage]));
    }
}
