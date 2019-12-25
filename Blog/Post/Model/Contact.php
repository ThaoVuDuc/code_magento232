<?php 
namespace Blog\Post\Model;

use Blog\Post\Api\Data\ContactInterface;

class Contact extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, ContactInterface
{
	const CACHE_TAG = 'aht_blog_contact';

	protected $_cacheTag = 'aht_blog_contact';

	protected $_eventPrefix = 'aht_blog_contact';
	//ham tao 
	protected function _construct()
	{
		$this->_init('Blog\Post\Model\ResourceModel\Contact');//hàm bắt buộc có để xác định resource model
	}
	//định nghĩa phương thức getIdentities() của IdentityInterface 
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$value = [];

		return $value;
	}
}