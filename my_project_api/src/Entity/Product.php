<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiFilter(BooleanFilter::class, properties: ['deleted'])]
#[ApiResource(
    operations: [
        new Post(),          //create
        new GetCollection(), //read
        new Get(),    //readById
        new Put(),    //updateById
        new Patch(),  //updateById
        new Delete(),  //deleteeById

        new GetCollection(
            name:'api_products_search',
            uriTemplate: '/products-search',
            controller: \App\Controller\Api\ProductSearchController::class,
            /*openapiContext:[
                'sumary' => 'Search',
                'security' => [],
                "paths" => [],
            ]*/
        ),
    ]
)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[SerializedName("bigness")]
    #[Assert\Positive]
    private ?int $size = null;

    #[ORM\Column (options: ["default" => true])]
    private ?bool $isAvailable = true;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $publishedOn = null;

    /**
     * @param string|null $name
     * @param int|null $size
     */
    public function __construct(?string $name, ?int $size, ?bool $isAvailable=true)
    {
        $this->name = $name;
        $this->size = $size;
        $this->isAvailable = $isAvailable;
        $this->publishedOn = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getPublishedOn(): ?\DateTime
    {
        return $this->publishedOn;
    }

    public function setPublishedOn(?\DateTime $publishedOn): static
    {
        $this->publishedOn = $publishedOn;

        return $this;
    }

}
