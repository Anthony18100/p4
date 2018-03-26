<?php 

namespace App\Model\Reports;

class Reports{

	/**
	 * Attributs
	 */

	protected $id;
	protected $adress_ip;
	protected $id_report_comment;
	protected $date_report_comment;

	public function __construct($value = []){
		if(!empty($value)){
			$this->hydrate($value);
		}
	}

	public function hydrate($datas){

		foreach($datas as $attribut => $value){
			$method = 'set' . ucfirst($attribut);

			if(is_callable([$this, $method])){
				$this->$method($value);
			}
		}

	}


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAdressIp()
    {
        return $this->adress_ip;
    }

    /**
     * @return mixed
     */
    public function getIdReportComment()
    {
        return $this->id_report_comment;
    }



    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $adress_ip
     *
     * @return self
     */
    public function setAdressIp($adress_ip)
    {
        $this->adress_ip = $adress_ip;

        return $this;
    }

    /**
     * @param mixed $id_report_comment
     *
     * @return self
     */
    public function setIdReportComment($id_report_comment)
    {
        $this->id_report_comment = $id_report_comment;

        return $this;
    }


}