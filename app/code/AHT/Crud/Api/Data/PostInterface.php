<?php

namespace AHT\Crud\Api\Data;

interface PostInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                 = 'id';
    const NAME               = 'name';
    const CREATED_AT         = 'created_at';
    const UPDATE_AT          = 'update_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Title
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set Title
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated At
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Updated At
     *
     * @param int $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);


}
