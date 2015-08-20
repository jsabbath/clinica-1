<?php

namespace Asi\ClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PacientepatologiaRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PacientepatologiaRepository extends EntityRepository
{

	public function findByPacientePatologiaAndIdConsulta($patologia, $consulta)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT pp FROM AsiClinicaBundle:Pacientepatologia pp INNER JOIN AsiClinicaBundle:Diagnosticopatologia dp WHERE dp.idpacientepatologia = pp.id AND pp.id = :patologia AND dp.idconsulta = :consulta')
            ->setParameters(array("patologia" => $patologia, "consulta" => $consulta))
            ->getOneOrNullResult();
    }

}