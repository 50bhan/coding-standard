<?php declare(strict_types = 1);

namespace SlevomatCodingStandard\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;
use SlevomatCodingStandard\Helpers\SniffSettingsHelper;
use function count;
use function sprintf;
use const T_ANON_CLASS;
use const T_CLASS;
use const T_TRAIT;

final class PropertyPerClassLimitSniff implements Sniff
{

	public const CODE_PROPERTY_PER_CLASS_LIMIT = 'PropertyPerClassLimit';

	/** @var int */
	public $maxPropertyCount = 10;

	/**
	 * @return array<int, (int|string)>
	 */
	public function register(): array
	{
		return [T_CLASS, T_TRAIT, T_ANON_CLASS];
	}

	/**
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
	 * @param File $phpcsFile
	 * @param int $classPointer
	 */
	public function process(File $phpcsFile, $classPointer): void
	{
		$maxPropertyCount = SniffSettingsHelper::normalizeInteger($this->maxPropertyCount);
		$numberOfProperties = count(ClassHelper::getPropertyPointers($phpcsFile, $classPointer));
		if ($numberOfProperties <= $maxPropertyCount) {
			return;
		}
		$errorMessage = sprintf(
			'%s has too many properties: %d. Can be up to %d properties.',
			$phpcsFile->getTokens()[$classPointer]['content'],
			$numberOfProperties,
			$maxPropertyCount
		);
		$phpcsFile->addError($errorMessage, $classPointer, self::CODE_PROPERTY_PER_CLASS_LIMIT);
	}

}
