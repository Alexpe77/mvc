<?php

declare(strict_types=1);

class Article
{
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    // TODO: return the date in the required format
    public function formatPublishDate($format = 'd-m-Y')
    {
        $formattedDate = date($format, strtotime($this->publishDate));

        return $formattedDate;
    }

    public function getId() {
        return $this->id;
    }
}
