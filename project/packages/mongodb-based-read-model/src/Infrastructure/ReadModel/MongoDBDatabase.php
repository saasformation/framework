<?php

namespace SaaSFormation\Framework\MongoDBBasedReadModel\Infrastructure\ReadModel;

use MongoDB\Collection;
use MongoDB\Database;
use MongoDB\Driver\Session;

readonly class MongoDBDatabase
{
    public function __construct(private Database $database, private Session $session)
    {
    }

    /**
     * @param string $collectionName
     * @param array<string, string> $options
     * @return Collection
     */
    public function selectCollection(string $collectionName, array $options = []): Collection
    {
        return $this->database->selectCollection($collectionName, array_merge($options, $this->collectionOptions($this->session)));
    }

    /**
     * @param Session $session
     * @return array<string, Session>
     */
    private function collectionOptions(Session $session): array
    {
        $options['session'] = $session;

        return $options;
    }
}