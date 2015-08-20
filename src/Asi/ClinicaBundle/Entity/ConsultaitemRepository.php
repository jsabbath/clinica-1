<?php

namespace Asi\ClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EspecialidadRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConsultaitemRepository extends EntityRepository
{


    public function getValorByConsultaAndItem($consulta, $item)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT ci.valor FROM AsiClinicaBundle:Consultaitem ci WHERE ci.idconsulta = :consulta AND ci.iditemexamenfisico = :item')
            ->setParameters(array("consulta" => $consulta, "item" => $item))
            ->getOneOrNullResult();
    }

	public function consultaTieneItems($consulta)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(ci) FROM AsiClinicaBundle:Consultaitem ci WHERE ci.idconsulta = :consulta')
            ->setParameter("consulta", $consulta)
            ->getOneOrNullResult();
    }    

}