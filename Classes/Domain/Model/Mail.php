<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Mail
	 */
	class Mail extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $mail;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\MailType
		 */
		protected $mailType;
		
		/**
		 * @var boolean
		 */
		protected $public;
		
		/**
		 * @return string
		 */
		public function getMail(): string {
			return $this->mail;
		}
		
		/**
		 * @param string $mail
		 */
		public function setMail($mail): void {
			$this->mail = $mail;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\MailType
		 */
		public function getMailType(): \Balumedien\Sportms\Domain\Model\MailType {
			return $this->mailType;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\MailType $mailType
		 */
		public function setMailType(\Balumedien\Sportms\Domain\Model\MailType $mailType): void {
			$this->mailType = $mailType;
		}
		
		/**
		 * @return bool
		 */
		public function isPublic(): bool {
			return $this->public;
		}
		
		/**
		 * @param bool $public
		 */
		public function setPublic($public): void {
			$this->public = $public;
		}
		
	}