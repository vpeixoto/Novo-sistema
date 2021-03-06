<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 *
 * This file contains sections from the Aura Project
 * @license https://github.com/auraphp/Aura.Intl/blob/3.x/LICENSE
 *
 * The Aura Project for PHP.
 *
 * @package Aura.Intl
 * @license https://opensource.org/licenses/bsd-license.php BSD
 */
namespace Cake\I18n;

use Aura\Intl\FormatterInterface;
use Aura\Intl\Package;
use Aura\Intl\TranslatorInterface;
use Cake\I18n\PluralRules;

/**
 * Provides missing message behavior for CakePHP internal message formats.
 *
 * @internal
 */
class Translator implements TranslatorInterface
{
    /**
     * A fallback translator.
     *
     * @var \Aura\Intl\TranslatorInterface
     */
    protected $fallback;

    /**
     * The formatter to use when translating messages.
     *
     * @var \Aura\Intl\FormatterInterface
     */
    protected $formatter;

    /**
     * The locale being used for translations.
     *
     * @var string
     */
    protected $locale;

    /**
     * The Package containing keys and translations.
     *
     * @var \Aura\Intl\Package
     */
    protected $package;

    /**
     * Constructor
     *
     * @param string $locale The locale being used.
     * @param \Aura\Intl\Package $package The Package containing keys and translations.
     * @param \Aura\Intl\FormatterInterface $formatter A message formatter.
     * @param \Aura\Intl\TranslatorInterface|null $fallback A fallback translator.
     */
    public function __construct(
        $locale,
        Package $package,
        FormatterInterface $formatter,
        TranslatorInterface $fallback = null
    ) {
        $this->locale = $locale;
        $this->package = $package;
        $this->formatter = $formatter;
        $this->fallback = $fallback;
    }

    /**
     * Gets the message translation by its key.
     *
     * @param string $key The message key.
     * @return string|bool The message translation string, or false if not found.
     */
    protected function getMessage($key)
    {
        $message = $this->package->getMessage($key);
        if ($message) {
            return $message;
        }

        if ($this->fallback) {
            // get the message from the fallback translator
            $message = $this->fallback->getMessage($key);
            if ($message) {
                // speed optimization: retain locally
                $this->package->addMessage($key, $message);
                // done!
                return $message;
            }
        }

        // no local message, no fallback
        return false;
    }

    /**
     * Translates the message formatting any placeholders
     *
     *
     * @param string $key The message key.
     * @param array $tokensValues Token values to interpolate into the
     *   message.
     * @return string The translated message with tokens replaced.
     */
    public function translate($key, array $tokensValues = [])
    {
        $message = $this->getMessage($key);
        if (!$message) {
            // Fallback to the message key
            $message = $key;
        }

        // Check for missing/invalid context
        if (isset($message['_context'])) {
            $message = $this->resolveContext($key, $message, $tokensValues);
            unset($tokensValues['_context']);
        }

        if (!$tokensValues) {
            // Fallback for plurals that were using the singular key
            if (is_array($message)) {
                return array_values($message + [''])[0];
            }

            return $message;
        }

        // Singular message, but plural call
        if (is_string($message) && isset($tokensValues['_singular'])) {
            $message = [$tokensValues['_singular'], $message];
        }

        // Resolve plural form.
        if (is_array($message)) {
            $count = isset($tokensValues['_count']) ? $tokensValues['_count'] : 0;
            $form = PluralRules::calculate($this->locale, $count);
            $message = isset($message[$form]) ? $message[$form] : (string)end($message);
        }

        if (strlen($message) === 0) {
            $message = $key;
        }

        return $this->formatter->format($this->locale, $message, $tokensValues);
    }

    /**
     * Resolve a message's context structure.
     *
     * @param string $key The message key being handled.
     * @param string|array $message The message content.
     * @param array $vars The variables containing the `_context` key.
     * @return string
     */
    protected function resolveContext($key, $message, array $vars)
    {
        $context = isset($vars['_context']) ? $vars['_context'] : null;

        // No or missing context, fallback to the key/first message
        if ($context === null) {
            if (isset($message['_context'][''])) {
                return $message['_context'][''];
            }

            return current($message['_context']);
        }
        if (!isset($message['_context'][$context])) {
            return $key;
        }
        if ($message['_context'][$context] === '') {
            return $key;
        }

        return $message['_context'][$context];
    }

    /**
     * An object of type Package
     *
     * @return \Aura\Intl\Package
     */
    public function getPackage()
    {
        return $this->package;
    }
}
