<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPersonalInformation
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AdminBundle\Entity\UserPersonalInformationRepository")
 */
class UserPersonalInformation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=70, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=70, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=true)
     */
    private $biography;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $categoryy;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="featuring_date", type="datetime", nullable=true)
     */
    private $featuringDate;

    /**
     * @var User
     *
     *  @ORM\OnetoOne(targetEntity="User")
     *  @ORM\Column(name="account_id")
     */
    private $user;

    /**
     * @var Picture
     *
     * @ORM\ManytoOne(targetEntity="Picture")
     * @ORM\Column(name="cover_picture_id")
     */
    private $coverpicture;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return UserPersonalInformation
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return UserPersonalInformation
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     * @return UserPersonalInformation
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return UserPersonalInformation
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return UserPersonalInformation
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return UserPersonalInformation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set featuringDate
     *
     * @param \DateTime $featuringDate
     * @return UserPersonalInformation
     */
    public function setFeaturingDate($featuringDate)
    {
        $this->featuringDate = $featuringDate;

        return $this;
    }

    /**
     * Get featuringDate
     *
     * @return \DateTime 
     */
    public function getFeaturingDate()
    {
        return $this->featuringDate;
    }

    /**
     * Set user
     *
     * @param \AdminBundle\Entity\User $user
     * @return UserPersonalInformation
     */
    public function setUser(\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set coverpicture
     *
     * @param \AdminBundle\Entity\Picture $coverpicture
     * @return UserPersonalInformation
     */
    public function setCoverpicture(\AdminBundle\Entity\Picture $coverpicture = null)
    {
        $this->coverpicture = $coverpicture;

        return $this;
    }

    /**
     * Get coverpicture
     *
     * @return \AdminBundle\Entity\Picture 
     */
    public function getCoverpicture()
    {
        return $this->coverpicture;
    }

    /**
     * Set blaze
     *
     * @param string $blaze
     * @return UserPersonalInformation
     */
    public function setBlaze($blaze)
    {
        $this->blaze = $blaze;

        return $this;
    }

    /**
     * Get blaze
     *
     * @return string 
     */
    public function getBlaze()
    {
        return $this->blaze;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return UserPersonalInformation
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return UserPersonalInformation
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set instagram
     *
     * @param string $instagram
     * @return UserPersonalInformation
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram
     *
     * @return string 
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set categoryy
     *
     * @param string $categoryy
     * @return UserPersonalInformation
     */
    public function setCategoryy($categoryy)
    {
        $this->categoryy = $categoryy;

        return $this;
    }

    /**
     * Get categoryy
     *
     * @return string 
     */
    public function getCategoryy()
    {
        return $this->categoryy;
    }
}
