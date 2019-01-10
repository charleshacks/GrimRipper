<?php

namespace Helpers;

class RSSGenerator
{
    /**
     * Generate an RSS feed of the provided records and save it to the public directory.
     * 
     * @param  array $records Records from Helpers\Archives.
     * @return void
     */
    public function output($records)
    {
        $xml = new \SimpleXMLElement('<xml/>');

        foreach ($records as $record) {

            $track = $xml->addChild('track');

            $track->addChild('title', $record['title']);
            $track->addChild('description', $record['description']);
            $track->addChild('date', $record['date']);
            $track->addChild('link', getenv('PUBLIC_URL') . $record['path']);

        }

        file_put_contents(dirname(dirname(__FILE__)) . '/public/feed.xml', $xml->asXML());
    }
}