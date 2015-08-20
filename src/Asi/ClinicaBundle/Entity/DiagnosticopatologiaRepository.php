<?php

namespace Asi\ClinicaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EspecialidadRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DiagnosticopatologiaRepository extends EntityRepository
{

	public function consultaTienePatologias($consulta)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(dp) FROM AsiClinicaBundle:Diagnosticopatologia dp WHERE dp.idconsulta = :consulta')
            ->setParameter("consulta", $consulta)
            ->getOneOrNullResult();
    }

    public function getNombrePatologiasByConsulta($consulta)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT pa FROM AsiClinicaBundle:Patologia pa WHERE pa.nombre NOT IN(SELECT DISTINCT p.nombre FROM AsiClinicaBundle:Diagnosticopatologia dp INNER JOIN AsiClinicaBundle:Pacientepatologia pp WHERE pp.id = dp.idpacientepatologia INNER JOIN AsiClinicaBundle:Patologia p WHERE  pp.idpatologia = p.id AND dp.idconsulta = :consulta)')
            ->setParameter("consulta", $consulta)
            ->getResult();
    }

    public function getPatologiasEdit($consulta, $patologia)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT pa FROM AsiClinicaBundle:Patologia pa WHERE pa.nombre NOT IN(SELECT DISTINCT p.nombre FROM AsiClinicaBundle:Diagnosticopatologia dp INNER JOIN AsiClinicaBundle:Pacientepatologia pp WHERE pp.id = dp.idpacientepatologia INNER JOIN AsiClinicaBundle:Patologia p WHERE  pp.idpatologia = p.id AND dp.idconsulta = :consulta) OR pa = :patologia')
            ->setParameter("consulta", $consulta)
            ->setParameter("patologia", $patologia)
            ->getResult();
    }
}