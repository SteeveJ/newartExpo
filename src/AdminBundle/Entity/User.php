<?php

namespace AdminBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * FosUser
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 *
 * @Vich\Uploadable
 */
class User extends BaseUser implements EncoderAwareInterface
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     *
     */
    protected $biography;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
     *
     * @var File $imageFile
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255, name="image_name")
     *
     * @var string $imageName
     */
    protected $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime $updatedAt
     */
    protected $updatedAt;


    /**
     * @var bool
     *
     * @ORM\Column(name="legacy_encoder", type="boolean")
     */
    protected $legacyEncoder;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->legacyEncoder = false;
    }



    /**
     * @return boolean
     */
    public function isLegacyEncoder()
    {
        return $this->legacyEncoder;
    }

    /**
     * @param boolean $legacyEncoder
     */
    public function setLegacyEncoder($legacyEncoder)
    {
        $this->legacyEncoder = $legacyEncoder;
    }

    public function getEncoderName()
    {
        return true === $this->legacyEncoder ? 'legacy' : 'default';
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}