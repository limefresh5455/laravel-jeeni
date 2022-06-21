<?php

namespace App\Models;


/**
 * Post
 */
class Post extends \TCG\Voyager\Models\Post
{

    /**
     * @var array
     */
    public $shareLinks = [];

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return route('blog', ['slug' => $this->slug]);
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        $author = $this->authorId;
        $name = (isset($author->display_name)) ? $author->display_name : $author->name;
        if($name == '') {
            $name = $author->first_name . ' ' . $author->last_name;
        }
        return $name;
    }

    /**
     * @param string $type
     * @return string
     */
    public function getSocialShare(string $type = 'facebook'): string
    {
        $this->generateShareLinks();
        if(array_key_exists($type, $this->shareLinks)) {
            return $this->shareLinks[$type];
        } else {
            return $this->getUrl();
        }
    }

    /**
     *
     */
    public function generateShareLinks() {
        $this->shareLinks = \Share::page($this->getUrl())
            ->facebook()
            ->twitter()
            ->linkedin()
            ->getRawLinks();
    }

    public function getEmailShareContent(): string
    {
        return 'mailto:?subject='.$this->title.'&body='.$this->getUrl();
    }
}
