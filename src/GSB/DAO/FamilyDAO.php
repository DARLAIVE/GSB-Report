<?php

namespace GSB\DAO;

use GSB\Domain\Family;

class FamilyDAO extends DAO
{
    /**
     * Returns the list of all families, sorted by name.
     *
     * @return array The list of all families.
     */
    public function findAll() {
        $sql = "select * from family order by family_name";
        $result = $this->getDb()->fetchAll($sql);
		$sql2 = "select * from practitioner_type order by practitioner_type_name";
		$result2 = $this->getDb()->fetchAll($sql2);
		
        // Converts query result to an array of domain objects
        $families = array();
        foreach ($result as $row) {
            $familyId = $row['family_id'];
            $families[$familyId] = $this->buildDomainObject($row);
        }
        return $families;
		
		$families2 = array();
        foreach ($result2 as $row2) {
            $familyId2 = $row2['practitioner_type_id'];
            $families2[$familyId2] = $this->buildDomainObject($row2);
        }
        return $families2;
    }

    /**
     * Returns the family matching the given id.
     *
     * @param integer $id The family id.
     *
     * @return \GSB\Domain\Family|throws an exception if no family is found.
     */
    public function find($id) {
        $sql = "select * from family where family_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));
		$sql2 = "select * from practitioner_type where practitioner_type_id=?";
        $row2 = $this->getDb()->fetchAssoc($sql2, array($id));
		
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No family found for id " . $id);
			
		if ($row2)
            return $this->buildDomainObject($row2);
        else
            throw new \Exception("No family found for id " . $id);
    }

    /**
     * Creates a Family instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Family
     */
    protected function buildDomainObject($row) {
        $family = new Family();
        $family->setId($row['family_id']);
        $family->setName($row['family_name']);
        return $family;
    }
	
	protected function buildDomainObject($row2) {
        $family = new Family();
        $family->setId($row['practitioner_type_id']);
        $family->setName($row['practitioner_type_name']);
        return $family;
    }
}