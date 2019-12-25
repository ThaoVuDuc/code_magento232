<?php

namespace Blog\Post\Plugin;

class UserAttributesUpdater
{
	public function afterDelete(\Blog\Post\Api\Data\ContactInterface $Contact)
	{
		echo "test plugin !";
	}
}