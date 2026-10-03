<?php
class Complaint {private $id,$userId,$productId,$typeId,$technicianId,$description,$imagePath,$status,$date,$resolutionDate,$resolutionNotes;
public function __construct($id,$userId,$productId,$typeId,$technicianId,$description,$imagePath,$status,$date,$resolutionDate,$resolutionNotes){$this->id=$id;$this->userId=$userId;$this->productId=$productId;$this->typeId=$typeId;$this->technicianId=$technicianId;$this->description=$description;$this->imagePath=$imagePath;$this->status=$status;$this->date=$date;$this->resolutionDate=$resolutionDate;$this->resolutionNotes=$resolutionNotes;}
public function getId(){return $this->id;}public function getUserId(){return $this->userId;}public function getProductId(){return $this->productId;}public function getTypeId(){return $this->typeId;}public function getTechnicianId(){return $this->technicianId;}public function getDescription(){return $this->description;}public function getStatus(){return $this->status;}}
?>
