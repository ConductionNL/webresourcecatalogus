<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Filter\LikeFilter;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is an example entity.
 * 
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 * )
 * @Gedmo\Loggable
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
{
	/**
	 * @var \Ramsey\Uuid\UuidInterface
	 *
	 * @example e2984465-190a-4562-829e-a8cca81aa35d
	 *
	 * @Assert\Uuid
	 * @Groups({"read"})
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $id;

    /**
     * @var string The id of this Menu
     * @example abc
     *
     * @Assert\NotNull
     * @Assert\Length(
     *      max = 255
     * )
     * @Groups({"read","write"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuItem", mappedBy="menu")
     */
    private $menuItem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Header", inversedBy="menu")
     */
    private $header;

    public function __construct()
    {
        $this->menuItem = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getMenuItem(): Collection
    {
        return $this->menuItem;
    }

    public function addMenuItem(MenuItem $menuItem): self
    {
        if (!$this->menuItem->contains($menuItem)) {
            $this->menuItem[] = $menuItem;
            $menuItem->setMenu($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItem->contains($menuItem)) {
            $this->menuItem->removeElement($menuItem);
            // set the owning side to null (unless already changed)
            if ($menuItem->getMenu() === $this) {
                $menuItem->setMenu(null);
            }
        }

        return $this;
    }

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(?Header $header): self
    {
        $this->header = $header;

        return $this;
    }
}
