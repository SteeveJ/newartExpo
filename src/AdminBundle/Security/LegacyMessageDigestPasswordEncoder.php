<?php
namespace AdminBundle\Security;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class LegacyMessageDigestPasswordEncoder extends MessageDigestPasswordEncoder
{
    /**
     * {@inheritdoc}
     */
    protected function mergePasswordAndSalt($password, $salt)
    {
        if (empty($salt)) {
            return $password;
        }

        return $salt.$password;
    }
}