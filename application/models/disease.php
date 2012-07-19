<?php
class Disease extends Doctrine_Record {
	public function setTableDefinition() {
		$this -> hasColumn('Name', 'varchar', 100);
		$this -> hasColumn('Type', 'varchar', 32);
		$this -> hasColumn('Description', 'text');
		$this -> hasColumn('Flag', 'text');
		$this -> hasColumn('Has_Lcase', 'varchar', 5);
		$this -> hasColumn('Has_Ldeath', 'varchar', 5);
		$this -> hasColumn('Has_Gcase', 'varchar', 5);
		$this -> hasColumn('Has_Gdeath', 'varchar', 5);
	}

	public function setUp() {
		$this -> setTableName('diseases');
	}

	public function getAll() {
		$query = Doctrine_Query::create() -> select("*") -> from("Disease");
		$diseases = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $diseases;
	}

	public function getAllObjects() {
		$query = Doctrine_Query::create() -> select("*") -> from("Disease");
		$diseases = $query -> execute();
		return $diseases;
	}

	public function getName($diseaseId) {
		$query = Doctrine_Query::create() -> select("name") -> from("disease") -> where("id ='$diseaseId'");
		$results = $query -> execute();
		return $results[0];
	}
	
	public function getTotal(){
		$query = Doctrine_Query::create() -> select("count(*) as Total_Diseases") -> from("Disease");
		$diseases = $query -> execute();
		return $diseases[0]->Total_Diseases;
	}

}
