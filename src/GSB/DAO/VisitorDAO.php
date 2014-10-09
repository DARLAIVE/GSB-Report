<?php

namespace GSB\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use MicroCMS\Domain\User;

class VisitorDAO extends DAO implements UserProviderInterface
{
    /**
     * Returns a visitor matching the supplied id.
     *
     * @param integer $visitor_id
     *
     * @return \GSB\Domain\Visitor|throws an exception if no matching visitor is found
     */
    public function find($visitor_id) {
        $sql = "select * from visitor where visitor_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($visitor_id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visitor matching id " . $visitor_id);
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($visitor_user_name)
    {
        $sql = "select * from visitor where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($visitor_user_name));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('Visitor "%s" not found.', $visitor_user_name));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $visitor)
    {
        $class = get_class($visitor);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($visitor->getVisitorName());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'GSB\Domain\Visitor' === $class;
    }

    /**
     * Creates a Visitor object based on a DB row.
     *
     * @param array $row The DB row containing Visitor data.
     * @return \GSB\Domain\Visitor
     */
    protected function buildDomainObject($row) {
        $visitor = new Visitor();
        $visitor->setVisitorId($row['visitor_id']);
        $visitor->setVisitorName($row['user_name']);
        $visitor->setPassword($row['password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        return $visitor;
    }
}