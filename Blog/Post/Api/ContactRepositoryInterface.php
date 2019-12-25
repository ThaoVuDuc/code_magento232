<?php
namespace Blog\Post\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ContactRepositoryinterface
{
    /**
     * Save Contact.
     *
     * @param \Blog\Post\Api\Data\ContactInterface $Contact
     * @return \Blog\Post\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact);

    /**
     * Retrieve Contact.
     *
     * @param int $ContactId
     * @return \Blog\Post\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ContactId);

    /**
     * Retrieve Contacts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Blog\Post\Api\Data\ContactSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Contact.
     *
     * @param \Blog\Post\Api\Data\ContactInterface $Contact
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact);

    /**
     * Delete Contact by ID.
     *
     * @param int $ContactId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ContactId);
}