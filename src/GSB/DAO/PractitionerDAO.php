<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    /**
     * @var \GSB\DAO\FamilyDAO
     */
    private $familyDAO;

    public function setFamilyDAO($familyDAO) {
        $this->familyDAO = $familyDAO;
    }

    /**
     * Returns the list of all practitioners, sorted by name.
     *
     * @return array The list of all practitioners.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the list of all practitioners for a given family, sorted by name.
     *
     * @param integer $familyDd The family id.
     *
     * @return array The list of practitioners.
     */
    public function findAllByFamily($familyId) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($familyId));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the practitioner matching a given id.
     *
     * @param integer $id The practitioner id.
     *
     * @return \GSB\Domain\Practitioner|throws an exception if no practitioner is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    /**
     * Creates a Practitioner instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Practitioner
     */
    protected function buildDomainObject($row) {
        $familyId = $row['family_id'];
        $family = $this->familyDAO->find($familyId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setTypeId($row['practitioner_type_id']);
        $practitioner->setName($row['name']);
        $practitioner->setFirstName($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZipCode($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
		$practitioner->setNotorietyCoefficient($row['notoriety_coefficient']);
        $practitioner->setFamily($family);
        return $practitioner;
    }
}