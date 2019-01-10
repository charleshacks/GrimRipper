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
        $rss = new \SimpleXMLElement('<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0"></rss>');

        $channel = $rss->addChild('channel');

        $channel->addChild('title', getenv('APP_TITLE'));
        $channel->addChild('description', getenv('APP_TITLE'));
        $channel->addChild('link', getenv('APP_URL'));
        $channel->addChild('lastBuildDate', date('D, d M Y H:i:s O'));

        foreach ($records as $record) {

            $item = $channel->addChild('item');

            $item->addChild('title', $record['title']);
            $item->addChild('description', $record['description']);
            $item->addChild('pubDate', $record['date']);
            $item->addChild('link', getenv('APP_URL') . $record['path']);

        }

        file_put_contents(dirname(dirname(__FILE__)) . '/public/feed.xml', $rss->asXML());
    }
}