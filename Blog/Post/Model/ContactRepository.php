<?php
namespace Blog\Post\Model;

use Blog\Post\Api\Data;
use Blog\Post\Api\ContactRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Blog\Post\Model\ResourceModel\Contact as ResourceContact;
use Blog\Post\Model\ResourceModel\Contact\CollectionFactory as ContactCollectionFactory;
/**
 * Class ContactRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @var ResourceContact
     */
    protected $resource;

    /**
     * @var ContactFactory
     */
    protected $ContactFactory;

    /**
     * @var ContactCollectionFactory
     */
    protected $ContactCollectionFactory;

    /**
     * @var Data\ContactSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceContact $resource
     * @param ContactFactory $ContactFactory
     * @param Data\ContactInterfaceFactory $dataContactFactory
     * @param ContactCollectionFactory $ContactCollectionFactory
     * @param Data\ContactSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceContact $resource,
        ContactFactory $ContactFactory,
        Data\ContactInterfaceFactory $dataContactFactory,
        ContactCollectionFactory $ContactCollectionFactory
    ) {
        $this->resource = $resource;
        $this->ContactFactory = $ContactFactory;
        $this->ContactCollectionFactory = $ContactCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Contact data
     *
     * @param \Blog\Post\Api\Data\ContactInterface $Contact
     * @return Contact
     * @throws CouldNotSaveException
     */
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
       
        try {
            $this->resource->save($Contact);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Contact: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Contact;
    }

    /**
     * Load Contact data by given Contact Identity
     *
     * @param string $ContactId
     * @return Contact
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($ContactId)
    {
        $Contact = $this->ContactFactory->create();
        $Contact->load($ContactId);
        if (!$Contact->getId()) {
            throw new NoSuchEntityException(__('The CMS Contact with the "%1" ID doesn\'t exist.', $ContactId));
        }
        return $Contact;
    }

    /**
     * Load Contact data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Blog\Post\Api\Data\ContactSearchResultsInterface
     */
    public function getList()
    {
        /** @var \Blog\Post\Model\ResourceModel\Contact\Collection $collection */
        $collection = $this->ContactCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Contact
     *
     * @param \Blog\Post\Api\Data\ContactInterface $Contact
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
        try {
            $this->resource->delete($Contact);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Contact: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Contact by given Contact Identity
     *
     * @param string $ContactId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($ContactId)
    {
        return $this->delete($this->getById($ContactId));
    }
}