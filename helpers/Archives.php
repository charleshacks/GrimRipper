<?php

namespace Helpers;

use Filebase\Database;

class Archives
{
    /**
     * @var Filebase\Database
     */
    private $database;

    /**
     * Instantiate a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->database = new Database([
            'dir' => dirname(dirname(__FILE__)) . '/database',
        ]);
    }

    /**
     * Save a new record.
     * 
     * @param  string $id
     * @param  string $title
     * @param  string $description
     * @param  string $date
     * @param  string $path
     * @return Filebase\Document
     */
    public function add($id, $title, $description, $date, $path)
    {
        $record = $this->database->get($id);

        $record->title = $title;
        $record->description = $description;
        $record->date = $date;
        $record->path = $path;

        $record->save();

        return $record;
    }

    /**
     * Return all records ordered by release date.
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->database->query()->orderBy('date', 'DESC')->results();
    }
}